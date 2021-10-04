<?php include("./config/database.php");?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Users</title>
</head>
<body>
    <header>
    <h3>List User</h3>
    </header>
    <nav>
    <a href="new.php">[ + ] New User</a>
    </nav>
    <table border="1">
    <thead>
    <tr>
    <th>ID_User</th>
    <th>Name</th>
    <th>Email</th>
    <th>Address</th>
    <th>Message</th>
    <th>Action</th>
    </tr>
    </thead>
    <tbody>
    <?php
$sql = "SELECT * FROM users";
$query = mysqli_query($db, $sql);
while($row = mysqli_fetch_array($query)){
echo "<tr>";
echo "<td>".$row['id_user']."</td>";
echo "<td>".$row['name']."</td>";
echo "<td>".$row['email']."</td>";
echo "<td>".$row['address']."</td>";
echo "<td>".$row['message']."</td>";
echo "<td>";
echo "<a href='edit.php?id_user=".$row['id_user']."'>Edit</a> | ";
echo "<a href='./action/delete.php?id_user=".$row['id_user']."'>Delete</a>";
echo "</td>";
echo"</tr>";
}
    ?>
    </tbody>
    </table>
</body>
</html>
