<script type="text/javascript">
function kategori(){
var x=document.getElementById('cbkategori').value;
document.getElementById('kode_produk').value=x;  
}
 </script>
<?php

 //error upload
if(isset($error)){
  echo '<p class="alert alert-warning">';
  echo $error;
  echo '</p>';
}

  // Notifikasi Error
echo validation_errors('<div class="alert alert-warning">','</div>');

// form open
echo form_open_multipart(base_url('admin/produk/tambah'),' class="form-horizontal"');
?>

<div class="form-group form-group-lg">
  <label class="col-md-2 control-label">Nama Produk</label>
  <div class="col-md-8">
    <input type="text" class="form-control" placeholder="Nama Produk" name="nama_produk" value="<?php echo set_value('nama_produk') ?>" required>
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label">Kategori Produk</label>
  <div class="col-md-2">
   <select name="id.kategori" class="form-control" id="cbkategori" onchange="kategori()">
    <?php foreach ($kategori as $kategori) { ?>
    <option value="<?php echo $kategori->id_kategori ?>">
        <?php echo $kategori->nama_kategori ?>
        </option>
    <?php } ?>
   </select>
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label">Kode Produk</label>
  <div class="col-md-5">
    <input type="text" class="form-control" placeholder="Kode Produk" name="kode_produk" id="kode_produk" value="<?php echo set_value('kode_produk') ?>" required>
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label">Harga Produk</label>
  <div class="col-md-5">
    <input type="number" class="form-control" placeholder="Harga" name="harga" value="<?php echo set_value('harga') ?>" required>
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label">Stok Produk</label>
  <div class="col-md-5">
    <input type="number" class="form-control" placeholder="Stok Produk" name="stok" value="<?php echo set_value('stok') ?>" required>
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label">Berat Produk</label>
  <div class="col-md-5">
    <input type="text" class="form-control" placeholder="Berat Produk" name="berat" value="<?php echo set_value('berat') ?>" required>
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label">Ukuran Produk</label>
  <div class="col-md-5">
    <input type="text" class="form-control" placeholder="Ukuran Produk" name="ukuran" value="<?php echo set_value('ukuran') ?>" required>
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label">Keterangan Produk</label>
  <div class="col-md-10">
    <textarea name="keterangan" class="form-control" placeholder="Keterangan" id="editor"><?php echo set_value('keterangan')?></textarea>
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label">Keyword (Untuk SEO Google)</label>
  <div class="col-md-10">
    <textarea name="keywords" class="form-control" placeholder="Keyword (Untuk SEO Google)"><?php echo set_value('keywords')?></textarea>
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label">Uplaod Gambar Produk</label>
  <div class="col-md-10">
    <input type="file" name="gambar" class="form-control" required="required">
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label">Status Produk</label>
  <div class="col-md-2">
    <select name="status_produk" class="form-control">
      <option value="Publish">Publikasikan</option>
      <option value="Draft">Simpan Sebagai Draft</option>
    </select>
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label"></label>
  <div class="col-md-5">
  	<button class="btn btn-success btn-lg" name="submit" type="submit">
  		<i class="fa fa-save"></i>Simpan
  	</button>
  	<button class="btn btn-info btn-lg" name="reset" type="reset">
  		<i class="fa fa-times"></i>Reset
  	</button>
  </div>
</div>

<?php echo form_close(); ?>