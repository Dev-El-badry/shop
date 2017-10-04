<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Cart extends MX_Controller
{

	function __construct() {
	parent::__construct();
	}

	function _draw_add_to_cart($id) {
		$submitted_color = $this->input->post('submitted_color');
		if($submitted_color == '') {
			$color_option[''] = "Select....";
		}
		//fetch Colors & Sizes
		$this->load->module('store_item_colors');
		$query = $this->store_item_colors->get_where_custom('item_id', $id);
		$data['num_row'] = $query->num_rows();
		foreach ($query->result() as $row) {
			$color_option[$row->id] = $row->color;
		}

		//fetch Sizes
		$submitted_size = $this->input->post('submitted_size');
		if($submitted_size == '') {
			$size_option[''] = "Select....";
		}

		$this->load->module('store_item_sizes');
		$query = $this->store_item_sizes->get_where_custom('item_id', $id);
		$data['num_row_size'] = $query->num_rows();
		foreach ($query->result() as $row) {
			$size_option[$row->id] = $row->size;
		}

		$data['color_option'] = $color_option;
		$data['size_option'] = $size_option;
		$data['submitted_color'] = $submitted_color;
		$data['submitted_size'] = $submitted_size;
		$data['id'] = $id;
		$this->load->view('add_to_cart', $data);
	}
	
}