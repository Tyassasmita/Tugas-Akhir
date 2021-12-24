
<?php include('page/koneksi.php'); ?>

<?php
//jika sudah mendapatkan parameter GET id dari URL
if(isset($_GET['id_divisi']))
{
    //membuat variabel $id_divisi untuk menyimpan id dari GET id di URL
    $id_divisi = $_GET['id_divisi'];

    //query ke database SELECT tabel db_divisi berdasarkan id_divisi = $id_divisi
    $select = mysqli_query($koneksi, "SELECT * FROM db_divisi  WHERE id_divisi='$id_divisi'") or die(mysqli_error($koneksi));

    //jika hasil query = 0 maka muncul pesan error
    if(mysqli_num_rows($select) == 0){
        echo '<div class="alert alert-warning">ID tidak ada dalam database.</div>';
        exit();
    //jika hasil query > 0
    }else{
        //membuat variabel $data dan menyimpan data row dari query
        $data = mysqli_fetch_assoc($select);
    }
}
?>
    
<div class="modal-header">
    <h4 class="modal-title">Edit Divisi</h4>
</div>
    <form role="form" method ="POST" action="index.php?page=proses_edit_divisi">
    <div class="card-body">
        <div class="form-group">
            <label for="InputIddivisi">Id Divisi</label>
            <input type="text" class="form-control" name="id_divisi" id="id_divisi" value="<?php echo $data['id_divisi']; ?>" placeholder="Id Divisi" readonly required>
        </div> 
        <div class="form-group">
            <label for="InputNama">Nama Divisi</label>
            <input type="text" class="form-control" name="nama_divisi" id="nama_divisi" value="<?php echo $data['nama_divisi']; ?>" placeholder="Nama" required>
        </div>   
    
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" name="submit" class="btn btn-primary">SIMPAN</button>
            <a href="index.php?page=data_divisi" class="btn btn-danger" >BATAL</a>
        </div>
</form>