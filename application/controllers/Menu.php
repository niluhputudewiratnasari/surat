<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		
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

	public function hapus($id)
	{
		$this->Menu_model->hapusSubMenu($id);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Sub menu has delete!! </div>');
		redirect('menu/submenu');
	}
}