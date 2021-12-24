<?php 
	session_start();
	include 'page/koneksi.php';
	
	$sql = "DELETE FROM db_divisi WHERE id_divisi = $_GET[id_divisi]";

	mysqli_query($koneksi, $sql);
	
	echo "<script> alert('Data berhasil dihapus'</script>";
	echo "<script type='text/javascript'> document.location='index.php?page=data_divisi' </script>";
?>