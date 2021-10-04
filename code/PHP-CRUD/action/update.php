<?php
include("../config/database.php");
// cek apakah tombol update sudah diklik atau blum?
if(isset($_POST['update'])){
// ambil data dari formulir
$id_user = $_POST['id_user'];
$name = $_POST['name'];
$email = $_POST['email'];
$address = $_POST['address'];
$message = $_POST['message'];

// buat query
$sql = "UPDATE users SET name='$name',email='$email',
address='$address', message='$message' WHERE id_user=$id_user";
$query = mysqli_query($db, $sql);

if( $query ) {

header('Location: ../list.php');
}else{

header('Location: ../list.php');
}
}
?>
