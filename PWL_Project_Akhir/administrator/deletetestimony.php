<?php
session_start();
if(!$_SESSION['login']){
    header("location:index.php");
    die;
}
include '../conn.php';

if(isset($_GET['deleteid'])){
    $id = $_GET['deleteid'];
    $sql="delete from testimonies where id='$id'";
    $hasil = mysqli_query($conn, $sql);
    if($hasil){
        header("location:testimonies.php");
    }else{die(mysqli_error($conn));}
}

?>