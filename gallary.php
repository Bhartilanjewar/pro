<?php
include 'conn.php';

// Retrieve data from database
$sql = "SELECT * FROM data_storage ORDER BY id DESC"; // Order by ID for latest first
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
        }
        h2 {
            color: white;
            background-color: black;
            padding: 15px;
            text-decoration: underline;
            margin-top: 20px;
        }
        .gallery-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            padding: 20px;
        }
        .data-item {
            background-color: white;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 15px;
            text-align: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            width: calc(33.33% - 40px); /* Adjust width for 3 columns with gap */
            box-sizing: border-box;
        }
        .data-item img {
            max-width: 100%;
            height: auto;
            background-color: lightgray;
            border: 1px solid black;
            object-fit: cover;
            padding: 5px;
            margin-bottom: 10px;
            border-radius: 4px;
        }
        .data-item p {
            margin: 5px 0;
            font-size: 0.9em;
            text-align: left;
        }
        .data-item strong {
            font-weight: bold;
        }
        .no-data {
            padding: 20px;
            font-size: 1.1em;
            color: #777;
        }
        .add-item-button {
            display: block;
            margin: 20px auto;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            font-size: 1em;
            transition: background-color 0.3s ease;
        }
        .add-item-button:hover {
            background-color: #0056b3;
        }

        /* Navigation Styles (Responsive) */
        nav {
            background-color: #2563eb;
            padding: 10px 0;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 20px;
        }

        .logo {
            font-size: 1.5em;
            font-weight: bold;
            text-decoration: none;
            color: white;
        }

        #nav-menu {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        #nav-menu li {
            margin: 5px;
            position: relative;
        }

        #nav-menu li a {
            display: block;
            color: white;
            text-decoration: none;
            padding: 10px 15px;
            transition: 0.3s;
            border-radius: 5px;
        }

        #nav-menu li a:hover {
            background-color: #1e40af;
        }

        /* Dropdown */
        .dropdown {
            position: relative;
        }

        .dropbtn {
            display: inline-block;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            font-weight: bold;
            border-radius: 5px;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: white;
            min-width: 180px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            text-align: left;
        }

        .dropdown-content a:hover {background-color: #ddd;}

        .dropdown:hover .dropdown-content {
            display: block;
        }

        /* Footer Styles (Responsive) */
        footer {
            background: linear-gradient(to right, #333, #555);
            color: white;
            padding: 30px 20px;
            text-align: center;
            margin-top: 30px;
        }

        .footer-section {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            margin-bottom: 20px;
        }

        .footer-section div {
            width: calc(50% - 20px); /* Adjust for two columns on smaller screens */
            margin: 10px;
            text-align: left;
            box-sizing: border-box;
        }

        .footer-section h4 {
            font-size: 1.1em;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .footer-section a {
            color: white;
            text-decoration: none;
            margin: 5px 0;
            display: block;
            font-size: 0.9em;
            transition: color 0.3s ease-in-out;
        }

        .footer-section a:hover {
            color: #2563eb;
        }

        footer p {
            font-size: 0.8em;
            margin-top: 15px;
        }

        /* Marquee (Horizontal Scrolling) */
        marquee {
            background-color: #f0f0f0;
            padding: 10px 0;
            margin-bottom: 20px;
        }
        marquee img {
            height: auto;
            max-height: 150px; /* Adjust as needed */
            margin: 0 10px;
        }

        /* Responsive adjustments */
        @media (max-width: 992px) {
            .data-item {
                width: calc(50% - 30px); /* Two columns */
            }
        }

        @media (max-width: 768px) {
            #nav-menu {
                flex-direction: column;
                align-items: center;
            }
            #nav-menu li {
                margin: 5px 0;
                width: 100%;
                text-align: center;
            }
            .dropdown-content {
                position: static;
                box-shadow: none;
                width: 100%;
                text-align: center;
            }
            .dropdown-content a {
                text-align: center;
            }
            .footer-section div {
                width: 100%; /* Single column */
                text-align: center;
                margin: 15px 0;
            }
        }

        @media (max-width: 576px) {
            .data-item {
                width: 100%; /* Single column */
            }
            marquee img {
                max-height: 100px;
            }
        }
    </style>
</head>
<body>

    <nav>
        <ul id="nav-menu">
            <li><a href="http://127.0.0.1:5500/gram%20panchayat%20.html">Home</a></li>
            <li><a href="http://localhost/megha%20project/index%20-%20Copy/gallary.php">Photo Gallery</a></li>
            <li><a href="http://127.0.0.1:5500/index%20-%20Copy/contact%20us.html">Contact Us</a></li>
            <li><a href="http://127.0.0.1:5500/finalscheme.html">Schemes</a></li>
            <li><a href="http://localhost/megha%20project/register.php">Login/Register</a></li>
            <li class="dropdown">
                <a href="#" class="dropbtn">Certificate ▼</a>
                <div class="dropdown-content">
                    <a href="http://localhost/megha%20project/Cast%20Certificate.html">Cast</a>
                    <a href="http://localhost/megha%20project/Birth%20Certificate.html">Birth</a>
                    <a href="http://localhost/megha%20project/Death%20Certificate.html">Death</a>
                    <a href="http://localhost/megha%20project/Marriage%20Certificate.html">Marriage</a>
                </div>
            </li>
            <li class="dropdown">
                <a href="#" class="dropbtn">RTI ▼</a>
                <div class="dropdown-content">
                    <a href="tel:+918007025523"><strong>Sarpanch:</strong> Mrs. Darshana Pramod Bagade</a>
                    <a href="tel:+919604392717"><strong>Upsarpanch:</strong> Mr. Rampal Keshvrao Dhande</a>
                    <a href="tel:+917020004860"><strong>Gramsevak:</strong> Mr. Vaibhav Bavankar</a>
                    <a href="mailto:info@grampanchayat.com"><strong>Email:</strong> info@grampanchayat.com</a>
                </div>
            </li>

            <li><a href="http://localhost/megha%20project/dashboard.php">Profile</a></li>
        </ul>
    </nav>

    <a href="example.php" class="add-item-button">Add Item</a>

    <h2> Photo Gallery</h2>

    <div class="gallery-container">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="data-item">';
                echo '<img src="' . $row["image_path"] . '" alt="Uploaded Image">';
                echo '<p><strong>Date:</strong> ' . $row["date"] . '</p>';
                echo '<p><strong>Information:</strong> ' . nl2br($row["information"]) . '</p>';
                echo '</div>';
            }
        } else {
            echo '<p class="no-data">No data available.</p>';
        }

        $conn->close();
        ?>
    </div>

    <marquee behavior="scroll" direction="left" scrollamount="5">
        <img src="IMG4.jpg" alt="Image 4" width="400" height="300">
        <img src="IMG5.jpg" alt="Image 5" width="400" height="300">
        <img src="IMG6.jpg" alt="Image 6" width="400" height="300">
        <img src="IMG7.jpg" alt="Image 7" width="400" height="300">
    </marquee>

    <footer>
        <h1>About</h1>
        <div class="footer-section">
            <div>
                <h4>Contact Information</h4>
                <a href="tel:+91 8007025523"><strong>Sarpanch:</strong> Darshana pramod bagade  - +91  8007025523</a>
                <a href="tel:+91 960439271"><strong>Upsarpanch:</strong> Rampal keshvrao dhande - +91 9604392717</a>
                <a href="tel:+917020004860"><strong>Gramsevak:</strong> Mr. vaibhav Bavankar   - +91 7020004860</a>
                <a href="mailto:info@grampanchayat.com"><strong>Email:</strong> info@grampanchayat.com</a>
            </div>

            <div>
                <h4>Quick Links</h4>
                <a href="#">Home</a>
                <a href="#">About</a>
                <a href="gallary.html">Our Gallery</a>
                <a href="Contact Us.html">Contact Us</a>
                <a href="finalscheme.html">Schemes</a>
            </div>
        </div>
        <p class="hover-blue">&copy; 2025-26 Gram Panchayat Tondli. Site Design & Developed By : @Suhani Aswale @Bharti Lanjewar @Arpita Mankar</p>
    </footer>

</body>
</html>