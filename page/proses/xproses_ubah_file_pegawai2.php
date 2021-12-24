<?php
 
// koneksi ke mysql 
include "page/koneksi.php";
 
// membaca tanggal sekarang
$tanggal = date("Y-m-d H:i:s");
 
// membaca ID file yang akan diupdate
$id_file = $_POST['id_file'];
 
 
  // membaca nama file
  $fileName = $_FILES['upload']['nama_file'];     
  
  // membaca nama file temporary
  $tmpName  = $_FILES['upload']['tmp_name']; 
  
  // membaca tipe file
  $nip = $_FILES['upload']['NIP'];
  
  // membaca isi file yang diupload
  $fp      = fopen($tmpName, 'r');
  $content = fread($fp, filesize($tmpName));
  $content = addslashes($content);
  fclose($fp);
   
  // query SQL untuk update data file
  
  $query = "UPDATE dokumen_filepegawai 
            SET nama_file = '$fileName', NIP = '$nip', file = '$content', 
                tanggal = '$tanggal'
            WHERE NIP = '$nip'";
 
// jalankan query update          
$hasil = mysqli_query($koneksi,$query);
 
// konfirmasi proses upload
if ($hasil)  echo "<p>Berhasil diupdate</p>";
else echo "<p>Gagal diupdate</p>";
  
?>