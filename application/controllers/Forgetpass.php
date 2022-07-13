<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class Forgetpass extends CI_Controller 
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->library('form_validation');
			$this->load->model('User_m', 'user');
		}

		public function index()
		{
			$text = "Lupa Password";
			$data = array(
				'h_title' => strtoupper($text),
				'title'   => ucfirst($text)
			);

			$this->load->view('auth/forgetpass', $data);
		}

		function process()
		{
			$this->rules();
	
			$email    = $this->input->post('email');
			$password = $this->input->post('password');
	
			if ($this->form_validation->run() === FALSE) 
			{
				$this->index();
			} 
			else 
			{
				$query = $this->user->forget($email, $password);
				
				if($this->db->affected_rows() > 0)
				{
					echo "<script>
						alert('Data berhasil disimpan')
					</script>";
					echo "<script>window.location='". site_url('auth') ."'</script>";
				}
				else 
				{
					$this->load->view('auth/login');
				}
			}
		}

		function rules()
		{
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
			$this->form_validation->set_rules('password', 'Password', 'required|trim');
			$this->form_validation->set_rules('password_konf', 'Konfirmasi Password', 'required|trim|matches[password]');

			$this->form_validation->set_message('required', '{field} masih kosong silahkan diisi');
			$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');
		}

	} /* /.class */
