<?php
session_start();
include 'conn.php';

if (!session_status() == PHP_SESSION_ACTIVE) {
    die("You must be logged in to like a post.");
}

$user_id = $_SESSION['user']['id'];
$post_id = $_POST['post_id'];

// Check if the user has already liked the post
$check_bkmk = "SELECT id FROM bookmarks WHERE user_id = '$user_id' AND post_id = '$post_id'";
$result = mysqli_query($con, $check_bkmk);

if (mysqli_num_rows($result) > 0) {
    // Unlike the post (delete the like)
    $query = "DELETE FROM bookmarks WHERE user_id = '$user_id' AND post_id = '$post_id'";
    $msg = 'Bookmark removed';
} else {
    // Like the post (insert a new like)
    $query = "INSERT INTO bookmarks (user_id, post_id) VALUES ('$user_id', '$post_id')";
    $msg = 'Bookmark successful';
}

if (mysqli_query($con, $query)) {
    header("Location: read.php?id=$post_id&insertMsg=$msg");
    exit();
} else {
    echo "Database error: " . mysqli_error($con);
    exit();
}
?>