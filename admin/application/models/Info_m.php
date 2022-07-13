<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class Info_m extends CI_Model
	{
		protected $info = "info";

		function get($info_id = null)
		{
			$this->db->from($this->info);

			if($info_id != null)
			{
				$this->db->where('info_id', $info_id);
			}

			$query = $this->db->get();
			return $query;
		}
	
		function add($post)
		{
			$params = array(
				'judul'   => $post['judul'],
				'content' => $post['content'],
				'created' => date('Y-m-d H:i:s'),
				'posted'  => $this->fu->userLogin()['nip']
			);

			$query = $this->db->insert($this->info, $params);
			return $query;
		}

		function edit($post, $id_info)
		{
			$params = array(
				'judul'   => $post['judul'],
				'content' => $post['content'],
				'updated' => date('Y-m-d H:i:s'),
				'posted'  => $this->fu->userLogin()['nip']
			);

			$this->db->where('info_id', $id_info);
			// $this->db->where('info_id', $post['info_id']);
			$query = $this->db->update($this->info, $params);
			return $query;
		}

		function delete($info_id)
		{
			$this->db->where('info_id', $info_id)
					 ->delete($this->info);
		}
		
	} /* /.class */
