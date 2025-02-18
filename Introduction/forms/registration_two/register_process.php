<?php 
require_once 'conn.php';

//Retrieve input values
$first_name = $_POST["first_name"];
$last_name = $_POST["last_name"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$address = $_POST["address"];
$password = $_POST["password"];

//Encrypt the password
// $passHash = md5($password);

if (isset($_POST['submit'])) {
    //Insert input into database
    $insert = "INSERT into users(first_name,last_name,email,phone,address,password) VALUES ('$first_name','$last_name','$email','$phone','$address','$password')";

    $query = mysqli_query($con,$insert);

    //If insertion is successful
    if($query){
        //Redirect to page showing users
        header("Location: view_users.php?insertMsg=Registration successful"); 
        exit();
    }else{
        echo "Failed to submit data.";
    }
}
?>