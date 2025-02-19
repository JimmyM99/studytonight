<?php
require_once 'conn.php';

if (!empty($_POST['first_name']) && !empty($_POST['last_name']) && !empty($_POST['email']) && !empty($_POST['phone']) && !empty($_POST['address']) && !empty($_POST['password'])) {
    //Retrieve input values
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];
    $password = $_POST["password"];

    //Encrypt the password
    $passHash = md5($password);

    //Insert input into database
    $insert = "INSERT into users(first_name,last_name,email,phone,address,password) VALUES ('$first_name','$last_name','$email','$phone','$address','$passHash')";

    $query = mysqli_query($con, $insert);

    //If insertion is successful
    if ($query) {
        //Redirect to page showing users
        header("Location: view_users.php?insertMsg=Registration_successful");
        exit();
    } else {
        header("Location: register.php?insertMsg=Failed_to_submit_data");
        exit();
    }
}
?>