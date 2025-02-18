<?php 
require_once 'conn.php';

//delete a record
$id = $_GET["id"];

$del = "DELETE FROM users WHERE id = '$id'";
$result = mysqli_query($con,$del);

if($result){
    echo "Record successfully deleted";
}else{
    echo "Failed to delete record";
}
?>