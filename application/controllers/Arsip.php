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
		$data['nomor_surat'] = $this->arsip_model->getAll();
		$data['id_suratmasuk'] = $this->db->get('surat_masuk')->result_array();

		$this->load->view('templetes/headerindex', $data);
		$this->load->view('templetes/sidebarindex', $data);
		$this->load->view('templetes/topbarindex', $data);
		$this->load->view('arsip/index', $data);
		$this->load->view('templetes/footerindex');
	}

	public	function tambaharsipsm($id)
	{
		$data['title'] = 'Arsip Surat Masuk';
		$data['akun'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->model('arsip_model', 'arsip');
		$data['id_arsipmasuk'] = $this->arsip_model->getArsip();
		$data['nomor_surat'] = $this->arsip_model->getId($id);
		$data['nomor_surat'] = $this->arsip_model->getWhereasm($id);
		$data['id_suratmasuk'] = $this->db->get('surat_masuk')->result_array();

		$this->load->view('templetes/headerindex', $data);
		$this->load->view('templetes/sidebarindex', $data);
		$this->load->view('templetes/topbarindex', $data);
		$this->load->view('arsip/tambaharsipsm', $data);
		$this->load->view('templetes/footerindex');
	}

	public function proses_simpan()
	{
		$data = array(
			'id_arsipmasuk' => $this->input->post('id_arsipmasuk'),
			'no' => $this->arsip_model->buat_kode(),			
			'tgl_arsipmasuk' => $this->input->post('tgl_arsipmasuk'),
			'id_suratmasuk' => $this->input->post('id_suratmasuk'),
			'nomor_surat' => $this->input->post('nomor_surat'),
			'perihal' => $this->input->post('perihal'),
			'pengirim' => $this->input->post('pengirim'),
			'tgl_surat' => $this->input->post('tgl_surat')
		);
		$this->db->insert('arsip_masuk', $data);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Arsip surat masuk berhasil ditambahkan! </div>');
		redirect('arsip/index');
	}
	public function hapusar($id = '')
	{
		$this->arsip_model->hapusdata($id);
		$this->session->set_flashdata('flash', 'Dihapus');
		return redirect('arsip/index');
	}

	public function editar($id = '')
	{
		$data['title'] = 'Arsip Surat Masuk';
		$data['akun'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();
		
		$this->load->model('arsip_model', 'arsip');
		$data['nomor_surat'] = $this->arsip->getAll($id);
		$data['nomor_surat'] = $this->arsip->getId($id);
		$data['id_suratmasuk'] = $this->db->get('surat_masuk')->result_array();

		
		if ($this->form_validation->run() == false) {
			$this->load->view('templetes/headerindex', $data);
			$this->load->view('templetes/sidebarindex', $data);
			$this->load->view('templetes/topbarindex', $data);
			$this->load->view('arsip/editarsip', $data);
			$this->load->view('templetes/footerindex');
		} else {
			$this->arsip_model->editar();
			redirect('arsip/index');
		}
	}

	public function proses_editar()
	{
		$input_id = $this->input->post('id_arsipmasuk');
		$data = array(
			'id_arsipmasuk' => $this->input->post('id_arsipmasuk'),
			'no' => $this->input->post('no'),
			'tgl_arsipmasuk' => $this->input->post('tgl_arsipmasuk'),
			'id_suratmasuk' => $this->input->post('id_suratmasuk'),
			'nomor_surat' => $this->input->post('nomor_surat'),
			'perihal' => $this->input->post('perihal'),
			'pengirim' => $this->input->post('pengirim'),
			'tgl_surat' => $this->input->post('tgl_surat')

		);

		$this->arsip_model->simpanEditar($input_id, $data);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Arsip surat masuk berhasil diubah! </div>');
		redirect('arsip/index');
	}

//=================================================ARSIP KELUAR==============================================
	public function arsipkeluar()
	{
		$data['title'] = 'Arsip Surat Keluar';
		$data['akun'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->model('Arsip_model', 'arsip');
		$data['nomor_surat'] = $this->arsip->getArsipK();
		$data['id_suratkeluar'] = $this->db->get('surat_keluar')->result_array();

		$this->load->view('templetes/headerindex', $data);
		$this->load->view('templetes/sidebarindex', $data);
		$this->load->view('templetes/topbarindex', $data);
		$this->load->view('arsip/arsipkeluar', $data);
		$this->load->view('templetes/footerindex');

	}

	public	function tambaharsipsk($id)
	{
		$data['title'] = 'Arsip Surat Keluar';
		$data['akun'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->model('arsip_model', 'arsip');
		$data['id_arsipkeluar'] = $this->arsip_model->getArsipK();
		$data['nomor_surat'] = $this->arsip_model->getIdK($id);
		$data['nomor_surat'] = $this->arsip_model->getWhereask($id);
		$data['id_suratkeluar'] = $this->db->get('surat_keluar')->result_array();;

		$this->load->view('templetes/headerindex', $data);
		$this->load->view('templetes/sidebarindex', $data);
		$this->load->view('templetes/topbarindex', $data);
		$this->load->view('arsip/tambaharsipsk', $data);
		$this->load->view('templetes/footerindex');

	}

	public function proses_simpansk()
	{
		$data = array(
			'id_arsipkeluar' => $this->input->post('id_arsipkeluar'),
			'no' => $this->arsip_model->buat_kodeSK(),				
			'tgl_arsipkeluar' => $this->input->post('tgl_arsipkeluar'),
			'id_suratkeluar' => $this->input->post('id_suratkeluar'),
			'nomor_surat' => $this->input->post('nomor_surat'),
			'perihal' => $this->input->post('perihal'),
			'kepada' => $this->input->post('kepada'),
			'tgl_surat' => $this->input->post('tgl_surat')
		);
		$this->db->insert('arsip_keluar', $data);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Arsip surat keluar berhasil ditambahkan! </div>');
		redirect('arsip/arsipkeluar');
	}

	public function hapusark($id = '')
	{
		$this->arsip_model->hapusdatak($id);
		$this->session->set_flashdata('flash', 'Dihapus');
		return redirect('arsip/arsipkeluar');
	}

	public function editark($id = '')
	{
		$data['title'] = 'Arsip Surat Keluar';
		$data['akun'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->model('arsip_model', 'arsip');
		$data['nomor_surat'] = $this->arsip->getArsipK($id);
		$data['nomor_surat'] = $this->arsip->getIdK($id);
		$data['id_suratkeluar'] = $this->db->get('surat_keluar')->result_array();

		if ($this->form_validation->run() == false) {
			$this->load->view('templetes/headerindex', $data);
			$this->load->view('templetes/sidebarindex', $data);
			$this->load->view('templetes/topbarindex', $data);
			$this->load->view('arsip/editarsipk', $data);
			$this->load->view('templetes/footerindex');
		} else {
			$this->arsip_model->editark();
			redirect('arsip/arsipkeluar');
		}
	}

	public function proses_editark()
	{
		$input_id = $this->input->post('id_arsipkeluar');
		$data = array(
			'id_arsipkeluar' => $this->input->post('id_arsipkeluar'),
			'no' => $this->input->post('no'),
			'tgl_arsipkeluar' => $this->input->post('tgl_arsipkeluar'),
			'id_suratkeluar' => $this->input->post('id_suratkeluar'),
			'nomor_surat' => $this->input->post('nomor_surat'),
			'perihal' => $this->input->post('perihal'),
			'kepada' => $this->input->post('kepada'),
			'tgl_surat' => $this->input->post('tgl_surat')

		);

		$this->arsip_model->simpanEditark($input_id, $data);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Arsip surat keluar berhasil diubah! </div>');
		redirect('arsip/arsipkeluar');
	}


}