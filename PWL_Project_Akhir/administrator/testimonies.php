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
    <title>Manage Testimonies</title>
</head>

<body>
<nav>
        <ul class="nav nav-tabs justify-content-end">
            <li class="nav-item">
                <a class="nav-link" href="foods.php">Foods</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="drinks.php">Drinks</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="gallery.php">Gallery</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="testimonies.php">Testimonies</a>
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
        <h1>Manage Content</h1>
        <br>
        <a href="add_content.php" class="text-light">
            <button class="btn btn-primary my-5">
                Add
            </button>
        </a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>   
                    <th scope="col">Name</th>
                    <th scope="col">Content</th>
                    <th scope="col">Action</th>

                </tr>
            </thead>
            <tbody>
                <?php

                use LDAP\Result;

                $sql = "select * from testimonies";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $name = $row['Name'];
                        $id = $row['id'];
                        $content = $row['content'];                    
                        echo '
            <tr>
                <td scope="row">' . $id . '</td>
                <td>' . $name . '</td>
                <td >' . $content . '</td>                
                <td>
                    <a href="deletetestimony.php?deleteid=' . $id . '" class="text-light"> <button class="btn btn-danger">Delete</button></a>
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