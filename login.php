<?php
include('lib/methods/auth.php');

include('lib/partials/head.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $auth = new Auth();

    $data['email'] = $email;

    $data['password'] = $password;

    try {
        $logged = $auth->loginUser($data);

        if ($logged) {
            Auth::redirectToLogin('./index.php');
        }
    } catch (Exception $e) {
        echo $e;
    }
}
?>
    <div class="login-main-container">
        <div class="login-container">
            <h1>Welcome Back</h1>
            <p>Sign in to your already existing account</p>
            <form class='login-form' method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <input type="text" placeholder="Email" name="email" id="email" />
                <input type="password" placeholder="Password" name="password" id="password" />
                <button class="login-btn" type="submit" id="submit">Login</button>
            </form>
        </div>
    </div>
<?php
include('lib/partials/footer.php');
?>