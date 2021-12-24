<?php
include "../koneksi.php";
if($_POST)
{
    $id =$_POST['id_user'];
    $nama =$_POST['nama'];
    $email =$_POST['email'];
    $pass =md5($_POST['password']);
    $divisi =$_POST['divisi_id'];
    

$query = ("INSERT INTO db_user (id_user, nama, email, password,  divisi_id) 
            VALUES ('".$id."','".$nama."','".$email."','".$pass."','".$divisi."')");
   
$simpan = mysqli_query($koneksi,$query);

if($simpan){
    echo "<script> alert('Anda sudah berhasil registrasi'</script>";
    echo "<script type='text/javascript'> document.location ='login.php'; </script>";
} else{
    echo '<script>alert("ID User sudah digunakan !!. Silahkan ganti ID anda !!!");
	window.location.href="../login_logout/registrasi.php"</script>';
}
}
?>

