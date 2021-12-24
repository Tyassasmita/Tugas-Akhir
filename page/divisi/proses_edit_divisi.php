<?php
	//jika tombol simpan di tekan/klik
    if(isset($_POST['submit']))
    {
        $id_divisi =$_POST['id_divisi'];
    	$nama_divisi =$_POST['nama_divisi'];
 
		$sql = mysqli_query($koneksi, "UPDATE db_divisi  SET nama_divisi='$nama_divisi' WHERE id_divisi ='$id_divisi'") or die(mysqli_error($koneksi));

        if($sql){
			echo '<script>alert("Berhasil mengubah data."); document.location="index.php?page=data_divisi";</script>';
		}else{
			echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
		}
	}
?>