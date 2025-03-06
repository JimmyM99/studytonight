<?php
session_start();
require_once 'conn.php';

if (isset($_FILES['post_image']) && !empty($_POST['title']) && strlen($_POST['content']) > 0) {
    $targetDir = "uploads/";
    $defaultImage = "uploads/dev.png";
    $targetFilePath = $defaultImage; // Default image path

    if (!empty($_FILES['post_image']['name'])) {
        $fileName = basename($_FILES["post_image"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        
        // Get the file extension
        $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
        $allowedTypes = ["jpg", "jpeg", "png", "gif"];

        if (in_array($fileType, $allowedTypes)) {
            if (!file_exists($_FILES["post_image"]["tmp_name"])) {
                echo "Error: No file uploaded.";
                exit();
            }

            if ($_FILES["post_image"]["error"] !== UPLOAD_ERR_OK) {
                echo "File upload error: " . $_FILES["post_image"]["error"];
                exit();
            }

            if (!move_uploaded_file($_FILES["post_image"]["tmp_name"], $targetFilePath)) {
                echo "Error uploading the file.";
                exit();
            }
        } else {
            echo "Invalid file type. Only JPG, JPEG, PNG & GIF allowed.";
            exit();
        }
    }

    // Retrieve input values
    $title = mysqli_real_escape_string($con, $_POST["title"]);
    $content = mysqli_real_escape_string($con, $_POST["content"]);
    $user_id = $_SESSION['user']['id'];

    // Insert into database
    $query = "INSERT INTO posts (title, content, user_id, post_image) VALUES ('$title', '$content', '$user_id', '$targetFilePath')";

    if (mysqli_query($con, $query)) {
        header("Location: index.php?insertMsg=Post created successfully");
        exit();
    } else {
        echo "Database error: " . mysqli_error($con);
        exit();
    }
}else{
    echo "Database error: " . mysqli_error($con);
}
