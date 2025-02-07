<?php 
$fname = $_POST["fname"];
$lname = $_POST["lname"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$password = $_POST["password"];

$herodoc = <<<"TEXT"
<div style="display: flex; justify-content: center;">
<div style="font-weight:bold;padding: 20px;box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);background: lightgray;text-align: left;">
    <p>First Name: $fname</p>
    <p>Last Name: $lname</p>
    <p>Email: $email</p>
    <p>Phone: $phone</p>
    <p>Password: $password</p>
    </div>
    </div>
TEXT;

echo $herodoc;
?>