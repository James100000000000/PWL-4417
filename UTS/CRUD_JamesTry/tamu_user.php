<?php
session_start();
if(!$_SESSION['login']){
    header("location:index.php");
    die;
}

include 'conn.php';
if(isset($_POST['submit'])){
    $name   = $_POST['nama'];
    $email  = $_POST['email'];
    $mobile =  $_POST['hp'];
    $password=$_POST['password'];
    $peran  =  $_POST['peran'];

    $sql="insert into tamu_crud (nama,email,hp,password,peran)
    values ('$name','$email','$mobile','$password','$peran');";
    $result= mysqli_query($conn,$sql) ;
    if($result){
        // echo"Data tersimpan";
        header("location:tamu_display.php");
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

    <title>Insert2</title>
</head>

<body>
    <div class="container my-5">
        <form method="post">
            <div class="form-group">
                <label>Nama</label>
                <input type="text" class="form-control" placeholder="Masukan Nama anda" name="nama" autocomplete="off">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" placeholder="Masukan Email anda" name="email" autocomplete="off">
            </div>
            <div class="form-group">
                <label>Nomor Hp</label>
                <input type="text" class="form-control" placeholder="Masukan Nomor HP anda" name="hp" autocomplete="off">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="text" class="form-control" placeholder="Masukan Password anda" name="password" autocomplete="off">
            </div>
            <div class="form-group">
                <label>Peran</label>
                <input type="text" class="form-control" placeholder="Masukan Peran anda" name="peran" autocomplete="off">

                
            </div>

            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
    </div>


</body>

</html>