<?php
$logs = 0;
$host = "localhost";
$user = "root";
$pass = "";
$db = "CRUD_pdo";
$conn = mysqli_connect($host, $user, $pass, $db);
if (!$conn) {
    die("koneksi gagal...");
}
// echo "koneksi ke database berhasil............";
