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
<div class="landing-container">
    <div class="landing-content">
        <h1><span>Community - driven</span> approach to fashion</h1>
        <p>Sell, rent and donate clother with fellow users</p>
        <div class="landing-btn-container">
            <button class="btn-common ">Buy</button>
            <button class="btn-common rent-btn">Rent Outfits</button>
            <button class="btn-common donate-btn">Donate outfits</button>
        </div>
    </div>

    <div class="landing-img-container">
        <img src="./media/landing.svg" alt="">
    </div>
</div>
<a href="?logout=1" target="">Log out</a>
<?php
include('lib/partials/footer.php');
?>

<?php
} else {
    Auth::redirectToLogin('./login.php');
}
?>