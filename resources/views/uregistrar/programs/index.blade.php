@extends('uregistrar.layouts.layout')

@section('uregistrar_page_tittle')
    Manage Programs
@endsection

@section('uregistrar_layout')
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header bg-primary">
                    <h5 class="card-title mb-0 text-white">Manage Programs</h5>
                </div>
                <div class="card-body">
                    <!-- Button to trigger the modal -->
                    <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#createProgramModal">
                        <i class="align-middle" data-feather="plus"></i> Add Program
                    </button>

                    <!-- Program Table -->
                    <div class="table-responsive">
                        <table class="table table-hover datatable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Program Name</th>
                                    <th>Department</th>
                                    <th>Acronym</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($programs as $program)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $program->program_name }}</td>
                                        <td>{{ $program->department->department_name }}</td>
                                        <td>{{ $program->program_acronym }}</td>
                                        <td>
                                            <span class="badge {{ $program->program_status ? 'bg-success' : 'bg-danger' }}">
                                                {{ $program->program_status ? 'Active' : 'Inactive' }}
                                            </span>
                                        </td>
                                        <td>
                                            <button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#editProgramModal{{ $program->id }}">
                                                <i data-feather="edit"></i>
                                            </button>
                                            <button class="btn btn-sm btn-danger" onclick="confirmDelete('{{ route('programs.destroy', $program->id) }}')">
                                                <i data-feather="trash-2"></i>
                                            </button>
                                        </td>
                                    </tr>

                                    <!-- Edit Program Modal -->
                                    <div class="modal fade" id="editProgramModal{{ $program->id }}" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Edit Program</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form action="{{ route('programs.update', $program->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label for="department_id" class="form-label">Department</label>
                                                            <select class="form-select" id="department_id" name="department_id" required>
                                                                @foreach($department as $dept)
                                                                    <option value="{{ $dept->id }}" {{ $program->department_id == $dept->id ? 'selected' : '' }}>
                                                                        {{ $dept->department_name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="program_name" class="form-label">Program Name</label>
                                                            <input type="text" class="form-control" id="program_name" name="program_name" value="{{ $program->program_name }}" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="program_acronym" class="form-label">Program Acronym</label>
                                                            <input type="text" class="form-control" id="program_acronym" name="program_acronym" value="{{ $program->program_acronym }}" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Status</label>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="program_status" id="active{{ $program->id }}" value="1" {{ $program->program_status ? 'checked' : '' }}>
                                                                <label class="form-check-label" for="active{{ $program->id }}">Active</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="program_status" id="inactive{{ $program->id }}" value="0" {{ !$program->program_status ? 'checked' : '' }}>
                                                                <label class="form-check-label" for="inactive{{ $program->id }}">Inactive</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Update Program</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">No programs found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Create Program Modal -->
    <div class="modal fade" id="createProgramModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create New Program</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('programs.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="department_id" class="form-label">Department</label>
                            <select class="form-select" id="department_id" name="department_id" required>
                                <option value="">Select Department</option>
                                @foreach($department as $dept)
                                    <option value="{{ $dept->id }}">{{ $dept->department_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="program_name" class="form-label">Program Name</label>
                            <input type="text" class="form-control" id="program_name" name="program_name" required>
                        </div>
                        <div class="mb-3">
                            <label for="program_acronym" class="form-label">Program Acronym</label>
                            <input type="text" class="form-control" id="program_acronym" name="program_acronym" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Create Program</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection