<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kasir extends CI_Controller {

	public function index()
	{
		$this->load->model('kasir_model');

		$barang = $this->kasir_model->get();

		$data = array( 	'title' 				=> 	'Kasir Miss Label',
						'barang'				=> 	$barang,
						'isi'					=>	'admin/kasir/list' 
						);
			$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function getbarang($id)
	{

		$this->load->model('kasir_model');

		$barang = $this->kasir_model->get_by_id($id);

		if ($barang) {

			echo '<div class="form-group">
				      <label class="control-label col-md-3" 
				      	for="nama_produk">Nama Barang :</label>
				      <div class="col-md-8">
				        <input type="text" class="form-control reset" 
				        	name="nama_produk" id="nama_produk" 
				        	value="'.$barang->nama_produk.'"
				        	readonly="readonly">
				      </div>
				    </div>
				    <div class="form-group">
				      <label class="control-label col-md-3" 
				      	for="harga">Harga (Rp) :</label>
				      <div class="col-md-8">
				        <input type="text" class="form-control reset" id="harga" name="harga" 
				        	value="'.number_format( $barang->harga, 0 ,
				        	 '' , '.' ).'" readonly="readonly">
				      </div>
				    </div>
				    <div class="form-group">
				      <label class="control-label col-md-3" 
				      	for="qty">Quantity :</label>
				      <div class="col-md-4">
				        <input type="text" class="form-control reset" 
				        	name="qty" placeholder="Isi qty..." min="0"
				        	id="qty" onchange="subTotal(this.value)" 
				        	onkeyup="subTotal(this.value)">
				      </div>
				    </div>

				    <div class="form-group">
				      <label class="control-label col-md-3" 
				      	for="jumlah">Stok</label>
				      <div class="col-md-4">
				        <input type="text" class="form-control reset" 
				        	name="jumlah" placeholder="Isi qty..."  
				        	id="jumlah" value="'.$barang->stok.'">
				      </div>
				    </div>';

				    ;


	    }else{

	    	echo '<div class="form-group">
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
				    </div>';
	    }

	}

	public function ajax_list_transaksi()
	{

		$data = array();

		$no = 1; 
        
        foreach ($this->cart->contents() as $items){
        	
			$row = array();
			$row[] = $no;
			$row[] = $items["id"];
			$row[] = $items["name"];
			$row[] = 'Rp. ' . number_format( $items['price'], 
                    0 , '' , '.' ) . ',-';
			$row[] = $items["qty"];
			$row[] = 'Rp. ' . number_format( $items['subtotal'], 
					0 , '' , '.' ) . ',-';

			//add html for action
			$row[] = '<a 
				href="javascript:void()" style="color:rgb(255,128,128);
				text-decoration:none" onclick="deletebarang('
					."'".$items["rowid"]."'".','."'".$items['subtotal'].
					"'".')"> <i class="fa fa-close"></i> Delete</a>';
		
			$data[] = $row;
			$no++;
        }
        // print_r($data);
        // die();

		$output = array(
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	// print_r($data);
	// 	die();
	}

	public function addbarang()
	{

		$data = array(
				'id' => $this->input->post('kode_produk'),
				'name' => $this->input->post('nama_produk'),
				'price' => str_replace('.', '', $this->input->post(
					'harga')),
				'qty' => $this->input->post('qty'),
				'bayar'=> $this->input->post('bayar'),
				'kembali' => $this->input->post('kembalian'),
			);
		$insert = $this->cart->insert($data);
		echo json_encode(array("status" => TRUE));
	
	}

	public function save_transaksi()
	{
		
			$tgl = date('Y-m-d');
        	$i= $this->input;
			$bayar = $i->post('bayar');
			$t = $this->cart->total();
			$kembali = $bayar - $t;
		foreach ($this->cart->contents() as $items){
			$row = array();
			$row['kode_produk'] = $items["id"];
			$row['nama'] = $items["name"];
			$row['harga'] = $items['price'];
			$row['qty'] = $items["qty"];
			$row['sub_total'] = $items['subtotal'];
			$row['bayar']	= $bayar;
			$row['kembalian']	= $kembali;
			$row['tanggal_transaksi'] = $tgl;

			$data[] = $row;

			// print_r($data);
			// die();
	}	


		$this->transaksi_kasir_model->insert_transaksi($data);
		$this->session->set_flashdata('sukses', 'Data Berhasil Di Simpan');
		$this->load->view('admin/report/struk', $data,$row, FALSE);
		$this->cart->destroy();
		
}
		


	public function deletebarang($rowid) 
	{

		$this->cart->update(array(
				'rowid'=>$rowid,
				'qty'=>0,));
		echo json_encode(array("status" => TRUE));
	}

	public function struk()
		{
			$i= $this->input;
			$bayar = $i->post('bayar');
			$t = $this->cart->total();
			$kembali = $bayar - $t;
		foreach ($this->cart->contents() as $items){
			$row = array();
			$row['kode_produk'] = $items["id"];
			$row['nama'] = $items["name"];
			$row['harga'] = $items['price'];
			$row['qty'] = $items["qty"];
			$row['sub_total'] = $items['subtotal'];
			$row['bayar']	= $bayar;
			$row['kembalian']	= $kembali;

			$data[] = $row;
	}	
		print_r($data);
		die();
	
		
		}
}