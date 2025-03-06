<?php
session_start();
require_once 'conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $email = ($_POST['email']);
    $password = ($_POST['password']);

    
    if (empty($email) || empty($password)) {
        header("Location: login.php?insertMsg=" . urlencode("Email and Password are required."));
        exit();
    }

    $query = "SELECT id, first_name, last_name, username, profile_image, password FROM users WHERE email = ?";
    if ($stmt = mysqli_prepare($con, $query)) {
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        // Check if user exists
        if ($row = mysqli_fetch_assoc($result)) {
            // Verify password 
            if (md5($password)===$row['password']) {
                // Set session variables
                $_SESSION['user'] = [
                    'id' => $row['id'],
                    'first_name' => $row['first_name'],
                    'last_name' => $row['last_name'],
                    'username' => $row['username'],
                    'profile_image' => $row['profile_image'],
                    'initial' => strtoupper($row['first_name'][0].$row['last_name'][0])
                ];

                // Redirect to homepage
                header("Location: index.php");
                exit();
            } else {
                header("Location: login.php?insertMsg=" . urlencode("Invalid password."));
                exit();
            }
        } else {
            header("Location: login.php?insertMsg=" . urlencode("User not found."));
            exit();
        }
    } else {
        header("Location: login.php?insertMsg=" . urlencode("Database error."));
        exit();
    }
} else {
    header("Location: login.php");
    exit();
}
?>
