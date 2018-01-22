<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Cash extends MY_Backend
{

	function __construct() {
	parent::__construct();
	}

	function submit_action() {
		$this->load->module('site_secuirty');
		$total = '';
		$total_cash = 0;

		$count_num = $this->input->post('num_of_count', TRUE);
		$shipping = $this->input->post('shipping', TRUE);
		$custom = $this->input->post('custom', TRUE);
		
		for ($i=1; $i <= $count_num; $i++) { 
			$total = $this->input->post('item_price_'.$i, TRUE) * $this->input->post('item_qty_'.$i, TRUE);
			$total_cash = $total_cash + $total;
		}

		$total_cash = $total_cash + $shipping;
		$data['total_cash'] = number_format($total_cash, 2);

		foreach ($_POST as $key => $value) {
			$posted_information[$key] = $value;
			if($key == 'custom') {
				$session_id_custom = $this->site_secuirty->_decrypt_string($value);
			}
		}

		$data['posted_information'] = serialize($posted_information);
		$data['date_created'] = time();
		$data['custom'] = $custom;
		$this->_insert($data);

		$max_id = $this->get_max();

		$this->load->module('store_orders');
		$this->store_orders->_generate_auto_orders($payment_type='cash', $max_id, $session_id_custom);

		$this->thankyou();
	}

	function thankyou() {
		
		$data['module'] = "cash";
	    $data['view_file'] = "thankyou";

		$this->load->module('templetes');
        $this->templetes->public_bootstrap($data);
	}

	function _draw_check_btn_cash($query) {
		$this->load->module('shipping');
		$this->load->module('site_secuirty');

		foreach ($query->result() as $row) {
			$session_id_custom = $row->session_id;
		}

		$data['custom'] = $this->site_secuirty->_encrypt_string($session_id_custom);
		$data['shipping'] = $this->shipping->_get_shipping();
		$data['form_location'] = base_url().'cash/submit_action';
		$data['query'] = $query;
		$this->load->view('draw_check_btn_cash', $data);
	}

	function get($order_by) {
	$this->load->model('mdl_cash');
	$query = $this->mdl_cash->get($order_by);
	return $query;
	}

	function get_with_limit($limit, $offset, $order_by) {
	$this->load->model('mdl_cash');
	$query = $this->mdl_cash->get_with_limit($limit, $offset, $order_by);
	return $query;
	}

	function get_where($id) {
	$this->load->model('mdl_cash');
	$query = $this->mdl_cash->get_where($id);
	return $query;
	}

	function get_where_custom($col, $value) {
	$this->load->model('mdl_cash');
	$query = $this->mdl_cash->get_where_custom($col, $value);
	return $query;
	}

	function _insert($data) {
	$this->load->model('mdl_cash');
	$this->mdl_cash->_insert($data);
	}

	function _update($id, $data) {
	$this->load->model('mdl_cash');
	$this->mdl_cash->_update($id, $data);
	}

	function _delete($id) {
	$this->load->model('mdl_cash');
	$this->mdl_cash->_delete($id);
	}

	function count_where($column, $value) {
	$this->load->model('mdl_cash');
	$count = $this->mdl_cash->count_where($column, $value);
	return $count;
	}

	function get_max() {
	$this->load->model('mdl_cash');
	$max_id = $this->mdl_cash->get_max();
	return $max_id;
	}

	function _custom_query($mysql_query) {
	$this->load->model('mdl_cash');
	$query = $this->mdl_cash->_custom_query($mysql_query);
	return $query;
	}

}