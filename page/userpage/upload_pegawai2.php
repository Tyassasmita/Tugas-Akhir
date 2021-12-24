    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
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

<section class="content-header">
      <div class="container-fluid">
	  <h4 class="title">Form Upload Pegawai</h4>
        <div class="row mb-2">
          <div class="col-sm-1">              
		   <br>
            </div>
            <div class="body">
		<form action="page/userpage/proses_upload_pegawai2.php" method="post" enctype="multipart/form-data">			
		<div class="card-body">
                <div class="form-group">
                    <label for="InputNIP">NIP</label>
                    <input type="text" class="form-control" name="nip" id="nip" placeholder="NIP">
                  </div> 
                
				<div class="form-group">
                    <label for="InputNama">File</label>
                    <input type="file" class="form-control" name="upload" required="required" multiple />
					<p style="color: red">Ekstensi yang diperbolehkan : docx', 'doc', 'pdf', 'dotx', 'pptx'</p>
                  </div> 
				  <div class="form-group">
                    <label for="InputNama">Deskripsi</label>
                    <input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Deskripsi">
                  </div>  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="submit"  class="btn btn-primary">SIMPAN</button>
                </div>
              </form>
            </div>
  
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
    </section>