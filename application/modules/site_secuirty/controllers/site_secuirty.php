<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Site_secuirty extends MX_Controller
{
	function __construct() {
	parent::__construct();
	}

	function _make_sure_is_admin() {
		$is_admin = TRUE;

		if ($is_admin != TRUE) {
			redirect(base_ulr().'site_secuirty/not_allowed');
		}
	}

	function not_allowed() {
		echo "Not Allowed To Access This Page";
	}

	function pword_hashed($str) {
		$hased_string = password_hash($str, PASSWORD_BCRYPT, array('cost'=>12));
		return $hased_string;
	}


}

