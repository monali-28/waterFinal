<?php
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $database = "water"; // Added a semicolon here
    $conn = mysqli_connect($hostname, $username, $password, $database);
    $sql = "SELECT * FROM media";
    $result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <?php
            while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <div class="containe">
            <p>Date: <?php echo $row["date"];?></p>
            <div id="product-image">
            <img class="imgclass" src="../images/<?php echo $row["image"]; ?>" alt="Book">
            </div>
            <div class="book-info">
                <h3><?php echo $row["descrp"];?></h3>
            </div>
        </div>
        <?php
            }
        ?>
    </div>
</body>
</html>
