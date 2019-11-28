<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_model extends CI_Model {

	public function __construct()
		{
			parent::__construct();
			$this->load->database();
		}	
		// listing semua transaksi
		public function listing()
		{
			$this->db->select('*');
			$this->db->from('transaksi');
			$this->db->order_by('id_transaksi', 'desc');
			$query = $this->db->get();
			return $query->result();
		}
		// Detail transaksi
		public function detail($id_transaksi)
		{
			$this->db->select('*');
			$this->db->from('transaksi');
			$this->db->where('id_transaksi', $id_transaksi);
			$this->db->order_by('id_transaksi', 'ASC');
			$query = $this->db->get();
			return $query->row();
		}
		// Detail slug transaksi
		public function read($slug_transaksi)
		{
			$this->db->select('*');
			$this->db->from('transaksi');
			$this->db->where('slug_transaksi', $slug_transaksi);
			$this->db->order_by('id_transaksi', 'ASC');
			$query = $this->db->get();
			return $query->row();
		}
		// Login transaksi
		public function login($transaksiname,$password)
		{
			$this->db->select('*');
			$this->db->from('transaksi');
			$this->db->where(array(	'transaksiname'	=> $transaksiname,
							 		'password'	=> SHA1($password)));
			$this->db->order_by('id_transaksi', 'ASC');
			$query = $this->db->get();
			return $query->row();
		}
		// tambah data
		public function tambah($data)
		{
			$this->db->insert('transaksi', $data);
		}
		// edit data
		public function edit($data)
		{
			$this->db->where('id_transaksi', $data['id_transaksi']);
			$this->db->update('transaksi',$data);
		}
		// delete data
		public function delete($data)
		{
			$this->db->where('id_transaksi', $data['id_transaksi']);
			$this->db->delete('transaksi',$data);
		}
}

/* End of file Transaksi_model.php */
/* Location: ./application/models/Transaksi_model.php */