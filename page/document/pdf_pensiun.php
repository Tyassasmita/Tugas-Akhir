<style type="text/css">
.tulisan_kiri{
	text-align: left;
}
.tulisan_kanan{
	text-align: right;
}
.tulisan_tengah{
	text-align: center;
}
.tulisan_justify{
	text-align: justify;
}
</style>

<!DOCTYPE html>
<html>
<head>
	<title>Sekretariat Daerah Kabupaten Wonosobo</title>
</head>
<body>
 
	<center>
 
		<h2>BERKAS PENSIUN PEGAWAI</h2>
 
	</center>
 
 <div>
              <p>
                <?php
                date_default_timezone_set("Asia/Jakarta");
                setlocale(LC_TIME, 'id_ID.utf8');
                $hariIni = new DateTime();
                echo strftime('%A %d %B %Y, %H:%M', $hariIni->getTimestamp()) . '<br>';
                ?>
              </p>
            </div>
	<?php 
	include 'page/koneksi.php';
	?>
 
	<table border="1" style="width: 100%">
		<tr>
			<th width="1%">No</th>
			<th>NIP</th>
			<th>Nama </th>
			<th >Tanggal Lahir</th>
			<th >Pangkat</th>
			<th >Status Pegawai</th>
            
		</tr>
		<?php 
		$no = 1;
        $NIP = $_GET['NIP'];
        $pensiun = mysqli_query($koneksi, "SELECT * FROM pegawai JOIN tb_pangkat ON tb_pangkat.id_pangkat = pegawai.pangkat_id WHERE pegawai.NIP ='$NIP'");
		while($data = mysqli_fetch_array($pensiun)){
		?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $data['NIP']; ?></td>
			<td><?php echo $data['Nama']; ?></td>
			<td><?php echo $data['Tanggal_Lahir']; ?></td>
			<td><?php echo $data['pangkat']; ?></td>
			<td><strong>Pensiun</strong></td>

			
            
		</tr>
		<?php 
		}
		?>
	</table>
    	<table border="0" style="width: 100%">
		<tr></tr>
		<tr>
		<br>
		<br>
		<p class="tulisan_kanan">Mengetahui,</p>
		</tr>
		<tr><th></th></tr>
		<tr><th></th></tr>
		<tr><th></th></tr>
		<tr>
		<br>
		<br>
		<br>
		<br>
		<p class="tulisan_kanan">(.....................................)</p>
		<td></td>
		</tr>
		</table>
 
	<script>
		window.print();
	</script>
 
</body>
</html>