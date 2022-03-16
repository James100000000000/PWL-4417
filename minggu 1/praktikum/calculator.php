<!DOCTYPE html>
<html>
<head> </head>
<meta charset="UTF-8">
<title> </title>

<body>

<form>
    <input type="text" name="num1" placeholder="nomor 1"><br>
    <input type="text" name="num2" placeholder="nomor 2"><br>
    <select name="operator">
        <option value="0">None</option>
        <option value="1">+</option>
        <option value="2">-</option>
        <option value="3">×</option>
        <option value="4">÷</option>
    </select> 
    <br>
    <button type="submit" name="submit" value="submit">Calculate</button>
</form>
<?php
    if (isset($_GET['submit'])){
        echo "<br>Jawaban nya adalah:<br><br>";
        $result1 = $_GET['num1'];
        $result2 = $_GET['num2'];
        $operator = $_GET['operator'];
        switch ($operator){
            case 0:
                echo"tidak ada metode pencaculasian";
                break;
            case 1:
                echo"$result1+$result2 = ",$result1+$result2;
                break;
            case 2:
                echo"$result1-$result2 = ",$result1-$result2;
                break;
            case 3:
                echo"$result1 × $result2 = ",$result1*$result2;
                break;
            case 4:
                echo"$result1 ÷ $result2 = ", $result1/$result2;
                break;
    }

}
?>
</body>

</html>