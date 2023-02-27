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

<div class='bold-line'></div>
<div class='container'>
  <div class='window'>
    <div class='overlay'></div>
    <form class='content' method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
      <div class='welcome'>Hello There!</div>
      <div class='subtitle'>Register here and get started.</div>
      <div class='input-fields'>
        <input type='text' placeholder='Name' class='input-line full-width' name="name" id="name" />
        <input type='text' placeholder='Username' class='input-line full-width' name="username" id="username" />
        <input type='email' placeholder='Email' class='input-line full-width' name="email" id="email" />
        <input type='password' placeholder='Password' class='input-line full-width' name="password"
          id="password" />
        <input type='text' placeholder='Contact Number' class='input-line full-width' name="contact"
          id="contact" />

      </div>
      <!-- <div class='spacing'>or continue with <span class='highlight'>Facebook</span></div> -->
      <div><input class='ghost-round full-width' type="submit" value="Register" /></div>
    </form>
  </div>
</div>
<?php
include('lib/partials/footer.php');
?>