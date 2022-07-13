<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Home extends CI_Controller 
	{
		public function __construct()
		{
			parent::__construct();
			checkNotLogin();
			$this->load->model('Info_m', 'info');
			$this->load->model('User_m', 'user');
		}

		public function index()
		{
			$text = "Home";
			$data = array(
				'h_title' => strtoupper($text),
				'title'   => ucfirst($text)
			);
			// get data
			$nidn            = $this->session->userdata('nidn');
			$data['info']   = $this->info->get()->result_array();
			$data['dsn_id'] = $this->user->get($nidn)->row_array();

			$this->template->load('template','home', $data);
		}

	} /* /.class */
