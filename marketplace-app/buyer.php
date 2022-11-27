<?php    
session_start();
$mysqli=new mysqli('localhost','root','','marketplace');
	if($mysqli->connect_error){

		printf("can not connect databse %s\n",$mysqli->connect_error);
		exit();
	}

	$query="SELECT * FROM items";
	$read=$mysqli->query($query);




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible">
    <link rel="stylesheet" href="style.css">
    <title>Welcome, Buyer!</title>
    <link rel="icon" type="image/x-icon" href="favicons/searching.png">
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

   

    <h2>  Available Items  </h2>
    <hr>

    <div class = "contents">
    <div class = "listview">
    <table>
        <thead>
        <tr>
            <th> </th>
            <th>Name</th>    
            <th>Price</th>
            <th>Details</th>
        </tr>
        </thead>
       
        <tbody>
        <?php while ($row=$read->fetch_assoc()) { ?>
        <div class = "propcard">
        <tr>
        <td><img style="height: 250px; width: 270px" src="propimages/<?php echo  $row['img']; ?>"</td>
            <td><?php echo  $row['name'];   ?></td>
            <td><?php echo $row['cost'];   ?></td>
            <td><a href="details.php?details=<?php echo  $row['item_id'];  ?>">Details</a></td>
        </tr>
        </div>

        <?php } ?>
        </tbody>
    </table> 
    

    </div>

    <div id = "searchbox">
        <div class = "searchhead">Search for an Item!</div>
        <form method="POST" action="searchresults.php">	

            <div class="fieldbox">
            <input id="name" name="name" type="text">
            <label>Name</label>
            </div>
            
            
            <div class="fieldbox">
			<input id="maxprice" name="maxprice" type="number">
            <label>Max price</label>
            
            </div>

            <div class="butt">
			<button class="button">Submit<input type="submit" name="submit" value="" class="shownone"></button>
            </div>

    </div>    




</div>    


    <div class="welcome">
        <div class="welcomepopup">
            <br>
            <br>
            <p>Welcome to the Marketplace!</p>
            <p>You can browse items for sale on this website.</p>
            <p>List items for sale as well!</p>
            <br>
            <div class="butt">
	            <img src="fakebutton.jpg" alt="" id="closepop">
            </div>
        </div>
    </div>
    <script type="text/javascript">
        document.getElementById('closepop').addEventListener('click',
        function(){
            document.querySelector('.welcome').style.display = 'none';
        });
    </script>

</body>
</html>