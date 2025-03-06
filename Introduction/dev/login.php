<?php
session_start();
require 'conn.php';

// Redirect if user is already logged in
if (isset($_SESSION['user'])) {
  header("Location: index.php");
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

  <link rel="icon" type="image/png" href="assets/img/dev_logo.png" style="border: 1px solid black;">
  <title>Login</title>

  <link rel="stylesheet" href="form_css.css">
</head>

<body class="container p-4" style="text-align:center; width:1250px;">
  <div class="site-login mt-3">
    <div style="width: 45%; margin: 0 auto;">
      <!-- Heading -->
      <div class="text-center">
        <a href="index.php" style="text-decoration:none; color:black;">
          <img src="assets/img/dev_logo.png" alt="logo" style="height: 43px; width:55px; border-radius:5px;"
            class="mb-3">
        </a>

        <?php $data_n = "SELECT * FROM users";
        $result = mysqli_query($con, $data_n);
        $count = mysqli_num_rows($result); ?>

        <h2 style="font-weight:bold;">Join the DEV Community</h2>
        <p style="font-size:18px;">DEV Community is a community of
          <!-- no. of users -->
          <?= $count ?>
          amazing developers
        </p>
      </div>

      <!-- Options (Not yet functional) -->
      <div style="font-size:15px; font-weight:bold;">
        <div class="card mb-3">
          <div class="card-body d-flex p-3">
            <i class="bi bi-apple"></i>
            <span class="mx-auto">Continue with Apple</span>
          </div>
        </div>
        <div class="card mb-3">
          <div class="card-body d-flex p-3">
            <i class="bi bi-facebook" style="color:blue;"></i>
            <span class="mx-auto">Continue with Facebook</span>
          </div>
        </div>
        <div class="card mb-3">
          <div class="card-body d-flex p-3">
            <i class="bi bi-github"></i>
            <span class="mx-auto">Continue with Github</span>
          </div>
        </div>
        <div class="card mb-3">
          <div class="card-body d-flex p-3">
            <i class="bi bi-google"></i>
            <span class="mx-auto">Continue with Google</span>
          </div>
        </div>
        <div class="card mb-3">
          <div class="card-body d-flex p-3">
            <i class="bi bi-twitter-x"></i>
            <span class="mx-auto">Continue with Twitter (X)</span>
          </div>
        </div>
      </div>

      <div class="d-flex">
        <hr class="flex-grow-1 me-2">
        <span>OR</span>
        <hr class="flex-grow-1 ms-2">
      </div>

      <!-- Email login -->
      <div>
        <div class="form-container">
          <?php if (isset($_GET['insertMsg'])) { ?>
            <div class="alert alert-danger" style="height:0px;">
              <p style="line-height: 0;">
                <?php echo htmlspecialchars($_GET['insertMsg']); ?>
              </p>
            </div>
          <?php } ?>
          <div class="text-start">
            <form action="login_process.php" method="POST">
              <label class="form-label" for="email" style="font-weight:bold;">Email</label>
              <input class="form-control mb-3" type="email" name="email" placeholder="Email..." required>

              <label class="form-label" for="password" style="font-weight:bold;">Password</label>
              <input class="form-control mb-3" type="password" name="password" placeholder="Password..." required>

              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <input class="form-control custom-checkbox" type="checkbox" name="remember" id="remember">
                  <label class="form-label" for="remember" style="font-weight:bold;">Remember Me</label>
                </div>

                <div>
                  <a href="register.php" style="text-decoration:none;">Forgot Password?</a>
                </div>
              </div>

              <button class="form-control btn-primary" type="submit" name="submit">Submit</button>
            </form>
          </div>
        </div>

        <div style="color:#999;">
          <p class="mt-3">By signing in, you are agreeing to our
            <a href="https://dev.to/privacy" style="text-decoration:none;">privacy policy</a>,
            <a href="https://dev.to/terms" style="text-decoration:none;">terms of use</a> and
            <a href="https://dev.to/code-of-conduct" style="text-decoration:none;">code of conduct</a>.
          </p>
          <hr>
          <p>New to DEV Community? <a href="create" style="text-decoration:none;">Create account</a>.</p>
        </div>
      </div>
    </div>
  </div>

  <style>
    .custom-checkbox {
      -webkit-appearance: none;
      /* Removes default styling for Webkit browsers */
      -moz-appearance: none;
      /* Removes default styling for Firefox */
      appearance: none;
      /* Removes default styling for all browsers */
      width: 20px;
      height: 20px;
      border: 1px solid black;
      border-radius: 5px;
      cursor: pointer;
      display: inline-block;
      position: relative;
    }

    .custom-checkbox:checked {
      background-color: cyan;
      border-color: #4285F4;
    }

    .custom-checkbox:checked::after {
      content: '✔';
      position: absolute;
      bottom: 12px;
      left: 2px;
      width: 8px;
      height: 8px;
    }
  </style>
</body>

</html>