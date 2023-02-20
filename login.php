<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Style & Share</title>

    <!-- CSS -->
    <link rel="stylesheet" href="./login.css?v=<?php echo time(); ?>">

    <!-- JS -->
</head>

<body>

    <!-- navbar section -->
    <section class="nav-container">
        <div class="nav-left">
            <a href="#">Style & Share</a>
        </div>

        <div class="nav-right">
            <ul>
                <li>Home</li>
                <li>Services</li>
                <li>Contact</li>
                <li><a href="./register.php"><button class="btn-signup btn-common">Sign Up</button></a></li>
            </ul>
        </div>
    </section>


    <!-- body section -->
    <div class='bold-line'></div>
    <div class='container'>
        <div class='window'>
            <div class='overlay'></div>
            <form class='content' method="POST" action="./login.php">
                <div class='welcome'>Welcome Back!</div>
                <div class='subtitle'>Login into your already existing account.</div>
                <div class='input-fields'>
                    <input type='email' placeholder='Email' class='input-line full-width' name="email" id="email"></input>
                    <input type='password' placeholder='Password' class='input-line full-width' name="password" id="password"></input>
                </div>
                <!-- <div class='spacing'>or continue with <span class='highlight'>Facebook</span></div> -->
                <div><input class='ghost-round full-width' type="submit" value="Login" id="submit"></input></div>
            </form>
        </div>
    </div>


    <?php
    // db connection
    $conn = new mysqli("localhost", "root", "", "sns");

    // if (!$conn) {
    //     echo "<h1>error in connection</h1>";
    // } else {
    //     echo "<h1>connection successful</h1>";
    // }


    $email = $_POST['email'];
    $password = $_POST['password'];
        
        $selectuser = "SELECT * from user where email = '$email' and pass = '$password'";
        $result = mysqli_query($conn, $selectuser);

        if (mysqli_num_rows($result) > 0){
            ?>
        <script>
            alert("Login successful")
        </script>
        <?php
    } else {
        ?>
        <script>
            alert("Login Failed, User not found")
            </script>
        <?php
    }

    ?>

</body>

</html>