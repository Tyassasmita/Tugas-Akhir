<?php
include "page/koneksi.php";
if($_POST)
{
    $nip =$_POST['NIP'];
    $nama =$_POST['Nama'];
    $pangkat =$_POST['Pangkat'];
    $tmt =$_POST['TMT_Pangkat'];
    

$query = ("INSERT INTO pangkat (NIP, Nama, Pangkat, TMT_Pangkat) 
            VALUES ('".$nip."','".$nama."','".$pangkat."','".$tmt."')");
   
$simpan = mysqli_query($koneksi,$query);

if($simpan){
    echo "<script> alert('Data berhasil ditambahkan'</script>";
    echo "<script type='text/javascript'> document.location ='index2.php?page=upload_pangkat2'; </script>";
} else{
    echo $query;
}
}
?>