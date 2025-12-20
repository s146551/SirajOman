<?php
require_once 'db_config.php';
require_once 'Location.class.php'; // Include the new Location class

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle Delete Request
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_id'])) {
    $delete_id = $_POST['delete_id'];
    $stmt = $conn->prepare("DELETE FROM locations WHERE id = ?");
    $stmt->bind_param("i", $delete_id);
    $stmt->execute();
    $stmt->close();
}

// Handle Search
$search_term = '';
$locations = []; // This will now hold Location objects
$sql = "SELECT id, governorate, wilaya, attraction FROM locations";
if (isset($_GET['search']) && !empty($_GET['search'])) {
    $search_term = $_GET['search'];
    $sql .= " WHERE governorate LIKE ? OR wilaya LIKE ? OR attraction LIKE ?";
    $stmt = $conn->prepare($sql);
    $search_param = "%" . $search_term . "%";
    $stmt->bind_param("sss", $search_param, $search_param, $search_param);
} else {
    $stmt = $conn->prepare($sql);
}

$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        // Create a Location object for each row
        $locations[] = new Location($row['id'], $row['governorate'], $row['wilaya'], $row['attraction']);
    }
}
$stmt->close();
$conn->close();

// Function to display locations in an XHTML table using Location objects
function displayLocationsTable($locationsArray) {
    if (empty($locationsArray)) {
        return '<div class="row text-center mb-3"><div class="col">No locations found.</div></div>';
    }

    $html = '';
    foreach ($locationsArray as $loc) {
        $html .= '<div class="row text-center mb-3 border-bottom align-items-center p-2">';
        $html .= '<div class="col-md-3">' . htmlspecialchars($loc->getGovernorate()) . '</div>';
        $html .= '<div class="col-md-3">' . htmlspecialchars($loc->getWilaya()) . '</div>';
        $html .= '<div class="col-md-3">' . htmlspecialchars($loc->getAttraction()) . '</div>'; // Changed to col-md-3
        $html .= '<div class="col-md-3 d-flex justify-content-around">'; // Changed to col-md-3 and added flex for buttons
        $html .= '<a href="edit_location.php?id=' . $loc->getId() . '" class="btn btn-sm btn-info me-1">Edit</a>'; // Edit button
        $html .= '<form action="page1.php" method="post" onsubmit="return confirm(\'Are you sure you want to delete this location?\');">';
        $html .= '<input type="hidden" name="delete_id" value="' . $loc->getId() . '">';
        $html .= '<button type="submit" class="btn btn-sm btn-danger">Delete</button>';
        $html .= '</form>';
        $html .= '</div>';
        $html .= '</div>';
    }
    return $html;
}

$pageTitle = "Locations & Places";
include 'header.php';
?>
  
  <div class="container mb-5">

    <h2 class="text-center mb-4 fw-bold">Locations & Places</h2>
    <p class="text-center mb-4 fs-5"> The following shows some of the Oman governorates, wilayats and tourist attractions:</p>

    <form action="page1.php" method="get" class="row mb-5">
        <div class="col-md-10">
            <input type="text" name="search" class="form-control" placeholder="Search governorate, wilaya or attraction" value="<?= htmlspecialchars($search_term) ?>">
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-primary w-100">Search</button>
        </div>
    </form>

    <div class="bg-light mt-4">
        <div class="row bg-info text-dark text-center mb-2 fw-bold p-2">
            <div class="col-md-3">Governorates</div>
            <div class="col-md-3">Wilaya</div>
            <div class="col-md-3">Tourist Attractions</div>
            <div class="col-md-3">Action</div>

        <div id="locationsContainer">
            <?php echo displayLocationsTable($locations); ?>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>