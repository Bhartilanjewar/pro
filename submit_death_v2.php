<?php
// File: submit_death_v2.php
include 'db_death_connect_v2.php';

// Sanitize inputs
$name = $conn->real_escape_string($_POST['name']);
$gender = $conn->real_escape_string($_POST['gender']);
$dob = $conn->real_escape_string($_POST['dob']);
$dod = $conn->real_escape_string($_POST['dod']);
$pod = $conn->real_escape_string($_POST['pod']);
$causeOfDeath = $conn->real_escape_string($_POST['cause_of_death']);
$address = $conn->real_escape_string($_POST['address']);

// Insert data into the database
$sql = "INSERT INTO death_certificates_v2 (name, gender, dob, dod, pod, cause_of_death, address)
        VALUES ('$name', '$gender', '$dob', '$dod', '$pod', '$causeOfDeath', '$address')";

if ($conn->query($sql) === TRUE) {
    // Redirect to view page after successful submission
    header("Location: view_death_v2.php");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>