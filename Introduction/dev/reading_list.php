<?php
session_start();

$user_id = $_SESSION['user']['id'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">

    <!-- Title -->
    <link rel="icon" type="image/png" href="assets/img/dev_logo.png" style="border: 1px solid black;">
    <title>Reading list</title>

    <link href="style.css" rel="form_css.php" />
</head>

<body class="p-4" style="width:1600px; margin:auto; background-color:#f5f5f5;">
    <?= require 'navbar.php'; ?>

    <div class="site-mark">
        <div class="body-content mt-3">
            <div class="d-flex justify-content-between pt-5">
                <div>
                    <!-- Total Bookmarks -->
                    <?php
                    $sel = "SELECT COUNT(*) AS total FROM bookmarks WHERE user_id = '$user_id'";
                    $sol = mysqli_query($con, $sel);
                    $rslt = mysqli_fetch_assoc($sol);
                    $total_bkmks = $rslt['total']; ?>

                    <span class="ps-4" style="font-size: 20px; font-weight: bold;">Reading List ( <?= $total_bkmks ?> )</span>
                </div>
                <div class="d-flex align-items-center">
                    <span>View Archive</span>
                    <input class="ms-2 form-control w-auto" type="search" placeholder="Search">
                </div>
            </div>
            <div class="row align-items-start ps-2">
                <div class="col-lg-3" style="width:350px; margin:auto;">
                    <p style="font-size:20px; font-weight: bold;">All tags</p>
                    <hr>
                    <div class="ps-2" style="border:none; background-color:#f5f5f5;">
                    <p>#javascript</p>
                    <p>#news</p>
                    <p>#opensource</p>
                    <p>#webdev</p>
                    </div>
                </div>

                <div class="col-lg-9 pt-5">
                    <?php
                    // Retrieve bookmarked post IDs for the user
                    $bookmark_query = "SELECT post_id FROM bookmarks WHERE user_id = '$user_id'";
                    $bookmark_result = mysqli_query($con, $bookmark_query);

                    if (mysqli_num_rows($bookmark_result) > 0) {
                        while ($bookmark = mysqli_fetch_assoc($bookmark_result)) {
                            $post_id = $bookmark['post_id'];

                            // Fetch post details from posts table
                            $post_query = "SELECT * FROM posts WHERE id = '$post_id' ORDER BY created_at DESC";
                            $post_result = mysqli_query($con, $post_query);

                            if (mysqli_num_rows($post_result) > 0) {
                                while ($post = mysqli_fetch_assoc($post_result)) {

                                    // Fetch user details from users table
                                    $user_query = "SELECT * FROM users WHERE id = '$post[user_id]'";
                                    $user_result = mysqli_query($con, $user_query);
                                    $user = mysqli_fetch_assoc($user_result);
                                    ?>
                                    <div class="card p-3 mb-3 shadow" style="background-color:lightcyan; height:120px; border:none;">
                                        <a href="read.php?id=<?= $post['id'] ?>" style="text-decoration:none; color:black;">
                                        <div class="d-flex justify-content-between">
                                            <div class="d-flex">
                                                <div>
                                                    <img style="width: 50px; height: 50px; border-radius:50%;" class="me-1"
                                                        src="<?= $post['post_image'] ?>">
                                                </div>
                                                <div class="ms-1">
                                                    <span style="font-size: 15px;">
                                                        <span style="font-weight:bold;" class="h4"><?= $post['title'] ?> </span>
                                                        <br>
                                                        <span style="font-size:15px;"><?= $user['username'] ?> </span>

                                                        <span style="color:gray;">&bull;</span>

                                                        <span style="color:gray;font-size:15px;"><?= $post['created_at'] ?> </span>
                                                        <span style="color:gray;">&bull;</span> <br>

                                                        # these #are #the #tags
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        </a>
                                    </div>
                                <?php }
                            }
                        }
                    } else {
                        echo "<h3>You have not bookmarked a post yet!</h3>";
                    } ?>
                </div>
            </div>
        </div>
    </div>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script>
    </script>
</body>

</html>