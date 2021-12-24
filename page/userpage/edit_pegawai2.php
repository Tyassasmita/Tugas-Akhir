<?php include('page/koneksi.php'); ?>
		<?php
        //jika sudah mendapatkan parameter GET nip dari URL
        if(isset($_GET['NIP'])){
            //membuat variabel $nip untuk menyimpan nip dari GET id di URL
            $NIP = $_GET['NIP'];

            //query ke database SELECT tabel pegawai berdasarkan nip = $nip
            $select = mysqli_query($koneksi, "SELECT * FROM pegawai  WHERE NIP ='$NIP'") or die(mysqli_error($koneksi));
            
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

<div class="modal-header">
    <h4 class="modal-title">Form Edit Data Pegawai</h4>
</div>
<form role="form" method ="post" action="index2.php?page=proses_edit_pegawai2">
    <div class="card-body">
        <div class="form-group">
            <label for="InputNIP">NIP</label>
            <input type="text" class="form-control" name="NIP" id="NIP" value="<?php echo $e['NIP']; ?>"  placeholder="NIP" readonly required>
        </div> 
        <div class="form-group">
            <label for="InputNama">Nama</label>
            <input type="text" class="form-control" name="Nama" id="Nama" value="<?php echo $e['Nama']; ?>" placeholder="Nama" required>
        </div>
         <div class="form-group">
              <label for="InputTanggal">Tanggal Lahir</label>
              <input type="date" class="form-control" name="Tanggal_Lahir" id="Tanggal_Lahir" value="<?php echo $e['Tanggal_Lahir']; ?>" placeholder="Tanggal_Lahir" required>
        </div>      
        <div class="form-group">
                    <label for="InputGol">Gol.</label>
                    <select name="Gol" id="Gol" class="form-control" required>
                        <option value=""><?php echo $e['Gol']; ?></option>
                        <option>-Pilih Golongan-</option>
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
                    <select name="Pangkat" id="Pangkat" class="form-control" required>
                        <option value=""><?php echo $e['Pangkat']; ?></option>
                        <option >-Pilih Pangkat-</option>
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
                <div class="form-group">
                    <label for="InputDivisi">Divisi</label>
                    <select name="divisi_pengunggah" id="divisi_pengunggah" placeholder="divisi_pengunggah" class="form-control" required>
                        <option value=""><?php echo $e['divisi_pengunggah']; ?></option>
                        <option>-Pilih Divisi-</option>
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
      </div>
        <!-- /.card-body -->
        <div class="card-footer">
        <button type="submit" name="submit" class="btn btn-primary">SIMPAN</button>
            <a href="index2.php?page=dok_pegawai2" class="btn btn-danger" >BATAL</a>
        </div>
</form>
