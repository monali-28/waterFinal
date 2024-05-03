<?php
include "config.php";
if(isset($_POST["view"])){
    $date = $_POST["sdate"];
} else {
    $yesterday = date('Y-m-d', strtotime('-1 day'));
    $date = $yesterday;
}
$sql = "SELECT * FROM dailyreport WHERE date = '$date'";
$result = mysqli_query($conn, $sql);

// Check if there is no data found
if(mysqli_num_rows($result) === 0) {
    $errormsg = "No data Available";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/33412b4fe5.js" crossorigin="anonymous"></script>
    <title>About Us</title>
</head>
<body>
    <!-- <h1>About Us</h1> -->
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
    <main>
        <br>
        <section id="about_abhiyan_members">
            <div id="abhiyan">
                <h2>About Jal Samrudhdh Abhiyan Nashik</h2>
                <p class="about-text">Water scarcity isn't just a distant concern – it's a shared challenge that touches us all. Over the next two months, we're seizing an opportunity to turn this challenge into a golden opportunity. Led by Ashima Mittal, CEO of Zilla Parishad, and supported by Nashik Collector Jalaj Sharma, the Jal Samrudhdh Abhiyan aims to transform the landscape of water conservation.
                With a vision of silt-free dams and silt-rich Shiwar, this campaign kicks off on April 15th. 
                Last year's low rainfall has amplified the urgency, but it's also ignited a spark of opportunity. This isn't just a campaign; it's a movement that spans from village to village, engaging every citizen in our quest for water security.
                    
                Join us as we pave the way for a future where Nashik never faces water woes like Bangalore. Together, let's make every drop count.
                    
                    </p>
            </div>
            <img src="../images/water.jpg" alt="save water" id="about_image">

        </section>
        <hr class="separator">
        <section id="get_involved">
            <h2>Our Supporting Members</h2>
            <p>We are grateful for the support of the following individuals and organizations who have contributed to our cause</p><br>
            <div class="supporters">
                <div class="supporter">
                    <img src="../images/sp-1.png" alt="Ashima Mittal">
                    <div class="supporter-info">
                        <strong>Ashima Mittal</strong><br>
                        Chief Executive Officer of Zilla Parishad
                    </div>
                </div>
                <div class="supporter">
                    <img src="../images/sp_2.jpg" alt="Jalaj Sharma">
                    <div class="supporter-info">
                        <strong>Jalaj Sharma</strong><br>
                        Collector
                    </div>
                </div>
                <div class="supporter">
                    <img src="../images/sp-3.jpg" alt="Dr. Ashok Karanjkar">
                    <div class="supporter-info">
                        <strong>Dr. Ashok Karanjkar</strong><br>
                        Municipal Commissioner
                    </div>
                </div>
                
                </div>
            </div>
        </section>
        
        <hr class="separator">
        <center> <h2 class="title-contribute">Updates</h2></center>
        <section id="initiatives">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="dateform">
            <input type="date" name="sdate" id = "sdate" required>
            <button name="view" id="view">View</button>
        </form>
        <div class="nodata">
            <?php if(isset($errormsg)){
                echo $errormsg ;
            }
            ?>
        </div>
        
        <div class="card-container">
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                $date = $row["date"];
                $fa = $row["nofa"];
                $tr = $row["trucks"];
                $silt = $row["siltremoved"];
                ?>
                <div class="card">
                    <h4>Number of trucks</h4>
                    <i class="fa-solid fa-truck"></i>
                    <p><?php echo $tr; ?></p>
                </div>
                <div class="card">
                    <h4>Farmers Affected</h4>
                    <i class="fa-solid fa-tractor"></i>
                    <p><?php echo $fa; ?></p>
                </div>
                <div class="card">
                    <h4>Amount of slit removed</h4>
                    <i class="fa-solid fa-water"></i>
                    <p><?php echo $silt; ?></p>
                </div>
                <?php
            }
            ?>
        </div>
    </section>
    <hr class="separator">
   <center> <h2 class="title-contribute">Contribution</h2></center>
    <div class="card-container">
        <div class="card-1">
           <h4>INDIVIDUALS</h4>
           <p>Every contribution counts and we appreciate the gesture</p>
           <i class="fa-solid fa-user"></i>
        </div>
        
        <div class="card-2">
            <h4>CORPORATES</h4>
           <p>Strengthing your CSR program by contributing to our project</p>
           <i class="fa-solid fa-users"></i>
        </div>
   
        <div class="card-1">
            <h4>VOLUNTEER</h4>
            <p>An appeal from the heart to a billion hearts across India</p>
            <i class="fa-solid fa-handshake-angle"></i>
        </div>
    </div>
    <hr class="separator">
    
    
    <center>
        <section id="get_involved">
            <h2>Get Involved</h2>
            <p>Join us in our mission to conserve water and safeguard our planet's most vital resource...</p>
          <a href="contact.html"><button>Contact Us</button></a>  
        </section>
    </center>
        
    </main>
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