<div class="nav-container">
    <div class="nav-left">
        <h1>'Style n Share'</h1>
    </div>

    <div class="nav-right">
        <ul>
            <a href="./index.php">
                <li>Home</li>
            </a>
            <a href="./products.php">
                <li>Buy</li>
            </a>
            <a href="./upload.php">
                <li>Sell</li>
            </a>
            <a href="./cart.php">
                <li>Cart</li>
            </a>
            <?php
            try {
                $authNav = Auth::isAuthenticated();
            } catch (Exception $e) {
                echo $e;
            }
            
            if ($authNav) {
            ?>
            <button class="nav-btn-common">Profile</button>
            <?php
            } else {
            ?>    
            <a href="./login.php" class="nav-btn-common">Login</a>
            <a href="./register.php" class="nav-btn-common">Sign Up</a>
            <?php
            }
            ?>
        </ul>
    </div>
</div>