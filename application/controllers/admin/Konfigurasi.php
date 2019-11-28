<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konfigurasi extends CI_Controller {

	// LOAD MODEL
	public function __construct()
	{
		parent::__construct();
		$this->load->model('konfigurasi_model');
	}

	// konfigurasi umum
	public function index()
	{
		$konfigurasi 	=	$this->konfigurasi_model->listing();

		// validasi tambah
		$valid = $this->form_validation;

		$valid->set_rules('namaweb','Nama Website','required',
			array( 	'required'		=> 	'%s harus diisi'));

		if ($valid->run()===FALSE) {
			// end validasi

		$data = array(	'title' 		=> 'Konfigurasi Website',
						'konfigurasi'	=> $konfigurasi,
						'isi' 			=> 'admin/konfigurasi/list'
						);	
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// masuk Database
			}else{
				$i 				= $this->input;
				$data = array(	'id_konfigurasi'			=>	$konfigurasi->id_konfigurasi,
								'namaweb'					=> 	$i->post('namaweb'),
								'tagline'					=>	$i->post('tagline'),
								'email'						=>	$i->post('email'),
								'website'					=>	$i->post('website'),
								'keywords'					=>	$i->post('keywords'),
								'metatext'					=>	$i->post('metatext'),
								'telepon'					=>	$i->post('telepon'),
								'alamat'					=>	$i->post('alamat'),
								'facebook'					=>	$i->post('facebook'),
								'instagram'					=>	$i->post('instagram'),
								'deskripsi'					=>	$i->post('deskripsi'),
								'rekening_pembayaran'		=>	$i->post('rekening_pembayaran')
							);
				$this->konfigurasi_model->edit($data);
				$this->session->set_flashdata('sukses', 'Data Berhasil Di Update');
				redirect(base_url('admin/konfigurasi'),'refresh');
		}
		// end masuk database
	}

	// konfigurasi logo Website
	public function logo()
	{
		$konfigurasi 	=	$this->konfigurasi_model->listing();
		// validasi tambah
		$valid 		= 	$this->form_validation;

		$valid->set_rules('namaweb','Nama Website','required',
			array( 	'required'		=> '%s harus diisi'));
		
		if ($valid->run()) {
			// cek jika gambar diganti
			if(!empty($_FILES['logo']['name'])){

			$config['upload_path'] 		= './assets/upload/image/';
			$config['allowed_types']	= 'gif|jpg|png|jpeg';
			$config['max_size']  		= '2400'; //dalam KB
			$config['max_width']  		= '2024';
			$config['max_height']  		= '2024';
			
			$this->load->library('upload', $config);
			if (! $this->upload->do_upload('logo')){
			// end validasi

		$data = array(	'title' 		=> 'Konfigurasi Logo website',
						'konfigurasi' 	=> $konfigurasi,
						'error'			=> $this->upload->display_errors(),
						'isi' 			=> 'admin/konfigurasi/logo'
						);	
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// masuk Database
			}else{
				$upload_gambar = array('upload_data' => $this->upload->data());
				// membuat thumbnail gambar
						$config['image_library'] 	= 'gd2';
						$config['source_image'] 	= './assets/upload/image/'.$upload_gambar['upload_data']['file_name'];
						// loakasi folder thumbnail
						$config['new_image']		= './assets/upload/image/thumbs/';
						$config['create_thumb'] 	= TRUE;
						$config['maintain_ratio'] 	= TRUE;
						$config['width']         	= 1000;//pixel
						$config['height']       	= 1000;
						$config['thumb_marker']		= '';

						$this->load->library('image_lib', $config);

						$this->image_lib->resize();
				// end membuat thumbnail gambar
				$i= $this->input;
				$data = array(	'id_konfigurasi'	=>	$konfigurasi->id_konfigurasi,
								'namaweb'			=>	$i->post('namaweb'),
								'logo'			=>	$upload_gambar['upload_data']['file_name']
							);
				$this->konfigurasi_model->edit($data);
				$this->session->set_flashdata('sukses', 'Data Berhasil Di Update');
				redirect(base_url('admin/konfigurasi/logo'),'refresh');
		}}else{
			// edit Produk Tanpa Ganti Gambar
			// end membuat thumbnail gambar
				$i= $this->input;
				$data = array(	'id_konfigurasi'	=>	$konfigurasi->id_konfigurasi,
								'namaweb'			=>	$i->post('namaweb')
								//'logo'			=>	$upload_gambar['upload_data']['file_name']
							);
				$this->konfigurasi_model->edit($data);
				$this->session->set_flashdata('sukses', 'Data Berhasil Di Update');
				redirect(base_url('admin/konfigurasi/logo'),'refresh');
		}}
		// end masuk database
		$data = array(	'title' 		=> 'Konfigurasi Logo website',
						'konfigurasi' 	=> $konfigurasi,
						'isi' 			=> 'admin/konfigurasi/logo'
						);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// konfigurasi icon Website
	public function icon()
	{
		$konfigurasi 	=	$this->konfigurasi_model->listing();
		// validasi tambah
		$valid 		= 	$this->form_validation;

		$valid->set_rules('namaweb','Nama Website','required',
			array( 	'required'		=> '%s harus diisi'));
		
		if ($valid->run()) {
			// cek jika gambar diganti
			if(!empty($_FILES['icon']['name'])){

			$config['upload_path'] 		= './assets/upload/image/';
			$config['allowed_types']	= 'gif|jpg|png|jpeg';
			$config['max_size']  		= '2400'; //dalam KB
			$config['max_width']  		= '2024';
			$config['max_height']  		= '2024';
			
			$this->load->library('upload', $config);
			if (! $this->upload->do_upload('icon')){
			// end validasi

		$data = array(	'title' 		=> 'Konfigurasi icon website',
						'konfigurasi' 	=> $konfigurasi,
						'error'			=> $this->upload->display_errors(),
						'isi' 			=> 'admin/konfigurasi/icon'
						);	
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// masuk Database
			}else{
				$upload_gambar = array('upload_data' => $this->upload->data());
				// membuat thumbnail gambar
						$config['image_library'] 	= 'gd2';
						$config['source_image'] 	= './assets/upload/image/'.$upload_gambar['upload_data']['file_name'];
						// loakasi folder thumbnail
						$config['new_image']		= './assets/upload/image/thumbs/';
						$config['create_thumb'] 	= TRUE;
						$config['maintain_ratio'] 	= TRUE;
						$config['width']         	= 1000;//pixel
						$config['height']       	= 1000;
						$config['thumb_marker']		= '';

						$this->load->library('image_lib', $config);

						$this->image_lib->resize();
				// end membuat thumbnail gambar
				$i= $this->input;
				$data = array(	'id_konfigurasi'	=>	$konfigurasi->id_konfigurasi,
								'namaweb'			=>	$i->post('namaweb'),
								'icon'			=>	$upload_gambar['upload_data']['file_name']
							);
				$this->konfigurasi_model->edit($data);
				$this->session->set_flashdata('sukses', 'Data Berhasil Di Update');
				redirect(base_url('admin/konfigurasi/icon'),'refresh');
		}}else{
			// edit Produk Tanpa Ganti Gambar
			// end membuat thumbnail gambar
				$i= $this->input;
				$data = array(	'id_konfigurasi'	=>	$konfigurasi->id_konfigurasi,
								'namaweb'			=>	$i->post('namaweb')
								//'icon'			=>	$upload_gambar['upload_data']['file_name']
							);
				$this->konfigurasi_model->edit($data);
				$this->session->set_flashdata('sukses', 'Data Berhasil Di Update');
				redirect(base_url('admin/konfigurasi/icon'),'refresh');
		}}
		// end masuk database
		$data = array(	'title' 		=> 'Konfigurasi Logo website',
						'konfigurasi' 	=> $konfigurasi,
						'isi' 			=> 'admin/konfigurasi/icon'
						);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

}

/* End of file Konfigurasi.php */
/* Location: ./application/controllers/admin/Konfigurasi.php */