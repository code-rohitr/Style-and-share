<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Style & Share</title>

  <!-- CSS -->
  <link rel="stylesheet" href="./register.css?v=<?php echo time(); ?>">

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
        <li><a href="./login.php"><button class="btn-signup btn-common">Login</button></a></li>
      </ul>
    </div>
  </section>


  <!-- body section -->
  <div class='bold-line'></div>
  <div class='container'>
    <div class='window'>
      <div class='overlay'></div>
      <form class='content' method="POST" action="connect.php">
        <div class='welcome'>Hello There!</div>
        <div class='subtitle'>Register here and get started.</div>
        <div class='input-fields'>
          <input type='text' placeholder='Name' class='input-line full-width' name="name" id="name"></input>
          <input type='text' placeholder='Username' class='input-line full-width' name="username" id="username"></input>
          <input type='email' placeholder='Email' class='input-line full-width' name="email" id="email"></input>
          <input type='password' placeholder='Password' class='input-line full-width' name="password" id="password"></input>
          <input type='text' placeholder='Contact Number' class='input-line full-width' name="contact" id="contact"></input>

        </div>
        <!-- <div class='spacing'>or continue with <span class='highlight'>Facebook</span></div> -->
        <div><input class='ghost-round full-width' type="submit" value="Register"></input></div>
      </form>
    </div>
  </div>

  
</body>

</html>
