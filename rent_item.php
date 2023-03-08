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
    $fromDate = $_POST['fromDate'];
    $toDate = $_POST['toDate'];
    $item_id = $_POST['item'];

    $_SESSION['rent_item'] = base64_encode($item_id.' '.$fromDate.' '.$toDate);

    Auth::redirectToLogin('./payment.php');

}

if ($item_id = $_GET['item']) {

    $query = "SELECT * FROM `rent_items` WHERE `item_id`=$item_id";
    
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
<div class="rental-desc-container">
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
                                        <span class="act-price">Rs. <?php echo $item['price']; ?> / Day</span>
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
                                <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                                    <div class="rental-desc-date-container my-3 d-flex flex-row align-items-center justify-content-start">
                                        <div class="rental-desc-from-date-container">
                                            <label for="fromDate">From</label>
                                            <input type="date" name="fromDate">
                                        </div>
                                        <div class="rental-desc-to-date-container ml-5">
                                            <label for="toDate">To</label>
                                            <input type="date" name="toDate">
                                        </div>
                                    </div>
                                    <input type="text" name="item" value="<?php echo $item['item_id']; ?>" disabled style="display: none;">
                                    <div class="cart mt-4 align-items-center">
                                        <button class="btn btn-danger text-uppercase mr-2 px-4" type="submit">
                                            Add to cart
                                        </button>
                                    </div>
                                </form>
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