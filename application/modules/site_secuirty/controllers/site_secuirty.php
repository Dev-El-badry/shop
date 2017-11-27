<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Site_secuirty extends MX_Controller
{
	function __construct() {
	parent::__construct();
	}

	function _check_admin_login_admin_details($username, $password) {
		$target_username = "admin";
		$target_password = "password";

		if($target_username == $username && $target_password == $password) {
			return TRUE;
		} else {
			return false;
		}

	}

	function _encrypt_string($str) {
		$this->load->library('encryption');
		$encrypted_string = $this->encryption->encrypt($str);
		return $encrypted_string;
	}

	function _decrypt_string($str) {
		$this->load->library('encryption');
		$decrypted_string = $this->encryption->decrypt($str);
		return $decrypted_string;
	}

	function _make_sure_logged_in() {
	    $user_id = $this->_get_user_id();
	    if(!is_numeric($user_id)) {
	        redirect('startacconut/draw_login_form');
        }
    }

	function _get_user_id() {
		
	   $user_id = $this->session->userdata('user_id');
	   if(!is_numeric($user_id)) {
	       //get user_id from cookies
           $this->load->module('site_cookie');
           $user_id = $this->site_cookie->attempt_get_user_id();
       }

       return $user_id;
    }

	function _make_sure_is_admin() {
		$is_admin = $this->session->userdata('is_admin');
		if($is_admin == 1) {
			return TRUE;
		} else {
			redirect(base_url().'site_secuirty/not_allowed');
		}
	}

	function not_allowed() {
		echo "Not Allowed To Access This Page";
	}

	function pword_hashed($str) {
		$hased_string = password_hash($str, PASSWORD_BCRYPT, array('cost'=>12));
		return $hased_string;
	}

	function verfiy_password_hashed($password, $hash) {
        if (password_verify($password, $hash)) {
            return true;
        } else {
            return false;
        }
    }

    function RandomString($length)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randstring = '';
        for ($i = 0; $i < $length; $i++) {
            $randstring .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randstring;
    }

}

