<?php

if(isset($_POST['submit'])){
   $NIP = $_POST['NIP'];
   $Nama = $_POST['Nama'];
   $Pangkat = $_POST['Pangkat'];
   $TMT_Pangkat= $_POST['TMT_Pangkat'];

   $sql = mysqli_query($koneksi, "UPDATE pangkat SET NIP='$NIP', Nama='$Nama', Pangkat='$Pangkat', TMT_Pangkat='$TMT_Pangkat' 
                         WHERE NIP ='$NIP'")or die(mysqli_error($koneksi));

        
if($sql){
   echo "<script type='text/javascript'> document.location ='index2.php?page=dok_pangkat2' </script>";
}else{
   echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
}
}
?>