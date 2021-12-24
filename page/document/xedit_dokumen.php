<?php
  $sql = "SELECT * FROM jenis_dokumen";
  $che = mysqli_query($koneksi, $sql);
?>

<?php include('page/koneksi.php'); ?>
		<?php
        //jika sudah mendapatkan parameter GET nip dari URL
        if(isset($_GET['id_file'])){
            //membuat variabel $id_file untuk menyimpan id_file dari GET id di URL
            $id_file = $_GET['id_file'];

            //query ke database SELECT tabel pegawai berdasarkan id_file = $id_file
            $select = mysqli_query($koneksi, "SELECT * FROM dokumen_file 
                                            WHERE dokumen_file.id_file ='$id_file'") or die(mysqli_error($koneksi));
            
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
    <h4 class="modal-title">Edit Data Dokumen Pegawai</h4>
</div>
<?php print_r($e); ?>
<br/>
<?php echo $e['keterangan']; ?>
<form role="form" method ="POST" action="index.php?page=proses_edit_dokumen" enctype="multipart/form-data">
<div class="card-body">
                <div class="form-group">
                    <label for="InputNIP">NIP</label>
                    <input type="text" class="form-control" name="NIP" id="NIP" value="<?php echo $e['NIP']; ?>"  placeholder="NIP" readonly required>
                  </div> 
                
                <div class="form-group">
                    <label for="InputFile">File</label>
                    <input type="file" class="form-control" name="upload" value="<?php echo $e['nama_file']; ?>"  required="required" multiple />
                    <p style="color: black">Ekstensi yang diperbolehkan : pdf, jpeg, jpg </p>
                </div> 
                <div class="form-group">
                    <label for="textarea">Keterangan</label>
                    <textarea type="text" class="form-control" rows="3" name="keterangan" id="keterangan" placeholder="Keterangan" rows="3"><?php echo $e['keterangan']; ?></textarea>
                </div>
                <div class="form-group">
                    <label for="InputJenisDokumen">Jenis Dokumen</label>
                    <select name="jenisdokumen_id" id="jenisdokumen_id" class="form-control">
                    <option value="">-Pilih Jenis Dokumen-</option>
                    <?php while($row = mysqli_fetch_assoc($che)) { ?>
                        <option value="<?php echo $row['id_jenisdokumen']; ?>" <?php if($row['id_jenisdokumen'] === $e['jenisdokumen_id']) echo 'selected' ?>>
                            <?php echo $row['jenis_dokumen']; ?>
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
