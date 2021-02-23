<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->model('admin_model');
	}

	public function index()
	{
		$data['title'] = 'Dashboard';
		$data['akun'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('templetes/headerindex', $data);
		$this->load->view('templetes/sidebarindex', $data);
		$this->load->view('templetes/topbarindex', $data);
		$this->load->view('admin/index', $data);
		$this->load->view('templetes/footerindex');
	}

	public function role()
	{
		$data['title'] = 'Role';
		$data['akun'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();

		$data['role'] = $this->db->get('akun_role')->result_array();
		$this->form_validation->set_rules('role', 'Role', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templetes/headerindex', $data);
			$this->load->view('templetes/sidebarindex', $data);
			$this->load->view('templetes/topbarindex', $data);
			$this->load->view('admin/role', $data);
			$this->load->view('templetes/footerindex');
		} else {
			$this->db->insert('akun_role', ['role' => $this->input->post('role')]);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				New menu added! </div>');
			redirect('admin/role');
		}
	}
	public function roleAccess($role_id)
	{
		$data['title'] = 'Role Akses';
		$data['akun'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();

		$data['role'] = $this->db->get_where('akun_role', ['id' => $role_id])->row_array();
		$this->db->where('id !=', 1);
		$data['menu'] = $this->db->get('akun_menu')->result_array();


		$this->load->view('templetes/headerindex', $data);
		$this->load->view('templetes/sidebarindex', $data);
		$this->load->view('templetes/topbarindex', $data);
		$this->load->view('admin/role-access', $data);
		$this->load->view('templetes/footerindex');
	}

	public function changeaccess()
	{
		$menu_id = $this->input->post('menuId');
		$role_id = $this->input->post('roleId');

		$data = [
			'role_id' => $role_id,
			'menu_id' => $menu_id
		];

		$result = $this->db->get_where('akun_access_menu', $data);

		if ($result->num_rows() < 1) {
			$this->db->insert('akun_access_menu', $data);

		} else {
			$this->db->delete('akun_access_menu', $data);
		}
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Access change! </div>');
	}
	public function hapus($id = '')
	{
		$this->admin_model->hapusdata($id);
		$this->session->set_flashdata('flash', 'Dihapus');
		return redirect('admin/role');
	}
	public function editrole($id='')
	{
		$data['title'] = 'Role';
		$data['akun'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();
		$data['akun_role'] = $this->admin_model->getIdrole($id);

		$data['role'] = $this->db->get('akun_role')->result_array();
		$this->form_validation->set_rules('role', 'Role', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templetes/headerindex', $data);
			$this->load->view('templetes/sidebarindex', $data);
			$this->load->view('templetes/topbarindex', $data);
			$this->load->view('admin/editrole', $data);
			$this->load->view('templetes/footerindex');
		} else {
			$this->admin_model->editRole();
			redirect('admin');
		}
		$this->load->view('admin/editrole', $data);
	}
	public function proses_editrole()
	{
		$input_id = $this->input->post('id');
		$data = array(
			'id' => $this->input->post('id') ,
			'role' => $this->input->post('role') 
		);

		$this->admin_model->simpanEditrole($input_id, $data);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Role Has Updated! </div>');
		redirect('admin/role');
	}

}