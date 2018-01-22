<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Store_category extends MY_Backend
{
	function __construct() {
		parent::__construct();
		$this->load->library('form_validation');
		
	}

	function test() {
	    $user['e'] = 32;
	    $user['a'] = 45;
	    $user['b'] = 900;
	    $user['c'] = 300;

        $oldest = $this->find_oldest($user);
	   echo $oldest;
    }

    function find_oldest($arr) {

	    foreach ($arr as $key=>$value){
	        if(!isset($key_hightest)) {
	            $key_hightest = $key;
            } elseif ($value > $arr[$key_hightest]) {
	            $key_hightest = $key;
            }
        }

        return $key_hightest;

    }

	function _get_id_by_catUrl($cat_url) {
		$query = $this->get_where_custom('cat_url', $cat_url);
		foreach ($query->result() as $row) {
			$id = $row->id;
		}

		if(! isset($id)) {
			$id = "";
		}

		return $id;
	}

	function view($update_id) {
		if(!isset($update_id)) {
			redirect('site_secuirty/not_allowed');
		}

        $this->load->module('site_settings');
		$url = $this->load->site_settings->_get_item_segments();

		//fetch data from database
		$data = $this->get_data_from_db($update_id);

		//count items of this category
        $use_limit = FALSE;
		$sql_query = $this->_generate_sql_query($update_id, $use_limit);
		$query  = $this->_custom_query($sql_query);
		$total_rows = $query->num_rows();

        //$template, $base_url, $total_row, $limit, $offset
		$pagination_data['total_row'] = $total_rows;
		$pagination_data['template'] = 'public_bootstrap';
		$pagination_data['base_url'] = $this->target_base_url();
		$pagination_data['limit'] = $this->get_limit();
		$pagination_data['offset_segment'] = 4;

        // view Pagiantion in page
        $this->load->module('custom_pagination');
        $pagination = $this->custom_pagination->pagination($pagination_data);

        //Showing Statment
        $pagination_data['offset'] = $this->get_offset();
        $showing_statement = $this->custom_pagination->showing_statement($pagination_data);

		// get items of this page
        $use_limit = TRUE;
        $sql_query = $this->_generate_sql_query($update_id, $use_limit);

        $data['url'] = $url;
		$data['new_query'] = $this->_custom_query($sql_query);
        $data['showing_statement'] = $showing_statement;
        $data['links'] = $pagination;
		$data['update_id'] = $update_id;
		$data['flash'] = $this->session->flashdata('item');
		$data['module'] = 'store_category';
		$data['view_file'] = 'view';

		$this->load->module('templetes');
		$this->templetes->public_bootstrap($data);
	}

	function _get_sub_cat_title($id_cat) {
	    $query = $this->get_where($id_cat);
	    foreach ($query->result() as $row) {
	        $cat_title = $row->cat_name;
        }

        return $cat_title;
    }

    function _get_sub_cat_url($id_cat) {

	    $this->load->module('site_settings');
	    $first_bit = $this->site_settings->_get_items_segments();

        $query = $this->get_where($id_cat);
        foreach ($query->result() as $row) {
            $cat_url = $row->cat_url;
        }

        $full_url = base_url(). $first_bit.'/' . $cat_url;
        return $full_url;
    }

	function target_base_url() {
	    $first_bit = $this->uri->segment(1);
	    $second_bit = $this->uri->segment(2);
	    $third_bit = $this->uri->segment(3);

	    $segment_bit = base_url().$first_bit.'/'.$second_bit.'/'.$third_bit;
	    return $segment_bit;
    }

	function _generate_sql_query($update_id, $limit) {

	    //$limit is a bollean value True OR False

        $sql_query = "select item_stores.*
                        from item_stores, store_cat_assign
                         where store_cat_assign.id_cat = $update_id 
                         and store_cat_assign.id_item = item_stores.id 
                         and item_stores.status = 1";

        if($limit == true) {
            $limit = $this->get_limit();
            $offset = $this->get_offset();
            $sql_query .= ' limit '.$offset.', '.$limit.' ';
        }

        return $sql_query;
    }

    function get_limit() {
	    $limti = 10;
	    return $limti;
    }

    function get_offset() {
	    $offset = $this->uri->segment(4);

	    if(! is_numeric($offset)) {
	        $offset = 0;
        }

	    return $offset;
    }

	function _navbar_bootstrap() {
		
		$sql_query = "select * from stores_category where cat_parent_id = 0 order by cat_name";
		$data['query'] = $this->_custom_query($sql_query);

		$this->load->module('site_settings');
		$data['target_url_start'] = base_url().$this->site_settings->_get_items_segments();
		
		$this->load->view('navbar', $data);
	}

	function _get_parent_name($cat_id) {
		$data = $this->get_data_from_db($cat_id);
		$parent_cat_id = $data['cat_parent_id'];
		$parent_cat_name = $this->_get_cat_parent_name($parent_cat_id);
		return $parent_cat_name;
	}

	function _get_cat_title_for_dropdown() {
		$sql_query = "select * from stores_category where cat_parent_id != 0 order by cat_parent_id, cat_name";
		$query = $this->_custom_query($sql_query);
		foreach ($query->result() as $row) {
			$parent_name = $this->_get_cat_parent_name($row->cat_parent_id);
			$sub_category[$row->id] = $parent_name . " > " .$row->cat_name; 
		}

		return $sub_category;
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
	
	function _get_sortable_list($cat_parent_id) {
		$data['id_row'] = $this->uri->segment(3);
		$query = "select * from stores_category where cat_parent_id=$cat_parent_id order by priority";
		$data['categorise'] = $this->_custom_query($query);
		$data['this_site'] = TRUE;
		$this->load->view('sort_list', $data);
	}
	
	function _get_count_category($update_id) {
		$sql_query = $this->get_where_custom('cat_parent_id', $update_id);
		$nums = $sql_query->num_rows();
		return $nums;
	}

	function _get_cat_parent_name($update_id) {
		$data = $this->get_data_from_db($update_id);
		$cat_name = $data['cat_name'];
		return $cat_name;
	}

	function _get_dropdown_options($update_id) {
		if(! $update_id) {
			$update_id = 0;
		}

		$options[0] = "Please Select ...";

		$sql_query = "select * from stores_category where cat_parent_id = 0 and id!=$update_id";
		$query = $this->_custom_query($sql_query);

		foreach ($query->result() as $row) {
			$options[$row->id] = $row->cat_name;
		}

		return $options;
	}

	function delete($update_id) {
		if(!isset($update_id)) {
			redirect('site_secuirty/not_allowed');
		}

		$this->load->module('site_secuirty');
		$this->site_secuirty->_make_sure_is_admin();
		$submit = $this->input->post('submit');


		if($submit == "Cancel") {

			redirect(base_url().'item_stores/manage');
		} elseif ($submit == "Yes - Delete Item Record") {
			$item_id = $this->input->post('update_id');
			// Delete Item
			$this->_delete_process($update_id);

			$value = '<div class="alert alert-success" role="alert">Successfully Delete Item Record</div>';
			$this->session->set_flashdata('item', $value);


			redirect('item_stores/manage');
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
		$data['head_line'] = 'Delete Item';
		$data['flash'] = $this->session->flashdata('item');
		$data['module'] = 'item_stores';
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
			$this->form_validation->set_rules('cat_name', 'Category Name', 'required|max_length[240]');


			if ($this->form_validation->run() == TRUE) {
				$data = $this->get_post_data();

				$update_id = $this->input->post('update_id', TRUE);
				if (is_numeric($update_id)) {

					//update data
					$this->_update($update_id, $data);
					$value = '<div class="alert alert-success" role="alert">Successfully Update Data Is Done</div>';
					$this->session->set_flashdata('item', $value);
					redirect(base_url().'store_category/create/'.$update_id);
				} else {

					//insert data
					//$data['date_mode'] = time();
					$res = $this->_insert($data);

					$update_id = $this->get_max();
					$value = '<div class="alert alert-success" role="alert">Successfully Insert Data Is Done</div>';
					$this->session->set_flashdata('item', $value);
					redirect(base_url().'store_category/create/'.$update_id);
				}
			}


		} elseif ($submit == "Cancel") {
			redirect(base_url().'store_category/manage');
		}


		if((is_numeric($update_id)) && ($submit!="Submit")) {
			$data = $this->get_data_from_db($update_id);
			$data['update_id'] = $update_id;

		} else {
			$data = $this->get_post_data();

		}

		if(! is_numeric($update_id)) {
			$data['head_line'] = 'Add New Category';
		} else {
			$data['head_line'] = 'Update Category';
		}

		$data['options'] = $this->_get_dropdown_options($update_id);
		$data['cat_parent_id_conut'] = count($this->_get_dropdown_options($update_id));

		$data['flash'] = $this->session->flashdata('item');
		$data['module'] = 'store_category';
		$data['view_file'] = 'create';

		$this->load->module('templetes');
		$this->templetes->admin($data);
	}

	function get_post_data() {
		$data['cat_name'] = $this->input->post('cat_name', TRUE);
		$data['cat_parent_id'] = $this->input->post('cat_parent_id', TRUE);

		return $data;
	}

	function get_data_from_db($update_id) {
		$query = $this->get_where($update_id);

		foreach ($query->result() as $row) {
			$data['id'] = $row->id;
			$data['cat_name'] = $row->cat_name;
			$data['cat_parent_id'] = $row->cat_parent_id;

		}

		return $data;
	}

	function manage() {
		$this->load->module('site_secuirty');
		$this->site_secuirty->_make_sure_is_admin();
		
		$id_row = $this->uri->segment(3);
		if(! is_numeric($id_row)) {
			$id_row = 0;
		}
		$data['this_site'] = TRUE;
		$data['categories'] = $this->get_where_custom('cat_parent_id', $id_row);
		$data['cat_parent_id'] = $id_row;
		$data['flash'] = $this->session->flashdata('item');
		$data['items'] = $this->get('cat_name');
		$data['module'] = 'store_category';
		$data['view_file'] = 'manage';

		$this->load->module('templetes');
		$this->templetes->admin($data);

		//echo Modules::run('templetes/admin', $data);
	}

	function get($order_by) {
		$this->load->model('Mdl_store_category');
		$query = $this->Mdl_store_category->get($order_by);
		return $query;
	}

	function get_with_limit($limit, $offset, $order_by) {
		$this->load->model('Mdl_store_category');
		$query = $this->Mdl_store_category->get_with_limit($limit, $offset, $order_by);
		return $query;
	}

	function get_where($id) {
		$this->load->model('Mdl_store_category');
		$query = $this->Mdl_store_category->get_where($id);
		return $query;
	}

	function get_where_custom($col, $value) {
		$this->load->model('Mdl_store_category');
		$query = $this->Mdl_store_category->get_where_custom($col, $value);
		return $query;
	}

	function _insert($data) {
		$this->load->model('Mdl_store_category');
		$this->Mdl_store_category->_insert($data);
	}

	function _update($id, $data) {
		$this->load->model('Mdl_store_category');
		$this->Mdl_store_category->_update($id, $data);
	}

	function _delete($id) {
		$this->load->model('Mdl_store_category');
		$this->Mdl_store_category->_delete($id);
	}

	function count_where($column, $value) {
		$this->load->model('Mdl_store_category');
		$count = $this->Mdl_store_category->count_where($column, $value);
		return $count;
	}

	function get_max() {
		$this->load->model('Mdl_store_category');
		$max_id = $this->Mdl_store_category->get_max();
		return $max_id;
	}

	function _custom_query($mysql_query) {
		$this->load->model('Mdl_store_category');
		$query = $this->Mdl_store_category->_custom_query($mysql_query);
		return $query;
	}

	function item_check($str)
	{
		$url_item = url_title($str);
		$query_sql = "SELECT * FROM item_stores WHERE title_item='$str' AND url_item='$url_item'";
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