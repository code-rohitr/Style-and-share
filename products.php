<?php
include('lib/methods/auth.php');

$a = Auth::isAuthenticated();

if ($a) {
?>
<?php
include('lib/partials/head.php');
?>
<?php
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
    <div class="product-search-container">
        <input type="text" placeholder="Ex. Shirts" />
        <button class="product-search-btn">Search</button>
    </div>

    <div class="filter-container">
        <ul>
            <li><a href="?price=asc">Price: Low to High</a></li>
            <li><a href="?price=desc">Price: High to Low</a></li>
            <li><a href="?size=s">Size</a></li>
            <li>Rating</li>
        </ul>
    </div>

    <div class="product-cards-main-container">
        <?php
        foreach ($data as $item) {
        ?>
            <div class="product-card">
                <div class="product-img-container">
                    <img src="<?php echo $item['img']; ?>" alt="" class="product-card-img">
                </div>
                <div class="product-info">
                    <h2><?php echo $item['name']; ?></h2>
                    <p><?php echo $item['description']; ?></p>
                    <div class="product-info-bar">
                        <h2 class="product-price">Rs. <span><?php echo $item['price']; ?></span></h2>
                        <h2 class="product-color"><?php echo $item['color']; ?></h2>
                        <h2 class="product-size">Size <span><?php echo $item['size']; ?></span></h2>
                    </div>
                    <a href="product.php?item=<?php echo $item['item_id']; ?>"><button class="products-add-btn">Add To Cart</button></a>
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