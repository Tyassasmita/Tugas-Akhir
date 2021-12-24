<?php
	session_start();
    include "page/koneksi.php";
	
	
	$sql= "DELETE FROM db_user WHERE id_user = $_GET[id_user]";

	mysqli_query($koneksi, $sql);
	
	echo "<script> alert('Data berhasil dihapus'</script>";
	echo "<script type='text/javascript'> document.location='index.php?page=data_user' </script>";
?>
