<?php
require_once "../koneksi.php";
$file = $_GET['file'];

$ext = pathinfo($file, PATHINFO_EXTENSION);

$select = "SELECT * FROM dokumen_file WHERE file ='$file'";
$result = $koneksi->query($select);
while($row = $result->fetch_object()){
  $pdf = $row->nama_file;
  $path = $row->file;
  $date = $row->tanggal;
  $file = $path.$pdf;
}

// if file ext pdf
// Add header to load pdf file
if($ext == 'pdf') {
header('Content-type: application/pdf'); 
header('Content-Disposition: inline; filename="' .$file. '"'); 
header('Content-Transfer-Encoding: binary'); 
header('Accept-Ranges: bytes'); 
@readfile("filespegawai/".$file);
}
else {
  echo '<img src="filespegawai/'.$file. ' " / width="600px" length="50px">';
}

?>