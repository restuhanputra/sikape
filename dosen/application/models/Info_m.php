<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class Info_m extends CI_Model
	{

		protected $info = "info";

		function get()
		{
			$this->db->from($this->info);
			
			$query = $this->db->get();
			return $query;
		}

	} /* /.class */
