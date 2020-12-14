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
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if($this->form_validation->run() == false){

			$data['title'] = 'Login';
			$this->load->view('templetes/masuk_header', $data);
			$this->load->view('masuk/login');
			$this->load->view('templetes/masuk_footer');
		} else {
			$this->_login();
		}
	}

	private function _login()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$akun = $this->db->get_where('akun', ['email' => $email])->row_array();

			//jika user ada
		if ($akun) {
				// jika user aktif
			if ($akun['is_active'] == 1) {
				//cek password
				if (password_verify($password, $akun['password'])) {
					$data = [
						'email' => $akun['email'],
						'role_id' => $akun['role_id']
					];

					$this->session->set_userdata($data);
					redirect('akun');


				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
						Wrong password! </div>');
					redirect('Masukcontroller');
				}

			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
					This email has not been activated! </div>');
				redirect('Masukcontroller');
			}
			
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
				Email is not registered! </div>');
			redirect('Masukcontroller');
		}
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
				'name' => htmlspecialchars($this->input->post('name', true)),
				'email' =>  htmlspecialchars($this->input->post('email', true)),
				'image' => 'default.jpg',
				'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
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

	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role_id');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			You have been logout! </div>');
		redirect('Masukcontroller');
	}
}