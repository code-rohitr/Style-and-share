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
        <div class="card">
            <div class="img-container">
                <img src="<?php echo $item['img']; ?>" alt="" />
            </div>

            <div class="card-content-container">
                <div class="content-left">
                    <div class="title-desc-container">
                        <h2 class="item-title"><?php echo $item['name']; ?></h2>
                        <p class="item-desc"><?php echo $item['description']; ?></p>
                    </div>
                    <div class="general-info">
                        <p>Size: <span class="size"><?php echo $item['size']; ?></span></p>
                        <p>rating: <span class="size">4.5</span></p>
                        <p>Color: <span class="size"><?php echo $item['color']; ?></span></p>
                    </div>
                </div>

                <div class="content-right">
                    <p>Rs. <span class="price"><?php echo $item['price']; ?></span></p>
                    <button class="remove-btn">Remove</button>
                </div>
            </div>
        </div>
        <?php
        }
        ?>

    </div>

    <div class="cart-btn-container">
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