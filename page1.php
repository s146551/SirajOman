<?php
require_once 'db_config.php';

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
$locations = [];
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
        $locations[] = $row;
    }
}
$stmt->close();
$conn->close();

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
        <div class="row bg-info text-white text-center mb-2 fw-bold p-2">
            <div class="col-md-3">Governorates</div>
            <div class="col-md-3">Wilaya</div>
            <div class="col-md-4">Tourist Attractions</div>
            <div class="col-md-2">Action</div>
        </div>

        <div id="locationsContainer">
            <?php if (empty($locations)): ?>
                <div class="row text-center mb-3"><div class="col">No locations found.</div></div>
            <?php else: ?>
                <?php foreach ($locations as $loc): ?>
                <div class="row text-center mb-3 border-bottom align-items-center p-2">
                    <div class="col-md-3"><?= htmlspecialchars($loc['governorate']) ?></div>
                    <div class="col-md-3"><?= htmlspecialchars($loc['wilaya']) ?></div>
                    <div class="col-md-4"><?= htmlspecialchars($loc['attraction']) ?></div>
                    <div class="col-md-2">
                        <form action="page1.php" method="post" onsubmit="return confirm('Are you sure you want to delete this location?');">
                            <input type="hidden" name="delete_id" value="<?= $loc['id'] ?>">
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>