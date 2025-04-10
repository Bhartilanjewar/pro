<?php
// File: submit_v2.php
include 'db_connect_v2.php';

// Sanitize inputs
$name = $conn->real_escape_string($_POST['name']);
$gender = $conn->real_escape_string($_POST['gender']);
$dob = $conn->real_escape_string($_POST['dob']);
$cast_name = $conn->real_escape_string($_POST['cast_name']);
$address = $conn->real_escape_string($_POST['address']);
$mobile = $conn->real_escape_string($_POST['mobile']);

// Insert data into the database
$sql = "INSERT INTO cast_certificates_v2 (name, gender, dob, cast_name, address, mobile)
        VALUES ('$name', '$gender', '$dob', '$cast_name', '$address', '$mobile')";

if ($conn->query($sql) === TRUE) {
    // Redirect to view page after successful submission
    header("Location: view_v2.php");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>