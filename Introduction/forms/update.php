<?php
 require_once "conn.php";
//getting user information
$id = $_GET['id'];
$query = "SELECT * FROM users where id ='$id'";
$result = mysqli_query($con,$query);
$data = mysqli_fetch_assoc($result);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body style="text-align:center">
    <h4>Update User inforamtion </h4>
    <form action="update_process.php" method="post">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($data['id']); ?>">
        <label for="first_name" class="form-label">First Name: </label>
        <input type="text" name="first_name" placeholder="First Name..." class="form-control" value="<?=$data['first_name']?>">

        <label for="last_name" class="form-label">Last Name: </label>
        <input type="text" name="last_name" placeholder="Last Name..." class="form-control" value="<?=$data['last_name']?>">
        
        <label for="email" class="form-label">Email: </label>
        <input type="email" name="email" placeholder="Email..." class="form-control" value="<?=$data['email']?>">
        
        <label for="phone" class="form-label">Phone: </label>
        <input type="tel" name="phone" placeholder="Phone..." class="form-control" value="<?=$data['phone']?>">

        <label for="address" class="form-label">Address: </label>
        <input type="text" name="address"  placeholder="Address..." class="form-control" value="<?=$data['address']?>">

        <button name="update">Update</button>
    </form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- <a href="process.php">Go to process</a> -->
</body>
</html>