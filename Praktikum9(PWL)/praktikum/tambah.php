<?php
include 'conn.php';
if(isset($_POST['submit'])){
    $id     = $_POST['id'];
    $nama = $_POST['txtnama'];
    $panggilan = $_POST['pgln'];
    $email=  $_POST['email'];
    $sex = $_POST['sex'];
    $gol_darah=  $_POST['Gol_Darah'];
    $sql="insert into data_saya (nama,id,panggilan,sex,email,gol_darah)
    values ('$nama','$id','$panggilan','$sex','$email','$gol_darah');";
    $result= mysqli_query($conn,$sql) ;
    if($result){
        echo"Data tersimpan";
        header("location:index.php");
    }else{die(mysqli_error($conn));}
    }


class Form {
var $fields = array(); 
var $action;
var $submit = "Submit Form";
var $jumField = 0;
function __construct($action, $submit){
$this->action = $action;
$this->submit = $submit;
}
function displayForm(){

echo "<form action='".$this->action."' method='POST'>";
echo "<table width='100%'>";
for ($j=0; $j<count($this->fields); $j++) {
    echo "<tr><td align='right'>".$this->fields[$j]['label']."</td>";
    echo "<td><input type='text' required name='".$this->fields[$j]['name']."'></td></tr>";
}
echo "<tr><td colspan='2'>";
echo "<input type='submit'  required name= 'submit' value='".$this->submit."'></td></tr>";
echo "</table></form>";
}
function addField($name, $label){
$this->fields [$this->jumField]['name'] = $name;
$this->fields [$this->jumField]['label'] = $label;
$this->jumField ++;
}
}

?>
