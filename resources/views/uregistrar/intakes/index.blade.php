@extends('uregistrar.layouts.layout')

@section('uregistrar_page_tittle')
    Manage Intakes
@endsection

@section('uregistrar_layout')
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header bg-primary">
                    <h5 class="card-title mb-0 text-white">Manage Intakes</h5>
                </div>
                <div class="card-body">
                    <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#createIntakeModal">
                        <i class="align-middle" data-feather="plus"></i> Add Intake
                    </button>

                    <div class="table-responsive">
                        <table class="table table-hover table-striped datatable">
                            <thead class="table-light">
                                <tr>
                                    <th>SN</th>
                                    <th>Intake Name</th>
                                    <th>Intake Type</th>
                                    <th>Academic Year</th>
                                    <th>Intake Start</th>
                                    <th>Intake End</th>
                                    <th>Application Fees</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($intakes as $intake)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $intake->intake_name }}</td>
                                        <td>{{ $intake->intake_type }}</td>
                                        <td>{{ $intake->academic_year }}</td>
                                        <td>{{ $intake->intake_start }}</td>
                                        <td>{{ $intake->intake_end }}</td>
                                        <td>{{ number_format($intake->application_fees) }} MK</td>
                                        <td>
                                            <span class="badge rounded-pill {{ $intake->intake_status ? 'bg-success' : 'bg-danger' }}">
                                                {{ $intake->intake_status ? 'Active' : 'Inactive' }}
                                            </span>
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-sm btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                                    <i class="align-middle" data-feather="more-vertical"></i>
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <form action="{{ route('intakes.toggle-status', $intake) }}" method="POST" class="toggle-status-form">
                                                            @csrf
                                                            @method('PATCH')
                                                            <button type="submit" class="dropdown-item">
                                                                <i class="align-middle" data-feather="{{ $intake->intake_status ? 'toggle-right' : 'toggle-left' }}"></i>
                                                                {{ $intake->intake_status ? 'Deactivate' : 'Activate' }}
                                                            </button>
                                                        </form>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#editIntakeModal{{ $intake->id }}">
                                                            <i class="align-middle" data-feather="edit"></i> Edit
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <form action="{{ route('intakes.destroy', $intake) }}" method="POST" class="delete-intake-form">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="dropdown-item text-danger">
                                                                <i class="align-middle" data-feather="trash-2"></i> Delete
                                                            </button>
                                                        </form>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>

                                    <!-- Edit Modal for each intake -->
                                    <div class="modal fade" id="editIntakeModal{{ $intake->id }}" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header bg-primary">
                                                    <h5 class="modal-title text-white">Edit Intake</h5>
                                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('intakes.update', $intake) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="mb-3">
                                                            <label class="form-label">Intake Type</label>
                                                            <input type="text" class="form-control" value="{{ $intake->intake_type }}" readonly>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <div class="col-md-6">
                                                                <label class="form-label">Intake Name (Month)</label>
                                                                <select name="month" class="form-control" required>
                                                                    @foreach(['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'] as $month)
                                                                        <option value="{{ $month }}" {{ $intake->intake_name == $month ? 'selected' : '' }}>
                                                                            {{ $month }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label class="form-label">Academic Year</label>
                                                                <input type="text" name="academic_year" class="form-control" value="{{ $intake->academic_year }}" required>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <div class="col-md-6">
                                                                <label class="form-label">Start Date</label>
                                                                <input type="date" name="intake_start" class="form-control" value="{{ $intake->intake_start }}" required>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label class="form-label">End Date</label>
                                                                <input type="date" name="intake_end" class="form-control" value="{{ $intake->intake_end }}" required>
                                                            </div>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Application Fees (MK)</label>
                                                            <input type="number" name="application_fees" class="form-control" value="{{ $intake->application_fees }}" required>
                                                        </div>
                                                        <div class="d-grid">
                                                            <button type="submit" class="btn btn-success">
                                                                <i class="align-middle me-1" data-feather="save"></i> Update Intake
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Create Intake Modal -->
    @include('uregistrar.intakes._create_modal')

    @push('scripts')
    <script>
        // SweetAlert2 for Delete Confirmation
        $('.delete-intake-form').on('submit', function(e) {
            e.preventDefault();
            const form = this;
            Swal.fire({
                title: 'Are you sure?',
                text: "This intake will be permanently deleted!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });

        // SweetAlert2 for Toggle Status Confirmation
        $('.toggle-status-form').on('submit', function(e) {
            e.preventDefault();
            const form = this;
            const isActive = form.querySelector('button').textContent.trim() === 'Deactivate';
            
            Swal.fire({
                title: 'Are you sure?',
                text: `Do you want to ${isActive ? 'deactivate' : 'activate'} this intake?`,
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: `Yes, ${isActive ? 'deactivate' : 'activate'} it!`
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });

        // SweetAlert2 for Success/Error Messages
        @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 3000
            });
        @endif

        @if(session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: "{{ session('error') }}",
                showConfirmButton: true
            });
        @endif

        // Form Validation Messages with SweetAlert2
        @if($errors->any())
            Swal.fire({
                icon: 'error',
                title: 'Validation Error',
                html: `{!! implode('<br>', $errors->all()) !!}`,
                showConfirmButton: true
            });
        @endif
    </script>
    @endpush
@endsection