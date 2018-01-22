<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Shipping extends MY_Backend
{

	function __construct() {
	parent::__construct();
	}

	function _get_shipping() {
		$shipping = '0.01';
		return $shipping;
	}

}