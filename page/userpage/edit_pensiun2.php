<?php include('page/koneksi.php'); ?>
		<?php
        //jika sudah mendapatkan parameter GET nip dari URL
        if(isset($_GET['NIP'])){
            //membuat variabel $nip untuk menyimpan nip dari GET id di URL
            $NIP = $_GET['NIP'];

            //query ke database SELECT tabel pegawai berdasarkan nip = $nip
            $select = mysqli_query($koneksi, "SELECT * FROM pegawai  WHERE NIP ='$NIP'") or die(mysqli_error($koneksi));
            
            //jika hasil query = 0 maka muncul pesan error
            if(mysqli_num_rows($select) == 0){
				echo '<div class="alert alert-warning">ID tidak ada dalam database.</div>';
				exit();
            //jika hasil query > 0
            }else{
                //membuat variabel $data dan menyimpan data row dari query
                $e = mysqli_fetch_assoc($select);
			}
		}
		?>

<div class="modal-header">
    <h4 class="modal-title">Form Edit Data Pensiun</h4>
</div>
<form role="form" method ="POST" action="index2.php?page=proses_edit_pensiun2">
<div class="card-body">
        <div class="form-group">
            <label for="InputNIP">NIP</label>
            <input type="text" class="form-control" name="NIP" id="NIP" value="<?php echo $e['NIP']; ?>"  placeholder="NIP" readonly required>
        </div> 
        <div class="form-group">
            <label for="InputNama">Nama</label>
            <input type="text" class="form-control" name="Nama" id="Nama" value="<?php echo $e['Nama']; ?>" placeholder="Nama" required>
        </div>
         <div class="form-group">
              <label for="InputTanggal">Tanggal Lahir</label>
              <input type="date" class="form-control" name="Tanggal_Lahir" id="Tanggal_Lahir" value="<?php echo $e['Tanggal_Lahir']; ?>" placeholder="Tanggal_Lahir" required>
          </div>  
          
      </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" name="submit" class="btn btn-primary">SIMPAN</button>
            <a href="index2.php?page=dok_pensiun2" class="btn btn-danger" >BATAL</a>
        </div>
</form>
