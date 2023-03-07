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
<link rel="stylesheet" href="./report.css" />
<h1>Welcome Admin</h1>
<div class="report-outer-container">
    <div class="report-main-container">
        <h2>Admin Report</h2>
        <div class="report-cards-container">
            <div class="report-card">
                <h4>Users</h4>
                <p>4</p>
            </div>

            <div class="report-card">
                <h4>Posts</h4>
                <p>4</p>
            </div>

            <div class="report-card">
                <h4>Payment Amount</h4>
                <p>4</p>
            </div>
            <div class="report-card">
                <h4>Transactions</h4>
                <p>4</p>
            </div>
        </div>
    </div>
</div>
<a href="?logout=1" target="">Log out</a>
<?php
} else {
    Auth::redirectToLogin('./login.php');
}
?>