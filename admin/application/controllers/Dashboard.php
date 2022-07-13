<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Dashboard extends CI_Controller 
	{
		public function __construct()
		{
			parent::__construct();
			checkNotLogin();
			$this->load->model('Mahasiswa_m', 'mhs');
			$this->load->model('Dosen_m', 'dsn');
			$this->load->model('Dosen_pa_m', 'dpa');
			$this->load->model('Magang_m', 'mg');
		}

		public function index()
		{
			$text = "Dashboard";
			$data = array(
				'h_title' => strtoupper($text),
				'title'   => ucfirst($text)
			);

			// get data count
			$data['count_mhs'] = $this->mhs->count()->num_rows();
			$data['count_dsn'] = $this->dsn->count()->num_rows();
			$data['count_mg']  = $this->mg->count()->num_rows();
			$data['count_dpa'] = $this->dpa->count()->num_rows();

			// counter
			$data['verify']    = $this->mg->verify()->num_rows();
			$data['notverify'] = $this->mg->notverify()->num_rows();

			$this->template->load('template','dashboard', $data);
		}

	} /* /.class */
