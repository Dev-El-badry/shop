<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Templetes extends MY_Backend
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
		$this->load->module('site_secuirty');
		$data['customer_id'] = $this->site_secuirty->_get_user_id();
		$this->load->view('public_bootstrap', $data);
	}

	public function jq_mobile() {
		$this->load->view('jq_mobile');
	}

	public function admin($data) {
		$this->lang->load('admin/template');
		$useradmin = $this->session->userdata('useradmin_id');

		if(!is_numeric($useradmin)) {
			$useradmin = 0;
		}

		$this->load->module('store_users');
		$this->load->module('store_roles');


		$role_id = $this->store_users->_get_role($useradmin);
		

		$query = $this->store_roles->get_where_custom('id', $role_id);
		foreach ($query->result() as $row) {
			$data['show_items'] = $row->show_items;
			$data['show_orders'] = $row->show_orders;
			$data['show_order_status'] = $row->show_order_status;
			$data['show_sliders'] = $row->show_sliders;
			$data['show_home_blocks'] = $row->show_home_blocks;
			$data['show_webpages'] = $row->show_webpages;
			$data['show_btm_nav'] = $row->show_btm_nav;
			$data['show_blogs'] = $row->show_blogs;
			$data['show_accounts'] = $row->show_accounts;
			$data['show_delivers'] = $row->show_delivers;
			$data['show_sellers'] = $row->show_sellers;
			$data['show_users'] = $row->show_users;
			$data['show_categories'] = $row->show_categories;
			$data['show_enquiries'] = $row->show_enquiries;
			$data['show_right_access'] = $row->show_right_access;
		}

		$data['name_useradmin'] = $this->store_users->_get_first_last_name($useradmin);
		$picture = $this->store_users->_get_picture($useradmin);
		$data['function_useradmin'] = $this->store_users->_get_function($useradmin);
		$data['date_created_useradmin'] = $this->store_users->_get_date_created($useradmin);
		if($picture == '') {
			$data['picture_useradmin'] = 'avatar.jpg';
		} else {
			$data['picture_useradmin'] = $picture;
		}



		$this->load->view('admin', $data);
	}

}