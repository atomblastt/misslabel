<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {
	
	// laod model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('transaksi_kasir_model');
		// proteksi halaman 
		$this->simple_login->cek_login();
	}

	// report penjualan
	public function index()
	{
		$report = $this->transaksi_kasir_model->listing();

		$report2 = $this->transaksi_kasir_model->detail();

		// foreach ($report as $i => $u) {
		// print_r($report2);
		// die();
		// }
		// die();
 
		$data = array(	'title' 	=> 'Data Report Penjualan' ,
						'report' 	=> $report,
						'report2' 	=> $report2,
						'isi' 		=> 'admin/report/list'
						);	
		$this->load->view('admin/layout2/wrapper', $data, FALSE);
	}

	// report kasir
	public function cetak()
	{
		$report = $this->transaksi_kasir_model->listing();
		
		$total = $this->transaksi_kasir_model->total_listing();
 
		$data = array(	'title' 	=> 'Report Penjualan' ,
						'report' 	=> 	$report,
						'total'		=>	$total
						);	
		$this->load->view('admin/report/cetak', $data, FALSE);
	}

	public function tampil_pertanggal()
	{
		$report = $this->transaksi_kasir_model->satu_tanggal($this->input->post('tanggal_transaksi'));

		$total = $this->transaksi_kasir_model->satu_tanggal_total();

		$data = array(	'title' => 'Report Penjualan' ,
						'report' 	=> $report,
						'total' 	=> $total
						);	
		$this->load->view('admin/report/cetak', $data, FALSE);
	}

	public function tampil_range()
	{
		$tgl1 = $this->input->post('tanggal_transaksi1');
		$tgl2 = $this->input->post('tanggal_transaksi2');

		$report = $this->transaksi_kasir_model->range_tanggal();

		$total = $this->transaksi_kasir_model->range_tanggal_total();


		$data = array(	'title' => 'Report Penjualan' ,
						'report' 	=> $report,
						'total' 	=> $total
						);	
		// print_r($data);
		// die();
		$this->load->view('admin/report/cetak', $data, FALSE);
	}
}