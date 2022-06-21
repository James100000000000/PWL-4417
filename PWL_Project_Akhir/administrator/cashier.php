<?php
include '../conn.php';
session_start();
if(!$_SESSION['login']){
    header("location:index.php");
    die;
}
include '../assets/variables.php';
$jummj = $jumltbl;
if(isset($_POST['deleteall'])){
    $nomeja = $_POST['tableno'];
    $loc = $_POST['location'];
    $sql="TRUNCATE TABLE order$nomeja;";
    $hasil = mysqli_query($conn, $sql);
    if($hasil){
        header("location:$loc");
    }else{die(mysqli_error($conn));}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/stylesheet.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
    <title>Cashier</title>
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
                <a class="nav-link" href="server.php">Server</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="cashier.php">Cashier</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logout.php">Logout</a>
            </li>
        </ul>
    </nav>

    <div class="container">
        <h1>Cashier</h1>
        <br>
        <?php
        $i = 0;
        while ($i < $jummj) {
            $i += 1;
            $nomeja = $i;            
            $sql = "select * from order$nomeja where `paid` = 'Terbuat'";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                $total = 0 ;
                echo '<br><center><h2>Meja Nomor ' . $nomeja . '</h2></center><br>';
        ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>                            
                            <th scope="col">Name</th>
                            <th scope="col">Desc</th>                            
                            <th scope="col">Count</th>
                            <th scope="col">Price</th>
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
                            $total += $price*$count;
                            echo '
            <tr>
                <td scope="row">' . $id . '</td>
                <td>' . $name . '</td>
                <td >' . $dsc . '</td>                
                <td >' . $count . '</td>
                <td >' . $price . '</td>
                <td>                                      
                <form method="post" action="../deletecart.php">
                <input type="hidden" name="tableno" value="'.$nomeja.'"/>
                <input type="hidden" name="deleteid" value="'.$id.'"/>
                <input type="hidden" name="location" value="administrator/cashier.php">
                <input type="submit" name="delete" value="Selesai" class="btn btn-danger">
                </form>  </td>
            </tr>';
                        }
            echo'<tr>
            <td><b>Total</b></td>
            <td></td>
            <td></td>
            <td></td>
            <td><b>Rp.'.$total.'</b></td>
            <td><form method="post">
            <input type="hidden" name="tableno" value="'.$nomeja.'"/>
            <input type="hidden" name="location" value="cashier.php">
            <input type="submit" name="deleteall" value="Selesaikan Semua" class="btn btn-primary">
            </form> </td>
            </tr>';



                        ?>



                    </tbody>
                </table><?php }
                } ?>
        <!-- <form method="POST"><a class="text-light"><button name="reset" class="btn btn-danger">Reset</button></a></form>
        <form method="POST"><a class="text-light"><button name="order" class="btn btn-primary">Order</button></a></form> -->
    </div>
</body>

</html>