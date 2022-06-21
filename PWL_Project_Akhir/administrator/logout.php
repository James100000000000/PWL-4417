<?php 
session_start();
$_SESSION['login'] = false;
if(!$_SESSION['login']){
    header("location:index.php");
    die;
}
?>