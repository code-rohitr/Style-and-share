<?php
include('lib/methods/auth.php');

include('lib/partials/head.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $username = $_POST['username'];
  $contact = $_POST['contact'];

  $auth = new Auth();

  $data['email'] = $email;
  $data['name'] = $name;
  $data['password'] = $password;
  $data['contact'] = $contact;
  $data['username'] = $username;

  try {
      $logged = $auth->signupUser($data);

      if ($logged) {
          Auth::redirectToLogin('./index.php');
      }
  } catch (Exception $e) {
      echo $e;
  }
}
?>
<div class="register-main-container">
  <div class="register-container">
    <h1>Hello There</h1>
    <p>Register here and get started</p>
    <form class='register-form' method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
      <input type="text" placeholder="Name" name="name" id="name" />
      <input type="text" placeholder="Username" name="username" id="username" />
      <input type="email" placeholder="Email" name="email" id="email" />
      <input type="password" placeholder="Password" name="password" id="password"/>
      <input type="password" placeholder="Confirm Password" id="confirmPassword" />
      <input type="text" placeholder="Contact Number" name="contact" id="contact" />
    </form>
    <button class="register-btn">Login</button>
  </div>
</div>
<?php
include('lib/partials/footer.php');
?>