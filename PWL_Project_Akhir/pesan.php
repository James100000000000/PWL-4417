<?php
  include 'conn.php';
  session_start();
  $nomeja = $_SESSION['mejano'];
  if ($_POST['id_barang'] && $_POST['tipe'] == 'drink') {
    // echo'drink';
  $truid=$_POST['id_barang'];
  $sql="select * from drinks 
    where id=$truid";
  $result= mysqli_query($conn,$sql);
  $row=mysqli_fetch_assoc($result);
    $path='drinks.php';
    $type="drinks/";
    $name = $row['name'];
    $desc     = $row['dsc'];
    $price = $row['price'];
    $image = $row['image_url'];

  }elseif($_POST['id_barang'] && $_POST['tipe'] == 'food') {
  // echo'food';
  $truid=$_POST['id_barang'];
  $sql="select * from food 
    where id=$truid";
  $result= mysqli_query($conn,$sql);
  $row=mysqli_fetch_assoc($result);
  $path='index.php';
    $type="Foods/";
    $name = $row['name'];
    $desc     = $row['dsc'];
    $price = $row['price'];
    $image = $row['image_url'];

  }

  if(isset($_POST['GAS'])){
    $jumlah = $_POST['jumlah'];
    $name   = $_POST['name'];
    $desc   = $_POST['desc'];
    $price  = $_POST['price'];
    $path   = $_POST['path'];
    
    $sql="insert into `cart$nomeja` (`name`, `desc`, `price`, `jumlah`)
    values
    ('$name','$desc','$price','$jumlah');
    ";
    
    if(mysqli_query($conn, $sql)){
        // echo"Data tersimpan";
        header("Location:".$path);
    }else{die(mysqli_error($conn));} 
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pesan</title>
</head>
<style>
  /*gallery items style*/

  div.report {
      width: 100%;
      background-color:#FAD02C;
      color:#333652;
      height:50;
      text-align: center;
      padding-top:10px;
      font-weight: bold;
      font-size: 20px;
      border-style: groove groove ;
      border-color: #FAD02C;
      border-radius: 80px;
      margin-bottom: 15px;
      margin-top: 15px

  }

  div.name {
    text-decoration: none;
    color: black/*#FAD02C*/;
    font-size: 20px;
    text-align: center;
    font-weight: bold;

  }

  div.desc {
    padding: 15px;
    text-align: center;
  }

  div.price {
    padding: 15px;
    text-align: center;
    color: #6F5B3E;
  }
  /*Form Style*/
  * {
  box-sizing: border-box;
  }

  input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 8px solid #FAD02C;
  border-radius: 15px;
  resize: vertical;
  color: #333652;
  }

  label {
  padding: 12px 12px 12px 0;
  display: inline-block;

  }

  input[type=submit] {
  background-color: #FAD02C;
  color: #333652;
  padding: 12px 20px;
  padding-top: 15px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
  }

  input[type=submit]:hover {
  background-color: #90ADC6;
  }

  .container {
  border-radius: 5px;
  background-color: #90ADC6;
  padding: 20px;
  }

  .col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
  }

  .col-75 {
  float: left;
  width: 75%;
  margin-top: 6px;

  }

  /* Clear floats after the columns */
  .row:after {
  content: "";
  display: table;
  clear: both;
  }

  /* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
  @media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
  }
  /* menu styling */
  ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: transparent;

  }

  li {
  float: left;
  }
  li a {
  display: block;
  padding: 8px;
  border: 1px black;
  color: #FAD02C;
  text-decoration: none;
  }
  li a:hover:not(.active) {
  background-color: #90ADC6;
  color: #E9EAEC;
  }
</style>
<body>
<?php echo '
        <div class="row">
        <div class="col-25">
            <img src="'.$type.$image.'"   style="max-width:100px; max-height:auto; border:5px solid #FAD02C; border-radius: 144px; margin-left:80px;">
        </div>
        <div class="col-75">
            <div class="name" style="text-align:center;font-weight: bold;line-height: 2">'.$name.'</div>
            <div class="price" >Rp.'.$price.'</div>
            <div class="desc">'.$desc.'</div>
        </div>
  </div>
    '?>
<form method="POST">
    <div class="row">
      <div class="col-25">
        <label for="jumlah">Jumlah</label>
      </div>
      <div class="col-75">
        <select id="jumlah" name="jumlah">
          <?php 
          $i = 0;
          while($i < 100){
            $i+=1;
            echo'
            <option value="'.$i.'">
            '.$i.'
          </option>
            ';
          }
          ?>
        </select>
      </div>
    </div>
    <div class="row" style="padding-top: 15px">
    <input type="hidden" name="path" value="<?php echo $path?>"/>
    <input type="hidden" name="name" value="<?php echo $name?>"/>
    <input type="hidden" name="desc" value="<?php echo $desc?>"/>
    <input type="hidden" name="price" value="<?php echo $price?>"/>
    <input type="submit" name="GAS" value="Submit">
    </div>
  </form>
  <a href=<?php echo $path ?>><button class="btn btn-danger" name="back">Back</button></a>
</body>
</html>