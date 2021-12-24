
<?php
include "page/koneksi.php";
if($_POST)
{
	$nip =$_POST['NIP'];
	$nama =$_POST['Nama'];
    $tgllahir =$_POST['Tanggal_Lahir'];
    $gol =$_POST['Gol'];
	$pangkat =$_POST['Pangkat'];
	$divisi =$_POST['divisi_pengunggah'];
	
	$query = ("INSERT INTO pegawai(NIP, Nama, Tanggal_Lahir, Gol, Pangkat, divisi_pengunggah) 
			VALUES ('".$nip."','".$nama."','".$tgllahir."','".$gol."','".$pangkat."','".$divisi."')");
	$simpan = mysqli_query($koneksi,$query);

	if($simpan){
		echo "<script> alert('Data berhasil ditambahkan'</script>";
		echo "<script type='text/javascript'> document.location ='index2.php?page=upload_pegawai2' </script>";
	} else{
		echo $query;
	}
	}
	?>