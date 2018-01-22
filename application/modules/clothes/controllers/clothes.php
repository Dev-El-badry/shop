<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Clothes extends MY_Backend
{

	function __construct() {
	parent::__construct();
	}

	function item() {
		$item_url = $this->uri->segment(3);
		$this->load->module('item_stores');
		$id_item = $this->item_stores->_get_id_by_itemUrl($item_url);
		$this->item_stores->view($id_item);
		
	}
}