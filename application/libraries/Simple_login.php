<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Simple_login
{
	protected $CI;

	public function __construct()
	{
        $this->CI =& get_instance();
        // load model
        $this->CI->load->model('user_model');
        $this->CI->load->model('pelanggan_model');
	}

	// fungsi login user
	public function login($username,$password)
	{
		$check = $this->CI->user_model->login($username,$password);
		// jika ada data user, maka buat session loginnya
		if ($check) {
			$id_user		=	$check->id_user;
			$nama			=	$check->nama;
			$email			=	$check->email;
			$akses_level	=	$check->akses_level;
			// buat session
			$this->CI->session->set_userdata('id_user',$id_user);
			$this->CI->session->set_userdata('nama',$nama);
			$this->CI->session->set_userdata('email',$email);
			$this->CI->session->set_userdata('username',$username);
			$this->CI->session->set_userdata('akses_level',$akses_level);
			if ($akses_level === 'Admin' or $akses_level === 'Operator') {
				// lemparkan ke halaman admin yang di proteksi
			redirect(base_url('admin/dasbor'),'refresh');
			}else {
					// lemparkan ke halaman admin yang di proteksi
			redirect(base_url('home'),'refresh');
				}
			
		}else{
				// jika username dan password salah
			$this->CI->session->set_flashdata('warning','Username atau Password yang anda masukan SALAH !!!');
			redirect(base_url('login/user'),'refresh');
			}
		}

		// fungsi login pelanggan
	public function login_pelanggan($email,$password)
	{
		$check = $this->CI->pelanggan_model->login($email,$password);
		// jika ada data user, maka buat session loginnya
		if ($check) {
			$id_pelanggan		=	$check->id_pelanggan;
			$nama_pelanggan		=	$check->nama_pelanggan;
			// buat session
			$this->CI->session->set_userdata('id_pelanggan',$id_pelanggan);
			$this->CI->session->set_userdata('nama_pelanggan',$nama_pelanggan);
			$this->CI->session->set_userdata('email',$email);
			redirect(base_url('home'),'refresh');
		}else{
				// jika username dan password salah
			$this->CI->session->set_flashdata('warning','email atau Password yang anda masukan SALAH !!!');
			redirect(base_url('login/pelanggan'),'refresh');
			}
		}

	// fungsi cek login
	public function cek_login()
	{
		// memeriksa apakah session sudah ada , jika belum maka lemparkan ke halaman login
		if ($this->CI->session->userdata('username') == "") {
			$this->CI->session->set_flashdata('warning','Silahkan Login Terlebih Dahulu');
			redirect(base_url('login/user'),'refresh');
		}
	}

	// fungsi cek login
	public function cek_akses_level()
	{
		// memeriksa apakah session sudah ada , jika belum maka lemparkan ke halaman login
		if ($this->CI->session->userdata('akses_level') == "User") {
			// $this->CI->session->set_flashdata('warning','Anda Bukan Admin');
			redirect(base_url('login/user'),'refresh');
		}
	}

	// fungsi logout
	public function logout()
	{
		// membuang semua session di saat login
		$this->CI->session->unset_userdata('id_user');
		$this->CI->session->unset_userdata('nama');
		$this->CI->session->unset_userdata('username');
		$this->CI->session->unset_userdata('akses_level');
		// jika logout berhasil , redirect ke halaman login
		$this->CI->session->set_flashdata('sukses','Anda berhasil logout');
		redirect(base_url('home'),'refresh');
		}

		// fungsi logout Pelanggan
	public function logout_pelanggan()
	{
		// membuang semua session di saat login
		$this->CI->session->unset_userdata('id_pelanggan');
		$this->CI->session->unset_userdata('nama_pelanggan');
		$this->CI->session->unset_userdata('email');
		// jika logout berhasil , redirect ke halaman login
		$this->CI->session->set_flashdata('sukses','Anda berhasil logout');
		redirect(base_url('home'),'refresh');
		}

}
