<?php 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="form_css.css">
</head>
<body style="text-align:center">
    <div class="form-container">
    <h3>Login</h3>
    <form action="login_action.php" method="post">
        <label for="">Username</label>
        <input type="text" name="username" placeholder="Username..." required>
        <br>
        <br>
        <label for="">Password</label>
        <input type="password" name="password"  placeholder="Password..." required>
        <br>
        <br>
        <button name="submit">Submit</button>
    </form>
    </div>
    <!-- <a href="login_action.php">Go to action</a> -->
</body>
</html>