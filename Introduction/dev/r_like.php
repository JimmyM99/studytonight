<?php
session_start();
include 'conn.php';

if (!isset($_SESSION['user']['id'])) {
    die("You must be logged in to like a post.");
}

$user_id = $_SESSION['user']['id'];
$reply_id = $_POST['reply_id'];

$check_rlike = "SELECT id FROM r_likes WHERE user_id = '$user_id' AND reply_id = '$reply_id'";
$result = mysqli_query($con, $check_rlike);

// Retrieve the post_id from the using comment_id in the replies table using reply_id
$get_comment_id_query = "SELECT comment_id FROM replies WHERE id = '$reply_id'";
$comment_id_result = mysqli_query($con, $get_comment_id_query);

if ($comment_id_result && mysqli_num_rows($comment_id_result) > 0) {
    $comment_id_row = mysqli_fetch_assoc($comment_id_result);
    $comment_id = $comment_id_row['comment_id'];

    // Get post_id from the comments table using comment_id
    $get_post_id_query = "SELECT post_id FROM comments WHERE id = '$comment_id'";
    $post_id_result = mysqli_query($con, $get_post_id_query);

    if ($post_id_result && mysqli_num_rows($post_id_result) > 0) {
        $post_id_row = mysqli_fetch_assoc($post_id_result);
        $post_id = $post_id_row['post_id']; // Store post_id for further use
    }
}

if (mysqli_num_rows($result) > 0) {
    // Unlike the comment (delete the like)
    $query = "DELETE FROM r_likes WHERE user_id = '$user_id' AND reply_id = '$reply_id'";
    $msg = 'Reply unliked!';
} else {
    // Like the comment (insert a new like)
    $query = "INSERT INTO r_likes (user_id, reply_id) VALUES ('$user_id', '$reply_id')";
    $msg = 'Reply liked!';
}

if (mysqli_query($con, $query)) {
    header("Location: read.php?id=$post_id&insertMsg=$msg");
    exit();
} else {
    echo "Database error: " . mysqli_error($con);
    exit();
}
?>