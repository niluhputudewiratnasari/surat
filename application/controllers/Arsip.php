<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Arsip extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//is_logged_in();
		$this->load->model('arsip_model');
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
				'id_arsipmasuk' => $this->arsip_model->buat_kode(),
				'nomor_surat' => $this->input->post('nomor_surat'),
				'tgl_arsipmasuk' => $this->input->post('tgl_arsipmasuk'),
				'perihal' => $this->input->post('perihal'),
				'pengirim' => $this->input->post('pengirim'),
				'tgl_surat' => $this->input->post('tgl_surat')

			];
			$this->db->insert('arsip_masuk', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Arsip
				Surat Masuk Berhasil Ditambahkan! </div>');
			redirect('arsip/index');
		}
	}

	public	function tambaharsipsm($id)
	{
		$data['title'] = 'Arsip Surat Masuk';
		$data['akun'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->model('arsip_model', 'arsip');
		$data['tgl_arsipmasuk'] = $this->arsip_model->getArsip();
		$data['nomor_surat'] = $this->arsip_model->getId($id);
		$data['nomor_surat'] = $this->arsip_model->getWhereasm($id);
		$data['id_suratmasuk'] = $this->db->get('surat_masuk')->result_array();

		$this->form_validation->set_rules('tgl_arsipmasuk', 'Tanggal Arsip Masuk', 'required');
		$this->form_validation->set_rules('nomor_surat', 'Nomor Surat', 'required');
		$this->form_validation->set_rules('perihal', 'Perihal', 'required');
		$this->form_validation->set_rules('pengirim', 'Pengirim', 'required');
		$this->form_validation->set_rules('tgl_surat', 'Tanggal Surat', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templetes/headerindex', $data);
			$this->load->view('templetes/sidebarindex', $data);
			$this->load->view('templetes/topbarindex', $data);
			$this->load->view('arsip/tambaharsipsm', $data);
			$this->load->view('templetes/footerindex');
		} else {
			$data = array(
				'id_arsipmasuk' => $this->arsip_model->buat_kode(),
				'tgl_arsipmasuk' => $this->input->post('tgl_arsipmasuk'),
				'id_suratmasuk' => $this->input->post('id_suratmasuk'),
				'nomor_surat' => $this->input->post('nomor_surat'),
				'perihal' => $this->input->post('perihal'),
				'pengirim' => $this->input->post('pengirim'),
				'tgl_surat' => $this->input->post('tgl_surat')
			);
			$this->db->insert('arsip_masuk', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				Arsip Surat Masuk Has Added! </div>');
			redirect('arsip/index');
		}
	}

	public function proses_simpan()
	{
		//$input_id = $this->input->post('id_arsipmasuk');
		$data = array(
			'id_arsipmasuk' => $this->arsip_model->buat_kode(),			
			'tgl_arsipmasuk' => $this->input->post('tgl_arsipmasuk'),
			'id_suratmasuk' => $this->input->post('id_suratmasuk'),
			'nomor_surat' => $this->input->post('nomor_surat'),
			'perihal' => $this->input->post('perihal'),
			'pengirim' => $this->input->post('pengirim'),
			'tgl_surat' => $this->input->post('tgl_surat')
		);
		$this->db->insert('arsip_masuk', $data);
		//$this->arsip_model->simpanasm($input_id, $data);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Arsip Surat Masuk Has Added! </div>');
		redirect('arsip/index');
	}
	public function hapusam($id = '')
	{
		$this->arsip_model->hapusdata($id);
		$this->session->set_flashdata('flash', 'Dihapus');
		return redirect('arsip/index');
	}

	public function editarsip($id = '')
	{
		$data['title'] = 'Arsip Surat Masuk';
		$data['akun'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();
		
		$this->load->model('Arsip_model', 'arsip');
		$data['tgl_arsipmasuk'] = $this->arsip->getArsip($id);
		$data['nomor_surat'] = $this->arsip->getId($id);
		$data['id_suratmasuk'] = $this->db->get('surat_masuk')->result_array();

		$this->form_validation->set_rules('tgl_arsipmasuk', 'Tanggal Arsip Masuk', 'required');
		$this->form_validation->set_rules('id_suratmasuk', 'Id Surat Masuk', 'required');
		$this->form_validation->set_rules('nomor_surat', 'Nomor Surat', 'required');
		$this->form_validation->set_rules('perihal', 'Perihal', 'required');
		$this->form_validation->set_rules('pengirim', 'Pengirim', 'required');
		$this->form_validation->set_rules('tgl_surat', 'Tanggal Surat', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templetes/headerindex', $data);
			$this->load->view('templetes/sidebarindex', $data);
			$this->load->view('templetes/topbarindex', $data);
			$this->load->view('arsip/editarsip', $data);
			$this->load->view('templetes/footerindex');
		} else {
			$this->arsip_model->editam();
			redirect('arsip/index');
		}
	}

	public function proses_editam()
	{
		$input_id = $this->input->post('id_arsipmasuk');
		$data = array(
			'id_arsipmasuk' => $this->input->post('id_arsipmasuk'),
			'tgl_arsipmasuk' => $this->input->post('tgl_arsipmasuk'),
			'id_suratmasuk' => $this->input->post('id_suratmasuk'),
			'nomor_surat' => $this->input->post('nomor_surat'),
			'perihal' => $this->input->post('perihal'),
			'pengirim' => $this->input->post('pengirim'),
			'tgl_surat' => $this->input->post('tgl_surat')

		);

		$this->arsip_model->simpanEditam($input_id, $data);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Arsip Masuk Has Updated! </div>');
		redirect('arsip/index');
	}
//=================================================ARSIP KELUAR==============================================
	public function arsipkeluar()
	{
		$data['title'] = 'Arsip Surat Keluar';
		$data['akun'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->model('Arsip_model', 'arsip');

		$data['tgl_arsipkeluar'] = $this->arsip->getArsipK();
		$data['nomor_surat'] = $this->db->get('surat_keluar')->result_array();

		$this->form_validation->set_rules('tgl_arsipkeluar', 'Tanggal Arsip Keluar', 'required');
		$this->form_validation->set_rules('nomor_surat', 'Nomor Surat', 'required');
		$this->form_validation->set_rules('perihal', 'Perihal', 'required');
		$this->form_validation->set_rules('kepada', 'Kepada', 'required');
		$this->form_validation->set_rules('tgl_surat', 'Tanggal Surat', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templetes/headerindex', $data);
			$this->load->view('templetes/sidebarindex', $data);
			$this->load->view('templetes/topbarindex', $data);
			$this->load->view('arsip/arsipkeluar', $data);
			$this->load->view('templetes/footerindex');
		} else {
			$data = [
				'id_arsipkeluar' => $this->arsip_model->buat_kodeSK(),			
				'tgl_arsipkeluar' => $this->input->post('tgl_arsipkeluar'),
				'id_suratkeluar' => $this->input->post('id_suratkeluar'),
				'nomor_surat' => $this->input->post('nomor_surat'),
				'perihal' => $this->input->post('perihal'),
				'kepada' => $this->input->post('kepada'),
				'tgl_surat' => $this->input->post('tgl_surat')

			];
			$this->db->insert('arsip_keluar', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				Arsip Surat Keluar Berhasil Ditambahkan! </div>');
			redirect('arsip/arsipkeluar');
		}
	}

	public	function tambaharsipsk($id)
	{
		$data['title'] = 'Arsip Surat Keluar';
		$data['akun'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->model('arsip_model', 'arsip');
		$data['tgl_arsipkeluar'] = $this->arsip_model->getArsipK();
		$data['nomor_surat'] = $this->arsip_model->getIdK($id);
		$data['nomor_surat'] = $this->arsip_model->getWhereask($id);
		$data['id_suratkeluar'] = $this->db->get('surat_keluar')->result_array();;

		$this->form_validation->set_rules('tgl_arsipkeluar', 'Tanggal Arsip Keluar', 'required');
		$this->form_validation->set_rules('nomor_surat', 'Nomor Surat', 'required');
		$this->form_validation->set_rules('perihal', 'Perihal', 'required');
		$this->form_validation->set_rules('kepada', 'Kepada', 'required');
		$this->form_validation->set_rules('tgl_surat', 'Tanggal Surat', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templetes/headerindex', $data);
			$this->load->view('templetes/sidebarindex', $data);
			$this->load->view('templetes/topbarindex', $data);
			$this->load->view('arsip/tambaharsipsk', $data);
			$this->load->view('templetes/footerindex');
		} else {
			$data = [
				'id_arsipkeluar' => $this->arsip_model->buat_kodeSK(),			
				'tgl_arsipkeluar' => $this->input->post('tgl_arsipkeluar'),
				'id_suratkeluar' => $this->input->post('id_suratkeluar'),
				'nomor_surat' => $this->input->post('nomor_surat'),
				'perihal' => $this->input->post('perihal'),
				'kepada' => $this->input->post('kepada'),
				'tgl_surat' => $this->input->post('tgl_surat')

			];
			$this->db->insert('arsip_keluar', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				Arsip Surat Masuk Has Added! </div>');
			redirect('arsip/arsipkeluar');
		}
	}

	public function proses_simpansk()
	{
		//$input_id = $this->input->post('id_arsipkeluar');
		$data = array(
			'id_arsipkeluar' => $this->arsip_model->buat_kodeSK(),			
			'tgl_arsipkeluar' => $this->input->post('tgl_arsipkeluar'),
			'id_suratkeluar' => $this->input->post('id_suratkeluar'),
			'nomor_surat' => $this->input->post('nomor_surat'),
			'perihal' => $this->input->post('perihal'),
			'kepada' => $this->input->post('kepada'),
			'tgl_surat' => $this->input->post('tgl_surat')
		);
		$this->db->insert('arsip_keluar', $data);
		//$this->arsip_model->simpanasm($input_id, $data);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Arsip Surat Masuk Has Added! </div>');
		redirect('arsip/arsipkeluar');
	}

}