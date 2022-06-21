<?php
session_start();
include 'conn.php';
if ( @!$_SESSION['mejano'] ){
    header("Location: index.php");
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
    <title>Menu Minuman</title>
</head>

<body style="margin-top:30px">
    <nav>
        <ul class="nav nav-tabs justify-content-end">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Foods</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active " href="drinks.php">Drinks</a>
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
                <a class="nav-link" href="order.php">Order</a>
            </li>
        </ul>
    </nav>

    <?php
    $sql = "select * from drinks";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $image = $row['image_url'];
            $barid = $row['id'];
            $price = $row['price'];
            $dsc = $row['dsc'];
            $nm = $row['name'];
            echo '
                <div class="gallery" >
                <b style="color: #FF8C32; font-size: 20px"><center>' . $nm . '</b></center>
                <div class="discounted_price" style="color: black;">Rp.' . $price . '</div>
                <center><img src="drinks/' . $image . '" alt="assets/error.jpg" min-width="400" max-width="600" max-height="400"></center>
                </a>
                <div class="desc">' . $dsc. '</div>';
                echo'
                <form action="pesan.php" method="POST">
                <input type="hidden" name="tipe" value="drink"/>
                <input type="hidden" name="id_barang" value="' . $barid . '"/>
                <a style="text-decoration: none; color: #333652; font-size: 20px;"><b><center><div class="buy"  ><button>Beli</button></div></b></center></a>
                </form>
                ';
                echo'
                </div>
                ';
        }
    }
    ?>
</body>

</html>