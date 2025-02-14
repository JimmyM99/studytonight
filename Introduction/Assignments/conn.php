
<?php
//connecting to the database {hostname, username, password and database}
$hostname = '127.0.0.1';
$username = 'root';
$pass = "J1m3y@123";
$database = "php_crud";

//creating connection
$con = mysqli_connect($hostname,$username,$pass,$database);

//check connection
if($con->connect_error){
    echo "Failed to connect to the database";
}
