<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sm extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//is_logged_in();
		$this->load->model('surat');
	}

	public function index()
	{
		$data['title'] = 'Surat Masuk';
		$data['akun'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();
		$data['nomor_surat'] = $this->surat->get_data('surat_masuk')->result();
		$this->load->view('templetes/headerindex', $data);
		$this->load->view('templetes/sidebarindex', $data);
		$this->load->view('templetes/topbarindex', $data);
		$this->load->view('sm/index', $data);
		$this->load->view('templetes/footerindex');
	}

	public function tambahData()
	{
		$data['title'] = 'Tambah Surat Masuk';
		$data['akun'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();
		$data['klasifikasi'] = $this->surat->get_data('kode_klasifikasi')->result();
		$this->load->view('templetes/headerindex', $data);
		$this->load->view('templetes/sidebarindex', $data);
		$this->load->view('templetes/topbarindex', $data);
		$this->load->view('sm/tambahsm', $data);
		$this->load->view('templetes/footerindex');
	}
	public function tambahDataAksi()
	{
		$this->_rules();
		if ($this->form_validation->run() == FALSE) {
			$this->tambahData();
		}else{
			$nomor_surat 	= $this->input->post('nomor_surat');
			$perihal 		= $this->input->post('perihal');
			$klasifikasi 	= $this->input->post('klasifikasi');
			$lampiran 		= $this->input->post('lampiran');
			$pengirim 		= $this->input->post('pengirim');
			$tgl_surat 		= $this->input->post('tgl_surat');
			$status 		= $this->input->post('status');
			$file 			= $_FILES['file']['name'];
			


			if ($file='') {}else{
				$config ['upload_path'] = './assets/photo';
				$config ['allowed_types'] ='jpg|jpeg|png|tiff';
				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('file')) {
					echo "File Berhasil Diupload!";
				}else{
					$file = $this->upload->data('file_name');
				}
			}

			$data = array(
				'nomor_surat' 		=> $nomor_surat,
				'perihal'		 	=> $perihal,
				'klasifikasi' 		=> $klasifikasi,
				'lampiran' 			=> $lampiran,
				'pengirim' 			=> $pengirim,
				'tgl_surat'		 	=> $tgl_surat,
				'status' 			=> $status,
				'file' 				=> $file
			);
			$this->surat->insert_data($data, 'surat_masuk');
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				Surat Masuk Berhasil Ditambahkan! </div>');
			redirect('sm');
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('nomor_surat', 'Nomor Surat', 'required');
		$this->form_validation->set_rules('perihal', 'Perihal', 'required');
		$this->form_validation->set_rules('klasifikasi', 'Kode Klasifikasi', 'required');
		$this->form_validation->set_rules('lampiran', 'Lampiran', 'required');
		$this->form_validation->set_rules('pengirim', 'Pengirim', 'required');
		$this->form_validation->set_rules('tgl_surat', 'Tanggal Surat', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
	}
}