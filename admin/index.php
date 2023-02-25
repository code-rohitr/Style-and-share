<?php
include(__DIR__.'/../lib/methods/auth.php');

try {
    $auth = Auth::isAuthenticated();
} catch (Exception $e) {
    echo $e;
}

if ($auth) {

include(__DIR__.'/../lib/partials/head.php');
?>

<?php
include(__DIR__.'/../lib/partials/footer.php');
?>

<?php
} else {
    Auth::redirectToLogin('./login.php');
}
?>