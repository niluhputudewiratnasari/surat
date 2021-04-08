<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->model('surat_model');
		$this->load->model('disposisi_model');
	}

	

	public function index()
	{
		$data['title'] = 'Surat Masuk';
		$data['akun'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->model('Surat_model', 'surat');
		$data['nomor_surat'] = $this->surat->getSurat();
		$data['klasifikasi'] = $this->db->get('kode_klasifikasi')->result_array();

		$this->load->view('templetes/headerindex', $data);
		$this->load->view('templetes/sidebarindex', $data);
		$this->load->view('templetes/topbarindex', $data);
		$this->load->view('surat/index', $data);
		$this->load->view('templetes/footerindex');
		
	}

	function simpan_surat_masuk(){
		$this->form_validation->set_rules('nomor_surat', 'Nomor Surat', 'required|is_unique[surat_masuk.nomor_surat]');
		$this->form_validation->set_rules('perihal', 'Perihal', 'required');
		$this->form_validation->set_rules('klasifikasi', 'Kode Klasifikasi', 'required');
		$this->form_validation->set_rules('lampiran', 'Lampiran', 'required');
		$this->form_validation->set_rules('pengirim', 'Pengirim', 'required');
		$this->form_validation->set_rules('tgl_surat', 'Tanggal Surat', 'required');
		
		if ($this->form_validation->run() == false) {
			$this->index();
		} else {
			$config['upload_path']          = './assets/photo/';
			$config['allowed_types']        = 'gif|jpg|png|pdf';
			$config['encrypt_name']            = false;
			$config['overwrite']			= false;
			$config['max_size']             = 1024;

			$this->load->library('upload');
			$this->upload->initialize($config);

			if (!$this->upload->do_upload('file')) {
				var_dump($this->upload->display_errors());
			} else {
				$file_name = $this->upload->data('file_name');

				$data_baru = [
					'id_suratmasuk' => $this->input->post('id_suratmasuk'),
					'no_urut' => $this->surat_model->buat_kodesm(),
					'nomor_surat' => $this->input->post('nomor_surat'),
					'perihal' => $this->input->post('perihal'),
					'klasifikasi' => $this->input->post('klasifikasi'),
					'lampiran' => $this->input->post('lampiran'),
					'pengirim' => $this->input->post('pengirim'),
					'tgl_surat' => $this->input->post('tgl_surat'),
					'file' => $file_name
				];
				$this->db->insert('surat_masuk', $data_baru);		
			}
			// var_dump($data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				Surat masuk berhasil ditambahkan! </div>');
			redirect('surat/index');

		}
	}
	public function hapus($id = '')
	{
		$this->surat_model->_deleteImage($id);
		$this->surat_model->hapusdata($id);
		$this->session->set_flashdata('flash', 'Dihapus');
		return redirect('surat/index');
	}

	public function editsm($id = '')
	{
		$data['title'] = 'Surat Masuk';
		$data['akun'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->model('Surat_model', 'surat');
		$data['nomor_surat'] = $this->surat->getSurat($id);
		$data['nomor_surat'] = $this->surat_model->getId($id);
		$data['klasifikasi'] = $this->db->get('kode_klasifikasi')->result_array();

		if ($this->form_validation->run() == false) {
			$this->load->view('templetes/headerindex', $data);
			$this->load->view('templetes/sidebarindex', $data);
			$this->load->view('templetes/topbarindex', $data);
			$this->load->view('surat/editsm', $data);
			$this->load->view('templetes/footerindex');
		} else {
			$this->surat_model->editsm();
			redirect('surat/index');
		}
	}

	public function proses_editsm()
	{
		$input_id = $this->input->post('id_suratmasuk');
		$data = array();
		if (empty($_FILES['file']['name']))
		{
			$data = array(
				'id_suratmasuk' => $this->input->post('id_suratmasuk'),
				'no_urut' => $this->input->post('no_urut'),
				'nomor_surat' => $this->input->post('nomor_surat'),
				'perihal' => $this->input->post('perihal'),
				'klasifikasi' => $this->input->post('klasifikasi'),
				'lampiran' => $this->input->post('lampiran'),
				'pengirim' => $this->input->post('pengirim'),
				'tgl_surat' => $this->input->post('tgl_surat')
			);
		} else {

			$config['upload_path']          = './assets/photo/';
			$config['allowed_types']        = 'gif|jpg|png|pdf';
			$config['encrypt_name']            = false;
			$config['overwrite']			= false;
			$config['max_size']             = 1024;

			$this->load->library('upload');
			$this->upload->initialize($config);

			if (!$this->upload->do_upload('file')) {
				var_dump($this->upload->display_errors());
			} else {
				$file_name = $this->upload->data('file_name');

				$data = [
					'id_suratmasuk' => $this->input->post('id_suratmasuk'),
					'no_urut' => $this->surat_model->buat_kodesm(),
					'nomor_surat' => $this->input->post('nomor_surat'),
					'perihal' => $this->input->post('perihal'),
					'klasifikasi' => $this->input->post('klasifikasi'),
					'lampiran' => $this->input->post('lampiran'),
					'pengirim' => $this->input->post('pengirim'),
					'tgl_surat' => $this->input->post('tgl_surat'),
					'file' => $file_name
				];
			}

		}
		$this->surat_model->simpanEditsm($input_id, $data);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Surat Masuk berhasil diubah! </div>');
		redirect('surat/index');
	}

	public	function detailsm($kode)
	{
		$data['title'] = 'Surat Masuk';
		$data['akun'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->model('Surat_model', 'surat');

		$data['nomor_surat'] = $this->surat->getWheresm($kode);
		$data['nomor'] = $this->disposisi_model->getWheredisposisi($kode);
		$data['klasifikasi'] = $this->db->get('kode_klasifikasi')->result_array();
		$data['id_suratmasuk'] = $this->db->get('surat_masuk')->result_array();

		if ($this->form_validation->run() == false) {
			$this->load->view('templetes/headerindex', $data);
			$this->load->view('templetes/sidebarindex', $data);
			$this->load->view('templetes/topbarindex', $data);
			$this->load->view('surat/detailsm', $data);
			$this->load->view('templetes/footerindex');
		} else {
			redirect('surat/index');

		}
	}

	//=========================================== DISPOSISI ================================================
	public	function disposisikan($kode)
	{
		$data['title'] = 'Disposisi';
		$data['akun'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->model('Surat_model', 'surat');

		$data['nomor_surat'] = $this->surat->getWheresm($kode);		
		$data['klasifikasi'] = $this->db->get('kode_klasifikasi')->result_array();
		$data['disposisi'] = $this->db->get('tabel_disposisi')->result_array();

		if ($this->form_validation->run() == false) {
			$this->load->view('templetes/headerindex', $data);
			$this->load->view('templetes/sidebarindex', $data);
			$this->load->view('templetes/topbarindex', $data);
			$this->load->view('laporan/tambah_disposisi', $data);
			$this->load->view('templetes/footerindex');
		} else {
			$tgl_disposisi = $this->input->post('tgl_disposisi');
			$nomor_surat = $this->input->post('nomor_surat');
			$tujuan = $this->input->post('tujuan');
			$keterangan = $this->input->post('keterangan');				

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				Disposisi berhasil ditambahkan! </div>');
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

		$this->load->view('templetes/headerindex', $data);
		$this->load->view('templetes/sidebarindex', $data);
		$this->load->view('templetes/topbarindex', $data);
		$this->load->view('surat/suratkeluar', $data);
		$this->load->view('templetes/footerindex');
	}

	function simpan_surat_keluar(){
		$this->form_validation->set_rules('nomor_surat', 'Nomor Surat', 'required');
		$this->form_validation->set_rules('perihal', 'Perihal', 'required');
		$this->form_validation->set_rules('klasifikasi', 'Kode Klasifikasi', 'required');
		$this->form_validation->set_rules('lampiran', 'Lampiran', 'required');
		$this->form_validation->set_rules('kepada', 'Kepada', 'required');
		$this->form_validation->set_rules('tgl_surat', 'Tanggal Surat', 'required');
		
		if ($this->form_validation->run() == false) {
			$this->index();
		} else {
			$config['upload_path']          = './assets/photo/';
			$config['allowed_types']        = 'gif|jpg|png|pdf';
			$config['encrypt_name']            = false;
			$config['overwrite']			= false;
			$config['max_size']             = 1024;

			$this->load->library('upload');
			$this->upload->initialize($config);

			if (!$this->upload->do_upload('file')) {
				var_dump($this->upload->display_errors());
			} else {
				$file_name = $this->upload->data('file_name');

				$data_baru = [
					'id_suratkeluar' => $this->input->post('id_suratkeluar'),
					'no_urut' => $this->surat_model->buat_kode(),
					'nomor_surat' => $this->input->post('nomor_surat'),
					'perihal' => $this->input->post('perihal'),
					'klasifikasi' => $this->input->post('klasifikasi'),
					'lampiran' => $this->input->post('lampiran'),
					'kepada' => $this->input->post('kepada'),
					'tgl_surat' => $this->input->post('tgl_surat'),
					'file' => $file_name
				];
				$this->db->insert('surat_keluar', $data_baru);
			}
			// var_dump($data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				Surat keluar berhasil ditambahkan! </div>');
			redirect('surat/suratkeluar');
		}
	}

	public function hapussk($id = '')
	{
		$this->surat_model->_deleteImagek($id);
		$this->surat_model->hapusdatask($id);
		$this->session->set_flashdata('flash', 'Dihapus');
		return redirect('surat/suratkeluar');
	}

	public function editsk($id = '')
	{
		$data['title'] = 'Surat Keluar';
		$data['akun'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->model('Surat_model', 'surat');
		$data['nomor_surat'] = $this->surat->getSuratK($id);
		$data['nomor_surat'] = $this->surat_model->getIdsk($id);
		$data['klasifikasi'] = $this->db->get('kode_klasifikasi')->result_array();

		if ($this->form_validation->run() == false) {
			$this->load->view('templetes/headerindex', $data);
			$this->load->view('templetes/sidebarindex', $data);
			$this->load->view('templetes/topbarindex', $data);
			$this->load->view('surat/editsk', $data);
			$this->load->view('templetes/footerindex');
		} else {
			$this->surat_model->editsk();
			redirect('surat/suratkeluar');
		}
	}

	public function proses_editsk()
	{
		$input_id = $this->input->post('id_suratkeluar');
		$data = array();
		if (empty($_FILES['file']['name']))
		{
			$data = array(
				'id_suratkeluar' => $this->input->post('id_suratkeluar'),
				'no_urut' => $this->input->post('no_urut'),
				'nomor_surat' => $this->input->post('nomor_surat'),
				'perihal' => $this->input->post('perihal'),
				'klasifikasi' => $this->input->post('klasifikasi'),
				'lampiran' => $this->input->post('lampiran'),
				'kepada' => $this->input->post('kepada'),
				'tgl_surat' => $this->input->post('tgl_surat')
			);
		} else {

			$config['upload_path']          = './assets/photo/';
			$config['allowed_types']        = 'gif|jpg|png|pdf';
			$config['encrypt_name']            = false;
			$config['overwrite']			= false;
			$config['max_size']             = 1024;

			$this->load->library('upload');
			$this->upload->initialize($config);

			if (!$this->upload->do_upload('file')) {
				var_dump($this->upload->display_errors());
			} else {
				$file_name = $this->upload->data('file_name');

				$data = [
					'id_suratkeluar' => $this->input->post('id_suratkeluar'),
					'no_urut' => $this->input->post('no_urut'),
					'nomor_surat' => $this->input->post('nomor_surat'),
					'perihal' => $this->input->post('perihal'),
					'klasifikasi' => $this->input->post('klasifikasi'),
					'lampiran' => $this->input->post('lampiran'),
					'kepada' => $this->input->post('kepada'),
					'tgl_surat' => $this->input->post('tgl_surat'),
					'file' => $file_name
				];
			}

		}
		$this->surat_model->simpanEditsk($input_id, $data);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Surat keluar berhasil diubah! </div>');
		redirect('surat/suratkeluar');
	}

	// public function proses_edit()
	// {
	// 	$input_id = $this->input->post('id_suratkeluar');
	// 	$data = array(
	// 		'id_suratkeluar' => $this->input->post('id_suratkeluar'),
	// 		'no_urut' => $this->input->post('no_urut'),
	// 		'nomor_surat' => $this->input->post('nomor_surat'),
	// 		'perihal' => $this->input->post('perihal'),
	// 		'klasifikasi' => $this->input->post('klasifikasi'),
	// 		'lampiran' => $this->input->post('lampiran'),
	// 		'kepada' => $this->input->post('kepada'),
	// 		'tgl_surat' => $this->input->post('tgl_surat'),
	// 		'file' => $this->input->post('file')

	// 	);

	// 	$this->surat_model->simpanEditsk($input_id, $data);
	// 	$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
	// 		Surat Keluar Has Updated! </div>');
	// 	redirect('surat/suratkeluar');
	// }

	public	function detailsk($kode)
	{
		$data['title'] = 'Surat Keluar';
		$data['akun'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->model('Surat_model', 'surat');

		$data['nomor_surat'] = $this->surat->getWhere($kode);
		$data['klasifikasi'] = $this->db->get('kode_klasifikasi')->result_array();
		$data['id_suratkeluar'] = $this->db->get('surat_keluar')->result_array();

		if ($this->form_validation->run() == false) {
			$this->load->view('templetes/headerindex', $data);
			$this->load->view('templetes/sidebarindex', $data);
			$this->load->view('templetes/topbarindex', $data);
			$this->load->view('surat/detailsk', $data);
			$this->load->view('templetes/footerindex');
		} else {
			redirect('surat/suratkeluar');

		}
	}

}