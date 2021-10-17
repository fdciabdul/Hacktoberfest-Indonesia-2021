<?php

if(@$_POST['submit']){
	$namafile = $_FILES['gambar']['name'];
	$tmpfile = $_FILES['gambar']['tmp_name'];
	if($upload = move_uploaded_file($tmpfile, $namafile)){
		echo "sip";
	}else{
    echo "gagal";
  }
}
?>
<form enctype="multipart/form-data" method="post">
	<input type="file" name="gambar">
	<input type="submit" name="submit" value="submit">
</form>
