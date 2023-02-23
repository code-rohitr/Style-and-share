<?php

if (isset($_POST['submit'])) {

	include('lib/utils/db.php');

	try {
		$db = new DB();
		$conn = $db->connect();

	} catch (Exception $e) {
		echo $e;
	}

	$file = $_FILES['uploadImg'];
	$fsize = filesize($file['tmp_name']);

	$name = $_POST['name'];
	$size = $_POST['size'];
	$price = $_POST['price'];
	$description = $_POST['description'];
	$brand = 'Adidas';
	$category = 'accessory';
	$fmaterial = 'Cotton';
	$color = 'Black';
	$owner = 1;
	$imgurl = '';

	$query = "INSERT INTO 
	`items` (`owner`, `name`, `category`, `description`, `size`, `price`, `image`,`fmaterial`, `color`, `brand`) 
	VALUES 
	($owner, '$name', '$category', '$description', '$size', '$price', '$imgurl', '$fmaterial', '$color', '$brand')";

}

?>