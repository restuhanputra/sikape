<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Pedoman extends CI_Controller 
	{
		public function __construct()
		{
			parent::__construct();
			checkNotLogin();
		}

		public function index()
		{
			$text = "Pedoman";
			$data = array(
				'h_title' => strtoupper($text),
				'title'   => ucfirst($text)
			);
			$this->template->load('template','pedoman', $data);
		}

	} /* /.class */
