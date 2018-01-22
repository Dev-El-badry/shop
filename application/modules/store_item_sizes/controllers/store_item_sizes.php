<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Store_item_sizes extends MY_Backend
{

	function __construct() {
	parent::__construct();
	$this->lang->load('admin/store_items');
	}


	function _delete_conif($item_id) {
		$query = "DELETE FROM store_item_sizes WHERE item_id = '$item_id' ";
		return $this->_custom_query($query);
	}

	function delete($id) {
		$this->load->module('site_secuirty');
		$this->site_secuirty->_make_sure_is_admin();

		if(!isset($id)){
			redirect('site_secuirty/not_allowed');
		}

		//fetch item_id
		$query = $this->get_where($id);
		foreach ($query->result() as $value) {
			$item_id = $value->item_id;
		}

		$this->_delete($id);
		$value = '<div class="alert alert-danger" role="alert">'.$this->lang->line('alert_delete_options').'</div>';
		$this->session->set_flashdata('item', $value);
		redirect(base_url().'store_item_sizes/update/'.$item_id);
	}

	function update() {
		$update_id = $this->uri->segment(3);

		$this->load->module('site_secuirty');
		$this->site_secuirty->_make_sure_is_admin();

		$submit = $this->input->post('submit', true);
		$new_option = trim($this->input->post('new_option', true));

		if($submit == "Finished") {
			$update_id = $this->input->post('update_id', true);
			redirect(base_url().'item_stores/create/'.$update_id);
		}elseif($submit == "Submit"){


			if ($new_option != '') {
				$update_id = $this->input->post('update_id', true);
				$data['size'] = $new_option;
				$data['item_id'] = $update_id;
				$this->_insert($data);

				
				$value = '<div class="alert alert-success" role="alert">'.$this->lang->line('alert_add_size').'</div>';
				$this->session->set_flashdata('item', $value);
				redirect(base_url().'store_item_sizes/update/'.$update_id);
			}
		}

		$data['query'] = $this->get_where_custom('item_id', $update_id);
		$data['num_rows'] = $data['query']->num_rows();

        $data['update_id'] 	= $update_id;
		$data['head_line'] 	= $this->lang->line('new_size_option');
		$data['module'] 	= 'store_item_sizes';
		$data['view_file'] 	= 'update';

		$this->load->module('templetes');
		$this->templetes->admin($data); 
	}

	function get($order_by) {
	$this->load->model('Mdl_store_item_sizes');
	$query = $this->Mdl_store_item_sizes->get($order_by);
	return $query;
	}

	function get_with_limit($limit, $offset, $order_by) {
	$this->load->model('Mdl_store_item_sizes');
	$query = $this->Mdl_store_item_sizes->get_with_limit($limit, $offset, $order_by);
	return $query;
	}

	function get_where($id) {
	$this->load->model('Mdl_store_item_sizes');
	$query = $this->Mdl_store_item_sizes->get_where($id);
	return $query;
	}

	function get_where_custom($col, $value) {
	$this->load->model('Mdl_store_item_sizes');
	
	$query = $this->Mdl_store_item_sizes->get_where_custom($col, $value);
	return $query;
	}

	function _insert($data) {
	$this->load->model('Mdl_store_item_sizes');
	$this->Mdl_store_item_sizes->_insert($data);
	}

	function _update($id, $data) {
	$this->load->model('Mdl_store_item_sizes');
	$this->Mdl_store_item_sizes->_update($id, $data);
	}

	function _delete($id) {
	$this->load->model('Mdl_store_item_sizes');
	$this->Mdl_store_item_sizes->_delete($id);
	}

	function count_where($column, $value) {
	$this->load->model('Mdl_store_item_sizes');
	$count = $this->Mdl_store_item_sizes->count_where($column, $value);
	return $count;
	}

	function get_max() {
	$this->load->model('Mdl_store_item_sizes');
	$max_id = $this->Mdl_store_item_sizes->get_max();
	return $max_id;
	}

	function _custom_query($mysql_query) {
	$this->load->model('Mdl_store_item_sizes');
	$query = $this->Mdl_store_item_sizes->_custom_query($mysql_query);
	return $query;
	}

}