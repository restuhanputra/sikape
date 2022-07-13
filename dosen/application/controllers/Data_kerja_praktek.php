<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class data_kerja_praktek extends CI_Controller 
	{
		public function __construct()
		{
			parent::__construct();
			checkNotLogin();
			$this->load->model('Magang_m', 'mg');
		}

		public function index()
		{
			$text = "Data Kerja Praktek";
			$data = array(
				'h_title' => strtoupper($text),
				'title'   => ucfirst($text)
			);

			// get data
			$data['data_mg'] = $this->mg->get()->result_array();

			$this->template->load('template','kerja_praktek/kerja_praktek_data',$data);
		}

		function detail()
		{
			// get post data
			$mg_id = $this->input->post('mg_id');

			$text = "Detail Data Kerja Praktek";
			$data = array(
				'h_title' => strtoupper($text),
				'title'   => ucfirst($text)
			);

			// get data
			$data['mg_id'] = $this->mg->get_detail($mg_id)->row_array();

			$this->template->load('template','kerja_praktek/kerja_praktek_detail',$data);
		}
		
	} /* /.class */
