<?php
session_start();
include 'conn.php';
if(isset($_POST['username'])){
    $uname = $_POST['username'];
    $password=$_POST['password'];
    $sql="select * from login where nama='".$uname."'AND password='".$password."'";
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)==1){
        $_SESSION['login'] = true;
        header( "refresh:0.5; url=display.php" ); //wait for 5 seconds before redirecting
    }else{
        $_SESSION['login'] = false;
        echo"incorrect password";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="assets/styles.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
<div class="wrapper">
    <div class="logo"> <img src="assets/Jamesinnasuit.png" alt=""> </div>
    <div class="text-center mt-4 name"> UTS PWL </div>
    <form class="p-3 mt-3" method="post">
        <div class="form-field d-flex align-items-center"> <span class="far fa-user"></span> <input type="text" name="username"placeholder="Username" required> </div>
        <div class="form-field d-flex align-items-center"> <span class="fas fa-key"></span> <input type="password" name="password" id="pwd" placeholder="Password" required> </div> 
        <button class="btn mt-3" name="login">Login</button>
    </form>
    <div class="text-center fs-6"> 
        <!-- <a href="#">Forget password?</a> or  -->
        <a href="signup.php">Sign up</a> 
    </div>
</div>
</body>
</html>
