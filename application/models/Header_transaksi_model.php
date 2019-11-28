<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Header_transaksi_model extends CI_Model {

	public function __construct()
		{
			parent::__construct();
			$this->load->database();
		}	
		// listing semua header_transaksi
		public function listing()
		{
			$this->db->select('*');
			$this->db->from('header_transaksi');
			$this->db->order_by('id_header_transaksi', 'desc');
			$query = $this->db->get();
			return $query->result();
		}
		// Detail header_transaksi
		public function detail($id_header_transaksi)
		{
			$this->db->select('*');
			$this->db->from('header_transaksi');
			$this->db->where('id_header_transaksi', $id_header_transaksi);
			$this->db->order_by('id_header_transaksi', 'ASC');
			$query = $this->db->get();
			return $query->row();
		}

		// header_transaksi yang login
		public function sudah_login($email,$nama_header_transaksi)
		{
			$this->db->select('*');
			$this->db->from('header_transaksi');
			$this->db->where('email', $email);
			$this->db->where('nama_header_transaksi', $nama_header_transaksi);
			$this->db->order_by('id_header_transaksi', 'ASC');
			$query = $this->db->get();
			return $query->row();
		}

		// Login header_transaksi
		public function login($email,$password)
		{
			$this->db->select('*');
			$this->db->from('header_transaksi');
			$this->db->where(array(	'email'	=> $email,
							 		'password'	=> SHA1($password)));
			$this->db->order_by('id_header_transaksi', 'ASC');
			$query = $this->db->get();
			return $query->row();
		}
		// tambah data
		public function tambah($data)
		{
			$this->db->insert('header_transaksi', $data);
		}
		// edit data
		public function edit($data)
		{
			$this->db->where('id_header_transaksi', $data['id_header_transaksi']);
			$this->db->update('header_transaksi',$data);
		}
		// delete data
		public function delete($data)
		{
			$this->db->where('id_header_transaksi', $data['id_header_transaksi']);
			$this->db->delete('header_transaksi',$data);
		}
}

/* End of file Header_transaksi_model.php */
/* Location: ./application/models/Header_transaksi_model.php */