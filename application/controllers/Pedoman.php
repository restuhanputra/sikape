<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Pedoman extends CI_Controller 
	{
		public function __construct()
		{
			parent::__construct();
			checkNotLogin();
			$this->load->model('Info_m', 'info');
		}

		public function index()
		{
			$text = "Pedoman";
			$data = array(
				'h_title' => strtoupper($text),
				'title'   => ucfirst($text)
			);
			// get data
			$data['info']   = $this->info->get()->result_array();

			$this->template->load('template','pedoman', $data);
		}
	} /* /.class */
