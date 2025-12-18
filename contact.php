<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "";


// create db connection 
$conn = mysqli_connect($servername, $username, $password);


// check connection
if (!$conn) {die("Connection failed: " . mysqli_connect_error());
} else {print "Connected to MySQL server<br />";}


// create database
$sql = "CREATE DATABASE IF NOT EXISTS contact_us";
$result = mysqli_query($conn, $sql);

$dbname = "contact_us";


// create table
$sql = "CREATE TABLE IF NOT EXISTS team_info (
    id int PRIMARY KEY,
    std_name  VARCHAR(100),
    email VARCHAR(100) NOT NULL
)";

mysqli_select_db($conn, $dbname);
$result = mysqli_query($conn, $sql);


// add 5 records
$personal_info = [
    ["146551", "Taher Nasser Al-Fahdi", "s146551@student.squ.edu.om"],
    ["145073", "Maan Mohammed Al-Aghbari", "s145073@student.squ.edu.om"],
    ["144635", "Abdullah Said Al-Fahdi", "s144635@student.squ.edu.om"]
];

foreach ($personal_info as $row) {
    $theID = $row[0];
    $theNAME = $row[1];
    $theEMAIL = $row[2];

    $sql = "INSERT INTO team_info (id, std_name, email) VALUES ('$theID', '$theNAME', '$theEMAIL')";

    $result = mysqli_query($conn, $sql);

}
mysqli_close($conn);
?>
