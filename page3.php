<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "siraj_oman";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pName = $_POST['placeName'];
    $desc = $_POST['description'];
    $gov = $_POST['Governorate'];
    $map = $_POST['link'];

    // 2. SQL Insert Query
    $sql = "INSERT INTO locations (place_name, description, governorate, map_link) 
            VALUES ('$pName', '$desc', '$gov', '$map')";

    if ($conn->query($sql) === TRUE) {
        echo "<h1>New Location Added Successfully</h1>";
        
        // 3. Retrieve and display all data from the database
        $result = $conn->query("SELECT * FROM locations");

        if ($result->num_rows > 0) {
            echo "<table class='table'>";
            echo "<tr><th>ID</th><th>Place</th><th>Governorate</th></tr>";
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>".$row["id"]."</td><td>".$row["place_name"]."</td><td>".$row["governorate"]."</td></tr>";
            }
            echo "</table>";
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();
?>