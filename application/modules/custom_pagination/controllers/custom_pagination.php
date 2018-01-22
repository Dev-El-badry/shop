<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Custom_pagination extends MY_Backend
{

	function __construct() {
	    parent::__construct();
        $this->load->library('pagination');
	}

	function pagination($data) {
        //$template, $base_url, $total_row, $limit, $offset

        $template   = $data['template'];
        $base_url   = $data['base_url'];
        $total_row  = $data['total_row'];
        $offset     = $data['offset_segment'];
        $limit      = $data['limit'];

        if($template == 'public_bootstrap') {
            $setting = $this->get_settings_for_public_bootstrap();
        }

        $config['base_url'] = $base_url;
        $config['total_rows'] = $total_row;
        $config['per_page'] = $limit;
        $config['uri_segment'] = $offset;

        $config['full_tag_open']    = $setting['full_tag_open'];
        $config['full_tag_close']   = $setting['full_tag_close'];
        $config['first_link']       = $setting['first_link'];
        $config['first_tag_open']   = $setting['first_tag_open'];
        $config['first_tag_close']  = $setting['first_tag_close'];
        $config['last_link']        = $setting['last_link'];
        $config['last_tag_open']    = $setting['last_tag_open'];
        $config['last_tag_close']   = $setting['last_tag_close'];
        $config['next_link']        = $setting['next_link'];
        $config['next_tag_open']    = $setting['next_tag_open'];
        $config['next_tag_close']   = $setting['next_tag_close'];
        $config['prev_link']        = $setting['prev_link'];
        $config['prev_tag_open']    = $setting['prev_tag_open'];
        $config['prev_tag_close']   = $setting['prev_tag_close'];
        $config['cur_tag_open']     = $setting['cur_tag_open'];
        $config['cur_tag_close']    = $setting['cur_tag_close'];
        $config['num_tag_open']     = $setting['num_tag_open'];
        $config['num_tag_close']    = $setting['num_tag_close'];

        $this->pagination->initialize($config);

        $this->pagination->initialize($config);

        $pag =  $this->pagination->create_links();
        return $pag;
    }

    function showing_statement($data) {
	    //NOTE: the data should contain
        //$limit, $offset, $total_rows

        $limit = $data['limit'];
        $offset = $data['offset'];
        $total_rows = $data['total_row'];

        $value1 = $offset + 1;
        $value2 = $offset + $limit;
        $value3 = $total_rows;

        if($value2 > $value3) {
           $value2 = $value3;
        }

        $showing_Statement = 'Showing: ' . $value1 . ' To ' . $value2 . ' OF ' . $value3 . ' Results.';
        return $showing_Statement;
    }

    function get_settings_for_public_bootstrap() {

        $setting['full_tag_open']   = '<nav aria-label="Page navigation"><ul class="pagination">';
        $setting['full_tag_close']  = '</ul></nav>';

        $setting['num_tag_open']    = '<li>';
        $setting['num_tag_close']   = '</li>';

        $setting['first_link']      = 'First';
        $setting['first_tag_open']  = '<li>';
        $setting['first_tag_close'] = '</li>';


        $setting['last_link']       = 'Last';
        $setting['last_tag_open']   = '<li>';
        $setting['last_tag_close']  = '</li>';

        $setting['prev_link']       = '<span aria-hidden="true">&laquo;</span>';
        $setting['prev_tag_open']   = '<li>';
        $setting['prev_tag_close']  = '</li>';


        $setting['next_link']       = ' <span aria-hidden="true">&raquo;</span>';
        $setting['next_tag_open']   = '<li>';
        $setting['next_tag_close']  = '</li>';

        $setting['cur_tag_open']    = '<li class="active"><a href="#">';
        $setting['cur_tag_close']   = '</a></li>';



        return $setting;
    }

    /*  <nav aria-label="Page navigation">
  <ul class="pagination">
    <li>
      <a href="#" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    <li><a href="#">1</a></li>
    <li><a href="#">2</a></li>
    <li><a href="#">3</a></li>
    <li><a href="#">4</a></li>
    <li><a href="#">5</a></li>
    <li>
      <a href="#" aria-label="Next">

      </a>
    </li>
  </ul>
</nav>*/



}