<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registrasi extends CI_Controller {

	// Load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('pelanggan_model');
	}

	// Halaman Registrasi
	public function index()
	{
		// validasi tambah
		$valid = $this->form_validation;

		$valid->set_rules('nama_pelanggan','Nama Lengkap','required',
			array( 	'required'		=> '%s harus diisi'));

		$valid->set_rules('email','Email','required|valid_email|is_unique[pelanggan.email]',
			array( 	'required'		=> '%s harus diisi',
					'valid_email'	=> '%s tidak valid',
					'is_unique'		=> '%s Sudah Terdaftar'));

		$valid->set_rules('password','Password','required',
			array( 'required'	=> '%s harus diisi'));

		if ($valid->run()===FALSE) {
			// end validasi

		$data = array(	'title' => 	'Registrasi Pelanggan' ,
						'isi'	=>	'registrasi/list'
						);
		$this->load->view('home/layout/wrapper', $data, FALSE);

		// masuk Database
			}else{
				$i= $this->input;
				$data = array(	'status_pelanggan'	=>	'pending',
								'nama_pelanggan'	=>	$i->post('nama_pelanggan'),
								'email'				=>	$i->post('email'),
								'password'			=>	SHA1($i->post('password')),
								'telepon'			=>	$i->post('telepon'),
								'alamat'			=>	$i->post('alamat'),
								'tanggal_daftar'	=>	date('Y-m-d H:i:s')
							);
				$this->pelanggan_model->tambah($data);
				$this->session->set_flashdata('sukses', 'Registrasi berhasil');
				redirect(base_url('registrasi/sukses'),'refresh');
		}
		// end masuk database
	}

	public function sukses()
	{
		$data = array(	'title' => 	'Registrasi berhasil' ,
						'isi'	=>	'registrasi/sukses'
						);
		$this->load->view('home/layout/wrapper', $data, FALSE);
	}

}

/* End of file Registrasi.php */
/* Location: ./application/controllers/Registrasi.php */