<?php
  $sql = "SELECT * FROM db_divisi";
  $che = mysqli_query($koneksi, $sql);
?>
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data User</h1>
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
                  Tambah User 
                </button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>NO</th>
                    <th>ID USER</th>
                    <th>NAMA USER</th>
                    <th>EMAIL</th>
                    <th>DIVISI</th>
                    <th>ACTION</th>
                  </tr>
                  </thead>
                  <tbody>
                      <?php
                        $n = 0;
                        require 'page/koneksi.php';
                        $row=$koneksi->query("SELECT * FROM db_user, db_divisi   
                                          WHERE db_user.divisi_id=db_divisi.id_divisi 
                                          ORDER BY id_user ASC");
                        while ($fetch=$row->fetch_array()){
                        $n++;
                        ?>
                      <tr>
                          <td><?php echo $n ; ?></td>
                          <td><?php echo $fetch['id_user']; ?></td>
                          <td><?php echo $fetch['nama']; ?></td>
                          <td><?php echo $fetch['email']; ?></td>
                          <td><?php echo $fetch['nama_divisi']; ?></td>
                          <td>
                          <a class="btn btn-warning" href="index.php?page=edit_user&id_user=<?php echo $fetch['id_user'];?>">
                          <i class="fa fa-edit"></i> Edit</a>
                          </a>
                          <a class="btn btn-danger" href="index.php?page=proses_hapus_user&id_user=<?php echo $fetch['id_user'];?>" 
                          onclick="return confirm('Yakin akan menghapus data? ')">
                          <i class="fa fa-trash"></i> Hapus</a>
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
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah User</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form role="form" method ="post" action="index.php?page=proses_tambah_user">
                <div class="card-body">
                <div class="form-group">
                    <label for="InputIduser">Id User</label>
                    <input type="text" class="form-control" name="id_user" id="id_user" placeholder="Id User">
                  </div> 
                <div class="form-group">
                    <label for="InputNama">Nama</label>
                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama">
                  </div>   
                <div class="form-group">
                    <label for="InputEmail">Email</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                  </div>
                  <div class="form-group">
                    <label for="InputPassword">Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                  </div>
                  <div class="form-group">
                    <label for="InputDivisi">Divisi</label>
                    <select name="divisi_id" id="divisi_id" class="form-control">
                    <option value="">-Pilih Divisi-</option>
                    <?php while($row = mysqli_fetch_assoc($che)) { ?>
                      <option value="<?php echo $row['id_divisi']; ?>"><?php echo $row['nama_divisi']; ?></option>
                      <?php } ?>
                   </select>
                  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">SIMPAN</button>
                  <a href="index.php?page=data_user" class="btn btn-danger" >BATAL</a>
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