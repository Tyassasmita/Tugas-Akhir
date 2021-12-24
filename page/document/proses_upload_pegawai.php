<?php
require_once "../koneksi.php";
date_default_timezone_set('Asia/Jakarta');
if(ISSET($_POST['submit'])){
	if($_FILES['upload']['name'] != "") {
		$tanggal = date('Y-m-d H:i:s');
		$file = $_FILES['upload'];
		$file_name = $file['name'];
		$file_temp = $file['tmp_name'];
		$name = explode('.', $file_name);
		$path = "filespegawai/".$file_name;
		$nip = 	$_POST['nip'];
		$keterangan = 	$_POST['keterangan'];
		$jenisdokumen_id = 	$_POST['jenisdokumen_id'];
		
		$koneksi->query("INSERT INTO `dokumen_file` VALUES('', '$name[0]', '$nip','$path','$tanggal','$keterangan','$jenisdokumen_id')") or die(mysqli_error());
		
		move_uploaded_file($file_temp, $path);
		header("location:../../index.php?page=dok_pegawai");
		
	}else{
		echo "<script>alert('Required Field!')</script>";
		echo "<script>window.location='../../index.php?page=upload_pegawai'</script>";
	}
}
?>
