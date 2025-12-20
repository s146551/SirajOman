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
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <title>Locations & Places</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="index.html">Siraj Oman</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mainNavbar">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item"><a class="nav-link" href="index.html">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="page1.php">Locations & Places</a></li>
            <li class="nav-item"><a class="nav-link" href="page2.php">Activities in Oman</a></li>
            <li class="nav-item"><a class="nav-link" href="page3.html">Add a Location</a></li>
            <li class="nav-item"><a class="nav-link" href="page4.html">Oman's Natural Wonders</a></li>
            <li class="nav-item"><a class="nav-link" href="page5.html">Your Opinion</a></li>
            <li class="nav-item"><a class="nav-link" href="about.html">About</a></li>
            <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
        </ul>
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="toolsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Tools & Fun
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="toolsDropdown">
                <li><a class="dropdown-item" href="questionnaire.html">Feedback Form</a></li>
                <li><a class="dropdown-item" href="calculator.html">Travel Calculator</a></li>
                <li><a class="dropdown-item" href="funpage.html">Oman Memory Game</a></li>
            </ul>
            </li>
        </ul>
        </div>
    </div>
    </nav>
  
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
  
  <footer class="bg-light text-center py-3 mt-4">
    <p class="mb-0">&copy; 2025 Siraj Oman | 
      <a href="index.html" class="text-primary">Home</a> | 
      <a href="contact.php" class="text-primary">Contact</a> | 
      <a href="about.html" class="text-primary">About</a>
    </p>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>