<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Store_basket extends MX_Controller
{

	function __construct() {
	parent::__construct();
	}

	function add_to_basket() {
		$this->load->module('site_secuirty');
		$this->load->module('item_stores');

		
		$submit = $this->input->post('submit', TRUE);
		if($submit == 'Submit') {

			$this->load->library('form_validation');
			$this->form_validation->set_rules('submitted_color', 'Color', 'numeric');
			$this->form_validation->set_rules('submitted_size', 'Size' , 'numeric');
			$this->form_validation->set_rules('item_id', 'Item Id', 'numeric');
			$this->form_validation->set_rules('item_qty', 'Item Qty', 'required|numeric');

			if($this->form_validation->run() == TRUE) {

				$item_id = $this->input->post('item_id');
				$data = $this->fetch_data($item_id);
				$this->_insert($data);
				
				redirect(base_url().'cart');

			} else {

				$url_referer = $_SERVER['HTTP_REFERER'];
				
				$value = '<div class="alert alert-danger" style="color:#f00" role="alert">Cart Field Is Required</div>';
                $this->session->set_flashdata('item', $value);
                redirect($url_referer);
				
			}

		}

	}

	function fetch_data($item_id) {
		$this->load->module('site_secuirty');
		$this->load->module('item_stores');

		$data_items = $this->item_stores->get_data_from_db($item_id);

		$item_size = $this->input->post('submitted_size', TRUE);
		$item_color = $this->input->post('submitted_color', TRUE);
		$item_price = $data_items['price_item'];
		$item_qty = $this->input->post('item_qty');


		$data['item_color'] = $this->get_value('color', $item_color);
		$data['item_title'] = $data_items['title_item'];
		$data['item_size'] = $this->get_value('size', $item_size);
		$data['item_id'] = $this->input->post('item_id'); 
		$data['item_qty'] = $this->input->post('item_qty');
		$data['session_id '] = $this->session->session_id;
		$data['price'] = $item_price;
		$data['tax'] = '0';
		$data['shopper_id'] = $this->site_secuirty->_get_user_id();
		$data['ip_address'] = $this->input->ip_address();
		$data['date_added'] = time();

		if(!is_numeric($data['shopper_id'])) {
			$shopper_id = 0;
		}

		return $data;
	}

	function get_value($value_type, $update_id) {
		//NOTE: VAlue Can Be Color Or Size
		if($value_type == 'size') {
			$this->load->module('store_item_sizes');
			$query = $this->store_item_sizes->get_where($update_id);
			foreach ($query->result() as $row) {
				$size = $row->size;
			}
			$value = $size;
		} elseif($value_type == 'color') {
			$this->load->module('store_item_colors');
			$query = $this->store_item_colors->get_where($update_id);
			foreach ($query->result() as $row) {
				$color = $row->color;
			}
			$value = $color;	
		}

		if(!isset($value)) {
			$value = '';
		}

		return $value;
	}

	function test() {
		$session_id = $this->session->session_id;
		echo $session_id;
		echo '<hr>';
		$this->load->module('site_secuirty');
		$user_id = $this->site_secuirty->_get_user_id();
		echo $user_id;
	}

	function get($order_by) {
	$this->load->model('mdl_store_basket');
	$query = $this->mdl_store_basket->get($order_by);
	return $query;
	}

	function get_with_limit($limit, $offset, $order_by) {
	$this->load->model('mdl_store_basket');
	$query = $this->mdl_store_basket->get_with_limit($limit, $offset, $order_by);
	return $query;
	}

	function get_where($id) {
	$this->load->model('mdl_store_basket');
	$query = $this->mdl_store_basket->get_where($id);
	return $query;
	}

	function get_where_custom($col, $value) {
	$this->load->model('mdl_store_basket');
	$query = $this->mdl_store_basket->get_where_custom($col, $value);
	return $query;
	}

	function _insert($data) {
	$this->load->model('mdl_store_basket');
	$this->mdl_store_basket->_insert($data);
	}

	function _update($id, $data) {
	$this->load->model('mdl_store_basket');
	$this->mdl_store_basket->_update($id, $data);
	}

	function _delete($id) {
	$this->load->model('mdl_store_basket');
	$this->mdl_store_basket->_delete($id);
	}

	function count_where($column, $value) {
	$this->load->model('mdl_store_basket');
	$count = $this->mdl_store_basket->count_where($column, $value);
	return $count;
	}

	function get_max() {
	$this->load->model('mdl_store_basket');
	$max_id = $this->mdl_store_basket->get_max();
	return $max_id;
	}

	function _custom_query($mysql_query) {
	$this->load->model('mdl_store_basket');
	$query = $this->mdl_store_basket->_custom_query($mysql_query);
	return $query;
	}

	 function get_double_where_custom($col1, $value1,$col2, $value2) {
        $this->load->model('mdl_store_basket');
        $query = $this->mdl_store_basket->get_double_where_custom($col1, $value1,$col2, $value2);
        return $query;
    }

}