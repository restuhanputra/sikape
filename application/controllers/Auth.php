<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Auth extends CI_Controller 
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('User_m', 'user');
			$this->load->library('form_validation');
			$this->load->library('session');
		}

		public function index()
		{
			// checkAlreadyLogin();
			$text = "Login";
			$data = array(
				'h_title' => strtoupper($text),
			);
			$this->load->view('auth/login', $data);
		}

		function process()
		{
			$this->rules();
	
			$username = $this->input->post('username');
			$password = $this->input->post('password');
	
			if ($this->form_validation->run() === FALSE) 
			{
				$this->index();
			} 
			else 
			{
				$query = $this->user->login($username, $password);

				if(isset($query))
				{
					if($query['status'] == 2)
					{
						$params = array(
							'npm'  => $query['npm'],
							'role' => 'mahasiswa'
						);
						$this->session->set_userdata($params);
						redirect('home');
					}
					elseif($query['status'] == 1)
					{
						$this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><center><i class="icon fa fa-warning"> </i>Account Inactive</center></div>');
						$this->index();
					}
					else
					{
						$this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><center><i class="icon fa fa-warning"> </i>Username atau password salah</center></div>');
						$this->index();
					}
				}
				else
				{
					$this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><center><i class="icon fa fa-warning"> </i>Username atau password salah</center></div>');
					$this->index();
				}
			}
		}

		function logout()
		{
			$params = array(
				'npm',
				'role'
			);
			$this->session->unset_userdata($params);
			redirect('auth');
		}

		function rules()
		{
			$this->form_validation->set_rules('username', 'Username', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');

			$this->form_validation->set_message('required', '{field} masih kosong silahkan diisi');
			$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');
		}
		
	} /* /.class */
