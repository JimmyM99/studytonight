<?php
require_once 'conn.php';

    $first_name = mysqli_real_escape_string($con, $_POST["first_name"]);
    $last_name = mysqli_real_escape_string($con, $_POST["last_name"]);
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];
    $id = $_POST['id'];

//encrypting password such that its not readable from the tables
//using md5 method

$passHash = md5($pass);
// echo "Your password hash for $pass is $passHash";
if(!empty($first_name) && !empty($last_name) && !empty($email) && !empty($phone) && !empty($address)){
    $insert = "UPDATE users set first_name ='$first_name', last_name ='$last_name', email ='$email', phone ='$phone', address ='$address' where id = '$id'"; //update query
    $query = mysqli_query($con,$insert); //update process
    if($query){
        //redirect to view page
        header('location:view_users.php?updateMsg=Record updated successfully');
    }else{
        echo "Failed to insert data to the database";
    }
}
else{
    echo "Please you didn't supply the username and password";
}

//crud  create read  update delete

?>