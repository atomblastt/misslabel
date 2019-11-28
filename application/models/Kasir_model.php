<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Kasir_model extends CI_Model{

	private $primary_key = 'kode_produk';
	private $table_name	= 'produk';

	public function __construct()
	{
	
		parent::__construct();
	
	}

	public function get() 
	{
	  	
	  	$this->db->select('kode_produk,nama_produk,stok');

		return $this->db->get($this->table_name)->result();
	
	}

	public function get_by_id($id)
	{
	  
	  	$this->db->where($this->primary_key,$id); 
	  
	  	return $this->db->get($this->table_name)->row();
	
	}

}