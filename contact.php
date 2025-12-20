<?php
require_once 'db_config.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$team_members = [];
$sql = "SELECT id, std_name, email FROM team_info ORDER BY std_name";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $team_members[] = $row;
    }
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
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
    <div class="container mt-4">
        <h1 class="text-center mb-4">Contact Us</h1>
        <div class="row">
            <?php if (empty($team_members)): ?>
                <p class="text-center">Team information is currently unavailable.</p>
            <?php else: ?>
                <?php foreach ($team_members as $member): ?>
                <div class="col-md-4 mb-4">
                    <div class="card text-center">
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($member['std_name']) ?></h5>
                            <p class="card-text">ID: <?= htmlspecialchars($member['id']) ?></p>
                            <a href="mailto:<?= htmlspecialchars($member['email']) ?>" class="btn btn-primary">Email</a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>

    <footer class="bg-light text-center py-3 mt-4">
        <p class="mb-0">&copy; 2025 Siraj Oman | 
          <a href="index.html" class="text-primary">Home</a> | 
          <a href="contact.php" class="text-primary">Contact</a> | 
          <a href="about.html" class="text-primary">About</a>
        </p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>
