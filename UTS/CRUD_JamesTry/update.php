<?php
session_start();
if(!$_SESSION['login']){
    header("location:index.php");
    die;
}

include 'conn.php';
$id=$_GET['updateid'];
$sql="select * from crud_testing 
    where id=$id";
$result= mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
    $nama   = $row['nama'];
    $harga  = $row['harga'];
    $gambar = $row['gambar'];
    $jml_stok= $row['jml_stok'];

if(isset($_POST['submit'])){
    $name   = $_POST['nama'];
    $harga  = $_POST['harga'];
    $gambar = $_POST['gambar'];
    $jml_stok= $_POST['jml_stok'];

    $sql="update crud_testing set id=$id , nama='$name', harga='$harga', gambar = '$gambar', jml_stok = '$jml_stok'
        where id=$id";
    $result= mysqli_query($conn,$sql) ;
    if($result){
        header("location:display.php");
    }else{die(mysqli_error($conn));}
}
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
    <div class="container my-5">
        <form method="post">
            <div class="form-group">
                <label>Nama Barang</label>
                <input type="text" class="form-control" placeholder="Masukan Nama Barang" name="nama" autocomplete="off" value="<?php echo $nama ?>">
            </div>
            <div class="form-group">
                <label>Harga Barang</label>
                <input type="text" class="form-control" placeholder="Masukan Harga Barang" name="harga" autocomplete="off" value="<?php echo $harga ?>">
            </div>
            <div class="form-group">
                <label>Gambar Barang</label>
                <input type="file" class="form-control" placeholder="Masukan Gambar Barang" name="gambar" autocomplete="off" value="<?php echo $gambar ?>">
            </div>
            <div class="form-group">
                <label>Jumlah Stock</label>
                <input type="text" class="form-control" placeholder="Masukan Jumlah Stock" name="jml_stok" autocomplete="off" value="<?php echo $jml_stok ?>">

                
            </div>

            <button type="submit" class="btn btn-primary" name="submit">Update</button>
        </form>
    </div>


</body>

</html>