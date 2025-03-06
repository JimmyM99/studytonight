<?php 
session_start();
require 'conn.php';

//delete a record
$id = $_GET["id"];

$del = "DELETE FROM posts WHERE id = '$id'";
$result = mysqli_query($con,$del);

if($result){
    header("Location: index.php?insertMsg=Delete_successful");
    exit();
}else{
    echo "Failed to delete record <br/>";
    echo '<a href="index.php">Return to Home</a>';
}
?>