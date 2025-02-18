<?php
require "conn.php";

$email = $_POST['email'];
$password = $_POST['password'];

// $hash = md5($password);

//check if email and password exist in the db

echo "<br>";
$query = "SELECT * FROM users where email ='$email' and password = '$password'";
$result = mysqli_query($con,$query);

if(mysqli_num_rows($result) > 0){
    //Redirect to page showing users
    header("Location: view_users.php?insertMsg=Login successful"); 
    exit();
}
else{
    echo "Wrong passsword and username";
}