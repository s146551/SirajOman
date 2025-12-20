<?php
$pageTitle = "Visitor Questionnaire";
include 'header.php';
?>

<div class="container mt-5">

    <div class="bg-white p-4 shadow rounded">
        <h1 class="text-center text-success mb-4">Visitor Experience Questionnaire</h1>
        <p class="text-center text-secondary">Please tell us about your visit. Your feedback helps us improve!</p>

        <form id="questionnaireForm" action="questionnaire.php" method="post" class="mt-4" onsubmit="return validateForm()">

            <!-- Name + Email -->
            <div class="row mb-4">
                <div class="col-md-6">
                    <label class="form-label fw-bold">Your Name:</label>
                    <input type="text" id="name" name="visitor_name" class="form-control" required>
                    <span id="nameError" class="text-danger small"></span>
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-bold">Email (Gmail only):</label>
                    <input type="email" id="email" name="visitor_email" class="form-control" required>
                    <small class="text-muted">Must be a Gmail address.</small>
                    <span id="emailError" class="text-danger small"></span>
                </div>
            </div>

            <!-- Date of Visit -->
            <div class="mb-4">
                <label class="form-label fw-bold">Date of visit:</label>
                <input type="date" id="visitDate" name="visit_date" class="form-control" required>
                <span id="dateError" class="text-danger small"></span>
            </div>

            <!-- First Time Visit -->
            <div class="mb-4">
                <label class="form-label fw-bold mb-2">Is this your first time visiting?</label><br>

                <div class="form-check form-check-inline">
                    <input type="radio" name="firstTime" value="yes" class="form-check-input" id="fy" required>
                    <label class="form-check-label" for="fy">Yes</label>
                </div>

                <div class="form-check form-check-inline">
                    <input type="radio" name="firstTime" value="no" class="form-check-input" id="fn">
                    <label class="form-check-label" for="fn">No</label>
                </div>
                <br><span id="firstTimeError" class="text-danger small"></span>
            </div>

            <!-- Purpose -->
            <div class="mb-4">
                <label class="form-label fw-bold">Purpose of your visit:</label>
                <select id="purpose" name="purpose" class="form-select" required>
                    <option value="none">Select...</option>
                    <option value="tourism">Tourism</option>
                    <option value="study">Study</option>
                    <option value="work">Work</option>
                    <option value="family">Family Visit</option>
                    <option value="other">Other</option>
                </select>
                <span id="purposeError" class="text-danger small"></span>
            </div>

            <!-- Enjoyed Items -->
            <div class="mb-4">
                <label class="form-label fw-bold">What did you enjoy the most? (Select at least one)</label>

                <div class="form-check">
                    <input type="checkbox" name="likes" value="Nature" class="form-check-input" id="like1">
                    <label class="form-check-label" for="like1">Nature</label>
                </div>

                <div class="form-check">
                    <input type="checkbox" name="likes" value="Safety" class="form-check-input" id="like2">
                    <label class="form-check-label" for="like2">Safety</label>
                </div>

                <div class="form-check">
                    <input type="checkbox" name="likes" value="Cleanliness" class="form-check-input" id="like3">
                    <label class="form-check-label" for="like3">Cleanliness</label>
                </div>

                <div class="form-check">
                    <input type="checkbox" name="likes" value="Food" class="form-check-input" id="like4">
                    <label class="form-check-label" for="like4">Food</label>
                </div>

                <div class="form-check">
                    <input type="checkbox" name="likes" value="weather" class="form-check-input" id="like5">
                    <label class="form-check-label" for="like5">weather</label>
                </div>

                 <div class="form-check">
                    <input type="checkbox" name="likes" value="Culture" class="form-check-input" id="like6">
                    <label class="form-check-label" for="like5">Culture</label>
                </div>
                <span id="likesError" class="text-danger small"></span>
            </div>

            <!-- Comments -->
            <div class="mb-4">
                <label class="form-label fw-bold">Additional Comments:</label>
                <textarea id="comments" name="comments" class="form-control" rows="4" required></textarea>
                <span id="commentsError" class="text-danger small"></span>
            </div>

            <!-- Submit -->
            <button type="submit" class="btn btn-success w-100">Submit Feedback</button>

        </form>
    </div>

</div>
<script src="questionnaire.js"></script>
<?php include 'footer.php'; ?>
