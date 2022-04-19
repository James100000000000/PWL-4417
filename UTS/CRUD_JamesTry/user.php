<?php
session_start();
if(!$_SESSION['login']){
    header("location:index.php");
    die;
}

include 'conn.php';


if(isset($_POST['submit'])){
    $name   = $_POST['nama'];
    $harga  = $_POST['harga'];
    $gambar =  $_POST['gambar'];
    $jml_stok=  $_POST['jml_stok'];

    $sql="insert into crud_testing (nama,harga,gambar,jml_stok)
    values ('$name','$harga','$gambar','$jml_stok');";
    $result= mysqli_query($conn,$sql) ;
    if($result){
        // echo"Data tersimpan";
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

    <title>Insert1</title>
</head>

<body>
    <div class="container my-5">
        <form method="post">
            <div class="form-group">
                <label>Nama Barang</label>
                <input type="text" class="form-control" placeholder="Masukan Nama Barang" name="nama" autocomplete="off">
            </div>
            <div class="form-group">
                <label>Harga Barang</label>
                <input type="text" class="form-control" placeholder="Masukan Harga Barang" name="harga" autocomplete="off">
            </div>
            <div class="form-group">
                <label>Gambar Barang</label>
                <input type="file" class="form-control" placeholder="Masukan gambar Barang" name="gambar" autocomplete="off">
            </div>
            <div class="form-group">
                <label>Jumlah Stock</label>
                <input type="text" class="form-control" placeholder="MasukanJumlah Stock" name="jml_stok" autocomplete="off">

                
            </div>

            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
    </div>


</body>

</html>