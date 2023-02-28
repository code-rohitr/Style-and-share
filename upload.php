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
	
	$name = $_POST['name'];
	$size = $_POST['size'];
	$price = $_POST['price'];
	$description = $_POST['description'];
	$brand = $_POST['brand'];
	$color = $_POST['color'];
	$category = 'accessory';
	$fmaterial = 'Cotton';
	$owner = Auth::currentUser();

	$query = "INSERT INTO 
	`items` (`owner`, `name`, `category`, `description`, `size`, `price`, `img`,`fmaterial`, `color`, `brand`) 
	VALUES 
	($owner, '$name', '$category', '$description', '$size', '$price', '$imgurl', '$fmaterial', '$color', '$brand')";

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

?>

<?php
include('lib/partials/head.php');
?>
	<div class='container'>
		<div class='window'>
			<div class="upload-main-container">
				<div class="upload-container">
					<h1>Upload your outfit</h1>
					<p>Enter your outfit details</p>
					<form class='upload-form' method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
						<input type="text" placeholder="Title" name="name" id="name" />
						<input type="text" placeholder="Description" name="description"
						id="description" />
						<input type="text" placeholder="Color" name="color" id="color" />
						<input type="text" placeholder="Size" name="size" id="size" />
						<input type='text' placeholder='Price' name="price" id="price" />
						<input type="text" placeholder="Brand" name="brand" id="brand" />
						<input type="text" placeholder="Brand" name="brand" id="brand" />
						<p>Upload an image of the product</p>
						<input style="display: none;" type="file" id="uploadImg" name="uploadImg" />
						<button class="upload-btn" type="button" onclick="acceptFile()">Upload</button>
						<button type="submit">Submit</button>
					</form>
				</div>
			</div>
		</div>
	</div>

	<script>
		function acceptFile() {
			const inp = document.getElementById('uploadImg')
			inp.click()
		}
	</script>
<?php
include('lib/partials/footer.php');
?>
<?php
} else {
	Auth::redirectToLogin('./login.php');
}
?>