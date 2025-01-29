<!-- Modal for Creating Intake -->
<div class="modal fade" id="createIntakeModal" tabindex="-1" aria-labelledby="createIntakeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="createIntakeModalLabel">Create Intake</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('intakes.store') }}" method="POST" id="createIntakeForm">
                    @csrf
                    <!-- Intake Type with Checkboxes -->
                    <div class="mb-3">
                        <label class="form-label">Intake Type</label>
                        <div class="d-flex flex-wrap gap-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="education[]" id="bridging" value="Bridging">
                                <label class="form-check-label" for="bridging">Bridging</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="education[]" id="postgraduate" value="Postgraduate" onchange="togglePostgraduateFees()">
                                <label class="form-check-label" for="postgraduate">Postgraduate</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="education[]" id="undergraduate" value="Undergraduate">
                                <label class="form-check-label" for="undergraduate">Undergraduate</label>
                            </div>
                        </div>
                    </div>

                    <!-- Intake Name and Academic Year -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Intake Name (Month)</label>
                            <select name="month" class="form-control" required>
                                <option value="">Select Month</option>
                                @foreach(['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'] as $month)
                                    <option value="{{ $month }}">{{ $month }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Academic Year</label>
                            <input type="text" name="academic_year" class="form-control" placeholder="e.g., 2023/24" required>
                        </div>
                    </div>

                    <!-- Intake Dates -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Start Date</label>
                            <input type="date" name="intake_start" class="form-control" min="{{ date('Y-m-d') }}" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">End Date</label>
                            <input type="date" name="intake_end" class="form-control" min="{{ date('Y-m-d') }}" required>
                        </div>
                    </div>

                    <!-- Application Fees -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Postgraduate Fees (MK)</label>
                            <input type="number" name="post_fees" class="form-control" placeholder="Enter amount" disabled>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Other Fees (MK)</label>
                            <input type="number" name="other_fees" class="form-control" placeholder="Enter amount" required>
                        </div>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-success">
                            <i class="align-middle me-1" data-feather="save"></i> Create Intake
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function togglePostgraduateFees() {
        const postgraduateCheckbox = document.getElementById('postgraduate');
        const postFeesInput = document.querySelector('input[name="post_fees"]');
        postFeesInput.disabled = !postgraduateCheckbox.checked;
        if (!postgraduateCheckbox.checked) {
            postFeesInput.value = '';
        }
    }

    document.getElementById('createIntakeForm').addEventListener('submit', function(e) {
        const checkedTypes = document.querySelectorAll('input[name="education[]"]:checked');
        if (checkedTypes.length === 0) {
            e.preventDefault();
            Swal.fire({
                icon: 'error',
                title: 'Validation Error',
                text: 'Please select at least one intake type',
                showConfirmButton: true
            });
        }
    });
</script> 