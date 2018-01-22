<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Slides extends MY_Backend
{

	function __construct() {
	parent::__construct();
	$this->lang->load('admin/slider');
	}

	function _get_data_from_db($update_id) {
		$query = $this->get_where($update_id);

		foreach ($query->result() as $row) {
			$data['id'] = $row->id;
			$data['parent_id'] = $row->parent_id;
			$data['target_url'] = $row->target_url;
			$data['alt_text'] = $row->alt_text;
			$data['picture'] = $row->picture;

		}

		return $data;
	}

	public function delete($update_id) {
	if(!isset($update_id)) {
			redirect('site_secuirty/not_allowed');
		}

		$this->load->module('site_secuirty');
		$this->site_secuirty->_make_sure_is_admin();
		$submit = $this->input->post('submit');


		if($submit == "Cancel") {

			redirect(base_url().'slides/view/'.$update_id);
		} elseif ($submit == $this->lang->line('delete_slides')) {
			
			// Delete Slide
			$data = $this->_get_data_from_db($update_id);
			$parent_id = $data['parent_id'];
			$this->_delete_process($update_id);

			$value = '<div class="alert alert-danger" role="alert">'.$this->lang->line('alert_delete').'</div>';
			$this->session->set_flashdata('item', $value);
			

			redirect('slides/update_group/'.$parent_id);
		}

	}

	public function _delete_process($id_item) {
		
		// delete images of item
		
		
		$data = $this->_get_data_from_db($id_item);
		$picture = $data['picture'];
		

		$picture = './slider_pics/'.$picture;
		

		if (file_exists($picture)) {
			unlink($picture);
		}


		// delete item record from items_stores
		$this->_delete($id_item);
	}


	public function delete_image($update_id)
    {
		$this->load->module('site_secuirty');
		$this->site_secuirty->_make_sure_is_admin();

		if(!isset($update_id)) {
			redirect('site_secuirty/not_allowed');
		}

		$data = $this->_get_data_from_db($update_id);
		$picture = $data['picture'];
		

		$picture = './slider_pics/'.$picture;
		

		if (file_exists($picture)) {
			unlink($picture);
		}

		//update Date
		unset($data);
		$data['picture'] = "";
		$this->_update($update_id, $data);

		$value = '<div class="alert alert-danger" role="alert">'.$this->lang->line('alert_delete_slide').'</div>';
		$this->session->set_flashdata('item', $value);

		redirect('slides/view/'.$update_id);
	}

	public function deleteconif($update_id) {
		$this->load->module('site_secuirty');
		$this->site_secuirty->_make_sure_is_admin();
		$submit = $this->input->post('submit');


		if(!isset($update_id)) {
			redirect('site_secuirty/not_allowed');
		}
	
		$data['update_id'] = $update_id;
		$data['head_line'] = 'Delete Slide';
		$data['flash'] = $this->session->flashdata('item');
		$data['module'] = 'slides';
		$data['view_file'] = 'deleteconif';

		$this->load->module('templetes');
		$this->templetes->admin($data);
	}

	public function do_upload($update_id)
    {
		$this->load->module('site_secuirty');
		$this->site_secuirty->_make_sure_is_admin();

		$submit = $this->input->post('submit');

		if(!isset($update_id)) {
			redirect('site_secuirty/not_allowed');
		}

        $config['upload_path']          = './slider_pics/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 400;
        $config['max_width']            = 1623;
        $config['max_height']           = 968;

        if ($submit == 'Cancel') {
        	redirect('slides/view/'.$update_id.'');
        }

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('userfile'))
        {
            $data['error'] = array('error' => $this->upload->display_errors('<p style="color: red;">', '</p>')); 

           redirect(base_url().'slides/upload_image/'.$update_id);      
        }
        else
        {	
            $data = array('upload_data' => $this->upload->data());
           
            $upload_data = $data['upload_data'];
            $file_name = $upload_data['file_name'];
            

            //store data in database
            $update_data['picture'] = $file_name; 
           
            $this->_update($update_id, $update_data); 

   			redirect(base_url().'slides/view/'.$update_id);  
        }
    }

	function upload_image($update_id) {
		$this->load->module('site_secuirty');
		$this->site_secuirty->_make_sure_is_admin();

		if (!isset($update_id)) {
			redirect('site_secuirty/not_allowed');
		}

		$data['update_id'] = $update_id;
		$data['head_line'] = $this->lang->line('upload_image');
		$data['flash'] = $this->session->flashdata('item');
		$data['module'] = 'slides';
		$data['view_file'] = 'upload_image';

		$this->load->module('templetes');
		$this->templetes->admin($data);
	}

	function _get_post_data() {
		$data['parent_id'] = $this->input->post('parent_id');
		$data['target_url'] = $this->input->post('target_url');
		$data['alt_text'] = $this->input->post('alt_text');

		return $data;
	}

	function __get_data_from_db($update_id) {
		$query = $this->get_where($update_id);
		foreach ($query->result() as $row) {
			$data['parent_id'] = $row->parent_id;
			$data['target_url'] = $row->target_url;
			$data['alt_text'] = $row->alt_text;
			$data['picture'] = $row->picture;
		}

		return $data;
	}

	function update_group($parent_id) {
		//Migrate Slides To Slider By Parent ID
		$this->load->module('site_secuirty');
        $this->site_secuirty->_make_sure_is_admin();
        $data['slides'] = $this->get_where_custom('parent_id', $parent_id);
		$data['num_rows'] = $data['slides']->num_rows();
        $data['parent_id'] = $parent_id;
        $data['headline'] = $this->_get_update_group_headline($data['parent_id']);
        $data['flash'] = $this->session->flashdata('item');
        $data['items'] = $this->get_where_custom('parent_id', $parent_id);
        $data['module'] = 'slides';
        $data['view_file'] = 'update_group';

        $this->load->module('templetes');
        $this->templetes->admin($data);
	}

	function _get_update_group_headline($parent_id) {
		$parent_title = ucfirst($this->_get_parent_title($parent_id));
		$entity_name =  ucfirst($this->_get_entity_name('plural'));

		$headline = 'Update '.$entity_name.' For '.$parent_title;
		return $headline;
	}

	function _get_parent_title($parent_id) {
		//Get Slider Title Of These Slides 
		$name_module = 'slider';
		$this->load->module($name_module);
		$title = $this->$name_module->_get_title($parent_id);
		return $title;
	}

	function _get_entity_name($type) {
		//NOTE: Return Singular OR plural
		if($type == 'singular') {
			$entity_name = $this->lang->line('slide');
		} else {
			$entity_name = $this->lang->line('slides');
		}

		return $entity_name;
	}

	function _draw_create_modal($parent_id) {
		$data['parent_id'] = $parent_id;
		$data['form_location'] = base_url() . 'slides/submit_create';
		$this->load->view('draw_create_modal', $data);
	}

	function submit_create() {
		$this->load->module('site_secuirty');
		$this->site_secuirty->_make_sure_is_admin();

		$submit = $this->input->post('submit', TRUE);
		if($submit == 'Submit') 
		{
			$data = $this->_get_post_data();
			//$parent_id = $data['parent_id'];
			$this->_insert($data);
			$max_id = $this->get_max();

			redirect(base_url().'slides/view/'.$max_id);
		}

		return 0;
	}

	function _get_parent_id($update_id) {
		$data = $this->__get_data_from_db($update_id);
		$parent_id = $data['parent_id'];
		return $parent_id;
	}

	function view() {
		$max_id = $this->uri->segment(3);
		$this->load->module('site_secuirty');
		$this->site_secuirty->_make_sure_is_admin();
		$this->load->library('session');

		$update_id = $this->uri->segment(3);
		$submit = $this->input->post('submit');

		if ($submit == "Submit") {
			/* $data['target_url'] = $this->input->post('target_url');
		$data['alt_text'] = $this->input->post('alt_text'); */
			
		$data = $this->_get_post_data();
		
		$update_id = $this->input->post('update_id', TRUE);
		if (is_numeric($update_id)) {
			
			//update data
			$this->_update($update_id, $data);
			$value = '<div class="alert alert-success" role="alert">'.$this->lang->line('alert_update_slide').'</div>';
			$this->session->set_flashdata('item', $value);
			redirect(base_url().'slides/view/'.$update_id);
		}
			
		} elseif ($submit == "Cancel") {
			redirect(base_url().'slides/update_group/'.$max_id);
		}
		
		$data = $this->_get_data_from_db($max_id);
		$picture = $data['picture'];

		if($picture == '') {
			$data['got_pic'] = FALSE;
			$data['btn_style'] = '';
			$data['btn_info'] = $this->lang->line('btn_info');
		} else {
			$data['got_pic'] = TRUE;
			$data['btn_style'] = 'style="clear: both; margin-top: 24px"';
			$data['btn_info'] = $this->lang->line('btn_info2');
			$data['pic_path'] = base_url().'slider_pics/'.$picture;
		}

		
		$data['parent_id'] = $this->_get_parent_id($max_id);
		$data['update_id'] = $max_id;
		$entity_name = ucfirst($this->_get_entity_name('singular'));
		$data['headline'] = 'Update '.$entity_name;
		$data['flash'] = $this->session->flashdata('item');
		$data['module'] = 'slides';
		$data['view_file'] = 'view';

		$this->load->module('templetes');
		$this->templetes->admin($data);
	}

	function _get_btn_img() {
		$this->load->view('create_btn_img');
	}

	function get($order_by) {
	$this->load->model('Mdl_slides');
	$query = $this->Mdl_slides->get($order_by);
	return $query;
	}

	function get_with_limit($limit, $offset, $order_by) {
	$this->load->model('Mdl_slides');
	$query = $this->Mdl_slides->get_with_limit($limit, $offset, $order_by);
	return $query;
	}

	function get_where($id) {
	$this->load->model('Mdl_slides');
	$query = $this->Mdl_slides->get_where($id);
	return $query;
	}

	function get_where_custom($col, $value) {
	$this->load->model('Mdl_slides');
	$query = $this->Mdl_slides->get_where_custom($col, $value);
	return $query;
	}

	function _insert($data) {
	$this->load->model('Mdl_slides');
	$this->Mdl_slides->_insert($data);
	}

	function _update($id, $data) {
	$this->load->model('Mdl_slides');
	$this->Mdl_slides->_update($id, $data);
	}

	function _delete($id) {
	$this->load->model('Mdl_slides');
	$this->Mdl_slides->_delete($id);
	}

	function count_where($column, $value) {
	$this->load->model('Mdl_slides');
	$count = $this->Mdl_slides->count_where($column, $value);
	return $count;
	}

	function get_max() {
	$this->load->model('Mdl_slides');
	$max_id = $this->Mdl_slides->get_max();
	return $max_id;
	}

	function _custom_query($mysql_query) {
	$this->load->model('Mdl_slides');
	$query = $this->Mdl_slides->_custom_query($mysql_query);
	return $query;
	}

}