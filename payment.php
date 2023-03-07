<?php
include('lib/methods/auth.php');

$a = Auth::isAuthenticated();

if ($a) {
?>
<?php
include('lib/partials/head.php');
?>

<div class="payment-main-container">
    <div class="payment-container">
        <h1>Payment Gateway</h1>
        <p>Enter your payment details.</p>
        <form action="submit" class="login-form">
            <input type="text" placeholder="Name on Card" />
            <input type="text" placeholder="Card Number" />
            <input type="text" placeholder="Expiry" />
            <input type="text" placeholder="CVV" />
            <input type="text" placeholder="Billing Address" />
            <input type="text" placeholder="Delivery Address" />
            <br />
            <p>Or Choose to pay through COD.</p>
            <input type="checkbox" />
        </form>
        <button class="payment-btn">Pay</button>
    </div>
</div>

<?php
include('lib/partials/footer.php');
?>
<?php
} else {
    Auth::redirectToLogin('./login.php');
}
?>