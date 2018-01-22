<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Default_module extends MY_Backend
{

	function __construct() {
	parent::__construct();
	}

	function index() {
	    $first_bit = trim($this->uri->segment(1));
	    $this->load->module('web_pages');
	    $query = $this->web_pages->get_where_custom('page_url', $first_bit);
	    $num_rows = $query->num_rows();
	    if($num_rows > 0) {
	        foreach ($query->result() as $row) {
                $data['page_title'] = $row->page_title;
                $data['page_url'] = $row->page_url;

                $data['page_description'] = $row->page_description;
                $data['page_content'] = $row->page_content;
                $data['page_keywords'] = $row->page_keywords;
            }
        } else {
	        $this->load->module('site_settings');
	        $data['page_content'] = $this->site_settings->_get_error_found_page();
        }

        $this->load->module('templetes');
        $this->templetes->public_bootstrap($data);
    } //end of index



}