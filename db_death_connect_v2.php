<?php
// File: db_death_connect_v2.php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "death_certificate_v2_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>