<?php
include "page/koneksi.php";
if($_POST)
{    
    $id =$_POST['id_divisi'];
    $nama =$_POST['nama_divisi'];

    $query =("INSERT INTO db_divisi (id_divisi, nama_divisi)
            VALUES ('".$id."','".$nama."')");
    
    $simpan = mysqli_query($koneksi,$query);

if($simpan){
    echo "<script> alert('Data berhasil ditambahkan'</script>";
    echo "<script type='text/javascript'> document.location ='index.php?page=data_divisi'; </script>";
} else{
    echo '<script>alert("ID DIVISI sudah digunakan!!, silahkan ganti ID !!!");
	window.location.href="index.php?page=data_divisi"</script>';
}
}
?>


