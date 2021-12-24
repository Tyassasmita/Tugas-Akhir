<?php include('page/koneksi.php'); ?>
		<?php
        if(isset($_GET['id_divisi'])){
            $id_divisi2 = $_GET['id_divisi'];
            $select2 = mysqli_query($koneksi, "SELECT * FROM  db_divisi WHERE id_divisi ='$id_divisi2'") or die(mysqli_error($koneksi));
            if(mysqli_num_rows($select2) == 0){
				echo '<div class="alert alert-warning">Data Pegawai dalam divisi ini masih kosong.</div>';
				exit();
            }else{
                $fetch2 = mysqli_fetch_assoc($select2);
			
		?>
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          <h1>Data Pegawai <strong> Divisi <?php echo $fetch2['nama_divisi']; ?> </strong> </h1>
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
                        $id_divisi = $_GET['id_divisi'];
                        $row=$koneksi->query("SELECT * FROM pegawai 
                                            JOIN tb_pangkat ON tb_pangkat.id_pangkat = pegawai.pangkat_id 
                                            WHERE divisi_id ='$id_divisi'   
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
    <?php
            }
		}
    ?>