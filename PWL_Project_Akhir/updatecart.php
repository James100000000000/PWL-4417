<?php
include 'conn.php';
session_start();
if ( @!$_SESSION['mejano'] ){
    header("Location: index.php");
}
$nomeja = $_SESSION['mejano'];
$truid=$_GET['updateid'];
$sql="select * from cart$nomeja 
    where id=$truid";
$result= mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
    $name = $row['name'];
    $desc     = $row['desc'];
    $price = $row['price'];
    $jumlah = $row['jumlah'];

if(isset($_POST['submit'])){

    // Insert into Database
    $name   = $_POST['name'];
    $desc  = $_POST['dsc'];
    $price = $_POST['price'];
    $jumlah = $_POST['jumlah'];
    $sql="update
`cart$nomeja`
set
`name` = '$name',
`desc` = '$desc',
`price` = '$price',
`jumlah` = '$jumlah'
where `id` = '$truid';

";
    if (mysqli_query($conn, $sql)){
    header("Location: shopcart.php");}
    else{
        die(mysqli_error($conn));
    }}
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
        </ul>
    </nav>

    <div class="container my-5">
        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
            <h5><label>Name</label></h5>
                <?php echo $name ?>
            </div>
            <div class="form-group">
            <h5><label>Desc</label></h5>
                <?php echo $desc ?>
            </div>
            <div class="form-group">
                <h5><label>Price</label></h5>
                <?php echo'Rp.';echo $price ?>
            </div>
            <div class="form-group">
                <label>Quantity</label>
                <select id="jumlah" name="jumlah" value=<?php echo $jumlah ?>>
                    <?php 
                    $i = 0;
                    while($i < 100){
                    $i+=1;
                    if($i == $jumlah){
                        echo'
                        <option value="'.$i.'" selected>
                        '.$i.'
                        </option>
                        ';    
                    }else{
                    echo'
                        <option value="'.$i.'">
                        '.$i.'
                        </option>
                        ';
                    }}
                    ?>
                    </select>
            </div>
                <input type="hidden" name="price" value="<?php echo $price?>"/>
                <input type="hidden" name="dsc" value="<?php echo $desc?>"/>
                <input type="hidden" name="name" value="<?php echo $name?>"/>
            <button type="submit" class="btn btn-primary" name="submit">Update</button>
        </form>
        <a href="shopcart.php"><button class="btn btn-danger" name="back">Back</button></a>
    </div>


</body>

</html>