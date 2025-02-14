<?php 
require_once 'conn.php';

$fname = $_POST["fname"];
$lname = $_POST["lname"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$password = $_POST["password"];

//encryting the password
//md method
$passHash = md5($password);

if (isset($_POST['submit'])) {
    $insert = "INSERT into users(first_name,last_name,email,phone,password) VALUES ('$fname','$lname','$email','$phone','$passHash')";

    $query = mysqli_query($con,$insert);

    if($query){
        echo "Data submitted successfully.";
    }else{
        echo "Failed to submit data.";
    }
}
?>