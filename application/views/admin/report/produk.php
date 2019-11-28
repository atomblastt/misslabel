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
    .print{
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
      text-align: center;
      vertical-align: top;
    }
    th{
      background-color: yellow;
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
  		text-align: center;
  		vertical-align: top;
  	}
  	th{
  		background-color: yellow;
  		font-weight: bold;
  	}
  	h1{
  		text-align: center;
  		font-size: 18px;
  		text-transform: uppercase;
  	}
    img{
      text-align: center;
    }
  </style>
</head>
<body onload="print()">
  <div class="cetak">
  <center>
  <img src="<?php echo base_url('assets/upload/image/icon2.png') ?>" width="200">
  </center>
		<h1><?php echo $title ?></h1>
			<table border="1">
				 	<thead>
				 		<tr style="background-color: yellow">
				 			<th>NO</th>
				 			<th>NAMA PRODUK</th>
				 			<th>STOK AWAL</th>
				 			<th>STOK SISA</th>
				 			<th>BANYAK TERJUAL</th>
				 		</tr>
				 	</thead>
				 	<tbody>
				 		<?php $no=1; foreach ($terjual as $r ) { ?>
              <?php $awal = $r->stok + $r->terjual; ?>
				 		<tr>
				 			<td><?php echo $no++ ?></td>

				 			<td><b><?php echo $r->nama_produk ?></b></td>
				 			
              <td>
                <?php if (!$r->terjual): ?>
                  <?php echo $r->stok ?> Pcs
                <?php else: ?>
                <?php echo $awal ?> Pcs
                <?php endif ?>
              </td>
				 			
              <td><?php echo $r->stok ?> Pcs</td>
          
            <?php if ($r->stok == $awal): ?>

              <td><b><font color="red">BELUM ADA YANG TERJUAL</font></b></td>

            <?php elseif($r->stok == 0): ?>

              <td style="background-color: green"><font color="green"><b>BARANG HABIS TERJUAL</b></font></td>
            
            <?php else: ?>

              <td><?php echo $r->terjual?> Pcs</td>
            
            <?php endif ?>
		 		
            </tr>
				 		<?php } ?>
				 	</tbody>
 			</table>
	</div>
  <script src="js/scripts.js"></script>
</body>
</html>