<?php 
require_once 'conn.php';

//view a record
$id = $_GET['id'];

//query to select record
$sel = "SELECT * FROM users WHERE id = '$id'";
$result = mysqli_query($con, $sel);
//f
$row = mysqli_fetch_assoc($result);

if ($row) {
    echo "ID: " . $row['id'] . "<br>";
    echo "Name: " . $row['first_name'] . " " . $row['last_name'] . "<br>";
    echo "Email: " . $row['email'] . "<br>";
    echo "Password: " . $row['password'] . "<br>";
} else {
    echo "No record found.";
}
