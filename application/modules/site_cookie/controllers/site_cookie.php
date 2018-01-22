<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Site_cookie extends MY_Backend
{

	function __construct() {
	parent::__construct();
	}

	function test() {
	    echo anchor('site_cookie/test_set', 'Set The Cookie');
	    echo '<hr>';
	    echo anchor('site_cookie/test_destroy', 'Destroy The Cookie');

	    $user_id = $this->attempt_get_user_id();
	    if(is_numeric($user_id)) {
	        echo "<h1>Your are user $user_id </h1>";
        }
    }

    function test_set() {
	    $user_id = 88;
	    $this->set_cookie($user_id);
	    echo "The Cookie Has Now Been Set";

        echo anchor('site_cookie/test_destroy', 'Destroy The Cookie');
        echo '<hr>';
        echo anchor('site_cookie/test', 'Get The Cookie');
    }

    function test_destroy() {
        echo anchor('site_cookie/test_set', 'Set The Cookie');
        echo '<hr>';
        echo anchor('site_cookie/test', 'Get The Cookie');
        $this->load->module('site_settings');
        $cookie_name = $this->site_settings->_get_cookie();
        $this->set_cookie($cookie_name, '', time() - 3600);

        if(isset($_COOKIE[$cookie_name])) {
            $cookie_code = $cookie_name;
            $mysql_query = "delete from site_cookie where cookie_code = ?";
            $this->db->query($mysql_query, array($cookie_code));
        }
	}

    function set_cookie($user_id) {
	    $this->load->module('site_settings');
	    $this->load->module('site_secuirty');

	    $now_time = time();
	    $one_day = 86400;
	    $tow_week = $one_day * 14;
        $tow_week_ahead = $now_time + $tow_week;

        $data['cookie_code'] = $this->site_secuirty->RandomString(32);
        $data['user_id'] = $user_id;
        $data['expiry_date'] = $tow_week_ahead;
        $this->_insert($data);

        $cookie_name = $this->site_settings->_get_cookie();

        setcookie($cookie_name, $data['cookie_code'], $data['expiry_date']);
    }

    function attempt_get_user_id() {
        $this->load->module('site_settings');
        $cookie_name = $this->site_settings->_get_cookie();

        if(isset($_COOKIE[$cookie_name])) {
            $cookie_code = $_COOKIE[$cookie_name];
            $query = $this->get_where_custom('cookie_code', $cookie_code);
            $num_rows = $query->num_rows();
            if($num_rows<1) {
                $user_id = '';
            }

            foreach ($query->result() as $row) {
                $user_id = $row->user_id;
            }
        } else {
            $user_id = '';
        }

        return $user_id;
    }

    function destroy_cookie() {
        $this->load->module('site_settings');
        $cookie_name = $this->site_settings->_get_cookie();

        $sql_query = "delete from site_cookie where cookie_code = ?";
        $this->db->query($sql_query, array($_COOKIE[$cookie_name]));
        setcookie($cookie_name, '', time() - 3600);

    }

	function get($order_by) {
	$this->load->model('mdl_site_cookie');
	$query = $this->mdl_site_cookie->get($order_by);
	return $query;
	}

	function get_with_limit($limit, $offset, $order_by) {
	$this->load->model('mdl_site_cookie');
	$query = $this->mdl_site_cookie->get_with_limit($limit, $offset, $order_by);
	return $query;
	}

	function get_where($id) {
	$this->load->model('mdl_site_cookie');
	$query = $this->mdl_site_cookie->get_where($id);
	return $query;
	}

	function get_where_custom($col, $value) {
	$this->load->model('mdl_site_cookie');
	$query = $this->mdl_site_cookie->get_where_custom($col, $value);
	return $query;
	}

	function _insert($data) {
	$this->load->model('mdl_site_cookie');
	$this->mdl_site_cookie->_insert($data);
	}

	function _update($id, $data) {
	$this->load->model('mdl_site_cookie');
	$this->mdl_site_cookie->_update($id, $data);
	}

	function _delete($id) {
	$this->load->model('mdl_site_cookie');
	$this->mdl_site_cookie->_delete($id);
	}

	function count_where($column, $value) {
	$this->load->model('mdl_site_cookie');
	$count = $this->mdl_site_cookie->count_where($column, $value);
	return $count;
	}

	function get_max() {
	$this->load->model('mdl_site_cookie');
	$max_id = $this->mdl_site_cookie->get_max();
	return $max_id;
	}

	function _custom_query($mysql_query) {
	$this->load->model('mdl_site_cookie');
	$query = $this->mdl_site_cookie->_custom_query($mysql_query);
	return $query;
	}

}