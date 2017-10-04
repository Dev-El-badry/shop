<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Homepage_offers extends MX_Controller
{

	function __construct() {
	parent::__construct();

        $this->load->module('site_settings');
	}

	function _draw_offer($id) {

	    if(is_numeric($id)) {
	        $sql_query = "select item_stores.* from item_stores, homepage_blocks, homepage_offers where homepage_offers.block_id = $id and homepage_offers.item_id = item_stores.id  GROUP BY (item_stores.id)";
	        $query = $this->_custom_query($sql_query);

	        $data['query'] = $query;
	        $data['num_rows'] = $query->num_rows();
	        $this->load->view('draw_offer', $data);
        }

    }

    function num_offers($id_block) {
        $sql_query = "select item_stores.* from item_stores, homepage_blocks, homepage_offers where homepage_offers.block_id = $id_block and homepage_offers.item_id = item_stores.id  GROUP BY (item_stores.id)";
        $query = $this->_custom_query($sql_query);
        $num_rows = $query->num_rows();
        return $num_rows;
    }

	function _delete_conif($item_id) {
		$query = "DELETE FROM homepage_offers WHERE block_id = '$item_id' ";
		return $this->_custom_query($query);
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
			$block_id = $value->block_id;
		}

		$this->_delete($update_id);
		$value = '<div class="alert alert-danger" role="alert">Successfully Delete Option</div>';
		$this->session->set_flashdata('item', $value);
		redirect(base_url().'homepage_offers/update/'.$block_id);
	}

	function update() {
		$update_id = $this->uri->segment(3);

		$this->load->module('site_secuirty');
		$this->site_secuirty->_make_sure_is_admin();

		$submit = $this->input->post('submit', true);
		$new_offer = trim($this->input->post('new_offer', true));

		if($submit == "Finished") {
			$update_id = $this->input->post('update_id', true);
			redirect(base_url().'homepage_blocks/create/'.$update_id);
		}elseif($submit == "Submit"){


			if ($new_offer != '') {
				$update_id = $this->input->post('update_id', true);
				$data['item_id'] = $new_offer;
				$data['block_id'] = $update_id;
				$this->_insert($data);

				
				$value = '<div class="alert alert-success" role="alert">Successfully Add New offer Option</div>';
				$this->session->set_flashdata('item', $value);
				redirect(base_url().'homepage_offers/update/'.$update_id);
			}
		}

		$data['query'] = $this->get_where_custom('block_id', $update_id);
		$data['num_rows'] = $data['query']->num_rows();

        $data['update_id'] 	= $update_id;
		$data['head_line'] 	= 'New offer';
		$data['module'] 	= 'homepage_offers';
		$data['view_file'] 	= 'update';

		$this->load->module('templetes');
		$this->templetes->admin($data); 
	}

	function get($order_by) {
	$this->load->model('mdl_homepage_offers');
	$query = $this->mdl_homepage_offers->get($order_by);
	return $query;
	}

	function get_with_limit($limit, $offset, $order_by) {
	$this->load->model('mdl_homepage_offers');
	$query = $this->mdl_homepage_offers->get_with_limit($limit, $offset, $order_by);
	return $query;
	}

	function get_where($id) {
	$this->load->model('mdl_homepage_offers');
	$query = $this->mdl_homepage_offers->get_where($id);
	return $query;
	}

	function get_where_custom($col, $value) {
	$this->load->model('mdl_homepage_offers');
	
	$query = $this->mdl_homepage_offers->get_where_custom($col, $value);
	return $query;
	}

	function _insert($data) {
	$this->load->model('mdl_homepage_offers');
	$this->mdl_homepage_offers->_insert($data);
	}

	function _update($id, $data) {
	$this->load->model('mdl_homepage_offers');
	$this->mdl_homepage_offers->_update($id, $data);
	}

	function _delete($id) {
	$this->load->model('mdl_homepage_offers');
	$this->mdl_homepage_offers->_delete($id);
	}

	function count_where($column, $value) {
	$this->load->model('mdl_homepage_offers');
	$count = $this->mdl_homepage_offers->count_where($column, $value);
	return $count;
	}

	function get_max() {
	$this->load->model('mdl_homepage_offers');
	$max_id = $this->mdl_homepage_offers->get_max();
	return $max_id;
	}

	function _custom_query($mysql_query) {
	$this->load->model('mdl_homepage_offers');
	$query = $this->mdl_homepage_offers->_custom_query($mysql_query);
	return $query;
	}

}