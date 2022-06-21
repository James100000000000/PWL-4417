<?php
include '../conn.php';
session_start();
if(!$_SESSION['login']){
    header("location:index.php");
    die;
}
include '../assets/variables.php';
$jummj = $jumltbl;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/stylesheet.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
    <title>Server</title>
</head>

<body style="margin-top:30px">
<nav>
        <ul class="nav nav-tabs justify-content-end">
            <li class="nav-item">
                <a class="nav-link" href="foods.php">Foods</a>
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
                <a class="nav-link active" href="server.php">Server</a>
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
        <h1>Server</h1>
        <br>
        <?php
        $i = 0;
        while ($i < $jummj) {
            $i += 1;
            $nomeja = $i;            
            $sql = "select * from order$nomeja where `paid` = 'Process'";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo '<br><center><h2>Meja Nomor ' . $nomeja . '</h2></center><br>';
        ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Action</th>
                            <th scope="col">Name</th>
                            <th scope="col">Desc</th>
                            <th scope="col">Price</th>
                            <th scope="col">Count</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        while ($row = mysqli_fetch_assoc($result)) {
                            $name = $row['name'];
                            $id = $row['id'];
                            $dsc = $row['desc'];
                            $price = $row['price'];
                            $count = $row['jumlah'];
                            echo '
            <tr>
                <td scope="row">' . $id . '</td>
                <td>                                    
                <form method="post" action="../deletecart.php">
                <input type="hidden" name="tableno" value="'.$nomeja.'"/>
                <input type="hidden" name="deleteid" value="'.$id.'"/>
                <input type="hidden" name="location" value="administrator/server.php"/>
                <input type="submit" name="delete" value="Delete" class="btn btn-danger">
                </form>  </td>
                <td>' . $name . '</td>
                <td >' . $dsc . '</td>
                <td >' . $price . '</td>
                <td >' . $count . '</td>
                <td>
                    <form method="post" action="../deletecart.php">
                    <input type="hidden" name="tableno" value="'.$nomeja.'"/>
                    <input type="hidden" name="doneid" value="'.$id.'"/>
                    <input type="hidden" name="location" value="administrator/server.php"/>
                    <input type="submit" name="Done" value="Done" class="btn btn-primary"> </form>                   
                </td>
            </tr>';
                        }


                        ?>



                    </tbody>
                </table><?php }
                } ?>
        <!-- <form method="POST"><a class="text-light"><button name="reset" class="btn btn-danger">Reset</button></a></form>
        <form method="POST"><a class="text-light"><button name="order" class="btn btn-primary">Order</button></a></form> -->
    </div>
</body>

</html>