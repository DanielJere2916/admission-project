@extends('applicant.layouts.layout')

@section('applicant_page_title')
    My Transactions
@endsection

@section('applicant_layout')
<div class="row">
    <div class="col-12">
        <!-- Transaction Summary Cards -->
        <div class="row mb-4">
            <div class="col-md-4">
                <div class="card bg-success text-white">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0">
                                <i data-feather="check-circle" class="text-white" style="width: 48px; height: 48px;"></i>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="mb-1">Successful Payments</h6>
                                <h3 class="mb-0">{{ $transactions->where('payment_status', 'success')->count() }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-warning text-white">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0">
                                <i data-feather="clock" class="text-white" style="width: 48px; height: 48px;"></i>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="mb-1">Pending Payments</h6>
                                <h3 class="mb-0">{{ $transactions->where('payment_status', 'pending')->count() }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-danger text-white">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0">
                                <i data-feather="x-circle" class="text-white" style="width: 48px; height: 48px;"></i>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="mb-1">Failed Payments</h6>
                                <h3 class="mb-0">{{ $transactions->where('payment_status', 'failed')->count() }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Transactions Table -->
        <div class="card shadow-sm">
            <div class="card-header bg-primary">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0 text-white">Transaction History</h5>
                    <a href="{{ route('applicant.select-application-type') }}" class="btn btn-light btn-sm">
                        <i class="align-middle me-1" data-feather="plus"></i>
                        New Application
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-striped datatable">
                        <thead class="table-light">
                            <tr>
                                <th>Reference</th>
                                <th>Intake Type</th>
                                <th>Amount</th>
                                <th>Method</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($transactions as $transaction)
                                <tr>
                                    <td>{{ $transaction->tx_ref }}</td>
                                    <td>
                                        <div>{{ $transaction->intake->intake_type }}</div>
                                        <small class="text-muted">{{ $transaction->intake->intake_name }} Intake</small>
                                    </td>
                                    <td>{{ number_format($transaction->amount) }} {{ $transaction->currency }}</td>
                                    <td>{{ ucfirst($transaction->payment_method ?? 'N/A') }}</td>
                                    <td>
                                        <span class="badge rounded-pill bg-{{ $transaction->payment_status === 'success' ? 'success' : ($transaction->payment_status === 'failed' ? 'danger' : 'warning') }}">
                                            {{ ucfirst($transaction->payment_status) }}
                                        </span>
                                    </td>
                                    <td>
                                        <div>{{ $transaction->created_at->format('d M Y') }}</div>
                                        <small class="text-muted">{{ $transaction->created_at->format('H:i') }}</small>
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('payments.status', $transaction->tx_ref) }}" 
                                               class="btn btn-sm btn-info"
                                               data-bs-toggle="tooltip"
                                               title="View Details">
                                                <i data-feather="eye"></i>
                                            </a>
                                            @if($transaction->payment_status === 'failed')
                                                <a href="{{ route('payments.checkout', $transaction->intake_id) }}" 
                                                   class="btn btn-sm btn-warning"
                                                   data-bs-toggle="tooltip"
                                                   title="Try Again">
                                                    <i data-feather="refresh-cw"></i>
                                                </a>
                                            @endif
                                            @if($transaction->payment_status === 'successful')
                                                <a href="{{ route('applicant.continue-application', $transaction->id) }}" 
                                                   class="btn btn-sm btn-success"
                                                   data-bs-toggle="tooltip"
                                                   title="Continue Application">
                                                    <i data-feather="arrow-right"></i>
                                                </a>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center py-4">
                                        <i data-feather="inbox" class="text-muted mb-2"></i>
                                        <p class="text-muted">No transactions found</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="d-flex justify-content-center mt-4">
                    {{ $transactions->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    // Initialize tooltips
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    });
</script>
@endpush
@endsection 