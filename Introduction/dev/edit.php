<?php
session_start();
require 'conn.php';

//getting user information
$id = $_GET['id'];
$query = "SELECT * FROM posts where id ='$id'";
$result = mysqli_query($con, $query);
$data = mysqli_fetch_assoc($result);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" type="image/png" href="assets/img/dev_logo.png" style="border: 1px solid black;">
    <title>Edit Post</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<header class="mb-5">
    <?= require 'navbar.php'; ?>
</header>

<body style="background-color:#f5f5f5;">
    <div class="container justify-content-center d-flex">
        <div class="card p-2" style="background-color:lightgray;">
            <h4 class="text-center">Edit Post inforamtion </h4><br>
            <form action="edit_process.php" method="POST" enctype="multipart/form-data" id="edit-form">
                <input type="hidden" name="post_id" value="<?= $id ?>">

                <!-- Post Image -->
                <input type="file" name="post_image" class="form-control p-3"
                    value="<?php echo htmlspecialchars($data['post_image']); ?>">
                <div class="mb-3 mt-3">
                    <hr>
                </div>

                <!-- Post Title -->
                <label for="title" class="col-sm-3 col-form-label"
                    style="font-weight:bold; font-size:18px;">Title:</label>
                <input type="text" name="title" class="form-control" style="font-weight:bold;font-size:50px;"
                    value="<?php echo htmlspecialchars($data['title']); ?>">
                <br>

                <!-- Post Content -->
                <label for="content" class="col-sm-3 col-form-label"
                    style="font-weight:bold; font-size:18px;">Content:</label>
                <textarea cols="80" rows="10" name="content" class="form-control" form="edit-form"
                    style="font-weight:bold;font-size:20px;"><?php echo htmlspecialchars($data['content']); ?></textarea>

                <div class="text-center">
                    <button class="btn btn-primary w-100 py-3 mt-3" name="submit">Edit</button>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

</body>

</html>