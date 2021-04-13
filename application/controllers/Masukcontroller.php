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
		if($this->session->userdata('email')){
			redirect('akun');
		}

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
					if ($akun['role_id'] == 1) {
						redirect('admin');
					} else{
						redirect('akun');
					}
					


				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
						Password salah! </div>');
					redirect('Masukcontroller');
				}

			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
					Email ini belum diaktifkan! </div>');
				redirect('Masukcontroller');
			}
			
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
				Email tidak terdaftar! </div>');
			redirect('Masukcontroller');
		}
	}

	public function registration()
	{
		if($this->session->userdata('email')){
			redirect('akun');
		}
		
		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[akun.email]',['is_unique' => 'Email ini sudah terdaftar!']);
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]',['matches'=> 'Kata sandi tidak cocok!','min_length' => 'Password terlalu pendek!']);
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
				'file' => 'default.jpg',
				'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'role_id' => 2,
				'is_active' => 1,
				'date_create' => time()
			];

			$this->db->insert('akun', $data);

			//$this->_sendEmail();

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				Selamat akun anda telah dibuat. Silahkan Login!</div>');
			redirect('Masukcontroller');
		}
	}

	// public function _sendEmail()
	// {
	// 	$config = [
	// 		'protocol' => 'smtp',
	// 		'smtp_host' => 'ssl://smtp.googleemail.com',
	// 		'smtp_user' => 'dewiiratnas12@gmail.com',
	// 		'smtp_pass' => '@Santana00',
	// 		'smtp_port' => 465,
	// 		'mailtype' => 'html',
	// 		'charset' => 'utf-8',
	// 		'newline' => "\r\n"
	// 	];

	// 	$this->load->library('email', $config);

	// 	$this->email->from('dewiiratnas12@gmail.com', 'DewiRatnas');
	// 	$this->email->to('putudewiratna12@gmail.com');
	// 	$this->email->subject('Testing');
	// 	$this->email->message('Hellow world');

	// 	if($this->email->send()){
	// 		return true;
	// 	} else {
	// 		echo $this->email->print_debugger();
	// 		die;
	// 	}
	
	// }

	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role_id');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Anda telah keluar! </div>');
		redirect('Masukcontroller');
	}

	public function blocked()
	{
		$this->load->view('masuk/blocked');

	}
}