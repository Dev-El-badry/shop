<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Paypal extends MY_Backend
{

	function __construct() {
	parent::__construct();
	}

	function ipn_listener() {
		$data['date_created'] = time();
		$posted_information = '';

		foreach ($_POST as $key => $value) {
			$posted_information[$key] = $value;
		}

		$data['posted_information'] = serialize($posted_information);
		$this->_insert($data);
	}

	function is_on_test_mode() {
		$mode = TRUE; //IF is return FALSE is on live
		return $mode;
	}

	function _draw_checkout_btn_real($query) {
		$this->load->module('site_settings');
		$this->load->module('site_secuirty');
		$this->load->module('shipping');

		foreach ($query->result() as $row) {
			$session_id = $row->session_id;
		}

		$mode = $this->is_on_test_mode();
		if($mode == TRUE) {
			$data['form_location'] = 'https://www.sandbox.paypal.com/cgi-bin/webscr';
		} elseif($mode == FALSE) {
			$data['form_location'] = 'https://www.paypal.com/cgi-bin/webscr';
		}

		$data['shipping'] = $this->shipping->_get_shipping();
		$data['return'] = base_url().'paypal/thankyou';
		$data['cancel_return'] = base_url().'paypal/cancel';
		$data['currency_code'] = $this->site_settings->_get_currency_code();
		$data['paypal_email'] = $this->site_settings->_get_paypal_email();
		$data['custom'] = $this->site_secuirty->_encrypt_string($session_id);
		$data['query'] = $query;
		
		$this->load->view('draw_checkout_btn_real', $data);
	}

	function thankyou() {
		$data['view_file'] = 'thankyou';
		$this->load->module('templetes');
		$this->templetes->public_bootstrap($data);
	}

	function cancel() {
		$data['view_file'] = 'cancel';
		$this->load->module('templetes');
		$this->templetes->public_bootstrap($data);
	}

	function get($order_by) {
	$this->load->model('mdl_paypal');
	$query = $this->mdl_paypal->get($order_by);
	return $query;
	}

	function get_with_limit($limit, $offset, $order_by) {
	$this->load->model('mdl_paypal');
	$query = $this->mdl_paypal->get_with_limit($limit, $offset, $order_by);
	return $query;
	}

	function get_where($id) {
	$this->load->model('mdl_paypal');
	$query = $this->mdl_paypal->get_where($id);
	return $query;
	}

	function get_where_custom($col, $value) {
	$this->load->model('mdl_paypal');
	$query = $this->mdl_paypal->get_where_custom($col, $value);
	return $query;
	}

	function _insert($data) {
	$this->load->model('mdl_paypal');
	$this->mdl_paypal->_insert($data);
	}

	function _update($id, $data) {
	$this->load->model('mdl_paypal');
	$this->mdl_paypal->_update($id, $data);
	}

	function _delete($id) {
	$this->load->model('mdl_paypal');
	$this->mdl_paypal->_delete($id);
	}

	function count_where($column, $value) {
	$this->load->model('mdl_paypal');
	$count = $this->mdl_paypal->count_where($column, $value);
	return $count;
	}

	function get_max() {
	$this->load->model('mdl_paypal');
	$max_id = $this->mdl_paypal->get_max();
	return $max_id;
	}

	function _custom_query($mysql_query) {
	$this->load->model('mdl_paypal');
	$query = $this->mdl_paypal->_custom_query($mysql_query);
	return $query;
	}

}