<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Slider extends MY_Backend
{
	function __construct() {
		parent::__construct();
		$this->load->library('form_validation');
		$this->lang->load('admin/slider');
	}

	function _get_title($parent_id) {
		$data = $this->get_data_from_db($parent_id);
		$slider_title = $data['slider_title'];
		return $slider_title;
	}

	function _delete_process($update_id) {
		$this->load->module('slides');
		
		$data = $this->slides->get_where_custom('parent_id', $update_id);
		
		foreach ($data->result() as $row) {
			$picture = $row->picture;
			$picture = './slider_pics/'.$picture;

			if (file_exists($picture)) {

				unlink($picture);
			}
			$this->slides->_delete($row->id);
		}
		

	    $this->_delete($update_id);
    }

	function delete($update_id) {
		if(!isset($update_id)) {
			redirect('site_secuirty/not_allowed');
		}

		$this->load->module('site_secuirty');
        $this->site_secuirty->_make_sure_is_admin();
        $submit = $this->input->post('submit');


		if($submit == "Cancel") {

			redirect(base_url().'slider/manage');
		} elseif ($submit == $this->lang->line('del_slider')) {

			//$item_id = $this->input->post('update_id');
			
			// Delete Item
			$this->_delete_process($update_id);

			$value = '<div class="alert alert-danger" role="alert">'.$this->lang->line('alert_del').'</div>';
			$this->session->set_flashdata('item', $value);


			redirect('slider/manage');
		}

	}

	function deleteconif($update_id) {
		$this->load->module('site_secuirty');
		$this->site_secuirty->_make_sure_is_admin();
		$submit = $this->input->post('submit');


		if(!isset($update_id)) {
			redirect('site_secuirty/not_allowed');
		}

		$data['update_id'] = $update_id;
		$data['head_line'] = $this->lang->line('head_line_slider');
		$data['flash'] = $this->session->flashdata('item');
		$data['module'] = 'slider';
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
			$this->form_validation->set_rules('slider_title', $this->lang->line('block_title'), 'required|max_length[240]');


			if ($this->form_validation->run() == TRUE) {
				$data = $this->get_post_data();

				$update_id = $this->input->post('update_id', TRUE);
				if (is_numeric($update_id)) {

					//update data
					$this->_update($update_id, $data);
					$value = '<div class="alert alert-success" role="alert">'.$this->lang->line('alert_update').'</div>';
					$this->session->set_flashdata('item', $value);
					redirect(base_url().'slider/create/'.$update_id);
				} else {

					//insert data
					//$data['date_mode'] = time();
                    //var_dump($data); die();
					$this->_insert($data);

					$update_id = $this->get_max();
					$value = '<div class="alert alert-success" role="alert">'.$this->lang->line('alert_update').'</div>';
					$this->session->set_flashdata('item', $value);
					redirect(base_url().'slider/create/'.$update_id);
				}
			}


		} elseif ($submit == "Cancel") {
			redirect(base_url().'slider/manage');
		}


		if((is_numeric($update_id)) && ($submit!="Submit")) {
			$data = $this->get_data_from_db($update_id);
			$data['update_id'] = $update_id;

		} else {
			$data = $this->get_post_data();

		}

		if(! is_numeric($update_id)) {
			$data['head_line'] = $this->lang->line('head_line_add');
		} else {
			$data['head_line'] = $this->lang->line('head_line_update');
		}

		$data['flash'] = $this->session->flashdata('item');
		$data['module'] = 'slider';
		$data['view_file'] = 'create';

		$this->load->module('templetes');
		$this->templetes->admin($data);
	}

	function get_post_data() {
		$data['slider_title'] = $this->input->post('slider_title', TRUE);
		$data['target_url'] = $this->input->post('target_url', TRUE);
		return $data;
	}

	function get_data_from_db($update_id) {
		$query = $this->get_where($update_id);

		foreach ($query->result() as $row) {
			$data['id'] = $row->id;
			$data['slider_title'] = $row->slider_title;
			$data['target_url'] = $row->target_url;

		}

		return $data;
	}

	function manage() {
        $this->load->module('site_secuirty');
        $this->site_secuirty->_make_sure_is_admin();

        $data['flash'] = $this->session->flashdata('item');
        $data['items'] = $this->get('id');
        $data['num_rows'] = $data['items']->num_rows();
        $data['module'] = 'slider';
        $data['view_file'] = 'manage';

        $this->load->module('templetes');
        $this->templetes->admin($data);

        //echo Modules::run('templetes/admin', $data);
    }

	function get($order_by) {
		$this->load->model('Mdl_slider');
		$query = $this->Mdl_slider->get($order_by);
		return $query;
	}

	function get_with_limit($limit, $offset, $order_by) {
		$this->load->model('Mdl_slider');
		$query = $this->Mdl_slider->get_with_limit($limit, $offset, $order_by);
		return $query;
	}

	function get_where($id) {
		$this->load->model('Mdl_slider');
		$query = $this->Mdl_slider->get_where($id);
		return $query;
	}

	function get_where_custom($col, $value) {
		$this->load->model('Mdl_slider');
		$query = $this->Mdl_slider->get_where_custom($col, $value);
		return $query;
	}

	function _insert($data) {
		$this->load->model('Mdl_slider');
		$this->Mdl_slider->_insert($data);
	}

	function _update($id, $data) {
		$this->load->model('Mdl_slider');
		$this->Mdl_slider->_update($id, $data);
	}

	function _delete($id) {
		$this->load->model('Mdl_slider');
		$this->Mdl_slider->_delete($id);
	}

	function count_where($column, $value) {
		$this->load->model('Mdl_slider');
		$count = $this->Mdl_slider->count_where($column, $value);
		return $count;
	}

	function get_max() {
		$this->load->model('Mdl_slider');
		$max_id = $this->Mdl_slider->get_max();
		return $max_id;
	}

	function _custom_query($mysql_query) {
		$this->load->model('Mdl_slider');
		$query = $this->Mdl_slider->_custom_query($mysql_query);
		return $query;
	}

	function item_check($str)
	{
		$url_item = url_title($str);
		$query_sql = "SELECT * FROM Sliders WHERE title_item='$str' AND url_item='$url_item'";
		$update_id = 13;

		if(is_numeric($update_id)) {
			$query_sql .= " AND id != '$update_id'";
		}

			

		$query = $this->_custom_query($query_sql);
		$num_rows = $query->num_rows();
		echo $num_rows;
		if ($num_rows > 0)
		{

			$this->form_validation->set_message('item_check', 'This Is Item Title Is Not Avaliable');
			return FALSE;
		}
		else
		{

			return TRUE;
		}
	}

}