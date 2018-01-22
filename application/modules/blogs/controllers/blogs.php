<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Blogs extends MY_Backend
{

	function __construct() {
	parent::__construct();
    $this->lang->load('admin/blog');
	}

	public function _get_draw_hp() {
	    $this->load->module('timedate');
	    $this->load->helper('text');
	    $sql_query = 'select * from blogs order by date_published DESC limit 0,3';
	    $data['query'] = $this->_custom_query($sql_query);

	    $this->load->view('draw_hp', $data);
    }

    public function delete_image($update_id)
    {
        $this->load->module('site_secuirty');
        $this->site_secuirty->_make_sure_is_admin();

        if(!isset($update_id)) {
            redirect('site_secuirty/not_allowed');
        }

        $data = $this->get_data_from_db($update_id);
        $picture = $data['picture'];

        $big_path = './blog_pics/'.$picture;
        $small_pic = str_replace('.','_thumb.', $picture);
        $small_path = './blog_pics/'.$small_pic;

        if (file_exists($big_path)) {
            unlink($big_path);
        }

        if (file_exists($small_path)) {
            unlink($small_path);
        }

        //update Date
        unset($data);
        $data['picture'] = "";

        $this->_update($update_id, $data);

        $value = '<div class="alert alert-success" role="alert">'.$this->lang->line('del_item').'</div>';
        $this->session->set_flashdata('item', $value);

        redirect('blogs/create/'.$update_id);
    }

    public function _generate_thumbnail($file_name, $thumb_name) {
        $config['image_library'] = 'gd2';
        $config['source_image'] = './blog_pics/'.$file_name;
        $config['new_image'] = './blog_pics/'.$thumb_name;
        $config['maintain_ratio'] = TRUE;
        $config['width'] = 200;
        $config['height'] = 200;

        $this->load->library('image_lib', $config);

        $this->image_lib->resize();
    }

    public function do_upload($update_id)
    {
        $this->load->module('site_secuirty');
        $this->site_secuirty->_make_sure_is_admin();

        $submit = $this->input->post('submit');

        if(!isset($update_id)) {
            redirect('site_secuirty/not_allowed');
        }

        $config['upload_path']          = './blog_pics/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 100;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;

        if ($submit == 'Cancel') {
            redirect('blogs/create/'.$update_id.'');
        }

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('userfile'))
        {
            $data['error'] = array('error' => $this->upload->display_errors('<p style="color: red;">', '</p>'));

            $data['update_id'] 	= $update_id;
            $data['head_line'] 	= 'Upload Image';
            $data['module'] 	= 'blogs';
            $data['view_file'] 	= 'upload_image';

            $this->load->module('templetes');
            $this->templetes->admin($data);
        }
        else
        {
            $data = array('upload_data' => $this->upload->data());
            // make thumbnails when upload was successfully
            $upload_data = $data['upload_data'];
            $file_name = $upload_data['file_name'];
            $thumb_name = $upload_data['raw_name'] . '_thumb'.$upload_data['file_ext'];


            $this->_generate_thumbnail($file_name, $thumb_name);

            //store data in database
            $update_data['picture'] = $file_name;

            $this->_update($update_id, $update_data);

            $data['update_id'] 	= $update_id;
            $data['head_line'] 	= $this->lang->line('upload_succ');
            $data['module'] 	= 'blogs';
            $data['view_file'] 	= 'finish_upload';

            $this->load->module('templetes');
            $this->templetes->admin($data);
        }
    }

    function upload_image($update_id) {
        $this->load->module('site_secuirty');
        $this->site_secuirty->_make_sure_is_admin();

        if (!isset($update_id)) {
            redirect('site_secuirty/not_allowed');
        }

        $data['update_id'] = $update_id;
        $data['head_line'] = $this->lang->line('upload_img');
        $data['flash'] = $this->session->flashdata('item');
        $data['module'] = 'blogs';
        $data['view_file'] = 'upload_image';

        $this->load->module('templetes');
        $this->templetes->admin($data);
    }

    public function _delete_process($id_item) {

        // delete Blog record from blogs
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

            redirect(base_url().'blogs/manage');
        } elseif ($submit == $this->lang->line('submit_del')) {
            $item_id = $this->input->post('update_id');
            // Delete Item

                $this->_delete_process($update_id);



            $value = '<div class="alert alert-danger" role="alert">'.$this->lang->line('del_blog').'</div>';
            $this->session->set_flashdata('item', $value);


            redirect('blogs/manage');
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
        $data['head_line'] = $this->lang->line('headline_del');
        $data['flash'] = $this->session->flashdata('item');
        $data['module'] = 'blogs';
        $data['view_file'] = 'deleteconif';

        $this->load->module('templetes');
        $this->templetes->admin($data);
    }

    function create() {
        $this->load->module('site_secuirty');
        $this->site_secuirty->_make_sure_is_admin();
        $this->load->library('session');
        $this->load->module('timedate');
        //ini_set('memory_limit', '-1');


        $update_id = $this->uri->segment(3);
        $submit = $this->input->post('submit');


        if ($submit == "Submit") {

            //Process The Form
            $this->load->library('form_validation');
            $this->form_validation->set_rules('blog_title', $this->lang->line('blog_title'), 'required|max_length[240]');
            $this->form_validation->set_rules('blog_content', $this->lang->line('blog_content'), 'required');
            $this->form_validation->set_rules('author', $this->lang->line('author'), 'required');


            if ($this->form_validation->run() == TRUE) {
                $data = $this->get_post_data();
                $data['blog_url'] = url_title($data['blog_title']);

                $data['date_published'] = $this->timedate->make_timestamp_from_datepicker($data['date_published']);

                $update_id = $this->input->post('update_id', TRUE);
                if (is_numeric($update_id)) {

                    //update data
                    $this->_update($update_id, $data);
                    $value = '<div class="alert alert-success" role="alert">'.$this->lang->line('alert_update').'</div>';
                    $this->session->set_flashdata('item', $value);
                    redirect(base_url().'blogs/create/'.$update_id);
                } else {

                    //insert data

                    $this->_insert($data);

                    $update_id = $this->get_max();
                    $value = '<div class="alert alert-success" role="alert">'.$this->lang->line('alert_insert').'</div>';
                    $this->session->set_flashdata('item', $value);
                    redirect(base_url().'blogs/create/'.$update_id);
                }
            }


        } elseif ($submit == "Cancel") {
            redirect(base_url().'blogs/manage');
        }


        if((is_numeric($update_id)) && ($submit!="Submit")) {
            $data = $this->get_data_from_db($update_id);
            $data['date_published'] = $this->timedate->get_nice_date($data['date'], 'datepicker');
            $data['update_id'] = $update_id;

        } else {
            $data = $this->get_post_data();

        }

        if(! is_numeric($update_id)) {
            $data['head_line'] = $this->lang->line('add_new_blog');
        } else {
            $data['head_line'] = $this->lang->line('update_blog');
        }

        $data['flash'] = $this->session->flashdata('item');
        $data['module'] = 'blogs';
        $data['view_file'] = 'create';

        $this->load->module('templetes');
        $this->templetes->admin($data);
    }

    function get_post_data() {
        $data['blog_title'] = $this->input->post('blog_title', TRUE);
        $data['date_published'] = $this->input->post('date_published', TRUE);
        $data['blog_description'] = $this->input->post('blog_description', TRUE);
        $data['blog_content'] = $this->input->post('blog_content', TRUE);
        $data['blog_keywords'] = $this->input->post('blog_keywords', TRUE);

        $data['author'] = $this->input->post('author', TRUE);

        return $data;
    }

    function get_data_from_db($update_id) {
        $query = $this->get_where($update_id);

        foreach ($query->result() as $row) {
            $data['id'] = $row->id;
            $data['blog_title'] = $row->blog_title;
            $data['date'] = $row->date_published;
            $data['blog_description'] = $row->blog_description;
            $data['blog_content'] = $row->blog_content;
            $data['author'] = $row->author;
            $data['picture'] = $row->picture;
            $data['blog_keywords'] = $row->blog_keywords;
        }

        return $data;
    }

    function manage() {
        $this->load->module('site_secuirty');
        $this->load->module('timedate');
        $this->site_secuirty->_make_sure_is_admin();

        $data['flash'] = $this->session->flashdata('item');
        $data['items'] = $this->get('blog_title');
        $data['module'] = 'blogs';
        $data['view_file'] = 'manage';

        $this->load->module('templetes');
        $this->templetes->admin($data);

        //echo Modules::run('templetes/admin', $data);
    }

	function get($order_by) {
	$this->load->model('mdl_blogs');
	$query = $this->mdl_blogs->get($order_by);
	return $query;
	}

	function get_with_limit($limit, $offset, $order_by) {
	$this->load->model('mdl_blogs');
	$query = $this->mdl_blogs->get_with_limit($limit, $offset, $order_by);
	return $query;
	}

	function get_where($id) {
	$this->load->model('mdl_blogs');
	$query = $this->mdl_blogs->get_where($id);
	return $query;
	}

	function get_where_custom($col, $value) {
	$this->load->model('mdl_blogs');
	$query = $this->mdl_blogs->get_where_custom($col, $value);
	return $query;
	}

	function _insert($data) {
	$this->load->model('mdl_blogs');
	$this->mdl_blogs->_insert($data);
	}

	function _update($id, $data) {
	$this->load->model('mdl_blogs');
	$this->mdl_blogs->_update($id, $data);
	}

	function _delete($id) {
	$this->load->model('mdl_blogs');
	$this->mdl_blogs->_delete($id);
	}

	function count_where($column, $value) {
	$this->load->model('mdl_blogs');
	$count = $this->mdl_blogs->count_where($column, $value);
	return $count;
	}

	function get_max() {
	$this->load->model('mdl_blogs');
	$max_id = $this->mdl_blogs->get_max();
	return $max_id;
	}

	function _custom_query($mysql_query) {
	$this->load->model('mdl_blogs');
	$query = $this->mdl_blogs->_custom_query($mysql_query);
	return $query;
	}

}