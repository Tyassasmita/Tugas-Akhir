<?php

if(isset($_POST['submit'])){
	 $id_user =$_POST['id_user'];
    $nama =$_POST['nama'];
    $email =$_POST['email'];
    $password =md5($_POST['password']);
    $divisi_id =$_POST['divisi_id'];

	$sql = mysqli_query($koneksi, "UPDATE db_user  SET nama = '$nama', email = '$email',  password = '$password', divisi_id = '$divisi_id' 
      WHERE id_user ='$id_user'") or die(mysqli_error($koneksi));
if($sql){
   echo "<script type='text/javascript'> document.location ='index2.php?page=data_user2' </script>";
}else{
   echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
}
}
?>