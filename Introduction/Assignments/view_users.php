<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>users</title>
  </head>
  <body>
  <?php
    require "conn.php";
  $data = "SELECT * FROM users";
  $result = mysqli_query($con,$data);

  if(mysqli_num_rows($result) > 0){?>

  <table>
      <thead>
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Password</th>
        </tr>
      </thead>

      <tbody>
  <?php
     while($row = mysqli_fetch_assoc($result)){?>
      <tr>
         <td><?php echo $row['id'] ?></td>
         <td><?php echo $row['first_name'] . " " . $row['last_name'] ?></td>
         <td><?php echo $row['email'] ?></td>
         <td><?php echo $row['password'] ?></td>
      </tr>
      <?php } ?>
    </tbody>
     
     </table>
 <?php }
  else{
      echo "No data found";
  }
?>

</body>
</html>