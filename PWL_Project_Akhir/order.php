<?php 
include 'conn.php';
session_start();
if ( @!$_SESSION['mejano'] ){
    header("Location: index.php");
}
$nomeja = $_SESSION['mejano'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/stylesheet.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
    <title>Order</title>
</head>
<body>
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
                <a class="nav-link" href="shopcart.php">Shopping Cart</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="order.php">Order</a>
            </li>
        </ul>
    </nav>
<div class="container">
        <h1>Order Meja <?php echo $nomeja;?></h1>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>   
                    <th scope="col">Name</th>
                    <th scope="col">Desc</th>
                    <th scope="col">Count</th>
                    <th scope="col">Status</th>
                    <th scope="col">Price</th>            
                </tr>
            </thead>
            <tbody>
                <?php

                use LDAP\Result;

                $sql = "select * from order$nomeja";
                $result = mysqli_query($conn, $sql);
                $total = 0 ;
                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $name = $row['name'];
                        $id = $row['id'];
                        $dsc = $row['desc'];
                        $price = $row['price'];
                        $count = $row['jumlah'];
                        $status = $row['paid'];
                        $total += $price*$count;
                        echo '
            <tr>
                <td scope="row">' . $id . '</td>
                <td>' . $name . '</td>
                <td >' . $dsc . '</td>
                <td >' . $count . '</td>
                <td >' . $status . '</td>
                <td >' . $price . '</td>                
            </tr>';
                    } ?>
            <tr>
                    <td><b>Total</b></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><b><?php echo'Rp.'.$total.'' ?></b></td>
            </tr>
                    <?php
                }
                ?>



            </tbody>
        </table>
    </div>
</body>
</html>