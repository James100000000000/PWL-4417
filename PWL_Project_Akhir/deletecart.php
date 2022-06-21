<?php
include 'conn.php';
session_start();

if(isset($_POST['Done'])){
    $nomeja = $_POST['tableno'];
    $id = $_POST['doneid'];
    $sql="update `order$nomeja` set `paid` = 'Terbuat' where `id` = '$id'";
    $hasil = mysqli_query($conn, $sql);
    if($hasil){
        header("location:administrator/server.php");
    }else{die(mysqli_error($conn));}

}

if(isset($_POST['delete'])){
    $nomeja = $_POST['tableno'];
    $id = $_POST['deleteid'];
    $loc = $_POST['location'];
    $sql="delete from order$nomeja where id='$id'";
    $hasil = mysqli_query($conn, $sql);
    if($hasil){
        header("location:$loc");
    }else{die(mysqli_error($conn));}
}

if(isset($_GET['deleteid'])){
    $id = $_GET['deleteid'];
    $nomeja = $_SESSION['mejano'];
    $sql="delete from cart$nomeja where id='$id'";
    $hasil = mysqli_query($conn, $sql);
    if($hasil){
        header("location:shopcart.php");
    }else{die(mysqli_error($conn));}
}

?>