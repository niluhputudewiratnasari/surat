<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		echo "Ini Function index";
		// $this->load->view('welcome_message');
	}
	public function nama()
	{
		echo "Dosen terbaik adalah ....";
	}

}
