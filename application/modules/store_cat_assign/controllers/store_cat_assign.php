<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Store_cat_assign extends MX_Controller
{

	function __construct() {
		parent::__construct();
	}

	function delete($update_id) {
		$this->load->module('site_secuirty');
		$this->site_secuirty->_make_sure_is_admin();

		if(!isset($update_id)){
			redirect('site_secuirty/not_allowed');
		}

		//fetch item_id
		$query = $this->get_where($update_id);
		foreach ($query->result() as $value) {
			$id_item = $value->id_item;
		}

		$this->_delete($update_id);
		$value = '<div class="alert alert-danger" role="alert">Successfully Delete Assign Of The Category</div>';
		$this->session->set_flashdata('item', $value);
		redirect(base_url().'store_cat_assign/update/'.$id_item);
	}

	function submit() {
		$this->load->module('site_secuirty');
		$this->site_secuirty->_make_sure_is_admin();

		$submit = $this->input->post('submit');
		$item_id = $this->input->post('item_id');

		if($submit == "Finished") {
			$item_id = $this->input->post('item_id', true);
			redirect(base_url().'item_stores/create/'.$item_id);
		}elseif($submit == "Submit"){
			
				$cat_id = $this->input->post('cat_id', true);
				$data['id_item'] = $item_id;
				$data['id_cat'] = $cat_id;
				$this->_insert($data);

				
				$value = '<div class="alert alert-success" role="alert">Successfully Assign Of The Category</div>';
				$this->session->set_flashdata('item', $value);
				redirect(base_url().'store_cat_assign/update/'.$item_id);
			
		}
	}

	function update($item_id) {

		$this->load->module('site_secuirty');
		$this->site_secuirty->_make_sure_is_admin();

		$this->load->module('store_category');
		$sub_category = $this->store_category->_get_cat_title_for_dropdown();

		$query = $this->get_where_custom('id_item', $item_id);
		$data['num_rows'] = $query->num_rows();
		foreach ($query->result() as $row) {
			$parent_cat_name = $this->store_category->_get_parent_name($row->id_cat);
            $cat_name = $this->store_category->_get_cat_parent_name($row->id_cat);

			$long_name = $parent_cat_name . " > " . $cat_name;
	
			$assigned_categories[$row->id_cat] = $long_name;
		}

		if(! isset($assigned_categories)) {
			$assigned_categories = '';
		} else {
			//Note: Item Have Just One Assigned Category
			$sub_category = array_diff($sub_category, $assigned_categories);
		}

		

		$data['query'] 		= $query;
		$data['cat_id'] 	= $this->input->post('cat_id');
		$data['options'] 	= $sub_category;
		$data['item_id'] 	= $item_id;
		$data['head_line'] 	= 'Update Item Category';
		$data['module'] 	= 'Store_cat_assign';
		$data['view_file'] 	= 'update';

		$this->load->module('templetes');
		$this->templetes->admin($data); 

	}

	function get($order_by) {
	$this->load->model('mdl_store_cat_assign');
	$query = $this->mdl_store_cat_assign->get($order_by);
	return $query;
	}

	function get_with_limit($limit, $offset, $order_by) {
	$this->load->model('mdl_store_cat_assign');
	$query = $this->mdl_store_cat_assign->get_with_limit($limit, $offset, $order_by);
	return $query;
	}

	function get_where($id) {
	$this->load->model('mdl_store_cat_assign');
	$query = $this->mdl_store_cat_assign->get_where($id);
	return $query;
	}

	function get_where_custom($col, $value) {
	$this->load->model('mdl_store_cat_assign');
	$query = $this->mdl_store_cat_assign->get_where_custom($col, $value);
	return $query;
	}

	function _insert($data) {
	$this->load->model('mdl_store_cat_assign');
	$this->mdl_store_cat_assign->_insert($data);
	}

	function _update($id, $data) {
	$this->load->model('mdl_store_cat_assign');
	$this->mdl_store_cat_assign->_update($id, $data);
	}

	function _delete($id) {
	$this->load->model('mdl_store_cat_assign');
	$this->mdl_store_cat_assign->_delete($id);
	}

	function count_where($column, $value) {
	$this->load->model('mdl_store_cat_assign');
	$count = $this->mdl_store_cat_assign->count_where($column, $value);
	return $count;
	}

	function get_max() {
	$this->load->model('mdl_store_cat_assign');
	$max_id = $this->mdl_store_cat_assign->get_max();
	return $max_id;
	}

	function _custom_query($mysql_query) {
	$this->load->model('mdl_store_cat_assign');
	$query = $this->mdl_store_cat_assign->_custom_query($mysql_query);
	return $query;
	}

}