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
echo form_open_multipart(base_url('admin/konfigurasi/logo/'),' class="form-horizontal"');
?>

<div class="form-group form-group-lg">
  <label class="col-md-3 control-label">Nama Website</label>
  <div class="col-md-8">
    <input type="text" class="form-control" placeholder="Nama Website" name="namaweb" value="<?php echo $konfigurasi->namaweb ?>" required>
  </div>
</div>

<div class="form-group">
  <label class="col-md-3 control-label">Uplaod Logo Baru</label>
  <div class="col-md-8">
    <input type="file" class="form-control" placeholder="Logo" name="logo" value="<?php echo $konfigurasi->logo ?>" required>
    Logo Lama: <br>
     <img src="<?php echo base_url('assets/upload/image/'.$konfigurasi->logo) ?>" class="img img-responsive img-thumbnail" width="250">
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