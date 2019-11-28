<?php 
// notifikasi
if ($this->session->flashdata('sukses')) {
	echo '<p class="alert alert-success"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>';
	echo $this->session->flashdata('sukses');
	echo '</div>' ;
}
 ?>
<!--  <?php print_r($report2); 

 ?> -->
 <div class="row">
 <div class="col-md-6">
  <div class="box box-warning">
    <div class="box-header with-border">
      <h4>Report Semua Transaksi</h4>
    </div>
      <div class="box-body">
        <a href="<?php echo base_url('admin/report/cetak') ?>" class="btn btn-warning btn-block"><i class="fa fa-print"></i> Cetak</a>
      </div>
  </div>
  <marquee><img src="<?php echo base_url('assets/upload/image/icon2.png') ?>" width="400"></marquee>
 </div>

  <div class="col-md-6">
  <div class="box box-info">
    <div class="box-header with-border">
      <h4>Antara Tanggal</h4>
    </div>
    <div class="box-body">

<?php
  // Notifikasi Error
echo validation_errors('<div class="alert alert-warning">','</div>');

// form open
echo form_open_multipart(base_url('admin/report/tampil_range/'),' class="form-horizontal"');
?>

<div class="form-group">
  <label class="col-md-2 control-label">Tanggal Awal</label>
  <div class="col-md-8">
    <input type="date" class="form-control" placeholder="" name="tanggal_transaksi1" required>
  </div>
</div>

  <div class="form-group">
  <label class="col-md-2 control-label">Tanggal Akhir</label>
  <div class="col-md-8">
    <input type="date" class="form-control" placeholder="" name="tanggal_transaksi2" required>
  </div>
</div>


<div class="form-group">
  <div align="center">
    <div class="col-md-12">
    <button class="btn btn-info btn-block" name="submit" type="submit">
      <i class="fa fa-print"></i> Cetak
    </button>
    </div>
  </div>
</div>


<?php echo form_close(); ?>
</div>
</div>

</div>



<div class="col-md-12">
<div class="box box-info"> 
<div class="box-body">

 <table class="table table-bordered" id="example2">
  <thead>
    <tr>
      <th>NO</th>
      <th>TANGGAL TRANSAKSI</th>
      <th>KODE PRODUK</th>
      <th>NAMA PRODUK</th>
      <th>HARGA MODAL</th>
      <th>JUMLAH BELANJA</th>
      <th>TOTAL BELANJA</th>
    </tr>
  </thead>
  <tbody>
    <?php $no=1; foreach ($report as $r ) { ?>
    <tr>
      <td><?php echo $no++ ?></td>
      <td><?php echo $r->tanggal_transaksi ?></td>
      <td><?php echo $r->kode_produk ?></td>
      <td><?php echo $r->nama ?></td>
      <td>Rp.<?php echo number_format($r->harga, '0',',','.') ?>,00</td>
      <td><?php echo $r->qty ?></td>
      <td>Rp.<?php echo number_format($r->sub_total, '0',',','.') ?>,00</td>
    </tr>
    <?php } ?>
  </tbody>
 </table>
</div>
</div>
</div>
</div>