<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Store_orders extends MY_Backend
{

	function __construct() {
	parent::__construct();
	$this->lang->load('admin/store_orders');
	}

	function update_shipping() {
		$this->load->module('site_secuirty');
		$this->site_secuirty->_make_sure_is_admin();
		
		$shipper_id = $this->input->post('shipper_id');
		$update_id = $this->input->post('update_id');
		$data['shipper_id'] = $shipper_id;
		$this->_update($update_id, $data);

		//send notify to customer when update status
		//$this->_send_notify_to_shipper($update_id);

		$target_url = base_url() . 'store_orders/view/'.$update_id;
		$value = '<div class="alert alert-success" role="alert">'.$this->lang->line('alert_update_delivery').'</div>';
        $this->session->set_flashdata('item', $value);
		redirect($target_url);
	}

	// function _send_notify_to_shipper($update_id) {
 //    	//NOTE: Notifies Customer When Order Has Been Updated
 //    	$this->load->module('site_secuirty');
 //    	$this->load->module('enquiries');
 //    	$this->load->module('store_shippers');
        

 //    	$query = $this->get_where($update_id);
	// 	foreach ($query->result() as $row) {
	// 		$order_ref = $row->order_ref;
	// 		$order_status = $row->order_status;
	// 		$shipper_id = $row->shipper_id;
	// 	}


	// 	//Get Status Title
	// 	$status_title = $this->store_order_status->_get_status_title($order_status);

	// 	//Buil Message For The Customer
	// 	$msg = 'Order '.$order_ref.' Has Been Jsut Submitted For Shi';
	// 	$msg .= 'The New Status For Your Order Is'. $status_title.'.';

	// 	//Send The Message
	// 	$data['date_created'] = time();
 //        $data['sent_by'] = 0; //Admin
 //        $data['opened'] = 0;
 //        $data['subject'] = 'Order Status Has Been Updated';
 //        $data['message'] = $msg;
 //        $data['sent_to'] = $shipper_id;
 //        $data['code'] = $this->site_secuirty->RandomString(6);
 //        $this->enquiries->_insert($data);
 //    }

	function _set_to_opened($update_id) {
       
        if(is_numeric($update_id)) {
            $data['opened'] = 1;
            $this->_update($update_id, $data); 
        }
        
    }

    function _get_options_shipppers() {
    	$this->load->module('store_shippers');
    	$query = $this->store_shippers->get('id');
    	$options[''] = $this->lang->line('select_delivery');
    	foreach ($query->result() as $row) {
    		$options[$row->id] = $this->store_shippers->_get_customer_name($row->id);
    	}

    	return $options;
    }



    function _send_notify_update($update_id) {
    	//NOTE: Notifies Customer When Order Has Been Updated
    	$this->load->module('site_secuirty');
    	$this->load->module('enquiries');
    	$this->load->module('store_order_status');
        

    	$query = $this->get_where($update_id);
		foreach ($query->result() as $row) {
			$order_ref = $row->order_ref;
			$order_status = $row->order_status;
			$shopper_id = $row->shopper_id;
		}


		//Get Status Title
		$status_title = $this->store_order_status->_get_status_title($order_status);

		//Buil Message For The Customer
		$msg = 'Order '.$order_ref.' Has Been Jsut Updated';
		$msg .= 'The New Status For Your Order Is'. $status_title.'.';

		//Send The Message
		$data['date_created'] = time();
        $data['sent_by'] = 0; //Admin
        $data['opened'] = 0;
        $data['subject'] = $this->lang->line('subject');
        $data['message'] = $msg;
        $data['sent_to'] = $shopper_id;
        $data['code'] = $this->site_secuirty->RandomString(6);
        $this->enquiries->_insert($data);
    }


	function update_order_status() {
		$this->load->module('site_secuirty');
		$this->site_secuirty->_make_sure_is_admin();

		$submit = $this->input->post('submit');
		$order_status = $this->input->post('order_status');

		if($submit == "Cancel") {
			$target_url = base_url() . 'store_orders/browes/status'.$order_status;
			redirect($target_url);
		} elseif($submit == "Submit") {
			$update_id = $this->input->post('update_id');
			$data['order_status'] = $order_status;
			$this->_update($update_id, $data);

			//send notify to customer when update status
			$this->_send_notify_update($update_id);

			$target_url = base_url() . 'store_orders/view/'.$update_id;
			$value = '<div class="alert alert-success" role="alert">'.$this->lang->line('update_order_status').'</div>';
            $this->session->set_flashdata('item', $value);
			redirect($target_url);
		}
		return 0;
	}

	function view() {
		$this->load->module('site_secuirty');
		$this->site_secuirty->_make_sure_is_admin();
		$this->load->module('timedate');
		$this->load->module('cart');
		$this->load->module('store_order_status');
		$this->load->module('store_accounts');
		$this->load->module('store_shippers');

		$update_id = $this->uri->segment(3);
		$this->_set_to_opened($update_id);
		$query = $this->get_where($update_id);
		foreach ($query->result() as $row) {
			$data['id'] = $row->id;
			$data['order_ref'] = $row->order_ref;
			$data_created = $row->date_created;
			$data['payment_type'] = $row->payment_type;	
			$data['order_status'] = $row->order_status;
			$data['shopper_id'] = $row->shopper_id;
			$data['shipper_id'] = $row->shipper_id;
		}

		$table = 'store_shoppertrack';
		$session_id = 0;
		$data['query_ss'] = $this->cart->_fetch_cart_contents($session_id, $data['shopper_id'], $table);
		$data['options_shippers'] = $this->_get_options_shipppers();
		$data['options'] = $this->store_order_status->_get_options();
		$data['date_created'] = $this->timedate->get_nice_date($data_created, 'full');
		$data['status_title'] = $this->store_order_status->_get_status_title($data['order_status']);
		$data['customer_address'] = $this->store_accounts->_get_shopper_address($data['shopper_id'], '<br>');
		$data['shipper_address'] = $this->store_shippers->_get_shopper_address($data['shopper_id'], '<br>');

		$data['account_details'] = $this->store_accounts->get_data_from_db($data['shopper_id']);
		$data['shipping_details'] = $this->store_shippers->get_data_from_db($data['shipper_id']);
		
		$data['flash'] = $this->session->flashdata('item');
		$data['module'] = 'store_orders';
		$data['view_file'] = 'view';
		$data['update_id'] = $update_id;
		$data['head_line'] = $this->lang->line('customer_details');

		$this->load->module('templetes');
		$this->templetes->admin($data);
	}

	function get_double_where_custom($col1, $value1,$col2, $value2) {
        $this->load->model('mdl_store_orders');
        $query = $this->mdl_store_orders->get_double_where_custom($col1, $value1,$col2, $value2);
        return $query;
    }


	function _get_status_title($thrid_bit) {
		$order_status = str_replace('status', '', $thrid_bit);

		if($order_status<1) {
			$status_title = $this->lang->line('order_submitted');
		} else {
			$this->load->module('store_order_status');
			$status_title = $this->store_order_status->_get_status_title($order_status);
		}
		return $status_title;
	}

	function browes() {
		$this->load->module('site_secuirty');
		$this->site_secuirty->_make_sure_is_admin();

		$this->load->module('timedate');
		$thrid_bit = $this->uri->segment(3);

		$data['status_title'] = $this->_get_status_title($thrid_bit);
		$data['query'] = $this->_generate_mysql_query();
		$data['num_rows'] = $data['query']->num_rows();
		$data['flash'] = $this->session->flashdata('item');
		$data['module'] = 'store_orders';
		$data['view_file'] = 'browes';

		$this->load->module('templetes');
		$this->templetes->admin($data);
	}

	function _generate_mysql_query() {

		$thrid_bit = $this->uri->segment(3);
		$order_status = str_replace('status', '', $thrid_bit);

		if(!is_numeric($order_status)) {
			$order_status = 0;
		}

		if($order_status>0) {
			$sql_query = "

			SELECT
			store_orders.id,
			store_orders.order_ref,
			store_orders.date_created,
			store_orders.mc_gross,
			store_orders.opened,
			store_orders.order_status,
			store_order_status.status_title,
			store_accounts.fistname,
			store_accounts.lastname,
			store_accounts.company
			FROM
			store_orders
			INNER JOIN store_order_status ON store_orders.order_status = store_order_status.id
			INNER JOIN store_accounts ON store_orders.shopper_id = store_accounts.id
			WHERE store_orders.order_status=$order_status order by store_orders.date_created desc

			";
		} else {
			$sql_query = "

			SELECT
			store_orders.id,
			store_orders.order_ref,
			store_orders.date_created,
			store_orders.mc_gross,
			store_orders.opened,
			store_orders.order_status,
			store_accounts.fistname,
			store_accounts.lastname,
			store_accounts.company
			FROM
			store_accounts
			INNER JOIN store_orders ON store_orders.shopper_id = store_accounts.id
			WHERE store_orders.order_status=$order_status order by store_orders.date_created desc
			
			
			";
		}
		$query=$this->_custom_query($sql_query);
		return $query;
	}

	function _left_nav_link() {

		$sql_query = "select * from store_order_status";
		$data['query_lnl'] = $this->_custom_query($sql_query);

		$this->load->view('left_nav_link', $data);
	}


	function _get_ms_gross($payment_type, $payment_id ){
		if($payment_type == 'paypal') {
			$sql_query = "select * from paypal where id=$payment_id";
			$query = $this->_custom_query($sql_query);
			foreach ($query->result() as $row) {
				$posted_information = $row->posted_information;
			}

			$posted_information = unserialize($posted_information);
			$mc_gross = $posted_information['mc_gross'];

			if(!isset($mc_gross)) {
				$mc_gross = 0;
			}

			return $mc_gross;
		} elseif($payment_type == 'cash') {
			$sql_query = "select * from cash where id=$payment_id";
			$query = $this->_custom_query($sql_query);
			foreach ($query->result() as $row) {
				$mc_gross = $row->total_cash;
			}

			if(!isset($mc_gross)) {
				$mc_gross =0;
			}

			return $mc_gross;
		}
		return 0;
	}

	function _get_shopper_id($session_id_custom) {
		$sql_query = "select * from store_shoppertrack where session_id='$session_id_custom'";
		$query = $this->_custom_query($sql_query);
		foreach ($query->result() as $row) {
			$shopper_id = $row->shopper_id;
		}

		if(!is_numeric($shopper_id)) {
			$shopper_id =0;
		}

		return $shopper_id;
	}

	function _generate_auto_orders($payment_type, $payment_id, $session_id) {
		//Get data from ipn_listener from paypal or paymeny_type cash
		//Note: Payment_type : paypal, Cash
		$this->load->module('site_secuirty');
		
		$order_ref = $this->site_secuirty->RandomString(6);
		$data['order_ref'] = strtoupper($order_ref);
		$data['date_created'] = time();
		$data['payment_type'] = $payment_type;
		$data['payment_id'] = $payment_id;
		$data['session_id'] = $session_id;
		$data['mc_gross'] = $this->_get_ms_gross($payment_type, $payment_id);
		$data['shopper_id'] = $this->_get_shopper_id($session_id);

		$this->_insert($data);

		//transeform data from store_basket to store_shoppertrack
		$this->load->module('store_shoppertrack');
		$this->store_shoppertrack->_transform_from_basket($session_id);
	}

	function get($order_by) {
	$this->load->model('mdl_store_orders');
	$query = $this->mdl_store_orders->get($order_by);
	return $query;
	}

	function get_with_limit($limit, $offset, $order_by) {
	$this->load->model('mdl_store_orders');
	$query = $this->mdl_store_orders->get_with_limit($limit, $offset, $order_by);
	return $query;
	}

	function get_where($id) {
	$this->load->model('mdl_store_orders');
	$query = $this->mdl_store_orders->get_where($id);
	return $query;
	}

	function get_where_custom($col, $value) {
	$this->load->model('mdl_store_orders');
	$query = $this->mdl_store_orders->get_where_custom($col, $value);
	return $query;
	}

	function _insert($data) {
	$this->load->model('mdl_store_orders');
	$this->mdl_store_orders->_insert($data);
	}

	function _update($id, $data) {
	$this->load->model('mdl_store_orders');
	$this->mdl_store_orders->_update($id, $data);
	}

	function _delete($id) {
	$this->load->model('mdl_store_orders');
	$this->mdl_store_orders->_delete($id);
	}

	function count_where($column, $value) {
	$this->load->model('mdl_store_orders');
	$count = $this->mdl_store_orders->count_where($column, $value);
	return $count;
	}

	function get_max() {
	$this->load->model('mdl_store_orders');
	$max_id = $this->mdl_store_orders->get_max();
	return $max_id;
	}

	function _custom_query($mysql_query) {
	$this->load->model('mdl_store_orders');
	$query = $this->mdl_store_orders->_custom_query($mysql_query);
	return $query;
	}

}