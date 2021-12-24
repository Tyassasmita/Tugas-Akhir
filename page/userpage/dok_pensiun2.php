<?php
  $sql = "SELECT * FROM pegawai";

?>
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Pensiun</h1>
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
                <p>
                Current Date: <?php echo date("l, j F Y");?>
                </p>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>NO</th>
                    <th>NIP</th>
                    <th>NAMA PEGAWAI</th>
                    <th>TANGGAL LAHIR</th>
                    <th>STATUS</th>
                    <th>USIA PEGAWAI</th>
                    <th>FILE</th>
                    <th>DESKRIPSI</th>
                    <th>ACTION</th>
                  </tr>
                  </thead>
                  <tbody>
                      <?php
                        $n = 0;
                        require 'page/koneksi.php';
                        $row=$koneksi->query("SELECT * FROM pegawai, pensiun WHERE pegawai.NIP=pensiun.NIP
                        ORDER BY Nama ASC");
                        while ($fetch=$row->fetch_array()){
                        $n++;
                        ?>
                      <tr>
                          <td><?php echo $n ; ?></td>
                          <?php $name = explode('/', $fetch['file'])?>
                          <td><?php echo $fetch['NIP']; ?></td>
                          <td><?php echo $fetch['Nama']; ?></td>
                          <td><?php echo $fetch['Tanggal_Lahir']; ?></td>
                          <td><?php echo $fetch['Status'];?>
                            <?php $lahir2  =new DateTime($fetch['Tanggal_Lahir']);
                                          $today2  =new DateTime();
                                          $umur2 =date_diff($today2,$lahir2);
                                          $hasil = $umur2->y;
                                          if ($hasil >= 58) {
                                            echo "Pensiun";
                                          }
                                          else{
                                            echo "Pegawai Aktif";
                                          }
                                      ?> 
                                      </td>

                            <td><?php echo $fetch['Usia Pegawai'];?>
                                <?php $lahir  =new DateTime($fetch['Tanggal_Lahir']);
                                      $today  =new DateTime();
                                      $umur   =date_diff($today,$lahir);
                                      echo $umur->y; echo " Tahun, "; 
                                      echo $umur->m; echo " Bulan, dan "; 
                                      echo $umur->d; echo " Hari";
                                  ?>  
                                  </td> 

                          
                          <td><?php echo $fetch['nama_file'];?>
                          <td><?php echo $fetch['keterangan']; ?></td>
                          <td>
                          <a class="btn btn-xs btn-warning" href="index2.php?page=edit_pensiun2&NIP=<?php echo $fetch['NIP'];?>">
                          <i class="fa fa-edit"></i> Edit Data</a>
                          </a>
                          <a class="btn btn-xs btn-primary" href="page/document/proses_unduh_fpensiun2.php?file=<?php echo $name[1]?>">
                          <i class="fa fa-download"></i>Download</a>
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
              <h4 class="modal-title">Form Tambah Pensiun</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form role="form" method ="post" action="index.php?page=tambah_pangkat">
                <div class="card-body">
                <div class="form-group">
                    <label for="InputNIP">NIP</label>
                    <input type="text" class="form-control" name="NIP" id="NIP" placeholder="NIP">
                  </div> 
                <div class="form-group">
                    <label for="InputNama">Nama</label>
                    <input type="text" class="form-control" name="Nama" id="Nama" placeholder="Nama">
                  </div>   
                <div class="form-group">
                    <label for="Inputtgllhr">Tanggal Lahir</label>
                    <input type="date" class="form-control" name="Tanggal_Lahir" id="Tanggal_Lahir" placeholder="Tanggal Lahir">
                  </div>
                <div class="form-group">
                    <label for="InputJK">Status</label>
                    <select name="jenis kelamin" class="form-control">
                    <option value="">Pilih Status</option>
                    <option>Pensiun</option>
                    <option>Tetap</option>
                    </select>
                  </div>  
                  <div class="form-group">
                    <label for="InputjatuhTempo">Tanggal Jatuh Tempo</label>
                    <input type="date" class="form-control" name="Tanggal Jatuh Tempo" placeholder="Tanggal Jatuh Tempo">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Simpan</button>
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