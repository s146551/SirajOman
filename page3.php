<?php
$pageTitle = "Add a new Location";
include 'header.php';
?>

  <div class="container mt-4">
    <div class="bg-light p-4 rounded shadow-sm">
    
        <h1 class="text-primary">Add a New Location</h1>
        <p class="text-secondary">Use this form to add a new tourist location to the list on the "Locations & Places" page.</p>

        <form action="page3.php" method="post" id="add_location_form" class="mt-4" onsubmit="return validateAddLocation()">

            <div class="mb-3">
                <label for="governorate" class="form-label">Governorate:</label>
                <input type="text" id="governorate" name="governorate" class="form-control" required>
                <span id="govError" class="text-danger small"></span>
            </div>
            
            <div class="mb-3">
                <label for="wilaya" class="form-label">Wilaya:</label>
                <input type="text" id="wilaya" name="wilaya" class="form-control">
                <span id="wilayaError" class="text-danger small"></span>
            </div>

            <div class="mb-3">
                <label for="attraction" class="form-label">Attraction:</label>
                <input type="text" id="attraction" name="attraction" class="form-control" required>
                <span id="attrError" class="text-danger small"></span>
            </div>

            <input type="submit" class="btn btn-primary w-100">

        </form>
    </div>
  </div>
    <script src="page3.js"></script>
<?php include 'footer.php'; ?>