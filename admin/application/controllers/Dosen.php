<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Dosen extends CI_Controller 
	{
		public function __construct()
		{
			parent::__construct();
			checkNotLogin();
	    $this->load->model('Dosen_m', 'dsn');		
			$this->load->model('Agama_m', 'agama');		
			$this->load->library('form_validation');
		}

		public function index()
		{
			$text = "Dosen";
			$data = array(
				'h_title' => strtoupper($text),
				'title'   => ucfirst($text)
			);
			
			// get data
			$data['data_dsn'] = $this->dsn->get()->result_array();

			$this->template->load('template','dosen/dosen_data', $data);
		}

		function add()
		{
			$text = "Tambah Data Dosen";
			$data = array(
				'h_title' => strtoupper($text),
				'title'   => ucfirst($text)
			);

			// get data
			$data['agama'] = $this->agama->get()->result_array();


			if (isset($_POST["tambah"])) 
			{
				$this->rules();

				if ($this->form_validation->run() == FALSE)
				{
					$this->template->load('template','dosen/dosen_form_add', $data);
				}
				else
				{
					$post = $this->input->post(null, true);

					$config['upload_path']   = './../dosen/upload/';
					$config['allowed_types'] = 'jpg|jpeg|png';
					$config['max_size']      = 2048;
					$config['file_name']     = 'dsn'.'_'.date('ymd').'_'.substr(md5(rand()), 0, 10);

					$this->load->library('upload', $config);

					if (@$_FILES['foto']['name'] != null) 
					{
						if($this->upload->do_upload('foto'))
						{
							$post['foto'] = $this->upload->data('file_name');
							$this->dsn->add($post);
							
							if($this->db->affected_rows() > 0)
							{
								echo "<script>
									alert('Data berhasil disimpan')
								</script>";
								echo "<script>window.location='". site_url('dosen') ."'</script>";
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
						$this->dsn->add($post);
						if($this->db->affected_rows() > 0)
						{
							echo "<script>
								alert('Data berhasil disimpan')
							</script>";
						}
						echo "<script>window.location='". site_url('dosen') ."'</script>";
					}
				}
			}
			else 
			{
				$this->template->load('template','dosen/dosen_form_add', $data);
			}
		}

		function detail()
		{
			// get post data
			$nidn = $this->input->post('nidn');

			$text = "Detail Data Dosen";
			$data = array(
				'h_title' => strtoupper($text),
				'title'   => ucfirst($text)
			);

			// get data
			$data['agama'] = $this->agama->get()->result_array();

			// dsn by id
			$query = $this->dsn->get($nidn);
			if($query->num_rows() > 0) 
			{
				$data['dsn_id'] = $query->row_array();
				$this->template->load('template','dosen/dosen_form_detail', $data);
			}
			else 
			{
				echo "<script>
					alert('Data tidak ditemukan !')
				</script>";
				echo "<script>window.location='". site_url('dosen') ."'</script>";
			}
		}

		function edit()
		{
			// get post data
			$nidn = $this->input->post('nidn');

			$text = "Edit Data Dosen";
			$data = array(
				'h_title' => strtoupper($text),
				'title'   => ucfirst($text)
			);

			// get data
			$data['agama'] = $this->agama->get()->result_array();

			$query = $this->dsn->get($nidn);
			if($query->num_rows() > 0) 
			{
				$data['dsn_id'] = $query->row_array();
			}
			else 
			{
				echo "<script>
					alert('Data tidak ditemukan !')
				</script>";
				echo "<script>window.location='". site_url('dosen') ."'</script>";
			}


			if (isset($_POST["edit"])) 
			{
				$this->rules2();

				if ($this->form_validation->run() == FALSE)
				{
					$this->template->load('template','dosen/dosen_form_edit', $data);
				}
				else
				{
					$post = $this->input->post(null, true);
					
					$config['upload_path']   = './../dosen/upload/';
					$config['allowed_types'] = 'jpg|jpeg|png';
					$config['max_size']      = 2048;
					$config['file_name']     = 'dsn'.'_'.date('ymd').'_'.substr(md5(rand()), 0, 10);

					$this->load->library('upload', $config);

					if (@$_FILES['foto']['name'] != null) 
					{
						if($this->upload->do_upload('foto'))
						{
							$user = $this->dsn->get($nidn)->row_array();
							if($user['foto'] != null)
							{
								$target_file = './../dosen/upload/'. $user['foto'];
								unlink($target_file);
							}

							$post['foto'] = $this->upload->data('file_name');
							$this->dsn->edit($post, $nidn);
							
							if($this->db->affected_rows() > 0)
							{
								echo "<script>
									alert('Data berhasil disimpan')
								</script>";
								echo "<script>window.location='". site_url('dosen') ."'</script>";
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
						$this->dsn->edit($post, $nidn);
						if($this->db->affected_rows() > 0)
						{
							echo "<script>
								alert('Data berhasil disimpan')
							</script>";
						}
						echo "<script>window.location='". site_url('dosen') ."'</script>";
					}
				}
			}
			else 
			{
				$this->template->load('template','dosen/dosen_form_edit', $data);
			}
		}

		function delete()
		{
			$nidn = $this->input->post('nidn');
			$user = $this->dsn->get($nidn)->row_array();
			if($user['foto'] != null)
			{
				$target_file = './../dosen/upload/'. $user['foto'];
				unlink($target_file);
			}
			$this->dsn->delete($nidn);

			if ($this->db->affected_rows() > 0) 
			{
				echo "<script>
					alert('Data berhasil dihapus')
				</script>";
			}
			echo "<script>window.location='". site_url('dosen') ."'</script>";
		}

		function rules()
		{
			$this->form_validation->set_rules('nidn', 'NIDN', 'trim|required|numeric|min_length[9]|max_length[10]|is_unique[dosen.nidn]', array('min_length' => '%s minimal 9 digit angka !', 'max_length' => '%s minimal 10 digit angka !'));
			$this->form_validation->set_rules('nama_lkp', 'Nama lengkap', 'required');
			$this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required', array('required' => '%s harus dipilih !'));
			$this->form_validation->set_rules('agama', 'Agama', 'required', array('required' => '%s harus dipilih !'));
			$this->form_validation->set_rules('no_telp', 'No. Telp', 'numeric');
			$this->form_validation->set_rules('email', 'Email', 'valid_email', array('valid_email' => '%s tidak valid'));
			$this->form_validation->set_rules('password', 'Password', 'trim|required');
			$this->form_validation->set_rules('password_konf', 'Password Konfirmasi', 'trim|required|matches[password]', array('matches' => '%s tidak sesuai dengan Password'));
			$this->form_validation->set_rules('role', 'Role', 'required', array('required' => '%s harus dipilih !'));
			$this->form_validation->set_rules('status', 'Status', 'required', array('required' => '%s harus dipilih !'));

			$this->form_validation->set_message('required', '{field} masih kosong, silahkan diisi !');
			$this->form_validation->set_message('is_unique', '{field} sudah terdaftar !!!');
			
			$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');
		}

		function rules2()
		{
			$this->form_validation->set_rules('nama_lkp', 'Nama lengkap', 'required');
			$this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required', array('required' => '%s harus dipilih !'));
			$this->form_validation->set_rules('agama', 'Agama', 'required', array('required' => '%s harus dipilih !'));
			$this->form_validation->set_rules('no_telp', 'No. Telp', 'numeric');
			$this->form_validation->set_rules('email', 'Email', 'valid_email', array('valid_email' => '%s tidak valid'));
			if($this->input->post('password'))
			{
				$this->form_validation->set_rules('password', 'Password', 'trim|required');
			}
			if($this->input->post('password_konf'))
			{
				$this->form_validation->set_rules('password_konf', 'Password Konfirmasi', 'trim|required|matches[password]', array('matches' => '%s tidak sesuai dengan Password'));
			}
			$this->form_validation->set_rules('role', 'Role', 'required', array('required' => '%s harus dipilih !'));
			$this->form_validation->set_rules('status', 'Status', 'required', array('required' => '%s harus dipilih !'));

			$this->form_validation->set_message('required', '{field} masih kosong, silahkan diisi !');
			$this->form_validation->set_message('is_unique', '{field} sudah terdaftar !!!');
			
			$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');
		}


	} /* /.class */
