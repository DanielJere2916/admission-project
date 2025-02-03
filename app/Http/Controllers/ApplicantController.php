<?php

namespace App\Http\Controllers;

use App\Models\Intake;
use App\Models\Transaction;
use Illuminate\Http\Request;

class ApplicantController extends Controller
{
    //
    public function index()
    {
        return view('applicant.applicant');
    }

    public function selectApplicationType()
    {
        // Get active intakes
        $intakes = Intake::where('intake_status', true)
            ->whereDate('intake_start', '<=', now())
            ->whereDate('intake_end', '>=', now())
            ->get();

        // Get user's transactions
        $transactions = Transaction::with('intake')
            ->where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('applicant.select_application_type', compact('intakes', 'transactions'));
    }

    public function showTransactions()
    {
        $transactions = Transaction::with('intake')
            ->where('user_id', auth()->id())
            ->latest()
            ->paginate(10);

        return view('applicant.transactions', compact('transactions'));
    }
    public function showBridging()
    {
        $transactions = Transaction::with('intake')
            ->where('user_id', auth()->id())
            ->where('payment_status', 'success')
            ->whereHas('intake', function ($query) {
                $query->where('intake_type', 'Bridging');
            })
            ->latest()
            ->first();

        if (!$transactions) {
            return redirect()->route('applicant')->with('error', 'Verify payment first for Bridging Intake.');
        }

        return view('applicant.applicationType.Bridging');
    }
    public function showUndergraduate()
    {
        $transactions = Transaction::with('intake')
            ->where('user_id', auth()->id())
            ->where('payment_status', 'success')
            ->whereHas('intake', function ($query) {
                $query->where('intake_type', 'Undergraduate');
            })
            ->latest()
            ->first();

        if (!$transactions) {
            return redirect()->route('applicant')->with('error', 'Verify payment first for Undergraduate Intake.');
        }

        return view('applicant.applicationType.Undergraduate');
    }
    public function showPostgraduate()
    {
        $transactions = Transaction::with('intake')
            ->where('user_id', auth()->id())
            ->where('payment_status', 'success')
            ->whereHas('intake', function ($query) {
                $query->where('intake_type', 'Postgraduate');
            })
            ->latest()
            ->first();

        if (!$transactions) {
            return redirect()->route('applicant')->with('error', 'Verify payment first for Postgraduate Intake.');
        }

        return view('applicant.applicationType.Postgraduate');
    }


}
