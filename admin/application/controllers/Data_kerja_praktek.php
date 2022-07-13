<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Data_kerja_praktek extends CI_Controller 
	{
		public function __construct()
		{
			parent::__construct();
			checkNotLogin();
			$this->load->library('form_validation');
			$this->load->model('Magang_m', 'mg');
			$this->load->model('Dosen_m', 'dsn');
			$this->load->model('Mahasiswa_m', 'mhs');
			$this->load->model('Surat_m', 'srt');
			$this->load->library('Pdf');
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
			$data['mg_id'] = $this->mg->get($mg_id)->row_array();

			$this->template->load('template','kerja_praktek/kerja_praktek_detail',$data);
		}

		function edit()
		{
			// get post data
			$mg_id = $this->input->post('mg_id');

			$text = "Detail Data Kerja Praktek";
			$data = array(
				'h_title' => strtoupper($text),
				'title'   => ucfirst($text)
			);

			// get data
			$data['mgg_id'] = $this->mg->get($mg_id)->row_array();

			if (isset($_POST["edit"])) 
			{
				$this->rules();

				if ($this->form_validation->run() == FALSE)
				{
					$this->template->load('template','kerja_praktek/kerja_praktek_edit', $data);
				}
				else
				{
					$post = $this->input->post(null, true);
					$this->mg->edit($post, $mg_id);

					if($this->db->affected_rows() > 0)
					{
						echo "<script>
							alert('Data berhasil disimpan')
						</script>";
					}
					echo "<script>window.location='". site_url('data_kerja_praktek') ."'</script>";
				}
			}
			else 
			{
				$this->template->load('template','kerja_praktek/kerja_praktek_edit',$data);
			}

		}

		function print()
		{
			$mg_id     = $this->input->post('mg_id');
			$npm       = $this->input->post('npm');
			$mg        = $this->mg->get($mg_id)->row_array();
			$dsn       = $this->dsn->kaprodi()->row_array();
			$kaprodi   = $dsn['nama_lkp'];
			$date      = date('Y-m-d H:i:s');
			$bulan_ini = date('m');
			$romawi    = bulan_romawi($bulan_ini);
			$no_surat  = $this->srt->no_surat()->row_array();

			if($no_surat['no_surat'] < 1000)
			{
				$no = $no_surat['no_surat']+1;
			}
			else 
			{
				$no = $no_surat = 1;
			}

			$params = array(
					'prodi_id'  => 1,
					'magang_id' => $mg_id,
					'kaprodi'   => $kaprodi,
					'npm'       => $npm,
					'no_surat'  => $no,
					'no_romawi' => $romawi,
					'created'   => $date,
					'posted'    => $this->fu->userLogin()['nip']
			);
			$this->srt->add($params);
			
			if($this->db->affected_rows() > 0)
			{
				$magang            = $this->mg->get($mg_id)->row_array();
				$data['d_print']   = $magang;
				$date2             = date('Y-m-d');
				$data['d_tanggal'] = mediumdate_indo($date2);
				$data['no']        = $no;
				$data['romawi']    = $romawi;
				$data['kaprodi']   = $kaprodi;

				$html= $this->load->view('cetak/surat', $data, TRUE);

				$title_page = 'surat_magang_'.$magang['npm'];
				$this->pdf->pdf_create($html, $title_page, 'A4', 'portrait');
			}
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
