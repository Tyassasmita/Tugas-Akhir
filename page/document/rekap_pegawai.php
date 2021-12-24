<?php include('page/koneksi.php'); ?>
		<?php
        if(isset($_GET['NIP'])){
            $NIP = $_GET['NIP'];
            $select = mysqli_query($koneksi, "SELECT * FROM pegawai  WHERE NIP ='$NIP'") or die(mysqli_error($koneksi));
            if(mysqli_num_rows($select) == 0){
				echo '<div class="alert alert-warning">ID tidak ada dalam database.</div>';
				exit();
            }else{
                $fetch = mysqli_fetch_assoc($select);
			}
		}
		?>

<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Rekap Dokumen Pegawai</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
          <div class="card">
          <?php
            $NIP = $_GET['NIP'];          
            
          ?>

      <div class="card-body">
        <div class="form-group">
         
            <label for="NIP">NIP</label>
            <input type="text" class="form-control" name="NIP" id="NIP" value="<?php echo $fetch['NIP']; ?>"  placeholder="NIP" readonly required>
          </div> 
          <div class="form-group">
              <label for="Nama">NAMA PEGAWAI</label>
              <input type="text" class="form-control" name="Nama" id="Nama" value="<?php echo $fetch['Nama']; ?>" placeholder="Nama Pegawai" readonly required>
          </div>
          </div>
        
              <!-- /.card-body -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>NO</th>
                    <th>TANGGAL UPLOAD</th>
                    <th>DOKUMEN</th>
                    <th>JENIS DOKUMEN</th>
                    <th>KETERANGAN</th>
                    <th>ACTION</th>
                  </tr>
                  </thead>
                  <tbody>
                  
                  <?php
                        $NIP = $_GET['NIP'];
                        $n = 0;
                        require 'page/koneksi.php';
                        $row=$koneksi->query("SELECT * FROM dokumen_file JOIN jenis_dokumen 
                                            ON jenis_dokumen.id_jenisdokumen = dokumen_file.jenisdokumen_id 
                                            WHERE dokumen_file.NIP ='$NIP'
                                            ORDER BY jenis_dokumen ASC");
                                          
                        while ($fetch=$row->fetch_array()){
                        $n++;
                        ?>
                      <tr>
                          <td><?php echo $n ; ?></td>
                          <?php $name = explode('/', $fetch['file'])?>
                          <td><?php echo $fetch['tanggal']; ?></td>
                          <td> <a href="page/document/preview_dokumen.php?file=<?php echo $name[1]?>"> <?php echo $fetch['nama_file']; ?></a></td>
                          <td><?php echo $fetch['jenis_dokumen']; ?></td>
                          <td><?php echo $fetch['keterangan']; ?></td>
                                                 
                          <td>
                          <a class="btn btn-xs btn-primary" href="page/document/proses_unduh_fpegawai.php?file=<?php echo $name[1]?>">
                          <i class="fa fa-download"></i>Download</a>
                          <a class="btn btn-xs btn-danger" href="index.php?page=proses_hapus_dokumen&id_file=<?php echo $fetch['id_file'];?>"
                          onclick="return confirm('Yakin akan menghapus data? ')">
                          <i class="fa fa-trash"></i> Hapus Dokumen</a>
                          </a>
                          
                          </td>
                      </tr>
                      <?php } ?>
  
                      
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    <!-- Modal form tambah user -->  