<!-- Cart -->
<section class="cart bgwhite p-t-70 p-b-100">
<div class="container">
<!-- Cart item -->
<h1><?php echo $title ?></h1><hr>
<br>
<br>
<div class="container-table-cart pos-relative">
<div class="wrap-table-shopping-cart bgwhite">

	<?php if ($this->session->flashdata('sukses')) {
		echo '<div class="alert alert-success"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>';
		echo $this->session->flashdata('sukses');
		echo '</div>';
	} 
	 ?>
	<table class="table-shopping-cart">
		<tr class="table-head">
			<th class="column-1">GAMBAR</th>
			<th class="column-2">PRODUK</th>
			<th class="column-3">HARGA</th>
			<th class="column-4 p-l-70" width="20%">JUMLAH</th>
			<th class="column-5" width="15%">TOTAL</th>
			<th class="column-6" width="15%">UPDATE / HAPUS</th>
		</tr>

		<?php 
		//looping data keranjang belanja
		foreach ($keranjang as $keranjang) {	
			// ambil data produk
			$id_produk	=	$keranjang['id'];
			$produk 	=	$this->produk_model->detail($id_produk);
			//form update
			echo form_open(base_url('belanja/update_cart/'.$keranjang['rowid']));
		?>

		<tr class="table-row">
			<td class="column-1">
				<div class="cart-img-product b-rad-4 o-f-hidden">
					<img src="<?php echo base_url('assets/upload/image/thumbs/'.$produk->gambar) ?>" alt="<?php echo $keranjang['name'] ?>">
				</div>
			</td>
			<td class="column-2"><?php echo $keranjang['name'] ?></td>
			<td class="column-3">Rp.<?php echo number_format($keranjang['price'],'0',',','.') ?></td>
			<td class="column-4">
				<div class="flex-w bo5 of-hidden w-size17">
					<button type="submit" value="submit" class="btn-num-product-down color2 flex-c-m size7 bg8 eff2">
						<i class="fs-12 fa fa-minus" aria-hidden="true"></i>
					</button>

					<input class="size8 m-text18 t-center num-product" type="number" name="qty" id="qty" value="<?php echo $keranjang['qty'] ?>">

					<button type="submit" value="submit" class="btn-num-product-up color2 flex-c-m size7 bg8 eff2">
						<i class="fs-12 fa fa-plus" aria-hidden="true"></i>
					</button>
				</div>
			</td>
			 <td class="column-5" id="total">Rp <?php 
			$sub_total = $keranjang['price'] * $keranjang['qty'];
			echo number_format($sub_total,'0',',','.');
			 ?>	
			</td>

			<td>
				 <div class="margin">
                <div class="btn-group">
                  <button type="submit" class="btn btn-info dropdown-toggle btn-sm" data-toggle="dropdown">
                    Action
                  </button>
                  <ul class="dropdown-menu">
                    <p><li><button	type="submit" name="hapus" class="btn btn-default btn-sm col-md-12"><i class="fa fa-edit"></i> Update</a></li></p>
                    <li class="col-md-12">--------------------</li>
                    <li><a href="<?php echo base_url('belanja/hapus/'.$keranjang['rowid']) ?>" class="btn btn-default btn-sm col-md-12"><i class="fa fa-trash-o"></i> Hapus</a></li>
                  </ul>
                </div>
			</td>
		</tr>

		<?php
		echo form_close(); 
		} 
		?>

		<tr class="table-row">
			<td  colspan="4" class="column-1"><b>TOTAL BELANJA</b></td>
			<td  colspan="2" class="column-2">Rp <?php echo number_format($this->cart->total(),'0',',','.') ?></td>
		</tr>

	</table>
	<br>
	<?php if (empty($keranjang)): ?>
		<p class="pull-right col-sm-5" >
			<a href="<?php echo base_url('belanja/hapus') ?>" class="btn btn-danger btn-group-sm disabled">
				<i class="fa fa-trash-o"></i> Bersihkan Keranjang Belanja
			</a>
			<a href="<?php echo base_url('belanja/checkout') ?>" class="btn btn-success btn-group-sm disabled">
				<i class="fa fa-check-square-o"></i> Checkout
			</a>
	<?php else: ?>
		<p class="pull-right col-sm-5" >
			<a href="<?php echo base_url('belanja/hapus') ?>" class="btn btn-danger btn-group-sm ">
				<i class="fa fa-trash-o"></i> Bersihkan Keranjang Belanja
			</a>
			<a href="<?php echo base_url('belanja/checkout') ?>" class="btn btn-success btn-group-sm ">
				<i class="fa fa-check-square-o"></i> Checkout
			</a>
	<?php endif ?>
</div>
<div class="flex-w flex-sb-m p-t-25 p-b-25 bo8 p-l-35 p-r-60 p-lr-15-sm">
<div class="flex-w flex-m w-full-sm">
	
</div>

</div>

</div>
</section>

