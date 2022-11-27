<?php


$mysqli=new mysqli('localhost','root','','marketplace');
	if($mysqli->connect_error){

		printf("can not connect databse %s\n",$mysqli->connect_error);
		exit();
	}

if(isset($_GET['details'])){

	$id=$_GET['details'];
    $query2 = "INSERT INTO carts (customer_id, item_id) VALUES ('1', '$id')";
    $query3= "SELECT * FROM items where item_id='$id' ";
	$read2=$mysqli->query($query2);
    $read3=$mysqli->query($query3);
    $total = 0;
  
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible">
    <link rel="stylesheet" href="style.css">
    <title>Welcome, Seller!</title>
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

   

    <h2>  Buyer 1's Cart  </h2>
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
    <table>
        
        <tr>
            <td>Shipping = $7 <?php $total = $total +7; ?></td>
        </tr>
        <tr>
        <td>Total: <?php echo '$'.$total; ?> <td>
        </tr> 
        </table>
    </div>

    <h3><a href="buyer.php">Back to Items</a></h3>

</body>
</html>