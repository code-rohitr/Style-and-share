<?php
include('lib/methods/auth.php');

$a = Auth::isAuthenticated();

if ($a) {
?>
<?php
include('lib/partials/head.php');
?>

<div class="search-container">
    <input type="text" placeholder="Ex. Shirts" />
    <button class="search-btn btn-common">Search</button>
</div>

<div class="filter-container">
    <ul>
        <li>Price: Low to High</li>
        <li>Price: High to Low</li>
        <li>Price: Size</li>
        <li>Price: Rating</li>
    </ul>
</div>

<div class="rental-cards-main-container">

    <div class="rental-card">
        <div class="rental-img-container">
            <img src="./shirt.jpg" alt="" class="rental-card-img">
        </div>
        <div class="rental-product-info">
            <h2>White Shirt for men</h2>
            <p>A short description of the product</p>
            <div class="rental-info-bar">
                <h2 class="rental-price">Rs. <span>699</span> / Day</h2>
                <h2 class="rental-color">White</h2>
                <h2 class="rental-size">Size <span>L</span></h2>
            </div>
            <button class="rental-add-btn">More Info</button>
        </div>
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