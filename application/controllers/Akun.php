<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akun extends CI_Controller {


	public function index()
	{

		$data['akun'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();
		echo "Selamat" . $data['akun']['name'];
	}


}