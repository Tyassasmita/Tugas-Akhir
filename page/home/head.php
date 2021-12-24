<div class="banner banner1">
          <img src="dist/img/bannerlogo.png" alt="Banner" width="1100" height="350">
</div>

  <?php  ?>
  
  <div class="col-xs-12 col-md-12">
    <div class="box box-primary">
    <!-- /.box-header -->
      <div class="box-body">
      <h4>Last Uploaded</h4>
        <table class="table table-hover">
          <tbody>
          <h><b>DOKUMEN PEGAWAI</b></h>
            <?php
            $i = 0;
            require 'page/koneksi.php';
            $row = $koneksi->query("SELECT * FROM  pegawai
                                  INNER JOIN dokumen_file ON pegawai.nip = dokumen_file.nip
                                  INNER JOIN db_divisi ON pegawai.divisi_id = db_divisi.id_divisi
                                  WHERE pegawai.nip = dokumen_file.nip
                                  AND pegawai.divisi_id = db_divisi.id_divisi
                                  ORDER BY tanggal DESC");
            while ($fetch = $row->fetch_array()){
              $i++;
            ?>
              <tr>  
                <td><?php echo $i; ?></td>
                <td>Telah Terupload </td>
                <td><?php echo $fetch['nama_file']; ?></td>
                <td><?php echo "Oleh Divisi ".$fetch['nama_divisi']; ?></td>
                
                <?php $fetch['tanggal']; ?>
                <?php $tgl = $fetch['tanggal']; ?>
                <td><small class="btn btn-success pull-right">Pada <?php echo strftime("%d %B %Y", strtotime($tgl)); ?></small></td>
              </tr>
            <?php } ?>   
                      
            </tbody>
          <table class="table table-hover">
          
          <table class="table table-hover">
          <tbody>
          <h><b>MASA KERJA PEGAWAI</b></h>
          <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>NO</th>
                    <th>NIP</th>
                    <th>NAMA PEGAWAI</th>
                    <th>STATUS PEGAWAI</th>
                    <th>MASA KERJA PEGAWAI</th>
                  </tr>
                  </thead>
                  <?php
                        $n = 0;
                        require 'page/koneksi.php';
                        $row=$koneksi->query(" SELECT * FROM pegawai ORDER BY YEAR(Tanggal_Lahir) ASC");
                        while ($fetch=$row->fetch_array()){
                        $n++;
                  ?>
                    <tr>  
                      <td><?php echo $n; ?></td>
                      <td><?php echo $fetch['NIP']; ?></td>
                      <td><?php echo $fetch['Nama']; ?></td>
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
                                echo "<b>Pensiun</b>";
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
                </tr>
            <?php } ?>   
            
                   
            </tbody>
          <table class="table table-hover">
       
  </div>

  <!-- /.box-body -->
  </div>
  <!-- /.box -->
</div>
<!-- /.box -->
