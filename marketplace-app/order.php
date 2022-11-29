<?php


$mysqli=new mysqli('localhost','root','','marketplace');
	if($mysqli->connect_error){

		printf("can not connect databse %s\n",$mysqli->connect_error);
		exit();
	}



	$id= '1';
    $query2 = "INSERT INTO carts (customer_id, item_id) VALUES ('1', '$id')";
    $query3= "SELECT * FROM items where item_id='$id' ";
	$read2=$mysqli->query($query2);
    $read3=$mysqli->query($query3);
    $total = 0;
  


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible">
    <link rel="stylesheet" href="style.css">
    <title>MarketPlace</title>
    <link rel="icon" type="image/x-icon" href="favicons/deal.png">
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

   

    <h2>  Order Placed </h2>
    <hr>

    <div class = "contents">
    <div class = "listview">
    <table>
        <thead>
        <tr>
            <th>View</th>    
            <th>Name</th>
            <th>Price</th>
            <th>Details</th>
        </tr>
        </thead>
       
        <tbody>
        <?php while ($row=$read3->fetch_assoc()) { ?>
        <div class = "propcard">
        <tr>
        <td><img style="height: 250px; width: 270px" src="propimages/<?php echo  $row['img']; ?>"</td>
            <td><?php echo  $row['name'];   ?></td>
            <td><?php echo '$'. $row['cost'];  
            $total = $total + $row['cost'];
            
            
            ?></td>
            <td><a href="detailsseller.php?detailsseller=<?php echo  $row['item_id'];  ?>">Details</a></td>
        </tr>
       
    </div>

        <?php } ?>
        </tbody>
    </table> 
    

<h3>Confirmation Number: #12345</h3> <br>
Hello Buyer, <br>

We’re happy to let you know that we’ve received your order.<br>

Once your package ships, we will send you an email with a tracking number and link so you can see the movement of your package.<br>

If you have any questions, contact us here.!<br>

We are here to help!<br>

Returns: If you would like to return your product(s), please contact us.<br>

    </div>
<br>
          
</body>
</html>