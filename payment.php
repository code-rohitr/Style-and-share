<?php
include('lib/methods/auth.php');

$a = Auth::isAuthenticated();

if ($a) {
?>
<?php
include('lib/partials/head.php');
?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include('lib/partials/payment.php');

    $rent_item = $_SESSION['rent_item'];

    try {
        $payment = new PaymentMethods();

        if (isset($rent_item)) {
            $item_details = explode(' ', base64_decode($rent_item));
            $completed = $payment->rent_payment($item_details);
        } else {
            $completed = $payment->cart_payment();
        }
    } catch (Exception $e) {
        echo $e;
    }
}
?>
<div class="payment-main-container">
    <div class="payment-container">
        <h1>Payment Gateway</h1>
        <p>Enter your payment details.</p>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="login-form">
            <input type="text" placeholder="Billing Address" name="billing" />
            <input type="text" placeholder="Delivery Address" name="delivery" />
            <p>Mode of payment:</p>
            <input type="radio" name="mode" value="COD" id="mode_code" /><label for="mode_cod">COD</label><br>
            <input type="radio" name="mode" value="Card" id="mode_card" /><label for="mode_card">Card</label><br>
            <input type="text" placeholder="Name on Card" name="card_name" />
            <input type="text" placeholder="Card Number" name="card_number" />
            <input type="text" placeholder="Expiry" name="card_expiry" />
            <input type="text" placeholder="CVV" name="card_cvv" />
            <br />
            <button type="submit" class="payment-btn">Pay</button>
        </form>
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