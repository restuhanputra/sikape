<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Dosen_pa extends CI_Controller 
	{
		public function __construct()
		{
			parent::__construct();
			checkNotLogin();
			$this->load->library('form_validation');
			$this->load->model('Dosen_pa_m', 'dpa');
			$this->load->model('Dosen_m', 'dsn');

		}

		public function index()
		{
			$text = "Dosen Pembimbing Akademik";
			$data = array(
				'h_title' => strtoupper($text),
				'title'   => ucfirst($text)
			);

			// get data
			$data['dpa'] = $this->dpa->get()->result_array();

			$this->template->load('template','dosen_pa/dpa_data', $data);
		}
		
		function add()
		{
			$text = "Tambah Dosen Pembimbing Akademik";
			$data = array(
				'h_title' => strtoupper($text),
				'title'   => ucfirst($text)
			);

			// get data dsn
			$data['list_dsn'] = $this->dsn->get()->result_array();

			if (isset($_POST["tambah"])) 
			{
				$this->rules();

				if ($this->form_validation->run() == FALSE)
				{
					$this->template->load('template','dosen_pa/dpa_form_add', $data);
				}
				else
				{
					$post = $this->input->post(null, true);
					$this->dpa->add($post);

					if($this->db->affected_rows() > 0)
					{
						echo "<script>
							alert('Data berhasil disimpan')
						</script>";
					}
					echo "<script>window.location='". site_url('dosen_pa') ."'</script>";
				}
			}
			else 
			{
				$this->template->load('template','dosen_pa/dpa_form_add', $data);
			}
		}

		function edit()
		{
			$dpa_id  = $this->input->post('dpa_id');

			$text = "Edit Dosen Pembimbing Akademik";
			$data = array(
				'h_title' => strtoupper($text),
				'title'   => ucfirst($text)
			);

			// get data dsn
			$data['list_dsn'] = $this->dsn->get()->result_array();
			$data['dpa_id']   = $this->dpa->get($dpa_id)->row_array();

			if (isset($_POST["edit"])) 
			{
				$this->rules2();

				if ($this->form_validation->run() == FALSE)
				{
					$this->template->load('template','dosen_pa/dpa_form_edit', $data);
				}
				else
				{
					$post = $this->input->post(null, true);
					$this->dpa->edit($post);

					if($this->db->affected_rows() > 0)
					{
						echo "<script>
							alert('Data berhasil disimpan')
						</script>";
					}
					echo "<script>window.location='". site_url('dosen_pa') ."'</script>";
				}
			}
			else 
			{
				$this->template->load('template','dosen_pa/dpa_form_edit', $data);
			}
		}
		
		function delete()
		{
			$dpa_id = $this->input->post('dpa_id');
			$this->dpa->delete($dpa_id);

			if ($this->db->affected_rows() > 0) 
			{
				echo "<script>
					alert('Data berhasil dihapus')
				</script>";
			}
			echo "<script>window.location='". site_url('dosen_pa') ."'</script>";
		}

		function rules()
		{
			$this->form_validation->set_rules('dpa_id', 'ID Dosen P.A', 'trim|required|numeric|is_unique[dpa.dpa_id]', array('min_length' => '%s minimal 9 digit angka !', 'max_length' => '%s minimal 10 digit angka !'));

			$this->form_validation->set_rules('nidn', 'Dosen', 'trim|required|numeric|min_length[9]|max_length[10]|is_unique[dpa.nidn]', array('min_length' => '%s minimal 9 digit angka !', 'max_length' => '%s minimal 10 digit angka !'));

			$this->form_validation->set_message('required', '{field} masih kosong, silahkan diisi !');
			$this->form_validation->set_message('is_unique', '{field} sudah terdaftar !!!');
			
			$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');
		}

		function rules2()
		{
			if($this->input->post('nidn'))
			{
				$this->form_validation->set_rules('nidn', 'Dosen', 'trim|required|numeric|min_length[9]|max_length[10]|is_unique[dpa.nidn]', array('min_length' => '%s minimal 9 digit angka !', 'max_length' => '%s minimal 10 digit angka !'));
			}

			$this->form_validation->set_message('required', '{field} masih kosong, silahkan diisi !');
			$this->form_validation->set_message('is_unique', '{field} sudah terdaftar !!!');
			
			$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');
		}

	} /* /.class */
