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
include('lib/partials/head.php');
?>

<?php
include('lib/partials/footer.php');
?>

<?php
} else {
    Auth::redirectToLogin('./login.php');
}
?>