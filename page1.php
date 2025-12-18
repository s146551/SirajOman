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
$sql = "CREATE DATABASE IF NOT EXISTS locations_database";
$result = mysqli_query($conn, $sql);

$dbname = "locations_database";


// create table
$sql = "CREATE TABLE IF NOT EXISTS locations (
    governorate VARCHAR(100) PRIMARY KEY,
    wilaya VARCHAR(100),
    attraction VARCHAR(100) NOT NULL
)";

mysqli_select_db($conn, $dbname);
$result = mysqli_query($conn, $sql);


// add 5 records
$records = [
    ["Muscat", "Matrah", "Mutrah Souq"],
    ["Al Batinah South", "Barka", "Sawadi Beach"],
    ["Al Dakhiliya", "Nizwa", "Wadi Tanuf"],
    ["Al Sharqiyah North", "Ibra", "Wadi Bani Khalid"],
    ["Dhofar", "Salalah", "Al Mughsayl Beach"]
];

foreach ($records as $row) {
    $gov = $row[0];
    $wil = $row[1];
    $attr = $row[2];

    $sql = "INSERT INTO locations (governorate, wilaya, attraction) VALUES ('$gov', '$wil', '$attr')";

    $result = mysqli_query($conn, $sql);

}
mysqli_close($conn);
?>
