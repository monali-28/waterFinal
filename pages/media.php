<?php 
    include "config.php";
    $sql = "SELECT * FROM media";
    $result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Media</title>
</head>
<body>
    <h1>Media</h1>
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
    <section id="gallery">
    <h2>Gallery</h2>
    <div class="imggrid">
        <?php 
        $count = 0; // Counter to keep track of images displayed
        while ($row = mysqli_fetch_assoc($result)) { 
        ?>
        <div class="imgcart">
            <p><?php echo $row['date']; ?></p> <!-- Output date above the image -->
            <?php
            $imagePath = "../images/" . $row["image"]; // Assuming images are stored in the 'images' folder
            if (file_exists($imagePath)) {
                echo '<img src="' . $imagePath . '" alt="Book image" class="imgclass">';
            } else {
                echo '<p>Image not found</p>';
            }
            ?>
        </div>
        <?php } ?>
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
