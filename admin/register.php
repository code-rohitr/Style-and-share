<?php
include(__DIR__.'/../lib/methods/auth.php');


include(__DIR__.'/../lib/partials/head.php');
?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $name = $_POST['name'];
    $password = $_POST['password'];

    $auth = new Auth();

    $data['email'] = $email;
    $data['name'] = $name;
    $data['password'] = $password;

    try {
        $logged = $auth->signupAdmin($data);

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
    <label for="name">Name</label>
    <input type="text" class="form-control" id="name" name="name">
  </div>
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