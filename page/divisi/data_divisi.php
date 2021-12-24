<?php
  $sql = "SELECT * FROM db_divisi";
?>
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Divisi</h1>
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
              <div class="card-header">
                
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
                  Tambah Divisi 
                </button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>NO</th>
                    <th>ID DIVISI</th>
                    <th>NAMA DIVISI</th>
                    <th>ACTION</th>
                  </tr>
                  </thead>
                  <tbody>
                      <?php
                        $n = 0;
                        require 'page/koneksi.php';
                        $row=$koneksi->query("SELECT * FROM db_divisi 
                                          ORDER BY id_divisi ASC");
                         while ($fetch=$row->fetch_array()){
                        $n++;
                        ?>
                      <tr>
                          <td><?php echo $n ; ?></td>
                          <td><?php echo $fetch['id_divisi']; ?></td>
                          <td> <a href="index.php?page=pegawaiperdivisi&id_divisi=<?php echo $fetch['id_divisi'];?>"> 
                          <?php echo $fetch['nama_divisi']; ?></a></td>
                           <td>
                          <a class="btn btn-warning" href="index.php?page=edit_divisi&id_divisi=<?php echo $fetch['id_divisi'];?>">
                          <i class="fa fa-edit"></i> Edit</a>
                          <a class="btn btn-danger" href="index.php?page=proses_hapus_divisi&id_divisi=<?php echo $fetch['id_divisi'];?>" 
                          onclick="return confirm('Yakin akan menghapus data? ')">
                          <i class="fa fa-trash"></i> Hapus</a>                      
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
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah Divisi</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form role="form" method ="post" action="index.php?page=proses_tambah_divisi">
                <div class="card-body">
                <div class="form-group">
                    <label for="InputIDivisi">Id Divisi</label>
                    <input type="text" class="form-control" name="id_divisi" id="id_divisi" placeholder="Id Divisi">
                  </div> 
                <div class="form-group">
                    <label for="InputNama">Nama Divisi</label>
                    <input type="text" class="form-control" name="nama_divisi" id="nama_divisi" placeholder="Nama Divisi">
                  </div>   
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">SIMPAN</button>
                  <a href="index.php?page=data_divisi" class="btn btn-danger" >BATAL</a>
                </div>
              </form>
            </div>
            <div class="modal-footer justify-content-between">
              
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>