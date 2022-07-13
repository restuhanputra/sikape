<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Mahasiswa extends CI_Controller 
	{
		public function __construct()
		{
			parent::__construct();
			checkNotLogin();
			$this->load->model('Mahasiswa_m', 'mhs');		
			$this->load->model('Agama_m', 'agama');		
			$this->load->model('Dosen_pa_m', 'dpa');		
			$this->load->library('form_validation');
		}

		public function index()
		{
			$text = "Mahasiswa";
			$data = array(
				'h_title' => strtoupper($text),
				'title'   => ucfirst($text)
			);
			
			// get data
			$data['data_mhs'] = $this->mhs->get()->result_array();

			$this->template->load('template','mahasiswa/mahasiswa_data', $data);
		}


		function add()
		{
			$text = "Tambah Data Mahasiswa";
			$data = array(
				'h_title' => strtoupper($text),
				'title'   => ucfirst($text)
			);

			// get data
			$data['dpa']   = $this->dpa->get()->result_array();
			$data['agama'] = $this->agama->get()->result_array();

			if (isset($_POST["tambah"])) 
			{
				$this->rules();

				if ($this->form_validation->run() == FALSE)
				{
					$this->template->load('template','mahasiswa/mahasiswa_form_add', $data);
				}
				else
				{
					$post = $this->input->post(null, true);

					$config['upload_path']   = './../upload/';
					$config['allowed_types'] = 'jpg|jpeg|png';
					$config['max_size']      = 2048;
					$config['file_name']     = 'mhs'.'_'.date('ymd').'_'.substr(md5(rand()), 0, 10);

					$this->load->library('upload', $config);

					if (@$_FILES['foto']['name'] != null) 
					{
						if($this->upload->do_upload('foto'))
						{
							$post['foto'] = $this->upload->data('file_name');
							$this->mhs->add($post);
							
							if($this->db->affected_rows() > 0)
							{
								echo "<script>
									alert('Data berhasil disimpan')
								</script>";
								echo "<script>window.location='". site_url('mahasiswa') ."'</script>";
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
						$this->mhs->add($post);
						if($this->db->affected_rows() > 0)
						{
							echo "<script>
								alert('Data berhasil disimpan')
							</script>";
						}
						echo "<script>window.location='". site_url('mahasiswa') ."'</script>";
					}
				}
			}
			else 
			{
				$this->template->load('template','mahasiswa/mahasiswa_form_add', $data);
			}
		}

		function detail()
		{
			// get post data
			$npm = $this->input->post('npm');

			$text = "Detail Data Mahasiswa";
			$data = array(
				'h_title' => strtoupper($text),
				'title'   => ucfirst($text)
			);

			// get data
			$data['dpa']   = $this->dpa->get()->result_array();
			$data['agama'] = $this->agama->get()->result_array();

			// mhs by id
			$query = $this->mhs->get($npm);
			if($query->num_rows() > 0) 
			{
				$data['mhs_id'] = $query->row_array();
				$this->template->load('template','mahasiswa/mahasiswa_form_detail', $data);
			}
			else 
			{
				echo "<script>
					alert('Data tidak ditemukan !')
				</script>";
				echo "<script>window.location='". site_url('mahasiswa') ."'</script>";
			}
		}

		function edit()
		{
			// get post data
			$npm = $this->input->post('npm');

			$text = "Edit Data Mahasiswa";
			$data = array(
				'h_title' => strtoupper($text),
				'title'   => ucfirst($text)
			);

			// get data
			$data['dpa']   = $this->dpa->get()->result_array();
			$data['agama'] = $this->agama->get()->result_array();

			$query = $this->mhs->get($npm);
			if($query->num_rows() > 0) 
			{
				$data['mhs_id'] = $query->row_array();
			}
			else 
			{
				echo "<script>
					alert('Data tidak ditemukan !')
				</script>";
				echo "<script>window.location='". site_url('mahasiswa') ."'</script>";
			}


			if (isset($_POST["edit"])) 
			{
				$this->rules2();

				if ($this->form_validation->run() == FALSE)
				{
					$this->template->load('template','mahasiswa/mahasiswa_form_edit', $data);
				}
				else
				{
					$post = $this->input->post(null, true);

					$config['upload_path']   = './../upload/';
					$config['allowed_types'] = 'jpg|jpeg|png';
					$config['max_size']      = 2048;
					$config['file_name']     = 'mhs'.'_'.date('ymd').'_'.substr(md5(rand()), 0, 10);

					$this->load->library('upload', $config);

					if (@$_FILES['foto']['name'] != null) 
					{
						if($this->upload->do_upload('foto'))
						{
							$user = $this->mhs->get($npm)->row_array();
							if($user['foto'] != null)
							{
								$target_file = './../upload/'. $user['foto'];
								unlink($target_file);
							}

							$post['foto'] = $this->upload->data('file_name');
							$this->mhs->edit($post, $npm);
							
							if($this->db->affected_rows() > 0)
							{
								echo "<script>
									alert('Data berhasil disimpan')
								</script>";
								echo "<script>window.location='". site_url('mahasiswa') ."'</script>";
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
						$this->mhs->edit($post, $npm);
						if($this->db->affected_rows() > 0)
						{
							echo "<script>
								alert('Data berhasil disimpan')
							</script>";
							echo "<script>window.location='". site_url('mahasiswa') ."'</script>";
						}
						echo "<script>
							alert('Data berhasil disimpan')
						</script>";
						echo "<script>window.location='". site_url('mahasiswa') ."'</script>";
					}
				}
			}
			else 
			{
				$this->template->load('template','mahasiswa/mahasiswa_form_edit', $data);
			}
		}

		function delete()
		{
			$npm  = $this->input->post('npm');
			$user = $this->mhs->get($npm)->row_array();
			if($user['foto'] != null)
			{
				$target_file = './../upload/'. $user['foto'];
				unlink($target_file);
			}

			$this->mhs->delete($npm);

			if ($this->db->affected_rows() > 0) 
			{
				echo "<script>
					alert('Data berhasil dihapus')
				</script>";
			}
			echo "<script>window.location='". site_url('mahasiswa') ."'</script>";
		}

		function rules()
		{
			$this->form_validation->set_rules('npm', 'NPM', 'trim|required|numeric|exact_length[12]|is_unique[mahasiswa.npm]', array('exact_length' => '%s harus 11 digit angka !'));
			$this->form_validation->set_rules('nama_lkp', 'Nama lengkap', 'required');
			$this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required', array('required' => '%s harus dipilih !'));
			$this->form_validation->set_rules('agama', 'Agama', 'required', array('required' => '%s harus dipilih !'));
			$this->form_validation->set_rules('no_telp', 'No. Telp', 'required|numeric');
			$this->form_validation->set_rules('email', 'Email', 'valid_email', array('valid_email' => '%s tidak valid'));
			$this->form_validation->set_rules('dosen_pa', 'Dosen P.A', 'required', array('required' => '%s harus dipilih !'));
			$this->form_validation->set_rules('password', 'Password', 'trim|required');
			$this->form_validation->set_rules('password_konf', 'Password Konfirmasi', 'trim|required|matches[password]', array('matches' => '%s tidak sesuai dengan Password'));
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
			$this->form_validation->set_rules('no_telp', 'No. Telp', 'required|numeric');
			$this->form_validation->set_rules('email', 'Email', 'valid_email', array('valid_email' => '%s tidak valid'));
			$this->form_validation->set_rules('dosen_pa', 'Dosen P.A', 'required', array('required' => '%s harus dipilih !'));
			if($this->input->post('password'))
			{
				$this->form_validation->set_rules('password', 'Password', 'trim|required');
			}
			if($this->input->post('password_konf'))
			{
				$this->form_validation->set_rules('password_konf', 'Password Konfirmasi', 'trim|required|matches[password]', array('matches' => '%s tidak sesuai dengan Password'));
			}
			
			$this->form_validation->set_rules('status', 'Status', 'required', array('required' => '%s harus dipilih !'));

			$this->form_validation->set_message('required', '{field} masih kosong, silahkan diisi !');
			$this->form_validation->set_message('is_unique', '{field} sudah terdaftar !!!');
			
			$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');
		}
		
	} /* /.class */
