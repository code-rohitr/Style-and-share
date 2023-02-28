<?php
include('lib/methods/auth.php');

try {
    $auth = Auth::isAuthenticated();
} catch (Exception $e) {
    echo $e;
}

if ($auth) {
	?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	
	// include('lib/utils/db.php');
	$uid = Auth::currentUser();
	$content = $_POST['feedback'];
	$query = "INSERT INTO `feedback` (`uid`, `content`) VALUES ($uid, '$content')";

    try {
		$db = new DB();
        $conn = $db->connect();
        
		$r = $db->insert($query, $conn);
		if (!$r) {
			throw new Exception(mysqli_error($conn));
		}
    } catch (Exception $e) {
		echo $e;
    }
}
?>

<?php
include('lib/partials/head.php');
?>
	<div class="feedback-main-container">
		<h1>Customer Feedback</h1>
		<p>Facing any issues? Let us know</p>
		<form class='form-container' method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
			<textarea name="feedback" id="feedback" cols="30" rows="10" placeholder="Start typing here..."></textarea>
			<button class="submit-btn btn-common" type="submit">Send</button>
		</form>
	</div>
<?php
include('lib/partials/footer.php');
?>
<?php
} else {
	Auth::redirectToLogin('./login.php');
}
?>