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
  </style>
  <style media="screen">
  	
  </style>
</head>
<body onload="print()">
  <center>
    <h1><?php echo $title ?> Miss Label Indonesia</h1>
      </center>
      <table border="1" cellpadding="10">
          <thead>
            <tr>
              <th width="300px">NO</th>
              <th width="300px">NAMA PRODUK</th>
              <th width="300px">KODE PRODUK</th>
              <th width="300px">BARCODE</th>
            </tr>
          </thead>
          <tbody>
            <?php $no=1; foreach ($produk as $r ) { ?>
            <tr>
              <td align="center"><?php echo $no++ ?></td>
              <td align="center"><?php echo $r->nama_produk ?></td>
              <td align="center"><?php echo $r->kode_produk ?></td>
              <td align="center">
                <img src="<?php echo site_url('admin/produk/gambar_barcode_detail/'.$r->kode_produk) ?>">
              </td>
            </tr>
            <?php } ?>
          </tbody>
      </table>
  <script src="js/scripts.js"></script>
</body>
</html>