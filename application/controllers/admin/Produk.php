<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {
	
	// laod model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('produk_model');
		$this->load->model('kategori_model');
		$this->load->model('transaksi_kasir_model');
		$this->load->library('Zend');
		// proteksi halaman 
		$this->simple_login->cek_login();
	}

	// data produk
	public function index()
	{
		$produk = $this->produk_model->listing();

		$data = array(	'title' => 'Data Produk' ,
						'produk' 	=> $produk ,
						'isi' 	=> 'admin/produk/list'
						);	
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// gambar
	public function gambar($id_produk)
	{
		$produk 	=	$this->produk_model->detail($id_produk);
		$gambar 	=	$this->produk_model->gambar($id_produk);

		// validasi tambah
		$valid = $this->form_validation;

		$valid->set_rules('judul_gambar','Judul / Nama Gambar','required',
			array( 	'required'		=> '%s harus diisi'));

		if ($valid->run()) {
			$config['upload_path'] 		= './assets/upload/image/';
			$config['allowed_types']	= 'gif|jpg|png|jpeg';
			$config['max_size']  		= '2400'; //dalam KB
			$config['max_width']  		= '2024';
			$config['max_height']  		= '2024';
			
			$this->load->library('upload', $config);
			if (! $this->upload->do_upload('gambar')){
			// end validasi

		$data = array(	'title' 	=> 'Tambah Gambar Produk:	'.$produk->nama_produk,
						'produk' 	=> $produk,
						'gambar' 	=> $gambar,
						'error'		=> $this->upload->display_errors(),
						'isi' 		=> 'admin/produk/gambar'
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
				$data = array(	'id_produk'			=>	$id_produk,
								'judul_gambar'		=>	$i->post('judul_gambar'),
								'gambar'			=>	$upload_gambar['upload_data']['file_name']
							);
				$this->produk_model->tambah_gambar($data);
				$this->session->set_flashdata('sukses', 'Data Gambar Berhasil Di tambahkan');
				redirect(base_url('admin/produk/gambar/'	.$id_produk),'refresh');
		}}
		// end masuk database
		$data = array(	'title' 	=> 'Tambah Gambar Produk:	'.$produk->nama_produk,
						'produk' 	=> $produk,
						'gambar' 	=> $gambar,
						'isi' 		=> 'admin/produk/gambar'
						);	
		$this->load->view('admin/layout/wrapper', $data, FALSE);

	}

	// Tambah produk
	public function tambah()
	{
		// Memanggil data join kategori dari database
		$kategori = $this->kategori_model->listing();
		// validasi tambah
		$valid = $this->form_validation;

		$valid->set_rules('nama_produk','Nama Produk','required',
			array( 	'required'		=> '%s harus diisi'));

		$valid->set_rules('kode_produk','Kode Produk','required|is_unique[produk.kode_produk]',		
			array( 	'required'		=> 	'%s harus diisi',
					'is_unique'		=>	'%s Data Sudah Ada, Masukan Data Produk Baru'));
		
		if ($valid->run()) {
			$config['upload_path'] 		= './assets/upload/image/';
			$config['allowed_types']	= 'gif|jpg|png|jpeg';
			$config['max_size']  		= '2400'; //dalam KB
			$config['max_width']  		= '2024';
			$config['max_height']  		= '2024';
			
			$this->load->library('upload', $config);
			if (! $this->upload->do_upload('gambar')){
			// end validasi

		$data = array(	'title' 	=> 'Tambah Produk' ,
						'kategori' 	=> $kategori,
						'error'		=> $this->upload->display_errors(),
						'isi' 		=> 'admin/produk/tambah'
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
				// slug produk
				$slug_produk = url_title($this->input->post('nama_produk').'_'.$this->input->post('kode_produk'), 'dash', TRUE);
				$data = array(	'id_user'			=>	$this->session->userdata('id_user'),
								'id_kategori'		=>	$i->post('id_kategori'),
								'kode_produk'		=>	$i->post('kode_produk'),
								'nama_produk'		=>	$i->post('nama_produk'),
								'slug_produk'		=>	$slug_produk,
								'keterangan'		=>	$i->post('keterangan'),
								'keywords'			=>	$i->post('keywords'),
								'harga'				=>	$i->post('harga'),
								'stok'				=>	$i->post('stok'),
								'gambar'			=>	$upload_gambar['upload_data']['file_name'],
								'berat'				=>	$i->post('berat'),
								'ukuran'			=>	$i->post('ukuran'),
								'status_produk'		=>	$i->post('status_produk'),
								'tanggal_post'		=>	date('Y-m-d H:i:s')
							);
				$this->produk_model->tambah($data);
				$this->session->set_flashdata('sukses', 'Data Berhasil Di Simpan');
				redirect(base_url('admin/produk'),'refresh');
		}}
		// end masuk database
		$data = array(	'title' 	=> 'Tambah Produk',
						'kategori' 	=> $kategori,
						'isi' 		=> 'admin/produk/tambah'
						);	
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}
	// edit produk
	public function edit($id_produk)
	{
		// ambil data produk yang akan di edit
		$produk 	=	$this->produk_model->detail($id_produk);
		// Memanggil data join kategori dari database
		$kategori 	= 	$this->kategori_model->listing();
		// validasi tambah
		$valid 		= 	$this->form_validation;

		$valid->set_rules('nama_produk','Nama Produk','required',
			array( 	'required'		=> '%s harus diisi'));
		$valid->set_rules('kode_produk','Kode Produk','required',		
			array( 	'required'		=> 	'%s harus diisi'));
		
		if ($valid->run()) {
			// cek jika gambar diganti
			if(!empty($_FILES['gambar']['name'])){

			$config['upload_path'] 		= './assets/upload/image/';
			$config['allowed_types']	= 'gif|jpg|png|jpeg';
			$config['max_size']  		= '2400'; //dalam KB
			$config['max_width']  		= '2024';
			$config['max_height']  		= '2024';
			
			$this->load->library('upload', $config);
			if (! $this->upload->do_upload('gambar')){
			// end validasi

		$data = array(	'title' 	=> 'Edit Produk:	'.$produk->nama_produk ,
						'kategori' 	=> $kategori,
						'produk'	=> $produk,
						'error'		=> $this->upload->display_errors(),
						'isi' 		=> 'admin/produk/edit'
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
				// slug produkx
				$slug_produk = url_title($this->input->post('nama_produk').'_'.$this->input->post('kode_produk'), 'dash', TRUE);
				$data = array(	'id_produk'			=>	$id_produk,
								'id_user'			=>	$this->session->userdata('id_user'),
								'id_kategori'		=>	$i->post('id_kategori'),
								'kode_produk'		=>	$i->post('kode_produk'),
								'nama_produk'		=>	$i->post('nama_produk'),
								'slug_produk'		=>	$slug_produk,
								'keterangan'		=>	$i->post('keterangan'),
								'keywords'			=>	$i->post('keywords'),
								'harga'				=>	$i->post('harga'),
								'stok'				=>	$i->post('stok'),
								'gambar'			=>	$upload_gambar['upload_data']['file_name'],
								'berat'				=>	$i->post('berat'),
								'ukuran'			=>	$i->post('ukuran'),
								'status_produk'		=>	$i->post('status_produk')
							);
				$this->produk_model->edit($data);
				$this->session->set_flashdata('sukses', 'Data Berhasil Di Edit');
				redirect(base_url('admin/produk'),'refresh');
		}}else{
			// edit Produk Tanpa Ganti Gambar
			// end membuat thumbnail gambar
				$i= $this->input;
				// slug produk
				$slug_produk = url_title($this->input->post('nama_produk').'_'.$this->input->post('kode_produk'), 'dash', TRUE);
				$data = array(	'id_produk'			=>	$id_produk,
								'id_user'			=>	$this->session->userdata('id_user'),
								'id_kategori'		=>	$i->post('id_kategori'),
								'kode_produk'		=>	$i->post('kode_produk'),
								'nama_produk'		=>	$i->post('nama_produk'),
								'slug_produk'		=>	$slug_produk,
								'keterangan'		=>	$i->post('keterangan'),
								'keywords'			=>	$i->post('keywords'),
								'harga'				=>	$i->post('harga'),
								'stok'				=>	$i->post('stok'),
								// 'gambar'			=>	$upload_gambar['upload_data']['file_name'],
								'berat'				=>	$i->post('berat'),
								'ukuran'			=>	$i->post('ukuran'),
								'status_produk'		=>	$i->post('status_produk')
							);
				$this->produk_model->edit($data);
				$this->session->set_flashdata('sukses', 'Data Berhasil Di Edit');
				redirect(base_url('admin/produk'),'refresh');
		}}
		// end masuk database
		$data = array(	'title' 	=> 'Edit Produk:	'.$produk->nama_produk ,
						'kategori' 	=> $kategori,
						'produk'	=> $produk,
						'isi' 		=> 'admin/produk/edit'
						);	
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// delete data
	public function delete($id_produk)
	{
		// proses hapus gambar
		$produk =	$this->produk_model->detail($id_produk);
		unlink('./assets/upload/image/'.$produk->gambar);
		unlink('./assets/upload/image/thumbs/'.$produk->gambar); 
		// end prosses
		$data 	= array('id_produk' => $id_produk );
		$this->produk_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data Berhasil Di Hapus');
		redirect(base_url('admin/produk'),'refresh');
	}

	// delete data
	public function delete_gambar($id_produk,$id_gambar)
	{
		// proses hapus gambar
		$gambar =	$this->produk_model->detail_gambar($id_gambar);
		unlink('./assets/upload/image/'.$gambar->gambar);
		unlink('./assets/upload/image/thumbs/'.$gambar->gambar); 
		// end prosses
		$data 	= array('id_gambar' => $id_gambar );
		$this->produk_model->delete_gambar($data);
		$this->session->set_flashdata('sukses', 'Gambar Berhasil Di Hapus');
		redirect(base_url('admin/produk/gambar/'.$id_produk),'refresh');
	}

	public function barcode_detail($kode_produk)
	{
		$produk = $this->produk_model->barcode_detail($kode_produk);
		$data = array(	'title' 	=> 'Barcode per produk', 
						'produk'	=> $produk 
							);
		$this->load->view('admin/produk/barcode', $data, FALSE);
	}

	public function gambar_barcode_detail($kode_produk)
	{
		$this->zend->load('Zend/Barcode');
		Zend_Barcode::render('code128', 'image', array('text'=>$kode_produk));
	}

	public function barcode()
	{
		$produk = $this->produk_model->barcode_semua();
		$data = array(	'title' => 'Barcode semua produk', 
						'produk' => $produk 
							);
		$this->load->view('admin/produk/barcode_semua', $data, FALSE);
	}

	public function report_barang()
	{
		$modal = $this->produk_model->listing();

		$terjual = $this->produk_model->listing_report();

		// print_r($terjual);
		// die();

		$data = array(	'title' 	=> 'Report Produk' ,
						'modal' 	=> $modal,
						'terjual' 	=> $terjual
						);	
		$this->load->view('admin/report/produk', $data, FALSE);
	}
}

/* End of file Produk.php */
/* Location: ./application/controllers/admin/Produk.php */