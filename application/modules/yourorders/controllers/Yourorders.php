<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Yourorders extends MY_Backend
{

	function __construct() {
	parent::__construct();
	}

	function _get_status_title() {
		$this->load->module('store_order_status');
		$options = $this->store_order_status->_get_options();
		return $options;
	}

	function _generate_mysql_query($shopper_id) {
		$this->load->module('store_orders');
		$sql_query = "select * from store_orders where shopper_id = $shopper_id order by date_created desc";
		
		$query=$this->store_orders->_custom_query($sql_query);
		return $query;
	}

	function browes() {
		$this->load->module('site_secuirty');
		$this->site_secuirty->_make_sure_logged_in();
		$this->load->module('timedate');
		
		$shopper_id = $this->site_secuirty->_get_user_id();
		
		$data['query_bro'] = $this->_generate_mysql_query($shopper_id);
		$data['status_title'] = $this->_get_status_title();
		$data['num_rows'] = $data['query_bro']->num_rows();
		$data['flash'] = $this->session->flashdata('item');
		$data['module'] = 'Yourorders';
		$data['view_file'] = 'browes';

		$this->load->module('templetes');
		$this->templetes->public_bootstrap($data);
	}

	function view() {
		$this->load->module('site_secuirty');
		$this->site_secuirty->_make_sure_logged_in();
		$this->load->module('timedate');
		$this->load->module('store_orders');
		$this->load->module('store_order_status');
		$this->load->module('cart');

		$data['third_bit'] = $this->uri->segment(3);
		$data['shopper_id'] = $this->site_secuirty->_get_user_id();

		$col1 = 'order_ref';
		$value1 = $data['third_bit'];
		$col2 = 'shopper_id';
		$value2 = $data['shopper_id'];

		$data['query_cc'] = $this->store_orders->get_double_where_custom($col1, $value1, $col2, $value2);
		foreach ($data['query_cc']->result() as $row) {
			$date_created = $row->date_created;
			$order_status = $row->order_status;
		}

		$data['date_created'] = $this->timedate->get_nice_date($date_created,'full');
		$data['order_status'] = $this->store_order_status->_get_status_title($order_status);

		$table = 'store_shoppertrack';
		$session_id ='';
		$data['query_ss'] = $this->cart->_fetch_cart_contents($session_id, $data['shopper_id'], $table);

		$data['flash'] = $this->session->flashdata('item');
		$data['module'] = 'Yourorders';
		$data['view_file'] = 'view';

		$this->load->module('templetes');
		$this->templetes->public_bootstrap($data);
	}

}