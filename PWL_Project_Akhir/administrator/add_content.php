<?php
session_start();
if(!$_SESSION['login']){
    header("location:index.php");
    die;
}
include '../conn.php';
if(isset($_POST['submit'])){
    $header = $_POST['header'];
    $content=  $_POST['content'];

    $sql="insert into testimonies (name,content)
    values ('$header','$content');";
    $result= mysqli_query($conn,$sql) ;
    if($result){
        // echo"Data tersimpan";
        header("Location: testimonies.php");
    }else{die(mysqli_error($conn));}
}
?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">

    <title>Insert</title>
</head>

<body>
<nav>
        <ul class="nav nav-tabs justify-content-end">
            <li class="nav-item">
                <a class="nav-link " href="index.php">Foods</a>
            </li>
            <li class="nav-item">
                <a class="nav-link  " href="drinks.php">Drinks</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="gallery.php">Gallery</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="testimonies.php">Testimonies</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logout.php">Logout</a>
            </li>
        </ul>
    </nav>
    <div class="container my-5">
        <form method="post">
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" placeholder="Your Name Here" name="header" autocomplete="off" required>
            </div>
            <div class="form-group">
                <label>Content</label>
                <textarea rows="20" cols="50" class="form-control" placeholder="your Testimony here" name="content" autocomplete="off" required ></textarea>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
    </div>


</body>

</html>