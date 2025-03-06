<?php
session_start();
include 'conn.php';

if (!session_status() == PHP_SESSION_ACTIVE) {
    die("You must be logged in to like a post.");
}

$user_id = $_SESSION['user']['id'];
$post_id = $_POST['post_id'];
$comment = mysqli_real_escape_string($con, $_POST["comment"]);

// Insert into database
$query = "INSERT INTO comments (user_id, post_id, comment) VALUES ('$user_id', '$post_id', '$comment')";

if (mysqli_query($con, $query)) {
    header("Location: read.php?id=$post_id&insertMsg=Comment created successfully");
    exit();
} else {
    echo "Database error: " . mysqli_error($con);
    exit();
}

?>