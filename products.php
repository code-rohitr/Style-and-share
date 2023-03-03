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

$uid = Auth::currentUser();
$query = "SELECT * FROM `items` WHERE `owner`!=$uid";

switch ($_GET['price']) {
    case 'asc':
        $query .= ' ORDER BY price ASC';
        break;
    case 'desc':
        $query .= ' ORDER BY price DESC';
        break;
    default:
        break;
}

if ($item_id = $_GET['addToCart']) {
    try {
        $cartMethods = new CartMethods();
        $added = $cartMethods->add_to_cart($item_id);

        if ($added) {
            Auth::redirectToLogin($_SERVER['PHP_SELF']);
        }
    } catch (Exception $e) {
        echo $e;
    }

}

try {
    $db = new DB();
    $conn = $db->connect();

} catch (Exception $e) {
    echo $e;
}

try {
    $data = $db->select_all($query);

} catch (Exception $e) {

    echo $e;
}
?>
    <div class="search-container">
        <input type="text" placeholder="Ex. Shirts" />
        <button class="search-btn btn-common">Search</button>
    </div>

    <div class="filter-container">
        <ul>
            <li><a href="?price=asc">Price: Low to High</a></li>
            <li><a href="?price=desc">Price: High to Low</a></li>
            <li><a href="?size=s">Price: Size</a></li>
            <li>Price: Rating</li>
        </ul>
    </div>

    <div class="cards-main-container">
        <?php
        foreach ($data as $item) {
        ?>
        <div class="card">
            <div class="img-container">
                <img src="<?php echo $item['img']; ?>" alt="" class="card-img">
            </div>
            <div class="product-info">
                <h2><?php echo $item['name']; ?></h2>
                <p><?php echo $item['description']; ?></p>
                <div class="info-bar">
                    <h2 class="price">Rs. <span><?php echo $item['price']; ?></span></h2>
                    <h2 class="color"><?php echo $item['color']; ?></h2>
                    <h2 class="size">Size <span><?php echo $item['size']; ?></span></h2>
                </div>
                <a class="add-btn" href="?addToCart=<?php echo $item['item_id']; ?>">Add to Cart</a>
            </div>
        </div>
        <?php
        }
        ?>


    </div>
<?php
include('lib/partials/footer.php');
?>
<?php
} else {
	Auth::redirectToLogin('./login.php');
}
?>