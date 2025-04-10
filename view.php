<?php
// File: view.php
include 'db_connect.php';

$sql = "SELECT * FROM birth_certificates ORDER BY reg_date DESC";
$result = $conn->query($sql);

echo "<h1>Birth Certificates</h1>";

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<div class='certificate'>";
        echo "<h2>Birth Certificate #".$row['id']."</h2>";
        echo "<p><strong>Name:</strong> ".$row['name']."</p>";
        echo "<p><strong>Date of Birth:</strong> ".$row['dob']."</p>";
        echo "<p><strong>Gender:</strong> ".$row['gender']."</p>";
        echo "<p><strong>Place of Birth:</strong> ".$row['pob']."</p>";
        echo "<p><strong>Address:</strong> ".$row['address']."</p>";
        echo "<p><strong>Mobile:</strong> ".$row['mobile']."</p>";
        echo "<p><small>Registered: ".$row['reg_date']."</small></p>";
        echo "</div>";
    }
} else {
    echo "No certificates found";
}
$conn->close();
?>