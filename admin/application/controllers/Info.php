<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Info extends CI_Controller 
	{
		public function __construct()
		{
			parent::__construct();
			checkNotLogin();
			$this->load->library('form_validation');
			$this->load->model('Info_m', 'info');	
		}

		public function index()
		{
			$text = "Info";
			$data = array(
				'h_title' => strtoupper($text),
				'title'   => ucfirst($text)
			);

			// get data
			$data['info'] = $this->info->get()->result_array();

			$this->template->load('template','info/info_data', $data);
		}

		function add()
		{
			$text = "Tambah Info";
			$data = array(
				'h_title' => strtoupper($text),
				'title'   => ucfirst($text)
			);

			if (isset($_POST["tambah"])) 
			{
				$this->rules();

				if ($this->form_validation->run() == FALSE)
				{
					$this->template->load('template','info/info_form_add', $data);
				}
				else
				{
					$post = $this->input->post(null, true);
					$this->info->add($post);

					if($this->db->affected_rows() > 0)
					{
						echo "<script>
							alert('Data berhasil disimpan')
						</script>";
					}
					echo "<script>window.location='". site_url('info') ."'</script>";
				}
			}
			else 
			{
				$this->template->load('template','info/info_form_add', $data);
			}
		}

		function edit()
		{
			$id_info = $this->input->post('info_id');

			$text = "Edit Info";
			$data = array(
				'h_title' => strtoupper($text),
				'title'   => ucfirst($text)
			);

			// get data
			$query = $this->info->get($id_info);
			if($query->num_rows() > 0) 
			{
				$data['info_id'] = $query->row_array();
			}
			else 
			{
				echo "<script>
					alert('Data tidak ditemukan !')
				</script>";
				echo "<script>window.location='". site_url('info') ."'</script>";
			}

			if (isset($_POST["edit"])) 
			{
				$this->rules();

				if ($this->form_validation->run() == FALSE)
				{
					$this->template->load('template','info/info_form_edit', $data);
				}
				else
				{
					$post = $this->input->post(null, true);
					$this->info->edit($post, $id_info);

					if($this->db->affected_rows() > 0)
					{
						echo "<script>
							alert('Data berhasil disimpan')
						</script>";
					}
					echo "<script>window.location='". site_url('info') ."'</script>";
				}
			}
			else 
			{
				$this->template->load('template','info/info_form_edit', $data);
			}
		}

		function delete()
		{
			$info_id = $this->input->post('info_id');
			$this->info->delete($info_id);
			
			if ($this->db->affected_rows() > 0) 
			{
				echo "<script>
					alert('Data berhasil dihapus')
				</script>";
			}
			echo "<script>window.location='". site_url('info') ."'</script>";
			
		}

		function rules()
		{
			$this->form_validation->set_rules('judul', 'Judul', 'required');
			$this->form_validation->set_rules('content', 'Content', 'required');

			$this->form_validation->set_message('required', '{field} masih kosong, silahkan diisi !');
			$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');
		}

	} /* /.class */
