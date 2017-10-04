<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Templetes extends MX_Controller
{

	function __construct() {
	parent::__construct();
	}

	public function _draw_bread_crumbs($data) {
	    //Note: Function To Work, Must Data Contain;
        //$templete, $subcategory, $item_title

        if($data['template'] != 'public_bootstrap') {
            return false;
        }
        $this->load->view('draw_bread_crumbs', $data);
    }

	public function test() {
		$data = '';
		$this->admin();
	}

	public function public_bootstrap($data) {
		$this->load->view('public_bootstrap', $data);
	}

	public function jq_mobile() {
		$this->load->view('jq_mobile');
	}

	public function admin($data) {
		$this->load->view('admin', $data);
	}

}