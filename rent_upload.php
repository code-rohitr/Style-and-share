<?php
include('lib/methods/auth.php');

$a = Auth::isAuthenticated();

if ($a) {
?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	include_once('lib/utils/db.php');
	include('lib/methods/user.php');

	try {
		$db = new DB();
		$conn = $db->connect();

	} catch (Exception $e) {
		echo $e;
	}
	
	$file = $_FILES['uploadImg'];

	try {
		$methods = new UserMethods();

		$imgurl = $methods->handleImageUpload($file);

	} catch (Exception $e) {
		echo $e;
	}
	
	if ($imgurl) {
		$name = $_POST['name'];
		$size = $_POST['size'];
		$price = $_POST['price'];
		$description = $_POST['description'];
		$brand = $_POST['brand'];
		$color = $_POST['color'];
		$fmaterial = $_POST['fmaterial'];
		$address = $_POST['address'];
		$owner = Auth::currentUser();
	
		$query = "INSERT INTO 
		`rent_items` (`owner`, `name`, `description`, `size`, `price`, `img`,`fmaterial`, `color`, `brand`, `address`) 
		VALUES 
		($owner, '$name', '$description', '$size', '$price', '$imgurl', '$fmaterial', '$color', '$brand', '$address')";
	
		try {
			$added = $db->insert($query);
	
			if ($added) {
				echo "done";
			}
	
		} catch (Exception $e) {
			if (file_exists($imgurl)) {
				unlink($imgurl);
			}
			echo $e;
		}
	}
}

?>
<?php
include('lib/partials/head.php');
?>

<div class="rental-upload-main-container">
    <div class="rental-upload-container">
        <h1>List your outfit for Rent</h1>
        <p>Enter your outfit details</p>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="rental-upload-form" enctype="multipart/form-data">
            <input type="text" placeholder="Title" name="name" id="name" />
            <input type="text" placeholder="Description" name="description" id="description" />
            <input type="text" placeholder="Color" name="color" id="color" />
            <input type="text" placeholder="Size" name="size" id="size" />
            <input type='text' placeholder='Price / Day' name="price" id="price" />
            <input type="text" placeholder="Brand" name="brand" id="brand" />
            <input type="text" placeholder="Fabric Material" name="fmaterial" id="fmaterial" />
            <input type="text" placeholder="Pickup Address" name="address" id="address" />
            <p>Upload an image of the product</p>
            <input type="file" id="uploadImg" name="uploadImg" />
			<button type="submit" class="rental-upload-submit-btn">Upload</button>
        </form>
    </div>
</div>
<?php
include('lib/partials/footer.php');
?>
<?php
} else {
    Auth::redirectToLogin('./login.php');
}
?>