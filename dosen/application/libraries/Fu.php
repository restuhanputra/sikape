<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	Class Fu
	{
		function userLogin()
		{
			$CI =& get_instance();
			$CI->load->model('User_m', 'user');
			$user_nidn = $CI->session->userdata('nidn');
			$user_data = $CI->user->get($user_nidn)->row_array();
			
			return $user_data;
		}

		function notif()
		{
			$CI =& get_instance();
			$CI->load->model('Magang_m', 'mg');
			$CI->load->model('User_m', 'user');
			$user_nidn = $CI->session->userdata('nidn');
			$data      = $CI->user->get($user_nidn)->row_array();
			$dpa_id    = $data['dpa_id'];
			$user_data = $CI->mg->get($dpa_id)->num_rows();
			
			return $user_data;
		}
	} /* /.class */
