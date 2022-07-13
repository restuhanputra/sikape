<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class Surat_m extends CI_Model
	{
		protected $surat = "surat";

		function get($id = null)
		{
			$this->db->from($this->surat);
	
			$query = $this->db->get();
			return $query;
		}

		function no_surat()
		{
			$this->db->from($this->surat)
					 ->limit(1)
					 ->order_by('surat_id', 'desc');
			$query = $this->db->get();
			return $query;
		}

		function add($params)
		{
			$query =$this->db->insert($this->surat, $params);
			return $query;
		}

	} /* /.class */
