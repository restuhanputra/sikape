<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class Dosen_pa_m extends CI_Model
	{
		protected $dpa   = "dpa";
		protected $dosen = "dosen";

		function count()
		{
			$this->db->from($this->dosen);
			$query = $this->db->get();
			return $query;
		}

		function get($dpa_id = null)
		{
			$this->db->select('dpa.*, dosen.nama_lkp as dosen_nama')
			         ->from($this->dpa)
					   ->join($this->dosen, 'dosen.dpa_id = dpa.dpa_id');

			if($dpa_id != null)
			{
				$this->db->where('dpa.dpa_id', $dpa_id);
			}

			$query = $this->db->get();
			return $query;
		}
	
		function add($post)
		{
			$params = array(
				'dpa_id'   => $post['dpa_id'],
				'prodi_id' => 1,
				'nidn'     => $post['nidn'],
				'created' => date('Y-m-d H:i:s'),
				'posted'  => $this->fu->userLogin()['nip']
			);

			$query = $this->db->insert($this->dpa, $params);
			$query = $this->db->update($this->dosen, array('dpa_id' => $post['dpa_id']), array('nidn' => $post['nidn']));
			return $query;
		}

		function edit($post, $dpa_id)
		{
			$params = array(
				'nidn'     => $post['nidn'],
				'updated' => date('Y-m-d H:i:s'),
				'posted'  => $this->fu->userLogin()['nip']
			);

			$this->db->where('dpa_id', $dpa_id);
			$query = $this->db->update($this->dpa, $params);
			return $query;
		}

		function delete($dpa_id)
		{
			$this->db->where('dpa_id', $dpa_id)
					 ->delete($this->dpa);
		}
		
		
	} /* /.class */
