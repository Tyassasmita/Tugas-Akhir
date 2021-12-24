<?php
	session_start();
    include "page/koneksi.php";
    $NIP = $_GET['NIP'];
	
	$sql= ("DELETE FROM pegawai WHERE NIP = '$NIP'");

	mysqli_query($koneksi, $sql);
		
	echo "<script> alert('Data berhasil dihapus'</script>";
	echo "<script type='text/javascript'> document.location='index.php?page=dok_pegawai' </script>";
?>
