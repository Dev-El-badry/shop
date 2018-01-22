<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Store_users extends MY_Backend
{
	function __construct() {
	parent::__construct();
		$this->load->library('form_validation');
	    $this->form_validation->CI =& $this;
	}

	function _get_role($user_id) {
		if(is_numeric($user_id)) {
			$data = $this->get_data_from_db($user_id);
			$role_id = $data['role_id'];
		}

		if(!isset($role_id)) {
			$role_id = 0;
		}

		return $role_id;
	}

	function view_profile() {
		$user_id = $this->uri->segment(3);
		if(!is_numeric($user_id)) {
			redirect(base_url().'site_secuirty/not_allowed');
		}

		$data = $this->get_data_from_db($user_id);
		$head_line = $data['firstname'] . ' ' . $data['lastname'];
		$data['head_line'] = $head_line;
		$data['flash'] = $this->session->flashdata('item');
		$data['module'] = 'store_users';
		$data['view_file'] = 'view_profile';

		$this->load->module('templetes');
		$this->templetes->admin($data);
	}

	function get_double_where_custom($col1, $value1,$col2, $value2) {
        $this->load->model('Mdl_store_users');
        $query = $this->Mdl_store_users->get_double_where_custom($col1, $value1,$col2, $value2);
        return $query;
    }

    function _get_date_created($user_id) {
    	$this->load->module('timedate');
    	if(is_numeric($user_id)) {
    		$data = $this->get_data_from_db($user_id);
			$date_created = $this->timedate->get_nice_date($data['date_created'], 'mini');
    	}

    	if(!isset($date_created)) {
    		$date_created = '';
    	}

    	return $date_created;
    }

    function _get_function($user_id) {
    	if(is_numeric($user_id)) {
    		$data = $this->get_data_from_db($user_id);
			$function = $data['function'];
    	}

    	if(!isset($function)) {
    		$function = '';
    	}

    	return $function;
    }

    function _get_picture($user_id) {
    	if(is_numeric($user_id)) {
    		$data = $this->get_data_from_db($user_id);
			$picture = $data['picture'];
    	}

    	if(!isset($picture)) {
    		$picture = '';
    	}

    	return $picture;
    }

    function _get_first_last_name($user_id) {
		if(is_numeric($user_id)) {
			$data = $this->get_data_from_db($user_id);
			$firstname = $data['firstname'];
			$lastname = $data['lastname'];
			$first_last_name = '';

			if($firstname != '') {
				$first_last_name .= $firstname;
				$first_last_name .= ' ';
			}

			if($lastname != '') {
				$first_last_name .= $lastname;
				$first_last_name .= ' ';
			}

			return $first_last_name;
		}
	}


	function _got_picture($update_id) {
		$data = $this->get_data_from_db($update_id);
		$picture = $data['picture'];

		if($picture != '') {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	function _delete_image_process($update_id) {
		$data = $this->get_data_from_db($update_id);
		$picture = $data['picture'];
		

		$picture = './users_pics/'.$picture;
		

		if (file_exists($picture)) {
			unlink($picture);
		}

		//update Date
		unset($data);
		$data['picture'] = "";
		return $data;
	}

	public function delete_image($update_id)
    {
		$this->load->module('site_secuirty');
		$this->site_secuirty->_make_sure_is_admin();

		if(!isset($update_id)) {
			redirect('site_secuirty/not_allowed');
		}

		$data = $this->_delete_image_process($update_id);
		$this->_update($update_id, $data);

		$value = '<div class="alert alert-danger" role="alert">Successfully Delete User Image</div>';
		$this->session->set_flashdata('item', $value);

		redirect('store_users/create/'.$update_id);
	}

	public function do_upload($update_id)
    {
		$this->load->module('site_secuirty');
		$this->site_secuirty->_make_sure_is_admin();

		$submit = $this->input->post('submit');

		if(!isset($update_id)) {
			redirect('site_secuirty/not_allowed');
		}

        $config['upload_path']          = './users_pics/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 300;
        $config['max_width']            = 1623;
        $config['max_height']           = 968;

        if ($submit == 'Cancel') {
        	redirect('store_users/create/'.$update_id.'');
        }

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('userfile'))
        {
            $data['error'] = array('error' => $this->upload->display_errors('<p style="color: red;">', '</p>')); 

           redirect(base_url().'store_users/upload_image/'.$update_id);      
        }
        else
        {	
            $data = array('upload_data' => $this->upload->data());
           
            $upload_data = $data['upload_data'];
            $file_name = $upload_data['file_name'];
            

            //store data in database
            $update_data['picture'] = $file_name; 
           
            $this->_update($update_id, $update_data); 

   			redirect(base_url().'store_users/create/'.$update_id);  
        }
    }

	function upload_image($update_id) {
		$this->load->module('site_secuirty');
		$this->site_secuirty->_make_sure_is_admin();

		if (!isset($update_id)) {
			redirect('site_secuirty/not_allowed');
		}

		$data['update_id'] = $update_id;
		$data['head_line'] = 'Upload Image';
		$data['flash'] = $this->session->flashdata('item');
		$data['module'] = 'store_users';
		$data['view_file'] = 'upload_image';

		$this->load->module('templetes');
		$this->templetes->admin($data);
	}

	function _get_options() {
		$this->load->module('store_roles');
		$query = $this->store_roles->get('id');
		$options[''] = 'Please Select Role For User ...';
		foreach ($query->result() as $row) {
			$options[$row->id] = $row->role_title;
		}

		if(!isset($options)) {
			$options[''] = '';
		}

		return $options;
	}

	function _get_shopper_address1($update_id, $delimiter) {
		$data = $this->get_data_from_db($update_id);
		$address1 = '';

		if(!empty($data['address1'])) {
			$address1 .= $data['address1'];
			$address1 .= $delimiter;
		}  

		if(!empty($data['address12'])) {
			$address1 .= $data['address12'];
			$address1 .= $delimiter;
		} 

		if(!empty($data['town'])) {
			$address1 .= $data['town'];
			$address1 .= $delimiter;
		} 

		if(!empty($data['country'])) {
			$address1 .= $data['country'];
			$address1 .= $delimiter;
		} 

		return $address1;
	}

	function _get_customer_name($update_id, $optoinal_customer_data = NULL) {
		if(!isset($optoinal_customer_data)) {
			$data = $this->get_data_from_db($update_id);
		} else {
			$data['pword'] = trim(ucfirst($optoinal_customer_data['pword']));
			$data['firstname'] = trim(ucfirst($optoinal_customer_data['firstname']));
			$data['lastname'] = trim(ucfirst($optoinal_customer_data['lastname']));
		}

		//var_dump($data); die;
		
		if($data=='') {
			$customer_name = "Unknown";
		} else {
			$pword = $data['pword'];
			$firstname = $data['firstname'];
			$lastname = $data['lastname'];

			$customer_name = $firstname . " " .$lastname;
		
			$pword_length = strlen($pword);
			if($pword_length > 2) {
				$customer_name .= " from ".$pword;
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
					redirect(base_url().'store_users/manage');
				} 
			}


			 
		}elseif ($submit == "Cancel") {
			redirect(base_url().'store_users/manage');
		}

		$data['head_line'] = 'Update Password';
		
		
		$data['flash'] = $this->session->flashdata('item');
		$data['module'] = 'store_users';
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
		$data['module'] = 'store_users';
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
		$this->_delete_image_process($id_item);
		

		// delete item record from items_stores
		$this->_delete($id_item);
	}

	function _make_sure_allowed_deleted($update_id) {

		//return TRUE OR FALSE

		$sql_query = "select * from store_basket where shopper_id = $update_id";
		$query = $this->_custom_query($sql_query);
		$num_rows = $query->num_rows();
		if($num_rows>0) {
			return FALSE; //Note Allwoed To Delete This User
		}

		$sql_query = "select * from store_shoppertrack where shopper_id = $update_id";
		$query = $this->_custom_query($sql_query);
		$num_rows = $query->num_rows();
		if($num_rows>0) {
			return FALSE; // Note Allowed To Delete This User
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

			redirect(base_url().'store_users/manage');
		} elseif ($submit == "Yes - Delete User Record") {
			$item_id = $this->input->post('update_id');
			$allowed = $this->_make_sure_allowed_deleted($update_id);
			if($allowed == FALSE) {
				// Note Allowed To Delete User
				$value = '<div class="alert alert-warning" role="alert">Not Allwoed To Delete This User, Has Item In Orders Or Basket</div>';
				$this->session->set_flashdata('item', $value);
				redirect('store_users/manage');
			} 
			// Note Allowed To Delete User Is Not Has Item In Orders Or Basket
			
			// Delete Item
			$this->_delete_process($update_id);

			$value = '<div class="alert alert-danger" role="alert">Successfully Delete User Record</div>';
			$this->session->set_flashdata('item', $value);
			

			redirect('store_users/manage');
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
		$data['head_line'] = 'Delete Acount';
		$data['flash'] = $this->session->flashdata('item');
		$data['module'] = 'store_users';
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
		//	var_dump($_POST);die;
			$update_id = $this->input->post('update_id', TRUE);
			
			$this->load->module('site_secuirty');
		
			//Process The Form
			
			
			if(!is_numeric($update_id)) {
			$this->form_validation->set_rules('username', 'Username' ,'required|max_length[60]');
			$this->form_validation->set_message('is_unique','The %s got to be unique');
			}
			$this->form_validation->set_rules('firstname', 'fist name' ,'required|max_length[60]');
			$this->form_validation->set_rules('lastname', 'last name' ,'required');
			
			if(!is_numeric($update_id)) {
			$this->form_validation->set_rules('pword', 'Password' ,'required|min_length[8]');
			$this->form_validation->set_rules('re_pword', 'Password Confirmation' ,'required|matches[pword]');
			}
			$this->form_validation->set_rules('address1', 'address1' ,'required');
			$this->form_validation->set_rules('address2', 'address2' ,'required');
			$this->form_validation->set_rules('town', 'town' ,'required');
			$this->form_validation->set_rules('country', 'country' ,'required');
			
			$this->form_validation->set_rules('tel', 'tel' ,'required');
			$this->form_validation->set_rules('email', 'email' ,'trim|required|valid_email');
			$this->form_validation->set_rules('role_id', 'Role' ,'trim|required|numeric');
			$this->form_validation->set_rules('function', 'Function' ,'trim|required');
			
			

			if ($this->form_validation->run() == TRUE) {
				
				$data = $this->get_post_data();
				
				$update_id = $this->input->post('update_id', TRUE);
				if (is_numeric($update_id)) {
					
					//update data
					$pword = $this->input->post('pword', TRUE);
					
					$data['date_updated'] = time();
					$data['updated_by'] = $this->session->userdata('useradmin_id');

					$this->_update($update_id, $data);
					$value = '<div class="alert alert-success" role="alert">Successfully Update Data Is Done</div>';
					$this->session->set_flashdata('item', $value);
					redirect(base_url().'store_users/create/'.$update_id);
				} else {

					$pword= $this->input->post('pword', TRUE);
					$data['pword'] = $this->site_secuirty->pword_hashed($pword);
					//insert data
					$data['date_created'] = time();
					$data['created_by'] = $this->session->userdata('useradmin_id');
					$res = $this->_insert($data);
					
					$update_id = $this->get_max();
					$value = '<div class="alert alert-success">Successfully Insert Data Is Done</div>';
					$this->session->set_flashdata('item', $value);
					redirect(base_url().'store_users/create/'.$update_id);
				}
			} 


		} elseif ($submit == "Cancel") {
			redirect(base_url().'store_users/manage');
		}


		if((is_numeric($update_id)) && ($submit!="Submit")) {
			$data = $this->get_data_from_db($update_id);
			$data['update_id'] = $update_id;
			$data['picture'] = $data['picture'];
			$data['got_picture'] = $this->_got_picture($update_id);

		} else {
			$data = $this->get_post_data();
			
		}

		if(! is_numeric($update_id)) {
			$data['head_line'] = 'Add New User';
		} else {
			$data['head_line'] = 'Update User';
		}
		
		$data['options'] = $this->_get_options();
		$data['flash'] = $this->session->flashdata('item');
		$data['module'] = 'store_users';
		$data['view_file'] = 'create';

		$this->load->module('templetes');
		$this->templetes->admin($data);
	}

	function get_post_data() {
		$data['username'] = $this->input->post('username', TRUE);
		$data['firstname'] = $this->input->post('firstname', TRUE);
		$data['lastname'] = $this->input->post('lastname', TRUE);
		
		$data['address1'] = $this->input->post('address1', TRUE);
		$data['address2'] = $this->input->post('address2', TRUE);
		$data['town'] = $this->input->post('town', TRUE);
		$data['function'] = $this->input->post('function', TRUE);
		$data['role_id'] = $this->input->post('role_id', TRUE);
		$data['country'] = $this->input->post('country', TRUE);
		
		$data['tel'] = $this->input->post('tel', TRUE);
		$data['email'] = $this->input->post('email', TRUE);
		
		

		return $data;
	}

	function get_data_from_db($update_id) {
		$query = $this->get_where($update_id);

		foreach ($query->result() as $row) {
			$data['update_id'] = $row->id; 
			$data['username'] = $row->username;
			$data['firstname'] = $row->firstname;
			$data['lastname'] = $row->lastname;
			$data['pword'] = $row->pword; 
			$data['address1'] = $row->address1; 
			$data['address2'] = $row->address2; 
			$data['town'] = $row->town; 
			$data['country'] = $row->country; 
			$data['function'] = $row->function; 
			$data['role_id'] = $row->role_id; 
			$data['picture'] = $row->picture; 
			
			$data['tel'] = $row->tel; 
			$data['email'] = $row->email; 
			$data['date_created'] = $row->date_created; 
			$data['pword'] = $row->pword; 
			
		}

		return $data;
	}

	function manage() {
		$this->load->module('site_secuirty');
		$this->site_secuirty->_make_sure_is_admin();
		
		$data['flash'] = $this->session->flashdata('item');
		$data['accounts'] = $this->get('firstname');
		$data['num_rows'] = $data['accounts']->num_rows();
		$data['module'] = 'store_users';
		$data['view_file'] = 'manage';

		$this->load->module('templetes');
		$this->templetes->admin($data);

		//echo Modules::run('templetes/admin', $data);
	}

	function get($order_by) {
	$this->load->model('Mdl_store_users');
	$query = $this->Mdl_store_users->get($order_by);
	return $query;
	}

	function get_with_limit($limit, $offset, $order_by) {
	$this->load->model('Mdl_store_users');
	$query = $this->Mdl_store_users->get_with_limit($limit, $offset, $order_by);
	return $query;
	}

	function get_where($id) {
	$this->load->model('Mdl_store_users');
	$query = $this->Mdl_store_users->get_where($id);
	return $query;
	}

	function get_where_custom($col, $value) {
	$this->load->model('Mdl_store_users');
	$query = $this->Mdl_store_users->get_where_custom($col, $value);
	return $query;
	}



	function _insert($data) {
	$this->load->model('Mdl_store_users');
	$this->Mdl_store_users->_insert($data);
	}

	function _update($id, $data) {
	$this->load->model('Mdl_store_users');
	$this->Mdl_store_users->_update($id, $data);
	}

	function _delete($id) {
	$this->load->model('Mdl_store_users');
	$this->Mdl_store_users->_delete($id);
	}

	function count_where($column, $value) {
	$this->load->model('Mdl_store_users');
	$count = $this->Mdl_store_users->count_where($column, $value);
	return $count;
	}

	function get_max() {
	$this->load->model('Mdl_store_users');
	$max_id = $this->Mdl_store_users->get_max();
	return $max_id;
	}

	function _custom_query($mysql_query) {
	$this->load->model('Mdl_store_users');
	$query = $this->Mdl_store_users->_custom_query($mysql_query);
	return $query;
	}

	 public function item_check($str)
        {
        	$url_item = url_title($str);
        	$query_sql = "SELECT * FROM store_users WHERE title_item='$str' AND url_item='$url_item'";
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