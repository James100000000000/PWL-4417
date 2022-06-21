<?php
session_start();
if(!$_SESSION['login']){
    header("location:index.php");
    die;
}
include '../conn.php';

if(isset($_GET['deleteid'])){
    $id = $_GET['deleteid'];
    $sql="select * from food where id=$id";
    $result= mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);
    $img_name =$row['image_url'];
    $path = '../Foods/'.$img_name.'';
    if (!unlink($path)){
        die('Error');
    }else{
    $sql="delete from food where id='$id'";
    $hasil = mysqli_query($conn, $sql);
    if($hasil){
        header("location:foods.php");
    }else{die(mysqli_error($conn));}
}}

?>