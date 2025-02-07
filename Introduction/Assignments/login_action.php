<?php 
$username = $_POST["username"];
$password = $_POST["password"];

$herodoc = <<<"TEXT"
<div style="display: flex; justify-content: center;">
<div style="font-weight:bold;padding: 20px;box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);background: lightgray;text-align: left;">
    <p>Username: $username</p>
    <p>Password: $password</p>
    </div>
    </div>
TEXT;

echo $herodoc;
?>