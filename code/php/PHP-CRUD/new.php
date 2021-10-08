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
  <form action="./action/insert.php" method="POST">
    <div class="form-group">
      <label for="name">Name: </label>
      <input type="text" name="name" placeholder="Name">
    </div>
    <div class="form-group">
      <label for="email">email: </label>
      <input type="email" name="email" placeholder="email">
    </div>
    <div class="form-group">
      <label for="address">address: </label>
      <textarea name="address"></textarea>
    </div>
    <div class="form-group">
      <label for="message">message: </label>
      <textarea name="message"></textarea>
    </div>
    <input type="submit" value="save" name="save" />
  </form>
  <style>
  .form-group{
    margin-top: 10px;
    margin-bottom: 10px;
  }
</style>
</body>
</html>
