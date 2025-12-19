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

// Define a class to represent a single Suggestion record
class Suggestion {
    public $name;
    public $phone;
    public $text;

    public function __construct($name, $phone, $text) {
        $this->name = $name;
        $this->phone = $phone;
        $this->text = $text;
    }
}

// Function to iterate over an array of objects and render an XHTML table
function displaySuggestions($suggestionList) {
    echo "<h3>Submitted Suggestions</h3>";
    echo "<table border='1' class='table table-bordered'>";
    echo "<tr><th>Name</th><th>Phone</th><th>Suggestion</th></tr>";
    
    foreach ($suggestionList as $item) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($item->name) . "</td>";
        echo "<td>" . htmlspecialchars($item->phone) . "</td>";
        echo "<td>" . htmlspecialchars($item->text) . "</td>";
        echo "</tr>";
    }
    echo "</table>";
}

// Capture incoming POST data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $n = $_POST['name'];
    $p = $_POST['phone'];
    $s = $_POST['suggestions'];

    // Create an array and store the record as an object
    $records = [];
    $records[] = new Suggestion($n, $p, $s);

    // Render the output in XHTML format
    displaySuggestions($records);
}
?>