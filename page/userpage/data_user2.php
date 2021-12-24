<?php 
session_start();
?>
<?php 
include "page/koneksi.php";
 ?>
 <?php
 $user1=$_SESSION["db_user"]["id_user"];
 $edit = mysqli_query($koneksi,"SELECT * FROM db_user WHERE nama = '$_SESSION[nama]'");
 $e=mysqli_fetch_assoc($edit);
    ?>
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Profil Pegawai</h1>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
<div class="card-body">
  <table id="example" class="table table-bordered table-striped">
    <thead>
      <tr>
      <th>AVATAR</th>
      <th>NAMA</th>
      <th>DIVISI</th>
      <th>STATUS PENGGUNA</th>
      <th>ACTION</th>
      </tr>
    </thead>
    <tbody>
    <tr>
      <td><image class="profile-user-img img-responsive img-circle" src="assets/dist/img/Kabupaten_Wonosobo.png"
                  alt="User Profile Pict"></td>
      <td><?php echo"".$_SESSION['nama'];?></td>
      <td><?php echo"";
        $divisi = $e['divisi_id'];
        if($divisi == 1){
          echo "Pemerintahan";
        }elseif ($divisi == 2){
          echo "Kesejahteraan Rakyat";
        }elseif ($divisi == 3){
          echo "Hukum";
        }elseif ($divisi == 4){
          echo "Perekonimian dan Sumber Daya Alam";
        }elseif ($divisi == 5){
          echo "Administrasi Pembangunan";
        }elseif ($divisi == 6){
          echo "Pengadaan Barang dan Jasa";
        }elseif ($divisi == 7){
          echo "Umum";
        }elseif ($divisi == 8){
          echo "Organisasi";
        }else{
          echo "Protokol dan Komunikasi Pimpinan";
        }  
        ?></td>
      <td><?php echo" ".$_SESSION['role'];?></td>
      <td>
        <a href="index2.php?page=edit_user2&id_user=<?php echo $e['id_user'];?>">
        <button type="button" class="btn btn-warning">Edit</button>
        </a>
      </td>
    </tr>
    </tbody>    
    </section>
