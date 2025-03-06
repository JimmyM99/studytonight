<?php
require 'conn.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" type="image/png" href="assets/img/dev_logo.png" style="border: 1px solid black;">
    <title>Post</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</head>
<header class="mb-5">
    <?php require 'navbar.php'; ?>
    </header>
<body class="p-5" style="background-color:#f5f5f5;">
    <div class="container mt-5">
    <div class="site-info d-flex justify-content-center">

        <!-- Post form -->
        <div>
            <form action="post_process.php" method="POST" enctype="multipart/form-data" id="post-form">
                <label for="post_image" class="col-sm-3 col-form-label" style="font-weight:bold; font-size:18px;">Post Image: </label>
                <input type="file" name="post_image" placeholder="Post pic..." class="form-control p-3" id="sub">

                <hr>

                <label for="title" class="col-sm-3 col-form-label" style="font-weight:bold; font-size:18px;">Title:</label>
                <input type="text" name="title" placeholder="Title..." class="form-control"
                    style="font-weight:bold;font-size:50px;" id="title" required>

                <label for="content" class="col-sm-3 col-form-label" style="font-weight:bold; font-size:18px;">Content:</label>
                <textarea cols="80" rows="10" name="content" class="form-control" form="post-form" placeholder="Post content..."
                style="font-weight:bold;font-size:20px;" id="post" required></textarea>

                <button class="btn btn-primary mt-3 form-control" name="submit">Post</button>
            </form>
        </div>
        <div class="mt-5 p-3" style="visibility:none; width:800px;" id="wr">
            <label for="w"><b>Write a Great Post Title</b></label>
            <ul id="w">
                <li>
                    Think of your post title as a super short (but compelling!) description —
                    like an overview of the actual post in one short sentence.
                </li>
                <li>
                    Use keywords where appropriate to help ensure people can find your post by search.
                </li>
            </ul>
        </div>

        <div class="mt-5 p-3" style="display:none; width:800px;" id="ed">
            <label for="e"><b>Editor Basics</b></label>
            <ul id="e">
                <li>
                    Use Markdown to write and format posts.
                </li>
                <li>
                    Embed rich content such as Tweets, YouTube videos, etc.
                    Use the complete URL: {% embed https://... %}. See a list of supported embeds.
                </li>
                <li>
                    In addition to images for the post's content, you can also drag and drop a cover image.
                </li>
            </ul>
        </div>

        <div class="mt-5 p-3" style="display:none; width:800px;" id="pb">
            <label for="p"><b>Publishing Tips</b></label>
            <ul id="p">
                <li>
                    Ensure your post has a cover image set to make the most of
                    the home feed and social media platforms.
                </li>
                <li>
                    Share your post on social media platforms or with your co-workers or local communities.
                </li>
                <li>
                    Ask people to leave questions for you in the comments. It's a great way to spark additional
                    discussion describing personally why you wrote it or why people might find it helpful.
                </li>
            </ul>
        </div>
    </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
$(document).ready(function () {
        $('#title').on('click', function (e) {
            $('#wr').show();
            $('#ed').hide();
            $('#pb').hide();
        });

        $('#post').on('click', function (e) {
            $('#ed').show();
            $('#wr').hide();
            $('#pb').hide();
        });

        $('#sub').hover(function (e) {
            $('#pb').show();
            $('#wr').hide();
            $('#ed').hide();
        });
    });
    </script>