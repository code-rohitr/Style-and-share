<?php
include('lib/methods/auth.php');

$a = Auth::isAuthenticated();

if ($a) {
?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include('lib/utils/db.php');
    
    try {
        $db = new DB();
        $db->connect();
        
        $content = $_POST['feedback'];
        $uid = Auth::currentUser();
    
        $query = "INSERT INTO `feedback` (`uid`, `content`) VALUES ('$uid', '$content')";
    
        $db->insert($query);

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