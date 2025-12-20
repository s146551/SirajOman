<?php
require_once 'db_config.php';

$message = ''; // Initialize message variable

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get form data and sanitize
    $governorate = $conn->real_escape_string($_POST['governorate']);
    $wilaya = $conn->real_escape_string($_POST['wilaya']);
    $attraction = $conn->real_escape_string($_POST['attraction']);

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO locations (governorate, wilaya, attraction) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $governorate, $wilaya, $attraction);

    // Execute and check
    if ($stmt->execute()) {
        $message = "<div class='alert alert-success mt-3'>New location added successfully!</div>";
    } else {
        $message = "<div class='alert alert-danger mt-3'>Error: " . $stmt->error . "</div>";
    }

    $stmt->close();
    $conn->close();
}

$pageTitle = "Add a new Location";
include 'header.php';
?>

  <div class="container mt-4">
    <div class="bg-light p-4 rounded shadow-sm">
    
        <h1 class="text-primary">Add a New Location</h1>
        <p class="text-secondary">Use this form to add a new tourist location to the list on the "Locations & Places" page.</p>
        <?php echo $message; ?>

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