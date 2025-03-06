<?php
session_start();
include 'conn.php';

if (!isset($_SESSION['user']['id'])) {
    die("You must be logged in to comment.");
}

    $user_id = $_SESSION['user']['id'];
    $comment_id = $_POST['comment_id'];
    $post_id = $_POST['post_id'];
    $reply = mysqli_real_escape_string($con, $_POST["reply"]);

    if (empty($reply)) {
        die("Reply cannot be empty.");
    }

// Insert into database
$query = "INSERT INTO replies (user_id, comment_id, reply) VALUES ('$user_id', '$comment_id', '$reply')";

if (mysqli_query($con, $query)) {
    header("Location: read.php?id=$post_id&insertMsg=Reply created successfully");
    exit();
} else {
    echo "Database error: " . mysqli_error($con);
    exit();
}