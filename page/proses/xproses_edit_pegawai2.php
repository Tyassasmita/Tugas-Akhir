<?php

if(isset($_POST['submit'])){
   $NIP = $_POST['NIP'];
	$Nama = $_POST['Nama'];
	$Tanggal_Lahir = $_POST['Tanggal_Lahir'];
	$Gol = $_POST['Gol'];
   $Pangkat = $_POST['Pangkat'];
   $divisi_pengunggah= $_POST['divisi_pengunggah'];

   $sql = mysqli_query($koneksi, "UPDATE pegawai SET NIP='$NIP', Nama='$Nama' ,Tanggal_Lahir='$Tanggal_Lahir' ,Gol='$Gol' ,Pangkat='$Pangkat', divisi_pengunggah='$divisi_pengunggah' 
                         WHERE NIP ='$NIP'")or die(mysqli_error($koneksi));

        
if($sql){
   echo "<script type='text/javascript'> document.location ='index2.php?page=dok_pegawai2' </script>";
}else{
   echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
}
}
?>