<?php
include('lib/partials/head.php');
?>
    <div class='bold-line'></div>
    <div class='container'>
        <div class='window'>
            <div class='overlay'></div>
            <form class='content' method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class='welcome'>Welcome Back!</div>
                <div class='subtitle'>Login into your already existing account.</div>
                <div class='input-fields'>
                    <input type='email' placeholder='Email' class='input-line full-width' name="email" id="email" />
                    <input type='password' placeholder='Password' class='input-line full-width' name="password" id="password" />
                </div>
                <!-- <div class='spacing'>or continue with <span class='highlight'>Facebook</span></div> -->
                <div><input class='ghost-round full-width' type="submit" value="Login" id="submit" /></div>
            </form>
        </div>
    </div>
<?php
include('lib/partials/footer.php');
?>