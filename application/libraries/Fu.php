<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	Class Fu
	{
		// mhs
		function userLogin()
		{
			$CI =& get_instance();
			$CI->load->model('User_m', 'user');
			$user_npm  = $CI->session->userdata('npm');
			$user_data = $CI->user->get($user_npm)->row_array();
			
			return $user_data;
		}

		function notif()
		{
			$CI =& get_instance();
			$CI->load->model('Magang_m', 'magang');
			$user_npm  = $CI->session->userdata('npm');
			$user_data = $CI->magang->get_pengajuan($user_npm)->row_array();

			return $user_data;
		}
	} /* /.class */
