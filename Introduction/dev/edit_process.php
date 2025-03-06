<?php
require_once 'conn.php';

if (isset($_POST['title']) && isset($_POST['content'])) {
    $targetDir = "uploads/";
    $fileName = basename($_FILES["post_image"]["name"]);

    if (!empty($_FILES['post_image']['name'])) {
        $targetFilePath = $targetDir . $fileName;  // Full path
    } else {
        $targetFilePath = "/dev/assets/img/dev.png";
    }

    // Get the file extension
    $fileType = strtolower(pathinfo($filePath, PATHINFO_EXTENSION));
    $allowedTypes = ["jpg", "jpeg", "png", "gif"];

    //Retrieve input values
    $title = mysqli_real_escape_string($con, $_POST["title"]);
    $content = mysqli_real_escape_string($con, $_POST["content"]);
    $post_id = $_POST['post_id']; 

    // Check if an image is uploaded
    if (!empty($_FILES['post_image']['name'])) {
        if (in_array($fileType, $allowedTypes)) {
            // Move the file to the 'uploads' directory
            if (move_uploaded_file($_FILES["post_image"]["tmp_name"], $filePath)) {
                // Update query with new image
                $update = "UPDATE posts SET title='$title', content='$content', post_image='$filePath' WHERE id=$post_id";
            } else {
                echo "Error uploading the file.";
                exit();
            }
        } else {
            echo "Invalid file type. Only JPG, JPEG, PNG & GIF allowed.";
            exit();
        }
    } else {
        $update = "UPDATE posts SET title='$title', content='$content' WHERE id=$post_id";
    }

    // Execute query
    if (mysqli_query($con, $update)) {
        header("Location: index.php?updateMsg=Post updated successfully");
        exit();
    } else {
        echo "Database error: " . mysqli_error($con);
        exit();
    }
} else {
    echo "All fields are required!";
}

//crud  create read  update delete

?>