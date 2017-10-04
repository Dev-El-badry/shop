<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Site_settings extends MX_Controller
{

	function __construct() {
	parent::__construct();
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