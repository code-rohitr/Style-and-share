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
<div class="admin-login-main-container">
  <div class="admin-login-container">
    <h1>Admin Login</h1>
    <p>Sign in with your admin credentials</p>
    <form class="admin-login-form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"
      enctype="multipart/form-data">
      <input type="email" id="email" name="email" placeholder="Email" />
      <input type="password" placeholder="Password" id="password" name="password" />
    </form>
    <button class="admin-login-btn">Login</button>
  </div>
</div>

<?php
include(__DIR__.'/../lib/partials/footer.php');
?>