<?php
session_start();
if(!$_SESSION['login']){
    header("location:index.php");
    die;
}
include 'conn.php';?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display1</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">

</head>
<body>
<ul class="nav nav-tabs justify-content-end">
<li class="nav-item">
    <a class="nav-link active" href="#">Barang</a>
</li>
<li class="nav-item">
    <a class="nav-link" href="tamu_display.php">Tamu</a>
</li>
<li class="nav-item">
    <a class="nav-link" href="logout.php">Logout</a>
</li>
<!-- <li class="nav-item">
    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
</li> -->
</ul>
    <div class="container">
        <button class="btn btn-primary my-5" >
            <a href="user.php" class="text-light">Tambah</a>
        </button>
        <table class="table">
<thead>
<tr>
    <th scope="col">Kode Barang</th>
    <th scope="col">Nama</th>
    <th scope="col">Harga</th>
    <th scope="col">Gambar</th>
    <th scope="col">Jumlah Stock</th>
    <th scope="col">Aksi</th>
</tr>
</thead>
<tbody>
<?php

use LDAP\Result;

$sql="select * from crud_testing";
$result=mysqli_query($conn,$sql);
if($result){
    while($row=mysqli_fetch_assoc($result)){
        $id =$row['id'];
        $nama = $row['nama'];
        $harga = $row['harga'];
        $gambar = $row['gambar'];
        $jml_stok = $row['jml_stok'];
        echo'
            <tr>
                <th scope="row">'.$id.'</th>
                <td>'.$nama.'</td>
                <td>'.$harga.'</td>
                <td><img src="'.$gambar.'" class="rounded mx-auto d-block" alt="..."></td>
                <td>'.$jml_stok.'</td>
                <td>
                    <button class="btn btn-primary"><a href="update.php?updateid='.$id.'" class="text-light">Upldate</a></button>
                    <button class="btn btn-danger"><a href="delete.php?deleteid='.$id.'" class="text-light">Delete</a></button>
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