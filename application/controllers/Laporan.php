<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//is_logged_in();

		$this->load->model('laporan_model');
		$this->load->model('disposisi_model');
		$this->load->model('surat_model');
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

	public function disposisi()
	{
		$data['title'] = 'Disposisi';
		$data['akun'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();
		$data['nomor_surat'] = $this->disposisi_model->getAll();
		$data['id_suratmasuk'] = $this->db->get('surat_masuk')->result_array();

		if ($this->form_validation->run() == false) {
			$this->load->view('templetes/headerindex', $data);
			$this->load->view('templetes/sidebarindex', $data);
			$this->load->view('templetes/topbarindex', $data);
			$this->load->view('laporan/disposisi', $data);
			$this->load->view('templetes/footerindex');
		} else {
			$data = array(
				'id_disposisi' => $this->disposisi_model->buat_kode(),
				'tgl_disposisi' => $this->input->post('tgl_disposisi'),
				'id_suratmasuk' => $this->input->post('id_suratmasuk'),
				'nomor_surat' => $this->input->post('nomor_surat'),
				'perihal' => $this->input->post('perihal'),
				'tujuan' => $this->input->post('tujuan'),
				'keterangan' => $this->input->post('keterangan')
			);

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				Your Disposisition has benn Added! </div>');
			redirect('laporan/disposisi');
		}
	}
	public	function tambah_disposisi($id)
	{
		$data['title'] = 'Arsip Surat Masuk';
		$data['akun'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->model('disposisi_model', 'dis');
		$data['tgl_disposisi'] = $this->dis->getAll();
		$data['nomor_surat'] = $this->dis->getId($id);
		$data['nomor_surat'] = $this->dis->getWheredis($id);
		$data['id_suratmasuk'] = $this->db->get('surat_masuk')->result_array();

		$this->form_validation->set_rules('tgl_disposisi', 'Tanggal Disposisi', 'required');
		$this->form_validation->set_rules('id_suratmasuk', 'Id Surat Masuk', 'required');
		$this->form_validation->set_rules('nomor_surat', 'Nomor Surat', 'required');
		$this->form_validation->set_rules('perihal', 'Perihal', 'required');
		$this->form_validation->set_rules('tujuan', 'Tujuan', 'required');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templetes/headerindex', $data);
			$this->load->view('templetes/sidebarindex', $data);
			$this->load->view('templetes/topbarindex', $data);
			$this->load->view('laporan/tambah_disposisi', $data);
			$this->load->view('templetes/footerindex');
		} else {
			$data = array(
				'id_disposisi' => $this->arsip_model->buat_kode(),
				'tgl_disposisi' => $this->input->post('tgl_disposisi'),
				'id_suratmasuk' => $this->input->post('id_suratmasuk'),
				'nomor_surat' => $this->input->post('nomor_surat'),
				'perihal' => $this->input->post('perihal'),
				'tujuan' => $this->input->post('tujuan'),
				'keterangan' => $this->input->post('tgl_surat')
			);
			$this->db->insert('arsip_masuk', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				Arsip Surat Masuk Has Added! </div>');
			redirect('laporan/disposisi');
		}
	}

	public function simdis()
	{
		
		$data = array(
			'id_disposisi' => $this->disposisi_model->buat_kode(),
			'tgl_disposisi' => $this->input->post('tgl_disposisi'),
			'id_suratmasuk' => $this->input->post('id_suratmasuk'),
			'nomor_surat' => $this->input->post('nomor_surat'),
			'perihal' => $this->input->post('perihal'),
			'tujuan' => $this->input->post('tujuan'),
			'keterangan' => $this->input->post('keterangan')
		);
		$this->db->insert('tabel_disposisi', $data);
		$this->db->where('id_suratmasuk')->update('surat_masuk', ['status'=>'Berhasil Disposisi']);
		$noSurat= $this->db->select('nomor_surat')->where('id_suratmasuk')->get('surat_masuk')->result();
		
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Disposisi Has Added! </div>');
		redirect('laporan/disposisi');
	}


}