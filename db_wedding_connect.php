<?php
// File: db_wedding_connect.php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "wedding_certificate_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>