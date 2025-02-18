<?php 
require_once 'conn.php';

$first_name = $_POST["first_name"];
$last_name = $_POST["last_name"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$password = $_POST["password"];

//encryting the password
//md method
$passHash = md5($password);

if (isset($_POST['submit'])) {
    $insert = "INSERT into users(first_name,last_name,email,phone,password) VALUES ('$first_name','$last_name','$email','$phone','$passHash')";

    $query = mysqli_query($con,$insert);

    if($query){
        header("Location: bootstrap_index.php?insertMsg=Registration successful"); 
        exit();
    }else{
        echo "Failed to submit data.";
    }
}
?>