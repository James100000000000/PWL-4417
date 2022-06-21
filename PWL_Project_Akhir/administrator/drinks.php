<?php
session_start();
if(!$_SESSION['login']){
    header("location:index.php");
    die;
}
include '../conn.php';
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
    <title>Manage Drinks</title>
</head>

<body>
<nav>
        <ul class="nav nav-tabs justify-content-end">
            <li class="nav-item">
                <a class="nav-link" href="foods.php">Foods</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="drinks.php">Drinks</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="gallery.php">Gallery</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="testimonies.php">Testimonies</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="server.php">Server</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="cashier.php">Cashier</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logout.php">Logout</a>
            </li>
        </ul>
    </nav>

    <div class="container">
        <h1>Edit Drinks</h1>
        <br>
        <a href="add_drink.php" class="text-light">
            <button class="btn btn-primary my-5">
                Add
            </button>
        </a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>   
                    <th scope="col">Name</th>
                    <th scope="col">Desc</th>
                    <th scope="col">Price</th>
                    <th scope="col">Image</th>
                    <th scope="col">Action</th>

                </tr>
            </thead>
            <tbody>
                <?php

                use LDAP\Result;

                $sql = "select * from drinks";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $name = $row['name'];
                        $id = $row['id'];
                        $dsc = $row['dsc'];
                        $price = $row['price'];
                        $image = $row['image_url'];
                        echo '
            <tr>
                <td scope="row">' . $id . '</td>
                <td>' . $name . '</td>
                <td >' . $dsc . '</td>
                <td >' . $price . '</td>
                <td ><img src="../drinks/' . $image . '" alt="../assets/err.jpg" style="max-width: 50px;height: auto;text-align: center;" ></td>
                <td>
                    <a href="updatedrink.php?updateid=' . $id . '" class="text-light"><button class="btn btn-primary">Edit</button></a>
                    <a href="deletedrink.php?deleteid=' . $id . '" class="text-light"> <button class="btn btn-danger">Delete</button></a>
                </td>
            </tr>';
                    }
                }
                ?>



            </tbody>
        </table>
    </div>
</body>

</html>