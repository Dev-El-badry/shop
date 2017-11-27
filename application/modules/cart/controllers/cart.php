<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Cart extends MX_Controller
{

	function __construct() {
	parent::__construct();
	}

	function test() {

		$str = $this->session->session_id;
		$this->load->module('site_secuirty');
		$encrypt_str = $this->_get_checkout_token($str);
		$decrypt_str = $this->_get_session_id_from_token($encrypt_str);
		echo $encrypt_str;
		echo '<hr>';
		echo $decrypt_str;
	}

	function _checkout_and_session_id($token) {
		
		$session_id = $this->_get_session_id_from_token($token);
		
		$this->load->module('store_basket');
		$query = $this->store_basket->get_where_custom('session_id', $session_id);
		$num_rows = $query->num_rows();
		
		if($num_rows<1) {
			redirect(base_url().'cart');
		}

		return $session_id;
	}

	function _get_checkout_token($session_id) {
		$this->load->module('site_secuirty');
		$encrypt_string = $this->site_secuirty->_encrypt_string($session_id);

		$checkout_token = str_replace('+', '-plus-', $encrypt_string);
		$checkout_token = str_replace('/', '-fwrd-', $checkout_token);
		$checkout_token = str_replace('=', '-eqls-', $checkout_token);

		return $checkout_token;
	}

	function _get_session_id_from_token($token) {
		$this->load->module('site_secuirty');
		

		$session_id = str_replace('-plus-', '+', $token);
		$session_id = str_replace('-fwrd-', '/', $session_id);
		$session_id = str_replace('-eqls-', '=', $session_id);
		$session_id = $this->site_secuirty->_decrypt_string($session_id);
		return $session_id;
	}

	function submit_chiose() {
		$submit = $this->input->post('submit', TRUE);
		$checkout_token = $this->input->post('checkout_token', TRUE);

		if($submit == "Yes-Let's Do It") {
			redirect('startacconut/start');
		}elseif($submit == "No-Thanks") {
			redirect('cart/index/'.$checkout_token);
		}
	}

	function go_to_checkout() {
		
		$session_id = $this->session->session_id;
		$data['checkout_token'] = $this->_get_checkout_token($session_id);
		$data['module'] = "cart";
	    $data['view_file'] = "go_to_checkout";
		$this->load->module('templetes');
        $this->templetes->public_bootstrap($data);
	}

	function _draw_checkout_btn_fake() {

		$data['module'] = "cart";
	    $data['view_file'] = "draw_checkout_btn_fake";
		$this->load->module('templetes');
        $this->templetes->public_bootstrap($data);
	}

	function _draw_checkout_btn_real($query) {
		echo '<p style="text-align: center">Real Checkout Buttin Here</p>';
	}

	function _attampt_draw_checkout_btn($query1) {
		$this->load->module('site_secuirty');
		$shopper_id = $this->site_secuirty->_get_user_id();
		$third_bit = $this->uri->segment(3);
		if(!is_numeric($shopper_id) AND $third_bit == '') {
			$this->_draw_checkout_btn_fake();
		} else {
			$this->_draw_checkout_btn_real($query1);
		}


	}

	function remove() {
		$this->load->module('store_basket');

		$update_id = $this->uri->segment(3);
		$allowed = $this->_make_show_removed_allowed($update_id);
		if($allowed == FALSE) {
			redirect('cart');
		}
		$this->store_basket->_delete($update_id);
		$url_referer = $_SERVER['HTTP_REFERER'];
		redirect($url_referer);
	}

	function _make_show_removed_allowed($update_id) {
		$this->load->module('site_secuirty');
		$this->load->module('store_basket');
		$query = $this->store_basket->get_where($update_id);
		foreach ($query->result() as $row) {
			$shopper_id = $row->shopper_id;
			$session_id = $row->session_id;
		}

		$shopper_id_desc = $this->site_secuirty->_get_user_id();
		$session_id_desc = $this->session->session_id;
		if( ($shopper_id == $shopper_id_desc) OR ($session_id == $session_id_desc) ) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	function _draw_cart_content($user_type, $query) {
		
		if($user_type == "public") {
			$view_file = "cart_content_public";
		} else {
			$view_file = "cart_content_admin";
		}
		$data['query'] = $query;
		$this->load->view($view_file, $data);
	}

	function index() {
		$this->load->module('site_secuirty');
		$data['flash'] = $this->session->flashdata();

		$third_bit = $this->uri->segment(3);
		if($third_bit != '') {
			$session_id = $this->_checkout_and_session_id($third_bit);
		} else {
			$session_id = $this->session->session_id;
		}

		
		$shopper_id = $this->site_secuirty->_get_user_id();

		if($shopper_id <1) {
			$shopper_id = 0;
		}
		$table = 'store_basket';
		$data['query1'] = $this->_fetch_cart_contents($session_id, $shopper_id, $table);

		$data['num_rows'] = $data['query1']->num_rows();
		$data['statment_showing'] = $this->_statement_showing($data['num_rows']);

		$data['module'] = "cart";
	    $data['view_file'] = "index";

		$this->load->module('templetes');
        $this->templetes->public_bootstrap($data);
	}

	function _fetch_cart_contents($session_id, $shopper_id, $table) {
		$this->load->module('store_basket');
		$sql_query = "
		select $table.*, item_stores.small_img, item_stores.url_item
		from $table
		LEFT JOIN item_stores ON store_basket.item_id = item_stores.id
		";
		if($shopper_id >1) {
			$where_sql = " where shopper_id = $shopper_id ";
		} else {
			$where_sql = " where session_id = '$session_id' ";
		}

		$sql_query .=$where_sql;
		$query = $this->store_basket->_custom_query($sql_query);
		return $query;
	}

	function _statement_showing($num_rows) {
		if($num_rows == 1) {
			$statment_showing = "You Have $num_rows Item In Your Basket";
		} else {
			$statment_showing = "You Have $num_rows Items In Your Basket";
		}
		return $statment_showing;
	}

	function _draw_add_to_cart($id) {
		$submitted_color = $this->input->post('submitted_color');
		if($submitted_color == '') {
			$color_option[''] = "Select....";
		}
		//fetch Colors & Sizes
		$this->load->module('store_item_colors');
		$query = $this->store_item_colors->get_where_custom('item_id', $id);
		$data['num_row'] = $query->num_rows();
		foreach ($query->result() as $row) {
			$color_option[$row->id] = $row->color;
		}

		//fetch Sizes
		$submitted_size = $this->input->post('submitted_size');
		if($submitted_size == '') {
			$size_option[''] = "Select....";
		}

		$this->load->module('store_item_sizes');
		$query = $this->store_item_sizes->get_where_custom('item_id', $id);
		$data['num_row_size'] = $query->num_rows();
		foreach ($query->result() as $row) {
			$size_option[$row->id] = $row->size;
		}

		$data['color_option'] = $color_option;
		$data['size_option'] = $size_option;
		$data['submitted_color'] = $submitted_color;
		$data['submitted_size'] = $submitted_size;
		$data['id'] = $id;
		$this->load->view('add_to_cart', $data);
	}
	
}