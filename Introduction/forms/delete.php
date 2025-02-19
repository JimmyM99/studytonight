<?php 
require_once 'conn.php';

//delete a record
$id = $_GET["id"];

$del = "DELETE FROM users WHERE id = '$id'";
$result = mysqli_query($con,$del);

if($result){
    header("Location: view_users.php?insertMsg=Delete_successful"); 
    exit();
}else{
    echo "Failed to delete record";
}
?>