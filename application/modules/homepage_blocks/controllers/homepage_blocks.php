<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Homepage_blocks extends MX_Controller
{
	function __construct() {
		parent::__construct();
		$this->load->library('form_validation');
		
	}

    function _drow_blocks() {
	    $this->load->module('homepage_offers');

	    $query = $this->get('priority');
	    $data['query'] = $query;
	    $this->load->view('draw_blocks', $data);
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
		$query = "select * from homepage_blocks order by priority";
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

			redirect(base_url().'homepage_blocks/manage');
		} elseif ($submit == "Yes - Delete Homepage Blocks Record") {

			$item_id = $this->input->post('update_id');
			// Delete Item
			$this->_delete_process($update_id);

			$value = '<div class="alert alert-success" role="alert">Successfully Delete homepage blocks Record</div>';
			$this->session->set_flashdata('item', $value);


			redirect('homepage_blocks/manage');
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
		$data['head_line'] = 'Delete Homepage Block';
		$data['flash'] = $this->session->flashdata('item');
		$data['module'] = 'homepage_blocks';
		$data['view_file'] = 'deleteconif';

		$this->load->module('templetes');
		$this->templetes->admin($data);
	}

	function create() {
		$this->load->module('site_secuirty');
		$this->site_secuirty->_make_sure_is_admin();
		$this->load->library('session');
		//ini_set('memory_limit', '-1');


		$update_id = $this->uri->segment(3);
		$submit = $this->input->post('submit');


		if ($submit == "Submit") {

			//Process The Form
			$this->load->library('form_validation');
			$this->form_validation->set_rules('block_title', 'Block Title', 'required|max_length[240]');


			if ($this->form_validation->run() == TRUE) {
				$data = $this->get_post_data();

				$update_id = $this->input->post('update_id', TRUE);
				if (is_numeric($update_id)) {

					//update data
					$this->_update($update_id, $data);
					$value = '<div class="alert alert-success" role="alert">Successfully Update Data Is Done</div>';
					$this->session->set_flashdata('item', $value);
					redirect(base_url().'homepage_blocks/create/'.$update_id);
				} else {

					//insert data
					//$data['date_mode'] = time();
                    //var_dump($data); die();
					$this->_insert($data);

					$update_id = $this->get_max();
					$value = '<div class="alert alert-success" role="alert">Successfully Insert Data Is Done</div>';
					$this->session->set_flashdata('item', $value);
					redirect(base_url().'homepage_blocks/create/'.$update_id);
				}
			}


		} elseif ($submit == "Cancel") {
			redirect(base_url().'homepage_blocks/manage');
		}


		if((is_numeric($update_id)) && ($submit!="Submit")) {
			$data = $this->get_data_from_db($update_id);
			$data['update_id'] = $update_id;

		} else {
			$data = $this->get_post_data();

		}

		if(! is_numeric($update_id)) {
			$data['head_line'] = 'Add New Homepage Block';
		} else {
			$data['head_line'] = 'Update Homepage Block';
		}




		$data['flash'] = $this->session->flashdata('item');
		$data['module'] = 'homepage_blocks';
		$data['view_file'] = 'create';

		$this->load->module('templetes');
		$this->templetes->admin($data);
	}

	function get_post_data() {
		$data['block_title'] = $this->input->post('block_title', TRUE);
		return $data;
	}

	function get_data_from_db($update_id) {
		$query = $this->get_where($update_id);

		foreach ($query->result() as $row) {
			$data['id'] = $row->id;
			$data['block_title'] = $row->block_title;
			$data['priority'] = $row->priority;

		}

		return $data;
	}

	function manage() {
		$this->load->module('site_secuirty');
		$this->site_secuirty->_make_sure_is_admin();

		$data['this_site'] = TRUE;
		$data['blocks'] = $this->get('priority');

		$data['flash'] = $this->session->flashdata('item');

		$data['module'] = 'homepage_blocks';
		$data['view_file'] = 'manage';

		$this->load->module('templetes');
		$this->templetes->admin($data);
	}

	function get($order_by) {
		$this->load->model('Mdl_homepage_blocks');
		$query = $this->Mdl_homepage_blocks->get($order_by);
		return $query;
	}

	function get_with_limit($limit, $offset, $order_by) {
		$this->load->model('Mdl_homepage_blocks');
		$query = $this->Mdl_homepage_blocks->get_with_limit($limit, $offset, $order_by);
		return $query;
	}

	function get_where($id) {
		$this->load->model('Mdl_homepage_blocks');
		$query = $this->Mdl_homepage_blocks->get_where($id);
		return $query;
	}

	function get_where_custom($col, $value) {
		$this->load->model('Mdl_homepage_blocks');
		$query = $this->Mdl_homepage_blocks->get_where_custom($col, $value);
		return $query;
	}

	function _insert($data) {
		$this->load->model('Mdl_homepage_blocks');
		$this->Mdl_homepage_blocks->_insert($data);
	}

	function _update($id, $data) {
		$this->load->model('Mdl_homepage_blocks');
		$this->Mdl_homepage_blocks->_update($id, $data);
	}

	function _delete($id) {
		$this->load->model('Mdl_homepage_blocks');
		$this->Mdl_homepage_blocks->_delete($id);
	}

	function count_where($column, $value) {
		$this->load->model('Mdl_homepage_blocks');
		$count = $this->Mdl_homepage_blocks->count_where($column, $value);
		return $count;
	}

	function get_max() {
		$this->load->model('Mdl_homepage_blocks');
		$max_id = $this->Mdl_homepage_blocks->get_max();
		return $max_id;
	}

	function _custom_query($mysql_query) {
		$this->load->model('Mdl_homepage_blocks');
		$query = $this->Mdl_homepage_blocks->_custom_query($mysql_query);
		return $query;
	}

	function item_check($str)
	{
		$url_item = url_title($str);
		$query_sql = "SELECT * FROM homepage_blocks WHERE title_item='$str' AND url_item='$url_item'";
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