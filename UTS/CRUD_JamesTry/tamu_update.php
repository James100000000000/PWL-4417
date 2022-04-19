<?php
session_start();
if(!$_SESSION['login']){
    header("location:index.php");
    die;
}

include 'conn.php';
$id=$_GET['updateid'];
$sql="select * from tamu_crud 
    where id=$id";
$result= mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
    $id =$row['id'];
    $nama = $row['nama'];
    $email = $row['email'];
    $mobile = $row['hp'];
    $password = $row['password'];
    $peran = $row['peran'];
if(isset($_POST['submit'])){
    $name   = $_POST['nama'];
    $email  = $_POST['email'];
    $mobile = $_POST['hp'];
    $password= $_POST['password'];
    $peran= $_POST['peran'];

    $sql="update tamu_crud set id=$id , nama='$name', email='$email', hp = '$mobile', password = '$password',peran = '$peran'
        where id=$id";
    $result= mysqli_query($conn,$sql) ;
    if($result){
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

    <title>Insert</title>
</head>

<body>
    <div class="container my-5">
        <form method="post">
            <div class="form-group">
                <label>Nama</label>
                <input type="text" class="form-control" placeholder="Masukan Nama anda" name="nama" autocomplete="off" value="<?php echo $nama ?>">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" placeholder="Masukan Email anda" name="email" autocomplete="off" value="<?php echo $email ?>">
            </div>
            <div class="form-group">
                <label>Nomor Hp</label>
                <input type="text" class="form-control" placeholder="Masukan Nomor HP anda" name="hp" autocomplete="off" value="<?php echo $mobile ?>">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" placeholder="Masukan Nomor HP anda" name="password" autocomplete="off" value="<?php echo $password ?>">
            </div>
            <div class="form-group">
                <label>Peran</label>
                <input type="text" class="form-control" placeholder="Masukan Peran anda" name="peran" autocomplete="off" value="<?php echo $peran ?>">

                
            </div>

            <button type="submit" class="btn btn-primary" name="submit">Update</button>
        </form>
    </div>


</body>

</html>