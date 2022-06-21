<?php 
// session_start();
// if(!$_SESSION['login']){
//     header("location:login.php");
//     echo"Beofre accessing sensitive information, please make sure you are loggedin ";
//     die;
// }
include 'conn.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/stylesheet.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
    <title>Gallery</title>
</head>

<body>
    <nav>
        <ul class="nav nav-tabs justify-content-end">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Foods</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="drinks.php">Drinks</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="gallery.php">Gallery</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="testimonies.php">Testimonies</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="shopcart.php">Shopping Cart</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="order.php">Order</a>
            </li>
        </ul>
    </nav>
    <div class="container">
        <h1>Welcome to our Gallery</h1>
        <a name = "picture" class="text-light">
            <form method="POST"><button  name="picture" class="btn btn-primary my-5" >Add Picture</button></form><br>
        </a>
        <?php
        if(isset($_POST['picture'])){
            if (isset($_GET['error'])) : ?>
                <p><?php echo $_GET['error']; ?></p>
            <?php endif ?>
            <form action="uploadimg.php" method="post" enctype="multipart/form-data">
        
                <input type="file" name="my_image">
        
                <input type="submit" name="submit" value="Upload">
        
            </form>
            <?php
        }
        ?>

        <?php
        $sql = "SELECT * FROM guest ORDER BY id DESC";
        $result = mysqli_query($conn,  $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($rows = mysqli_fetch_assoc($result)) {
                $barid   = $rows['id'];
                $image   = $rows['image_url'] ?>

                <div class="alb">
                    <a href="guest/<?= $image ?>"><img src="guest/<?= $image ?>"></a>
                    <!-- <?php echo '  <div class="del"><a href="DeleteIMG.php?deleteid=' . $barid . '"
                    class="text-light"> <button class="btn btn-danger">Delete</button></a></div>' ?> -->
                </div>

        <?php }
        } ?>

</body>

</html>