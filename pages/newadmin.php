<?php
session_start();
if (isset($_SESSION["username"])) {
    include 'config.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $AdminName = $_POST['name']; // Changed 'book_name' to 'name'
        $number = $_POST['number']; // Changed 'author' to 'number'
        $email = $_POST['email']; // Changed 'genre' to 'email'
        $username = $_POST['username']; // Changed 'publication' to 'username'
        $password = $_POST['password']; // Changed 'isbn' to 'password'

        $sql = "INSERT INTO admindb (SrNo,Adminname,Number,Email,Username,Password) VALUES (NULL,?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sisss", $AdminName, $number, $email, $username, $password);

        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo "<script> alert('Admin added successfully');</script>";
        } else {
            echo "<script> alert('Failed to add admin');</script>";
        }

        $stmt->close();
        $conn->close();

        // Delay redirection by 3 seconds
        echo "<script> setTimeout(function(){ window.location.href = 'login.php'; }, 3000); </script>";
    }
} else {
    header("Location: adminlogin.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Document</title>
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
    <a href="#">New Admin</a></nav>
</header>

    <section class="addadmin">
        <h2>Add New Admin</h2>
        <div>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <label for="name">Name:</label><br>
                <input type="text" id="name" name="name" required><br>
                
                <label for="number">Number:</label><br>
                <input type="number" id="number" name="number" required><br>
                
                <label for="email">Email:</label><br>
                <input type="email" id="email" name="email" required><br>
                
                <label for="username">Username:</label><br>
                <input type="text" id="username" name="username" required><br>
                
                <label for="password">Password:</label><br>
                <input type="password" id="password" name="password" required><br>
                
                <input type="submit" value="Submit">
            </form>
        </div>
    </section>
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
