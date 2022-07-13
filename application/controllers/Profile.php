<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Profile extends CI_Controller 
	{
		public function __construct()
		{
			parent::__construct();
			checkNotLogin();
			$this->load->library('form_validation');
			$this->load->model('User_m', 'user');
			$this->load->model('Info_m', 'info');
		}

		public function index()
		{
			$text = "Profile";
			$data = array(
				'h_title' => strtoupper($text),
				'title'   => ucfirst($text)
			);

			// get data
			$npm            = $this->session->userdata('npm');
			$data['mhs_id'] = $this->user->get($npm)->row_array();
			$data['info']   = $this->info->get()->result_array();
			
			$this->template->load('template','profile/profile', $data);
		}

		function edit()
		{
			$text = "Edit Profile";
			$data = array(
				'h_title' => strtoupper($text),
				'title'   => ucfirst($text)
			);

			// get data
			$npm            = $this->session->userdata('npm');
			$data['mhs_id'] = $this->user->get($npm)->row_array();
			$data['info']   = $this->info->get()->result_array();

			if (isset($_POST["edit"])) 
			{
				$this->rules();

				if ($this->form_validation->run() == FALSE)
				{
					$this->template->load('template','profile/profile_edit', $data);
				}
				else
				{
					$post  = $this->input->post(null, true);

					$config['upload_path']   = './upload/';
					$config['allowed_types'] = 'jpg|jpeg|png';
					$config['max_size']      = 2048;
					$config['file_name']     = 'mhs'.'_'.date('ymd').'_'.substr(md5(rand()), 0, 10);

					$this->load->library('upload', $config);

					if (@$_FILES['foto']['name'] != null) 
					{
						if($this->upload->do_upload('foto'))
						{
							$user = $this->user->get($npm)->row_array();
							if($user['foto'] != null)
							{
								$target_file = './upload/'. $user['foto'];
								unlink($target_file);
							}

							$post['foto'] = $this->upload->data('file_name');
							$this->user->edit($post, $npm);
							
							if($this->db->affected_rows() > 0)
							{
								echo "<script>
									alert('Data berhasil disimpan')
								</script>";
								echo "<script>window.location='". site_url('profile') ."'</script>";
							}
						}
						else 
						{
							$error = $this->upload->display_errors();
							echo "<script>alert('";
							echo $error;	
							echo "')</script>";
						}
					}
					else 
					{
						$this->user->edit($post, $npm);
						echo "<script>
							alert('Data berhasil disimpan')
						</script>";
						echo "<script>window.location='". site_url('profile') ."'</script>";
					}
				}
			}
			else 
			{
				$this->template->load('template','profile/profile_edit', $data);
			}
		}

		function rules()
		{
			$this->form_validation->set_rules('no_telp', 'No. Telp', 'required|numeric');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email', array('valid_email' => '%s tidak valid'));
			$this->form_validation->set_rules('alamat_lkp', 'Alamat Lengkap', 'required');
			if($this->input->post('password'))
			{
				$this->form_validation->set_rules('password', 'Password', 'trim|required');
			}
			if($this->input->post('password_konf'))
			{
				$this->form_validation->set_rules('password_konf', 'Password Konfirmasi', 'trim|required|matches[password]', array('matches' => '%s tidak sesuai dengan Password'));
			}

			$this->form_validation->set_message('required', '{field} masih kosong, silahkan diisi !');
			
			$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');
		}

	} /* /.class */
