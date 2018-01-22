<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Products extends MY_Backend
{

	function __construct() {
	parent::__construct();
	}

	function items() {
		$cat_url = $this->uri->segment(3);
		$this->load->module('store_category');
		$id_Cat = $this->store_category->_get_id_by_catUrl($cat_url);
		$this->store_category->view($id_Cat);


	}

}