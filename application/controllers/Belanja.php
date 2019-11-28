<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Belanja extends CI_Controller {

	// load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('produk_model');
		$this->load->model('kategori_model');
		$this->load->model('konfigurasi_model');
		$this->load->model('pelanggan_model');
		$this->load->model('header_transaksi_model');
		$this->load->model('transaksi_model');
		// laod helper Random string untuk kdoe transaksi
		$this->load->helper('string');
	}

	//halaman belanja 
	public function index()
	{
		$keranjang 	=	$this->cart->contents();

		$data = array(	'title' 	=> 	'KERANJANG BELANJA',
						'keranjang'	=>	$keranjang,
						'isi'		=>	'belanja/list'
						 );
		$this->load->view('home/layout/wrapper', $data, FALSE);
	}
	//halaman belanja 
	public function sukses()
	{

		$data = array(	'title' 	=> 	'SUKSES BELANJA',
						'isi'		=>	'belanja/sukses'
						 );
		$this->load->view('home/layout/wrapper', $data, FALSE);
	}

	// checout
	public function checkout()
	{
		// check pelanggan susdah login atau belum
		// kalau sudah login
		if($this->session->userdata('email')) {
			$email 			= $this->session->userdata('email');
			$nama_pelanggan	= $this->session->userdata('nama_pelanggan');
			$pelanggan 		= $this->pelanggan_model->sudah_login($email,$nama_pelanggan);

			$keranjang 	=	$this->cart->contents();

			// validasi tambah
			$valid = $this->form_validation;

			$valid->set_rules('nama_pelanggan','Nama Lengkap','required',
				array( 	'required'		=> '%s harus diisi'));

			$valid->set_rules('telepon','Nomor Telepon','required',
				array( 	'required'		=> '%s harus diisi'));

			$valid->set_rules('alamat','Alamat Lengkap','required',
				array( 	'required'		=> '%s harus diisi'));

			$valid->set_rules('email','Email','required|valid_email',
				array( 	'required'		=> '%s harus diisi',
						'valid_email'	=> '%s tidak valid'));

			if ($valid->run()===FALSE) {
				// end validasi

			$data = array(	'title' 	=> 	'Checkout',
							'keranjang'	=>	$keranjang,
							'pelanggan'	=>	$pelanggan,
							'isi'		=>	'belanja/checkout'
							 );
			$this->load->view('home/layout/wrapper', $data, FALSE);
			// masuk database
			}else{
				$i= $this->input;
				$data = array(	'id_pelanggan'		=>	$pelanggan->id_pelanggan,
								'nama_pelanggan'	=>	$i->post('nama_pelanggan'),
								'email'				=>	$i->post('email'),
								'telepon'			=>	$i->post('telepon'),
								'alamat'			=>	$i->post('alamat'),
								'kode_transaksi'	=>	$i->post('kode_transaksi'),
								'tanggal_transaksi'	=>	$i->post('tanggal_transaksi'),
								'jumlah_transaksi'	=>	$i->post('jumlah_transaksi'),
								'status_bayar'		=>	'Belum',
								'tanggal_post'		=>	date('Y-m-d H:i:s')
							);
				// proses masuk ke tabel Header_transaksi
				$this->header_transaksi_model->tambah($data);
				// proses masuk ke tabel Transaksi
				foreach ($keranjang as $keranjang) {
					$sub_total = $keranjang['price'] * $keranjang['qty'];
					$data = array(	'id_pelanggan' 		=> 	$pelanggan->id_pelanggan,
									'kode_transaksi'	=>	$i->post('kode_transaksi'),
									'id_produk'			=>	$keranjang['id'],
									'harga'				=>	$keranjang['price'],
									'jumlah'			=>	$keranjang['qty'],
									'total_harga'		=>	$sub_total,
									'tanggal_transaksi'	=>	$i->post('tanggal_transaksi'),
								);
						$this->transaksi_model->tambah($data);
				}
				// End proses masuk ke tabel transaksi

				// setelah data masuk ke tabel transaksi , maka keranjang akan di kosongkan
				$this->cart->destroy();
				// end pengosongan kernjang
				$this->session->set_flashdata('sukses', 'Checkout telah di lakukan');
				redirect(base_url('belanja/sukses'),'refresh');
		}
			// end masuk database
		}else{
		// kalau belum login
			$this->session->set_flashdata('sukses', 'Silahkan Login atau Registrasi terlebih dahulu');
			redirect(base_url('registrasi'),'refresh');
		}
	}

	// Tambah ke Keranjang Belanja / add
	public function add()
	{
		// ambil data dari form
		$id 			=	$this->input->post('id');
		$qty 			=	$this->input->post('qty');
		$price 			=	$this->input->post('price');
		$name 			=	$this->input->post('name');
		$redirect_page 	=	$this->input->post('redirect_page');

		// proses masuk ke keranjang
		$data = array(	'id' 		=>  $id,
						'qty' 		=>  $qty,
						'price' 	=>  $price,
						'name' 		=>  $name
						);
		$this->cart->insert($data);
		// redirect setelah mengisi belanjaan
		redirect($redirect_page,'refresh');
	}

	public function update_cart($rowid)
	{
		if($rowid){
			$data = array(	'rowid' => $rowid,
							'qty'	=> $this->input->post('qty')
			 );
			$this->cart->update($data);
			$this->session->set_flashdata('sukses', 'Data Keranjang Berhasil Di Update');
			redirect(base_url('belanja'),'refresh');
		}else{
			redirect(base_url('belanja'),'refresh');
		}
	}
	
	public function hapus($rowid='')
	{
		if($rowid){
			// HAPUS SATU KERANJANG BELANJA
			$this->cart->remove($rowid);
			$this->session->set_flashdata('sukses', 'Data Keranjang Berhasil Di Hapus');
			redirect(base_url('belanja'),'refresh');
		}else{
			// HAPUS SEMUA KERANJANG BELANJA
			$this->cart->destroy();
			$this->session->set_flashdata('sukses', 'Data Keranjang Berhasil Di Hapus');
			redirect(base_url('belanja'),'refresh');
		}
	}
}