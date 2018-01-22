<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Web_pages extends MY_Backend
{

	function __construct() {
	parent::__construct();
    $this->lang->load('admin/cms');
	}


    public function _delete_process($id_item) {

        // delete Webpage record from Webpages
        $this->_delete($id_item);
    }

    public function delete($update_id) {
        if(!isset($update_id)) {
            redirect('site_secuirty/not_allowed');
        }

        $this->load->module('site_secuirty');
        $this->site_secuirty->_make_sure_is_admin();
        $submit = $this->input->post('submit');


        if($submit == "Cancel") {

            redirect(base_url().'web_pages/manage');
        } elseif ($submit == $this->lang->line('submit_del')) {
            $item_id = $this->input->post('update_id');
            // Delete Item
            if($item_id > 2)  {
                $this->_delete_process($update_id);
            }


            $value = '<div class="alert alert-danger" role="alert">'.$this->lang->line('alert_del').'</div>';
            $this->session->set_flashdata('item', $value);


            redirect('web_pages/manage');
        }

    }

    public function deleteconif($update_id) {
        $this->load->module('site_secuirty');
        $this->site_secuirty->_make_sure_is_admin();
        $submit = $this->input->post('submit');


        if(!isset($update_id)) {
            redirect('site_secuirty/not_allowed');
        }

        $data['update_id'] = $update_id;
        $data['head_line'] = $this->lang->line('head_line_del');
        $data['flash'] = $this->session->flashdata('item');
        $data['module'] = 'web_pages';
        $data['view_file'] = 'deleteconif';

        $this->load->module('templetes');
        $this->templetes->admin($data);
    }

    function create() {
        $this->load->module('site_secuirty');
        $this->site_secuirty->_make_sure_is_admin();
        $this->load->library('session');
        //ini_set('memory_limit', '-1');


        $update_id = $this->uri->segment(3);
        $submit = $this->input->post('submit');


        if ($submit == "Submit") {

            //Process The Form
            $this->load->library('form_validation');
            $this->form_validation->set_rules('page_title', $this->lang->line('page_title'), 'required|max_length[240]');
            $this->form_validation->set_rules('page_content', $this->lang->line('page_content'), 'required');

            if ($this->form_validation->run() == TRUE) {
                $data = $this->get_post_data();
                $data['page_url'] = url_title($data['page_title']);
                $update_id = $this->input->post('update_id', TRUE);
                if (is_numeric($update_id)) {
                        if($update_id < 3)  {
                            unset($data['page_url']);
                        }
                    //update data
                    $this->_update($update_id, $data);
                    $value = '<div class="alert alert-success" role="alert">'.$this->lang->line('alert_update').'</div>';
                    $this->session->set_flashdata('item', $value);
                    redirect(base_url().'web_pages/create/'.$update_id);
                } else {

                    //insert data

                    $this->_insert($data);

                    $update_id = $this->get_max();
                    $value = '<div class="alert alert-success" role="alert">'.$this->lang->line('alert_insert').'</div>';
                    $this->session->set_flashdata('item', $value);
                    redirect(base_url().'web_pages/create/'.$update_id);
                }
            }


        } elseif ($submit == "Cancel") {
            redirect(base_url().'web_pages/manage');
        }


        if((is_numeric($update_id)) && ($submit!="Submit")) {
            $data = $this->get_data_from_db($update_id);
            $data['update_id'] = $update_id;

        } else {
            $data = $this->get_post_data();

        }

        if(! is_numeric($update_id)) {
            $data['head_line'] = $this->lang->line('add_new_page');
        } else {
            $data['head_line'] = $this->lang->line('update_page');
        }

        $data['flash'] = $this->session->flashdata('item');
        $data['module'] = 'web_pages';
        $data['view_file'] = 'create';

        $this->load->module('templetes');
        $this->templetes->admin($data);
    }

    function get_post_data() {
        $data['page_title'] = $this->input->post('page_title', TRUE);

        $data['page_description'] = $this->input->post('page_description', TRUE);
        $data['page_content'] = $this->input->post('page_content', TRUE);
        $data['page_keywords'] = $this->input->post('page_keywords', TRUE);

        return $data;
    }

    function get_data_from_db($update_id) {
        $query = $this->get_where($update_id);

        foreach ($query->result() as $row) {
            $data['id'] = $row->id;
            $data['page_title'] = $row->page_title;
            $data['page_url'] = $row->page_url;

            $data['page_description'] = $row->page_description;
            $data['page_content'] = $row->page_content;
            $data['page_keywords'] = $row->page_keywords;
        }

        return $data;
    }

    function manage() {
        $this->load->module('site_secuirty');
        $this->site_secuirty->_make_sure_is_admin();

        $data['flash'] = $this->session->flashdata('item');
        $data['items'] = $this->get('page_title');
        $data['module'] = 'web_pages';
        $data['view_file'] = 'manage';

        $this->load->module('templetes');
        $this->templetes->admin($data);

        //echo Modules::run('templetes/admin', $data);
    }

	function get($order_by) {
	$this->load->model('mdl_web_pages');
	$query = $this->mdl_web_pages->get($order_by);
	return $query;
	}

	function get_with_limit($limit, $offset, $order_by) {
	$this->load->model('mdl_web_pages');
	$query = $this->mdl_web_pages->get_with_limit($limit, $offset, $order_by);
	return $query;
	}

	function get_where($id) {
	$this->load->model('mdl_web_pages');
	$query = $this->mdl_web_pages->get_where($id);
	return $query;
	}

	function get_where_custom($col, $value) {
	$this->load->model('mdl_web_pages');
	$query = $this->mdl_web_pages->get_where_custom($col, $value);
	return $query;
	}

	function _insert($data) {
	$this->load->model('mdl_web_pages');
	$this->mdl_web_pages->_insert($data);
	}

	function _update($id, $data) {
	$this->load->model('mdl_web_pages');
	$this->mdl_web_pages->_update($id, $data);
	}

	function _delete($id) {
	$this->load->model('mdl_web_pages');
	$this->mdl_web_pages->_delete($id);
	}

	function count_where($column, $value) {
	$this->load->model('mdl_web_pages');
	$count = $this->mdl_web_pages->count_where($column, $value);
	return $count;
	}

	function get_max() {
	$this->load->model('mdl_web_pages');
	$max_id = $this->mdl_web_pages->get_max();
	return $max_id;
	}

	function _custom_query($mysql_query) {
	$this->load->model('mdl_web_pages');
	$query = $this->mdl_web_pages->_custom_query($mysql_query);
	return $query;
	}

}