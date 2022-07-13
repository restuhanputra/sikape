<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Verifikasi_kerja_praktek extends CI_Controller 
	{
		public function __construct()
		{
			parent::__construct();
			checkNotLogin();
			$this->load->library('form_validation');
			$this->load->model('User_m', 'user');
			$this->load->model('Info_m', 'info');
			$this->load->model('Magang_m', 'mg');
		}

		public function index()
		{
			$text = "Verifikasi Pengajuan Form Kerja Praktek";
			$data = array(
				'h_title' => strtoupper($text),
				'title'   => ucfirst($text)
			);

			// get data
			$nidn           = $this->session->userdata('nidn');
			$dsn            = $this->user->get($nidn)->row_array();
			$dpa_id         = $dsn['dpa_id'];
			$by_id          = true;
			$data['dsn_id'] = $dsn;
			$data['info']   = $this->info->get()->result_array();
			$data['vrf_mg'] = $this->mg->get($dpa_id)->result_array();


			if (isset($_POST["verifikasi"])) 
			{
				$post = $this->input->post(null, true);
				$this->mg->verifikasi($post);

				if($this->db->affected_rows() > 0)
				{
					echo "<script>
						alert('Data berhasil disimpan')
					</script>";
				}
				echo "<script>window.location='". site_url('verifikasi_kerja_praktek/riwayat_verifikasi') ."'</script>";
			}
			else 
			{
				$this->template->load('template','verifikasi_kerja_praktek/kerja_praktek_verifikasi', $data);
			}
		}

		function detail()
		{
			// get post data
			$mg_id = $this->input->post('mg_id');

			$text = "Detail Pengajuan Form Kerja Praktek";
			$data = array(
				'h_title' => strtoupper($text),
				'title'   => ucfirst($text)
			);

			if(isset($_POST["verify"]))
			{
				$data['link'] = 'verifikasi_kerja_praktek';
			}
			elseif (isset($_POST["history"]))
			{
				$data['link'] = 'verifikasi_kerja_praktek/riwayat_verifikasi';
			}

			// mhs by id
			$query = $this->mg->get_detail($mg_id);
			if($query->num_rows() > 0) 
			{
				$data['mg_id'] = $query->row_array();
				$this->template->load('template','verifikasi_kerja_praktek/kerja_praktek_detail', $data);
			}
			else 
			{
				echo "<script>
					alert('Data tidak ditemukan !')
				</script>";
				echo "<script>window.location='". site_url('verifikasi_kerja_praktek/kerja_praktek_verifikasi') ."'</script>";
			}
		}

		function riwayat_verifikasi()
		{
			$text = "Riwayat Verifikasi Pengajuan Form Kerja Praktek";
			$data = array(
				'h_title' => strtoupper($text),
				'title'   => ucfirst($text)
			);

			// get data
			$nidn          = $this->session->userdata('nidn');
			$dsn           = $this->user->get($nidn)->row_array();
			$dpa_id        = $dsn['dpa_id'];
			$data['rv_mg'] = $this->mg->get_rverifikasi($dpa_id)->result_array();			

			$this->template->load('template', 'verifikasi_kerja_praktek/kerja_praktek_history', $data);
		}		

	} /* /.class */
