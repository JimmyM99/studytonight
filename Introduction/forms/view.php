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
    echo '<div style="display: flex; justify-content: center; margin-top:250px;">
<div style="font-weight:bold;padding: 20px;box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);background: black;color:cyan;text-align: left;line-height:30px; border-radius:10px;"><h2>';
    echo "ID: " . $row['id'] . "<br>";
    echo "Name: " . $row['first_name'] . " " . $row['last_name'] . "<br>";
    echo "Email: " . $row['email'] . "<br>";
    echo "Address: " . $row['address'] . "<br>";
    echo "Phone: " . $row['phone'] . "<br>";
    echo "Registered on: " . $row['created_at'] . "<br>";
    echo '</h2></div></div>';
} else {
    echo "No record found.";
    echo '<a href="view_users.php">Return to Users</a>';
}
?>