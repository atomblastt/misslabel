
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	//halaman login
	public function user(){

		// validasi
		$this->form_validation->set_rules('username','Username','required',
				array('required' => 'Harus di isi' ));
		$this->form_validation->set_rules('password','Password','required',
				array('required' => 'Harus di isi' ));

		if ($this->form_validation->run()) {
			$username 	= $this->input->post('username');
			$password 	= $this->input->post('password');
			// prosses ke simple login
			$this->simple_login->login($username,$password);
		}
		// end validasi
		$data = array( 'title' 	=> 	'Login Administrator');
		$this->load->view('admin/login/list', $data, FALSE);
		}
		
		// ambil fungsi logout
		public function logout()
		{
			$this->simple_login->logout();
		}

		//halaman login Pelanggan
	public function pelanggan(){

		// validasi
		$this->form_validation->set_rules('email','Email','required',
				array('required' => 'Harus di isi' ));
		$this->form_validation->set_rules('password','Password','required',
				array('required' => 'Harus di isi' ));

		if ($this->form_validation->run()) {
			$email 		= $this->input->post('email');
			$password 	= $this->input->post('password');
			// prosses ke simple login
			$this->simple_login->login_pelanggan($email,$password);
		}
		// end validasi
		$data = array( 'title' 	=> 	'Login',
						'isi' 	=>	'login/list'
						);
		$this->load->view('home/layout/wrapper', $data, FALSE);
		}
		// ambil fungsi logout
		public function logout_pelanggan()
		{
			$this->simple_login->logout_pelanggan();
		}
		
}