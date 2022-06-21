<?php
session_start();
if(!$_SESSION['login']){
    header("location:index.php");
    die;
}
include '../conn.php';

if(isset($_GET['deleteid'])){
    $id = $_GET['deleteid'];
    $sql="select * from guest where id=$id";
    $result= mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);
    $img_name =$row['image_url'];
    $path = '../guest/'.$img_name.'';
    if (!unlink($path)){
        die('Error');
    }else{
    $sql="DELETE FROM guest WHERE id='$id'";
    $hasil = mysqli_query($conn, $sql);
    if($hasil){
        header("location:gallery.php");
    }else{die(mysqli_error($conn));}
}}

?>