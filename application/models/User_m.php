<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class User_m extends CI_Model
	{

		protected $mahasiswa = "mahasiswa";
		protected $prodi     = "prodi";
		protected $dosen     = "dosen";
		protected $agama     = "agama";
		
		function login($username, $password)
		{
			$query = $this->db->get_where($this->mahasiswa, array(
													'username'=>$username, 
													'password'=>sha1($password))
			);
			return $query->row_array();
		}

		function get($id = null)
		{
			$this->db->select('mahasiswa.*, dosen.nama_lkp as dpa_nama, agama.nama as agama_nama, prodi.nama as prodi_nama');
			$this->db->from($this->mahasiswa)
					 ->join($this->prodi, 'prodi.prodi_id = mahasiswa.prodi_id')
					 ->join($this->dosen, 'dosen.dpa_id = mahasiswa.dpa_id')
					 ->join($this->agama, 'agama.agama_id = mahasiswa.agama_id');
			
			if($id != null)
			{
				$this->db->where('npm', $id);
			}
			$query = $this->db->get();
			return $query;
		}

		function edit($post, $npm)
		{
			if(empty($post['foto']) && empty($post['password']))
			{
				$params = array(
					'alamat_lkp' => $post['alamat_lkp'], 
					'no_telp'    => $post['no_telp'], 
					'email'      => $post['email'], 
				);
			}
			elseif(empty($post['password']))
			{
				$params = array(
					'alamat_lkp' => $post['alamat_lkp'], 
					'no_telp'    => $post['no_telp'], 
					'email'      => $post['email'],
					'foto'       => $post['foto']
				);
			}
			elseif(empty($post['foto']))
			{
				$params = array(
					'password'   => sha1($post['password']), 
					'alamat_lkp' => $post['alamat_lkp'], 
					'no_telp'    => $post['no_telp'], 
					'email'      => $post['email'],
				);
			}
			else
			{
				$params = array(
					'password'   => sha1($post['password']), 
					'alamat_lkp' => $post['alamat_lkp'], 
					'no_telp'    => $post['no_telp'], 
					'email'      => $post['email'],
					'foto'       => $post['foto']
				);
			}

			$this->db->where('npm', $npm);
			$query =$this->db->update($this->mahasiswa, $params);
		}

		function forget($email, $password)
		{
			$params = array(
				'password'=> sha1($password) 
			);
			$this->db->where('email', $email);
			$query =$this->db->update($this->mahasiswa, $params);
		}

	} /* /.class */
