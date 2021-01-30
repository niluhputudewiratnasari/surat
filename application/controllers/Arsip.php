<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Arsip extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//is_logged_in();
	}

	public function index()
	{
		$data['title'] = 'Arsip Surat Masuk';
		$data['akun'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->model('Arsip_model', 'arsip');

		$data['tgl_arsipmasuk'] = $this->arsip->getArsip();
		$data['nomor_surat'] = $this->db->get('surat_masuk')->result_array();

		$this->form_validation->set_rules('tgl_arsipmasuk', 'Tanggal Arsip Masuk', 'required');
		$this->form_validation->set_rules('nomor_surat', 'Nomor Surat Masuk', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templetes/headerindex', $data);
			$this->load->view('templetes/sidebarindex', $data);
			$this->load->view('templetes/topbarindex', $data);
			$this->load->view('arsip/index', $data);
			$this->load->view('templetes/footerindex');
		} else {
			$data = [
				'tgl_arsipmasuk' => $this->input->post('tgl_arsipmasuk'),
				'nomor_surat' => $this->input->post('nomor_surat')
			];
			$this->db->insert('arsip_masuk', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				Surat Masuk Berhasil Ditambahkan! </div>');
			redirect('arsip/index');
		}
	}
	
	public function suratkeluar()
	{
		$data['title'] = 'Surat Keluar';
		$data['akun'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->model('Surat_model', 'surat');

		$data['nomor_surat'] = $this->surat->getSuratK();
		$data['klasifikasi'] = $this->db->get('kode_klasifikasi')->result_array();

		$this->form_validation->set_rules('nomor_surat', 'Nomor Surat', 'required');
		$this->form_validation->set_rules('perihal', 'Perihal', 'required');
		$this->form_validation->set_rules('klasifikasi', 'Kode Klasifikasi', 'required');
		$this->form_validation->set_rules('lampiran', 'Lampiran', 'required');
		$this->form_validation->set_rules('pengirim', 'Pengirim', 'required');
		$this->form_validation->set_rules('tgl_surat', 'Tanggal Surat', 'required');
		$this->form_validation->set_rules('file', 'File', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templetes/headerindex', $data);
			$this->load->view('templetes/sidebarindex', $data);
			$this->load->view('templetes/topbarindex', $data);
			$this->load->view('surat/suratkeluar', $data);
			$this->load->view('templetes/footerindex');
		} else {
			$data = [
				'nomor_surat' => $this->input->post('nomor_surat'),
				'perihal' => $this->input->post('perihal'),
				'klasifikasi' => $this->input->post('klasifikasi'),
				'lampiran' => $this->input->post('lampiran'),
				'pengirim' => $this->input->post('pengirim'),
				'tgl_surat' => $this->input->post('tgl_surat'),
				'file' => $this->input->post('file')
			];
			$this->db->insert('surat_keluar', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				Surat Keluar Berhasil Ditambahkan! </div>');
			redirect('surat/suratkeluar');
		}
	}
}