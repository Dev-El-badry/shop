<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Btm_nav extends MY_Backend
{
	function __construct() {
		parent::__construct();
		$this->load->library('form_validation');
		$this->lang->load('admin/btm_nav');
	}

	function submit_create() {
		$this->load->module('site_secuirty');
		$this->site_secuirty->_make_sure_is_admin();
		$submit = $this->input->post('submit', TRUE);
		if($submit == "Submit") {
			$data['page_id'] = $this->input->post('page_id');
			$data['priority'] = 0;
			$this->_insert($data);

			$value = '<div class="alert alert-success" role="alert">'.$this->lang->line('alert_insert').'</div>';
	        $this->session->set_flashdata('item', $value);
	        redirect(base_url().'btm_nav/manage');
		}
	}

	function _get_webpages($selected_options) {
		$this->load->module('web_pages');
		$query = $this->web_pages->get('page_url');

		foreach ($query->result() as $row) {
			if(!in_array($row->id, $selected_options)) {
				$options[$row->id] = $row->page_title;
			}
		}

		if(!isset($options)) {
			$options[''] = '';
		}

		return $options;
	}

	function _draw_create_modal() {
		$query = $this->get('priority');
		foreach ($query->result() as $row) {
			$selected_options[$row->page_id] = $row->page_id;
		}

		if(!isset($selected_options)) {
			$selected_options[''] = '';
		}

		$data['options'] = $this->_get_webpages($selected_options);
		$data['form_location'] = base_url() . 'btm_nav/submit_create';
		$this->load->view('draw_create_modal', $data);
	}

	function sort() {		
		$this->load->module('site_secuirty');
		$this->site_secuirty->_make_sure_is_admin();
		
		$number = $this->input->post('number', 	TRUE);
		for($i=1; $i <= $number; $i++) {
			$update_id = $_POST['order'.$i];
			$data['priority'] = $i;
			$this->_update($update_id, $data);
		}
	}
	
	function _get_sortable_list() {
		$data['id_row'] = $this->uri->segment(3);
		$query = "select * from btm_nav order by priority";
		$data['blocks'] = $this->_custom_query($query);
		$data['this_site'] = TRUE;
		$this->load->view('sort_list', $data);
	}

	function _delete_process($update_id) {
	    $this->_delete($update_id);
    }

	function delete($update_id) {
		if(!isset($update_id)) {
			redirect('site_secuirty/not_allowed');
		}

		$this->load->module('site_secuirty');
        $this->site_secuirty->_make_sure_is_admin();
        $submit = $this->input->post('submit');


		if($submit == "Cancel") {

			redirect(base_url().'btm_nav/manage');
		} elseif ($submit == $this->lang->line('submit_del')) {

			$item_id = $this->input->post('update_id');
			// Delete Item
			$this->_delete_process($update_id);

			$value = '<div class="alert alert-danger" role="alert">'.$this->lang->line('alert_del').'</div>';
			$this->session->set_flashdata('item', $value);


			redirect('btm_nav/manage');
		}

	}

	function deleteconif($update_id) {
		$this->load->module('site_secuirty');
		$this->site_secuirty->_make_sure_is_admin();
		$submit = $this->input->post('submit');


		if(!isset($update_id)) {
			redirect('site_secuirty/not_allowed');
		}

		$data['update_id'] = $update_id;
		$data['head_line'] = $this->lang->line('headline_del');
		$data['flash'] = $this->session->flashdata('item');
		$data['module'] = 'btm_nav';
		$data['view_file'] = 'deleteconif';

		$this->load->module('templetes');
		$this->templetes->admin($data);
	}


	function get_data_from_db($update_id) {
		$query = $this->get_where($update_id);

		foreach ($query->result() as $row) {
			$data['id'] = $row->id;
			$data['page_id'] = $row->page_id;
			$data['priority'] = $row->priority;

		}

		return $data;
	}

	function manage() {
		$this->load->module('site_secuirty');
		$this->site_secuirty->_make_sure_is_admin();

		$query = $this->get('id');
		$data['num_rows'] = $query->num_rows();

		$data['this_site'] = TRUE;
		$data['blocks'] = $this->get('priority');
		$data['flash'] = $this->session->flashdata('item');
		$data['module'] = 'btm_nav';
		$data['view_file'] = 'manage';

		$this->load->module('templetes');
		$this->templetes->admin($data);
	}

	function get($order_by) {
		$this->load->model('Mdl_btm_nav');
		$query = $this->Mdl_btm_nav->get($order_by);
		return $query;
	}

	function get_with_limit($limit, $offset, $order_by) {
		$this->load->model('Mdl_btm_nav');
		$query = $this->Mdl_btm_nav->get_with_limit($limit, $offset, $order_by);
		return $query;
	}

	function get_where($id) {
		$this->load->model('Mdl_btm_nav');
		$query = $this->Mdl_btm_nav->get_where($id);
		return $query;
	}

	function get_where_custom($col, $value) {
		$this->load->model('Mdl_btm_nav');
		$query = $this->Mdl_btm_nav->get_where_custom($col, $value);
		return $query;
	}

	function _insert($data) {
		$this->load->model('Mdl_btm_nav');
		$this->Mdl_btm_nav->_insert($data);
	}

	function _update($id, $data) {
		$this->load->model('Mdl_btm_nav');
		$this->Mdl_btm_nav->_update($id, $data);
	}

	function _delete($id) {
		$this->load->model('Mdl_btm_nav');
		$this->Mdl_btm_nav->_delete($id);
	}

	function count_where($column, $value) {
		$this->load->model('Mdl_btm_nav');
		$count = $this->Mdl_btm_nav->count_where($column, $value);
		return $count;
	}

	function get_max() {
		$this->load->model('Mdl_btm_nav');
		$max_id = $this->Mdl_btm_nav->get_max();
		return $max_id;
	}

	function _custom_query($mysql_query) {
		$this->load->model('Mdl_btm_nav');
		$query = $this->Mdl_btm_nav->_custom_query($mysql_query);
		return $query;
	}

	function item_check($str)
	{
		$url_item = url_title($str);
		$query_sql = "SELECT * FROM btm_nav WHERE title_item='$str' AND url_item='$url_item'";
		$update_id = 13;

		if(is_numeric($update_id)) {
			$query_sql .= " AND id != '$update_id'";
		}

			

		$query = $this->_custom_query($query_sql);
		$num_rows = $query->num_rows();
		echo $num_rows;
		if ($num_rows > 0)
		{

			$this->form_validation->set_message('item_check', 'This Is Item Title Is Not Avaliable');
			return FALSE;
		}
		else
		{

			return TRUE;
		}
	}

}