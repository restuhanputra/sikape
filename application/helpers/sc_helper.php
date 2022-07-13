<?php
/* Login*/
function checkAlreadyLogin()
{
	$ci = get_instance();
	if($ci->session->userdata('npm'))
	{
			redirect('dashboard');
			exit();
	}
}

function checkNotLogin()
{
	$ci = get_instance();
	if(!$ci->session->userdata('npm'))
	{
			redirect('auth');
			exit();
	}
}

/* SQL injection */
function blockSQLInjection($string)
{
	// trim untuk hapus spasi
	// xss:  strip_tags utk stripping html & php tags / htmlspecialchars
	// return strip_tags(trim($string));
	return stripslashes(strip_tags(trim(htmlspecialchars($string, ENT_QUOTES))));
}
