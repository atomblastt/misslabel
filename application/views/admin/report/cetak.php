<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $title ?></title>
  <style type="text/css" media="print">
  	body{
  		font-family: Arial;
  		font-size: 12px;
  	}
  	.cetak{
  		width: 19cm;
  		height: 27cm;
  		padding: 1cm;
  	}
  	table{
  		border: solid thin #000;
  		border-collapse: collapse;
  	}
  	td, th{
  		padding: 3mm 6mm;
  		text-align: left;
  		vertical-align: top;
  	}
  	th{
  		background-color: #F5F5F5;
  		font-weight: bold;
  	}
  	h1{
  		text-align: center;
  		font-size: 18px;
  		text-transform: uppercase;
  	}
  </style>
  <style type="text/css" media="screen">
  	body{
  		font-family: Arial;
  		font-size: 12px;
  	}
  	.cetak{
  		width: 19cm;
  		height: 27cm;
  		padding: 1cm;
  	}
  	table{
  		border: solid thin #000;
  		border-collapse: collapse;
  	}
  	td, th{
  		padding: 3mm 6mm;
  		text-align: left;
  		vertical-align: top;
  	}
  	th{
  		background-color: #F5F5F5;
  		font-weight: bold;
  	}
  	h1{
  		text-align: center;
  		font-size: 18px;
  		text-transform: uppercase;
  	}
  </style>
</head>
<body onload="print()">
	<div class="cetak">
		<h1>Detail <?php echo $title ?> Miss Label Indonesia</h1>
			<table class="table table-bordered" id="example1">
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
      <h3>Total Pendapatan : Rp.<?php echo number_format($total->total, '0',',','.') ?>,00</h3>
	</div>
  <script src="js/scripts.js"></script>
</body>
</html>