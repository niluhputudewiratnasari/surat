<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akun extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//is_logged_in();
	}

	public function index()
	{
		$data['title'] = 'Profile';
		$data['akun'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('templetes/headerindex', $data);
		$this->load->view('templetes/sidebarindex', $data);
		$this->load->view('templetes/topbarindex', $data);
		$this->load->view('akun/index', $data);
		$this->load->view('templetes/footerindex');
	}

	public function edit()
	{
		$data['title'] = 'Edit Profile';
		$data['akun'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('name', 'Full Name', 'required|trim');

		if ($this->form_validation->run() == false){
			$this->load->view('templetes/headerindex', $data);
			$this->load->view('templetes/sidebarindex', $data);
			$this->load->view('templetes/topbarindex', $data);
			$this->load->view('akun/edit', $data);
			$this->load->view('templetes/footerindex');
		} else {
			$name = $this->input->post('name');
			$email = $this->input->post('email');

			//cek jika ada gambar yang akan diupload
			$upload_image = $_FILE['image']['name'];

			if ($upload_image) {
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] = '2048';
				$config['upload_path'] = './assets/img/profile/';

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('image')) {
					$old_image = $data['akun']['image'];
					if ($old_image != 'default.jpg') {
						unlink(FCPATH . './assets/img/profile/' . $old_image);
					}

					$new_image = $this->upload->data('file_name');
					$this->db->set('image', $new_image);
				} else {
					echo $this->upload->dispay_errors();
				}
			}

			$this->db->set('name', $name);
			$this->db->where('email', $email);
			$this->db->update('akun');

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				Profile berhasil ditambahkan! </div>');
			redirect('akun');
		}
	}

	public function changePassword()
	{
		$data['title'] = 'Ganti Password';
		$data['akun'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
		$this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[3]|matches[new_password2]');
		$this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[3]|matches[new_password1]');

		if ($this->form_validation->run() == false) {
			$this->load->view('templetes/headerindex', $data);
			$this->load->view('templetes/sidebarindex', $data);
			$this->load->view('templetes/topbarindex', $data);
			$this->load->view('akun/changepassword', $data);
			$this->load->view('templetes/footerindex');
		} else {
			$current_password = $this->input->post('current_password');
			$new_password = $this->input->post('new_password1');

			if (!password_verify($current_password, $data['akun']['password'])) {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
					Kata Sandi Salah! </div>');
				redirect('akun/changepassword');
			} else {
				if ($current_password == $new_password) {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
						Kata sandi baru tidak boleh sama dengan kata sandi saat ini! </div>');
					redirect('akun/changepassword');	
				} else {
					//passsword sudah bener
					$password_hash = password_hash($new_password, PASSWORD_DEFAULT);


					$this->db->set('password', $password_hash);
					$this->db->where('email', $this->session->userdata('email'));
					$this->db->update('akun');

					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
						Password berhasil diganti! </div>');
					redirect('akun/changepassword');	
				}
			}
		}

		
	}
}
