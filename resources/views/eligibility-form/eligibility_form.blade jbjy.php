<div class="container">
    <h2 class="text-center mb-4">Check Visa Eligibility</h2>

    <!-- Multi-step Icons (Progress Bar) -->
    <div class="progress mb-4">
        <div class="progress-bar bg-primary" role="progressbar" style="width: 33%" id="progressStep1">Step 1</div>
        <div class="progress-bar bg-light" role="progressbar" style="width: 33%" id="progressStep2">Step 2</div>
        <div class="progress-bar bg-light" role="progressbar" style="width: 33%" id="progressStep3">Step 3</div>
    </div>

    <form id="eligibilityForm" method="POST" action="{{ route('eligibility.submit') }}"
        class="p-4 shadow-lg bg-white rounded">
        @csrf
        <!-- Step 1 -->
        <div class="step active">
            <div class="form-group">
                <label for="full_name">Full Name:</label>
                <input type="text" class="form-control" id="full_name" name="full_name"
                    placeholder="Enter your full name" required>
                <div class="invalid-feedback">Please enter your name.</div>
            </div>

            <div class="form-group">
                <label for="email">Email Address:</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email"
                    required>
                <div class="invalid-feedback">Please enter a valid email address.</div>
            </div>

            <div class="form-group">
                <label for="country">Select Country:</label>
                <select class="form-control" id="country" name="country" required>
                    <option value="">--Select Country--</option>
                    <option value="USA">USA</option>
                    <option value="Canada">Canada</option>
                    <option value="Australia">Australia</option>
                </select>
                <div class="invalid-feedback">Please select a country.</div>
            </div>
            <button type="button" class="btn btn-primary nextStep">Next</button>
        </div>

        <!-- Step 2 -->
        <div class="step">
            <div class="form-group">
                <label for="visa_type">Select Visa Type:</label>
                <select class="form-control" id="visa_type" name="visa_type" required>
                    <option value="">--Select Visa Type--</option>
                    <option value="Work Visa">Work Visa</option>
                    <option value="Student Visa">Student Visa</option>
                    <option value="Tourist Visa">Tourist Visa</option>
                </select>
                <div class="invalid-feedback">Please select a visa type.</div>
            </div>

            <div class="form-group">
                <label for="qualification">Highest Qualification:</label>
                <input type="text" class="form-control" id="qualification" name="qualification"
                    placeholder="Enter your qualification" required>
                <div class="invalid-feedback">Please enter your qualification.</div>
            </div>

            <div class="form-group">
                <label for="experience">Years of Experience:</label>
                <input type="number" class="form-control" id="experience" name="experience"
                    placeholder="Enter your years of experience" required>
                <div class="invalid-feedback">Please enter your years of experience.</div>
            </div>
            <button type="button" class="btn btn-secondary prevStep">Previous</button>
            <button type="button" class="btn btn-primary nextStep">Next</button>
        </div>

        <!-- Step 3 -->
        <div class="step">
            <div class="form-group">
                <label for="age">Age:</label>
                <input type="number" class="form-control" id="age" name="age" placeholder="Enter your age" required>
                <div class="invalid-feedback">Please enter your age.</div>
            </div>

            <div class="form-group">
                <label for="language_test">Language Proficiency Test (IELTS/TOEFL):</label>
                <input type="text" class="form-control" id="language_test" name="language_test"
                    placeholder="Enter test name and score" required>
                <div class="invalid-feedback">Please enter your language test and score.</div>
            </div>

            <button type="button" class="btn btn-secondary prevStep">Previous</button>
            <button type="submit" class="btn btn-success">Submit</button>
        </div>
    </form>

    <!-- Toaster Notification -->
    <div aria-live="polite" aria-atomic="true" style="position: fixed; top: 10px; right: 10px; z-index: 1050;">
        <div id="toast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <strong class="mr-auto">Success</strong>
                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="toast-body">
                Your eligibility has been successfully submitted.
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
    $(document).ready(function () {
        var currentStep = 0;
        var steps = $(".step");
        var progressBars = [$("#progressStep1"), $("#progressStep2"), $("#progressStep3")];

        // Show the current step
        function showStep(step) {
            steps.removeClass('active').eq(step).addClass('active');
            updateProgress(step);
        }

        // Update progress bar
        function updateProgress(step) {
            progressBars.forEach(function (bar, index) {
                if (index <= step) {
                    bar.removeClass('bg-light').addClass('bg-primary');
                } else {
                    bar.removeClass('bg-primary').addClass('bg-light');
                }
            });
        }

        // Generic function to validate all required fields in the current step
        function validateFields() {
            var isValid = true;
            steps.eq(currentStep).find("[required]").each(function () {
                var $input = $(this);
                if ($input.val() === "") {
                    isValid = false;
                    $input.addClass('is-invalid');
                    $input.next('.invalid-feedback').show();
                } else {
                    $input.removeClass('is-invalid');
                    $input.next('.invalid-feedback').hide();
                }
            });
            return isValid;
        }

        // Handle Next button click
        $(".nextStep").on('click', function () {
            if (validateFields()) {
                currentStep++;
                showStep(currentStep);
            } else {
                alert('Please fill all required fields.');
            }
        });

        // Handle Previous button click
        $(".prevStep").on('click', function () {
            currentStep--;
            showStep(currentStep);
        });

        // Form submission validation
        $("form").on('submit', function (e) {
            if (!validateFields()) {
                e.preventDefault();
                alert('Please fill all required fields before submitting.');
            } else {
                e.preventDefault(); // Prevent default form submission

                // Show toast message on success
                $("#toast").toast({ delay: 3000 });
                $("#toast").toast('show');

                // Refresh the page after toast message disappears
                setTimeout(function () {
                    location.reload();
                }, 4000);
            }
        });
    });
</script>

<style>
    .step {
        display: none;
    }

    .step.active {
        display: block;
    }

    .toast {
        background-color: #28a745;
        color: white;
    }

    .form-group {
        margin-bottom: 20px;
    }

    h2 {
        color: #007bff;
    }

    .btn {
        width: 100px;
        margin-top: 10px;
    }

    .progress-bar {
        font-weight: bold;
        text-align: center;
    }
</style>