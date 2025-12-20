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

$pageTitle = "Contact Us";
include 'header.php';
?>
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

<?php include 'footer.php'; ?>
