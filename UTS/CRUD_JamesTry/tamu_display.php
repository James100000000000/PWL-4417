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
    <title>Display2</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
</head>
<body>
<ul class="nav nav-tabs justify-content-end">

<li class="nav-item">
    <a class="nav-link" href="display.php">Barang</a>
</li>
<li class="nav-item">
    <a class="nav-link active" href="#">Tamu</a>
</li>
<li class="nav-item">
    <a class="nav-link" href="logout.php">Logout</a>
</li>
<!-- <li class="nav-item ">
    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
</li> -->
</ul>
    <div class="container">
        <button class="btn btn-primary my-5" >
            <a href="tamu_user.php" class="text-light">Tambah</a>
        </button>
        <table class="table">
<thead>
<tr>
    <th scope="col">kode user</th>
    <th scope="col">Nama</th>
    <th scope="col">Email</th>
    <th scope="col">Handphone</th>
    <th scope="col">Password</th>
    <th scope="col">Peran</th>
    <th scope="col">Operations</th>
</tr>
</thead>
<tbody>
<?php

use LDAP\Result;

$sql="select * from tamu_crud";
$result=mysqli_query($conn,$sql);
if($result){
    while($row=mysqli_fetch_assoc($result)){
        $id =$row['id'];
        $nama = $row['nama'];
        $email = $row['email'];
        $mobile = $row['hp'];
        $password = $row['password'];
        $peran = $row['peran'];
        echo'
            <tr>
                <th scope="row">'.$id.'</th>
                <td>'.$nama.'</td>
                <td>'.$email.'</td>
                <td>'.$mobile.'</td>
                <td>'.$password.'</td>
                <td>'.$peran.'</td>
                <td>
                    <button class="btn btn-primary"><a href="tamu_update.php?updateid='.$id.'" class="text-light">Upldate</a></button>
                    <button class="btn btn-danger"><a href="tamu_delete.php?deleteid='.$id.'" class="text-light">Delete</a></button>
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