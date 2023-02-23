<?php

include('lib/partials/head.php');

include('lib/methods/auth.php');

try {
    $auth = Auth::isAuthenticated();
} catch (Exception $e) {
    echo $e;
}




include('lib/partials/footer.php');

?>