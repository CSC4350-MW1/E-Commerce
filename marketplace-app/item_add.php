<?php
session_start();
$error = '';

        $owner_id = 1;
        $name=$_POST['name'];
        $price=$_POST['maxprice'];
        $desc=$_POST['desc'];
        $image = $_FILES['image']['name'];
        $target = "propimages/".basename($image);
        move_uploaded_file($_FILES['image']['tmp_name'], $target);

        

        $conn=new mysqli('localhost','root','','marketplace');
        
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        $query = "INSERT INTO items(name, cost, description, img, seller_id)
        VALUES('$name','$price','$desc','$image','$owner_id')";

        if ($conn->query($query) === TRUE) {
            $error = 'Item Added to listings
            <br><h3><a href="seller.php">Back to your Listings</a></h3>';
            
        }else{
            //$error = 'DATABASE ERROR';
            echo "Error: " . $query . "<br>" . $conn->error;
        }        
        mysqli_close($conn);
 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible">
    <link rel="stylesheet" href="style.css">
    <title>Added Listing</title>
    <link rel="icon" type="image/x-icon" href="favicons/add.png">
</head>
<body>
<div id="navbar">
        <h3 id="home">MarketPlace</h3>
        <nav>
        <ul class="links">
            <li><a href="logouthome.php">Logout</a></li>
        </ul>
        </nav>
        <a href="logouthome.php" id="homelink">Home</a>
    </div>

    <h2 style="color: red;"><?php echo $error;?></h2>

    </body>
</html>