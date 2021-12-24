<?php
  $sql = "SELECT * FROM jenis_dokumen";
  $che = mysqli_query($koneksi, $sql);
?>
    
		<?php
		if(isset($_GET['alert'])){
			if($_GET['alert']=="gagal_ukuran"){
				?>
				<div class="alert alert-warning">
					<strong>Warning!</strong> Ukuran File Terlalu Besar
				</div>
				<?php
			}elseif ($_GET['alert']=="gagal_ektensi") {
				?>
				<div class="alert alert-warning">
					<strong>Warning!</strong> Ekstensi File Tidak Diperbolehkan
				</div>
				<?php
			}elseif ($_GET['alert']=="simpan") {
				?>
				<div class="alert alert-success">
					<strong>Success!</strong> File Berhasil Disimpan
				</div>
				<?php
			}				
		}
		?>
		
<!-- Main content -->    
<div class="modal-header">
	  <h4 class="title">Upload Dokumen Pegawai</h4>
</div>
           
    <form role="form" method ="post" action="page/document/proses_upload_pegawai.php" enctype="multipart/form-data">
        <div class="card-body">
            <div class="form-group">
            <label for="InputNIP">NIP</label>
            <input type="text" class="form-control" name="nip" id="nip" placeholder="NIP">
        </div> 
                
        <div class="form-group">
            <label for="InputFile">File</label>
            <input type="file" class="form-control" name="upload" required="required" multiple />
            <p style="color: black">Ekstensi yang diperbolehkan : pdf, jpeg, jpg </p>
        </div> 
        <div class="form-group">
            <label for="textarea">Keterangan</label>
            <textarea type="text" class="form-control" rows="3" name="keterangan" id="keterangan" placeholder="Keterangan"></textarea>
        </div>  
        <div class="form-group">
            <label for="InputDokumen">Jenis Dokumen</label>
            <select name="jenisdokumen_id" id="jenisdokumen_id" class="form-control">
            <option value="">-Pilih Jenis Dokumen-</option>
              <?php while($row = mysqli_fetch_assoc($che)) { ?>
                <option value="<?php echo $row['id_jenisdokumen']; ?>"><?php echo $row['jenis_dokumen']; ?></option>
              <?php } ?>
            </select>
        </div>
                        
        </div>
        
        <!-- /.card-footer -->
        <div class="card-footer">
            <button type="submit" name="submit" 
                onclick='jacascript:alert("Dokumen telah berhasil terupload")' 
                class="btn btn-primary" >SIMPAN</button>
            <a href="index.php?page=dok_pegawai" class="btn btn-danger" >BATAL</a>
        </div>
  </form>
           

