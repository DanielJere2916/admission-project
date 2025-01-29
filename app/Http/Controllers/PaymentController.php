<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Intake;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    private $paychangu_api_key;
    private $paychangu_secret_key;
    private $paychangu_base_url;

    public function __construct()
    {
        $this->paychangu_api_key = config('services.paychangu.api_key');
        $this->paychangu_secret_key = config('services.paychangu.secret_key');
        $this->paychangu_base_url = config('services.paychangu.base_url');
    }

    public function showPaymentPage(Intake $intake)
    {
        return view('payments.checkout', compact('intake'));
    }

    public function initiatePayment(Request $request, Intake $intake)
    {
        // Validate request
        $request->validate([
            'phone_number' => 'required|string',
            'payment_method' => 'required|in:airtel,tnm'
        ]);

        try {
            // Log configuration
            Log::info('PayChangu Configuration', [
                'api_key_exists' => !empty($this->paychangu_secret_key),
                'base_url' => $this->paychangu_base_url
            ]);

            // Create transaction record
            $transaction = Transaction::create([
                'tx_ref' => 'TX-' . Str::random(10),
                'user_id' => auth()->id(),
                'intake_id' => $intake->id,
                'amount' => $intake->application_fees,
                'currency' => 'MWK',
                'payment_status' => 'success',
                'payment_method' => $request->payment_method
            ]);

            // Prepare PayChangu request payload according to their Standard Checkout API
            $payload = [
                'amount' => $intake->application_fees,
                'currency' => 'MWK',
                'email' => auth()->user()->email,
                'first_name' => auth()->user()->name,
                'last_name' => '', // Add last name if available
                'callback_url' => route('payments.transactions'),
                'return_url' => route('payments.status', $transaction->tx_ref),
                'tx_ref' => $transaction->tx_ref,
                'customization' => [
                    'title' => 'Application Fee Payment',
                    'description' => 'Payment for ' . $intake->intake_type . ' Application'
                ],
                'meta' => [
                    'intake_type' => $intake->intake_type,
                    'academic_year' => $intake->academic_year
                ]
            ];

            // Log request payload
            Log::info('PayChangu Request Payload', $payload);

            // Make API request to PayChangu
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $this->paychangu_secret_key,
                'Accept' => 'application/json',
                'Content-Type' => 'application/json'
            ])->post('https://api.paychangu.com/payment', $payload);

            // Log API response
            Log::info('PayChangu API Response', [
                'status' => $response->status(),
                'body' => $response->json()
            ]);

            if ($response->successful()) {
                $paymentData = $response->json();
                
                if ($paymentData['status'] === 'success') {
                    // Update transaction with payment details
                    $transaction->update([
                        'payment_details' => $paymentData['data'],
                        'payment_reference' => $paymentData['data']['data']['tx_ref'] ?? null
                    ]);

                    // Redirect to PayChangu checkout URL
                    return redirect($paymentData['data']['checkout_url']);
                }
            }

            throw new \Exception('Failed to initiate payment: ' . $response->body());

        } catch (\Exception $e) {
            Log::error('Payment initiation failed: ' . $e->getMessage(), [
                'exception' => $e,
                'trace' => $e->getTraceAsString()
            ]);
            return back()->with('error', 'Failed to initiate payment. Please try again.');
        }
    }

    public function handleCallback(Request $request)
    {
        try {
            // Log incoming callback data
            Log::info('PayChangu Callback Received', [
                'headers' => $request->headers->all(),
                'payload' => $request->all()
            ]);

            $payload = $request->all();
            
            // Check if transaction already exists
            $transaction = Transaction::where('tx_ref', $payload['data']['tx_ref'])->first();

            if ($transaction) {
                // Update existing transaction
                $transaction->update([
                    'payment_status' => $payload['data']['status'],
                    'payment_method' => $payload['data']['payment_method'] ?? 'online',
                    'payment_reference' => $payload['data']['reference'] ?? null,
                    'payment_details' => json_encode($payload),
                    'paid_at' => $payload['data']['status'] === 'successful' ? now() : null
                ]);
            } else {
                // Create new transaction record
                $transaction = Transaction::create([
                    'tx_ref' => $payload['data']['tx_ref'],
                    'user_id' => $payload['meta']['user_id'],
                    'intake_id' => $payload['meta']['intake_id'],
                    'amount' => $payload['data']['amount'],
                    'currency' => $payload['data']['currency'],
                    'payment_status' => $payload['data']['status'],
                    'payment_method' => $payload['data']['payment_method'] ?? 'online',
                    'payment_reference' => $payload['data']['reference'] ?? null,
                    'payment_details' => json_encode($payload),
                    'paid_at' => $payload['data']['status'] === 'successful' ? now() : null
                ]);
            }

            // Log transaction details
            Log::info('Transaction Processed', [
                'tx_ref' => $transaction->tx_ref,
                'status' => $transaction->payment_status,
                'amount' => $transaction->amount,
                'user_id' => $transaction->user_id,
                'intake_id' => $transaction->intake_id
            ]);

            if ($transaction->payment_status === 'successful') {
                return redirect()->route('applicant.transactions')
                    ->with('success', 'Payment completed successfully!');
            }

            return redirect()->route('applicant.transactions')
                ->with('error', 'Payment was not successful. Please try again.');

        } catch (\Exception $e) {
            Log::error('Callback processing failed: ' . $e->getMessage(), [
                'exception' => $e,
                'trace' => $e->getTraceAsString()
            ]);
            return redirect()->route('applicant.transactions')
                ->with('error', 'An error occurred while processing your payment.');
        }
    }

    public function showPaymentStatus($txRef)
    {
        try {
            $transaction = Transaction::where('tx_ref', $txRef)->first();
            
            if (!$transaction) {
                // If transaction doesn't exist, verify with PayChangu
                $response = Http::withHeaders([
                    'Authorization' => 'Bearer ' . $this->paychangu_api_key,
                    'Accept' => 'application/json'
                ])->get('https://api.paychangu.com/payment/verify/' . $txRef);

                if ($response->successful()) {
                    $paymentData = $response->json();
                    
                    // Create transaction if it doesn't exist
                    $transaction = Transaction::create([
                        'tx_ref' => $txRef,
                        'user_id' => auth()->id(),
                        'intake_id' => request('intake_id'),
                        'amount' => $paymentData['data']['amount'],
                        'currency' => $paymentData['data']['currency'],
                        'payment_status' => $paymentData['data']['status'],
                        'payment_method' => $paymentData['data']['payment_method'] ?? 'online',
                        'payment_reference' => $paymentData['data']['reference'] ?? null,
                        'payment_details' => json_encode($paymentData),
                        'paid_at' => $paymentData['data']['status'] === 'successful' ? now() : null
                    ]);
                }
            }

            if ($transaction && $transaction->payment_status === 'successful') {
                return redirect()->route('payments.transactions')
                    ->with('success', 'Payment completed successfully!');
            }

            return redirect()->route('applicant.transactions')
                ->with('error', 'Payment was not successful. Please try again.');

        } catch (\Exception $e) {
            Log::error('Payment status check failed: ' . $e->getMessage());
            return redirect()->route('applicant.transactions')
                ->with('error', 'Unable to verify payment status.');
        }
    }

    public function verifyPayment($txRef)
    {
        try {
            $transaction = Transaction::where('tx_ref', $txRef)->firstOrFail();

            // Make API request to PayChangu to verify payment
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $this->paychangu_api_key,
                'Accept' => 'application/json'
            ])->get($this->paychangu_base_url . '/payments/verify/' . $txRef);

            if ($response->successful()) {
                $paymentData = $response->json();

                // Update transaction status
                $transaction->update([
                    'payment_status' => $paymentData['status'],
                    'payment_details' => array_merge($transaction->payment_details ?? [], $paymentData),
                    'paid_at' => $paymentData['status'] === 'successful' ? now() : null
                ]);

                return response()->json([
                    'status' => 'success',
                    'data' => $paymentData
                ]);
            }

            throw new \Exception('Payment verification failed: ' . $response->body());

        } catch (\Exception $e) {
            Log::error('Payment verification failed: ' . $e->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to verify payment'
            ], 500);
        }
    }

    public function showTransactions()
    {
        $transactions = Transaction::with(['intake'])
            ->where('user_id', auth()->id())
            ->latest()
            ->paginate(10);

        return view('payments.transactions', compact('transactions'));
    }
}
