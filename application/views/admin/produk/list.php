<p>
	<a href="<?php echo base_url('admin/produk/tambah') ?>" class="btn btn-success btn btn-lg">
		<i class="fa fa-plus"></i>Tambah Baru 
	</a>
	<a href="<?php echo base_url('admin/produk/barcode') ?>" class="btn btn-default btn-lg">
		<i class="fa fa-barcode"></i> Barcode All
	</a>
	<a href="<?php echo base_url('admin/produk/report_barang') ?>" class="btn btn-info btn-lg">
		<i class="fa fa-print"></i> Cetak Produk
	</a>
</p>

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
 			<th>NAMA</th>
 			<th>KATEGORI</th>
 			<th>STOK BARANG</th>
 			<th>HARGA</th>
 			<th>STATUS</th>
 			<th>ACTION</th>
 		</tr>
 	</thead>
 	<tbody>
 		<?php $no=1; foreach ($produk as $produk ) { ?>
 		<tr>
 			<td><?php echo $no++ ?></td>
 			<td>
 				<img src="<?php echo base_url('assets/upload/image/thumbs/'.$produk->gambar) ?>"class="img img-responsive img-thumbnail" width="150">
 			</td>
 			<td><?php echo $produk->nama_produk ?></td>
 			<td><?php echo $produk->nama_kategori ?></td>
 			<td><?php echo $produk->stok ?></td>
 			<td>Rp.<?php echo number_format($produk->harga, '0',',','.') ?>,00</td>
 			<td><?php echo $produk->status_produk ?></td>
 			<td>
 				<a href="<?php echo base_url('admin/produk/gambar/'. $produk->id_produk) ?>" class="btn btn-info btn-primary btn-block"><i class="fa fa-image"></i> Gambar(<?php echo $produk->total_gambar ?>)</a>
 				<br>
 				<a href="<?php echo base_url('admin/produk/edit/'. $produk->id_produk) ?>" class="btn btn-warning btn-primary btn-block"><i class="fa fa-edit"></i> Edit</a>
 				<br>
 				<a href="<?php echo base_url('admin/produk/barcode_detail/'.$produk->kode_produk) ?>" class="btn btn-success btn-block"><i class="fa fa-barcode"></i> Barcode</a>
 				<br>
 				<?php include('delete.php'); ?>
 			</td>
 		</tr>
 		<?php } ?>
 	</tbody>
 </table>