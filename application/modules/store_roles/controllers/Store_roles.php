<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Store_roles extends MY_Backend
{

	function __construct() {
	parent::__construct();
	}

	function test() {
		$html = file_get_contents('http://stackoverflow.com/questions/ask');

		$c = curl_init('http://stackoverflow.com/questions/ask');
		curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
		//curl_setopt(... other options you want...)

		$html = curl_exec($c);

		if (curl_error($c))
		    die(curl_error($c));

		// Get the status code
		$status = curl_getinfo($c, CURLINFO_HTTP_CODE);

		curl_close($c);
	}

	public function delete($update_id) {
		if(!isset($update_id)) {
			redirect('site_secuirty/not_allowed');
		}

		$this->load->module('site_secuirty');
		$this->site_secuirty->_make_sure_is_admin();
		$submit = $this->input->post('submit');


		if($submit == "Cancel") {

			redirect(base_url().'store_roles/manage');
		} elseif ($submit == "Yes - Delete Right Of Access") {
			
			$item_id = $this->input->post('update_id');
			// Delete Item
			$this->_delete_process($update_id);

			$value = '<div class="alert alert-danger" role="alert">Successfully Delete Right Of Access</div>';
			$this->session->set_flashdata('item', $value);
			

			redirect('store_roles/manage');
		}

	}


	public function _delete_process($id_item) {

		$this->_delete($id_item);
	}

	public function deleteconif() {
		$this->load->module('site_secuirty');
		$this->site_secuirty->_make_sure_is_admin();
		$submit = $this->input->post('submit');

		$update_id = $this->uri->segment(3);
		if(!isset($update_id)) {
			redirect('site_secuirty/not_allowed');
		}
	
		$data['update_id'] = $update_id;
		$data['head_line'] = 'Delete Right Of Access';
		$data['flash'] = $this->session->flashdata('item');
		$data['module'] = 'store_roles';
		$data['view_file'] = 'deleteconif';

		$this->load->module('templetes');
		$this->templetes->admin($data);
	}


	function get_post_data() {
		$data['role_title'] = $this->input->post('role_title', TRUE);
		$data['show_items'] = $this->input->post('show_items', TRUE);
		$data['show_orders'] = $this->input->post('show_orders', TRUE);
		$data['show_order_status'] = $this->input->post('show_order_status', TRUE);
		$data['show_sliders'] = $this->input->post('show_sliders', TRUE);
		$data['show_home_blocks'] = $this->input->post('show_home_blocks', TRUE);
		$data['show_webpages'] = $this->input->post('show_webpages', TRUE);
		$data['show_btm_nav'] = $this->input->post('show_btm_nav', TRUE);
		$data['show_blogs'] = $this->input->post('show_blogs', TRUE);
		$data['show_accounts'] = $this->input->post('show_accounts', TRUE);
		$data['show_delivers'] = $this->input->post('show_delivers', TRUE);
		$data['show_sellers'] = $this->input->post('show_sellers', TRUE);
		$data['show_users'] = $this->input->post('show_users', TRUE);
		$data['show_categories'] = $this->input->post('show_categories', TRUE);
		$data['show_enquiries'] = $this->input->post('show_enquiries', TRUE);
		$data['show_right_access'] = $this->input->post('show_right_access', TRUE);
		

		return $data;
	}

	function get_data_from_db($update_id) {
		$query = $this->get_where($update_id);

		foreach ($query->result() as $row) {
			$data['id'] = $row->id;
			$data['role_title'] = $row->role_title;
			$data['show_items'] = $row->show_items;
			$data['show_orders'] = $row->show_orders;
			$data['show_order_status'] = $row->show_order_status;
			$data['show_sliders'] = $row->show_sliders;
			$data['show_home_blocks'] = $row->show_home_blocks;
			$data['show_webpages'] = $row->show_webpages;
			$data['show_btm_nav'] = $row->show_btm_nav;
			$data['show_blogs'] = $row->show_blogs;
			$data['show_accounts'] = $row->show_accounts;
			$data['show_delivers'] = $row->show_delivers;
			$data['show_sellers'] = $row->show_sellers;
			$data['show_users'] = $row->show_users;
			$data['show_categories'] = $row->show_categories;
			$data['show_enquiries'] = $row->show_enquiries;
			$data['show_right_access'] = $row->show_right_access;
		}

		return $data;
	}

	function create() {
		$this->load->module('site_secuirty');
		$this->site_secuirty->_make_sure_is_admin();
		
		$update_id = $this->uri->segment(3);
		$submit = $this->input->post('submit');


		if ($submit == "Submit") {
			
			//Process The Form
			$this->load->library('form_validation');
			$this->form_validation->set_rules('role_title', 'Role Title', 'required');
			

			if ($this->form_validation->run() == TRUE) {
				$data = $this->get_post_data();
				
				$update_id = $this->input->post('update_id', TRUE);
				if (is_numeric($update_id)) {
					
					//update data
					$this->_update($update_id, $data);
	
					$value = '<div class="alert alert-success" role="alert">Successfully Update Data Is Done</div>';
					$this->session->set_flashdata('item', $value);
					redirect(base_url().'store_roles/create/'.$update_id);
				} else {
				
					//insert data
					
					$res = $this->_insert($data);
					
					$update_id = $this->get_max();
					$value = '<div class="alert alert-success">Successfully Insert Data Is Done</div>';
					$this->session->set_flashdata('item', $value);
					redirect(base_url().'store_roles/create/'.$update_id);
				}
			} 


		} elseif ($submit == "Cancel") {
			redirect(base_url().'store_roles/manage');
		}


		if((is_numeric($update_id)) && ($submit!="Submit")) {
			$data = $this->get_data_from_db($update_id);
			$data['update_id'] = $update_id;
			

		} else {
			$data = $this->get_post_data();
			
		}

		if(! is_numeric($update_id)) {
			$data['head_line'] = 'Add New Right Of Access';
		} else {
			$data['head_line'] = 'Update Right Of Access';
		}
		

		$data['flash'] = $this->session->flashdata('item');
		$data['module'] = 'Store_roles';
		$data['view_file'] = 'create';

		$this->load->module('templetes');
		$this->templetes->admin($data);
	}

	function manage() {
		$this->load->module('site_secuirty');
		$this->site_secuirty->_make_sure_is_admin();

		$query = $this->get('id');
		$data['num_rows'] = $query->num_rows();

		$data['query'] = $this->get('id');
		
		$data['flash'] = $this->session->flashdata('item');
		$data['module'] = 'Store_roles';
		$data['view_file'] = 'manage';

		$this->load->module('templetes');
		$this->templetes->admin($data);
	}	

	function get($order_by) {
	$this->load->model('Mdl_store_roles');
	$query = $this->Mdl_store_roles->get($order_by);
	return $query;
	}

	function get_with_limit($limit, $offset, $order_by) {
	$this->load->model('Mdl_store_roles');
	$query = $this->Mdl_store_roles->get_with_limit($limit, $offset, $order_by);
	return $query;
	}

	function get_where($id) {
	$this->load->model('Mdl_store_roles');
	$query = $this->Mdl_store_roles->get_where($id);
	return $query;
	}

	function get_where_custom($col, $value) {
	$this->load->model('Mdl_store_roles');
	$query = $this->Mdl_store_roles->get_where_custom($col, $value);
	return $query;
	}

	function _insert($data) {
	$this->load->model('Mdl_store_roles');
	$this->Mdl_store_roles->_insert($data);
	}

	function _update($id, $data) {
	$this->load->model('Mdl_store_roles');
	$this->Mdl_store_roles->_update($id, $data);
	}

	function _delete($id) {
	$this->load->model('Mdl_store_roles');
	$this->Mdl_store_roles->_delete($id);
	}

	function count_where($column, $value) {
	$this->load->model('Mdl_store_roles');
	$count = $this->Mdl_store_roles->count_where($column, $value);
	return $count;
	}

	function get_max() {
	$this->load->model('Mdl_store_roles');
	$max_id = $this->Mdl_store_roles->get_max();
	return $max_id;
	}

	function _custom_query($mysql_query) {
	$this->load->model('Mdl_store_roles');
	$query = $this->Mdl_store_roles->_custom_query($mysql_query);
	return $query;
	}

}