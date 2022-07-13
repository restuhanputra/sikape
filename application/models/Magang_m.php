<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class Magang_m extends CI_Model
	{

		protected $magang = "magang";

		function get($npm)
		{
			$this->db->from($this->magang)
			         ->where('npm', $npm);
			$query = $this->db->get();
			return $query;
		}

		function get_detail($npm)
		{
			$this->db->from($this->magang)
					 ->where('magang_id', $npm);
			$query = $this->db->get();
			return $query;
		}

		function get_pengajuan($npm)
		{
			$this->db->select('notif')
			         ->from($this->magang)
					 ->where('npm', $npm);
			$query = $this->db->get();
			return $query;
		}

		function cek_pengajuan($npm)
		{
			$this->db->from($this->magang)
			         ->where('npm', $npm)
						->order_by('created', 'desc')
						->limit(1);
			$query = $this->db->get();
			return $query;
		}

		function notif_ok($npm)
		{
			$this->db->from($this->magang)
					 ->where('npm', $npm, 'desc')
					 ->limit(1);
			$query =$this->db->update($this->magang, array('notif' => 1));
		}

		function add($post)
		{
			$params = array(
				'prodi_id' 	          => 1, 
				'dpa_id'              => $post['dosen_pa'],
				'npm' 	              => $post['npm'], 
				'nama_lkp'            => $post['nama_lkp'], 
				'no_telp'             => $post['no_telp'], 
				'email'               => $post['email'], 
				'sks_lulus'           => $post['jum_sks_lulus'],
				'sks_diambil'         => $post['jum_sks_diambil'],
				'pengajuan_ke'        => $post['pengajuan_ke'],
				'bidang_judul'        => $post['bidang_jupel'],
				'nama_prs'            => $post['nama_prs'],
				'alamat_prs'          => $post['alamat_prs'],
				'kota_kab_prs'        => $post['kota_kab_prs'],
				'kota_kab_nm_prs'     => $post['kota_kab_nm_prs'],
				'kode_pos_prs'        => $post['kode_pos_prs'],
				'provinsi_prs'        => $post['provinsi_prs'],
				'ditunjukkan_kpd_prs' => $post['ditunjukkan_kpd_prs'],
				'pos_kerja_prs'       => $post['pos_kerja_prs'],
				'no_telp_prs'         => $post['no_telp_prs'],
				'email_prs'           => $post['email_prs'],
				'cp_prs'              => $post['cp_prs'],
				'verified'            => 1,
				'notif'               => 1,
				'created'             => date('Y-m-d H:i:s')
			);

			$query =$this->db->insert($this->magang, $params);
			return $query;
		}

	} /* /.class */
