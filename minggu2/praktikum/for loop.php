<!DOCTYPE html>
<html>
<head> </head>
<meta charset="UTF-8">
<title> </title>

<body>

<form>
    <input type="text" name="num1" placeholder="cari faktorial dari"><br>
    <br>
    <button type="submit" name="submit" value="submit">Calculate</button>
</form>
<?php
    if (isset($_GET['submit'])){
        $result1 = $_GET['num1'];
        $fact = 1; 
        if ($result1 >= 0) {
            for ($x = $result1; $x >= 1; $x--) {
                $fact *= $x;
            }echo "<br>factorial dari ",$result1," adalah : $fact";
        }else{
            echo "masukan angka positive.";}
}
?>
</body>

</html>