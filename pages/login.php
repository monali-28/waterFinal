<?php
session_start();
if(isset($_SESSION["username"])){
    include "config.php"; // Include the configuration file
    // Query to check if the username and password match an entry in the database
    $sql = "SELECT Username, Adminname, Number, Email FROM admindb WHERE Username = ? ";

    // Prepare and execute the SQL statement
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $_SESSION["username"]);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if a matching entry is found
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $username = $row['Username'];
            $name = $row['Adminname'];
            $number = $row['Number'];
            $email = $row['Email'];
        }
    }
    else{
        header("Location: adminlogin.php");
        exit(); // Terminate script execution
    }
}
else{
    header("Location: adminlogin.php");
    exit(); // Terminate script execution
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Profile</title>
</head>
<body>
<div class="sidebar">
    <a href="newadmin.php"><i class="fa fa-user"></i> Add New Admin</a>
    <a href="dailyreport.php"><i class="fa fa-bar-chart"></i> Daily Report</a>
    <a href="imageupload.php"><i class="fa fa-image"></i> Image Upload</a>
    <a href="logout.php"><i class=" fa fa-sign-out"></i> Logout</a>
</div>

<header>
    <a href="index.html">
        <img id="logo" src="../images/logo6.png" alt="Logo">
    </a>
    <!-- <nav class="navigation">
        <a href="index.html">Home</a>
        <a href="aboutus.php">About Us</a>
        <a href="donate.html">Donate</a>
        <a href="media.html">Media</a>
        <a href="socialwall.html">Social Wall</a>
    </nav> -->
    <nav class="navigation">
    <a href="#">Admin Login</a></nav>
</header>

<div class="profile-info">
    <label for="name">Name:</label>
    <span id="name"><?php echo $name;?></span>

    <label for="username">User Name:</label>
    <span id="username"><?php echo $username;?></span> <!-- Placeholder for name -->

    <label for="mobile">Mobile No:</label>
    <span id="mobile"><?php echo $number;?></span> <!-- Placeholder for mobile number -->

    <label for="email">Email:</label>
    <span id="email"><?php echo $email;?></span> <!-- Placeholder for email -->
</div>

<footer class="footer">
    <div class="foot-container">
        <div class="footer-col">
            <h3>Contribute With Us</h3>
            <a href="donate.html"><button type="submit">Donate</button></a>
        </div>

        <div class="footer-col">
            <h4>Quick Links</h4>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="aboutus.php">About us</a></li>
                <li><a href="donate.html">Donate</a></li>
                <li><a href="media.html">Media</a></li>
                <li><a href="socialwall.html">Social wall</a></li>
                <li><a href="adminlogin.php">Admin login</a></li>
            </ul>
        </div>
        <div class="footer-col">
            <h3>Newsletter</h3>
            <p>Stay updated with our latest news and promotions.</p>
            <form class="newsletter-form">
                <input type="email" name="email" placeholder="Enter your email">
                <button type="submit">Subscribe</button>
            </form>
        </div>
        <div class="footer-col2">
            <h3>Connect with Us</h3>
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-instagram"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
        </div>
        <div class="footer-col1">
            <h4>Contact Us</h4>
            <p>Email: info@gmail.com<br>
                Phone: 9574897890<br>
                Address: Winjit, Nashik</p>
        </div>
    </div>
    <div class="footer-bottom">
        <p>&copy; 2024 Your Company. All rights reserved.</p>
    </div>
</footer>
</body>
</html>
