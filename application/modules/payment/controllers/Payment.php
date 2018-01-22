<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Payment extends MY_Backend
{

	function __construct() {
	parent::__construct();
	}

	function _draw_payment_btn($query) {
		

		$data['query'] = $query;

		$this->load->view('draw_payment_btn', $data);
	}

}