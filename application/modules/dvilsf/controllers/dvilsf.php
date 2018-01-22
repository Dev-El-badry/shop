<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Dvilsf extends MY_Backend
{

	function __construct() {
		parent::__construct();
		$this->load->library('form_validation');
        $this->form_validation->CI =& $this;
	}

    function logout() {
        $this->session->unset_userdata('useradmin_id');
        $this->session->unset_userdata('is_admin');
       
        redirect(base_url().'dvilsf/login');
    }


	function login() {
        $is_admin = $this->session->userdata('is_admin');
        if($is_admin == TRUE) {
            redirect(base_url().'dashboard/home');
        }

        $data['module'] = "startacconut";
        $data['view_file'] = "draw_login";
        $this->load->module('templetes');
        $this->templetes->public_bootstrap($data);
    }

    function draw_login_form() {

 		$data['module'] = "startacconut";
	    $data['view_file'] = "draw_login";
	    $this->load->module('templetes');
	    $this->templetes->public_bootstrap($data);
	}

	function submit_login() {
	    $this->load->module('store_users');
        $submit = $this->input->post('submit', TRUE);
        $error_msg = "You Did not enter correct username or/and password";
        if($submit == 'submit') {
           // var_dump($_POST);die;
        	$username = $this->input->post('username', true);
            $this->load->library('form_validation');
            $this->form_validation->set_rules('username', 'Username', 'required|max_length[60]');
            $this->form_validation->set_rules('pword', 'Password', 'required|trim');
           
            if($this->form_validation->run($this) == TRUE) {
                 
                $res = $this->username_check($username);
                 if($res == FALSE) {
                    $error_msg = 'Your Username Or Password Are Not Correct';
                    $this->session->set_flashdata('item', $error_msg);
                    redirect(base_url().'dvilsf/draw_login_form');
                } else {
                    $col1 = 'username';
                    $value1 = $username;
                    $col2 = 'email';
                    $value2 = $username;
                    $query = $this->store_users->get_double_where_custom($col1, $value1, $col2, $value2);
                    $num_rows = $query->num_rows();

                    if($num_rows <1) {
                        $user_id = '';
                    }

                    foreach ($query->result() as $row) {
                        $user_id = $row->id;
                    }
                    $data['last_login'] = time();
                    $this->store_users->_update($user_id, $data);

                   

                    $this->_in_you_go($user_id);
                }
               
            } else {
                echo validation_errors();
            }

        } else {
            redirect(base_url());
        }
    }

   function username_check($str)
    {
        $this->load->module('store_users');
        $this->load->module('site_secuirty');

        $error_msg = 'Your Username Or Password Are Not Correct';

        $col1 = 'username';
        $value1 = $str;
        $col2 = 'email';
        $value2 = $str;
        $query = $this->store_users->get_double_where_custom($col1, $value1, $col2, $value2);
        $num_rows = $query->num_rows();


        if($num_rows <1) {

            //echo $error_msg;
            return 0;
        }

        foreach ($query->result() as $row) {
            $pword_on_table = $row->pword;
        }

        $pword = $this->input->post('pword', TRUE);
        $result = $this->site_secuirty->verfiy_password_hashed($pword, $pword_on_table);

       
        if($result == true) {
            return TRUE;
        } else {
            //echo $error_msg;
            return 0;
        }

    }

    function _in_you_go($user_id) {
        //varable saved in session
        $this->session->set_userdata('useradmin_id', $user_id);
        $this->session->set_userdata('is_admin', 1);
        //attempt to update data in store basket to save data in session to shopping_id
        
        redirect(base_url().'dashboard/home');

    }

}