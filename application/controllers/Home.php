<?php

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

	}

	public function index ()
	{
		$this->load->view('Home/template1');
	}

	public function index1 ()
	{
		$this->load->view('Home/template');
	}

}