<?php
// File: view_v2.php
include 'db_connect_v2.php';

$sql = "SELECT * FROM cast_certificates_v2 ORDER BY reg_date DESC";
$result = $conn->query($sql);

echo "<h1>Cast Certificates V2</h1>";

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<div class='certificate'>";
        echo "<h2>Certificate ID: " . $row["id"] . "</h2>";
        echo "<p><strong>Name:</strong> " . $row["name"] . "</p>";
        echo "<p><strong>Gender:</strong> " . $row["gender"] . "</p>";
        echo "<p><strong>Date of Birth:</strong> " . $row["dob"] . "</p>";
        echo "<p><strong>Cast Name:</strong> " . $row["cast_name"] . "</p>";
        echo "<p><strong>Address:</strong> " . $row["address"] . "</p>";
        echo "<p><strong>Mobile No:</strong> " . $row["mobile"] . "</p>";
        echo "<p><strong>Registration Date:</strong> " . $row["reg_date"] . "</p>";
        echo "</div>";
    }
} else {
    echo "No certificates found";
}
$conn->close();
?>