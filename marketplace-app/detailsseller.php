<?php

$mysqli=new mysqli('localhost','root','','marketplace');
	if($mysqli->connect_error){

		printf("can not connect databse %s\n",$mysqli->connect_error);
		exit();
	}

if(isset($_GET['detailsseller'])){

	$id=$_GET['detailsseller'];
	$query2= "SELECT * FROM items where item_id='$id'";
	$readd=$mysqli->query($query2);

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible">
    <link rel="stylesheet" href="style.css">
    <title>Details</title>
    <link rel="icon" type="image/x-icon" href="favicons/details.png">
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



<div class="container">
	<table>
  <thead>
    <tr>
      <th>Name</th>
      <th>Price</th>
      <th>Description</th>
      
    </tr>
  </thead>
  <tbody>
  <?php while ($row= $readd->fetch_assoc()) { ?>
    <img style="height: 350px; width: 450px; padding: 30px; margins: auto;" src="propimages/<?php echo  $row['img']; ?>"
    <tr>
      
      <td> <?php echo $row['name'];  ?></td>
      <td> <?php echo $row['cost'];  ?></td>
      <td><?php echo $row['description'];  ?></td>
      <td> <?php echo $row['img'];  ?></td> 
       
      
    </tr>
<?php   } ?>
  </tbody>
</table> 

</div>

<br><h3><a href="seller.php">Back to all your Items</a></h3>

</body>
</html>