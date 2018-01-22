<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Store_shippers extends MY_Backend
{
	function __construct() {
	parent::__construct();
		$this->load->library('form_validation');
	    $this->form_validation->CI =& $this;
	    $this->lang->load('admin/users');
	}

	function get_data_from_db($update_id) {
		
		$query = $this->get_where($update_id);
		
		foreach ($query->result() as $row) {
			$data['id'] = $row->id;
			$data['firstname'] = $row->firstname;
			$data['lastname'] = $row->lastname;
			$data['tel'] = $row->tel;
			$data['email'] = $row->email;
			$data['address1'] = $row->address1;
			$data['address2'] = $row->address2;
			$data['town'] = $row->town;
			$data['country'] = $row->country;
			$data['company'] = $row->company;
			$data['picture'] = $row->picture;
			$data['date_created'] = $row->date_created;
			$data['date_updated'] = $row->date_updated;
			$data['created_by'] = $row->created_by;
			$data['updated_by'] = $row->updated_by;
		}

		if(!isset($data)) 
		{
			$data = '';
		}

		return $data;
	}

	function _get_shipper_name($update_id, $optoinal_customer_data = NULL) {
		if(!isset($optoinal_customer_data)) {
			$data = $this->get_data_from_db($update_id);
		} else {
			$data['company'] = trim(ucfirst($optoinal_customer_data['company']));
			$data['firstname'] = trim(ucfirst($optoinal_customer_data['firstname']));
			$data['lastname'] = trim(ucfirst($optoinal_customer_data['lastname']));
		}

		//var_dump($data); die;
		
		if($data=='') {
			$customer_name = $this->lang->line('unknown');
		} else {
			$company = $data['company'];
			$firstname = $data['firstname'];
			$lastname = $data['lastname'];

			$customer_name = $firstname . " " .$lastname;
		
			$company_length = strlen($company);
			if($company_length > 2) {
				$customer_name .= " from ".$company;
			}

		}
	
		return $customer_name;
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

	function _delete_process_image($update_id) {
		$this->load->module('store_countries');
		$this->store_countries->_all_countries_delete($update_id);
		if(is_numeric($update_id)) {
		$data = $this->get_data_from_db($update_id);
		$picture = $data['picture'];
		
		$picture = './shippers_pics/'.$picture;
		
		if (file_exists($picture)) {
			unlink($picture);
			}
		}
		
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

		$data = $this->_delete_process_image($update_id);
		//update Date
		
		$this->_update($update_id, $data);

		$value = '<div class="alert alert-danger" role="alert">'.$this->lang->line('del_image').'</div>';
		$this->session->set_flashdata('item', $value);

		redirect('store_shippers/create/'.$update_id);
	}

	public function do_upload($update_id)
    {
		$this->load->module('site_secuirty');
		$this->site_secuirty->_make_sure_is_admin();

		$submit = $this->input->post('submit');

		if(!isset($update_id)) {
			redirect('site_secuirty/not_allowed');
		}

        $config['upload_path']          = './shippers_pics/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 300;
        $config['max_width']            = 1623;
        $config['max_height']           = 968;

        if ($submit == 'Cancel') {
        	redirect('store_shippers/create/'.$update_id.'');
        }

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('shopperfile'))
        {
            $data['error'] = array('error' => $this->upload->display_errors('<p style="color: red;">', '</p>')); 

           redirect(base_url().'store_shippers/upload_image/'.$update_id);      
        }
        else
        {	
            $data = array('upload_data' => $this->upload->data());
           
            $upload_data = $data['upload_data'];
            $file_name = $upload_data['file_name'];
            

            //store data in database
            $update_data['picture'] = $file_name; 
           
            $this->_update($update_id, $update_data); 

   			redirect(base_url().'store_shippers/create/'.$update_id);  
        }
    }

	function upload_image($update_id) {
		$this->load->module('site_secuirty');
		$this->site_secuirty->_make_sure_is_admin();

		if (!isset($update_id)) {
			redirect('site_secuirty/not_allowed');
		}

		$data['update_id'] = $update_id;
		$data['head_line'] = $this->lang->line('upload_image');
		$data['flash'] = $this->session->flashdata('item');
		$data['module'] = 'store_shippers';
		$data['view_file'] = 'upload_image';

		$this->load->module('templetes');
		$this->templetes->admin($data);
	}

	function _get_options() {
		$this->load->module('store_roles');
		$query = $this->store_roles->get('id');
		$options[''] = $this->lang->line('options');
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

	function _get_shopper_address($update_id, $delimiter) {
		$data = $this->get_data_from_db($update_id);
		$address = '';

		if(!empty($data['address'])) {
			$address .= $data['address1'];
			$address .= $delimiter;
		}  

		if(!empty($data['address2'])) {
			$address .= $data['address2'];
			$address .= $delimiter;
		} 

		if(!empty($data['town'])) {
			$address .= $data['town'];
			$address .= $delimiter;
		} 

		if(!empty($data['country'])) {
			$address .= $data['country'];
			$address .= $delimiter;
		} 

		return $address;
	}


	function _get_customer_name($update_id, $optoinal_customer_data = NULL) {
		if(!isset($optoinal_customer_data)) {
			$data = $this->get_data_from_db($update_id);
		} else {
			$data['company'] = trim(ucfirst($optoinal_customer_data['company']));
			$data['firstname'] = trim(ucfirst($optoinal_customer_data['firstname']));
			$data['lastname'] = trim(ucfirst($optoinal_customer_data['lastname']));
		}

		//var_dump($data); die;
		
		if($data=='') {
			$customer_name = $this->lang->line('unknown');
		} else {
			$company = $data['company'];
			$firstname = $data['firstname'];
			$lastname = $data['lastname'];

			$customer_name = $firstname . " " .$lastname;
		
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
		$this->form_validation->set_rules('pword', $this->lang->line('password') ,'required|trim|min_length[7]');
		$this->form_validation->set_rules('re_pword', $this->lang->line('confirm_password'),'required|matches[pword]');

			if ($this->form_validation->run() == TRUE) {

				$pword = $this->input->post('pword', TRUE);
				
				$update_id = $this->input->post('update_id', TRUE);

				if (is_numeric($update_id)) {
					$data_pword['pword'] = $this->site_secuirty->pword_hashed($pword);
					
					//update data
					$this->_update($update_id, $data_pword);
					$value = '<div class="alert alert-success" role="alert">'.$this->lang->line('update_password').'</div>';
					$this->session->set_flashdata('item', $value);
					redirect(base_url().'store_shippers/manage');
				} 
			}


			 
		}elseif ($submit == "Cancel") {
			redirect(base_url().'store_shippers/manage');
		}

		$data['head_line'] = $this->lang->line('update_password');
		
		
		$data['flash'] = $this->session->flashdata('item');
		$data['module'] = 'store_shippers';
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
		$data['module'] = 'store_shippers';
		$data['view_file'] = 'view';

		$this->load->module('templetes');
		$this->templetes->public_bootstrap($data);
	}

	

	public function _delete_process($id_item) {
		// delete colors of item
		$this->_delete_process_image($id_item);
		

		// delete item record from items_stores
		$this->_delete($id_item);
	}

	function _make_sure_allowed_deleted($update_id) {

		//return TRUE OR FALSE

		// $sql_query = "select * from store_basket where shopper_id = $update_id";
		// $query = $this->_custom_query($sql_query);
		// $num_rows = $query->num_rows();
		// if($num_rows>0) {
		// 	return FALSE; //Note Allwoed To Delete This Shipper
		// }

		// $sql_query = "select * from store_shoppertrack where shopper_id = $update_id";
		// $query = $this->_custom_query($sql_query);
		// $num_rows = $query->num_rows();
		// if($num_rows>0) {
		// 	return FALSE; // Note Allowed To Delete This Shipper
		// }

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

			redirect(base_url().'store_shippers/manage');
		} elseif ($submit == $this->lang->line('del_shipper')) {
			$item_id = $this->input->post('update_id');
			$allowed = $this->_make_sure_allowed_deleted($update_id);
			if($allowed == FALSE) {
				// Note Allowed To Delete Shipper
				$value = '<div class="alert alert-warning" role="alert">'.$this->lang->line('alert_allowed').'</div>';
				$this->session->set_flashdata('item', $value);
				redirect('store_shippers/manage');
			} 
			// Note Allowed To Delete Shipper Is Not Has Item In Orders Or Basket
			
			// Delete Item
			$this->_delete_process($update_id);

			$value = '<div class="alert alert-danger" role="alert">'.$this->lang->line('alert_del_shipper').'</div>';
			$this->session->set_flashdata('item', $value);
			

			redirect('store_shippers/manage');
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
		$data['head_line'] = $this->lang->line('del_account');
		$data['flash'] = $this->session->flashdata('item');
		$data['module'] = 'store_shippers';
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

			$update_id = $this->input->post('update_id', TRUE);
			$this->load->module('site_secuirty');
		
			//Process The Form
			
			$this->form_validation->set_rules('firstname', $this->lang->line('first_name') ,'required|max_length[240]');
			$this->form_validation->set_rules('lastname', $this->lang->line('last_name') ,'required');
		
			$this->form_validation->set_rules('address1', $this->lang->line('address1') ,'required');
			$this->form_validation->set_rules('address2', $this->lang->line('address2') ,'required');
			$this->form_validation->set_rules('town', $this->lang->line('town') ,'required');
			$this->form_validation->set_rules('country', $this->lang->line('country') ,'required');
			
			$this->form_validation->set_rules('tel', $this->lang->line('tel') ,'required');
			$this->form_validation->set_rules('email', $this->lang->line('email') ,'trim|required|valid_email');
			
			if ($this->form_validation->run() == TRUE) {
				$data = $this->get_post_data();
				
				$update_id = $this->input->post('update_id', TRUE);
				if (is_numeric($update_id)) {
					
					//update data
					$data['date_updated'] = time();
					$data['updated_by'] = $this->session->userdata('useradmin_id');

					$this->_update($update_id, $data);
					$value = '<div class="alert alert-success" role="alert">'.$this->lang->line('alert_update').'</div>';
					$this->session->set_flashdata('item', $value);
					redirect(base_url().'store_shippers/create/'.$update_id);
				} else {
					
					//insert data
					$pword= $this->input->post('pword', TRUE);
					$data['pword'] = $this->site_secuirty->pword_hashed($pword);
					$data['date_created'] = time();
					$data['created_by'] = $this->session->userdata('useradmin_id');
					$res = $this->_insert($data);
					
					$update_id = $this->get_max();
					$value = '<div class="alert alert-success">'.$this->lang->line('alert_insert').'</div>';
					$this->session->set_flashdata('item', $value);
					redirect(base_url().'store_shippers/create/'.$update_id);
				}
			} 


		} elseif ($submit == "Cancel") {
			redirect(base_url().'store_shippers/manage');
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
			$data['head_line'] = $this->lang->line('add_new_shipper');
		} else {
			$data['head_line'] = $this->lang->line('update_shipper');
		}
		
		$data['options'] = $this->_get_options();
		$data['flash'] = $this->session->flashdata('item');
		$data['module'] = 'store_shippers';
		$data['view_file'] = 'create';

		$this->load->module('templetes');
		$this->templetes->admin($data);
	}

	function get_post_data() {
		
		$data['firstname'] = $this->input->post('firstname', TRUE);
		$data['lastname'] = $this->input->post('lastname', TRUE);
		
		$data['address1'] = $this->input->post('address1', TRUE);
		$data['address2'] = $this->input->post('address2', TRUE);
		$data['town'] = $this->input->post('town', TRUE);
		
		
		$data['country'] = $this->input->post('country', TRUE);
		$data['company'] = $this->input->post('company', TRUE);
		
		$data['tel'] = $this->input->post('tel', TRUE);
		$data['email'] = $this->input->post('email', TRUE);
		
		

		return $data;
	}

	function manage() {
		$this->load->module('site_secuirty');
		$this->site_secuirty->_make_sure_is_admin();
		
		$data['flash'] = $this->session->flashdata('item');
		$data['accounts'] = $this->get('firstname');
		$data['num_rows'] = $data['accounts']->num_rows();
		$data['module'] = 'store_shippers';
		$data['view_file'] = 'manage';

		$this->load->module('templetes');
		$this->templetes->admin($data);

		//echo Modules::run('templetes/admin', $data);
	}

	function get($order_by) {
	$this->load->model('Mdl_store_shippers');
	$query = $this->Mdl_store_shippers->get($order_by);
	return $query;
	}

	function get_with_limit($limit, $offset, $order_by) {
	$this->load->model('Mdl_store_shippers');
	$query = $this->Mdl_store_shippers->get_with_limit($limit, $offset, $order_by);
	return $query;
	}

	function get_where($id) {
	$this->load->model('Mdl_store_shippers');
	$query = $this->Mdl_store_shippers->get_where($id);
	return $query;
	}

	function get_where_custom($col, $value) {
	$this->load->model('Mdl_store_shippers');
	$query = $this->Mdl_store_shippers->get_where_custom($col, $value);
	return $query;
	}

    function get_double_where_custom($col1, $value1,$col2, $value2) {
        $this->load->model('Mdl_store_shippers');
        $query = $this->Mdl_store_shippers->get_double_where_custom($col1, $value1,$col2, $value2);
        return $query;
    }

	function _insert($data) {
	$this->load->model('Mdl_store_shippers');
	$this->Mdl_store_shippers->_insert($data);
	}

	function _update($id, $data) {
	$this->load->model('Mdl_store_shippers');
	$this->Mdl_store_shippers->_update($id, $data);
	}

	function _delete($id) {
	$this->load->model('Mdl_store_shippers');
	$this->Mdl_store_shippers->_delete($id);
	}

	function count_where($column, $value) {
	$this->load->model('Mdl_store_shippers');
	$count = $this->Mdl_store_shippers->count_where($column, $value);
	return $count;
	}

	function get_max() {
	$this->load->model('Mdl_store_shippers');
	$max_id = $this->Mdl_store_shippers->get_max();
	return $max_id;
	}

	function _custom_query($mysql_query) {
	$this->load->model('Mdl_store_shippers');
	$query = $this->Mdl_store_shippers->_custom_query($mysql_query);
	return $query;
	}

	 public function item_check($str)
        {
        	$url_item = url_title($str);
        	$query_sql = "SELECT * FROM store_shippers WHERE title_item='$str' AND url_item='$url_item'";
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