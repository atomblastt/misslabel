<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dasbor extends CI_Controller {

	// load model
	public function __construct()
	{
		parent::__construct();
		// proteksi halaman 
		$this->simple_login->cek_login();
		$this->load->model('produk_model');
		$this->load->model('kategori_model');
	}
	
	// halaman dashbor admin
	public function index(){
		$total_produk			= 	$this->produk_model->total_produk();
		$total_user				= 	$this->user_model->total_user();
		$total_kategori_dasbor	= 	$this->produk_model->total_kategori_dasbor();
		// print_r($total_kategori_dasbor);
		// die();

		$data = array( 	'title' 				=> 	'Dashboard',
						'total_produk'			=>	$total_produk,
						'total_user'			=>	$total_user,
						'total_kategori_dasbor'	=>	$total_kategori_dasbor,
						'isi'					=>	'admin/dasbor/list' 
						);
			$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

}
