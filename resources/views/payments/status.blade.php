@extends('uregistrar.layouts.layout')

@section('uregistrar_page_tittle')
    Payment Status
@endsection

@section('uregistrar_layout')
<div class="row">
    <div class="col-md-8 mx-auto">
        <div class="card shadow-sm">
            <div class="card-header bg-primary">
                <h5 class="card-title mb-0 text-white">Payment Status</h5>
            </div>
            <div class="card-body text-center py-5">
                @if($transaction->payment_status === 'successful')
                    <div class="mb-4">
                        <i data-feather="check-circle" class="text-success" style="width: 64px; height: 64px;"></i>
                    </div>
                    <h3 class="text-success mb-3">Payment Successful!</h3>
                    <p class="text-muted mb-4">Your payment of {{ number_format($transaction->amount) }} MWK has been processed successfully.</p>
                @elseif($transaction->payment_status === 'failed')
                    <div class="mb-4">
                        <i data-feather="x-circle" class="text-danger" style="width: 64px; height: 64px;"></i>
                    </div>
                    <h3 class="text-danger mb-3">Payment Failed</h3>
                    <p class="text-muted mb-4">Unfortunately, your payment could not be processed. Please try again.</p>
                @else
                    <div class="mb-4">
                        <i data-feather="clock" class="text-warning" style="width: 64px; height: 64px;"></i>
                    </div>
                    <h3 class="text-warning mb-3">Payment Pending</h3>
                    <p class="text-muted mb-4">Your payment is being processed. Please wait...</p>
                    <div class="spinner-border text-primary mb-4" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                @endif

                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card bg-light">
                            <div class="card-body">
                                <h6 class="card-title">Transaction Details</h6>
                                <table class="table table-borderless table-sm">
                                    <tr>
                                        <td class="text-start text-muted">Reference:</td>
                                        <td class="text-end">{{ $transaction->tx_ref }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-start text-muted">Amount:</td>
                                        <td class="text-end">{{ number_format($transaction->amount) }} {{ $transaction->currency }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-start text-muted">Payment Method:</td>
                                        <td class="text-end">{{ ucfirst($transaction->payment_method) }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-start text-muted">Date:</td>
                                        <td class="text-end">{{ $transaction->created_at->format('d M Y, H:i') }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-4">
                    @if($transaction->payment_status === 'successful')
                        <a href="{{ route('applicant.dashboard') }}" class="btn btn-success">
                            <i class="align-middle me-1" data-feather="arrow-right"></i>
                            Continue to Application
                        </a>
                    @elseif($transaction->payment_status === 'failed')
                        <a href="{{ route('payments.checkout', $transaction->intake_id) }}" class="btn btn-primary">
                            <i class="align-middle me-1" data-feather="refresh-cw"></i>
                            Try Again
                        </a>
                    @else
                        <button type="button" class="btn btn-primary" id="checkStatus">
                            <i class="align-middle me-1" data-feather="refresh-cw"></i>
                            Check Status
                        </button>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@if($transaction->payment_status === 'pending')
@push('scripts')
<script>
    // Auto-check payment status every 5 seconds
    const checkPaymentStatus = () => {
        fetch('{{ route('payments.verify', $transaction->tx_ref) }}')
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success' && data.data.status !== 'pending') {
                    window.location.reload();
                }
            });
    };

    let statusCheck = setInterval(checkPaymentStatus, 5000);

    // Manual check button
    document.getElementById('checkStatus').addEventListener('click', checkPaymentStatus);

    // Clear interval when leaving page
    window.addEventListener('beforeunload', () => {
        clearInterval(statusCheck);
    });
</script>
@endpush
@endif
@endsection 