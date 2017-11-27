<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Startacconut extends MX_Controller
{

	function __construct() {
	    parent::__construct();
        $this->load->library('form_validation');

        $this->form_validation->CI =& $this;
	}

    function messagesent() {
        $data['head_line'] = "Message Sent!";
        $data['module'] = "startacconut";
        $data['view_file'] = "messagesent";
        $this->load->module('templetes');
        $this->templetes->public_bootstrap($data);
    }


	function logout() {
	    $this->session->unset_userdata('user_id');
	    $this->load->module('site_cookie');
	    $this->site_cookie->destroy_cookie();
	    redirect(base_url().'startacconut/draw_login_form');
    }

	function welcome() {
	    $this->load->module('site_secuirty');
	    $this->site_secuirty->_make_sure_logged_in();
        $data['customer_id'] = $this->site_secuirty->_get_user_id();

        $data['module'] = "startacconut";
        $data['view_file'] = "welcome";
        $this->load->module('templetes');
        $this->templetes->public_bootstrap($data);
    }

	function test() {
        if (password_verify('eslam', '$2y$12$T0JlsFRMxnBuKY/Qy6TN2e2u1UyiBlC4z6djmmfl9be76z1mqv4JG')) {
            echo 'yes';
        } else {
            echo 'error';
        }
    }

    function test2() {
	    $str = 'eslam';
        $hased_string = password_hash($str, PASSWORD_BCRYPT, array('cost'=>12));
        echo $str;
        echo '<br>';
        echo $hased_string;
    }


	function submit_login() {



	    $this->load->module('store_accounts');
        $submit = $this->input->post('submit', TRUE);

        if($submit == 'submit') {

            $username = $this->input->post('username', TRUE);
            $this->load->library('form_validation');
            $this->form_validation->set_rules('username', 'Email address / Username', 'required|max_length[60]');
            $this->form_validation->set_rules('pword', 'Password', 'required|trim');
            $error_msg = '';
            if($this->form_validation->run() == TRUE) {
                 $re = $this->username_check($username);
                //echo $re; die;

                if($re == FALSE) {
                    $error_msg = 'Your Username Or Password Are Not Correct';
                    $this->session->set_flashdata('item', $error_msg);
                    redirect(base_url().'startacconut/draw_login_form');
                } else {
                    $col1 = 'username';
                    $value1 = $username;
                    $col2 = 'email';
                    $value2 = $username;
                    $query = $this->store_accounts->get_double_where_custom($col1, $value1, $col2, $value2);
                    $num_rows = $query->num_rows();

                    if($num_rows <1) {
                        $user_id = '';
                    }

                    foreach ($query->result() as $row) {
                        $user_id = $row->id;
                    }
                    $data['last_login'] = time();
                    $this->store_accounts->_update($user_id, $data);

                    $remember = $this->input->post('remember', TRUE);
                    if($remember == 'remember-me') {
                        $long_type = "long_term";
                    } else {
                        $long_type = "short_term";
                    }

                    $this->_in_you_go($user_id, $long_type);
                }


            } else {
                echo validation_errors();
            }

        } else {
            redirect(base_url());
        }
    }

    function _in_you_go($user_id, $long_type) {
        //NOTE: Long Type Will Return: long_term or short_term
        if($long_type == "long_term") {
            //varable saved in cookie file
            $this->load->module('site_cookie');
            $this->site_cookie->set_cookie($user_id);
            redirect(base_url().'startacconut/welcome');
        } else {
            //varable saved in session
            $this->session->set_userdata('user_id', $user_id);
            //attempt to update data in store basket to save data in session to shopping_id
            $this->_attampt_cart_divert($user_id);
            redirect(base_url().'startacconut/welcome');
            
        }

        



    }

    function _attampt_cart_divert($user_id) {

        $this->load->module('store_basket');
        $session_id = $this->session->session_id;
        $col1 = 'session_id';
        $value1 = $this->session->session_id;
        $col2 = 'shopper_id';
        $value2 = 0;

        $query = $this->store_basket->get_double_where_custom($col1, $value1, $col2, $value2);
        $num_rows = $query->num_rows();
        if($num_rows >0) {
            $sql_query = "update store_basket set shopper_id = $user_id where session_id = '$session_id'";
            $this->store_basket->_custom_query($sql_query);
            redirect(base_url().'cart');
        }
    }

    function username_check($str)
    {
        $this->load->module('store_accounts');
        $this->load->module('site_secuirty');

        $error_msg = 'Your Username Or Password Are Not Correct';

        $col1 = 'username';
        $value1 = $str;
        $col2 = 'email';
        $value2 = $str;
        $query = $this->store_accounts->get_double_where_custom($col1, $value1, $col2, $value2);
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

	function draw_login_form() {

	    $data['module'] = "startacconut";
	    $data['view_file'] = "draw_login";
	    $this->load->module('templetes');
	    $this->templetes->public_bootstrap($data);
    }

	function submit() {
	   $submit = $this->input->post('submit');
	   if($submit == 'submit') {
           $data = $this->_get_data_from_db();


           $this->form_validation->set_rules('username', 'Username', 'required|min_length[4]|max_length[60]|is_unique[store_accounts.username]');
           $this->form_validation->set_rules('email', 'E-mail', 'required|valid_email');
           $this->form_validation->set_rules('pword', 'Password', 'required|trim');
           $this->form_validation->set_rules('re_pword', 'E-mail', 'required|matches[pword]');

           if($this->form_validation->run() == TRUE) {

               $this->_proccess_store_account($data);
               echo 'Susscessfully Register';
               echo 'Sign In';
           } else {
            $this->start();
           }
       } elseif($submit == 'cancel') {
           redirect(base_url());
       }

    }

    function _proccess_store_account($data) {
	    $this->load->module('store_accounts');
	    $this->load->module('site_secuirty');
        unset($data['re_pword']);

        $pword = $data['pword'];
        $data['pword'] = $this->site_secuirty->pword_hashed($pword);
        //$data['date_mode'] = now();
        $this->store_accounts->_insert($data);
    }

    function start() {
	    $data = $this->_get_data_from_db();

        $data['module'] = 'startacconut';
        $data['view_file'] = 'registerAccount';
	    $this->load->module('templetes');
	    $this->templetes->public_bootstrap($data);
    }

    function _get_data_from_db() {
	    $data['username'] = $this->input->post('username', true);
        $data['email'] = $this->input->post('email', true);
        $data['pword'] = $this->input->post('pword', true);
        $data['re_pword'] = $this->input->post('re_pword', true);

        return $data;
    }

}