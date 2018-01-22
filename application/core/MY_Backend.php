<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');

class MY_Backend extends MX_Controller {

    /***
     * pages of site in menu
     */

    function __construct() {
        parent::__construct();
        $this->load_lang();
    }

    /**
     * return module language file
     */
    protected function load_lang() {

        if ($this->uri->segment(1) == 'en' ||
            $this->uri->segment(1) == 'ar'
        ) {
            $this->session->set_userdata("lang", $this->uri->segment(1));
            redirect($this->session->flashdata('redirectToCurrent'));
        }

        if ($this->session->userdata('lang') == "en") {
            $lang = "english";
            $this->config->set_item('language',$lang);
            $this->session->set_userdata("lang",'en');
        } elseif ($this->session->userdata('lang') == "ar") {
            $lang = "arabic";
            $this->config->set_item('language',$lang);
            $this->session->set_userdata("lang",'ar');
        }

        //  $this->lang->load($moduleName, $lang);
    }
}