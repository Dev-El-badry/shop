<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Dashboard extends MX_Controller
{

	function __construct() {
	parent::__construct();
	$this->lang->load('admin/dashboard');
	}

	function home() {
		$this->load->module('site_secuirty');
		$this->site_secuirty->_make_sure_is_admin();
		

		$data['module'] = 'dashboard';
		$data['view_file'] = 'home';
		$this->load->module('templetes');
		$this->templetes->admin($data);
	}

}