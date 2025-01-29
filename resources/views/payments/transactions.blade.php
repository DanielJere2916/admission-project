@extends('applicant.layouts.layout')

@section('applicant_page_tittle', 'Transaction History')

@section('applicant_layout')
<div class="container-fluid p-0">
    <h1 class="h3 mb-3">Transaction History</h1>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <div class="alert-message">
                {{ session('success') }}
            </div>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <div class="alert-message">
                {{ session('error') }}
            </div>
        </div>
    @endif

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Payment Transactions</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Reference</th>
                                    <th>Application Type</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    <th>Payment Method</th>
                                    <th>Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($transactions as $transaction)
                                    <tr>
                                        <td>{{ $transaction->tx_ref }}</td>
                                        <td>
                                            {{ $transaction->intake->intake_type }}
                                            <br>
                                            <small class="text-muted">{{ $transaction->intake->academic_year }}</small>
                                        </td>
                                        <td>
                                            <strong>{{ number_format($transaction->amount, 2) }}</strong>
                                            {{ $transaction->currency }}
                                        </td>
                                        <td>
                                            @if($transaction->payment_status === 'successful')
                                                <span class="badge bg-success">Successful</span>
                                            @elseif($transaction->payment_status === 'pending')
                                                <span class="badge bg-warning">Pending</span>
                                            @else
                                                <span class="badge bg-danger">Failed</span>
                                            @endif
                                        </td>
                                        <td>{{ ucfirst($transaction->payment_method ?? 'N/A') }}</td>
                                        <td>
                                            {{ $transaction->created_at->format('M d, Y') }}
                                            <br>
                                            <small class="text-muted">{{ $transaction->created_at->format('h:i A') }}</small>
                                        </td>
                                        <td>
                                            @if($transaction->payment_status === 'successful')
                                                <a href="{{ route('applicant.continue-application', $transaction) }}" 
                                                   class="btn btn-sm btn-primary">
                                                    Continue Application
                                                </a>
                                            @elseif($transaction->payment_status === 'pending')
                                                <button type="button" class="btn btn-sm btn-warning" 
                                                        onclick="makePayment('{{ $transaction->tx_ref }}')">
                                                    Retry Payment
                                                </button>
                                            @else
                                                <a href="{{ route('payments.checkout', $transaction->intake) }}" 
                                                   class="btn btn-sm btn-danger">
                                                    Try Again
                                                </a>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center py-4">
                                            <div class="text-muted">
                                                <i data-feather="inbox" class="mb-2"></i>
                                                <p>No transactions found</p>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4">
                        {{ $transactions->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- PayChangu Inline Checkout for Retry -->
<script src="https://in.paychangu.com/js/popup.js"></script>
<script>
function makePayment(txRef) {
    PaychanguCheckout({
        "public_key": "{{ config('services.paychangu.api_key') }}",
        "tx_ref": txRef,
        "amount": {{ $transactions->first() ? $transactions->first()->amount : 0 }},
        "currency": "MWK",
        "callback_url": "{{ route('payments.callback') }}",
        "return_url": "{{ route('applicant.transactions') }}",
        "customer": {
            "email": "{{ Auth::user()->email }}",
            "first_name": "{{ Auth::user()->name }}",
            "last_name": "",
            "phone_number": "{{ Auth::user()->phonenumber }}"
        },
        "customization": {
            "title": "Application Fee Payment",
            "description": "Payment Retry"
        },
        "meta": {
            "user_id": "{{ Auth::id() }}"
        },
        "onClose": function() {
            window.location.reload();
        },
        "onSuccess": function(response) {
            fetch("{{ route('payments.callback') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    data: {
                        tx_ref: txRef,
                        status: 'successful',
                        payment_method: response.payment_method || 'online',
                        reference: response.reference
                    },
                    meta: {
                        user_id: "{{ Auth::id() }}"
                    }
                })
            }).then(() => {
                window.location.reload();
            });
        }
    });
}
</script>
@endsection 