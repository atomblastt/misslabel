<p>
	<a href="<?php echo base_url('admin/kategori/tambah') ?>" class="btn btn-success btn btn-lg">
		<i class="fa fa-plus"></i>Tambah Baru 
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
 			<th>NAMA</th>
 			<th>SLUG</th>
 			<th>URUTAN</th>
 			<th>ACTION</th>
 		</tr>
 	</thead>
 	<tbody>
 		<?php $no=1; $noo=1; foreach ($kategori as $kategori ) { ?>
 		<tr>
 			<td><?php echo $no++ ?></td>
 			<td><?php echo $kategori->nama_kategori ?></td>
 			<td><?php echo $kategori->slug_kategori ?></td>
 			<td><?php echo $noo++ ?></td>
 			<td>
 				<a href="<?php echo base_url('admin/kategori/edit/'. $kategori->id_kategori) ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i>Edit</a>

 				<a href="<?php echo base_url('admin/kategori/delete/'. $kategori->id_kategori) ?>" class="btn btn-danger btn-xs" onclick="return confirm('Yaking Ingin Menghapus Data ?')"><i class="fa fa-trash-o"></i>Hapus</a>
 			</td>
 		</tr>
 		<?php } ?>
 	</tbody>
 </table>