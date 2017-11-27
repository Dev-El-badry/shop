<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Enquiries extends MX_Controller
{

	function __construct() {
	parent::__construct();
	}

    function fix() {
        $this->load->module('site_secuirty');
        $query = $this->get('');
        foreach ($query->result() as $row) {
            $data['code'] = $this->site_secuirty->RandomString(6);
            $this->_update($row->id, $data);
        }
        echo 'finished';

    }

    function get_data_from_db_by_code($update_code) {
        $query = $this->get_where_custom('code', $update_code);
        foreach ($query->result() as $row) {
            $data['id'] = $row->id;
            $data['subject'] = $row->subject;
            $data['message'] = $row->message;
            $data['sent_to'] = $row->sent_to;
            $data['sent_by'] = $row->sent_by;
            $data['date_created'] = $row->date_created;
            $data['opened'] = $row->opened;
            $data['code'] = $row->code;
            $data['urgent'] = $row->urgent;
        }

        return $data;
    }

    function _draw_customer_inbox($customer_id) {
       
        $folder_type = 'inbox';
        $data['customer_id'] = $customer_id;
        $data['query'] = $this->_fetch_customer_enquiries($folder_type, $customer_id);
        $data['folder_type'] = ucfirst($folder_type);
        $this->load->view('customer_inbox', $data);

    }

    public function _delete_process($id_item) {

        // delete Blog record from enquiries
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

            redirect(base_url().'enquiries/manage');
        } elseif ($submit == "Yes - Delete Item Record") {
            $item_id = $this->input->post('update_id');
            // Delete Item

                $this->_delete_process($update_id);



            $value = '<div class="alert alert-danger" role="alert">Successfully Delete Blog Record</div>';
            $this->session->set_flashdata('item', $value);


            redirect('enquiries/manage');
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
        $data['head_line'] = 'Delete Blog';
        $data['flash'] = $this->session->flashdata('item');
        $data['module'] = 'enquiries';
        $data['view_file'] = 'deleteconif';

        $this->load->module('templetes');
        $this->templetes->admin($data);
    }

    function _fetch_customer_for_dropdown() {
        $this->load->module('store_accounts');
        $options[''] = "Select Customer...";
        $query = $this->store_accounts->get('id');
        foreach ($query->result() as $row) {
            $fistname = trim($row->fistname);
            $lastname = trim($row->lastname);
            $company = trim($row->company);

            $customername = ucfirst($fistname) . ' ' .ucfirst($lastname);

            $company_length = strlen($company);
            if($company_length>2) {
                $customername .= " from ".ucfirst($company);
            }
            
            if($customername == "") {
                $customername = "Unknown";
            }

            if($options!="") {
                $options[$row->id] = trim($customername);
            }
        }
      
        return $options;
    }

    function create() {
        $this->load->module('site_secuirty');
        $this->site_secuirty->_make_sure_is_admin();
        
        $submit = $this->input->post('submit');
        

        $update_id = $this->uri->segment(3);
        

       if ($submit == "Submit") {

            //Process The Form
            $this->load->library('form_validation');
            $this->form_validation->set_rules('subject', 'Subject', 'required|max_length[240]|min_length[4]|trim');
            $this->form_validation->set_rules('message', 'Message', 'required');
            $this->form_validation->set_rules('sent_to', 'Customer Names', 'required|numeric');


            if ($this->form_validation->run() == TRUE) {
                $data = $this->get_post_data();
                $data['date_created'] = time();
                $data['sent_by'] = 0;
                $data['opened'] = 0;
                $data['code'] = $this->site_secuirty->RandomString(6);
                $this->_insert($data);

                
                $value = '<div class="alert alert-success" role="alert">Successfully Send Message Is Done</div>';
                $this->session->set_flashdata('item', $value);
                redirect(base_url().'enquiries/manage');
                
            }


        } elseif ($submit == "Cancel") {
            redirect(base_url().'enquiries/manage');
        }

       if(is_numeric($update_id)) {
            $data = $this->get_data_from_db($update_id);
            $data['head_line'] = "Reply Message";
            $data['message'] = "<br><br>
            -----------------------------------------------------<br>
            Original Message Is Shown Below: 
            <br><br>
            ".$data['message'];
        } else {
            $data = $this->get_post_data();
            $data['head_line'] = 'New Message';
        }

        $data['flash'] = $this->session->flashdata('item');
        $data['options'] = $this->_fetch_customer_for_dropdown();
        $data['module'] = 'enquiries';
        $data['view_file'] = 'create';

       $this->load->module('templetes');
       $this->templetes->admin($data);
    }

    function get_post_data() {
        $data['subject'] = $this->input->post('subject', TRUE);
        $data['message'] = $this->input->post('message', TRUE);
        $data['sent_to'] = $this->input->post('sent_to', TRUE);
        
        return $data;
    }

    function get_data_from_db($update_id) {
        $query = $this->get_where($update_id);

        foreach ($query->result() as $row) {
            $data['id'] = $row->id;
            $data['subject'] = $row->subject;
            $data['message'] = $row->message;
            $data['sent_to'] = $row->sent_to;
            $data['sent_by'] = $row->sent_by;
            $data['date_created'] = $row->date_created;
            $data['opened'] = $row->opened;
        }

        return $data;
    }

    function view() {
        $this->load->module('site_secuirty');
        $this->site_secuirty->_make_sure_is_admin();

        $enquiry_id = $this->uri->segment(3);

        $this->_set_to_opened($enquiry_id);

        $items = $this->get_where($enquiry_id);
        foreach ($items->result() as $row) {
            $data['id'] = $row->id;
            $data['sent_by'] = $row->sent_by;
            $data['date_created'] = $row->date_created;
            $data['message'] = $row->message;
            $data['subject'] = $row->subject;
        }

        $data['module'] = 'enquiries';
        $data['view_file'] = 'view';
        $this->load->module('templetes');
        $this->templetes->admin($data);
    }

    function _set_to_opened($update_id) {
       
        if(is_numeric($update_id)) {
            $data['opened'] = 1;
            $res = $this->_update($update_id, $data); 
        }
        
    }

    function manage() {
        $this->output->enable_profiler(true);
        $this->load->module('site_secuirty');
        $this->load->module('timedate');
        $this->site_secuirty->_make_sure_is_admin();     

        
        $folder_type = "inbox";
        $folder_type = ucfirst($folder_type);
        $data['items'] = $this->_fetch_enquiries($folder_type);
        $data['module'] = 'enquiries';
        $data['view_file'] = 'manage';

        $this->load->module('templetes');
        $this->templetes->admin($data);

        //echo Modules::run('templetes/admin', $data);
    }

    function _fetch_enquiries($folder_type) {
       

        $sql_query = "select enquiries.*, store_accounts.username, store_accounts.fistname, store_accounts.lastname, store_accounts.company 
            from enquiries, store_accounts 
            where enquiries.sent_to = 0 
            and store_accounts.id = enquiries.sent_by
            order by date_created desc ";

        $query = $this->_custom_query($sql_query);
        return $query;

    }

    function _fetch_customer_enquiries($folder_type, $customer_id) {
        $sql_query = "select enquiries.*, store_accounts.username, store_accounts.fistname, store_accounts.lastname, store_accounts.company 
            from enquiries, store_accounts 
            where enquiries.sent_to = store_accounts.id 
            and enquiries.sent_to = $customer_id
            order by date_created desc ";

        $query = $this->_custom_query($sql_query);
        return $query;
    }

    function get_double_where_custom($col1, $value1,$col2, $value2) {
        $this->load->model('mdl_enquiries');
        $query = $this->mdl_enquiries->get_double_where_custom($col1, $value1,$col2, $value2);
        return $query;
    }


	function get($order_by) {
	$this->load->model('mdl_enquiries');
	$query = $this->mdl_enquiries->get($order_by);
	return $query;
	}

	function get_with_limit($limit, $offset, $order_by) {
	$this->load->model('mdl_enquiries');
	$query = $this->mdl_enquiries->get_with_limit($limit, $offset, $order_by);
	return $query;
	}

	function get_where($id) {
	$this->load->model('mdl_enquiries');
	$query = $this->mdl_enquiries->get_where($id);
	return $query;
	}

	function get_where_custom($col, $value) {
	$this->load->model('mdl_enquiries');
	$query = $this->mdl_enquiries->get_where_custom($col, $value);
	return $query;
	}

	function _insert($data) {
	$this->load->model('mdl_enquiries');
	$this->mdl_enquiries->_insert($data);
	}

	function _update($id, $data) {
	$this->load->model('mdl_enquiries');
	$this->mdl_enquiries->_update($id, $data);
	}

	function _delete($id) {
	$this->load->model('mdl_enquiries');
	$this->mdl_enquiries->_delete($id);
	}

	function count_where($column, $value) {
	$this->load->model('mdl_enquiries');
	$count = $this->mdl_enquiries->count_where($column, $value);
	return $count;
	}

	function get_max() {
	$this->load->model('mdl_enquiries');
	$max_id = $this->mdl_enquiries->get_max();
	return $max_id;
	}

	function _custom_query($mysql_query) {
	$this->load->model('mdl_enquiries');
	$query = $this->mdl_enquiries->_custom_query($mysql_query);
	return $query;
	}

}