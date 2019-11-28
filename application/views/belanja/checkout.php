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
	<?php 
	echo form_open(base_url('belanja/checkout'));

	$kode_transaksi		= date('dmY').strtoupper(random_string('alnum',8)); 
	
	?>
	
		<input type="hidden" name="id_pelanggan" value="<?php echo $pelanggan->id_pelanggan ?>">
		<input type="hidden" name="jumlah_transaksi" value="<?php echo $this->cart->total() ?>">
		<input type="hidden" name="tanggal_transaksi" value="<?php echo date('Y-m-d'); ?>">
			<table class="table">
			        <thead>
			         <tr>
			            <th width="25%">Kode Transaksi</th>
			            <th><input type="text" name="kode_transaksi" class="form-control" value="<?php echo $kode_transaksi ?>" readonly required></th>
			          </tr>
			          <tr>
			            <th width="25%">Nama Penerima</th>
			            <th><input type="text" name="nama_pelanggan" class="form-control" placeholder="Nama Lengkap" value="<?php echo $pelanggan->nama_pelanggan ?>" required></th>
			          </tr>
			        </thead>
			        <tbody>
			          <tr>
			            <td>Email</td>
			            <td><input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo $pelanggan->email ?>" required></td>
			          </tr>		
			           <tr>
			            <td>Telepon Penerima</td>
			            <td><input type="text" name="telepon" class="form-control" placeholder="Telepon" value="<?php echo $pelanggan->telepon ?>" required></td>
			          </tr>
			           <tr>
			            <td>Alamat Penerima</td>
			            <td><textarea name="alamat" class="form-control" placeholder="Alamat"><?php echo $pelanggan->alamat ?></textarea></td>
			          </tr>
			           <tr>
			            <td></td>
			              <td>
			                <button class="btn btn-success btn-lg" type="submit"><i class="fa fa-save"> Checkout</i></button>
			                <button class="btn btn-default btn-lg" type="reset"><i class="fa fa-times"> Reset</i></button>
			              </td>
			          </tr>
			        </tbody>
			      </table>

	<?php echo form_close(); ?>
</div>
<div class="flex-w flex-sb-m p-t-25 p-b-25 bo8 p-l-35 p-r-60 p-lr-15-sm">
<div class="flex-w flex-m w-full-sm">
	
</div>

</div>

</div>
</section>

