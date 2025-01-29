@extends('uregistrar.layouts.layout')

@section('uregistrar_page_tittle')
    Manage Faculties
@endsection

@section('uregistrar_layout')
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header bg-primary">
                    <h5 class="card-title mb-0 text-white">Manage Faculties</h5>
                </div>
                <div class="card-body">
                    <!-- Button to trigger the modal -->
                    <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#createFacultyModal">
                        <i class="align-middle" data-feather="plus"></i> Add Faculty
                    </button>

                    <!-- Faculty Table -->
                    <div class="table-responsive">
                        <table class="table table-hover datatable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Faculty Name</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($faculties as $faculty)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $faculty->faculty_name }}</td>
                                        <td>
                                            <span class="badge {{ $faculty->faculty_status ? 'bg-success' : 'bg-danger' }}">
                                                {{ $faculty->faculty_status ? 'Active' : 'Inactive' }}
                                            </span>
                                        </td>
                                        <td>
                                            <button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#editFacultyModal{{ $faculty->id }}">
                                                <i data-feather="edit"></i>
                                            </button>
                                            <button class="btn btn-sm btn-danger" onclick="confirmDelete('{{ route('faculties.destroy', $faculty->id) }}')">
                                                <i data-feather="trash-2"></i>
                                            </button>
                                        </td>
                                    </tr>

                                    <!-- Edit Faculty Modal -->
                                    <div class="modal fade" id="editFacultyModal{{ $faculty->id }}" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Edit Faculty</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form action="{{ route('faculties.update', $faculty->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label for="faculty_name" class="form-label">Faculty Name</label>
                                                            <input type="text" class="form-control" id="faculty_name" name="faculty_name" value="{{ $faculty->faculty_name }}" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Status</label>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="faculty_status" id="active{{ $faculty->id }}" value="1" {{ $faculty->faculty_status ? 'checked' : '' }}>
                                                                <label class="form-check-label" for="active{{ $faculty->id }}">Active</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="faculty_status" id="inactive{{ $faculty->id }}" value="0" {{ !$faculty->faculty_status ? 'checked' : '' }}>
                                                                <label class="form-check-label" for="inactive{{ $faculty->id }}">Inactive</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Update Faculty</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center">No faculties found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Create Faculty Modal -->
    <div class="modal fade" id="createFacultyModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create New Faculty</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('faculties.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="faculty_name" class="form-label">Faculty Name</label>
                            <input type="text" class="form-control" id="faculty_name" name="faculty_name" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Create Faculty</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection