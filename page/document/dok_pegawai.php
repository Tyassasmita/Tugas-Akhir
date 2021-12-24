<?php
  $sql = "SELECT tb_user.id_user, tb_user.nama, pegawai.id_user FROM tb_user 
  INNER JOIN pegawai ON tb_user.id_user = pegawai.user_id";
$hasil = mysqli_query($koneksi, $sql);
?>

<?php
  $sql1 = "SELECT * FROM db_divisi";
  $che1 = mysqli_query($koneksi, $sql1);
?>
<?php
  $sql2 = "SELECT * FROM tb_pangkat";
  $che2 = mysqli_query($koneksi, $sql2);
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
            <div>
              <p>
              <?php
              date_default_timezone_set("Asia/Jakarta");
              setlocale(LC_TIME, 'id_ID.utf8');
              $hariIni = new DateTime();
              echo strftime('%A %d %B %Y, %H:%M', $hariIni->getTimestamp()) . '<br>';
                ?>
              </p>
            </div>
          
              <div class="card-header">
              
                
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
                  Tambah Data Pegawai
                </button>
                
                <a class="btn btn-primary" href="index.php?page=upload_pegawai" >
                  <i class="fa fa-upload"></i> Upload Dokumen</a>
                </a>
             
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
                    <th>TMT PANGKAT</th>
                    <th>STATUS PEGAWAI</th>
                    <th>MASA KERJA PEGAWAI</th>
                    <th>ACTION</th>
                  </tr>
                  </thead>
                  <tbody>
                      <?php
                        $n = 0;
                        require 'page/koneksi.php';
                        $row=$koneksi->query("SELECT * FROM pegawai 
                                            JOIN tb_pangkat ON tb_pangkat.id_pangkat = pegawai.pangkat_id 
                                            ORDER BY Nama ASC");
                        while ($fetch=$row->fetch_array()){
                        $n++;
                        ?>
                      <tr>
                          <td><?php echo $n ; ?></td>
                          
                          <td><?php echo $fetch['NIP']; ?></td>
                          <td><?php echo $fetch['Nama']; ?></td>
                          <td><?php $fetch['Tanggal_Lahir']; ?>
                          <?php $tgl = $fetch['Tanggal_Lahir']; ?>
                          <?php echo strftime("%d %B %Y", strtotime($tgl)); ?></td>
                          <td><?php echo $fetch['gol']; ?></td>
                          <td><?php echo $fetch['pangkat']; ?></td>
                          <td><?php $tmt = $fetch['TMT_Pangkat']; ?>
                          <?php echo strftime("%d %B %Y", strtotime($tmt)); ?></td>
                          <td><?php echo $fetch['Status'];?>
                            <?php
                              require 'page/koneksi.php';
                              $pensiun=$koneksi->query("SELECT * FROM pengaturan_pensiun");
                              $usia_pensiun = $pensiun->fetch_array();
                                                    ?>
                                <?php $lahir2  =new DateTime($fetch['Tanggal_Lahir']);
                                  $today2  =new DateTime();
                                  $umur2 =date_diff($today2,$lahir2);
                                  $hasil = $umur2->y;
                                  if ($hasil >= $usia_pensiun['usia_pensiun']) {
                                    echo ' <a href="index.php?page=pdf_pensiun&NIP='.$fetch['NIP'].'"> <strong>Pensiun</strong></a> ';
                                  }
                                  else{
                                    echo "Pegawai Aktif";
                                  }
                                ?> 
                          </td> 


                          <td><?php echo $fetch['Sisa Waktu'];?>
                          <?php
                            require 'page/koneksi.php';
                            $masakerja=$koneksi->query("SELECT * FROM pengaturan_pensiun");
                            $usia =$masakerja->fetch_array();
                            ?>
              
                            <?php $lahir  =new DateTime($fetch['Tanggal_Lahir']);
                                  $today  =new DateTime();
                                  $umur   =date_diff($today,$lahir);
                                  $hasil = $umur->y;
                                  $pensiun =$usia['usia_pensiun'];
                                  $sisa = $pensiun - $hasil;
                                  if ($sisa >0) {
                                    echo $sisa; echo " Tahun ";
                                  } else{
                                    echo " 0 Tahun ";
                                  }
                                        
                            ?>  
                             
                            </td>          

                          <td>
                          <a class="btn btn-xs btn-success" href="index.php?page=rekap_pegawai&NIP=<?php echo $fetch['NIP'];?>">
                          <i class="fa fa-file"></i> Rekap Dokumen</a>
                          </a>
                          <a class="btn btn-xs btn-warning" href="index.php?page=edit_pegawai&NIP=<?php echo $fetch['NIP'];?>" >
                          <i class="fa fa-edit"></i> Edit Data</a>
                          </a>
                          <a class="btn btn-xs btn-danger" href="index.php?page=proses_hapus_pegawai&NIP=<?php echo $fetch['NIP'];?>" 
                          onclick="return confirm('Yakin akan menghapus data? ')">
                          <i class="fa fa-trash"></i> Hapus</a>
                          </a>  
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
              <h4 class="modal-title">Tambah Data Pegawai</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form role="form" method ="post" action="index.php?page=proses_tambah_pegawai">
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
                    <label for="InputTanggal">Tanggal Lahir</label>
                    <input type="date" class="form-control" name="Tanggal_Lahir" id="Tanggal_Lahir" placeholder="Tanggal Lahir ">
                 </div>
                <div class="form-group">
                    <label for="InputPangkat">Pangkat</label>
                    <select name="pangkat_id" id="pangkat_id" class="form-control">
                    <option value="">-Pilih Pangkat-</option>
                    <?php while($row2 = mysqli_fetch_assoc($che2)) { ?>
                      <option value="<?php echo $row2['id_pangkat']; ?>"><?php echo $row2['pangkat']; ?></option>
                      <?php } ?>
                   </select>
                  </div>
                <div class="form-group">
                    <label for="InputTMT">TMT Pangkat</label>
                    <input type="date" class="form-control" name="TMT_Pangkat" id="TMT_Pangkat" placeholder="TMT Pangkat">
                </div> 
                <div class="form-group">
                    <label for="InputDivisi">Divisi</label>
                    <select name="divisi_id" id="divisi_id" class="form-control">
                    <option value="">-Pilih Divisi-</option>
                    <?php while($row1 = mysqli_fetch_assoc($che1)) { ?>
                      <option value="<?php echo $row1['id_divisi']; ?>"><?php echo $row1['nama_divisi']; ?></option>
                      <?php } ?>
                   </select>
                  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">SIMPAN</button>
                  <a href="index.php?page=dok_pegawai" class="btn btn-danger" >BATAL</a>
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