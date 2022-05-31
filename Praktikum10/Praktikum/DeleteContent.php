<?php
include 'conn.php';

if(isset($_GET['deleteid'])){
    $id = $_GET['deleteid'];
    $sql="delete from data_saya where realid='$id'";
    $hasil = mysqli_query($conn, $sql);
    if($hasil){
        header("location:index.php");
    }else{die(mysqli_error($conn));}
}

?>