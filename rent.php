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
$query = "SELECT * FROM `rent_items` WHERE `owner`!=$uid";

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
<div class="search-container">
    <input type="text" placeholder="Ex. Shirts" />
    <button class="search-btn btn-common">Search</button>
</div>

<div class="filter-container">
    <ul>
        <li><a href="?price=asc">Price: Low to High</a></li>
        <li><a href="?price=desc">Price: High to Low</a></li>
        <li>Price: Size</li>
        <li>Price: Rating</li>
    </ul>
</div>

<div class="rental-cards-main-container">
    <?php
    foreach ($data as $item) {
    ?>
    <div class="rental-card">
        <div class="rental-img-container">
            <img src="<?php echo $item['img']; ?>" alt="" class="rental-card-img">
        </div>
        <div class="rental-product-info">
            <h2><?php echo $item['name']; ?></h2>
            <p><?php echo $item['description']; ?></p>
            <div class="rental-info-bar">
                <h2 class="rental-price">Rs. <span><?php echo $item['price']; ?></span> / Day</h2>
                <h2 class="rental-color"><?php echo $item['color']; ?></h2>
                <h2 class="rental-size">Size <span><?php echo $item['size']; ?></span></h2>
            </div>
            <a class="rental-add-btn" href="rent_item.php?item=<?php echo $item['item_id']; ?>">More Info</a>
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