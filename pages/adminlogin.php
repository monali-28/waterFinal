<?php
// Error message initialization
$errorMsg = "";

// Check if the login form is submitted
if (isset($_POST['login'])) {
    include "config.php"; // Include the configuration file

    // Get and sanitize the username and password from the form
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']); // Password needs sanitization

    // Query to check if the username and password match an entry in the database
    $sql = "SELECT Username FROM admindb WHERE Username = ? AND Password = ?";

    // Prepare and execute the SQL statement
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if a matching entry is found
    if ($result->num_rows > 0) {
        session_start();
        while ($row = $result->fetch_assoc()) {
            $_SESSION["username"] = $row['Username'];
            // Redirect to index.html
            header("Location: login.php");
            exit();
        }
    } else {
        $errorMsg = "Invalid credentials! Please try again."; // Set error message
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="stylelogin.css">
</head>
<body class="align">
<header>
    <a href="index.html">
        <img id="logo" src="../images/logo6.png" alt="Logo">
    </a>
    <nav class="navigation">
        <a href="index.html">Home</a>
        <a href="aboutus.php">About Us</a>
        <a href="donate.html">Donate</a>
        <a href="media.php">Media</a>
        <a href="socialwall.html">Social Wall</a>
        <a href="adminlogin.php">Admin Login</a>
    </nav>
</header>
<div class="grid align__item">
  
  <div class="register">
  
    <svg xmlns="http://www.w3.org/2000/svg" class="site__logo" width="56" height="84" viewBox="77.7 214.9 274.7 412"><defs><linearGradient id="a" x1="0%" y1="0%" y2="0%"><stop offset="0%" stop-color="#8ceabb"/><stop offset="100%" stop-color="#378f7b"/></linearGradient></defs><path fill="url(#a)" d="M215 214.9c-83.6 123.5-137.3 200.8-137.3 275.9 0 75.2 61.4 136.1 137.3 136.1s137.3-60.9 137.3-136.1c0-75.1-53.7-152.4-137.3-275.9z"/></svg>
  
    <h2>Login</h2>
  
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="form">

        <div class="form__field">
            <input id="username" type="text" name="username" placeholder="Username">
            <div class="error"><?php echo $errorMsg; ?></div>
        </div>
        
        <div class="form__field">
            <input id="password" type="password" name="password" placeholder="Password">
            <div class="error"><?php echo $errorMsg; ?></div>
        </div>
  
        <div class="form__field">
            <input type="submit" name="login" value="Login">
        </div>
  
    </form>
  
  </div>
  
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
                <li><a href="media.php">Media</a></li>
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
            <i class="fa fa-facebook"></i>
            <i class="fa fa-twitter"></i>
            <i class="fa fa-instagram"></i>
            <i class="fa fa-linkedin"></i>
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

