<?php

$engi = "mysql";
$host = "localhost";
$dbse = "crud_pdo";
$user = "root";
$pass = "";
try{
$koneksi = new PDO($engi.':dbname='.$dbse.";host=".$host,
$user,$pass);
}
catch (PDOException $e){
    echo 'Error: '.$e->getMessage();
    exit();
}
// echo'Connected to MySQL';

$sqlSelect = 'select * from data_saya';
$stmt = $koneksi->prepare($sqlSelect);
$stmt->execute();
?>
<table border= "1" style="text-align:center">
    <tr>
        <td><?php echo ' id ' ?></td>
        <td><?php echo "Nama" ?></td>
        <td><?php echo " Panggilan " ?></td>
        <td><?php echo " Sex " ?></td>
        <td><?php echo "Email" ?></td>
        <td><?php echo " Gol_Darah " ?></td>
    </tr>
<?php
while($row = $stmt->fetch()){
?>

<tr>
    <td><?php echo $row['id'];?></td>
    <td><?php echo $row['nama'];?></td>
    <td><?php echo $row['panggilan'];?></td>
    <td><?php echo $row['sex'];?></td>
    <td><?php echo $row['email'];?></td>
    <td><?php echo $row['gol_darah'];?></td>
</tr>
<?php
}
?> 
</table>