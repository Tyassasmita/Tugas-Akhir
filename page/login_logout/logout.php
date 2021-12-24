<?php 
// mengaktifkan session php
session_start();
 
// menghapus semua session
session_destroy();
 
// mengalihkan halaman ke halaman login
echo '<script>alert("Anda Telah Logout!!!");
	window.location.href="../login_logout/login.php"</script>';
?>