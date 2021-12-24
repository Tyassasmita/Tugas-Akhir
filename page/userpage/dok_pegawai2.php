<?php
  $sql = "SELECT tb_user.id_user, tb_user.nama, pegawai.id_user FROM tb_user 
  INNER JOIN pegawai ON tb_user.id_user = pegawai.user_id";
$hasil = mysqli_query($koneksi, $sql);

?>
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Pegawai</h1>
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
                  Tambah Data Pegawai
                </button>
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
                    <th>GOL.</th>
                    <th>PANGKAT</th>
                    <th>FILE</th>
                    <th>DESKRIPSI</th>
                    <th>ACTION</th>
                  </tr>
                  </thead>
                  <tbody>
                      <?php
                        $n = 0;
                        require 'page/koneksi.php';
                        $row=$koneksi->query("SELECT * FROM pegawai, dokumen_filepegawai WHERE pegawai.NIP=dokumen_filepegawai.NIP
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
                          <td><?php echo $fetch['Gol']; ?></td>
                          <td><?php echo $fetch['Pangkat']; ?></td>
                           <td><?php echo $fetch['nama_file']; ?></td>
                           <td><?php echo $fetch['keterangan']; ?></td>
                          <td>
                        
                          <a class="btn btn-xs btn-warning" href="index2.php?page=edit_pegawai2&NIP=<?php echo $fetch['NIP'];?>">
                          <i class="fa fa-edit"></i> Edit Data</a>
                          </a>
                          <a class="btn btn-xs btn-primary" href="page/document/proses_unduh_fpegawai2.php?file=<?php echo $name[1]?>">
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
              <h4 class="modal-title">Form Tambah Data Pegawai</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form role="form" method ="post" action="index2.php?page=proses_tambah_pegawai2">
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
                    <label for="InputDivisi">Divisi</label>
                    <select name="divisi_pengunggah" id="divisi_pengunggah" class="form-control">
                      <option value="">-Pilih Divisi-</option>
                      <option>Pemerintahan</option>
                      <option>Kesejahteraan Rakyat</option>
                      <option>Hukum</option>
                      <option>Perekonomian dan Sumber Daya Alam</option>
                      <option>Administrasi Pembangunan</option>
                      <option>Umum</option>
                      <option>Organisasi</option>
                      <option>Protokol dan Komunikasi Pimpinan</option>
                   </select>
                   </div>
                <div class="form-group">
                    <label for="InputTanggal">Tanggal Lahir</label>
                    <input type="date" class="form-control" name="Tanggal_Lahir" id="Tanggal_Lahir" placeholder="Tanggal Lahir ">
                </div> 
                <div class="form-group">
                    <label for="InputGol">Gol.</label>
                    <select name="Gol" id="Gol" class="form-control">
                      <option value="">-Pilih Golongan-</option>
                      <option>I A</option>
                      <option>I B</option>
                      <option>I C</option>
                      <option>I D</option>
                      <option>II A</option>
                      <option>II B</option>
                      <option>II C</option>
                      <option>II D</option>
                      <option>III A</option>
                      <option>III B</option>
                      <option>III C</option>
                      <option>III D</option>
                      <option>IV A</option>
                      <option>IV B</option>
                      <option>IV C</option>
                      <option>IV D</option>
                      <option>IV E</option>
                   </select>
                </div> 
                <div class="form-group">
                    <label for="InputPangkat">Pangkat</label>
                    <select name="Pangkat" id="Pangkat" class="form-control">
                      <option value="">-Pilih Pangkat-</option>
                      <option>Juru Muda</option>
                      <option>Juru Muda Tingkat 1</option>
                      <option>Juru</option>
                      <option>Juru Tingkat 1</option>
                      <option>Pengatur Muda</option>
                      <option>Pengatur Muda Tingkat 1</option>
                      <option>Pengatur</option>
                      <option>Pengatur Tingkat 1</option>
                      <option>Penata Muda</option>
                      <option>Penata Muda Tingkat 1</option>
                      <option>Penata</option>
                      <option>Penata Tingkat 1</option>
                      <option>Pembina</option>
                      <option>Pembina Tingkat 1</option>
                      <option>Pembina Utama Muda</option>
                      <option>Pembina Utama Madya</option>
                      <option>Pembina Utama</option>
                   </select>
                </div> 
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                <button type="submit" class="btn btn-primary">SIMPAN</button>
                  <a href="index2.php?page=dok_pegawai2" class="btn btn-danger" >BATAL</a>
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