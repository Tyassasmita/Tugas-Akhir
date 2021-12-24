<?php 
// mengaktifkan session pada php
session_start();
 
// menghubungkan php dengan koneksi database
include '../koneksi.php';
 
// menangkap data yang dikirim dari form login
$nama = $_POST['nama'];
$password = md5($_POST['password']);
 
// menyeleksi data user dengan nama dan password yang sesuai
$login = mysqli_query($koneksi,"SELECT * FROM db_user WHERE nama = '$nama' AND password = '$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);
 
// cek apakah nama dan password di temukan pada database
if($cek > 0){
 
	$data = mysqli_fetch_assoc($login);
 
		// buat session login dan nama
		$_SESSION['nama'] = $nama;
		$_SESSION['divisi_id'] = $row['divisi_id'];
		$_SESSION['role'] = "admin";
		$_SESSION['id_user'] = $row['id_user'];
		
		// alihkan ke halaman dashyehaboard admin
		header("location:../../index.php");
 
	// cek jika user login sebagai pegawai
}else{
	echo '<script>alert("Masukan nama dan Password dengan Benar !!!");
	window.location.href="../login_logout/login.php"</script>';
}
?>