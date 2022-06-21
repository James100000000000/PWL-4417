<?php
include 'conn.php';
session_start();
if ( @!$_SESSION['mejano'] ){
    header("Location: index.php");
}
$nomeja = $_SESSION['mejano'];
if(isset($_POST['reset'])){
    $sql="TRUNCATE TABLE cart$nomeja;";
    $result= mysqli_query($conn,$sql) ;
    if(!$result){
        die(mysqli_error($conn));
    }
}
if(isset($_POST['order'])){
        $sql="insert into `order$nomeja` (`name`, `desc`, `price`, `jumlah`) 
        SELECT `name`, `desc`,`price`,`jumlah` FROM cart$nomeja;";
        $result= mysqli_query($conn,$sql) ;
        if($result){
            $sql="TRUNCATE TABLE cart$nomeja;";
            mysqli_query($conn,$sql) ;
            header("Location: order.php");
        }else{ die(mysqli_error($conn));}
        
    
    
    
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/stylesheet.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
    <title>Cart</title>
</head>

<body style="margin-top:30px">
    <nav>
        <ul class="nav nav-tabs justify-content-end">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Foods</a>
            </li>
            <li class="nav-item">
                <a class="nav-link  " href="drinks.php">Drinks</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="gallery.php">Gallery</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="testimonies.php">Testimonies</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="shopcart.php">Shopping Cart</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="order.php">Order</a>
            </li>
        </ul>
    </nav>


    <div class="container">
        <h1>Edit Cart</h1>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>   
                    <th scope="col">Name</th>
                    <th scope="col">Desc</th>
                    <th scope="col">Price</th>
                    <th scope="col">Count</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php

                use LDAP\Result;

                $sql = "select * from cart$nomeja";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $name = $row['name'];
                        $id = $row['id'];
                        $dsc = $row['desc'];
                        $price = $row['price'];
                        $count = $row['jumlah'];
                        echo '
            <tr>
                <td scope="row">' . $id . '</td>
                <td>' . $name . '</td>
                <td >' . $dsc . '</td>
                <td >Rp.' . $price . '</td>
                <td >' . $count . '</td>
                <td>
                    <a href="updatecart.php?updateid=' . $id . '" class="text-light"><button class="btn btn-primary">Edit</button></a>
                    <a href="deletecart.php?deleteid=' . $id . '" class="text-light"> <button class="btn btn-danger">Delete</button></a>
                </td>
            </tr>';
                    }
                }
                ?>



            </tbody>
        </table>
        <form method="POST"><a class="text-light"><button name="reset" class="btn btn-danger">Reset</button></a></form>
        <form method="POST"><a class="text-light"><button name="order" class="btn btn-primary">Order</button></a></form>
    </div>
</body>

</html>