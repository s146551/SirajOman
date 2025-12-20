<?php
$pageTitle = "Trip Cost Calculator";
include 'header.php';
?>

    <div class="container mt-5">

        <div class="bg-white p-4 shadow rounded">

            <h2 class="text-center text-primary mb-4">Trip Cost Calculator</h2>

            <p class="text-secondary text-center">
                Use this calculator to estimate the total cost of visiting a location.
            </p>

            <form id="calcForm" onsubmit="return calculateTotal()">

                <!-- Select location -->
                <div class="mb-3">
                    <label class="form-label fw-bold">Select Location:</label>
                    <select id="location" class="form-select" required>
                        <option value="">Choose...</option>
                        <option value="10">Muscat - 10 OMR</option>
                        <option value="13">Sur - 13 OMR</option>
                        <option value="15">Nizwa - 15 OMR</option>
                        <option value="20">Suhar - 20 OMR</option>
                        <option value="25">Salalah - 25 OMR</option>
                        
                    </select>
                </div>

                <!-- Number of visitors -->
                <div class="mb-3">
                    <label class="form-label fw-bold">Number of Visitors:</label>
                    <input type="number" id="visitors" class="form-control" min="1" required> 5% discount if visitors are more than 5
                </div>

                <!-- Transport -->
                <div class="mb-3">
                    <label class="form-label fw-bold">Transport Type:</label>
                    <select id="transport" class="form-select">
                        <option value="0">Walking - Free</option>
                        <option value="3">Bus - 3 OMR</option>
                        <option value="4">Car - 4 OMR</option>
                        <option value="1.5">Bike - 1.5 OMR</option>

                        
                    </select>
                </div>

                <!-- Optional services -->
                <div class="mb-3">
                    <label class="form-label fw-bold">Optional Services:</label>

                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" value="5" name="services" id="s1">
                        <label class="form-check-label" for="s1">Guide Service - 5 OMR</label>
                    </div>

                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" value="3" name="services" id="s2">
                        <label class="form-check-label" for="s2">Food Package - 3 OMR</label>
                    </div>

                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" value="7" name="services" id="s3">
                        <label class="form-check-label" for="s3">Camping Gear - 7 OMR</label>
                    </div>
                </div>

                <!-- Submit -->
                <button type="submit" class="btn btn-primary w-100">Calculate Total</button>

            </form>

            <hr class="my-4">

            <!-- Result -->
            <div id="result" class="alert alert-info text-center fw-bold d-none"></div>

        </div>
    </div>
    <script src="calculate.js"></script>
<?php include 'footer.php'; ?>
