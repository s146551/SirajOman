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
$sql = "CREATE DATABASE IF NOT EXISTS activities_database";
$result = mysqli_query($conn, $sql);

$dbname = "activities_database";


// create table
$sql = "CREATE TABLE IF NOT EXISTS activities (
    Place VARCHAR(100) PRIMARY KEY,
    tourist_attractions VARCHAR(100),
    activitie VARCHAR(100) NOT NULL
)";

mysqli_select_db($conn, $dbname);
$result = mysqli_query($conn, $sql);


// add 5 records
$records = [
    ["Deserts", "Sharqiyah Sands", "Camping"],
    ["Mountains", "Jebel Akhdar", "Hiking"],
    ["Wadis", "Wadi Shab", "Swimming"],
    ["Beaches and Islands", "Sawadi Beach", "Marine life"],
    ["Souqs ", "Nizwa Central Souq", "Shopping"]
];

foreach ($records as $row) {
    $loc = $row[0];
    $tourist_attr = $row[1];
    $act = $row[2];

    $sql = "INSERT INTO activities (governorate, wilaya, attraction) VALUES ('$loc', '$tourist_attr', '$act')";

    $result = mysqli_query($conn, $sql);

}
mysqli_close($conn);
?>
