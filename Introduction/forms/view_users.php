<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>View Users</title>
  </head>
  <body>
    <div class="container">
      <h2 class="mb-3 mt-3">Users</h2>
      <hr class="mb-5">
      <?php if(isset($_GET['insertMsg'])){?>
        <div class="alert alert-success">
          <p>
            <?php echo $_GET['insertMsg']; ?>
          </p>
        </div>
      <?php } ?>
  <?php
    require "conn.php";
  $data = "SELECT * FROM users";
  $result = mysqli_query($con,$data);

  if(mysqli_num_rows($result) > 0){?>

  <table class="table table-bordered table-striped">
      <thead>
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Registered on</th>
            <th>Edit</th>
        </tr>
      </thead>

      <tbody>
  <?php
     while($row = mysqli_fetch_assoc($result)){?>
      <tr>
         <td><?php echo $row['id'] ?></td>
         <td><?php echo $row['first_name'] . " " . $row['last_name'] ?></td>
         <td><?php echo $row['email'] ?></td>
         <td><?php echo $row['phone'] ?></td>
         <td><?php echo $row['address'] ?></td>
         <td><?php echo $row['created_at'] ?></td>
         <td><a href="view.php?id=<?=$row['id']?>" style="color:green;">View</a>&nbsp;&nbsp;
         <a href="update.php?id=<?=$row['id']?>" style="color:blue;">Edit</a>&nbsp;&nbsp;
         <a href="delete.php?id=<?=$row['id']?>" style="color:red;" id="btn-delete" onclick="return confirm('Are you sure you want to delete?')">Delete</a></td>
      </tr>
      <?php } ?>
    </tbody>
     
     </table>
 <?php }
  else{
      echo "No data found";
  }
?>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>