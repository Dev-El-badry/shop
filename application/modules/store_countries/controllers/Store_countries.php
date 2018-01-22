<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class store_countries extends MY_Backend
{

	function __construct() {
	parent::__construct();
	}

	function _delete_conif($shipper_id) {
		$query = "DELETE FROM store_countries WHERE shipper_id = '$shipper_id' ";
		return $this->_custom_query($query);
	}

	function _get_option_countries($shipper_id) {
		$query = $this->get_where_custom('shipper_id', $shipper_id);

		foreach ($query->result() as $row) {
			$option[$row->country_title] = $row->country_title; 
		}

		if(!isset($option)) {
			$option[''] = '';
		}

		$all_countries = $this->_all_countries();

		$result = array_diff($all_countries, $option);
		return $result;
	}

	function _all_countries() {
		$options["Alexandria"]="Alexandria";
		$options["Aswan"]="Aswan";
		$options["Asyut"]="Asyut";
		$options["Beheira"]="Beheira";
		$options["Beni Suweif"]="Beni Suweif";
		$options["Cairo"]="Cairo";
		$options["Dakahlia"]="Dakahlia";
		$options["Damietta"]="Damietta";
		$options["Faiyum"]="Faiyum";
		$options["Gharbia"]="Gharbia";
		$options["Giza"]="Giza";
		$options["Ismailia"]="Ismailia";
		$options["Kafr el-Sheikh"]="Kafr el-Sheikh";
		$options["Luxor"]="Luxor";
		$options["Matruh"]="Matruh";
		$options["Minya"]="Minya";
		$options["Monufia"]="Monufia";

		return $options;
	}

	function _all_countries_delete($shipper_id) 
	{
		$query = $this->get_where_custom('shipper_id', $shipper_id);
		foreach ($query->result() as $row) {
			$this->_delete($row->id);
		}
	}

	function _delete_process($update_id) {
		$query = $this->get_where($update_id);
		foreach ($query->result() as $value) {
			$shipper_id = $value->shipper_id;
		}

		$this->_delete($update_id);
	}

	function delete($update_id) {
		$this->load->module('site_secuirty');
		$this->site_secuirty->_make_sure_is_admin();

		if(!isset($update_id)){
			redirect('site_secuirty/not_allowed');
		}

		//fetch shipper_id
		$this->_delete_process($update_id);

		
		$value = '<div class="alert alert-danger" role="alert">Successfully Delete Option</div>';
		$this->session->set_flashdata('item', $value);
		redirect(base_url().'store_countries/update/'.$shipper_id);
	}

	function update() {

		$update_id = $this->uri->segment(3);

		$this->load->module('site_secuirty');
		$this->site_secuirty->_make_sure_is_admin();
		$this->load->module('site_settings');
		$submit = $this->input->post('submit', true);
		

		if($submit == "Finished") {
			$update_id = $this->input->post('update_id', true);
			redirect(base_url().'store_shippers/create/'.$update_id);
		}elseif($submit == "Submit"){

			$country_title = trim($this->input->post('country_title', true));
			$country_price = trim($this->input->post('country_price', true));

			if ($country_title != '') {
				$update_id = $this->input->post('update_id', true);
				$data['country_title'] = $country_title;
				$data['country_price'] = $country_price;
				$data['shipper_id'] = $update_id;
				$this->_insert($data);

				
				$value = '<div class="alert alert-success" role="alert">Successfully Add New Country Option</div>';
				$this->session->set_flashdata('item', $value);
				redirect(base_url().'store_countries/update/'.$update_id);
			}
		}

		$data['query'] = $this->get_where_custom('shipper_id', $update_id);
		$data['num_rows'] = $data['query']->num_rows();
		$data['options'] = $this->_get_option_countries($update_id);
        $data['update_id'] 	= $update_id;
		$data['head_line'] 	= 'New Country Option';
		$data['module'] 	= 'store_countries';
		$data['view_file'] 	= 'update';

		$this->load->module('templetes');
		$this->templetes->admin($data); 
	}

	function get($order_by) {
	$this->load->model('mdl_store_countries');
	$query = $this->mdl_store_countries->get($order_by);
	return $query;
	}

	function get_with_limit($limit, $offset, $order_by) {
	$this->load->model('mdl_store_countries');
	$query = $this->mdl_store_countries->get_with_limit($limit, $offset, $order_by);
	return $query;
	}

	function get_where($id) {
	$this->load->model('mdl_store_countries');
	$query = $this->mdl_store_countries->get_where($id);
	return $query;
	}

	function get_where_custom($col, $value) {
	$this->load->model('mdl_store_countries');
	
	$query = $this->mdl_store_countries->get_where_custom($col, $value);
	return $query;
	}

	function _insert($data) {
	$this->load->model('mdl_store_countries');
	$this->mdl_store_countries->_insert($data);
	}

	function _update($id, $data) {
	$this->load->model('mdl_store_countries');
	$this->mdl_store_countries->_update($id, $data);
	}

	function _delete($id) {
	$this->load->model('mdl_store_countries');
	$this->mdl_store_countries->_delete($id);
	}

	function count_where($column, $value) {
	$this->load->model('mdl_store_countries');
	$count = $this->mdl_store_countries->count_where($column, $value);
	return $count;
	}

	function get_max() {
	$this->load->model('mdl_store_countries');
	$max_id = $this->mdl_store_countries->get_max();
	return $max_id;
	}

	function _custom_query($mysql_query) {
	$this->load->model('mdl_store_countries');
	$query = $this->mdl_store_countries->_custom_query($mysql_query);
	return $query;
	}

}