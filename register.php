<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Debugging: check the POST data
    var_dump($_POST);

    // Sanitize and assign form data
    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Check for database connection
    if ($conn) {
        // SQL query to insert data
        $sql = "INSERT INTO users (name, mobile, email, dob, gender, password) VALUES (?, ?, ?, ?, ?, ?)";
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("ssssss", $name, $mobile, $email, $dob, $gender, $password);

            if ($stmt->execute()) {
                echo "<script>alert('Registration successful!'); window.location.href='login.php';</script>";
            } else {
                echo "<script>alert('Error: " . $stmt->error . "');</script>";
            }

            $stmt->close();
        } else {
            echo "<script>alert('Error preparing the statement: " . $conn->error . "');</script>";
        }
    } else {
        echo "<script>alert('Database connection failed.');</script>";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f8f8;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;
            text-align: left;
        }
        h2 {
            background: black;
            color: white;
            padding: 10px;
            text-align: center;
            border-radius: 5px;
        }
        input, select {
            width: 90%;
            padding: 10px;
            margin: 8px 0;
            border: 1px solid gray;
            border-radius: 5px;
        }
        button {
            background: limegreen;
            color: black;
            padding: 10px;
            border: none;
            width: 100%;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }
        button:hover {
            background: green;
            color: white;
        }
    </style>

</head>
<body>    
    <div class="container">
        <h2>Registration</h2>
        <form action="register.php" method="POST">
            <label>Name:</label>
            <input type="text" name="name" placeholder="Enter Your Fullname" required>
            
            <label>Mobile No.:</label>
            <input type="tel" name="mobile" placeholder="Enter Your Mobile No." required pattern="[0-9]{10}">
            
            <label>Email ID:</label>
            <input type="email" name="email" placeholder="Enter Your Email ID" required>
            
            <label>Date of Birth:</label>
            <input type="date" name="dob" required>
            
            <label>Gender:</label>
            <select name="gender" required>
                <option value="">Select</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
            </select>
            
            <label>Password:</label>
            <input type="password" name="password" placeholder="Enter Your Password" required>
            
            <button type="submit">Submit</button>
        </form>
        <p>Already have an account? <a href="login.php">Login here</a></p>
    </div>
</body>
</html>
