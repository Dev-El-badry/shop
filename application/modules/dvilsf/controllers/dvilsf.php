<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Dvilsf extends MX_Controller
{

	function __construct() {
		parent::__construct();
		$this->load->library('form_validation');
        $this->form_validation->CI =& $this;
	}

	function login() {
 		$data['module'] = "startacconut";
	    $data['view_file'] = "draw_login";
	    $this->load->module('templetes');
	    $this->templetes->public_bootstrap($data);
	}

	function submit_login() {
	    $this->load->module('store_accounts');
        $submit = $this->input->post('submit', TRUE);
$error_msg = "You Did not enter correct username or/and password";
        if($submit == 'submit') {
        	$username = $this->input->post('username', true);
            $this->load->library('form_validation');
            $this->form_validation->set_rules('username', 'Username', 'required|max_length[60]');
            $this->form_validation->set_rules('pword', 'Password', 'required|trim');
           
            if($this->form_validation->run($this) == TRUE) {
                 
                $res = $this->username_check($username);
                if($res == TRUE) {
                	$this->in_you_go();
                } else {
                	
                	$this->session->set_flashdata('item', $error_msg);
                    redirect(base_url().'dvilsf/login');
                }

            } else {
                echo validation_errors();
            }

        } else {
            redirect(base_url());
        }
    }

    function username_check($str) {
    	$this->load->module('site_secuirty');
    	
    	$pword = $this->input->post('pword', true);
    	$result = $this->site_secuirty->_check_admin_login_admin_details($str, $pword);
    	
    	if($result == TRUE) {
    		return TRUE;
    	} else {
    		
    		return FALSE;
    	}
    }

    function in_you_go() {
    	$this->session->set_userdata('is_admin', '1');
    	redirect(base_url().'dashboard/home');
    }

}