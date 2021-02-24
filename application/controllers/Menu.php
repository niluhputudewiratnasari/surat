<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->model('menu_model');
	}

	public function index()
	{
		$data['title'] = 'Menu Management';
		$data['akun'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();

		$data['menu'] = $this->db->get('akun_menu')->result_array();
		$this->form_validation->set_rules('menu', 'Menu', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templetes/headerindex', $data);
			$this->load->view('templetes/sidebarindex', $data);
			$this->load->view('templetes/topbarindex', $data);
			$this->load->view('menu/index', $data);
			$this->load->view('templetes/footerindex');
		} else {
			$this->db->insert('akun_menu', ['menu' => $this->input->post('menu')]);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				New menu added! </div>');
			redirect('menu');
		}
	}
	public function subMenu()
	{
		$data['title'] = 'Submenu Management';
		$data['akun'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->model('Menu_model', 'menu');

		$data['subMenu'] = $this->menu->getSubMenu();
		$data['menu'] = $this->db->get('akun_menu')->result_array();

		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('menu_id', 'Menu', 'required');
		$this->form_validation->set_rules('url', 'URL', 'required');
		$this->form_validation->set_rules('icon', 'Icon', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templetes/headerindex', $data);
			$this->load->view('templetes/sidebarindex', $data);
			$this->load->view('templetes/topbarindex', $data);
			$this->load->view('menu/submenu', $data);
			$this->load->view('templetes/footerindex');
		} else {
			$data = [
				'title' => $this->input->post('title'),
				'menu_id' => $this->input->post('menu_id'),
				'url' => $this->input->post('url'),
				'icon' => $this->input->post('icon'),
				'is_active' => $this->input->post('is_active')
			];
			$this->db->insert('akun_sub_menu', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				New sub menu added! </div>');
			redirect('menu/submenu');
		}

	}

	public function hapussub($id = '')
	{
		$this->menu_model->hapusdataSub($id);
		$this->session->set_flashdata('flash', 'Dihapus');
		return redirect('menu/submenu');
	}
	public function hapus($id = '')
	{
		$this->menu_model->hapusdata($id);
		$this->session->set_flashdata('flash', 'Dihapus');
		return redirect('menu/index');
	}
	public function hapusklas($id = '')
	{
		$this->menu_model->hapusdataKlas($id);
		$this->session->set_flashdata('flash', 'Dihapus');
		return redirect('menu/klasifikasi');
	}
	public function edit($id = '')
	{
		$data['title'] = 'Menu Management';
		$data['akun'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();
		$data['akun_menu'] = $this->menu_model->getId($id);

		$data['menu'] = $this->db->get('akun_menu')->result_array();
		$this->form_validation->set_rules('menu', 'Menu', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templetes/headerindex', $data);
			$this->load->view('templetes/sidebarindex', $data);
			$this->load->view('templetes/topbarindex', $data);
			$this->load->view('menu/editmenu', $data);
			$this->load->view('templetes/footerindex');
		} else {
			$this->menu_model->editMenu();
			redirect('menu');
		}
	}

	public function proses_edit()
	{
		$input_id = $this->input->post('id');
		$data = array(
			'id' => $this->input->post('id') ,
			'menu' => $this->input->post('menu') 
		);

		$this->menu_model->simpanEdit($input_id, $data);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Menu Has Updated! </div>');
		redirect('menu/index');
	}

	//=====================UNTUK EDIT SUBMENU=================
	public function editSub($id = '')
	{
		$data['title'] = 'Submenu Management';
		$data['akun'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->model('Menu_model', 'menu');

		$data['akun_sub_menu'] = $this->menu->getSubMenu();

		$data['akun_sub_menu'] = $this->menu_model->getIdSub($id);

		
		$data['menu'] = $this->db->get('akun_menu')->result_array();

		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('menu_id', 'Menu', 'required');
		$this->form_validation->set_rules('url', 'URL', 'required');
		$this->form_validation->set_rules('icon', 'Icon', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templetes/headerindex', $data);
			$this->load->view('templetes/sidebarindex', $data);
			$this->load->view('templetes/topbarindex', $data);
			$this->load->view('menu/editsubmenu', $data);
			$this->load->view('templetes/footerindex');
		} else {
			$this->menu_model->editSubMenu();
			redirect('menu/submenu');
		}
	}

	public function proses_editsub()
	{
		$input_id = $this->input->post('id');
		$data = array(
			'id' => $this->input->post('id') ,
			'title' => $this->input->post('title'),
			'menu_id' => $this->input->post('menu_id'),
			'url' => $this->input->post('url'),
			'icon' => $this->input->post('icon'),
			'is_active' => $this->input->post('is_active')
		);

		$this->menu_model->simpanEditSub($input_id, $data);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Submenu Has Updated! </div>');
		redirect('menu/submenu');
	}

	//=================AKHIRAN EDIT SUBMENU===================


	public function klasifikasi()
	{
		$data['title'] = 'Klasifikasi';
		$data['akun'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();

		$data['klasifikasi'] = $this->db->get('kode_klasifikasi')->result_array();

		$this->form_validation->set_rules('klasifikasi', 'Kode Klasifikasi', 'required');
		$this->form_validation->set_rules('nama_klasifikasi', 'Nama Klasifikasi', 'required');
		$this->form_validation->set_rules('uraian', 'Uraian', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templetes/headerindex', $data);
			$this->load->view('templetes/sidebarindex', $data);
			$this->load->view('templetes/topbarindex', $data);
			$this->load->view('menu/klasifikasi', $data);
			$this->load->view('templetes/footerindex');
		} else {
			$data = [
				'klasifikasi' => $this->input->post('klasifikasi'),
				'nama_klasifikasi' => $this->input->post('nama_klasifikasi'),
				'uraian' => $this->input->post('uraian')
			];

			$this->db->insert('kode_klasifikasi', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				Klasifikasi berhasil ditambah! </div>');
			redirect('menu/klasifikasi');
		}

	}
}