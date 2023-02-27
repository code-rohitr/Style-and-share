<?php
include(__DIR__.'/../lib/methods/auth.php');


include(__DIR__.'/../lib/partials/head.php');
?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $auth = new Auth();

    $data['email'] = $email;

    $data['password'] = $password;

    try {
        $logged = $auth->loginAdmin($data);

        if ($logged) {
            Auth::redirectToLogin('./index.php');
        }
    } catch (Exception $e) {
        echo $e;
    }
}
?>
<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
  <div class="form-group">
    <label for="email">Email address</label>
    <input type="email" class="form-control" id="email" name="email">
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" name="password">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

<?php
include(__DIR__.'/../lib/partials/footer.php');
?>