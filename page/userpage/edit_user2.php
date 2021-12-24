<?php include('page/koneksi.php'); ?>
		<?php
        //jika sudah mendapatkan parameter GET id dari URL
        if(isset($_GET['id_user'])){
            //membuat variabel $id_user untuk menyimpan id dari GET id di URL
            $id_user = $_GET['id_user'];

            //query ke database SELECT tabel db_user berdasarkan id_user = $id_user
            $select = mysqli_query($koneksi, "SELECT * FROM db_user  WHERE id_user='$id_user'") or die(mysqli_error($koneksi));
            
            //jika hasil query = 0 maka muncul pesan error
            if(mysqli_num_rows($select) == 0){
				echo '<div class="alert alert-warning">ID tidak ada dalam database.</div>';
				exit();
            //jika hasil query > 0
            }else{
                //membuat variabel $data dan menyimpan data row dari query
                $e = mysqli_fetch_assoc($select);
			}
		}
		?>
<?php
  $sql = "SELECT * FROM db_divisi";
  $che = mysqli_query($koneksi, $sql);
?>
<div class="modal-header">
    <h4 class="modal-title">Form Edit Profil Pegawai</h4>
</div>
<form role="form" method ="POST" action="index2.php?page=proses_edit_user2">
    <div class="card-body">
    <div class="form-group">
            <label for="InputIduser">Id User</label>
            <input type="text" class="form-control" name="id_user" id="id_user" value="<?php echo $e['id_user']; ?>" placeholder="Id User" readonly required>
        </div>  
        <div class="form-group">
            <label for="InputNama">Nama</label>
            <input type="text" class="form-control" name="nama" id="nama" value="<?php echo $e['nama']; ?>" placeholder="Nama" required>
        </div>   
        <div class="form-group">
            <label for="InputEmail">Email</label>
            <input type="email" class="form-control" name="email" id="email" value="<?php echo $e['email']; ?>" placeholder="Email" required>
        </div>
        <div class="form-group">
            <label for="InputPassword">Password</label>
            <input type="password" class="form-control" name="password" id="password" value="<?php echo $e['password']; ?>" placeholder="Password" required >
        </div>
        <div class="form-group">
                <label for="InputDivisi">Divisi</label>
                    <select name="divisi_id" id="divisi_id" class="form-control" required>
                    <option value="">-Pilih Divisi-</option>
                <?php while($row = mysqli_fetch_assoc($che)) { ?>
                <option <?php echo ($row['id_divisi'] == $e['divisi_id'] ? 'selected' : ''); ?> 
                value="<?php echo $row['id_divisi']; ?>"><?php echo $row['nama_divisi']; ?></option>
                <?php } ?>                        
            </select>
        </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
        <button type="submit" name="submit" class="btn btn-primary">SIMPAN</button>
            <a href="index.php?page=data_user2" class="btn btn-danger" >BATAL</a>
        </div>
</form>
