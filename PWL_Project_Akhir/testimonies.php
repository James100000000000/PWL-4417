<?php
include 'conn.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/stylesheet.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
    <title>Testimonies</title>
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
                <a class="nav-link active" href="testimonies.php">Testimonies</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="shopcart.php">Shopping Cart</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="order.php">Order</a>
            </li>

            <li style="position: absolute;top: 1px; left: 8px; font-size: 18px;" class="nav-item">
                <div class="dropdown">
                    <a class="nav-link" href="#">Navigate</a>
                    <div class="dropdown-content">
                        <?php
                        $sql = "select * from testimonies";
                        $result = mysqli_query($conn, $sql);
                        if ($result) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $header = $row['Name'];
                                $id = $row['id'];
                                echo ' <a class="nav-link" href="#' . $id . '">' . $header . '</a>';
                            }
                        } else {
                            echo 'connection Error';
                        }
                        ?>
                    </div>
                </div>
            </li>
        </ul>
    </nav>
    <div class="container">
        <a href="add_content.php" class="text-light">
            <button class="btn btn-primary my-5">
                Add Testimony
            </button><br></a>
        <div class="testimonies">
            <?php
            $sql = "SELECT * FROM testimonies";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $header = $row['Name'];
                    $id = $row['id'];
                    $content = $row['content'];
                    echo ' <h1 id="' . $id . '">' . $header . '</h1><br><pre>' . $content . '</pre><hr>';
                }
            } else {
                die(mysqli_error($conn));
            }
            ?>
        </div>
    </div>
</body>

</html>