<?php
session_start();
include 'conn.php';

if (!isset($_SESSION['user']['id'])) {
    die("You must be logged in to like a post.");
}

$user_id = $_SESSION['user']['id'];
$post_id = $_POST['post_id'];

// Check if the user has already liked the post
$check_like = "SELECT id FROM likes WHERE user_id = '$user_id' AND post_id = '$post_id'";
$result = mysqli_query($con, $check_like);

if (mysqli_num_rows($result) > 0) {
    // Unlike the post (delete the like)
    $query = "DELETE FROM likes WHERE user_id = '$user_id' AND post_id = '$post_id'";
    $msg = 'Post unliked!';
} else {
    // Like the post (insert a new like)
    $query = "INSERT INTO likes (user_id, post_id) VALUES ('$user_id', '$post_id')";
    $msg = 'Post liked!';
}

if (mysqli_query($con, $query)) {
    header("Location: read.php?id=$post_id&insertMsg=$msg");
    exit();
} else {
    echo "Database error: " . mysqli_error($con);
    exit();
}
?>