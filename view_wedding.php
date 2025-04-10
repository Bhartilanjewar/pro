<?php
// File: view_wedding.php
include 'db_wedding_connect.php';

$sql = "SELECT * FROM wedding_certificates ORDER BY reg_date DESC";
$result = $conn->query($sql);

echo "<h1>Wedding Certificates</h1>";

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<div class='certificate'>";
        echo "<h2>Certificate ID: " . $row["id"] . "</h2>";
        echo "<p><strong>Groom Name:</strong> " . $row["groom_name"] . "</p>";
        echo "<p><strong>Bride Name:</strong> " . $row["bride_name"] . "</p>";
        echo "<p><strong>Groom Date of Birth:</strong> " . $row["groom_dob"] . "</p>";
        echo "<p><strong>Bride Date of Birth:</strong> " . $row["bride_dob"] . "</p>";
        echo "<p><strong>Date of Marriage:</strong> " . $row["marriage_date"] . "</p>";
        echo "<p><strong>Location:</strong> " . $row["location"] . "</p>";
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