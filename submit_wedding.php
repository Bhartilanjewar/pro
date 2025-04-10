<?php
// File: submit_wedding.php
include 'db_wedding_connect.php';

// Sanitize inputs
$groomName = $conn->real_escape_string($_POST['groomName']);
$brideName = $conn->real_escape_string($_POST['brideName']);
$groomDob = $conn->real_escape_string($_POST['groomDateOfBirth']);
$brideDob = $conn->real_escape_string($_POST['brideDateOfBirth']);
$marriageDate = $conn->real_escape_string($_POST['marriageDate']);
$location = $conn->real_escape_string($_POST['location']);
$address = $conn->real_escape_string($_POST['address']);
$mobile = $conn->real_escape_string($_POST['mobile']);

// Insert data into the database
$sql = "INSERT INTO wedding_certificates (groom_name, bride_name, groom_dob, bride_dob, marriage_date, location, address, mobile)
        VALUES ('$groomName', '$brideName', '$groomDob', '$brideDob', '$marriageDate', '$location', '$address', '$mobile')";

if ($conn->query($sql) === TRUE) {
    // Redirect to view page after successful submission
    header("Location: view_wedding.php");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>