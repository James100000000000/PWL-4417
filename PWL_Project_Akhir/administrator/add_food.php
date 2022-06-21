<?php
session_start();
if(!$_SESSION['login']){
    header("location:index.php");
    die;
}

include '../conn.php';

if(isset($_POST['submit'])){

    echo "<pre>";
	print_r($_FILES['my_image']);
	echo "</pre>";

    $img_name = $_FILES['my_image']['name'];
	$img_size = $_FILES['my_image']['size'];
	$tmp_name = $_FILES['my_image']['tmp_name'];
	$error = $_FILES['my_image']['error'];

    if ($error === 0) {
		if ($img_size > 125000000) {
			$em = "Sorry, your file is too large.";
			header("Location: foods.php?error=$em");
		} else {
			$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
			$img_ex_lc = strtolower($img_ex);

			$allowed_exs = array("jpg", "jpeg", "png");

			if (in_array($img_ex_lc, $allowed_exs)) {
				$new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
				$img_upload_path = '../foods/' . $new_img_name;
				move_uploaded_file($tmp_name, $img_upload_path);

				// Insert into Database
                $name   = $_POST['name'];
                $desc  = $_POST['dsc'];
                $price = $_POST['price'];
				$sql="INSERT INTO food (name,dsc,price,image_url) VALUES ('$name','$desc','$price','$new_img_name');";
				mysqli_query($conn, $sql);
				header("Location: foods.php");
			} else {
				$em = "You can't upload files of this type";
				header("Location: foods.php?error=$em");
			}
		}
	} else {
		$em = "unknown error occurred!";
		header("Location: foods.php?error=$em");
	}
}

?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">

    <title>Insert</title>
</head>

<body>
<nav>
        <ul class="nav nav-tabs justify-content-end">
            <li class="nav-item">
                <a class="nav-link active" href="foods.php">Foods</a>
            </li>
            <li class="nav-item">
                <a class="nav-link  " href="drinks.php">Drinks</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="gallery.php">Gallery</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="testimonies.php">Testimonies</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logout.php">Logout</a>
            </li>
        </ul>
    </nav>

    <div class="container my-5">
        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" placeholder="Food Name" name="name" autocomplete="off" value=""required>
            </div>
            <div class="form-group">
                <label>Desc</label>
                <input type="text" class="form-control" placeholder="description" name="dsc" autocomplete="off" value=""required>
            </div>
            <div class="form-group">
                <label>Price</label>
                <input type="text" class="form-control" placeholder="Price" name="price" autocomplete="off" value=" "required>
            </div>
            <div class="form-group">
                <label>Image</label>
                <input type="file" class="form-control" placeholder="1 Image" name="my_image" autocomplete="off" value="" required><br>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Input</button>
        </form>
        <a href="foods.php"><button class="btn btn-danger" name="back">Back</button></a>
    </div>


</body>

</html>