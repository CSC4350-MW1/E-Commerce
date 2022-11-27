<?php
session_start();
$error = '';
if(isset($_POST['submit'])){
if ($_POST["pass"] === $_POST["confirm"]) {
    if(empty($_POST['user']) || empty($_POST['pass']) || empty($_POST['type']) || empty($_POST['email']) || empty($_POST['confirm']) || empty($_POST['first']) 
    || empty($_POST['last'])){
        $error = "Fill out all fields to register";
    }else{

        $firstname=$_POST['first'];
        $lastname=$_POST['last'];
        $email=$_POST['email'];
        $user=$_POST['user'];
        $pass=password_hash($_POST['pass'], PASSWORD_DEFAULT);
        $usertype=$_POST['type'];

        

        $conn=new mysqli('localhost','root','','marketplace');
        
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        $query = "INSERT INTO userdata(username, password, usertype, email, firstname, lastname)
        VALUES('$user','$pass','$usertype','$email','$firstname','$lastname')";

        if ($conn->query($query) === TRUE) {
            $error = 'Registered!';
            
            header('Location: login.php');
        }else{
            //$error = 'DATABASE ERROR';
            echo "Error: " . $query . "<br>" . $conn->error;
        }        
        mysqli_close($conn);
    }
}
else {
    $error = 'Passwords do not match';
}
}

?>