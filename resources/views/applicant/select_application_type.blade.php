@extends('applicant.layouts.layout')

@section('applicant_page_tittle', 'Select Application Type')

@section('applicant_layout')
<div class="container-fluid p-0">
    <h1 class="h3 mb-3">Select Application Type</h1>

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
        @foreach($intakes as $intake)
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">{{ $intake->intake_type }}</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <h6>Academic Year</h6>
                            <p>{{ $intake->academic_year }}</p>
                        </div>
                        <div class="mb-3">
                            <h6>Application Period</h6>
                            <p>{{ \Carbon\Carbon::parse($intake->intake_start)->format('d M Y') }} - 
                               {{ \Carbon\Carbon::parse($intake->intake_end)->format('d M Y') }}</p>
                        </div>
                        <div class="mb-3">
                            <h6>Application Fee</h6>
                            <p class="text-primary h4">MWK {{ number_format($intake->application_fees, 2) }}</p>
                        </div>
                        <div class="text-center">
                            <a href="{{ route('payments.checkout', $intake) }}" class="btn btn-primary">
                                <i class="align-middle me-2" data-feather="plus-circle"></i>
                                Apply Now
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection 