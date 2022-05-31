<?php
// session_start();
// if(!$_SESSION['login']){
//     header("location:index.php");
//     die;
// }

include 'conn.php';
$truid = $bardi;
//echo $truid;
$sql = "select * from data_saya 
    where realid=$truid";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$id         = $row['id'];
$nama       = $row['nama'];
$panggilan  = $row['panggilan'];
$email      = $row['email'];
$sex        = $row['sex'];
$gol_darah  = $row['gol_darah'];


?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Update</title>
</head>

<body>

    <form action='' method='POST'>
        <table width='100%'>
            <tr>
                <td align='right'>id</td>
                <td><input type='text' required name='id' value="<?php echo $id ?>"></td>
            </tr>
            <tr>
                <td align='right'>Nama</td>
                <td><input type='text' required name='txtnama' value="<?php echo $nama ?>"></td>
            </tr>
            <tr>
                <td align='right'>Sex</td>
                <td><input type='text' required name='sex' value="<?php echo $sex ?>"></td>
            </tr>
            <tr>
                <td align='right'>Panggilan</td>
                <td><input type='text' required name='pgln' value="<?php echo $panggilan ?>"></td>
            </tr>
            <tr>
                <td align='right'>Email</td>
                <td><input type='text' required name='email' value="<?php echo $email?>"></td>
            </tr>
            <tr>
                <td align='right'>Gol_Darah</td>
                <td><input type='text' required name='Gol_Darah' value="<?php echo $gol_darah ?>"></td>
            </tr>
            <tr>
            <button type="submit"  name="edit">Update</button>
            </tr>
        </table>
    </form>


</body>

</html>