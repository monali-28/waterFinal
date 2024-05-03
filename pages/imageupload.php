<?php
session_start();

if(isset($_SESSION["username"])) {
    include 'config.php'; 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $date = $_POST['date']; 
        $descrp = $_POST['descrp'];
        $adminName = $_SESSION["username"]; 

        if (!empty($_FILES["image"]["name"])) {
            $fileName = $_FILES["image"]["name"];
            $tmpName = $_FILES["image"]["tmp_name"];
            $fileSize = $_FILES["image"]["size"];
    
            $validImageExtension = ['jpg', 'jpeg', 'png'];
            $imageExtension = explode('.', $fileName);
            $imageExtension = strtolower(end($imageExtension));
            if (!in_array($imageExtension, $validImageExtension)) {
                // Invalid image extension
                echo "<script> alert('Invalid Image Extension');</script>";
            } elseif ($fileSize > 1000000) {
                echo "<script> alert('Image Size is too large');</script>";
            } else {
                $newImageName = uniqid() . "." . $imageExtension;
                move_uploaded_file($tmpName, "../images/$newImageName");
                
                $sql = "INSERT INTO media (date, image, descrp, adminName) VALUES (?, ?, ?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ssss", $date, $newImageName, $descrp, $adminName);

                $stmt->execute();

                if ($stmt->affected_rows > 0) {
                    $message = "Image added successfully";
                    echo "<script>alert('$message');</script>";
                } else {
                    echo "<script>alert('Failed to add image');</script>";
                }

                $stmt->close();
            }
        }
    }
} else {
    header("Location: adminlogin.php");
    exit();
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
    <a href="#">Upload Images</a></nav>
</header>

    <section class="upload">
        <h2>Photos</h2>
        <div>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                <label for="date">Date:</label><br>
                <input type="date" id="date" name="date" required><br>
                
                <label for="image">Select Image:</label><br>
                <input type="file" id="image" name="image" accept="image/*" required><br>

                <label for="descrp">Image Description:</label><br>
                <input type="text" id="descrp" name="descrp" required><br>
                
                <button type="submit">Upload</button>
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
