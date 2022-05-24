<?php
$engi = "mysql";
$host = "localhost";
$dbse = "pwl";
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
<!-- <a href="UpdateContent.php?updateid=' . $barid . '" >Edit</button></a> -->
<table border= "1" style="text-align:center">
    <tr>
        <td><?php echo ' id ' ?></td>
        <td><?php echo "Nama" ?></td>
        <td><?php echo " Panggilan " ?></td>
        <td><?php echo " Sex " ?></td>
        <td><?php echo "Email" ?></td>
        <td><?php echo " Gol_Darah " ?></td>
        <td><?php echo " Aksi" ?></td>
    </tr>
<?php
while($row = $stmt->fetch()){
    $bardi =$row['realid'];
?>

<tr>
    <td><?php echo $row['id'];?></td>
    <td><?php echo $row['nama'];?></td>
    <td><?php echo $row['panggilan'];?></td>
    <td><?php echo $row['sex'];?></td>
    <td><?php echo $row['email'];?></td>
    <td><?php echo $row['gol_darah'];?></td>
    <td><form method="POST"><?php $bardi; ?><button name="update">Update</button></form> 
    <?php echo' 
    <a href="DeleteContent.php?deleteid=' . $bardi . '" > <button >Delete</button></a></td> '?>
</tr>
<?php
}
?> 
</table>
<form method="POST"><button  name="tambah">Tambah</button></form>
<?php 
include "tambah.php";
if(isset($_POST['tambah'])){
    $form = new Form ("","Input Form");
$form->addField ("id", "id");
$form->addField ("txtnama", "Nama");
$form->addField ("sex", "Sex");
$form->addField ("pgln", "Panggilan");
$form->addField ("email", "Email");
$form->addField ("Gol_Darah", "Gol_Darah");

echo "<h3>Silahkan isi form berikut ini :</h3>";
$form->displayForm();
}
if (isset($_POST['edit'])) {
    $id     = $_POST['id'];
    $nama = $_POST['txtnama'];
    $panggilan = $_POST['pgln'];
    $email=  $_POST['email'];
    $sex = $_POST['sex'];
    $gol_darah=  $_POST['Gol_Darah'];

    $sql = "update data_saya set id='$id', nama='$nama', panggilan='$panggilan', email='$email', sex='$sex', gol_darah='$gol_darah' where realid=$bardi";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo'updated';
        header("location:index.php");
    } else {
        die(mysqli_error($conn));
    }
}
if(isset($_POST['update'])){
    include 'UpdateContent.php';
}

?>
