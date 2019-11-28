<!-- <?php 
	// if(isset($item)) {
	// foreach($item as $i){
		// echo $i;
	// }
// } else
		// echo "Kosong";
//print_r($this->session->cart); ?> -->

<!-- end header -->

	<div class="col-md-12">
		 	<form class="form-horizontal" id="form_transaksi" role="form">
	      	<div class="col-md-8">
			    <!-- <div class="panel panel-default">
				  <div class="panel-body"> -->
	      		<!-- <div class="form-group">
			      <label class="control-label col-md-4" 
			      	for="tgl_transaksi">Tgl.Transaksi :</label>
			      <div class="col-md-5">
			        <input type="text" class="form-control" 
			        	name="tgl_transaksi" value="<?= date('d-m-Y') ?>" 
			        	readonly="readonly">
			      </div>
			    </div> -->

			    

			    <div class="form-group">
			      <label class="control-label col-md-3" 
			      	for="kode_produk">Kode Produk :</label>
			      <div class="col-md-5">
			        <input list="list_barang" class="form-control reset" 
			        	placeholder="Isi id..." name="kode_produk" id="kode_produk" 
			        	autocomplete="off" onchange="showBarang(this.value)" autofocus>
	                  <datalist id="list_barang">
	                  	<?php foreach ($barang as $barang): ?>
	                  		<option value="<?= $barang->kode_produk ?>"><?= $barang->nama_produk ?></option>
	                  	<?php endforeach ?>
	                  </datalist>
			      </div>
			      <div class="col-md-1">
			      	<a href="javascript:;" class="btn btn-primary" 
			      		data-toggle="modal" 
			      		data-target="#modal-cari-barang">
			      		<i class="fa fa-search"></i></a>
		          </div>
			    </div>
			    <div id="barang">
				    <div class="form-group">
				      <label class="control-label col-md-3" 
				      	for="nama_produk">Nama Barang :</label>
				      <div class="col-md-8">
				        <input type="text" class="form-control reset" 
				        	name="nama_produk" id="nama_produk" 
				        	readonly="readonly">
				      </div>
				    </div>
				    <div class="form-group">
				      <label class="control-label col-md-3" 
				      	for="harga">Harga (Rp) :</label>
				      <div class="col-md-8">
				        <input type="text" class="form-control reset" 
				        	name="harga" id="harga" 
				        	readonly="readonly">
				      </div>
				    </div>
				    <div class="form-group">
				      <label class="control-label col-md-3" 
				      	for="qty">Quantity :</label>
				      <div class="col-md-4">
				        <input type="number" class="form-control reset" 
				        	autocomplete="off" onchange="subTotal(this.value)" 
				        	onkeyup="subTotal(this.value)" id="qty" min="0" 
				        	name="qty" placeholder="Isi qty...">
				      </div>
				    </div>
			    </div><!-- end id barang -->
			    <div class="form-group">
			      <label class="control-label col-md-3" 
			      	for="sub_total">Sub-Total (Rp):</label>
			      <div class="col-md-8">
			        <input type="text" class="form-control reset" 
			        	name="sub_total" id="sub_total" 
			        	readonly="readonly">
			      </div>
			    </div>
			    <div class="form-group">
			    	<div class="col-md-offset-3 col-md-3">
			      		<button type="button" class="btn btn-primary" 
			      		id="tambah" onclick="addbarang()">
			      		  <i class="fa fa-cart-plus"></i> Tambah</button>
			    	</div>
			    </div>
			      <!-- </div>
			    </div> --><!-- end panel-->
	      	</div><!-- end col-md-8 -->
	      	<div class="col-md-4 mb">
				<div class="col-md-12">
				  	<div class="form-group">
				      <label for="total" class="besar">Total (Rp) :</label>
				      	<input type="text" class="form-control input-lg" 
			        	name="total" id="total" placeholder="0"
			        	readonly="readonly"  value="<?= number_format( 
                    	$this->cart->total(), 0 , '' , '.' ); ?>">
				    </div>
				    <div class="form-group">
				      <!-- <label for="bayar" class="besar">Bayar (Rp) :</label> -->
				        <input type="hidden" class="form-control input-lg uang" 
				        	name="bayar" placeholder="0" autocomplete="off"
				        	id="bayar" onkeyup="showKembali(this.value)">
				    </div>
				    <div class="form-group">
				      <!-- <label for="kembali" class="besar">Kembali (Rp) :</label> -->
				      	<input type="hidden" class="form-control input-lg" 
			        	name="kembali" id="kembali" placeholder="0"
			        	readonly="readonly">
				    </div>
				</div>
	      	</div><!-- end col-md-4 -->
	      	</form>
<!-- form open -->
<?php 
echo form_open_multipart(base_url('admin/kasir/save_transaksi'),' class="form-horizontal" target="_blank"');
?>
	      	<table id="table_transaksi" class="table table-striped 
	      		table-bordered">
				<thead>
				 	<tr>
					   	<th>No</th>
					   	<th>Kode Produk</th>
					   	<th>Nama Barang</th>
					   	<th>Harga</th>
					   	<th>Quantity</th>
					   	<th>Sub-Total</th>
					   	<th>Aksi</th>
				 	</tr>
				</thead>
				<tbody>
				</tbody>
			</table>
		
				<br>
			<div class="form-group">
			  <label class="col-md-2 control-label">Bayar :</label>
			  <div class="col-md-5">
			    <input type="number" class="form-control" placeholder="Bayar Belanja" name="bayar" value="<?php echo set_value('bayar') ?>">
			  </div>
			</div>
				<div class="form-group">
				  <label class="col-md-2 control-label"></label>
				  <div class="col-md-5">
				  	<button class="btn btn-success btn-lg" name="submit" type="submit">
				  		<i class="fa fa-save"></i>Simpan
				  	</button>
				  	<button class="btn btn-info btn-lg" name="reset" type="reset">
				  		<i class="fa fa-times"></i>Reset
				  	</button>
				  </div>
				</div>
<?php form_close() ?>
			
			<!-- <div class="col-md-offset-8" style="margin-top:20px">
				<button type="button" class="btn btn-primary btn-lg" 
				id="selesai" disabled="disabled" 
				onclick="">
				Selesai <i class="fa fa-angle-double-right"></i></button>
			</div> -->
	</div><!-- end col-md-9 -->
	


	