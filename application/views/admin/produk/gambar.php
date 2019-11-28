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
echo form_open_multipart(base_url('admin/produk/gambar/'.$produk->id_produk),' class="form-horizontal"');
?>

<div class="form-group form-group-lg">
  <label class="col-md-2 control-label">Judul Gambar</label>
  <div class="col-md-8">
    <input type="text" class="form-control" placeholder="Judul Gambar" name="judul_gambar" value="<?php echo set_value('judul_gambar') ?>" required>
  </div>
</div>

<div class="form-group form-group-lg">
  <label class="col-md-2 control-label">Upload Gambar</label>
  <div class="col-md-4">
    <input type="file" class="form-control" placeholder="Unggah Gambar" name="gambar" value="<?php echo set_value('gambar') ?>" required>
  </div>
   <div class="col-md-5">
  	<button class="btn btn-success btn-lg" name="submit" type="submit">
  		<i class="fa fa-save"></i> Simpan
  	</button>
  	<button class="btn btn-info btn-lg" name="reset" type="reset">
  		<i class="fa fa-times"></i> Reset
  	</button>
  </div>
</div>

<?php echo form_close(); ?>

<?php 
// notifikasi
if ($this->session->flashdata('sukses')) {
	echo '<p class="alert alert-success"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>';
	echo $this->session->flashdata('sukses');
	echo '</div>' ;
}
 ?>

 <table class="table table-bordered" id="example1">
 	<thead>
 		<tr>
 			<th>NO</th>
 			<th>GAMBAR</th>
 			<th>JUDUL</th>
 			<th>ACTION</th>
 		</tr>
 	</thead>
 	<tbody>
 		<tr>
 			<td>1</td>
 			<td>
 				<img src="<?php echo base_url('assets/upload/image/thumbs/'.$produk->gambar) ?>"class="img img-responsive img-thumbnail" width="150">
 			</td>
 			<td><?php echo $produk->nama_produk ?></td>
 			<td>
 				
 			</td>
 		</tr>

 		<?php $no=2; foreach ($gambar as $gambar ) { ?>
 		<tr>
 			<td><?php echo $no++ ?></td>
 			<td>
 				<img src="<?php echo base_url('assets/upload/image/thumbs/'.$gambar->gambar) ?>"class="img img-responsive img-thumbnail" width="150">
 			</td>
 			<td><?php echo $gambar->judul_gambar ?></td>
 			<td>
 				<a href="<?php echo base_url('admin/produk/delete_gambar/'. $produk->id_produk.'/'.$gambar->id_gambar) ?>" class="btn btn-danger btn-primary col-sm-8" onclick="return confirm('Yakin Ingin Menghapus Gambar Ini ?')"><i class="fa fa-trash-o"></i> Hapus</a>
 			</td>
 		</tr>
 		<?php } ?>
 	</tbody>
 </table>