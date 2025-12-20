<?php
require_once 'db_config.php';
require_once 'Location.class.php';
$pageTitle = "Edit Location";
include 'header.php';

$location = null;
$message = '';

// Handle GET request to display form
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("SELECT id, governorate, wilaya, attraction FROM locations WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $location = new Location($row['id'], $row['governorate'], $row['wilaya'], $row['attraction']);
    } else {
        $message = "<div class='alert alert-warning mt-3'>Location not found.</div>";
    }

    $stmt->close();
    $conn->close();
}

// Handle POST request to update data
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = $_POST['id'];
    $governorate = $_POST['governorate'];
    $wilaya = $_POST['wilaya'];
    $attraction = $_POST['attraction'];

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("UPDATE locations SET governorate = ?, wilaya = ?, attraction = ? WHERE id = ?");
    $stmt->bind_param("sssi", $governorate, $wilaya, $attraction, $id);

    if ($stmt->execute()) {
        $message = "<div class='alert alert-success mt-3'>Location updated successfully!</div>";
        // After update, refetch to show latest data
        $stmt_select = $conn->prepare("SELECT id, governorate, wilaya, attraction FROM locations WHERE id = ?");
        $stmt_select->bind_param("i", $id);
        $stmt_select->execute();
        $result_select = $stmt_select->get_result();
        $row_select = $result_select->fetch_assoc();
        $location = new Location($row_select['id'], $row_select['governorate'], $row_select['wilaya'], $row_select['attraction']);
        $stmt_select->close();

    } else {
        $message = "<div class='alert alert-danger mt-3'>Error updating location: " . $stmt->error . "</div>";
    }

    $stmt->close();
    $conn->close();
}
?>

<div class="container mt-4">
    <div class="bg-light p-4 rounded shadow-sm">
        <h1 class="text-primary">Edit Location</h1>
        <p class="text-secondary">Use this form to modify an existing location record.</p>
        <?php echo $message; ?>

        <?php if ($location): ?>
        <form action="edit_location.php" method="post" class="mt-4">
            <input type="hidden" name="id" value="<?= htmlspecialchars($location->getId()) ?>">
            
            <div class="mb-3">
                <label for="governorate" class="form-label">Governorate:</label>
                <input type="text" id="governorate" name="governorate" class="form-control" value="<?= htmlspecialchars($location->getGovernorate()) ?>" required>
            </div>
            
            <div class="mb-3">
                <label for="wilaya" class="form-label">Wilaya:</label>
                <input type="text" id="wilaya" name="wilaya" class="form-control" value="<?= htmlspecialchars($location->getWilaya()) ?>">
            </div>

            <div class="mb-3">
                <label for="attraction" class="form-label">Attraction:</label>
                <input type="text" id="attraction" name="attraction" class="form-control" value="<?= htmlspecialchars($location->getAttraction()) ?>" required>
            </div>

            <input type="submit" class="btn btn-primary w-100" value="Update Location">
        </form>
        <?php elseif (empty($message)): ?>
            <div class='alert alert-info mt-3'>Please provide a location ID to edit.</div>
        <?php endif; ?>
    </div>
</div>

<?php include 'footer.php'; ?>