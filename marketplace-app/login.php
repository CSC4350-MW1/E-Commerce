<?php

include("logincode.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
    <link rel="icon" type="image/x-icon" href="favicons/user.png">
</head>
<body>
    <div id="navbar">
        <h3 id="home">MarketPlace</h3>
        <nav>
        <ul class="links">
            <li><a href="login.php">Login</a></li>
            <li><a href="register.php">Register</a></li>
        </ul>
        </nav>
        <a href="index.html" id="homelink">Home</a>
    </div>

    <div id="logindiv">
    <h1>Login</h1>
    <form method="POST" action="">	

            <div class="fieldbox">
            <input id="email" name="email" type="text">
            <label>Email</label>
            <span></span>
            </div>
            <div class="fieldbox">
			<input id="user" name="user" type="text">
            <label>Username</label>
            <span></span>
            </div>
            <div class="fieldbox">
			<input id="pass" name="pass" type="password">
            <label>Password</label>
            <span></span>
            </div>

            <div class="usertypes">
                
            <p><input id="op1" name="type" type="radio" value="buyer" class="radiobut">
            <label class="radiolab" for="buyer">Buyer</label></p>

            <p><input id="op2" name="type" type="radio" value="seller" class="radiobut">
            <label class="radiolab" for="seller">Seller</label></p>

        

            </div>

            <div class="butt">
			<button class="button">Login<input type="submit" name="submit" value="" class="shownone"></button>
            </div>
            <div class="signup">
                <a href="register.php" class="registered"><p>Not Registered?</p></a>
            </div>
	</form>
    <p class="error" style="color: red;"><?php echo $error;?></p>
    
    </div>

</body>
</html>