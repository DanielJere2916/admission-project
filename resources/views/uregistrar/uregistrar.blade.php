@extends('uregistrar.layouts.layout')

@section('uregistrar_page_tittle')
    Uregistrar
@endsection

@section('uregistrar_layout')
<div class="container-fluid p-4">
        <!-- Cards Section -->
        <div class="row g-4 mb-5">
            <!-- Sales Card -->
            <div class="col-xl-3 col-md-6">
                <div class="card border-0 shadow-sm hover-scale">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="card-title text-muted mb-1">Sales</h5>
                                <h2 class="mt-2 mb-0">2.382</h2>
                            </div>
                            <div class="icon-circle bg-primary text-white">
                                <i class="align-middle" data-feather="truck"></i>
                            </div>
                        </div>
                        <div class="mt-3">
                            <span class="text-muted small">Since last week</span>
                            <span class="float-end text-danger small">-3.65% <i class="mdi mdi-arrow-bottom-right"></i></span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Visitors Card -->
            <div class="col-xl-3 col-md-6">
                <div class="card border-0 shadow-sm hover-scale">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="card-title text-muted mb-1">Users</h5>
                                <h2 class="mt-2 mb-0">{{ $totalUsersCount }}</h2>
                            </div>
                            <div class="icon-circle bg-success text-white">
                                <i class="align-middle" data-feather="users"></i>
                            </div>
                        </div>
                        <div class="mt-3">
                            <span class="text-muted small">Since last week</span>
                            <span class="float-end text-success small">5.25% <i class="mdi mdi-arrow-bottom-right"></i></span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings Card -->
            <div class="col-xl-3 col-md-6">
                <div class="card border-0 shadow-sm hover-scale">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="card-title text-muted mb-1">Programs</h5>
                                <h2 class="mt-2 mb-0">{{   $totalActiveprogramsCount }}</h2>
                            </div>
                            <div class="icon-circle bg-info text-white">
                                <i class="align-middle" data-feather="dollar-sign"></i>
                            </div>
                        </div>
                        <div class="mt-3">
                            <span class="text-muted small">Since last week</span>
                            <span class="float-end text-success small">6.65% <i class="mdi mdi-arrow-bottom-right"></i></span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Orders Card -->
            <div class="col-xl-3 col-md-6">
                <div class="card border-0 shadow-sm hover-scale">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="card-title text-muted mb-1">Departments</h5>
                                <h2 class="mt-2 mb-0">{{ $totalActiveDepartmentsCount  }}</h2>
                            </div>
                            <div class="icon-circle bg-warning text-white">
                                <i class="align-middle" data-feather="shopping-cart"></i>
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

        <!-- Table Section -->
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <h5 class="card-title text-muted mb-4">Latest Projects</h5>
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
                            <tr>
                                <td>Project Fireball</td>
                                <td class="d-none d-xl-table-cell">01/01/2023</td>
                                <td class="d-none d-xl-table-cell">31/06/2023</td>
                                <td><span class="badge bg-danger">Cancelled</span></td>
                                <td class="d-none d-md-table-cell">William Harris</td>
                            </tr>
                            <tr>
                                <td>Project Hades</td>
                                <td class="d-none d-xl-table-cell">01/01/2023</td>
                                <td class="d-none d-xl-table-cell">31/06/2023</td>
                                <td><span class="badge bg-success">Done</span></td>
                                <td class="d-none d-md-table-cell">Sharon Lessman</td>
                            </tr>
                            <tr>
                                <td>Project Nitro</td>
                                <td class="d-none d-xl-table-cell">01/01/2023</td>
                                <td class="d-none d-xl-table-cell">31/06/2023</td>
                                <td><span class="badge bg-warning">In progress</span></td>
                                <td class="d-none d-md-table-cell">Vanessa Tucker</td>
                            </tr>
                            <tr>
                                <td>Project Phoenix</td>
                                <td class="d-none d-xl-table-cell">01/01/2023</td>
                                <td class="d-none d-xl-table-cell">31/06/2023</td>
                                <td><span class="badge bg-success">Done</span></td>
                                <td class="d-none d-md-table-cell">William Harris</td>
                            </tr>
                            <tr>
                                <td>Project X</td>
                                <td class="d-none d-xl-table-cell">01/01/2023</td>
                                <td class="d-none d-xl-table-cell">31/06/2023</td>
                                <td><span class="badge bg-success">Done</span></td>
                                <td class="d-none d-md-table-cell">Sharon Lessman</td>
                            </tr>
                            <tr>
                                <td>Project Romeo</td>
                                <td class="d-none d-xl-table-cell">01/01/2023</td>
                                <td class="d-none d-xl-table-cell">31/06/2023</td>
                                <td><span class="badge bg-success">Done</span></td>
                                <td class="d-none d-md-table-cell">Christina Mason</td>
                            </tr>
                            <tr>
                                <td>Project Wombat</td>
                                <td class="d-none d-xl-table-cell">01/01/2023</td>
                                <td class="d-none d-xl-table-cell">31/06/2023</td>
                                <td><span class="badge bg-warning">In progress</span></td>
                                <td class="d-none d-md-table-cell">William Harris</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Custom CSS for Hover Effects and Professional Look -->
    <style>
        .hover-scale {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .hover-scale:hover {
            transform: scale(1.03);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
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
        .card {
            border-radius: 10px;
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