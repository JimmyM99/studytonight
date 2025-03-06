<?php
require_once 'conn.php';

if (isset($_FILES['profile_image']) && !empty($_POST['first_name']) && !empty($_POST['last_name']) && !empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password'])) {
    $targetDir = "uploads/";  // Folder where images will be stored
    $defaultImage = "uploads/dev.png";
    $filePath = $defaultImage;

    if (!empty($_FILES['profile_image']['name'])) {
        $fileName = basename($_FILES["profile_image"]["name"]);
        $filePath = $targetDir . $fileName;

        // Get the file extension
        $fileType = strtolower(pathinfo($filePath, PATHINFO_EXTENSION));
        $allowedTypes = ["jpg", "jpeg", "png", "gif"];

        if (in_array($fileType, $allowedTypes)) {
            if (!file_exists($_FILES["profile_image"]["tmp_name"])) {
                echo "Error: No file uploaded.";
                exit();
            }

            if ($_FILES["post_image"]["error"] !== UPLOAD_ERR_OK) {
                echo "File upload error: " . $_FILES["profile_image"]["error"];
                exit();
            }

            if (!move_uploaded_file($_FILES["profile_image"]["tmp_name"], $filePath)) {
                echo "Error uploading the file.";
                exit();
            }
        } else {
            echo "Invalid file type. Only JPG, JPEG, PNG & GIF allowed.";
            exit();
        }
    }

    //Retrieve input values
    $first_name = mysqli_real_escape_string($con, $_POST["first_name"]);
    $last_name = mysqli_real_escape_string($con, $_POST["last_name"]);
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    //Encrypt the password
    $passHash = md5($password);

    // Insert into database
    $query = "INSERT INTO users (first_name, last_name, username, email, password, profile_image) 
                    VALUES ('$first_name', '$last_name', '$username', '$email', '$passHash', '$filePath')";

    //if insertion is successful
    if (mysqli_query($con, $query)) {
        //Redirect to page showing users
        header("Location: login.php?insertMsg=Registration successful, please login");
        exit();
    } else {
        header("Location: register.php?insertMsg=Failed to submit data");
        echo "Database error: " . mysqli_error($con);
        exit();
    }
} else {
    echo "Error uploading the file.";
}
?>