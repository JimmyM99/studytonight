<?php
session_start();
require 'conn.php';
//post_id
$id = $_GET['id'];

if (isset($_SESSION['user']['id'])) {
    $user_id = $_SESSION['user']['id'];
} else {
    $user_id = NULL;
}

//query to select record
$sel = "SELECT * FROM posts WHERE id = '$id'";
$result = mysqli_query($con, $sel);
$row = mysqli_fetch_assoc($result);

if ($row) {
    $sel = "SELECT * FROM users WHERE id = $row[user_id]";
    $sol = mysqli_query($con, $sel);
    $user = mysqli_fetch_assoc($sol);

    // Check if the user has liked the post
    $check_like = "SELECT id FROM likes WHERE user_id = '$user_id' AND post_id = '$id'";
    $like_query = mysqli_query($con, $check_like);
    $user_liked = mysqli_num_rows($like_query) > 0;

    // Check if the user has bookmarked the post
    $check_bkmk = "SELECT id FROM bookmarks WHERE user_id = '$user_id' AND post_id = '$id'";
    $bkmk_query = mysqli_query($con, $check_bkmk);
    $user_bkmk = mysqli_num_rows($bkmk_query) > 0;
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="icon" type="image/png" href="assets/img/dev_logo.png" style="border: 1px solid black;">
        <title>Read</title>

        <link rel="stylesheet" href="form_css.css">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    </head>

    <header>
        <?= require 'navbar.php'; ?>
    </header>

    <body class="p-4" style="background-color:#f5f5f5;">
        <div class="site-read">
            <div class="container mt-3">
                <?php if (isset($_GET['insertMsg'])) { ?>
                    <div class="alert alert-success" style="height:0px;">
                        <p style="line-height: 0;">
                            <?php echo htmlspecialchars($_GET['insertMsg']); ?>
                        </p>
                    </div>
                <?php } ?>
                <div class="row">
                    <!-- The Left Column -->
                    <div class="col-lg-1">
                        <div class="ps-5 text-center mt-5" style="font-size:20px;">
                            <?php $post_id = $row['id'];
                            $sel = "SELECT 
                                    (SELECT COUNT(*) FROM likes WHERE post_id = '$post_id') AS total_likes,
                                    (SELECT COUNT(*) FROM comments WHERE post_id = '$post_id') AS total_comments,
                                    (SELECT COUNT(*) FROM bookmarks WHERE post_id = '$post_id') AS total_bookmarks";

                            $sol = mysqli_query($con, $sel);
                            $reactions = mysqli_fetch_assoc($sol);

                            // Assigning to convenient variable names
                            $total_likes = $reactions['total_likes'];
                            $total_comments = $reactions['total_comments'];
                            $total_bookmarks = $reactions['total_bookmarks']; ?>
                            <!-- like icon and counter -->
                            <div class="text-center mt-5" style="font-size:20px;">
                                <!-- like icon and counter -->
                                <p>
                                    <!-- If guest, disable like button -->
                                    <?php if (isset($_SESSION['user']['id'])): // Check if the user is logged in ?>
                                    <form action="like.php" method="POST">
                                        <input type="hidden" name="post_id" value="<?= $post_id ?>">
                                        <button type="submit"
                                            style="background-color:white; border: none; padding: 0; cursor: pointer;">
                                            <i style="font-size: 24px; opacity: 1;" id="like"
                                                class="bi-heart<?= $user_liked ? '-fill liked-icon' : ' unliked-icon' ?>"
                                                style="font-size: 24px;" data-id="<?= $post_id ?>"></i>
                                        </button>
                                    </form>
                                <?php else: ?>
                                    <i class="bi bi-heart"></i>
                                    <br>
                                <?php endif; ?>
                                <!-- Number of likes -->
                                <?= $total_likes ?>
                                </p>

                                <p>
                                    <!-- Comment icon, link and counter -->
                                    <a href="#comments" style="color:black;"><i class="bi-chat"></i></a>
                                    <br>
                                    <?= $total_comments ?>
                                </p>

                                <p>
                                    <?php if (isset($_SESSION['user']['id'])): ?>
                                    <form action="bookmark.php" method="POST">
                                        <input type="hidden" name="post_id" value="<?= $post_id ?>">
                                        <button type="submit"
                                            style="background: none; border: none; padding: 0; cursor: pointer;">
                                            <i style="font-size: 24px; opacity: 1;" id="mark"
                                                class="<?= $user_bkmk ? 'bi-bookmark-fill bkmk-icon' : 'bi-bookmark unbkmk-icon' ?>"
                                                data-id="<?= $post_id ?>"></i>
                                        </button>
                                    </form>
                                <?php else: ?>
                                    <i class="bi bi-bookmark"></i>
                                    <br>
                                <?php endif; ?>
                                <?= $total_bookmarks ?>
                                </p>
                                <p><span>...</span></p>
                            </div>
                        </div>
                    </div>

                    <!-- The Middle Column -->
                    <div class="col-lg-8">
                        <div class="card">
                            <!-- Post Image -->
                            <div>
                                <img class="mb-3" src="<?= $row['post_image'] ?>"
                                    style="width:100%; height:100%; object-fit:cover; max-height:400px;" alt="post image">
                            </div>
                            <!-- Post body -->
                            <div class="card-body ms-5 me-5">
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex mt-2">
                                        <div class="me-1">
                                            <!-- Profile image -->
                                            <img class="me-1" src="<?= $user['profile_image'] ?>"
                                                style="width: 40px; height: 40px; border-radius:50%;" alt="profile image">
                                        </div>
                                        <div>
                                            <?= $user['username'] ?>
                                            <br>
                                            <?= $row['created_at'] ?>
                                        </div>
                                    </div>
                                    <div>
                                        <!-- Give delete and edit access to only the author of the post -->
                                        <?php if (isset($_SESSION['user']['id'])) {
                                            if ($_SESSION['user']['id'] == $row['user_id']) { ?>
                                                <a href="edit.php?id=<?= $row['id'] ?>" style="color:blue;">Edit</a>&nbsp;&nbsp;
                                                <a href="delete.php?id=<?= $row['id'] ?>" style="color:red;" id="btn-delete"
                                                    onclick="return confirm('Are you sure you want to delete?')">Delete</a>
                                            <?php }
                                        } ?>
                                    </div>
                                </div>
                                <p style="font-size:50px;font-weight:bold;"><?= $row['title'] ?></p>

                                <p style="font-size:20px;"><?= $row['content'] ?></p>
                            </div>

                            <hr style="color:gray;">

                            <!-- Post footer -->
                            <div class="card-footer ms-5 me-5" style="border:none; background-color:white;">

                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <h4>Top Comments</h4>
                                    <button class="btn" style="border: 1px solid gray; color:black;">Subscribe</button>
                                </div>

                                <!-- Comment form -->
                                <div>
                                    <!-- If logged in, allow comment submission else, redirect to login page -->
                                    <form id="comment-form" action="comment.php" method="post">
                                        <div class="d-flex align-items-start mb-4"
                                            style="border:none; background-color:white;">
                                            <div>
                                                <?php if (isset($_SESSION['user']['id'])) { ?>
                                                    <img class="me-1" src="<?php echo $_SESSION['user']['profile_image']; ?>"
                                                        style="width: 35px; height: 35px; border-radius:50%; object-fit:cover;"
                                                        alt="profile image">
                                                <?php } else { ?>
                                                    <img class="me-1" src="assets/img/dev_logo.png"
                                                        style="width: 35px; height: 35px; border-radius:50%; object-fit:cover;"
                                                        alt="profile image">
                                                <?php } ?>
                                            </div>
                                            <div>
                                                <input type="hidden" name="post_id" value="<?= $post_id ?>">
                                                <textarea cols="100%" rows="1" name="comment"
                                                    placeholder="Add to discussion..." class="form-control mb-3"
                                                    form="comment-form"
                                                    style="border:1px solid gray;font-size:20px;"></textarea>

                                                <?php if (isset($_SESSION['user']['id'])) { ?>
                                                    <button class="btn btn-primary" name="submit">Submit</button>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <!-- Previous comments -->
                                <div>
                                    <!-- Append below the comment form -->
                                    <div id="comments"></div>

                                    <!-- Display all comments -->
                                    <div class="mb-2 comment">
                                        <?php
                                        $data_c = "SELECT * FROM comments WHERE post_id = $row[id]";
                                        $comments = mysqli_query($con, $data_c);

                                        if (mysqli_num_rows($comments) > 0) {
                                            while ($com = mysqli_fetch_assoc($comments)) {

                                                $sel_c = "SELECT * FROM users WHERE id = '$com[user_id]'";
                                                $sol_c = mysqli_query($con, $sel_c);
                                                $user_c = mysqli_fetch_assoc($sol_c);

                                                // Check if the user has liked the comment before
                                                $check_clike = "SELECT id FROM c_likes WHERE user_id = '$user_id' AND comment_id = '$com[id]'";
                                                $clike_query = mysqli_query($con, $check_clike);
                                                $cliked = mysqli_num_rows($clike_query) > 0;

                                                $comment_id = $com['id'];

                                                $c_like_sel = "SELECT COUNT(*) AS total FROM c_likes WHERE comment_id = '$comment_id'";
                                                $c_like_sol = mysqli_query($con, $c_like_sel);
                                                $c_like_rslt = mysqli_fetch_assoc($c_like_sol);

                                                $total_clikes = $c_like_rslt['total'];
                                                ;
                                                ?>
                                                <!-- Comment details -->
                                                <div class="d-flex mb-2">
                                                    <div class="mt-2">
                                                        <img class="me-1" src="<?php echo $user_c['profile_image']; ?>"
                                                            style="width: 35px; height: 35px; border-radius:50%;"
                                                            alt="profile image">
                                                    </div>
                                                    <div class="card p-3" style="width:100%;">
                                                        <p style="font-size: 15px;">
                                                            <?= $user_c['username'] ?>
                                                            <i class="bi bi-dot"></i>
                                                            <span style="color:gray;"><?= $com['created_at'] ?></span>
                                                            <i class="bi bi-dot"></i>
                                                            <span style="color:gray;"><?= $com['created_at'] ?></span>
                                                        </p>
                                                        <?= $com['comment'] ?>
                                                    </div>
                                                </div>

                                                <!-- Like or Reply -->
                                                <div class="p-1 ms-5 d-flex align-items-center">
                                                    <?php if (isset($_SESSION['user']['id'])): ?>
                                                        <span class="d-flex align-items-center">
                                                            <form action="c_like.php" method="POST" class="d-inline">
                                                                <input type="hidden" name="comment_id" value="<?= $com['id'] ?>">
                                                                <button type="submit"
                                                                    style="background: none; border: none; padding: 0; cursor: pointer;">
                                                                    <i id="like"
                                                                        class="bi-heart<?= $cliked ? '-fill liked-icon' : ' unliked-icon' ?>"
                                                                        data-id="<?= $post_id ?>"></i>
                                                                </button>
                                                            </form>

                                                            <span class="ms-2 rps" style="cursor: pointer;">
                                                                <?= $total_clikes ?>
                                                                <i class="bi bi-chat ms-4 me-2"></i>Reply
                                                            </span>
                                                        <?php else: ?>
                                                            <i class="bi-heart ms-2"></i> Like
                                                            <i class="bi bi-chat ms-2 me-2"></i> Reply
                                                        <?php endif; ?>
                                                </div>


                                                <!-- Reply form -->
                                                <div class="freply ms-5" style="display:none;">
                                                    <form id="reply-form" action="reply.php" method="post">
                                                        <input type="hidden" name="post_id" value="<?= $post_id ?>">
                                                        <input type="hidden" name="comment_id" value="<?= $com['id'] ?>">
                                                        <div class="mb-4" style="border:none; background-color:white;">
                                                            <div>
                                                                <textarea cols="100%" rows="1" name="reply"
                                                                    placeholder="Reply to discussion..." class="form-control mb-3"
                                                                    form="reply-form"
                                                                    style="border:1px solid gray;font-size:20px;"></textarea>
                                                                <div class="form-group mt-2">
                                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>

                                                <div class="ms-5">
                                                    <div class="append"></div>
                                                </div>

                                                <!-- Display all Replies -->
                                                <div class="ms-5">
                                                    <?php
                                                    $data_r = "SELECT * FROM replies WHERE comment_id = $com[id]";
                                                    $replies = mysqli_query($con, $data_r);

                                                    if (mysqli_num_rows($replies) > 0) {
                                                        while ($reply = mysqli_fetch_assoc($replies)) {

                                                            $sel_r = "SELECT * FROM users WHERE id = '$reply[user_id]' ";
                                                            $sol_r = mysqli_query($con, $sel_r);
                                                            $user_r = mysqli_fetch_assoc($sol_r);

                                                            // Check if the user has liked the reply before
                                                            $check_rlike = "SELECT id FROM r_likes WHERE user_id = '$user_id' AND reply_id = '$reply[id]'";
                                                            $rlike_query = mysqli_query($con, $check_rlike);
                                                            $rliked = mysqli_num_rows($rlike_query) > 0;

                                                            $reply_id = $reply['id'];

                                                            $r_like_sel = "SELECT COUNT(*) AS total FROM r_likes WHERE reply_id = '$reply_id'";
                                                            $r_like_sol = mysqli_query($con, $r_like_sel);
                                                            $r_like_rslt = mysqli_fetch_assoc($r_like_sol);

                                                            $total_rlikes = $r_like_rslt['total'];
                                                            ?>
                                                            <!-- Filter replies for the current comment  -->
                                                            <div class="mb-2 reply">
                                                                <div class="d-flex mb-2">
                                                                    <div class="mt-2">
                                                                        <img class="me-1" src="<?= $user_r['profile_image'] ?>"
                                                                            style="width: 35px; height: 35px; border-radius:50%;"
                                                                            alt="profile image">
                                                                    </div>
                                                                    <div class="card p-3" style="width:100%;">
                                                                        <p style="font-size: 15px;">
                                                                            <?= $user_r['username'] ?>
                                                                            <i class="bi bi-dot"></i>
                                                                            <span style="color:gray;"><?= $reply['created_at'] ?></span>
                                                                            <i class="bi bi-dot"></i>
                                                                            <span style="color:gray;"><?= $reply['created_at'] ?></span>
                                                                        </p>
                                                                        <?= $reply['reply'] ?>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!-- Like or Reply -->
                                                            <div class="p-1">
                                                                <div class="p-1 ms-5 d-flex align-items-center">
                                                                    <?php if (isset($_SESSION['user']['id'])): ?>
                                                                        <span class="d-flex align-items-center">
                                                                            <form action="r_like.php" method="POST" class="d-inline">
                                                                                <input type="hidden" name="reply_id"
                                                                                    value="<?= $reply['id'] ?>">
                                                                                <button type="submit" _SESSION
                                                                                    style="background: none; border: none; padding: 0; cursor: pointer;">
                                                                                    <i id="rlike"
                                                                                        class="bi-heart<?= $rliked ? '-fill liked-icon' : ' unliked-icon' ?>"
                                                                                        data-id="<?= $post_id ?>"></i>
                                                                                </button>
                                                                            </form>

                                                                            <span class="ms-2 rps" style="cursor: pointer;">
                                                                                <?= $total_rlikes ?>
                                                                                <i class="bi bi-chat ms-4 me-2"></i>Reply
                                                                            </span>
                                                                        <?php else: ?>
                                                                            <i class="bi-heart ms-2"></i> Like
                                                                            <i class="bi bi-chat ms-2 me-2"></i> Reply
                                                                        <?php endif; ?>
                                                                </div>
                                                            </div>
                                                        <?php }
                                                    } else { ?>
                                                    <?php } ?>
                                                </div>
                                            <?php }
                                        } else { ?>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <p style="text-align:center; color:gray;">Code of Conduct * Report abuse</p>
                        </div>
                    </div>

                    <!-- The Right Column -->
                    <div class="col-lg-3">
                        <div class="card p-3">
                            <div class="card-header" style="border:none; background-color:white;">
                                <div class="d-flex align-items-start">
                                    <div class="d-flex mt-2">
                                        <div>
                                            <img class="me-1" style="width: 45px; height: 45px; border-radius:50%;"
                                                alt="profile image" src="<?= $user['profile_image'] ?>">
                                        </div>
                                    </div>
                                    <div class="mt-3">
                                        <h5><?= $user['username'] ?></h5>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary">Follow</button>
                            <br>
                            <p>
                                I know the turmoil, trauma, and feeling of worthlessness you
                                get when you open that mail, and all you see is we are sorry
                                to inform you that we will not be moving forward with your
                                application. That feeling is heart-wrenching, mainly when you
                                put in so much work on your CV and during the interviews.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>

        <script>
            //Toggle reply form
            $(document).on('click', '.rps', function () {
                var reply = $(this).closest('.comment').find('.freply');
                if (reply.css('display') === 'none') {
                    reply.show();
                } else {
                    reply.hide();
                }
            });
        </script>
    </body>

    </html>

    <?php
} else {
    echo "No record found.";
    echo '<a href="view_users.php">Return to Users</a>';
}
?>