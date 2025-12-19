<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "siraj_oman";

// 1. Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Define a class to represent a single Questionnaire record
class VisitorRecord {
    public $name;
    public $email;
    public $date;
    public $purpose;
    public $likes;
    public $comments;

    // Constructor to initialize the record
    public function __construct($n, $e, $d, $p, $l, $c) {
        $this->name = $n;
        $this->email = $e;
        $this->date = $d;
        $this->purpose = $p;
        $this->likes = $l; // This will be a string of selected checkboxes
        $this->comments = $c;
    }
}

// Function to iterate over an array of objects and display data in an XHTML table
function displayVisitorTable($recordsArray) {
    echo '<div class="container mt-5">';
    echo '<h2 class="text-center text-success mb-4">Form Submission Summary</h2>';
    echo '<table class="table table-striped table-bordered">';
    echo '<thead class="table-dark">
            <tr>
                <th>Visitor Name</th>
                <th>Email</th>
                <th>Visit Date</th>
                <th>Purpose</th>
                <th>Enjoyed Items</th>
                <th>Comments</th>
            </tr>
          </thead>';
    echo '<tbody>';

    foreach ($recordsArray as $record) {
        echo '<tr>';
        echo '<td>' . htmlspecialchars($record->name) . '</td>';
        echo '<td>' . htmlspecialchars($record->email) . '</td>';
        echo '<td>' . htmlspecialchars($record->date) . '</td>';
        echo '<td>' . htmlspecialchars($record->purpose) . '</td>';
        echo '<td>' . htmlspecialchars($record->likes) . '</td>';
        echo '<td>' . htmlspecialchars($record->comments) . '</td>';
        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
    echo '<div class="text-center"><a href="questionnaire.html" class="btn btn-primary">Back to Form</a></div>';
    echo '</div>';
}

// Main Logic
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 1. Capture POST data
    $name = $_POST['visitor_name'];
    $email = $_POST['visitor_email'];
    $date = $_POST['visit_date'];
    $purpose = $_POST['purpose'];
    $comments = $_POST['comments'];
    
    // Handle checkboxes (likes) - combine them into a string
    $likesList = isset($_POST['likes']) ? implode(", ", $_POST['likes']) : "None selected";

    // 2. Create an array to hold our objects
    $allRecords = [];

    // 3. Create a new object from the class and add it to the array
    $currentVisitor = new VisitorRecord($name, $email, $date, $purpose, $likesList, $comments);
    $allRecords[] = $currentVisitor;

    // 4. Render the XHTML Output
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Submission Result</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body class="bg-light">
        <?php displayVisitorTable($allRecords); ?>
    </body>
    </html>
    <?php
}
?>