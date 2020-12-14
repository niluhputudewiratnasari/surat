<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masukcontroller extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['title'] = 'Login';
		$this->load->view('templetes/masuk_header', $data);
		$this->load->view('masuk/login');
		$this->load->view('templetes/masuk_footer');

	}

	public function registration()
	{
		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[akun.email]',['is_unique' => 'This email has already registered!']);
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]',['matches'=> 'Password dont match!','min_length' => 'Password too short!']);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');


		if($this->form_validation->run() == false){
			$data['title'] = 'Registrasi Akun';
			$this->load->view('templetes/masuk_header', $data);
			$this->load->view('masuk/registration');
			$this->load->view('templetes/masuk_footer');
		} else {
			$data = [
				'name' => $this->input->post('name'),
				'email' => $this->input->post('email'),
				'image' => 'default.jpg',
				'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
				'role_id' => 2,
				'is_active' => 1,
				'date_create' => time()
			];

			$this->db->insert('akun', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				A Congratulation! Your account has ben created. Please Login</div>');
			redirect('Masukcontroller');
		}
	}
}