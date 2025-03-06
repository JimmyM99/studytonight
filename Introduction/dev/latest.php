<?php
session_start();

$user_id = $_SESSION['user']['id'];
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="form_css.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

    <!-- Title -->
    <link rel="icon" type="image/png" href="assets/img/dev_logo.png" style="border: 1px solid black;">
    <title>Latest</title>
</head>
<header class="mb-5">
    <?= require 'navbar.php'; ?>
</header>

<body style="background-color:#f5f5f5;">
    <div class="site-index">
        <div class="container mt-2">
            <?php if (isset($_GET['insertMsg'])) { ?>
                <div class="alert alert-success" style="height:0px;">
                <p style="line-height: 0;">
                        <?php echo $_GET['insertMsg']; ?>
                    </p>
                </div>
            <?php } ?>
            <div class="row mt-3">
                <!-- The Left Column -->
                <div class="col-lg-2 mb-3" id="left">

                    <!-- Login/Create link if user is not logged in -->
                    <?php if (!isset($_SESSION['user'])) { ?>
                    <div class="card mb-3 p-2">

                        <?php $data_n = "SELECT * FROM users";
                        $result = mysqli_query($con, $data_n);
                        $count = mysqli_num_rows($result); ?>

                        <h5 style="font-weight:bold;">DEV Community is a community of <?= $count ?> amazing developers
                        </h5>
                        We&apos;re a place where coders share, stay up-to-date and grow their careers.

                        
                            <a href="register.php" class="btn btn-outline-primary">Create Account</a>
                            <a href="login.php" class="btn bg-transparent">Login</a>
                    </div>
                    <?php } ?>
                    <!-- Links -->
                    <div class="mb-3" id="links">
                        <p><a href="index" style="text-decoration:none; color:black;"><i class="bi bi-house-fill me-1"
                                    style="color: blue;"></i>Home<a></p>
                        <p><a href="https://dev.to/++" style="text-decoration:none; color:black;"><i
                                    class="bi bi-chat-left-dots-fill me-1" style="color: green;"></i>Dev++</a></p>

                        <?php if (isset($_SESSION['user'])): ?>
                            <p><a style="text-decoration:none; color:black; font-size:17px;"
                                    href="post.php?id=<?= $_SESSION['user']['id'] ?>"><i
                                        class="bi bi-bookmark-fill me-1"></i>Reading List<span class="p-1 ms-1"
                                        style="border:1px solid gray;border-radius:7px;background-color:gray;">1</span></a>
                            </p>
                        <?php else: ?>
                            <p><i class="bi bi-bookmark-fill me-1"></i>Reading List
                                <span class="p-1" style="border:1px solid gray;border-radius:7px;background-color:gray;">
                                    0</span><br>
                            <?php endif; ?>
                        </p>

                        <p><i class="bi bi-mic-fill me-1" style="color: gray;"></i>Podcasts</p>
                        <p><i class="bi bi-camera-reels-fill me-1"></i>Videos</p>
                        <p><i class="bi bi-tag-fill me-1 " style="color: orange;"></i>Tags</p>
                        <p><a href="https://dev.to/help" style="text-decoration:none; color:black;"><i
                                    class="bi bi-lightbulb-fill me-1" style="color: #FFD983;"></i>Dev Help</a></p>
                        <p><i class="bi bi-bag-fill me-1" style="color: purple;"></i>Forem Shop</p>
                        <p><i class="bi bi-heart-fill me-1" style="color: red;"></i>Advertise on DEV</p>
                        <p><a href="https://dev.to/challenges" style="text-decoration:none; color:black;"><i
                                    class="bi bi-trophy-fill me-1" style="color: #FFCC4D;"></i>DEV Challenges</a></p>
                        <p><i class="bi bi-stars me-1" style="color: gold;"></i>Dev Showcase</p>
                        <p><i class="bi bi-info-lg me-1"></i>About<br></p>
                        <p><i class="bi bi-telephone-fill me-1" style="color:green"></i>Contact</p>
                        <p><i class="bi bi-database me-1" style="color: purple;"></i>Free Postgres Database</p>
                        <p><a href="https://dev.to/guides" style="text-decoration:none; color:black;"><i
                                    class="bi bi-book-fill me-1" style="color: gray;"></i>Guides</a></p>
                        <p><i class="bi bi-emoji-smile-fill me-1" style="color:orange;"></i>Software comparisons</p>
                        <br>
                        <label for="other"><b>Other</b></label>
                        <div id="other">
                            <p><a href="https://dev.to/code-of-conduct" style="text-decoration:none; color:black;"><i
                                        class="bi bi-hand-thumbs-up-fill me-1" style="color:orange;"></i>Code of
                                    Conduct</a></p>
                            <p><a href="https://dev.to/privacy" style="text-decoration:none; color:black;"><i
                                        class="bi bi-emoji-sunglasses-fill me-1" style="color:blue;"></i>Privacy
                                    Policy</a></p>
                            <p><a href="https://dev.to/terms" style="text-decoration:none; color:black;"><i
                                        class="bi bi-eye-fill me-1" style="color:black;"></i>Terms of use</a></p>
                        </div>
                    </div>

                    <!-- Social Media -->
                    <div class="mb-3" id="media">
                        <a href="https://x.com/thepracticaldev" style="text-decoration:none; color:black;"><i
                                class="bi bi-twitter-x"></i></a> &nbsp;
                        <a href="https://www.facebook.com/thepracticaldev" style="text-decoration:none; color:black;"><i
                                class="bi bi-facebook"></i></a> &nbsp;
                        <a href="https://github.com/forem" style="text-decoration:none; color:black;"><i
                                class="bi bi-github"></i></a> &nbsp;
                        <a href="https://www.instagram.com/thepracticaldev/"
                            style="text-decoration:none; color:black;"><i class="bi bi-instagram"></i></a> &nbsp;
                        <a href="https://www.twitch.tv/thepracticaldev" style="text-decoration:none; color:black;"><i
                                class="bi bi-twitch"></i></a> &nbsp;
                        <a href="https://fosstodon.org/@thepracticaldev" style="text-decoration:none; color:black;"><i
                                class="bi bi-mastodon"></i></a>
                    </div>

                    <!-- Popular tags list -->
                    <?php if (!isset($_SESSION['user'])) { ?>
                        <label for="ptags"><b>Popular Tags</b></label>
                        <div class="mb-3 tag-list" id="ptags" style="max-height: 200px; overflow-y: auto; padding: 10px;">
                            <ul style="list-style-type: none; padding-left: 0;">
                                <a>
                                    <li style="margin-bottom: 8px;">#webdev</li>
                                </a>
                                <a>
                                    <li style="margin-bottom: 8px;">#javascript</li>
                                </a>
                                <a>
                                    <li style="margin-bottom: 8px;">#beginners</li>
                                </a>
                                <a>
                                    <li style="margin-bottom: 8px;">#programming</li>
                                </a>
                                <a>
                                    <li style="margin-bottom: 8px;">#tutorial</li>
                                </a>
                                <a>
                                    <li style="margin-bottom: 8px;">#react</li>
                                </a>
                                <a>
                                    <li style="margin-bottom: 8px;">#ai</li>
                                </a>
                                <a>
                                    <li style="margin-bottom: 8px;">#devops</li>
                                </a>
                                <a>
                                    <li style="margin-bottom: 8px;">#python</li>
                                </a>
                                <a>
                                    <li style="margin-bottom: 8px;">#opensource</li>
                                </a>
                                <a>
                                    <li style="margin-bottom: 8px;">#productivity</li>
                                </a>
                                <a>
                                    <li style="margin-bottom: 8px;">#aws</li>
                                </a>
                                <a>
                                    <li style="margin-bottom: 8px;">#node</li>
                                </a>
                                <a>
                                    <li style="margin-bottom: 8px;">#css</li>
                                </a>
                                <a>
                                    <li style="margin-bottom: 8px;">#career</li>
                                </a>
                            </ul>
                        </div>
                    <?php } else { ?>
                        <label for="mtags"><b>My Tags</b></label>
                        <div class="mb-3 tag-list" id="mtags" style="max-height: 200px; overflow-y: auto; padding: 10px;">
                            <ul style="list-style-type: none; padding-left: 0;">
                                <a>
                                    <li style="margin-bottom: 8px;">#webdev</li>
                                </a>
                                <a>
                                    <li style="margin-bottom: 8px;">#javascript</li>
                                </a>
                                <a>
                                    <li style="margin-bottom: 8px;">#beginners</li>
                                </a>
                                <a>
                                    <li style="margin-bottom: 8px;">#programming</li>
                                </a>
                                <a>
                                    <li style="margin-bottom: 8px;">#tutorial</li>
                                </a>
                                <a>
                                    <li style="margin-bottom: 8px;">#react</li>
                                </a>
                                <a>
                                    <li style="margin-bottom: 8px;">#ai</li>
                                </a>
                                <a>
                                    <li style="margin-bottom: 8px;">#devops</li>
                                </a>
                                <a>
                                    <li style="margin-bottom: 8px;">#python</li>
                                </a>
                                <a>
                                    <li style="margin-bottom: 8px;">#opensource</li>
                                </a>
                                <a>
                                    <li style="margin-bottom: 8px;">#productivity</li>
                                </a>
                                <a>
                                    <li style="margin-bottom: 8px;">#aws</li>
                                </a>
                                <a>
                                    <li style="margin-bottom: 8px;">#node</li>
                                </a>
                                <a>
                                    <li style="margin-bottom: 8px;">#css</li>
                                </a>
                                <a>
                                    <li style="margin-bottom: 8px;">#career</li>
                                </a>
                            </ul>
                        </div>
                    <?php } ?>

                    <!-- Advertisement -->
                    <!-- <div class="card mb-3" id="oneb"></div>
                <div class="card mb-3" id="twob"></div> -->

                    <div id="credits" style="font-size: 13px; color: gray;">
                        <a href="site/index">DEV Community</a> A constructive and inclusive social network for software
                        developers.
                        With you every step of your journey.<br><br>
                        Built on <a href="https://www.forem.com/">Forem</a> — the <a
                            href="https://dev.to/t/opensource">open source</a>
                        software that powers <a href="site/index">DEV</a> and other inclusive communities.<br><br>
                        Made with love and <a href="https://dev.to/t/rails">Ruby on Rails</a>. DEV Community © 2016 -
                        2024.
                    </div>
                </div>

                <!-- The Middle Column -->
                <div class="col-lg-7 mb-3" id="middle">

                    <div class="mt-2 mb-3 ms-2">
                        <a href="index.php" class="me-3" style="text-decoration:none;color:black;font-size:19px;cursor:pointer;">Relevant</a>
                        <a href="latest.php" class="me-3" style="text-decoration:none;color:black;font-weight:bold;font-size:19px;cursor:pointer;">Latest</a>
                        <a href="top.php" style="text-decoration:none;color:black;font-size:19px;cursor:pointer;">Top</a>
                    </div>

                    <!-- Advertisement -->
                    <div class="card mb-2 p-4" id="adv">
                        <div class="d-flex justify-content-between">
                            <span><i class="bi bi-person-raised-hand" style="color:orange;"></i>DEV Challenges</span>
                            <div>
                                <span>...</span>
                                <button type="button" id="btnc" class="btn btn-close"></button>
                            </div>
                        </div>

                        <div class="card-body ms-2">

                            <a href="https://dev.to/devteam/introducing-dev-2k6d?bb=160597">
                                <img class="mb-3" src="/dev/assets/img/dev.png"
                                    style="width: 100%; height: auto; border-radius:10px;">
                            </a>
                            <h3><b>Heads up</b></h3>

                            <a href="https://dev.to/devteam/introducing-dev-2k6d?bb=160597"
                                style="text-decoration:none; color:black;">
                                <div class="card mb-3">
                                    <div class="p-3 d-flex" style="background-color:white;">
                                        <div class="d-flex justify-content-between align-items-start">
                                            <div class="me-2">
                                                <img class="mb-3" src="/dev/assets/img/dev_logo.png"
                                                    style="height: 30px; width:35px;">
                                            </div>
                                            <div>
                                                <h5>Introducing DEV++</h5>
                                                <p style="font-size:15px; color:gray;">Ben Halpern for The DEV Team.<br>
                                                    #these #are #tags</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <span>Happy Coding <i class="bi bi-heart-fill" style="color: red;"></i></span>
                        </div>
                    </div>

                    <!-- Posts -->
                    <?php
                    $data_n = "SELECT * FROM posts ORDER BY created_at DESC";
                    $result = mysqli_query($con, $data_n);

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {

                            $sel = "SELECT * FROM users WHERE id = $row[user_id]";
                            $sol = mysqli_query($con, $sel);
                            $user = mysqli_fetch_assoc($sol);
                            ?>
                            <div class="card mb-2">
                                <!--Post image-->
                                <div>
                                    <img class="mb-3" src="<?= $row['post_image'] ?>"
                                        style="width:100%; max-height:200px; object-fit:cover;" alt="post image">
                                </div>
                                <!-- Post details -->
                                <div class="card-header mt-2" style="border:none; background-color:white;">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <!-- Profile image -->
                                            <img class="me-1" src="<?= $user['profile_image'] ?>"
                                                style="width: 35px; height: 35px; border-radius:50%;" alt="profile image">
                                        </div>
                                        <div class="ms-1" style="line-height:1;">
                                            <span style="font-size: 15px;">
                                                <?= $user['username'] ?><br>
                                                <?= $row['created_at'] ?>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <!-- Post -->
                                <div class="card-body p-1 ms-5">
                                    <div>
                                        <!-- Link to read view of a post with it's id -->
                                        <a href="read.php?id=<?= $row['id'] ?>" style="color:green;">
                                            <h4 style="text-decoration:none; color:black;font-weight:bold;font-size:35px;">
                                                <?= $row['title'] ?>
                                            </h4>
                                        </a>

                                        <p>#this #space #is #for #tags</p>

                                        <div class="d-flex justify-content-between mb-3">
                                            <!-- Post Reactions -->
                                            <div>
                                                <!-- Count the likes, comments and bookmarks -->
                                                <?php $post_id = $row['id'];
                                                $sel = "SELECT 
                                                        (SELECT COUNT(*) FROM likes WHERE post_id = '$post_id') AS total_likes,
                                                        (SELECT COUNT(*) FROM comments WHERE post_id = '$post_id') AS total_comments,
                                                        (SELECT COUNT(*) FROM bookmarks WHERE post_id = '$post_id') AS total_bookmarks";

                                                $sol = mysqli_query($con, $sel);
                                                $reactions = mysqli_fetch_assoc($sol);


                                                $total_likes = $reactions['total_likes'];
                                                $total_comments = $reactions['total_comments'];
                                                $total_bookmarks = $reactions['total_bookmarks']; ?>

                                                <!-- Show likes if a post has likes -->
                                                <div>
                                                    <!-- Show likes if a post has likes -->
                                                    <?php if ($total_likes > 0) { ?>
                                                        <i class="bi bi-heart-fill" style="color:red;"></i>
                                                        <?= $total_likes ?>
                                                        <a class="me-3" href="read.php?id=<?= $post_id ?>"
                                                            style="text-decoration:none; color:black;">Reactions</a>
                                                    <?php } ?>
                                                    <!-- Show comments if a post has comments -->
                                                    <?php if ($total_comments > 0): ?>
                                                        <i class="bi bi-chat"></i>
                                                        <?= $total_comments ?>
                                                        <!-- show 'comment' or 'comments' depending on the number of comments -->
                                                        <a class="me-3" href="read.php?id=<?= $post_id ?>"
                                                            style="text-decoration:none; color:black;">Comment
                                                            <?php if ($total_comments > 1) { ?>
                                                                s
                                                            <?php } ?>
                                                        </a>
                                                    <?php else: ?>
                                                        <!-- Direct user to read view to comment if none are available -->
                                                        <a class="ms-1" href="read.php?id=<?= $post_id ?>"
                                                            style="text-decoration:none; color:black;">Add Comment</a>
                                                    <?php endif; ?>
                                                </div>
                                            </div>

                                            <!-- Bookmark button for each post -->
                                            <div class="me-5">
                                                <?php // Check if the user has bookmarked the post
                                                        $check_bkmk = "SELECT id FROM bookmarks WHERE user_id = '$user_id' AND post_id = '$post_id'";
                                                        $bkmk_query = mysqli_query($con, $check_bkmk);
                                                        $user_bkmk = mysqli_num_rows($bkmk_query) > 0; ?>

                                                <?php if (isset($_SESSION['user']['id'])): ?>
                                                    <form action="bookmark.php" method="POST">
                                                        <input type="hidden" name="post_id" value="<?= $post_id ?>">
                                                        <button type="submit"
                                                            style="background: none; border: none; padding: 0; cursor: pointer;">
                                                            <i style="opacity: 1;" id="mark"
                                                                class="<?= $user_bkmk ? 'bi-bookmark-fill bkmk-icon' : 'bi-bookmark unbkmk-icon' ?>"
                                                                data-id="<?= $post_id ?>"></i>
                                                        </button>
                                                    </form>
                                                <?php else: ?>
                                                    <!-- Change bookmark style if it has been bookmarked by the current user -->
                                                    <a href="login.php" style="text-decoration:none; color:black;"><i
                                                            class="bi bi-bookmark"></i></a>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    } else {
                        echo "No data found";
                    }
                    ?>
                </div>

                <!-- The Right Column -->
                <div class="col-lg-3" id="right">
                    <!-- First Partition -->
                    <div class="card mb-3 p-2">
                        <div class="d-flex justify-content-between align-items-center">
                            <span><i class="bi bi-person-raised-hand" style="color:orange;"></i>What's happening this
                                week</span>
                            <div class="d-flex align-items-center">
                                <span>...</span>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5>Challenges <i class="bi bi-emoji-wink-fill" style="color:orange;"></i></h5>

                            <div class="card mb-2 p-2" style="border:2px solid black;">
                                <label for="lone">Announcement 1</label>
                                <ul id="lone">
                                    <li>This is happening</li>
                                    <li>This is happening</li>
                                </ul>
                            </div>

                            <div class="card mb-2 p-2" style="border:2px solid black;">
                                <label for="ltwo">Announcement 2</label>
                                <ul id="ltwo">
                                    <li>This is happening</li>
                                    <li>This is happening</li>
                                </ul>
                            </div>

                            <p>Have a great week <i class="bi bi-heart-fill" style="color: red;"></i></p>
                        </div>
                    </div>

                    <!-- Second Partition -->
                    <div class="card mb-3 p-2">
                        <label for="discuss"><b>#Discuss</b></label>
                        <p id="discuss">Discussion threads targeting the whole community</p>
                        <hr>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                            labore et
                            dolore magna aliqua.</p>
                        <hr>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                            labore et
                            dolore magna aliqua.</p>
                        <hr>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                            labore et
                            dolore magna aliqua.</p>
                    </div>

                    <!-- Third Partition -->
                    <div class="card mb-3 p-2">
                        <label for="ligth"><b>#WaterCooler</b></label>
                        <p id="light">Light, and off-topic conversation.</p>
                        <hr>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                            labore et
                            dolore magna aliqua.</p>
                        <hr>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                            labore et
                            dolore magna aliqua.</p>
                        <hr>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                            labore et
                            dolore magna aliqua.</p>
                    </div>

                    <!-- Fourth Partition -->
                    <label for="res"><b>trending guides/resources</b></label>
                    <div class="mb-3 p-2" id="res">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                            labore et
                            dolore magna aliqua.</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                            labore et
                            dolore magna aliqua.</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                            labore et
                            dolore magna aliqua.</p>
                    </div>
                    <hr>

                    <!-- Fifth Partition -->
                    <label for="recent"><b>recently queried</b></label>
                    <div class="mb-3 p-2" id="recent">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                            labore et
                            dolore magna aliqua.</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                            labore et
                            dolore magna aliqua.</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                            labore et
                            dolore magna aliqua.</p>
                    </div>
                    <hr>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>