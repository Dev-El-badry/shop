<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Item_stores extends MX_Controller
{
	function __construct() {
	parent::__construct();
		$this->load->library('form_validation');
	    $this->form_validation->CI =& $this;
	}

	function _get_id_by_itemUrl($item_url) {
		$query = $this->get_where_custom('url_item', $item_url);
		foreach ($query->result() as $row) {
			$id = $row->id;
		}

		if(! isset($id)) {
			$id = "";
		}

		return $id;
	}

	function view($update_id) {
		if(!isset($update_id)) {
			redirect('site_secuirty/not_allowed');
		}
	
		//frtch data from database
		$data = $this->get_data_from_db($update_id);

        // Bread Crumbs
        $bread_crumbs_data['template'] = 'public_bootstrap';
        $bread_crumbs_data['item_title'] = $data['title_item'];
        $bread_crumbs_data['breadcrums_arr'] = $this->_generate_breadcrums_array($update_id);
        $data['breadcrumbs_data'] = $bread_crumbs_data;


        $data['update_id'] = $update_id;
		$data['flash'] = $this->session->flashdata('item');
		$data['module'] = 'item_stores';
		$data['view_file'] = 'view';

		$this->load->module('templetes');
		$this->templetes->public_bootstrap($data);
	}

	function _generate_breadcrums_array($update_id) {
        $home_url = base_url();
        $breadcrumbs_array[$home_url] = 'Home';

        //Find Subcategory For This Item
        $sub_cat_id = $this->_get_sub_cat_id($update_id);

        //Get The Sub Category Title
        $this->load->module('store_category');
        $sub_cat_title = $this->store_category->_get_sub_cat_title($sub_cat_id);

       //get the sub cat url
        $sub_cat_url = $this->store_category->_get_sub_cat_url($sub_cat_id);

        $breadcrumbs_array[$sub_cat_url] = $sub_cat_title;
        return $breadcrumbs_array;
    }

    function _get_sub_cat_id($update_id) {
        $this->load->module('store_cat_assign');
        $this->load->module('site_settings');
        $this->load->module('store_category');

	    $url_referer = $_SERVER['HTTP_REFERER'];
	    $ditch_this = base_url().$this->site_settings->_get_items_segments();
	    $cat_url = str_replace($ditch_this, '', $url_referer);
        $sub_cat_id = $this->store_category->_get_id_by_catUrl($cat_url);
//echo $ditch_this . '<hr>' . $url_referer . '<hr >'.$cat_url. '<hr>'.$sub_cat_id; die();
        if($sub_cat_id >0) {
            $sub_cat_id = $sub_cat_id;
        } else {


            $sub_cat_id = $this->_get_best_sub_cat_id($update_id);
        }

        return $sub_cat_id;
    }

    function _get_best_sub_cat_id($update_id) {
	    $this->load->module('store_cat_assign');
        $query = $this->store_cat_assign->get_where_custom('id_item', $update_id);
        foreach ($query->result() as $row) {
            $potential_sub_cat_id[] = $row->id_cat;
        }

        if(count($potential_sub_cat_id) == 1) {
            $sub_cat_id = $potential_sub_cat_id[0];
        } else {

            foreach ($potential_sub_cat_id as $key=>$value) {
                $sub_cat_id = $value;
                $num_items_in_subcat = $this->store_cat_assign->count_where('id_cat', $sub_cat_id);
                $num_items_cat[$sub_cat_id] = $num_items_in_subcat;
            }

            $sub_cat_id = $this->get_best_key_array($num_items_cat);

        }

        return $sub_cat_id;
    }

    function get_best_key_array($arr) {
        foreach ($arr as $key=>$value){
            if(!isset($key_heightest)) {
                $key_heightest = $key;
            } elseif ($value > $arr[$key_heightest]) {
                $key_heightest = $key;
            }
        }

        return $key_heightest;
    }

	public function _generate_thumbnail($file_name) {
		$config['image_library'] = 'gd2';
		$config['source_image'] = './big_img/'.$file_name;
		$config['new_image'] = './small_pics/'.$file_name;
		$config['maintain_ratio'] = TRUE;
		$config['width'] = 200;
		$config['height'] = 200;

		$this->load->library('image_lib', $config);

		$this->image_lib->resize();
	}

	public function _delete_process($id_item) {
		// delete colors of item
		$this->load->module('store_item_colors');
		$this->store_item_colors->_delete_conif($id_item);
		// delete sizes of item
		$this->load->module('store_item_sizes');
		$this->store_item_sizes->_delete_conif($id_item);
		// delete images of item
		$data = $this->get_data_from_db($id_item);
		$big_pic = $data['big_img'];
		$small_pic = $data['small_img'];

		$big_path = './big_img/'.$big_pic;
		$small_path = './small_pics/'.$small_pic;

		if (file_exists($big_path)) {
			unlink($big_path);
		}

		if (file_exists($small_path)) {
			unlink($small_path);
		}

		// delete item record from items_stores
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

			redirect(base_url().'item_stores/manage');
		} elseif ($submit == "Yes - Delete Item Record") {
			$item_id = $this->input->post('update_id');
			// Delete Item
			$this->_delete_process($update_id);

			$value = '<div class="alert alert-success" role="alert">Successfully Delete Item Record</div>';
			$this->session->set_flashdata('item', $value);
			

			redirect('item_stores/manage');
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
		$data['head_line'] = 'Delete Item';
		$data['flash'] = $this->session->flashdata('item');
		$data['module'] = 'item_stores';
		$data['view_file'] = 'deleteconif';

		$this->load->module('templetes');
		$this->templetes->admin($data);
	}

	public function delete_image($update_id)
    {
		$this->load->module('site_secuirty');
		$this->site_secuirty->_make_sure_is_admin();

		if(!isset($update_id)) {
			redirect('site_secuirty/not_allowed');
		}

		$data = $this->get_data_from_db($update_id);
		$big_pic = $data['big_img'];
		$small_pic = $data['small_img'];

		$big_path = './big_img/'.$big_pic;
		$small_path = './small_pics/'.$small_pic;

		if (file_exists($big_img)) {
			unlink($big_img);
		}

		if (file_exists($small_path)) {
			unlink($small_path);
		}

		//update Date
		unset($data);
		$data['big_img'] = "";
		$data['small_img'] = "";		
		$this->_update($update_id, $data);

		$value = '<div class="alert alert-success" role="alert">Successfully Delete Item Image</div>';
		$this->session->set_flashdata('item', $value);

		redirect('item_stores/create/'.$update_id);
	}

	public function do_upload($update_id)
    {
		$this->load->module('site_secuirty');
		$this->site_secuirty->_make_sure_is_admin();

		$submit = $this->input->post('submit');

		if(!isset($update_id)) {
			redirect('site_secuirty/not_allowed');
		}

        $config['upload_path']          = './big_img/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 100;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;

        if ($submit == 'Cancel') {
        	redirect('Item_stores/create/'.$update_id.'');
        }

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('userfile'))
        {
            $data['error'] = array('error' => $this->upload->display_errors('<p style="color: red;">', '</p>')); 

            $data['update_id'] 	= $update_id;
			$data['head_line'] 	= 'Upload Image Product';
			$data['module'] 	= 'item_stores';
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
            $this->_generate_thumbnail($file_name);

            //store data in database
            $update_data['big_img'] = $file_name; 
            $update_data['small_img'] = $file_name;
            $this->_update($update_id, $update_data); 

            $data['update_id'] 	= $update_id;
			$data['head_line'] 	= 'Upload Success';
			$data['module'] 	= 'item_stores';
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
		$data['head_line'] = 'Upload Image Product';
		$data['flash'] = $this->session->flashdata('item');
		$data['module'] = 'item_stores';
		$data['view_file'] = 'upload_image';

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
			$this->form_validation->set_rules('title_item', 'Title Item', 'required|max_length[240]|callback_item_check');
			$this->form_validation->set_rules('price_item', 'Price Item', 'required|numeric');
			$this->form_validation->set_rules('was_price', 'Was Price', 'required');
			$this->form_validation->set_rules('status', 'Status', 'required|numeric');
			$this->form_validation->set_rules('describtion_item', 'Describtion Item', 'required');

			if ($this->form_validation->run() == TRUE) {
				$data = $this->get_post_data();
				$data['url_item'] = url_title($data['title_item']); 
				$update_id = $this->input->post('update_id', TRUE);
				if (is_numeric($update_id)) {
					
					//update data
					$this->_update($update_id, $data);
					$value = '<div class="alert alert-success" role="alert">Successfully Update Data Is Done</div>';
					$this->session->set_flashdata('item', $value);
					redirect(base_url().'item_stores/create/'.$update_id);
				} else {
				
					//insert data
					$data['date_mode'] = time();
					$res = $this->_insert($data);
					
					$update_id = $this->get_max();
					$value = '<div class="alert alert-primary">Successfully Insert Data Is Done</div>';
					$this->session->set_flashdata('item', $value);
					redirect(base_url().'item_stores/create/'.$update_id);
				}
			} 


		} elseif ($submit == "Cancel") {
			redirect(base_url().'item_stores/manage');
		}


		if((is_numeric($update_id)) && ($submit!="Submit")) {
			$data = $this->get_data_from_db($update_id);
			$data['update_id'] = $update_id;

		} else {
			$data = $this->get_post_data();
			$data['big_img'] = "";
		}

		if(! is_numeric($update_id)) {
			$data['head_line'] = 'Add New Product';
		} else {
			$data['head_line'] = 'Update Product';
		}
		
		$data['flash'] = $this->session->flashdata('item');
		$data['module'] = 'item_stores';
		$data['view_file'] = 'create';

		$this->load->module('templetes');
		$this->templetes->admin($data);
	}

	function get_post_data() {
		$data['title_item'] = $this->input->post('title_item', TRUE);
		$data['price_item'] = $this->input->post('price_item', TRUE);
		$data['was_price'] = $this->input->post('was_price', TRUE);
		$data['status'] = $this->input->post('status', TRUE);
		$data['describtion_item'] = $this->input->post('describtion_item', TRUE);

		return $data;
	}

	function get_data_from_db($update_id) {
		$query = $this->get_where($update_id);

		foreach ($query->result() as $row) {
			$data['id'] = $row->id;
			$data['title_item'] = $row->title_item;
			$data['price_item'] = $row->price_item;
			$data['was_price'] = $row->was_price;
			$data['status'] = $row->status;
			$data['describtion_item'] = $row->describtion_item;
			$data['big_img'] = $row->big_img;
			$data['small_img'] = $row->small_img;
		}

		return $data;
	}

	function manage() {
		$this->load->module('site_secuirty');
		$this->site_secuirty->_make_sure_is_admin();
		
		$data['flash'] = $this->session->flashdata('item');
		$data['items'] = $this->get('title_item');
		$data['module'] = 'item_stores';
		$data['view_file'] = 'manage';

		$this->load->module('templetes');
		$this->templetes->admin($data);

		//echo Modules::run('templetes/admin', $data);
	}

	function get($order_by) {
	$this->load->model('Mdl_item_stores');
	$query = $this->Mdl_item_stores->get($order_by);
	return $query;
	}

	function get_with_limit($limit, $offset, $order_by) {
	$this->load->model('Mdl_item_stores');
	$query = $this->Mdl_item_stores->get_with_limit($limit, $offset, $order_by);
	return $query;
	}

	function get_where($id) {
	$this->load->model('Mdl_item_stores');
	$query = $this->Mdl_item_stores->get_where($id);
	return $query;
	}

	function get_where_custom($col, $value) {
	$this->load->model('Mdl_item_stores');
	$query = $this->Mdl_item_stores->get_where_custom($col, $value);
	return $query;
	}

	function _insert($data) {
	$this->load->model('Mdl_item_stores');
	$this->Mdl_item_stores->_insert($data);
	}

	function _update($id, $data) {
	$this->load->model('Mdl_item_stores');
	$this->Mdl_item_stores->_update($id, $data);
	}

	function _delete($id) {
	$this->load->model('Mdl_item_stores');
	$this->Mdl_item_stores->_delete($id);
	}

	function count_where($column, $value) {
	$this->load->model('Mdl_item_stores');
	$count = $this->Mdl_item_stores->count_where($column, $value);
	return $count;
	}

	function get_max() {
	$this->load->model('Mdl_item_stores');
	$max_id = $this->Mdl_item_stores->get_max();
	return $max_id;
	}

	function _custom_query($mysql_query) {
	$this->load->model('Mdl_item_stores');
	$query = $this->Mdl_item_stores->_custom_query($mysql_query);
	return $query;
	}

	 public function item_check($str)
        {
        	$url_item = url_title($str);
        	$query_sql = "SELECT * FROM item_stores WHERE title_item='$str' AND url_item='$url_item'";
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