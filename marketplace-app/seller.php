<?php    
session_start();


$mysqli=new mysqli('localhost','root','','marketplace');
	if($mysqli->connect_error){

		printf("can not connect databse %s\n",$mysqli->connect_error);
		exit();
	}

	$query="SELECT * FROM items WHERE seller_id LIKE '1'";
	$read=$mysqli->query($query);



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

   

    <h2>  Seller 1's Listings  </h2>
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
        <?php while ($row=$read->fetch_assoc()) { ?>
        <div class = "propcard">
        <tr>
        <td><img style="height: 250px; width: 270px" src="propimages/<?php echo  $row['img']; ?>"</td>
            <td><?php echo  $row['name'];   ?></td>
            <td><?php echo '$'. $row['cost'];   ?></td>
            <td><a href="detailsseller.php?detailsseller=<?php echo  $row['item_id'];  ?>">Details!</a></td>
        </tr>
        </div>

        <?php } ?>
        </tbody>
    </table> 
    

    </div>

    <div id = "searchbox">
        <h2 class="dropdownclick" id="dropdown">+</h2>
    <div class="hide">
        <div class = "searchhead"><p style="text-align: center;">Add an Item</p></div>
        
        <form method="POST" action="item_add.php" enctype="multipart/form-data">	

            <div class="fieldbox">
            <input id="name" name="name" type="text">
            <label>Name</label>
            </div>
            
            <div class="fieldbox">
			<input id="maxprice" name="maxprice" type="number">
            <label>Set Price</label>
            
            </div>

            <div class="fieldbox">
			<input id="desc" name="desc" type="text">
            <label>Description</label>
            </div>

            <div class="fieldbox">
            <br>
			<input type="file" name="image">
            <label>Upload Image</label>
            </div>

            <div class="butt">
			<button class="button">Submit<input type="submit" name="submit" value="" class="shownone"></button>
            </div>
        </form>
        </div>
        
    </div>    
</div>    

    <script type="text/javascript">
        document.getElementById('dropdown').addEventListener('click',
        function(){
            document.querySelector('.hide').style.display = 'block';
            document.getElementById('dropdown').className = 'animate';
        });
    </script>


    <div class="welcome">
        <div class="welcomepopup">
            <br>
            <br>
            <p>Welcome to MarketPlace, Seller 1!</p>
            <p>You can post your items for sale here.</p>
            <p>We hope we can help connect you to a buyer!</p>
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