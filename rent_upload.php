<?php
include('lib/methods/auth.php');

$a = Auth::isAuthenticated();

if ($a) {
?>
<?php
include('lib/partials/head.php');
?>

<div class="rental-upload-main-container">
    <div class="rental-upload-container">
        <h1>List your outfit for Rent</h1>
        <p>Enter your outfit details</p>
        <form action="submit" class="rental-upload-form">
            <input type="text" placeholder="Title" />
            <input type="text" placeholder="Description" />
            <input type="text" placeholder="Color" />
            <input type="text" placeholder="Size" />
            <input type="text" placeholder="Price / Day" />
            <input type="text" placeholder="Brand" />
            <input type="text" placeholder="Fabric Material" />
            <input type="text" placeholder="Pickup Address" />
            <p>Upload an image of the product</p>
            <input type="file" placeholder="select the image">
        </form>
        <button class="rental-upload-submit-btn">Upload</button>
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