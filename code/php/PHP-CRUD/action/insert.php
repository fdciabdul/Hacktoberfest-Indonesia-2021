<?php
include("../config/database.php");
// cek apakah tombol save sudah diklik atau blum?
if(isset($_POST['save'])){
// ambil data dari formulir
$name = $_POST['name'];
$email = $_POST['email'];
$address = $_POST['address'];
$message = $_POST['message'];

// buat query
$sql = "INSERT INTO users (name,email,address,message)
VALUES ('$name', '$email', '$address', '$message');";
$query = mysqli_query($db, $sql);
// apakah query simpan berhasil?
if( $query ) {
// kalau berhasil alihkan ke halaman index.php dengan

$flashdata = "success";

header('Location: ../index.php?flashdata=success');
}else{
// kalau gagal alihkan ke halaman indek.php dengan

$flashdata = "failed";

header('Location: ../index.php?flashdata=failed');
}
}
?>
