<?php
session_start();
include 'conn.php';
if (isset($_POST['Login'])) {
    $user = $_POST['user'];
    $pass = $_POST['pass']; //periksa login
    $sql="select * from Prak08 where username='".$user."'AND password='".$pass."'";//take data from sql
    $result=mysqli_query($conn,$sql);
    if (mysqli_num_rows($result)) { //menciptakan session
        $_SESSION['login'] = $user; //menuju ke halaman pemeriksaan session
        echo" <h1>Anda berhasil LOGIN</h1>";
        echo "<h2>Klik <a href='session02.php'>di sini (session02.php)</a> untuk menuju ke halaman pemeriksaan session";

} else {echo"incorrect password";
?> <html>

    <head>
        <title>Login here...</title>
    </head>

    <body>
        <form action="" method="post">
            <h2>Login Here...</h2>
            Username : <input type="text" name="user"><br>
            Password : <input type="password" name="pass"><br>
            <input type="submit" name="Login" value="Log In">
        </form>
    </body>

    </html><?php }} ?>