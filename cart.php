<?php
include('lib/methods/auth.php');

$a = Auth::isAuthenticated();

if ($a) {
?>
<?php
include('lib/partials/head.php');
?>
<?php
include('lib/methods/cart.php');
try {
    $cartMethods = new CartMethods();
    $data = $cartMethods->fetch_cart_items();
} catch (Exception $e) {
    echo $e;
}
?>
<div class="cart-main-container">
    <div class="cart-header">
        <h2>Cart</h2>
        <h2>Total Rs. <span class="total-amount">1100</span></h2>
    </div>

    <div class="cart-items-container">
        <?php
        foreach ($data as $item) {
        ?>
        <div class="cart-card">
            <div class="cart-img-container">
                <img src="<?php echo $item['img']; ?>" alt="" />
            </div>

            <div class="cart-card-content-container">
                <div class="cart-content-left">
                    <div class="cart-title-desc-container">
                        <h2 class="cart-item-title"><?php echo $item['name']; ?></h2>
                        <p class="cart-item-desc"><?php echo $item['description']; ?></p>
                    </div>
                    <div class="cart-general-info">
                        <p>Size: <span class="cart-size"><?php echo $item['size']; ?></span></p>
                        <p>rating: <span class="cart-size">4.5</span></p>
                        <p>Color: <span class="cart-size"><?php echo $item['color']; ?></span></p>
                    </div>
                </div>

                <div class="cart-content-right">
                    <p>Rs. <span class="cart-price"><?php echo $item['price']; ?></span></p>
                    <button class="cart-remove-btn">Remove</button>
                </div>
            </div>
        </div>
        <?php
        }
        ?>

    </div>

    <div class="cart-cart-btn-container">
        <a href="#"><button class="btn-common">Shop More</button></a>
        <a href="#"><button class="btn-common">Checkout</button></a>
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