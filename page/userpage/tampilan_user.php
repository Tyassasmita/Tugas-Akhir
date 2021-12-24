<?php 
	include "page/koneksi.php";

	$email = mysqli_real_escape_string($koneksi,htmlentities($_POST['nama']));
	$password = mysqli_real_escape_string($koneksi, htmlentities ($_POST['password']));
	$check    = mysqli_query($koneksi,"SELECT * FROM db_user WHERE nama = '$nama' AND password = '$password'") 
				or die(mysqli_error($koneksi));
		
	if(mysqli_num_rows($check) >= 1){
		while($row = mysqli_fetch_array($check)){			
			session_start();
			$_SESSION['id_user'] = $row['id_user'];
			$_SESSION['divisi_id']= $row['divisi_id'];	
			$_SESSION['nama'] = $row['nama'];
			?>
			<script>alert("Profil <?= $row['nama']; ?> Kamu Telah Login Ke Halaman Admin !!!");
			window.location.href="data_user2.php"</script>
			<?php
			}
		}else{
			echo '<script>alert("Gagal");
		}
?>