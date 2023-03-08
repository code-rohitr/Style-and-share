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
include_once('lib/utils/db.php');

if ($item_id = $_GET['addToCart']) {
    try {
        $cartMethods = new CartMethods();
        $added = $cartMethods->add_to_cart($item_id);

        if ($added) {
            Auth::redirectToLogin('products.php');
        }
    } catch (Exception $e) {
        echo $e;
    }
} else if ($item_id = $_GET['item']) {

    $query = "SELECT * FROM `items` WHERE `item_id`=$item_id";
    
    try {
        $db = new DB();
        $conn = $db->connect();
    } catch (Exception $e) {
        echo $e;
    }
    
    try {
        $item = $db->select_one($query);
    } catch (Exception $e) {
    
        echo $e;
    }
}


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
                                    <img id="main-image" src="<?php echo $item['img']; ?>" width="250" />
                                </div>
                                <!-- <div class="thumbnail text-center">
                                    <img onclick="change_image(this)" src="https://i.imgur.com/Rx7uKd0.jpg"
                                        width="70" />
                                    <img onclick="change_image(this)" src="https://i.imgur.com/Dhebu4F.jpg"
                                        width="70" />
                                </div> -->
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
                                    <h5 class="text-uppercase"><?php echo $item['name']; ?></h5>
                                    <div class="price d-flex flex-row align-items-center">
                                        <span class="act-price">Rs. <?php echo $item['price']; ?></span>
                                    </div>
                                </div>
                                <p class="about">
                                    <?php echo $item['description']; ?>
                                </p>
                                <div class="product-desc-info-container d-flex align-items-center">
                                    <div class="sizes mt-5 mr-5">
                                        <h6 class="text-uppercase">Size</h6>
                                        <p><?php echo $item['size']; ?></p>
                                    </div>

                                    <div class="sizes mt-5 mr-5">
                                        <h6 class=" text-uppercase">Color</h6>
                                        <p><?php echo $item['color']; ?></p>
                                    </div>

                                    <div class="sizes mt-5 mr-5">
                                        <h6 class=" text-uppercase">Fabric Material</h6>
                                        <p><?php echo $item['fmaterial']; ?></p>
                                    </div>
                                </div>
                                <div class="cart mt-4 align-items-center">
                                    <a class="btn btn-danger text-uppercase mr-2 px-4" href="?addToCart=<?php echo $item['item_id']; ?>">
                                        Add to cart
                                    </a>
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