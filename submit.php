<?php
// File: submit.php
include 'db_connect.php';

// Sanitize inputs
$name = $conn->real_escape_string($_POST['name']);
$dob = $conn->real_escape_string($_POST['dob']);
$gender = $conn->real_escape_string($_POST['gender']);
$pob = $conn->real_escape_string($_POST['pob']);
$address = $conn->real_escape_string($_POST['address']);
$mobile = $conn->real_escape_string($_POST['mobile']);

$sql = "INSERT INTO birth_certificates (name, dob, gender, pob, address, mobile)
        VALUES ('$name', '$dob', '$gender', '$pob', '$address', '$mobile')";

if ($conn->query($sql) === TRUE) {
    header("Location: view.php");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>