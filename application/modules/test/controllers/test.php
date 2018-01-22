<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Perfectcontroller extends MY_Backend
{

	function __construct() {
	parent::__construct();
	}

	function autosubmit() {
		$data['name'] = 'Eslam';
		$data['city'] = 'Cairo';
		$data['age'] = 'over 21';

		foreach ($data as $key => $value) {
			$post_item = $key.'='.$value;
		}

		$post_item = implode('&', $post_item);
		$target_url = 'http://localhost/shop/test/submit';

		$curl_connection = curl_init($target_url);

		//prepare the data to be posted
		curl_setopt($curl_connection, CURLOPT_POSTFIELDS, $post_item);

		//run the curl request
		$result = curl_exec($curl_connection);

		//close the connection
		curl_close($curl_connection);
	}

	/*function get($order_by) {
	$this->load->model('mdl_perfectcontroller');
	$query = $this->mdl_perfectcontroller->get($order_by);
	return $query;
	}

	function get_with_limit($limit, $offset, $order_by) {
	$this->load->model('mdl_perfectcontroller');
	$query = $this->mdl_perfectcontroller->get_with_limit($limit, $offset, $order_by);
	return $query;
	}

	function get_where($id) {
	$this->load->model('mdl_perfectcontroller');
	$query = $this->mdl_perfectcontroller->get_where($id);
	return $query;
	}

	function get_where_custom($col, $value) {
	$this->load->model('mdl_perfectcontroller');
	$query = $this->mdl_perfectcontroller->get_where_custom($col, $value);
	return $query;
	}

	function _insert($data) {
	$this->load->model('mdl_perfectcontroller');
	$this->mdl_perfectcontroller->_insert($data);
	}

	function _update($id, $data) {
	$this->load->model('mdl_perfectcontroller');
	$this->mdl_perfectcontroller->_update($id, $data);
	}

	function _delete($id) {
	$this->load->model('mdl_perfectcontroller');
	$this->mdl_perfectcontroller->_delete($id);
	}

	function count_where($column, $value) {
	$this->load->model('mdl_perfectcontroller');
	$count = $this->mdl_perfectcontroller->count_where($column, $value);
	return $count;
	}

	function get_max() {
	$this->load->model('mdl_perfectcontroller');
	$max_id = $this->mdl_perfectcontroller->get_max();
	return $max_id;
	}

	function _custom_query($mysql_query) {
	$this->load->model('mdl_perfectcontroller');
	$query = $this->mdl_perfectcontroller->_custom_query($mysql_query);
	return $query;
	}*/

}