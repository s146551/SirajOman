<?php
require_once 'db_config.php';

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get data from form
    $user_name = $_POST['userName'];
    $user_phone = $_POST['userPhone'];
    $suggestion_text = $_POST['suggestions'];

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO suggestions (user_name, user_phone, suggestion_text) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $user_name, $user_phone, $suggestion_text);

    // Execute the statement
    if ($stmt->execute()) {
        $message = "Thank you! Your suggestion has been submitted successfully.";
    } else {
        $message = "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    // If not a POST request, redirect to the form page
    header("Location: page5.php");
    exit();
}

$pageTitle = "Suggestion Submitted";
include 'header.php';
?>
    <div class="container mt-5">
        <div class="alert alert-info text-center">
            <h1 class="alert-heading">Submission Status</h1>
            <p><?= htmlspecialchars($message) ?></p>
            <hr>
            <a href="page5.php" class="btn btn-primary">Go Back</a>
        </div>
    </div>
<?php include 'footer.php'; ?>
