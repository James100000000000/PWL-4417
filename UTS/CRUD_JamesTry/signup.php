<?php
include 'conn.php';
if(isset($_POST['signup'])){
    $uname = $_POST['username'];
    $email = $_POST['email'];
    $password=$_POST['password'];
    $sql="insert into login (nama,email,password)
    values ('$uname','$email','$password');";
    $result=mysqli_query($conn,$sql);
    if($result){
        // sleep(2);
        echo"success";
        header( "refresh:2; url=index.php" ); //wait for 5 seconds before redirecting
    }else{die(mysqli_error($conn));
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
    <title>Sign up</title>
</head>
<body>
<div class="wrapper">
    <div class="logo"> <img src="assets/Jamesinnasuit.png" alt=""> </div>
    <div class="text-center mt-4 name"> UTS PWL </div>
    <form class="p-3 mt-3" method="post">
        <div class="form-field d-flex align-items-center"> <span class="far fa-user"></span> <input type="text" name="username"placeholder="Username" required> </div>
        <div class="form-field d-flex align-items-center"> <span class="far fa-user"></span> <input type="email" name="email"placeholder="Email" required> </div>
        <div class="form-field d-flex align-items-center"> <span class="fas fa-key"></span> <input type="password" name="password" id="pwd" placeholder="Password" required> </div> 
        <button class="btn mt-3" name="signup">Sign up</button>
    </form>
</div>
</body>
</html>
