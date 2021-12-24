<?php
  $sql1 = "SELECT * FROM db_divisi";
  $che1 = mysqli_query($koneksi, $sql1);
?>

<?php
  $sql2 = "SELECT * FROM tb_pangkat";
  $che2 = mysqli_query($koneksi, $sql2);
?>

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
    <h4 class="modal-title">Edit Data Pegawai</h4>
</div>
<form role="form" method ="POST" action="index.php?page=proses_edit_pegawai">
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
        
        <div class="form-group">
            <label for="InputPangkat">Pangkat</label>
                <select name="pangkat_id" id="pangkat_id" class="form-control" required>
                <option value="">-Pilih Divisi-</option>
                    <?php while($row2 = mysqli_fetch_assoc($che2)) { ?>
                        <option value="<?php echo $row2['id_pangkat']; ?>" <?php if ($row2['id_pangkat'] === $e['pangkat_id']) echo'selected' ?>>
                    <?php echo $row2['pangkat']; ?>
                </option>
                <?php } ?>                        
            </select>
        </div>
        <div class="form-group">
            <label for="InputTMT">TMT Pangkat</label>
            <input type="date" class="form-control" name="TMT_Pangkat" id="TMT_Pangkat" value="<?php echo $e['TMT_Pangkat']; ?>" placeholder="TMT_Pangkat" required>
            
        </div>
         <div class="form-group">
            <label for="InputDivisi">Divisi</label>
            <select name="divisi_id" id="divisi_id" class="form-control">
            <option value="">-Pilih Divisi-</option>
                <?php while($row = mysqli_fetch_assoc($che1)) { ?>
                    <option value="<?php echo $row['id_divisi']; ?>" <?php if($row['id_divisi'] === $e['divisi_id']) echo 'selected' ?>>
                <?php echo $row['nama_divisi']; ?>
            </option>
            <?php } ?>
            </select>
        </div>        
        
      </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" name="submit" class="btn btn-primary">SIMPAN</button>
            <a href="index.php?page=dok_pegawai" class="btn btn-danger" >BATAL</a>
        </div>
</form>
