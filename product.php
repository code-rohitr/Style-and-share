<?php
include('lib/methods/auth.php');

$a = Auth::isAuthenticated();

if ($a) {
?>
<?php
include('lib/partials/head.php');
?>
<div class="sell-product-desc">
    <div class="container mt-5 mb-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="images p-3">
                                <div class="text-center p-4">
                                    <img id="main-image" src="https://i.imgur.com/Dhebu4F.jpg" width="250" />
                                </div>
                                <div class="thumbnail text-center">
                                    <img onclick="change_image(this)" src="https://i.imgur.com/Rx7uKd0.jpg"
                                        width="70" />
                                    <img onclick="change_image(this)" src="https://i.imgur.com/Dhebu4F.jpg"
                                        width="70" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="product p-4">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center">
                                        <a href="#"><i class="fa fa-long-arrow-left"></i>
                                            <span class="ml-1">Back</span></a>
                                    </div>
                                    <a href="#"><i class="fa fa-shopping-cart text-muted"></i></a>
                                </div>
                                <div class="mt-4 mb-3">
                                    <!-- <span class="text-uppercase text-muted brand"
                        >Orianz</span
                      > -->
                                    <h5 class="text-uppercase">Men's slim fit t-shirt</h5>
                                    <div class="price d-flex flex-row align-items-center">
                                        <span class="act-price">Rs. 500</span>
                                    </div>
                                </div>
                                <p class="about">
                                    Shop from a wide range of t-shirt from orianz. Pefect for
                                    your everyday use, you could pair it with a stylish pair
                                    of jeans or trousers complete the look.
                                </p>
                                <div class="product-desc-info-container d-flex align-items-center">
                                    <div class="sizes mt-5 mr-5">
                                        <h6 class="text-uppercase">Size</h6>
                                        <p>L</p>
                                    </div>

                                    <div class="sizes mt-5 mr-5"">
                        <h6 class=" text-uppercase">Color</h6>
                                        <p>White</p>
                                    </div>

                                    <div class="sizes mt-5 mr-5"">
                        <h6 class=" text-uppercase">Fabric Material</h6>
                                        <p>Cotton</p>
                                    </div>
                                </div>
                                <div class="cart mt-4 align-items-center">
                                    <button class="btn btn-danger text-uppercase mr-2 px-4">
                                        Add to cart
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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