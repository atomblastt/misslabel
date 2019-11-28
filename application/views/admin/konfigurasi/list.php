<?php 
// notifikasi
if ($this->session->flashdata('sukses')) {
  echo '<p class="alert alert-success"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>';
  echo $this->session->flashdata('sukses');
  echo '</div>' ;
}
 ?>

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
echo form_open_multipart(base_url('admin/konfigurasi'),' class="form-horizontal"');
?>

<div class="form-group form-group-lg">
  <label class="col-md-3 control-label">Nama Website</label>
  <div class="col-md-8">
    <input type="text" class="form-control" placeholder="Nama Website" name="namaweb" value="<?php echo $konfigurasi->namaweb ?>" required>
  </div>
</div>

<div class="form-group">
  <label class="col-md-3 control-label">Tagline/Moto</label>
  <div class="col-md-8">
    <input type="text" class="form-control" placeholder="Tagline/Moto" name="tagline" value="<?php echo $konfigurasi->tagline ?>" required>
  </div>
</div>

<div class="form-group">
  <label class="col-md-3 control-label">Email</label>
  <div class="col-md-8">
    <input type="email" class="form-control" placeholder="Email" name="email" value="<?php echo $konfigurasi->email ?>" required>
  </div>
</div>

<div class="form-group">
  <label class="col-md-3 control-label">Website</label>
  <div class="col-md-8">
    <input type="text" class="form-control" placeholder="Website" name="website" value="<?php echo $konfigurasi->website ?>" required>
  </div>
</div>

<div class="form-group">
  <label class="col-md-3 control-label">Akun Facebook</label>
  <div class="col-md-8">
    <input type="url" class="form-control" placeholder="Nama Akun Facebook" name="facebook" value="<?php echo $konfigurasi->facebook ?>" required>
  </div>
</div>

<div class="form-group">
  <label class="col-md-3 control-label">Akun Instagram</label>
  <div class="col-md-8">
    <input type="url" class="form-control" placeholder="Nama Akun Instagram" name="instagram" value="<?php echo $konfigurasi->instagram ?>" required>
  </div>
</div>

<div class="form-group">
  <label class="col-md-3 control-label">Telepon/Hp</label>
  <div class="col-md-8">
    <input type="text" class="form-control" placeholder="Telepon/Hp" name="telepon" value="<?php echo $konfigurasi->telepon ?>" required>
  </div>
</div>

<div class="form-group">
  <label class="col-md-3 control-label">Alamat Toko</label>
  <div class="col-md-8">
    <input type="text" class="form-control" placeholder="Alamat" name="alamat" value="<?php echo $konfigurasi->alamat ?>" required>
  </div>
</div>

<div class="form-group">
  <label class="col-md-3 control-label">Keyword (Untuk SEO Google)</label>
  <div class="col-md-9">
    <textarea name="keywords" class="form-control" placeholder="Keyword (Untuk SEO Google)"><?php echo $konfigurasi->keywords?></textarea>
  </div>
</div>

<div class="form-group">
  <label class="col-md-3 control-label">Kode Metatext</label>
  <div class="col-md-9">
    <textarea name="metatext" class="form-control" placeholder="Metatext"><?php echo $konfigurasi->metatext?></textarea>
  </div>
</div>

<div class="form-group">
  <label class="col-md-3 control-label">Deskripsi Website</label>
  <div class="col-md-9">
    <textarea name="deskripsi" class="form-control" placeholder="Deskripsi"><?php echo $konfigurasi->deskripsi?></textarea>
  </div>
</div>

<div class="form-group">
  <label class="col-md-3 control-label">Rekening Pembayaran</label>
  <div class="col-md-9">
    <textarea name="rekening_pembayaran" class="form-control" placeholder="Rekening Pembayaran"><?php echo $konfigurasi->rekening_pembayaran?></textarea>
  </div>
</div>

<div class="form-group">
  <label class="col-md-3 control-label"></label>
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