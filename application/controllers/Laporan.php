<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//is_logged_in();

		$this->load->model('laporan_model');
	}

	public function index()
	{
		$data['title'] = 'Laporan Surat Masuk';
		$data['akun'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();

		if ((isset($_GET['bulan']) && $_GET['bulan']!='') && (isset($_GET['tahun']) && $_GET['tahun']!='')) {
			$bulan = $_GET['bulan'];
			$tahun = $_GET['tahun'];
			$bulantahun = $bulan.$tahun;
		}else{
			$bulan = date('m');
			$tahun = date('Y');
			$bulantahun = $bulan.$tahun;
		}

		$data['nomor_surat'] = $this->db->query("SELECT surat_masuk.*,kode_klasifikasi.klasifikasi FROM surat_masuk JOIN kode_klasifikasi on surat_masuk.klasifikasi = kode_klasifikasi.klasifikasi WHERE surat_masuk.tgl_surat='$bulantahun'")->result();
		
		
		$this->load->view('templetes/headerindex', $data);
		$this->load->view('templetes/sidebarindex', $data);
		$this->load->view('templetes/topbarindex', $data);
		$this->load->view('laporan/index', $data);
		$this->load->view('templetes/footerindex');
		
	}
}