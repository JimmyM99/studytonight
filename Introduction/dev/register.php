<?php
require_once 'conn.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" type="image/png" href="assets/img/dev_logo.png" style="border: 1px solid black;">
    <title>Register</title>
    
    <link rel="stylesheet" href="form_css.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body style="background-color:#f5f5f5;">
    <div class="container">
    <div class="form-container">
        <h3>Register</h3>

        <form action="register_process.php" method="POST" enctype="multipart/form-data">
            <label for="profile_image" class="form-label">Profile Picture: </label>
            <input type="file" name="profile_image" placeholder="Profile pic..." class="form-control p-3">
            <hr>
            <label for="first_name" class="form-label">First Name: </label>
            <input type="text" name="first_name" placeholder="First Name..." class="form-control" required>

            <label for="last_name" class="form-label">Last Name: </label>
            <input type="text" name="last_name" placeholder="Last Name..." class="form-control" required>

            <label for="username" class="form-label">Username: </label>
            <input type="text" name="username" placeholder="Username..." class="form-control" required>

            <label for="email" class="form-label">Email: </label>
            <input type="email" name="email" placeholder="Email..." class="form-control" required>

            <label for="password" class="form-label">Password: </label>
            <input type="password" name="password" placeholder="Password..." class="form-control" required>

            <button class="btn btn-primary form-control" name="submit">Register</button>
        </form>
    </div>
    </div>
    <!-- <a href="register_process .php">Go to action</a> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>