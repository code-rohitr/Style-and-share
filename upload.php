<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Style & Share | Upload</title>

  <link rel="stylesheet" href="./upload.css">
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
      <form class='content' method="POST" action="./upload.php">
        <div class='welcome'>Upload</div>
        <div class='subtitle'>Enter the details of your product.</div>
        <div class='input-fields'>
          <input type='text' placeholder='Name' class='input-line full-width' name="name" id="name"></input>
          <input type='text' placeholder='Size' class='input-line full-width' name="size" id="size"></input>
          <input type='text' placeholder='Description' class='input-line full-width' name="description" id="description"></input>
          <input type='text' placeholder='Price' class='input-line full-width' name="price" id="price"></input>
          <select name="availability" id="availability_input">
            <option value="rent">rent</option>
            <option value="selling">selling</option>
          </select>
        </div>
        <!-- <div class='spacing'>or continue with <span class='highlight'>Facebook</span></div> -->
        <div><input class='ghost-round full-width' type="submit" value="Upload"></input></div>
      </form>
    </div>
  </div>


  <?php
  // db connection
  $conn = new mysqli("localhost", "root", "", "sns");

  if (!$conn) {
    echo "<h1>error in connection</h1>";
  } else {
    echo "<h1>connection successful</h1>";
  }

  $name = $_POST['name'];
  $size = $_POST['size'];
  $description = $_POST['description'];
  $price = $_POST['price'];

  // generating a random user id 

  $product_id = floor(rand(10, 10000) * 10);


  $insertproduct = "INSERT INTO `product`(`p_id`, `name`, `size`, `description`, `price`) VALUES ('$product_id', '$name','$size','$description','$price')";


  if (mysqli_query($conn, $insertproduct)) {
    echo "Data saved successfully";
  } else {
    echo "Data saving failed";
  }
  ?>

</body>
</html>