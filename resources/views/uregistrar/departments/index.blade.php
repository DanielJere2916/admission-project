@extends('uregistrar.layouts.layout')

@section('uregistrar_page_tittle')
    Manage Departments
@endsection

@section('uregistrar_layout')
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header bg-primary">
                    <h5 class="card-title mb-0 text-white">Manage Departments</h5>
                </div>
                <div class="card-body">
                    <!-- Button to trigger the modal -->
                    <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#createDepartmentModal">
                        <i class="align-middle" data-feather="plus"></i> Add Department
                    </button>

                    <!-- Department Table -->
                    <div class="table-responsive">
                        <table class="table table-hover datatable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Department Name</th>
                                    <th>Faculty</th>
                                    <th>Acronym</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($departments as $department)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $department->department_name }}</td>
                                        <td>{{ $department->faculty->faculty_name }}</td>
                                        <td>{{ $department->department_acronym }}</td>
                                        <td>
                                            <span class="badge {{ $department->department_status ? 'bg-success' : 'bg-danger' }}">
                                                {{ $department->department_status ? 'Active' : 'Inactive' }}
                                            </span>
                                        </td>
                                        <td>
                                            <button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#editDepartmentModal{{ $department->id }}">
                                                <i data-feather="edit"></i>
                                            </button>
                                            <button class="btn btn-sm btn-danger" onclick="confirmDelete('{{ route('departments.destroy', $department->id) }}')">
                                                <i data-feather="trash-2"></i>
                                            </button>
                                        </td>
                                    </tr>

                                    <!-- Edit Department Modal -->
                                    <div class="modal fade" id="editDepartmentModal{{ $department->id }}" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Edit Department</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form action="{{ route('departments.update', $department->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label for="faculty_id" class="form-label">Faculty</label>
                                                            <select class="form-select" id="faculty_id" name="faculty_id" required>
                                                                @foreach($faculties as $faculty)
                                                                    <option value="{{ $faculty->id }}" {{ $department->faculty_id == $faculty->id ? 'selected' : '' }}>
                                                                        {{ $faculty->faculty_name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="department_name" class="form-label">Department Name</label>
                                                            <input type="text" class="form-control" id="department_name" name="department_name" value="{{ $department->department_name }}" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="department_acronym" class="form-label">Department Acronym</label>
                                                            <input type="text" class="form-control" id="department_acronym" name="department_acronym" value="{{ $department->department_acronym }}" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Status</label>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="department_status" id="active{{ $department->id }}" value="1" {{ $department->department_status ? 'checked' : '' }}>
                                                                <label class="form-check-label" for="active{{ $department->id }}">Active</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="department_status" id="inactive{{ $department->id }}" value="0" {{ !$department->department_status ? 'checked' : '' }}>
                                                                <label class="form-check-label" for="inactive{{ $department->id }}">Inactive</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Update Department</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">No departments found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Create Department Modal -->
    <div class="modal fade" id="createDepartmentModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create New Department</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('departments.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="faculty_id" class="form-label">Faculty</label>
                            <select class="form-select" id="faculty_id" name="faculty_id" required>
                                <option value="">Select Faculty</option>
                                @foreach($faculties as $faculty)
                                    <option value="{{ $faculty->id }}">{{ $faculty->faculty_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="department_name" class="form-label">Department Name</label>
                            <input type="text" class="form-control" id="department_name" name="department_name" required>
                        </div>
                        <div class="mb-3">
                            <label for="department_acronym" class="form-label">Department Acronym</label>
                            <input type="text" class="form-control" id="department_acronym" name="department_acronym" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Create Department</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection