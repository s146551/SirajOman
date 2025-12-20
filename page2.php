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
    $stmt = $conn->prepare("DELETE FROM activities WHERE id = ?");
    $stmt->bind_param("i", $delete_id);
    $stmt->execute();
    $stmt->close();
}

// Handle Search
$search_term = '';
$activities = [];
$sql = "SELECT id, place, tourist_attraction, activity FROM activities";
if (isset($_GET['search']) && !empty($_GET['search'])) {
    $search_term = $_GET['search'];
    $sql .= " WHERE place LIKE ? OR tourist_attraction LIKE ? OR activity LIKE ?";
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
        $activities[] = $row;
    }
}
$stmt->close();
$conn->close();

$pageTitle = "Activities in Oman";
include 'header.php';
?>
  
  <div class="container mb-5">

    <h2 class="text-center mb-4 fw-bold">Top Nature Activities in Oman</h2>
    <p class="text-center mb-4 fs-5"> This about exploring the enchanting nature of oman including deserts, wadis, caves, beaches and mountens</p>

    <form action="page2.php" method="get" class="row mb-5">
        <div class="col-md-10">
            <input type="text" name="search" class="form-control" placeholder="Search Place, Tourist attractions or Top Nature Activities" value="<?= htmlspecialchars($search_term) ?>">
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-primary w-100">Search</button>
        </div>
    </form>

    <div class="bg-light mt-4">
      <div class="row bg-secondary text-white text-center mb-2 fw-bold p-2">
        <div class="col-md-3">Place</div>
        <div class="col-md-3">Tourist attractions in Oman</div>
        <div class="col-md-4">Top Nature Activities </div>
        <div class="col-md-2">Action</div>
      </div>

      <div id="activitiesContainer">
            <?php if (empty($activities)): ?>
                <div class="row text-center mb-3"><div class="col">No activities found.</div></div>
            <?php else: ?>
                <?php foreach ($activities as $act): ?>
                <div class="row text-center mb-3 border-bottom align-items-center p-2">
                    <div class="col-md-3"><?= htmlspecialchars($act['place']) ?></div>
                    <div class="col-md-3"><?= htmlspecialchars($act['tourist_attraction']) ?></div>
                    <div class="col-md-4"><?= htmlspecialchars($act['activity']) ?></div>
                    <div class="col-md-2">
                        <form action="page2.php" method="post" onsubmit="return confirm('Are you sure you want to delete this activity?');">
                            <input type="hidden" name="delete_id" value="<?= $act['id'] ?>">
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