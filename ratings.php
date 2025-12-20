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
    $rating = $_POST['rate'];
    $feedback_text = $_POST['feedback'];

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO ratings (rating, feedback_text) VALUES (?, ?)");
    $stmt->bind_param("is", $rating, $feedback_text);

    // Execute the statement
    if ($stmt->execute()) {
        $message = "Thank you! Your rating has been submitted successfully.";
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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rating Submitted</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="alert alert-success text-center">
            <h1 class="alert-heading">Submission Status</h1>
            <p><?= htmlspecialchars($message) ?></p>
            <hr>
            <a href="page5.php" class="btn btn-primary">Go Back</a>
        </div>
    </div>
</body>
</html>
