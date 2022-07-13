<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class User_m extends CI_Model
	{
		protected $admin = "admin";
		protected $agama = "agama";

		function login($username, $password)
		{
			$query = $this->db->get_where($this->admin, array(
													'username' => $username, 
													'password' => sha1($password))
			);
			return $query->row_array();
		}

		public function get($id = null)
		{
			$this->db->select('admin.*, agama.nama as agama_nama');
			$this->db->from($this->admin)
					 ->join($this->agama, 'agama.agama_id = admin.agama_id');
			
			if($id != null)
			{
				$this->db->where('nip', $id);
			}
			$query = $this->db->get();
			return $query;
		}

		function edit($post, $nip)
		{
			if(empty($post['foto']) && empty($post['password']))
			{
				$params = array(
					'agama_id'   => $post['agama'],
					'nama_lkp'   => $post['nama_lkp'],
					'alamat_lkp' => $post['alamat_lkp'], 
					'no_telp'    => $post['no_telp'], 
					'email'      => $post['email'], 
				);
			}
			elseif(empty($post['password']))
			{
				$params = array(
					'agama_id'   => $post['agama'],
					'nama_lkp'   => $post['nama_lkp'],
					'alamat_lkp' => $post['alamat_lkp'], 
					'no_telp'    => $post['no_telp'], 
					'email'      => $post['email'],
					'foto'       => $post['foto']
				);
			}
			elseif(empty($post['foto']))
			{
				$params = array(
					'agama_id'   => $post['agama'],
					'nama_lkp'   => $post['nama_lkp'],
					'password'   => sha1($post['password']), 
					'alamat_lkp' => $post['alamat_lkp'], 
					'no_telp'    => $post['no_telp'], 
					'email'      => $post['email'],
				);
			}
			else
			{
				$params = array(
					'agama_id'   => $post['agama'],
					'nama_lkp'   => $post['nama_lkp'],
					'password'   => sha1($post['password']), 
					'alamat_lkp' => $post['alamat_lkp'], 
					'no_telp'    => $post['no_telp'], 
					'email'      => $post['email'],
					'foto'       => $post['foto']
				);
			}

			$this->db->where('nip', $nip);
			$query =$this->db->update($this->admin, $params);
		}

		function forget($email, $password)
		{
			$params = array(
				'password'=> sha1($password) 
			);
			$this->db->where('email', $email);
			$query =$this->db->update($this->admin, $params);
		}

	} /* /.class */
