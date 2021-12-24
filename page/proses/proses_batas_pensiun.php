<?php

if(isset($_POST['submit'])){
   $usia_pensiun = $_POST['usia_pensiun'];


   $sql = mysqli_query($koneksi, "UPDATE pengaturan_pensiun SET usia_pensiun='$usia_pensiun'")or die(mysqli_error($koneksi));

        
if($sql){
   echo "<script type='text/javascript'> document.location ='index.php?page=pengaturan_pensiun' </script>";
}else{
   echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
}
}
?>