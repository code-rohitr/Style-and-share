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
	<div class='bold-line'></div>
	<div class='container'>
		<div class='window'>
			<div class='overlay'></div>
			<form class='content' method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
				<div class='welcome'>Upload</div>
				<div class='subtitle'>Enter the details of your product.</div>
				<div class='input-fields'>
					<input type='text' placeholder='Name' class='input-line full-width' name="name" id="name"></input>
					<input type='text' placeholder='Size' class='input-line full-width' name="size" id="size"></input>
					<input type='text' placeholder='Description' class='input-line full-width' name="description"
						id="description"></input>
					<input type='text' placeholder='Price' class='input-line full-width' name="price" id="price"></input>
					<select name="availability" id="availability_input">
						<option value="rent">rent</option>
						<option value="selling">selling</option>
					</select>
				</div>
				<div>
					<input style="display: none;" type="file" id="uploadImg" name="uploadImg" />
					<button class='ghost-round full-width' type="button" onclick="acceptFile()">Upload</button>
				</div>
				<button type="submit" style="border: 1px solid black;padding: 1rem;cursor: pointer;">Submit</button>
			</form>
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