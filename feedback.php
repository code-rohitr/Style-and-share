<?php
include('lib/methods/auth.php');

try {
    $auth = Auth::isAuthenticated();
} catch (Exception $e) {
    echo $e;
}

if ($a) {
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
	<div class='bold-line'></div>
	<div class='container'>
		<div class='window'>
			<div class='overlay'></div>
			<form class='content' method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
				<div class='welcome'>Feedback</div>
				<div class='subtitle'>We would love to hear your feedback</div>
				<div class='input-fields'>
					<textarea type='text' placeholder='Your feedback' class='input-line full-width' name="feedback" id="feedback"></textarea>
				</div>
                <button type="submit" style="border: 1px solid black;padding: 1rem;cursor: pointer;">Submit</button>
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