<?php
	session_start();
    include "page/koneksi.php";
    $id_pensiun = $_GET['id_pensiun'];
	
	$sql= ("DELETE FROM pensiun WHERE id_pensiun = '$id_pensiun'");

	mysqli_query($koneksi, $sql);
		
	echo "<script> alert('Data berhasil dihapus'</script>";
	echo "<script type='text/javascript'> document.location='index.php?page=dok_pensiun' </script>";
?>
