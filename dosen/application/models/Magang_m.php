<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class Magang_m extends CI_Model
	{

		protected $magang = "magang";
		protected $prodi  = "prodi";
		protected $dosen  = "dosen";

		function get($dpa_id = null)
		{
			$this->db->select('magang.*, dosen.nama_lkp as dsn_nama, prodi.nama as prodi_nama');
			$this->db->from($this->magang)
			        ->join($this->dosen, 'dosen.dpa_id = magang.dpa_id')
			        ->join($this->prodi, 'prodi.prodi_id = magang.prodi_id');

			if($dpa_id != null)
			{
				$this->db->where('magang.dpa_id', $dpa_id)
				         ->where('verified', 1);
			}
					 
			$query = $this->db->get();
			return $query;
		}

		function get_rverifikasi($dpa_id)
		{
			$this->db->from($this->magang)
					 ->where('dpa_id', $dpa_id)
					 ->where('verified', 2)
					 ->order_by('verified_dt', 'desc');
			$query = $this->db->get();
			return $query;
		}

		function get_detail($mg_id)
		{	$this->db->select('magang.*, dosen.nama_lkp as dsn_nama, prodi.nama as prodi_nama');
			$this->db->from($this->magang)
			        ->join($this->dosen, 'dosen.dpa_id = magang.dpa_id')
			        ->join($this->prodi, 'prodi.prodi_id = magang.prodi_id')
					->where('magang_id', $mg_id);
			$query = $this->db->get();
			return $query;
		}

		function verifikasi($post)
		{
			$params = array(
				'verified'    => 2,
				'notif'       => 2,
				'verified_dt' => date('Y-m-d H:i:s')
			);

			$this->db->where('magang_id', $post['mg_id']);
			$query =$this->db->update($this->magang, $params);
			return $query;
		}

	} /* /.class */
