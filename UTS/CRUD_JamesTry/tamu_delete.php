<?php

session_start();
if(!$_SESSION['login']){
    header("location:index.php");
    die;
}
include 'conn.php';
if(isset($_GET['deleteid'])){
    $id = $_GET['deleteid'];
    $sql="delete from tamu_crud where id='$id'";
    $hasil = mysqli_query($conn, $sql);
    if($hasil){
        header("location:tamu_display.php");
    }else{die(mysqli_error($conn));}
}

?>