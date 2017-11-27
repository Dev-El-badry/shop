<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Store_accounts extends MX_Controller
{
	function __construct() {
	parent::__construct();
		$this->load->library('form_validation');
	    $this->form_validation->CI =& $this;
	}

	function _generate_token($update_id) {
        $data = $this->get_data_from_db($update_id);
        $date_made = $data['date_mode'];
        $last_login = $data['last_login'];
        $pword = $data['pword'];
        
        $hashed_code = $pword;
        $start = strlen($hashed_code) - 6;
        $last_six_chars = substr($hashed_code, $start, 6);
        
        if(strlen($pword)>5 && $last_login!=='') {
        	$token = $last_six_chars.$date_made.$last_login;
        } else {
        	$token = '';
        }

        return $token;
    }

    function _get_customer_id_from_token($token) {
		$six_chars = substr($token, 0, 6);
    	$date_made = substr($token, 6, 10);
    	$last_login = substr($token, 16, 10);

    	$sql_query = "select * from store_accounts where date_mode = ? and pword like ? and last_login = ? ";
    	$query = $this->db->query($sql_query, array($date_made, '%'.$six_chars, $last_login));
    	
    	foreach ($query->result as $row) {
    		$customer_id = $row->id;
    	}

    	if(!isset($customer_id)) {
    		$customer_id = 0;
    	}

    	return $customer_id;
    }


	function _get_customer_name($update_id, $optoinal_customer_data = NULL) {
		if(!isset($optoinal_customer_data)) {
			$data = $this->get_data_from_db($update_id);
		} else {
			$data['company'] = trim(ucfirst($optoinal_customer_data['company']));
			$data['fistname'] = trim(ucfirst($optoinal_customer_data['firstname']));
			$data['lastname'] = trim(ucfirst($optoinal_customer_data['lastname']));
		}

		//var_dump($data); die;
		
		if($data=='') {
			$customer_name = "Unknown";
		} else {
			$company = $data['company'];
			$fistname = $data['fistname'];
			$lastname = $data['lastname'];

			$customer_name = $fistname . " " .$lastname;
		
			$company_length = strlen($company);
			if($company_length > 2) {
				$customer_name .= " from ".$company;
			}

		}
	
		return $customer_name;
	}

	function update_password() {
		$this->load->module('site_secuirty');
		$this->site_secuirty->_make_sure_is_admin();
		$this->load->library('session');
		
		$update_id = $this->uri->segment(3);
		$submit = $this->input->post('submit');
		$data['update_id'] = $update_id;

		if ($submit == "Submit") {

		//Process The Form
		$this->form_validation->set_rules('pword', 'password' ,'required|trim|min_length[7]');
		$this->form_validation->set_rules('re_pword', 'Confirm Password' ,'required|matches[pword]');

			if ($this->form_validation->run() == TRUE) {

				$pword = $this->input->post('pword', TRUE);
				
				$update_id = $this->input->post('update_id', TRUE);

				if (is_numeric($update_id)) {
					$data_pword['pword'] = $this->site_secuirty->pword_hashed($pword);
					
					//update data
					$this->_update($update_id, $data_pword);
					$value = '<div class="alert alert-success" role="alert">Successfully Update Password</div>';
					$this->session->set_flashdata('item', $value);
					redirect(base_url().'store_accounts/manage');
				} 
			}


			 
		}elseif ($submit == "Cancel") {
			redirect(base_url().'store_accounts/manage');
		}

		$data['head_line'] = 'Update Password';
		
		
		$data['flash'] = $this->session->flashdata('item');
		$data['module'] = 'store_accounts';
		$data['view_file'] = 'update_password';

		$this->load->module('templetes');
		$this->templetes->admin($data);
	}

	function view($update_id) {
		if(!isset($update_id)) {
			redirect('site_secuirty/not_allowed');
		}
	
		//frtch data from database
		$data = $this->get_data_from_db($update_id);

		

		$data['update_id'] = $update_id;
		$data['flash'] = $this->session->flashdata('item');
		$data['module'] = 'store_accounts';
		$data['view_file'] = 'view';

		$this->load->module('templetes');
		$this->templetes->public_bootstrap($data);
	}

	public function _generate_thumbnail($file_name) {
		$config['image_library'] = 'gd2';
		$config['source_image'] = './big_img/'.$file_name;
		$config['new_image'] = './small_pics/'.$file_name;
		$config['maintain_ratio'] = TRUE;
		$config['width'] = 200;
		$config['height'] = 200;

		$this->load->library('image_lib', $config);

		$this->image_lib->resize();
	}

	public function _delete_process($id_item) {
		// delete colors of item
		$this->load->module('store_item_colors');
		$this->store_item_colors->_delete_conif($id_item);
		// delete sizes of item
		$this->load->module('store_item_sizes');
		$this->store_item_sizes->_delete_conif($id_item);
		// delete images of item
		$data = $this->get_data_from_db($id_item);
		$big_pic = $data['big_img'];
		$small_pic = $data['small_img'];

		$big_path = './big_img/'.$big_pic;
		$small_path = './small_pics/'.$small_pic;

		if (file_exists($big_path)) {
			unlink($big_path);
		}

		if (file_exists($small_path)) {
			unlink($small_path);
		}

		// delete item record from items_stores
		$this->_delete($id_item);
	}

	public function delete($update_id) {
		if(!isset($update_id)) {
			redirect('site_secuirty/not_allowed');
		}

		$this->load->module('site_secuirty');
		$this->site_secuirty->_make_sure_is_admin();
		$submit = $this->input->post('submit');


		if($submit == "Cancel") {

			redirect(base_url().'store_accounts/manage');
		} elseif ($submit == "Yes - Delete Item Record") {
			$item_id = $this->input->post('update_id');
			// Delete Item
			$this->_delete_process($update_id);

			$value = '<div class="alert alert-success" role="alert">Successfully Delete Item Record</div>';
			$this->session->set_flashdata('item', $value);
			

			redirect('store_accounts/manage');
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
		$data['head_line'] = 'Delete Item';
		$data['flash'] = $this->session->flashdata('item');
		$data['module'] = 'store_accounts';
		$data['view_file'] = 'deleteconif';

		$this->load->module('templetes');
		$this->templetes->admin($data);
	}

	public function delete_image($update_id)
    {
		$this->load->module('site_secuirty');
		$this->site_secuirty->_make_sure_is_admin();

		if(!isset($update_id)) {
			redirect('site_secuirty/not_allowed');
		}

		$data = $this->get_data_from_db($update_id);
		$big_pic = $data['big_img'];
		$small_pic = $data['small_img'];

		$big_path = './big_img/'.$big_pic;
		$small_path = './small_pics/'.$small_pic;

		if (file_exists($big_img)) {
			unlink($big_img);
		}

		if (file_exists($small_path)) {
			unlink($small_path);
		}

		//update Date
		unset($data);
		$data['big_img'] = "";
		$data['small_img'] = "";		
		$this->_update($update_id, $data);

		$value = '<div class="alert alert-success" role="alert">Successfully Delete Item Image</div>';
		$this->session->set_flashdata('item', $value);

		redirect('store_accounts/create/'.$update_id);
	}

	public function do_upload($update_id)
    {
		$this->load->module('site_secuirty');
		$this->site_secuirty->_make_sure_is_admin();

		$submit = $this->input->post('submit');

		if(!isset($update_id)) {
			redirect('site_secuirty/not_allowed');
		}

        $config['upload_path']          = './big_img/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 100;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;

        if ($submit == 'Cancel') {
        	redirect('Store_accounts/create/'.$update_id.'');
        }

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('userfile'))
        {
            $data['error'] = array('error' => $this->upload->display_errors('<p style="color: red;">', '</p>')); 

            $data['update_id'] 	= $update_id;
			$data['head_line'] 	= 'Upload Image Product';
			$data['module'] 	= 'store_accounts';
			$data['view_file'] 	= 'upload_image';

			$this->load->module('templetes');
			$this->templetes->admin($data);    
        }
        else
        {	
            $data = array('upload_data' => $this->upload->data());
            // make thumbnails when upload was successfully
            $upload_data = $data['upload_data'];
            $file_name = $upload_data['file_name'];
            $this->_generate_thumbnail($file_name);

            //store data in database
            $update_data['big_img'] = $file_name; 
            $update_data['small_img'] = $file_name;
            $this->_update($update_id, $update_data); 

            $data['update_id'] 	= $update_id;
			$data['head_line'] 	= 'Upload Success';
			$data['module'] 	= 'store_accounts';
			$data['view_file'] 	= 'finish_upload';

			$this->load->module('templetes');
			$this->templetes->admin($data);  
        }
    }

	function upload_image($update_id) {
		$this->load->module('site_secuirty');
		$this->site_secuirty->_make_sure_is_admin();

		if (!isset($update_id)) {
			redirect('site_secuirty/not_allowed');
		}

		$data['update_id'] = $update_id;
		$data['head_line'] = 'Upload Image Product';
		$data['flash'] = $this->session->flashdata('item');
		$data['module'] = 'store_accounts';
		$data['view_file'] = 'upload_image';

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
			$this->form_validation->set_rules('username', 'Username' ,'required|max_length[60]');
			$this->form_validation->set_rules('fistname', 'fist name' ,'required|max_length[240]');
			$this->form_validation->set_rules('lastname', 'last name' ,'required');
			$this->form_validation->set_rules('company', 'company' ,'required');
			$this->form_validation->set_rules('address', 'address' ,'required');
			$this->form_validation->set_rules('address2', 'address2' ,'required');
			$this->form_validation->set_rules('town', 'town' ,'required');
			$this->form_validation->set_rules('country', 'country' ,'required');
			$this->form_validation->set_rules('post_code', 'post code' ,'required|numeric');
			$this->form_validation->set_rules('telnum', 'telnum' ,'required');
			$this->form_validation->set_rules('email', 'email' ,'trim|required|valid_email');
			
			

			if ($this->form_validation->run() == TRUE) {
				$data = $this->get_post_data();
				
				$update_id = $this->input->post('update_id', TRUE);
				if (is_numeric($update_id)) {
					
					//update data
					$this->_update($update_id, $data);
					$value = '<div class="alert alert-success" role="alert">Successfully Update Data Is Done</div>';
					$this->session->set_flashdata('item', $value);
					redirect(base_url().'store_accounts/create/'.$update_id);
				} else {
				
					//insert data
					$data['date_mode'] = time();
					$res = $this->_insert($data);
					
					$update_id = $this->get_max();
					$value = '<div class="alert alert-success">Successfully Insert Data Is Done</div>';
					$this->session->set_flashdata('item', $value);
					redirect(base_url().'store_accounts/create/'.$update_id);
				}
			} 


		} elseif ($submit == "Cancel") {
			redirect(base_url().'store_accounts/manage');
		}


		if((is_numeric($update_id)) && ($submit!="Submit")) {
			$data = $this->get_data_from_db($update_id);
			$data['update_id'] = $update_id;

		} else {
			$data = $this->get_post_data();
			$data['big_img'] = "";
		}

		if(! is_numeric($update_id)) {
			$data['head_line'] = 'Add New Account';
		} else {
			$data['head_line'] = 'Update Account';
		}
		
		$data['flash'] = $this->session->flashdata('item');
		$data['module'] = 'store_accounts';
		$data['view_file'] = 'create';

		$this->load->module('templetes');
		$this->templetes->admin($data);
	}

	function get_post_data() {
		$data['username'] = $this->input->post('username', TRUE);
		$data['fistname'] = $this->input->post('fistname', TRUE);
		$data['lastname'] = $this->input->post('lastname', TRUE);
		$data['company'] = $this->input->post('company', TRUE);
		$data['address'] = $this->input->post('address', TRUE);
		$data['address2'] = $this->input->post('address2', TRUE);
		$data['town'] = $this->input->post('town', TRUE);
		$data['country'] = $this->input->post('country', TRUE);
		$data['post_code'] = $this->input->post('post_code', TRUE);
		$data['telnum'] = $this->input->post('telnum', TRUE);
		$data['email'] = $this->input->post('email', TRUE);
		$data['date_mode'] = $this->input->post('date_mode', TRUE);
		$data['pword'] = $this->input->post('pword', TRUE);

		return $data;
	}

	function get_data_from_db($update_id) {
		$query = $this->get_where($update_id);

		foreach ($query->result() as $row) {
			$data['update_id'] = $row->id; 
			$data['username'] = $row->username;
			$data['fistname'] = $row->fistname;
			$data['lastname'] = $row->lastname;
			$data['company'] = $row->company; 
			$data['address'] = $row->address; 
			$data['address2'] = $row->address2; 
			$data['town'] = $row->town; 
			$data['country'] = $row->country; 
			$data['post_code'] = $row->post_code; 
			$data['telnum'] = $row->telnum; 
			$data['email'] = $row->email; 
			$data['date_mode'] = $row->date_mode; 
			$data['pword'] = $row->pword; 
			$data['last_login'] = $row->last_login;
		}

		return $data;
	}

	function manage() {
		$this->load->module('site_secuirty');
		$this->site_secuirty->_make_sure_is_admin();
		
		$data['flash'] = $this->session->flashdata('item');
		$data['accounts'] = $this->get('fistname');
		$data['module'] = 'store_accounts';
		$data['view_file'] = 'manage';

		$this->load->module('templetes');
		$this->templetes->admin($data);

		//echo Modules::run('templetes/admin', $data);
	}

	function get($order_by) {
	$this->load->model('Mdl_store_accounts');
	$query = $this->Mdl_store_accounts->get($order_by);
	return $query;
	}

	function get_with_limit($limit, $offset, $order_by) {
	$this->load->model('Mdl_store_accounts');
	$query = $this->Mdl_store_accounts->get_with_limit($limit, $offset, $order_by);
	return $query;
	}

	function get_where($id) {
	$this->load->model('Mdl_store_accounts');
	$query = $this->Mdl_store_accounts->get_where($id);
	return $query;
	}

	function get_where_custom($col, $value) {
	$this->load->model('Mdl_store_accounts');
	$query = $this->Mdl_store_accounts->get_where_custom($col, $value);
	return $query;
	}

    function get_double_where_custom($col1, $value1,$col2, $value2) {
        $this->load->model('Mdl_store_accounts');
        $query = $this->Mdl_store_accounts->get_double_where_custom($col1, $value1,$col2, $value2);
        return $query;
    }

	function _insert($data) {
	$this->load->model('Mdl_store_accounts');
	$this->Mdl_store_accounts->_insert($data);
	}

	function _update($id, $data) {
	$this->load->model('Mdl_store_accounts');
	$this->Mdl_store_accounts->_update($id, $data);
	}

	function _delete($id) {
	$this->load->model('Mdl_store_accounts');
	$this->Mdl_store_accounts->_delete($id);
	}

	function count_where($column, $value) {
	$this->load->model('Mdl_store_accounts');
	$count = $this->Mdl_store_accounts->count_where($column, $value);
	return $count;
	}

	function get_max() {
	$this->load->model('Mdl_store_accounts');
	$max_id = $this->Mdl_store_accounts->get_max();
	return $max_id;
	}

	function _custom_query($mysql_query) {
	$this->load->model('Mdl_store_accounts');
	$query = $this->Mdl_store_accounts->_custom_query($mysql_query);
	return $query;
	}

	 public function item_check($str)
        {
        	$url_item = url_title($str);
        	$query_sql = "SELECT * FROM store_accounts WHERE title_item='$str' AND url_item='$url_item'";
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