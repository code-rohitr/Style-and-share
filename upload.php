<?php
include('lib/methods/auth.php');

$a = Auth::isAuthenticated();

if ($a) {
?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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
		$fname = basename($file['name']);
	
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
						<input type="text" placeholder="Title" name="name" id="name"/>
						<input type="text" placeholder="Description" name="description"
						id="description" />
						<input type="text" placeholder="Color" />
						<input type="text" placeholder="Size" name="size" id="size"/>
						<input type='text' placeholder='Price' name="price" id="price" />
						<input type="text" placeholder="Brand" />
						<p>Upload an image of the product</p>
						<input style="display: none;" type="file" id="uploadImg" name="uploadImg" />
						<button class="upload-btn" type="button" onclick="acceptFile()">Upload</button>
						<button type="submit" style="border: 1px solid black;padding: 1rem;cursor: pointer;">Submit</button>
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