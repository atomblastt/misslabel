<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_kasir_model extends CI_Model {

		public function insert_transaksi($data)
		{
			
				$this->db->insert_batch('transaksi_kasir', $data);

		}
	
		public function listing()
		{
			$this->db->select('*');
			$this->db->from('transaksi_kasir');
			$this->db->order_by('id_transaksi_kasir', 'desc');
			$query = $this->db->get();
			return $query->result();
		}

		public function total_listing()
		{
			$this->db->select('sum(sub_total) as total');
			$this->db->from('transaksi_kasir');
			$query = $this->db->get();
			return $query->row();
		}

		public function detail()
		{
			$this->db->select('*');
			$this->db->from('transaksi_kasir');
			$this->db->order_by('id_transaksi_kasir', 'desc');
			$query = $this->db->get();
			return $query->row();
		}

		public function satu_tanggal()
		{
			$tgl = $this->input->post('tanggal_transaksi');

			$this->db->select('*');
			$this->db->from('transaksi_kasir');
			$this->db->where('tanggal_transaksi', $tgl);
			$this->db->order_by('id_transaksi_kasir', 'desc');
			$query = $this->db->get();
			return $query->result();
		}

		public function satu_tanggal_total()
		{
			$tgl = $this->input->post('tanggal_transaksi');

			$this->db->select('sum(sub_total) as total');
			$this->db->from('transaksi_kasir');
			$this->db->where('tanggal_transaksi', $tgl);
			$this->db->order_by('id_transaksi_kasir', 'desc');
			$query = $this->db->get();
			return $query->row();
		}		

		public function range_tanggal()
		{

			$tgl1 = $this->input->post('tanggal_transaksi1');
			$tgl2 = $this->input->post('tanggal_transaksi2');
			
			$where = "DATE(tanggal_transaksi) BETWEEN '$tgl1' AND '$tgl2'";

			$this->db->select('*');
			$this->db->from('transaksi_kasir');
			$this->db->where($where);
			$this->db->order_by('id_transaksi_kasir', 'desc');
			$query = $this->db->get();
			return $query->result();
		}

		public function range_tanggal_total()
		{

			$tgl1 = $this->input->post('tanggal_transaksi1');
			$tgl2 = $this->input->post('tanggal_transaksi2');
			
			$where = "DATE(tanggal_transaksi) BETWEEN '$tgl1' AND '$tgl2'";

			$this->db->select('SUM(sub_total) as total');
			$this->db->from('transaksi_kasir');
			$this->db->where($where);
			$this->db->order_by('id_transaksi_kasir', 'desc');
			$query = $this->db->get();
			return $query->row();
		}		

}

/* End of file Transaksi_kasir_model.php */
/* Location: ./application/models/Transaksi_kasir_model.php */