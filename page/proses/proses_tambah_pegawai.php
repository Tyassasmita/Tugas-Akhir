
<?php
include "page/koneksi.php";
if($_POST)
{
	$nip =$_POST['NIP'];
	$nama =$_POST['Nama'];
    $tgllahir =$_POST['Tanggal_Lahir'];
	$pangkat =$_POST['pangkat_id'];
	$tmt =$_POST['TMT_Pangkat'];
	$divisi =$_POST['divisi_id'];
	
	$query = ("INSERT INTO pegawai(NIP, Nama, Tanggal_Lahir, pangkat_id,TMT_Pangkat, divisi_id) 
			VALUES ('".$nip."','".$nama."','".$tgllahir."','".$pangkat."','".$tmt."','".$divisi."')");
	$simpan = mysqli_query($koneksi,$query);

	if($simpan){
		echo "<script> alert('Data berhasil ditambahkan'</script>";
		echo "<script type='text/javascript'> document.location ='index.php?page=dok_pegawai' </script>";
	} else{
		echo $query;
	}
	}
	?>