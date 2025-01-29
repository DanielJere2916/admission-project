@extends('applicant.layouts.layout')
@section('applicant_page_tittle')
    Dashboard - Admin Panel
@endsection
@section('applicant_layout')
<div class="container-fluid p-4">
    <!-- Cards Section -->
    <div class="row g-4 mb-5">
        <!-- Total Applications Card -->
        <div class="col-xl-3 col-md-6">
            <div class="card border-0 shadow-sm hover-scale">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="card-title text-muted mb-1">Intake Status</h5>
                            <h2 class="mt-2 mb-0"><span style="color: #34d75a;">Open</span></h2>
                        </div>
                        <div class="icon-circle" style="background-color: #34d75a;">
                            <i class="align-middle text-white" data-feather="calendar"></i>
                        </div>
                    </div>
                    <div class="mt-3">
                        <span class="text-muted small"> <span style="color: #34d75a;">15 Days to close</span></span>
                        <span class="float-end text-danger small">-3.65% <i class="mdi mdi-arrow-bottom-right"></i></span>
                    </div>
                </div>
            </div>
        </div>
        <!-- Total Applications Card -->
        <div class="col-xl-3 col-md-6">
            <div class="card border-0 shadow-sm hover-scale">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="card-title text-muted mb-1">Total Applications</h5>
                            <h2 class="mt-2 mb-0">8</h2>
                        </div>
                        <div class="icon-circle bg-primary text-white">
                            <i class="align-middle" data-feather="clipboard"></i>
                        </div>
                    </div>
                    <div class="mt-3">
                        <span class="text-muted small">Since last week</span>
                        <span class="float-end text-danger small">-3.65% <i class="mdi mdi-arrow-bottom-right"></i></span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Accepted Applications Card -->
        <div class="col-xl-3 col-md-6">
            <div class="card border-0 shadow-sm hover-scale">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="card-title text-muted mb-1">Accepted Applications</h5>
                            <h2 class="mt-2 mb-0">0</h2>
                        </div>
                        <div class="icon-circle bg-success text-white">
                            <i class="align-middle" data-feather="check-square"></i>
                        </div>
                    </div>
                    <div class="mt-3">
                        <span class="text-muted small">Since last week</span>
                        <span class="float-end text-success small">5.25% <i class="mdi mdi-arrow-bottom-right"></i></span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Rejected Applications Card -->
        <div class="col-xl-3 col-md-6">
            <div class="card border-0 shadow-sm hover-scale">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="card-title text-muted mb-1">Rejected Applications</h5>
                            <h2 class="mt-2 mb-0">2</h2>
                        </div>
                        <div class="icon-circle bg-danger text-white">
                            <i class="align-middle" data-feather="x-square"></i>
                        </div>
                    </div>
                    <div class="mt-3">
                        <span class="text-muted small">Since last week</span>
                        <span class="float-end text-danger small">-2.25% <i class="mdi mdi-arrow-bottom-right"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Application Steps Section -->
    <div class="card border-0 shadow-sm mb-5">
        <div class="card-body">
            <h5 class="card-title text-muted mb-4 text-center">Application Process</h5>
            <div class="application-steps">
                <!-- Step 1 -->
                <div class="step">
                    <div class="step-icon">
                        <i class="fas fa-search"></i>
                    </div>
                    <h3>Search for Programs</h3>
                    <p>Find the right program for your needs.</p>
                </div>
                <!-- Step 2 -->
                <div class="step">
                    <div class="step-icon">
                        <i class="fas fa-edit"></i>
                    </div>
                    <h3>Fill Application</h3>
                    <p>Complete the application form with your details.</p>
                </div>
                <!-- Step 3 -->
                <div class="step">
                    <div class="step-icon">
                        <i class="fas fa-money-bill-wave"></i>
                    </div>
                    <h3>Make Payment</h3>
                    <p>Pay the application fee securely.</p>
                </div>
                <!-- Step 4 -->
                <div class="step">
                    <div class="step-icon">
                        <i class="fas fa-bell"></i>
                    </div>
                    <h3>Get Notified</h3>
                    <p>Receive updates on your application status.</p>
                </div>
                <!-- Step 5 -->
                <div class="step">
                    <div class="step-icon">
                        <i class="fas fa-id-card"></i>
                    </div>
                    <h3>Submit Documents</h3>
                    <p>Upload required documents for verification.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Table Section -->
    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <h5 class="card-title text-muted mb-4 text-center">Active Intake</h5>
            <div class="table-responsive">
                <table class="table table-hover my-0" id="projectsTable">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th class="d-none d-xl-table-cell">Start Date</th>
                            <th class="d-none d-xl-table-cell">End Date</th>
                            <th>Status</th>
                            <th class="d-none d-md-table-cell">Assignee</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2023</td>
                            <td class="d-none d-xl-table-cell">31/06/2023</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Vanessa Tucker</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Custom CSS for Modern Design -->
<style>
    /* Global Styles */
    body {
        font-family: 'Inter', sans-serif;
        background-color: #f8f9fa;
    }

    .card {
        border: none;
        border-radius: 12px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
    }

    .icon-circle {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
    }

    .application-steps {
        display: flex;
        justify-content: space-between;
        gap: 20px;
        flex-wrap: wrap;
    }

    .step {
        flex: 1;
        text-align: center;
        padding: 20px;
        background-color: #fff;
        border-radius: 12px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
    }

    .step:hover {
        transform: translateY(-5px);
    }

    .step-icon {
        font-size: 2rem;
        color: #007bff;
        margin-bottom: 15px;
    }

    .step h3 {
        font-size: 1.1rem;
        font-weight: 600;
        margin-bottom: 10px;
        color: #2c3e50;
    }

    .step p {
        font-size: 0.9rem;
        color: #6c757d;
    }

    .table {
        border-collapse: separate;
        border-spacing: 0 8px;
    }

    .table thead th {
        border: none;
        font-weight: 500;
        color: #6c757d;
    }

    .table tbody tr {
        background-color: white;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        border-radius: 8px;
    }

    .table tbody tr:hover {
        background-color: #f8f9fa;
    }

    .badge {
        font-weight: 500;
        padding: 0.5em 0.75em;
    }
</style>
@endsection