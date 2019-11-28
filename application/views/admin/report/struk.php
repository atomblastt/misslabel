<!doctype html>
<html>
<head>
  <?php 
      $i= $this->input;
      $bayar = $i->post('bayar');
      $t = $this->cart->total();
      $kembali = $bayar - $t;
       
      $row['bayar']  = $bayar;
      $row['kembalian'] = $kembali;
       ?>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title></title>
  <style type="text/css" media="print">
  	body{
  		font-family: Arial;
  		font-size: 12px;
  	}
  	.print{
  		width: 19cm;
  	}
  
  	td, th{
  		padding: 1mm 2mm;
  		text-align: left;
  		/*vertical-align: top;*/
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
<body onload="print()" >
      <div class="text-center">
        <img src="<?php echo base_url('assets/upload/image/icon2.png') ?>" width="300">
    <h3>Lantai 2 Blok B11a no 5 Thamrin City, Jakarta, Indonesia</h3>
    <h3>Instagram - @misslabelindonesia.id</h3>
    <h3>Kontak/Wa - 082384637403</h3>
    <br>
    <table  border="0" cellpadding="0" cellspacing="0">
    <?php $no=1; foreach ($this->cart->contents() as $r ) { ?>            
      <tr>
        <td><h3><?php echo $r['name'] ?></h3></td>
        <td><h3><?php echo $r['qty'] ?></h3></td>
        <td><h3>Rp.<?php echo number_format($r['price'], '0',',','.') ?></h3></td>
        <td><h3>=</h3></td>
        <td><h3>Rp.<?php echo number_format($r['subtotal'], '0',',','.') ?></h3></td>
    </tr>
    <?php } ?>
     </table> 
              <br>

      <h3><label>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Total (Rp.) : </label><?php echo number_format($this->cart->total(),0,',','.') ?>,00</h3>
      
      <h3><label>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Tunai (Rp.) : </label><?php echo number_format($row['bayar'],0,',','.') ?>,00</h3>  
     <p>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;------------------------------------------</p> 
      <h3><label>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Kembali (Rp.) : </label><?php echo number_format($row['kembalian'],0,',','.') ?>,00</h3>
</div>
  <script src="js/scripts.js"></script>
</body>
</html>