<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $title ?></title>
  <style media="print">
div.gallery {
  margin: 20px;
  border: 1px solid #ccc;
  float: left;
  width: 100px;
}

div.gallery:hover {
  border: 1px solid #777;
}

div.gallery img {
  width: 100px;
  height: 30px;
}

div.desc {
  padding: 15px;
  text-align: center;
/*}*/
</style>
</head>
<body onload="print()">
	<!-- <center> -->
   
   <?php $u=1; ?>
   <?php for ($i=1; $i <= $produk->stok; $i++) {  ?>
      
      <div class="responsive">
        <div class="gallery">
            <img src="<?php echo site_url('admin/produk/gambar_barcode_detail/'.$produk->kode_produk) ?>" width="50" height="30">
        </div>
      </div>

      <!-- <div class="box">
        <img src="<?php echo site_url('admin/produk/gambar_barcode_detail/'.$produk->kode_produk) ?>">
      </div> -->
   <?php } ?>
  <script src="js/scripts.js"></script>
</body>
</html>