<?php 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="form_css.css">
</head>
<body>
    <div class="form-container">
    <h3>Register</h3>
    <form action="registration_action.php" method="post">
        <label for="fname">First Name: </label>
        <input type="text" name="fname" placeholder="First Name..." required>
        <br>
        <br>
        <label for="lname">Last Name: </label>
        <input type="text" name="lname" placeholder="Last Name..." required>
        <br>
        <br>
        <label for="email">Email: </label>
        <input type="email" name="email" placeholder="Email..." required>
        <br>
        <br>
        <label for="phone">Phone: </label>
        <input type="tel" name="phone" placeholder="Phone..." required>
        <br>
        <br>
        <label for="password">Password: </label>
        <input type="password" name="password"  placeholder="Password..." required>
        <br>
        <br>
        <button name="submit">Register</button>
    </form>
    </div>
    <!-- <a href="registration_action.php">Go to action</a> -->
</body>
</html>