<?php

if(isset($_POST['submit'])){
   $NIP = $_POST['NIP'];
   $Nama = $_POST['Nama'];
   $Tanggal_Lahir = $_POST['Tanggal_Lahir'];

   $sql = mysqli_query($koneksi, "UPDATE pegawai SET NIP='$NIP', Nama='$Nama' ,Tanggal_Lahir='$Tanggal_Lahir'
                         WHERE NIP ='$NIP'")or die(mysqli_error($koneksi));

        
if($sql){
   echo "<script type='text/javascript'> document.location ='index.php?page=dok_pensiun' </script>";
}else{
   echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
}
}
?>