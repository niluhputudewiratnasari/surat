<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//is_logged_in();
		$this->load->model('surat_model');
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
		$this->form_validation->set_rules('file', 'File', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templetes/headerindex', $data);
			$this->load->view('templetes/sidebarindex', $data);
			$this->load->view('templetes/topbarindex', $data);
			$this->load->view('surat/index', $data);
			$this->load->view('templetes/footerindex');
		} else {
			$data = [
				'no_urut' => $this->surat_model->buat_kode(),
				'nomor_surat' => $this->input->post('nomor_surat'),
				'perihal' => $this->input->post('perihal'),
				'klasifikasi' => $this->input->post('klasifikasi'),
				'lampiran' => $this->input->post('lampiran'),
				'pengirim' => $this->input->post('pengirim'),
				'tgl_surat' => $this->input->post('tgl_surat'),
				'file' => $this->input->post('file')//$_FILES['file']['name']
			];


			// if ($file='') {}else{
			// 	$config ['upload_path'] = './assets/photo/';
			// 	$config ['allowed_types'] ='jpg|jpeg|png|pdf';
			// 	$config ['max_size']='3000';
			// 	$config ['max_width']='3000';
			// 	$config ['max_height']='3000';
			// 	$this->load->library('upload', $config);

			// 	if (!$this->upload->do_upload('file')) {
			// 		echo "File Berhasil Diupload!";
			// 	}else{
			// 		$file = $this->upload->data('file_name');
			// 	}

			

			$this->db->insert('surat_masuk', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				Surat Masuk Berhasil Ditambahkan! </div>');
			redirect('surat/index');
		}
	}

	public function hapus($id = '')
	{
		$this->surat_model->hapusdata($id);
		$this->session->set_flashdata('flash', 'Dihapus');
		return redirect('surat/index');
	}
	public	function detailsm($kode)
	{
		$data['title'] = 'Surat Masuk';
		$data['akun'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->model('Surat_model', 'surat');

		$data['nomor_surat'] = $this->surat->getWheresm($kode);
		$data['klasifikasi'] = $this->db->get('kode_klasifikasi')->result_array();

		$this->form_validation->set_rules('no_urut', 'No', 'required');
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
			$this->load->view('surat/detailsm', $data);
			$this->load->view('templetes/footerindex');
		} else {

			// $data = [
			// 	'nomor_surat' => $this->input->post('nomor_surat'),
			// 	'perihal' => $this->input->post('perihal'),
			// 	'klasifikasi' => $this->input->post('klasifikasi'),
			// 	'lampiran' => $this->input->post('lampiran'),
			// 	'kepada' => $this->input->post('kepada'),
			// 	'tgl_surat' => $this->input->post('tgl_surat'),
			// 	'file' => $this->input->post('file')
			// ];
			redirect('surat/index');

		}
	}
	public	function disposisikan($kode)
	{
		$data['title'] = 'Disposisi';
		$data['akun'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->model('Surat_model', 'surat');

		$data['nomor_surat'] = $this->surat->getWheresm($kode);		
		$data['klasifikasi'] = $this->db->get('kode_klasifikasi')->result_array();
		$data['disposisi'] = $this->db->get('tabel_disposisi')->result_array();

		$this->form_validation->set_rules('tgl_disposisi', 'Tanggal Disposisi', 'required');
		$this->form_validation->set_rules('nomor_surat', 'Nomor Surat Masuk', 'required');
		$this->form_validation->set_rules('perihal', 'Perihal', 'required');
		$this->form_validation->set_rules('tujuan', 'Isi Disposisi', 'required');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templetes/headerindex', $data);
			$this->load->view('templetes/sidebarindex', $data);
			$this->load->view('templetes/topbarindex', $data);
			$this->load->view('laporan/tambah_disposisi', $data);
			$this->load->view('templetes/footerindex');
		} else {
			// $data = [
			// 	'nomor_surat' => $this->input->post('nomor_surat'),
			// 	'perihal' => $this->input->post('perihal'),
			// 	'klasifikasi' => $this->input->post('klasifikasi'),
			// 	'lampiran' => $this->input->post('lampiran'),
			// 	'kepada' => $this->input->post('kepada'),
			// 	'tgl_surat' => $this->input->post('tgl_surat'),
			// 	'file' => $this->input->post('file')
			// ];
			redirect('laporan/disposisi');

		}
	}


//========================================SURAT KELUAR============================================
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
		$this->form_validation->set_rules('kepada', 'Kepada', 'required');
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
				'no_urut' => $this->surat_model->buat_kode(),
				'nomor_surat' => $this->input->post('nomor_surat'),
				'perihal' => $this->input->post('perihal'),
				'klasifikasi' => $this->input->post('klasifikasi'),
				'lampiran' => $this->input->post('lampiran'),
				'kepada' => $this->input->post('kepada'),
				'tgl_surat' => $this->input->post('tgl_surat'),
				'file' => $this->input->post('file')
			];
			$this->db->insert('surat_keluar', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				Surat Keluar Berhasil Ditambahkan! </div>');
			redirect('surat/suratkeluar');
		}
	}

	public function hapussk($id = '')
	{
		$this->surat_model->hapusdatask($id);
		$this->session->set_flashdata('flash', 'Dihapus');
		return redirect('surat/suratkeluar');
	}

	public	function detailsk($kode)
	{
		$data['title'] = 'Surat Keluar';
		$data['akun'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->model('Surat_model', 'surat');

		$data['nomor_surat'] = $this->surat->getWhere($kode);
		$data['klasifikasi'] = $this->db->get('kode_klasifikasi')->result_array();

		$this->form_validation->set_rules('nomor_surat', 'Nomor Surat', 'required');
		$this->form_validation->set_rules('perihal', 'Perihal', 'required');
		$this->form_validation->set_rules('klasifikasi', 'Kode Klasifikasi', 'required');
		$this->form_validation->set_rules('lampiran', 'Lampiran', 'required');
		$this->form_validation->set_rules('kepada', 'Kepada', 'required');
		$this->form_validation->set_rules('tgl_surat', 'Tanggal Surat', 'required');
		$this->form_validation->set_rules('file', 'File', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templetes/headerindex', $data);
			$this->load->view('templetes/sidebarindex', $data);
			$this->load->view('templetes/topbarindex', $data);
			$this->load->view('surat/detailsk', $data);
			$this->load->view('templetes/footerindex');
		} else {
			// $data = [
			// 	'nomor_surat' => $this->input->post('nomor_surat'),
			// 	'perihal' => $this->input->post('perihal'),
			// 	'klasifikasi' => $this->input->post('klasifikasi'),
			// 	'lampiran' => $this->input->post('lampiran'),
			// 	'kepada' => $this->input->post('kepada'),
			// 	'tgl_surat' => $this->input->post('tgl_surat'),
			// 	'file' => $this->input->post('file')
			// ];
			redirect('surat/suratkeluar');

		}
	}

}