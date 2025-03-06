<?php
session_start();
include 'conn.php';

if (!isset($_SESSION['user']['id'])) {
    die("You must be logged in to like a post.");
}

$user_id = $_SESSION['user']['id'];
$comment_id = $_POST['comment_id'];

$check_clike = "SELECT id FROM c_likes WHERE user_id = '$user_id' AND comment_id = '$comment_id'";
$result = mysqli_query($con, $check_clike);

// Retrieve the post_id from the comments table
$get_post_id_query = "SELECT post_id FROM comments WHERE id = '$comment_id'";
$post_id_result = mysqli_query($con, $get_post_id_query);

if ($post_id_result) {
    $post_id_row = mysqli_fetch_assoc($post_id_result);
    $post_id = $post_id_row['post_id']; // Store post_id for further use
}

if (mysqli_num_rows($result) > 0) {
    // Unlike the comment (delete the like)
    $query = "DELETE FROM c_likes WHERE user_id = '$user_id' AND comment_id = '$comment_id'";
    $msg = 'Comment unliked!';
} else {
    // Like the comment (insert a new like)
    $query = "INSERT INTO c_likes (user_id, comment_id) VALUES ('$user_id', '$comment_id')";
    $msg = 'Comment liked!';
}

if (mysqli_query($con, $query)) {
    header("Location: read.php?id=$post_id&insertMsg=$msg");
    exit();
} else {
    echo "Database error: " . mysqli_error($con);
    exit();
}
?>