<?php
require 'conn.php';
?>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</head>

<nav style="position: fixed; top: 0; left: 0; width: 100%;background-color:white; color: black; padding: 8px 10px; display: flex;
justify-content: space-between;align-items: center;z-index: 1000; border:1px solid lightgray;">
    <div class="d-flex justify-content-between" style="width:1330px; margin:auto;">
        <div>
            <a href="index.php">
                <img src="assets/img/dev_logo.png" alt="DEV Logo"
                    style="height: 35px; width: 45px; border-radius: 5px;">
            </a>
            <input id="search" type="text" placeholder="Search..."
                style="margin-left: 10px; padding: 5px; width:700px; border:1px solid lightgray">
        </div>

        <div>
            <?php if (isset($_SESSION['user'])): ?>
                <a class="btn btn-outline-primary" href="post.php" style="margin-right: 15px;">Create Post</a>
                <i class="bi bi-bell fs-5 me-3"></i>
                <div style="display: inline-block; position: relative;">
                    <a onclick="toggleDropdown()" style="background: none; border: none; cursor: pointer;">
                        <img class="me-1" src="<?= $_SESSION['user']['profile_image'] ?>"
                            style="width: 35px; height: 35px; border-radius:50%; object-fit:cover;" alt="profile image">

                        <!-- <span style="padding: 5px; background: orange; border-radius: 50%;"><?php echo strtoupper($_SESSION['user']['initial']); ?></span> -->
                    </a>
                    <div id="dropdown" class="p-2 mt-1"
                        style="display: none; position: absolute; right: 0; background: white; border: 1px solid #ddd; width:250px; border-radius:10px;">
                        <p class="ps-3">
                            <?php echo $_SESSION['user']['first_name'] . " ";
                            echo $_SESSION['user']['last_name']; ?><br>
                            <span style="color:gray;font-size:15px;">@<?php echo $_SESSION['user']['username']; ?></span>
                        </p>
                        <hr>
                        <p><a class="ps-3" href="index.php"
                                style="text-decoration:none; color:black; font-size:17px;">Dashboard</a></p>
                        <p><a class="ps-3" style="text-decoration:none; color:black; font-size:17px;" href="post.php">Create
                                Post</a></p>
                        <p><a class="ps-3" style="text-decoration:none; color:black; font-size:17px;"
                                href="post.php?id=<?= $_SESSION['user']['id'] ?>">Reading List</a></p>
                        <p><a class="ps-3" href="index.php"
                                style="text-decoration:none; color:black; font-size:17px;">Settings</a></p>
                        <hr>
                        <a class="ps-3" href="logout.php" style="text-decoration:none; color:black; font-size:17px;">Sign
                            Out</a>
                    </div>
                </div>
                <script>
                    function toggleDropdown() {
                        var dropdown = document.getElementById("dropdown");
                        dropdown.style.display = dropdown.style.display === "block" ? "none" : "block";
                    }
                </script>
            <?php else: ?>
                <div class="d-flex align-items-center">
                    <a href="login.php" style="text-decoration: none;color:black; font-size:17px;">Log in</a>
                    <a href="register.php" class="btn ms-3"
                        style="padding: 5px; border-radius: 5px; border:1px solid blue;color:blue;"><span class="p-2">Create
                            account</span></a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</nav>