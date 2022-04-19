<?php
session_start();
if(!$_SESSION['login']){
    header("location:index.php");
    die;
}
include 'conn.php';

if(isset($_GET['deleteid'])){
    $id = $_GET['deleteid'];
    $sql="delete from crud_testing where id='$id'";
    $hasil = mysqli_query($conn, $sql);
    if($hasil){
        header("location:display.php");
    }else{die(mysqli_error($conn));}
}

?>