<?php
$pageTitle = "Your Opinion";
include 'header.php';
?>

   <div class="container my-4">

    <!-- Suggestions Form -->
    <div class="p-4 bg-light border rounded shadow-sm mb-5">
        <h2 class="text-primary mb-3">Suggestions</h2>

        <form action="suggestions.php" method="post" onsubmit="return validateSuggestions()">

            <div class="row mb-3">
                <div class="col-sm-6">
                    <label class="form-label">Name:</label>
                    <input type="text" id="userName" name="userName" class="form-control" required>
                    <span id="nameError" class="text-danger small"></span>
                </div>

                <div class="col-sm-6">
                    <label class="form-label">Phone Number:</label>
                    <input type="text" id="userPhone" name="userPhone" class="form-control" required>
                    <span id="phoneError" class="text-danger small"></span>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Please write your suggestions:</label>
                <textarea id="userSuggestions" name="suggestions" class="form-control" rows="4" required></textarea>
                <span id="suggestError" class="text-danger small"></span>
            </div>

            <input type="submit" class="btn btn-primary w-100">
        </form>
    </div>

    <!-- Rating Form -->
    <div class="p-4 bg-light border rounded shadow-sm">
        <h2 class="text-success mb-3">Rate Our Website</h2>

        <form action="ratings.php" method="post" onsubmit="return validateRating()">

            <label class="form-label d-block">How many stars?</label>

            <div class="mb-3">
                <div class="form-check form-check-inline">
                    <input type="radio" name="rate" value="1" class="form-check-input" id="rate1" required>
                    <label class="form-check-label" for="rate1">1 ⭐</label>
                </div>

                <div class="form-check form-check-inline">
                    <input type="radio" name="rate" value="2" class="form-check-input" id="rate2">
                    <label class="form-check-label" for="rate2">2 ⭐</label>
                </div>

                <div class="form-check form-check-inline">
                    <input type="radio" name="rate" value="3" class="form-check-input" id="rate3">
                    <label class="form-check-label" for="rate3">3 ⭐</label>
                </div>

                <div class="form-check form-check-inline">
                    <input type="radio" name="rate" value="4" class="form-check-input" id="rate4">
                    <label class="form-check-label" for="rate4">4 ⭐</label>
                </div>

                <div class="form-check form-check-inline">
                    <input type="radio" name="rate" value="5" class="form-check-input" id="rate5">
                    <label class="form-check-label" for="rate5">5 ⭐</label>
                </div>
                <span id="rateError" class="text-danger d-block small"></span>
            </div>

            <div class="mb-3">
                <label class="form-label">What do you like in our website?</label>
                <textarea id="userFeedback" name="feedback" class="form-control" rows="4" required></textarea>
                <span id="feedbackError" class="text-danger small"></span>
            </div>

            <input type="submit" class="btn btn-success w-100">
        </form>
    </div>
  </div>
    <script src="page5.js"> </script>
<?php include 'footer.php'; ?>