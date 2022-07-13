<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Kerja_praktek extends CI_Controller 
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
			$text = "Form Kerja Praktek";
			$data = array(
				'h_title' => strtoupper($text),
				'title'   => ucfirst($text)
			);

			// get data
			$npm                 = $this->session->userdata('npm');
			$data['mhs_id']      = $this->user->get($npm)->row_array();
			$data['info']        = $this->info->get()->result_array();
			$data['no_pngjuan']  = $this->mg->get_pengajuan($npm)->num_rows();
			$data['cek_pngjuan'] = $this->mg->cek_pengajuan($npm)->row_array();

			if (isset($_POST["ajukan"])) 
			{
				$this->rules();

				if ($this->form_validation->run() == FALSE)
				{
					$this->template->load('template','kerja_praktek/kerja_praktek_form', $data);
				}
				else
				{
					$post = $this->input->post(null, true);
					$this->mg->add($post);

					if($this->db->affected_rows() > 0)
					{
						echo "<script>
							alert('Data berhasil disimpan')
						</script>";
					}
					echo "<script>window.location='". site_url('kerja_praktek/riwayat_kerja_praktek') ."'</script>";
				}
			}
			else 
			{
				$this->template->load('template','kerja_praktek/kerja_praktek_form', $data);
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

			// mhs by id
			$query = $this->mg->get_detail($mg_id);
			if($query->num_rows() > 0) 
			{
				$data['mg_id'] = $query->row_array();
				$this->template->load('template','kerja_praktek/kerja_praktek_detail', $data);
			}
			else 
			{
				echo "<script>
					alert('Data tidak ditemukan !')
				</script>";
				echo "<script>window.location='". site_url('kerja_praktek/history_kerja_praktek') ."'</script>";
			}
		}

		function riwayat_kerja_praktek()
		{
			$text = "Riwayat Pengajuan Kerja Praktek";
			$data = array(
				'h_title' => strtoupper($text),
				'title'   => ucfirst($text)
			);

			// get data
			$npm                = $this->session->userdata('npm');
			$data['mg_id']      = $this->mg->get($npm)->result_array();	
			// set notif ok
			$this->mg->notif_ok($npm);		

			$this->template->load('template', 'kerja_praktek/kerja_praktek_history', $data);
		}

		function rules()
		{
			// Mahasiswa
			$this->form_validation->set_rules('no_telp', 'No. Telp', 'required|numeric');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email', array('valid_email' => '%s tidak valid'));
			$this->form_validation->set_rules('jum_sks_lulus', 'Jumlah SKS Lulus', 'required|numeric|max_length[3]', array('max_length' => '%s max 3 digit'));
			$this->form_validation->set_rules('jum_sks_diambil', 'Jumlah SKS Diambil', 'required|numeric|max_length[3]', array('max_length' => '%s max 3 digit'));
			$this->form_validation->set_rules('pengajuan_ke', 'Pengajuan Ke', 'required');
			$this->form_validation->set_rules('bidang_jupel', 'Bidang / Judul Penelitian', 'required');

			// Perussahaan
			$this->form_validation->set_rules('nama_prs', 'Nama Perusahaan', 'required');
			$this->form_validation->set_rules('alamat_prs', 'Alamat Perusahaan', 'required');
			$this->form_validation->set_rules('kota_kab_prs', 'Kota / Kabupaten', 'required', array('required' => '%s harus dipilih !'));
			$this->form_validation->set_rules('kota_kab_nm_prs', 'Nama Kota / Kabupaten', 'required');
			$this->form_validation->set_rules('kode_pos_prs', 'Kode Pos', 'required|numeric');
			$this->form_validation->set_rules('provinsi_prs', 'Provinsi', 'required');
			$this->form_validation->set_rules('ditunjukkan_kpd_prs', 'Ditunjukkan Kepada (Nama Lengkap)', 'required');
			$this->form_validation->set_rules('pos_kerja_prs', 'Posisi Kerja', 'required');
			$this->form_validation->set_rules('no_telp_prs', 'No. Telp Perusahaan', 'required|numeric');
			$this->form_validation->set_rules('email_prs', 'Email Perusahaan', 'required|valid_email', array('valid_email' => '%s tidak valid'));
			$this->form_validation->set_rules('cp_prs', 'Contact Person', 'required|numeric');

			$this->form_validation->set_message('required', '{field} masih kosong, silahkan diisi !');
			$this->form_validation->set_message('is_unique', '{field} sudah terdaftar !!!');
			
			$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');
		}

	} /* /.class */
