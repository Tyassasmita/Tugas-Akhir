<?php
	session_start();
    include "page/koneksi.php";
    $id_file = $_GET['id_file'];
	
	$sql= ("DELETE FROM dokumen_file WHERE id_file = '$id_file'");

	mysqli_query($koneksi, $sql);
		
	echo "<script> alert('Data berhasil dihapus'</script>";
	echo "<script type='text/javascript'> document.location='index.php?page=dok_pangkat' </script>";
?>
