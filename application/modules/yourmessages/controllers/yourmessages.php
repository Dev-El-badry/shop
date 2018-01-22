<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Yourmessages extends MY_Backend
{

	function __construct() {
	parent::__construct();
	}

    function get_post_data() {
        $data['subject'] = $this->input->post('subject', TRUE);
        $data['message'] = $this->input->post('message', TRUE);
        $data['code'] = $this->input->post('code', TRUE);
        $data['urgent'] = $this->input->post('urgent', TRUE);
        
        return $data;
    }

    function create() {
        $this->load->module('site_secuirty');
        $this->load->module('enquiries');
        $this->load->module('store_accounts');

        $update_code = $this->uri->segment(3);
        $submit = $this->input->post('submit');
        $customer_id = $this->site_secuirty->_get_user_id();
       
       if ($submit == "Submit") {
            
            //Process The Form
            $this->load->library('form_validation');
            $this->form_validation->set_rules('subject', 'Subject', 'required|max_length[240]|min_length[4]|trim');
            $this->form_validation->set_rules('message', 'Message', 'required');
            
            if ($this->form_validation->run() == TRUE) {

                if(!isset($customer_id) OR $customer_id == 0) {
                    $token = $this->input->post('token', TRUE);
                    $customer_id = $this->store_accounts->_get_customer_id_from_token($token);
                    $not_logged_in = TRUE;
                }
                $data = $this->get_post_data();
                
                
                $data['date_created'] = time();
                $data['sent_by'] = $customer_id;
                $data['sent_to'] = 0; //always  to Admin
                $data['opened'] = 0;
                $data['code'] = $this->site_secuirty->RandomString(6);

                if($data['urgent'] != 1) {
                    $data['urgent'] = 0;
                }

                if($customer_id>0) {
                    $this->enquiries->_insert($data);
                    $value = '<div class="alert alert-success" role="alert">Successfully Send Message Is Done</div>';
                    $this->session->set_flashdata('item', $value);
                }
                
                if(isset($not_logged_in)) {
                    $target_url = base_url() . 'startacconut/messagesent';
                } else {
                    $target_url = base_url() . 'startacconut/welcome';
                }

                redirect($target_url);
                
            }


        } elseif ($submit == "Cancel") {
            redirect(base_url().'startacconut/welcome');
        }

        if(isset($update_code) && $update_code != '') {
            $data = $this->enquiries->get_data_from_db_by_code($update_code);

            $replace = '
            ';
            $data['message'] = str_replace('<br>', $replace, $data['message']);
            $data['message'] = strip_tags($data['message']);

            $data['message'] = '

            ---------------------------------
            '.$data['message'];

        } else {
            $data = $this->get_post_data();
        }
        
       
        $data['token'] = $this->store_accounts->_generate_token($customer_id);
        $data['head_line'] = 'New Compose Message';
        $data['flash'] = $this->session->flashdata('item');
        $data['module'] = 'yourmessages';
        $data['view_file'] = 'create';

       $this->load->module('templetes');
       $this->templetes->public_bootstrap($data);
    }
	
	function view() {
        $this->load->module('site_secuirty');
        $this->load->module('enquiries');
        $this->load->module('timedate');
        $this->site_secuirty->_make_sure_logged_in();

        $code_msg = $this->uri->segment(3);
        $update_id = $this->site_secuirty->_get_user_id();

        $col1 = 'sent_to';
        $value1 = $update_id;
        $col2 = 'code';
        $value2 = $code_msg;

        $query = $this->enquiries->get_double_where_custom($col1, $value1, $col2, $value2);
        foreach ($query->result() as $row) {
        	$data['id'] = $row->id;
            $data['subject'] = $row->subject;
            $data['message'] = nl2br($row->message);
            $data['sent_to'] = $row->sent_to;
            $data['sent_by'] = $row->sent_by;
            $date_created = $row->date_created;
            $data['opened'] = $row->opened;
            $data['code'] = $row->code;
        }

        $data['date_created'] = $this->timedate->get_nice_date($date_created, 'full');

        $this->enquiries->_set_to_opened($data['id']);

        $data['module'] = 'yourmessages';
        $data['view_file'] = 'view';
        $this->load->module('templetes');
        $this->templetes->public_bootstrap($data);
    }

}