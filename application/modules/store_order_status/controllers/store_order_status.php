
<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Store_order_status extends MY_Backend
{
	function __construct() {
	parent::__construct();
		$this->load->library('form_validation');
	    $this->form_validation->CI =& $this;
	    $this->lang->load('admin/order_status_options');
	}

	function _get_options() {
		$options[0] = $this->lang->line('order_submitted');

		$query = $this->get('id');
		foreach ($query->result() as $row) {
			$options[$row->id] = $row->status_title;
		}

		return $options;
	}

	function _get_status_title($update_id) {
		if(is_numeric($update_id)) {
			$query = $this->get_where($update_id);
			foreach ($query->result() as $row) {
				$status_title = $row->status_title;
			}

			if(!isset($status_title) OR $status_title == '') {
				$status_title = $this->lang->line('unknown');
			}

			return $status_title;
		}
		return 0;
	}

	public function _delete_process($id_item) {

		$this->_delete($id_item);
	}

	function _make_sure_allowed_deleted($update_id) {

		//return TRUE OR FALSE

		$sql_query = "select * from store_orders where order_status = $update_id";
		$query = $this->_custom_query($sql_query);
		$num_rows = $query->num_rows();
		if($num_rows>0) {
			return FALSE; //Note Allwoed To Delete This Account
		}

		return TRUE; // Everythings is okay, so That Can Delete It
	}

	public function delete($update_id) {
		if(!isset($update_id)) {
			redirect('site_secuirty/not_allowed');
		}

		$this->load->module('site_secuirty');
		$this->site_secuirty->_make_sure_is_admin();
		$submit = $this->input->post('submit');


		if($submit == "Cancel") {

			redirect(base_url().'store_order_status/manage');
		} elseif ($submit == "Yes - Delete Order Status Option Record") {
			$item_id = $this->input->post('update_id');
			$allowed = $this->_make_sure_allowed_deleted($update_id);
			if($allowed == FALSE) {
				// Note: Not Allowed To Delete This Status Option 
				$value = '<div class="alert alert-warning" role="alert">'.$this->lang->line('alert_delete').'</div>';
				$this->session->set_flashdata('item', $value);
				redirect('store_order_status/manage');
			}
			// Delete Item
			$this->_delete_process($update_id);

			$value = '<div class="alert alert-danger" role="alert">'.$this->lang->line('btn_submit').'</div>';
			$this->session->set_flashdata('item', $value);
			
			redirect('store_order_status/manage');
		}

	}

	public function deleteconif($update_id) {
		$this->load->module('site_secuirty');
		$this->site_secuirty->_make_sure_is_admin();
		$submit = $this->input->post('submit');


		if(!isset($update_id)) {
			redirect('site_secuirty/not_allowed');
		}
	
		$data['update_id'] = $update_id;
		$data['head_line'] = $this->lang->line('del_order');
		$data['flash'] = $this->session->flashdata('item');
		$data['module'] = 'store_order_status';
		$data['view_file'] = 'deleteconif';

		$this->load->module('templetes');
		$this->templetes->admin($data);
	}

	function create() {
		$this->load->module('site_secuirty');
		$this->site_secuirty->_make_sure_is_admin();
		$this->load->library('session');
		

		$update_id = $this->uri->segment(3);
		$submit = $this->input->post('submit');


		if ($submit == "Submit") {

			//Process The Form
			$this->form_validation->set_rules('status_title', $this->lang->line('status_title') ,'required');

			if ($this->form_validation->run() == TRUE) {
				$data = $this->get_post_data();
				
				$update_id = $this->input->post('update_id', TRUE);
				if (is_numeric($update_id)) {
					
					//update data
					$this->_update($update_id, $data);
					$value = '<div class="alert alert-success" role="alert">'.$this->lang->line('succ_update').'</div>';
					$this->session->set_flashdata('item', $value);
					redirect(base_url().'store_order_status/create/'.$update_id);
				} else {
				
					//insert data
					
					$res = $this->_insert($data);
					
					$update_id = $this->get_max();
					$value = '<div class="alert alert-success">'.$this->lang->line('succ_insert').'</div>';
					$this->session->set_flashdata('item', $value);
					redirect(base_url().'store_order_status/create/'.$update_id);
				}
			} 


		} elseif ($submit == "Cancel") {
			redirect(base_url().'store_order_status/manage');
		}


		if((is_numeric($update_id)) && ($submit!="Submit")) {
			$data = $this->get_data_from_db($update_id);
			$data['update_id'] = $update_id;

		} else {
			$data = $this->get_post_data();
			
		}

		if(! is_numeric($update_id)) {
			$data['head_line'] = $this->lang->line('add_new_order_option');
		} else {
			$data['head_line'] = $this->lang->line('update_order_option');
		}
		
		$data['flash'] = $this->session->flashdata('item');
		$data['module'] = 'store_order_status';
		$data['view_file'] = 'create';

		$this->load->module('templetes');
		$this->templetes->admin($data);
	}

	function get_post_data() {
		$data['status_title'] = $this->input->post('status_title', TRUE);

		return $data;
	}

	function get_data_from_db($update_id) {
		$query = $this->get_where($update_id);

		foreach ($query->result() as $row) {
			$data['update_id'] = $row->id; 
			$data['status_title'] = $row->status_title;
		}

		return $data;
	}

	function manage() {
		$this->load->module('site_secuirty');
		$this->site_secuirty->_make_sure_is_admin();
		
		$data['flash'] = $this->session->flashdata('item');
		$data['accounts'] = $this->get('id');
		$data['module'] = 'store_order_status';
		$data['view_file'] = 'manage';

		$this->load->module('templetes');
		$this->templetes->admin($data);

		//echo Modules::run('templetes/admin', $data);
	}

	function get($order_by) {
	$this->load->model('Mdl_store_order_status');
	$query = $this->Mdl_store_order_status->get($order_by);
	return $query;
	}

	function get_with_limit($limit, $offset, $order_by) {
	$this->load->model('Mdl_store_order_status');
	$query = $this->Mdl_store_order_status->get_with_limit($limit, $offset, $order_by);
	return $query;
	}

	function get_where($id) {
	$this->load->model('Mdl_store_order_status');
	$query = $this->Mdl_store_order_status->get_where($id);
	return $query;
	}

	function get_where_custom($col, $value) {
	$this->load->model('Mdl_store_order_status');
	$query = $this->Mdl_store_order_status->get_where_custom($col, $value);
	return $query;
	}

    function get_double_where_custom($col1, $value1,$col2, $value2) {
        $this->load->model('Mdl_store_order_status');
        $query = $this->Mdl_store_order_status->get_double_where_custom($col1, $value1,$col2, $value2);
        return $query;
    }

	function _insert($data) {
	$this->load->model('Mdl_store_order_status');
	$this->Mdl_store_order_status->_insert($data);
	}

	function _update($id, $data) {
	$this->load->model('Mdl_store_order_status');
	$this->Mdl_store_order_status->_update($id, $data);
	}

	function _delete($id) {
	$this->load->model('Mdl_store_order_status');
	$this->Mdl_store_order_status->_delete($id);
	}

	function count_where($column, $value) {
	$this->load->model('Mdl_store_order_status');
	$count = $this->Mdl_store_order_status->count_where($column, $value);
	return $count;
	}

	function get_max() {
	$this->load->model('Mdl_store_order_status');
	$max_id = $this->Mdl_store_order_status->get_max();
	return $max_id;
	}

	function _custom_query($mysql_query) {
	$this->load->model('Mdl_store_order_status');
	$query = $this->Mdl_store_order_status->_custom_query($mysql_query);
	return $query;
	}

	 public function item_check($str)
        {
        	$url_item = url_title($str);
        	$query_sql = "SELECT * FROM store_order_status WHERE title_item='$str' AND url_item='$url_item'";
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