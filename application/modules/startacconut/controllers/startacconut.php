<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Startacconut extends MX_Controller
{

	function __construct() {
	parent::__construct();
        $this->load->library('form_validation');
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