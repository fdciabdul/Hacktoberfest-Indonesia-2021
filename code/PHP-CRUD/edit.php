<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>New User</title>
</head>
<body>
  <header>
    <h3>New User</h3>
  </header>
  <?php
  include("./config/database.php");
  // kalau tidak ada id di query string
  if( !isset($_GET['id_user']) ){
  header('Location: list.php');
  }
  //ambil id dari query string
  $id_user = $_GET['id_user'];
  // buat query untuk ambil data dari database
  $sql = "SELECT * FROM users WHERE id_user=$id_user";
  $query = mysqli_query($db, $sql);
  $row = mysqli_fetch_assoc($query);
  // jika data yang di-edit tidak ditemukan
  if( mysqli_num_rows($query) < 1 ){
  die("data not found...");
  }
  ?>
  <form action="./action/update.php" method="POST">
    <div class="form-group">
      <input type="hidden" name="id_user" value="<?php echo $row['id_user'] ?>" />
      <label for="name">Name: </label>
      <input type="text" name="name" placeholder="Name" value="<?php echo $row['name'] ?>">
    </div>
    <div class="form-group">
      <label for="email">email: </label>
      <input type="email" name="email" placeholder="email" value="<?php echo $row['email'] ?>">
    </div>
    <div class="form-group">
      <label for="address">address: </label>
      <textarea name="address"><?php echo $row['address'] ?></textarea>
    </div>
    <div class="form-group">
      <label for="message">message: </label>
      <textarea name="message"><?php echo $row['message'] ?></textarea>
    </div>
    <input type="submit" value="update" name="update" />
  </form>
  <style>
  .form-group{
    margin-top: 10px;
    margin-bottom: 10px;
  }
</style>
</body>
</html>
