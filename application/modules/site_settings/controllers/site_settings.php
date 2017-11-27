<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Site_settings extends MX_Controller
{

	function __construct() {
	parent::__construct();
	}

	function _get_support_team_name() {
		$name = "Customer Support";
		return $name;
	}

	function _get_welcome_msg($customer_id) {
		$this->load->module('store_accounts');
		$customer_name = $this->store_accounts->_get_customer_name($customer_id);
		$msg = "Hello" . $customer_name ."<br><br>";
		$msg .= "Thank you for creating an account with Clothes Shop. If You Have Any Question";
		$msg .= "Abount Any Product And Services Then Please Do Get in touch. we are here ";
		$msg .= "seven days a week and would be happy to help you. <br><br>";
		$msg .= "Regards<br><br>";
		$msg .= "Eslam (Founder)";

		return $msg;
	}

	function _get_cookie() {
	    $cookie_name = 'asdfghjk';
	    return $cookie_name;
    }

	function _get_item_segments() {
		// return segment for the store_item pages
		$segments = 'clothes/item/';
		return $segments;
	}

	function _get_items_segments() {
		// return segment for the category pages
		$segments = 'products/items/';
		return $segments;
	}

	function _get_error_found_page() {
	    $msg = "<h1>it's a webpage jim but not as we know it</h1>";
	    $msg .= "please check your vibe and try again";

	    return $msg;
    }

}