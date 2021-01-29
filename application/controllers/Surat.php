<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//is_logged_in();
	}

	public function index()
	{
		$data['title'] = 'Surat Masuk';
		$data['akun'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->model('Surat_model', 'surat');

		$data['nomor_surat'] = $this->surat->getSurat();
		$data['klasifikasi'] = $this->db->get('kode_klasifikasi')->result_array();

		$this->form_validation->set_rules('nomor_surat', 'Nomor Surat', 'required');
		$this->form_validation->set_rules('perihal', 'Perihal', 'required');
		$this->form_validation->set_rules('klasifikasi', 'Kode Klasifikasi', 'required');
		$this->form_validation->set_rules('lampiran', 'Lampiran', 'required');
		$this->form_validation->set_rules('pengirim', 'Pengirim', 'required');
		$this->form_validation->set_rules('tgl_surat', 'Tanggal Surat', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
		$this->form_validation->set_rules('file', 'File', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templetes/headerindex', $data);
			$this->load->view('templetes/sidebarindex', $data);
			$this->load->view('templetes/topbarindex', $data);
			$this->load->view('surat/index', $data);
			$this->load->view('templetes/footerindex');
		} else {
			$data = [
				'nomor_surat' => $this->input->post('nomor_surat'),
				'perihal' => $this->input->post('perihal'),
				'klasifikasi' => $this->input->post('klasifikasi'),
				'lampiran' => $this->input->post('lampiran'),
				'pengirim' => $this->input->post('pengirim'),
				'tgl_surat' => $this->input->post('status'),
				'status' => $this->input->post('menu_id'),
				'file' => $this->input->post('file')
			];
			$this->db->insert('surat_masuk', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				Surat Masuk Berhasil Ditambahkan! </div>');
			redirect('surat/index');
		}
	}
	
	
}