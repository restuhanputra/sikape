<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class Magang_m extends CI_Model
	{
		protected $magang = "magang";
		protected $dosen  = "dosen";
		protected $prodi  = "prodi";

		function count()
		{
			$this->db->from($this->magang);
			$query = $this->db->get();
			return $query;
		}

		function verify()
		{
			$this->db->select('verified')
					 ->where('verified', 2)
			         ->from($this->magang);
			$query = $this->db->get();
			return $query;
		}

		function notverify()
		{
			$this->db->select('verified')
					 ->where('verified', 1)
			         ->from($this->magang);
			$query = $this->db->get();
			return $query;
		}

		function get($mg_id = null)
		{
			$this->db->select('magang.*, dosen.nama_lkp as dsn_nama, prodi.nama as prodi_nama');
			$this->db->from($this->magang)
			        ->join($this->dosen, 'dosen.dpa_id = magang.dpa_id')
			        ->join($this->prodi, 'prodi.prodi_id = magang.prodi_id');
			
			if($mg_id != null)
			{
				$this->db->where('magang_id', $mg_id);
			}
			$query = $this->db->get();
			return $query;
		}

		function edit($post, $mg_id)
		{
			$params = array(
				'no_telp'             => $post['no_telp'], 
				'email'               => $post['email'], 
				'sks_lulus'           => $post['jum_sks_lulus'],
				'sks_diambil'         => $post['jum_sks_diambil'],
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
				'updated'             => date('Y-m-d H:i:s'),
				'posted'              => $this->fu->userLogin()['nip']
			);

			$this->db->where('magang_id', $mg_id);
			$query =$this->db->update($this->magang, $params);
		}
	} /* /.class */
