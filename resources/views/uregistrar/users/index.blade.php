@extends('uregistrar.layouts.layout')

@section('uregistrar_page_title')
    Uregistrar
@endsection

@section('uregistrar_layout')
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header bg-primary">
                    <h5 class="card-title mb-0 text-white">Manage Users</h5>
                </div>
                <div class="card-body">
                    <!-- Button to trigger the modal -->
                    <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#createUserModal">
                        <i class="align-middle" data-feather="plus"></i> Add User
                    </button>

                    <!-- Display success/error messages -->
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <!-- Users Table -->
                    <div class="table-responsive">
                        <table class="table table-hover table-striped datatable">
                            <thead class="table-light">
                                <tr>
                                    <th>SN</th>
                                    <th>Employee ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Department</th>
                                    <th>Phone Number</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $user->staffRecord->employee_id ?? 'N/A' }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            @if($user->role == 1)
                                                HOD
                                            @elseif($user->role == 2)
                                                Dean
                                            @elseif($user->role == 3)
                                                Registrar
                                            @endif
                                        </td>
                                        <td>{{ $user->department->department_name ?? 'N/A' }}</td>
                                        <td>{{ $user->phonenumber }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-sm btn-primary edit-user" 
                                                    data-bs-toggle="modal" 
                                                    data-bs-target="#editUserModal"
                                                    data-id="{{ $user->id }}"
                                                    data-name="{{ $user->name }}"
                                                    data-email="{{ $user->email }}"
                                                    data-role="{{ $user->role }}"
                                                    data-department="{{ $user->department_id }}"
                                                    data-gender="{{ $user->gender }}"
                                                    data-country="{{ $user->country }}"
                                                    data-phone="{{ $user->phonenumber }}"
                                                    data-village="{{ $user->staffRecord->village ?? '' }}"
                                                    data-qualification="{{ $user->staffRecord->qualification ?? '' }}">
                                                    <i class="align-middle" data-feather="edit"></i>
                                                </button>
                                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline delete-form">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">
                                                        <i class="align-middle" data-feather="trash-2"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Create User Modal -->
    <div class="modal fade" id="createUserModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white">Add New User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('users.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Role</label>
                                <select class="form-control" name="role" required>
                                    <option value="1">HOD</option>
                                    <option value="2">Dean</option>
                                    <option value="3">Registrar</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Department</label>
                                <select class="form-control" name="department_id" required>
                                    <option value="">Select Department</option>
                                    @foreach($departments as $department)
                                        <option value="{{ $department->id }}">{{ $department->department_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Gender</label>
                                <select class="form-control" name="gender" required>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Country</label>
                                <input type="text" class="form-control" name="country" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Phone Number</label>
                                <input type="text" class="form-control" name="phonenumber" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Village</label>
                                <input type="text" class="form-control" name="village" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Qualification</label>
                                <select class="form-control" name="qualification" required>
                                    <option value="Degree">Degree</option>
                                    <option value="Masters">Masters</option>
                                    <option value="PHD">PHD</option>
                                </select>
                            </div>
                        </div>
                        <div class="text-end mt-3">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Create User</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit User Modal -->
    <div class="modal fade" id="editUserModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white">Edit User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editUserForm" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" id="edit_name" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" id="edit_email" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Role</label>
                                <select class="form-control" name="role" id="edit_role" required>
                                    <option value="1">HOD</option>
                                    <option value="2">Dean</option>
                                    <option value="3">Registrar</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Department</label>
                                <select class="form-control" name="department_id" id="edit_department" required>
                                    <option value="">Select Department</option>
                                    @foreach($departments as $department)
                                        <option value="{{ $department->id }}">{{ $department->department_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Gender</label>
                                <select class="form-control" name="gender" id="edit_gender" required>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Country</label>
                                <input type="text" class="form-control" name="country" id="edit_country" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Phone Number</label>
                                <input type="text" class="form-control" name="phonenumber" id="edit_phone" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Village</label>
                                <input type="text" class="form-control" name="village" id="edit_village" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Qualification</label>
                                <select class="form-control" name="qualification" id="edit_qualification" required>
                                    <option value="Degree">Degree</option>
                                    <option value="Masters">Masters</option>
                                    <option value="PHD">PHD</option>
                                </select>
                            </div>
                        </div>
                        <div class="text-end mt-3">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update User</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize DataTable
            $('#usersTable').DataTable({
                "order": [[0, "asc"]],
                "pageLength": 10,
            });

            // Handle edit user button click
            $('.edit-user').on('click', function() {
                const userId = $(this).data('id');
                const form = $('#editUserForm');
                
                // Set form action URL with the correct route
                form.attr('action', "{{ route('users.update', '') }}/" + userId);
                
                // Populate form fields
                $('#edit_name').val($(this).data('name'));
                $('#edit_email').val($(this).data('email'));
                $('#edit_role').val($(this).data('role'));
                $('#edit_department').val($(this).data('department'));
                $('#edit_gender').val($(this).data('gender'));
                $('#edit_country').val($(this).data('country'));
                $('#edit_phone').val($(this).data('phone'));
                $('#edit_village').val($(this).data('village'));
                $('#edit_qualification').val($(this).data('qualification'));
            });

            // Handle delete confirmation
            $('.delete-form').on('submit', function(e) {
                e.preventDefault();
                const form = $(this);
                
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.off('submit').submit();
                    }
                });
            });

            // Auto-hide alerts after 5 seconds
            setTimeout(function() {
                $('.alert').alert('close');
            }, 5000);
        });
    </script>
    @endpush
@endsection