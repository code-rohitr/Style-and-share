
<?php
// db connection
$conn = new mysqli("localhost", "root", "", "sns");

if(!$conn){
    echo "<h1>error in connection</h1>";
} else {
  echo "<h1>connection successful</h1>";

}

$name = $_POST['name'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];
$contact = $_POST['contact'];

// generating a random user id 

$user_id = floor(rand(10, 10000)*10);


$insertuser = "INSERT INTO `user`(`email`, `username`, `pass`, `name`, `phnumber`, `uid`) VALUES ('$email','$username','$password','$name','$contact', '$user_id')";


if (mysqli_query($conn, $insertuser)){
  echo "Data saved successfully";
} else {
  echo "Data saving failed";
}

?>