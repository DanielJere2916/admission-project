@extends('applicant.layouts.layout')
@section('applicant_page_tittle')
    Dashboard - Admin Panel
@endsection
@section('applicant_layout')
<div class="container-fluid p-4">
    <!-- Cards Section -->
    <div class="row g-4 mb-5">
    <!-- Tablist Section -->
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header bg-primary">
                    <h5 class="card-title mb-0 text-white">Manage Payments</h5>
                </div>
                <div class="card-body">
                    <!-- Tabs Navigation -->
                    <ul class="nav nav-tabs mb-4" id="paymentTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="faculties-tab" data-bs-toggle="tab" data-bs-target="#faculties" type="button" role="tab" aria-controls="faculties" aria-selected="true">
                                <i class="align-middle me-1" data-feather="home"></i> Airtel Money
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="payment-tab" data-bs-toggle="tab" data-bs-target="#payment" type="button" role="tab" aria-controls="payment" aria-selected="false">
                                <i class="align-middle me-1" data-feather="credit-card"></i> Bank
                            </button>
                        </li>
                    </ul>

                    <!-- Tabs Content -->
                    <div class="tab-content" id="paymentTabContent">
                        <!-- Faculties Tab -->
                        <div class="tab-pane fade show active" id="faculties" role="tabpanel" aria-labelledby="faculties-tab">
                           <!-- Airtel Money Payment Form -->
                            <form action="" method="POST" id="paymentForm" class="p-4">
                                <!-- Payment Details -->
                                <div class="d-flex align-items-center justify-content-center mb-4">
                                    <img src="{{ asset('airtelLogo.png') }}" alt="Airtel Logo" class="me-3" style="height: 50px;">
                                    <div>
                                        <p class="mb-0"><strong>PAYMENT DETAILS</strong></p>
                                        <p class="mb-0">SEND TO: <strong>+265 995810026</strong></p>
                                        <p class="mb-0">Airtel Money Name: <strong>Daniel Jere</strong></p>
                                    </div>
                                </div>

                                <!-- Form Inputs -->
                                <div class="mb-3">
                                    <label for="trans_id" class="form-label">Transaction ID:</label>
                                    <input type="text" id="refnum" name="refnum" class="form-control" placeholder="xxxx-xxxx-xxxx-xxxx" required>
                                    <p class="text-danger small mt-1" id="refnum-error"></p>
                                </div>
                                <div class="mb-3">
                                    <label for="amount_entered" class="form-label">Amount (MK):</label>
                                    <input type="number" id="amount_entered" name="amount" class="form-control" value="{{ $application_fees }}" disabled>
                                </div>
                                <div class="mb-4">
                                    <label for="phone" class="form-label">Phone Number:</label>
                                    <input type="text" id="phone" name="phone" class="form-control" placeholder="Enter Your Phone Number" required>
                                    <p class="text-danger small mt-1" id="phone-error"></p>
                                </div>
                                <button type="button" onclick="submitForm()" class="btn btn-primary w-100">
                                    Verify Payment
                                </button>
                            </form>
                        </div> 

                        <!-- Payment Tab -->
                        <div class="tab-pane fade" id="payment" role="tabpanel" aria-labelledby="payment-tab">
                            <!-- Payment Form -->
                            <form class="p-4">
                                <!-- Payment Options -->
                                <div class="d-flex justify-content-between gap-3 mb-4">
                                    <button class="btn btn-outline-secondary flex-grow-1 d-flex align-items-center justify-content-center">
                                        <img src="https://upload.wikimedia.org/wikipedia/commons/b/b7/PayPal_Logo_2023.svg" alt="PayPal" style="height: 20px;">
                                    </button>
                                    <button class="btn btn-outline-secondary flex-grow-1 d-flex align-items-center justify-content-center">
                                        <img src="https://upload.wikimedia.org/wikipedia/commons/f/fa/Apple_Pay_logo.svg" alt="Apple Pay" style="height: 20px;">
                                    </button>
                                    <button class="btn btn-outline-secondary flex-grow-1 d-flex align-items-center justify-content-center">
                                        <img src="https://upload.wikimedia.org/wikipedia/commons/2/2f/Google_Pay_Logo.svg" alt="Google Pay" style="height: 20px;">
                                    </button>
                                </div>

                                <!-- Separator -->
                                <div class="d-flex align-items-center gap-2 mb-4">
                                    <hr class="flex-grow-1">
                                    <span class="text-muted small">or pay using credit card</span>
                                    <hr class="flex-grow-1">
                                </div>

                                <!-- Credit Card Form -->
                                <div class="mb-3">
                                    <label for="cardHolderName" class="form-label">Card Holder Full Name</label>
                                    <input type="text" class="form-control" id="cardHolderName" placeholder="Enter your full name">
                                </div>
                                <div class="mb-3">
                                    <label for="cardNumber" class="form-label">Card Number</label>
                                    <input type="text" class="form-control" id="cardNumber" placeholder="0000 0000 0000 0000">
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="expiryDate" class="form-label">Expiry Date</label>
                                        <input type="text" class="form-control" id="expiryDate" placeholder="MM/YY">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="cvv" class="form-label">CVV</label>
                                        <input type="text" class="form-control" id="cvv" placeholder="CVV">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary w-100">
                                    <i class="align-middle me-1" data-feather="credit-card"></i> Checkout
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection