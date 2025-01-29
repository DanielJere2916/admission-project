@extends('applicant.layouts.layout')

@section('applicant_page_tittle', 'Payment Checkout')

@section('applicant_layout')
<div class="container-fluid p-0">
    <h1 class="h3 mb-3">Payment Checkout</h1>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Application Payment Details</h5>
                </div>
                <div class="card-body">
                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <h6>Application Type</h6>
                            <p>{{ $intake->intake_type }}</p>
                        </div>
                        <div class="col-md-6">
                            <h6>Academic Year</h6>
                            <p>{{ $intake->academic_year }}</p>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <h6>Amount to Pay</h6>
                            <p class="text-primary h4">MWK {{ number_format($intake->application_fees, 2) }}</p>
                        </div>
                        <div class="col-md-6">
                            <h6>Applicant Details</h6>
                            <p>{{ Auth::user()->name }}<br>{{ Auth::user()->email }}</p>
                        </div>
                    </div>

                    <div class="text-center">
                        <div id="wrapper"></div>
                        <button type="button" class="btn btn-primary" onClick="makePayment()">
                            <i class="align-middle me-2" data-feather="credit-card"></i> Pay Now
                        </button>
                        <a href="{{ route('applicant.select-application-type') }}" class="btn btn-light ms-2">
                            <i class="align-middle me-2" data-feather="arrow-left"></i> Back
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- PayChangu Inline Checkout -->
<script src="https://in.paychangu.com/js/popup.js"></script>
<script>
function makePayment() {
    const txRef = 'TX-' + Math.floor((Math.random() * 1000000000) + 1);
    
    // First create a pending transaction
    fetch("{{ route('payments.callback') }}", {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({
            data: {
                tx_ref: txRef,
                amount: {{ $intake->application_fees }},
                currency: 'MWK',
                status: 'pending',
                payment_method: 'online',
            },
            meta: {
                user_id: "{{ Auth::id() }}",
                intake_id: "{{ $intake->id }}",
                intake_type: "{{ $intake->intake_type }}",
                academic_year: "{{ $intake->academic_year }}"
            }
        })
    }).then(() => {
        // Then initiate PayChangu checkout
        PaychanguCheckout({
            "public_key": "{{ config('services.paychangu.api_key') }}",
            "tx_ref": txRef,
            "amount": {{ $intake->application_fees }},
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
                "description": "Payment for {{ $intake->intake_type }} Application - {{ $intake->academic_year }}"
            },
            "meta": {
                "intake_type": "{{ $intake->intake_type }}",
                "academic_year": "{{ $intake->academic_year }}",
                "user_id": "{{ Auth::id() }}",
                "intake_id": "{{ $intake->id }}",
                "applicant_id": "{{ Auth::user()->applicant_id }}"
            },
            "onClose": function() {
                window.location.href = "{{ route('applicant.transactions') }}";
            },
            "onSuccess": function(response) {
                // Update transaction record
                fetch("{{ route('payments.callback') }}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        data: {
                            tx_ref: txRef,
                            amount: {{ $intake->application_fees }},
                            currency: 'MWK',
                            status: 'successful',
                            payment_method: response.payment_method || 'online',
                            reference: response.reference
                        },
                        meta: {
                            user_id: "{{ Auth::id() }}",
                            intake_id: "{{ $intake->id }}",
                            intake_type: "{{ $intake->intake_type }}",
                            academic_year: "{{ $intake->academic_year }}"
                        }
                    })
                }).then(() => {
                    window.location.href = "{{ route('applicant.transactions') }}";
                }).catch(error => {
                    console.error('Error:', error);
                    window.location.href = "{{ route('applicant.transactions') }}";
                });
            }
        });
    }).catch(error => {
        console.error('Error creating initial transaction:', error);
        alert('An error occurred. Please try again.');
    });
}
</script>
@endsection 