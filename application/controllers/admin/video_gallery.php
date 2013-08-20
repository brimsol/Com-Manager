<?php

/**
 * User Management
 * @package     247 LAW
 * @subpackage  Video gallery Management controller
 * @author	247 Dev team <aravind.m@yukoglobal.com,prasanth.mathew@yukoglobal.com>
 * @copyright   Copyright (c) 2013, Yuko Global Technologies, Inc.
 * @license	www.yukoglobal.com/user_guide/license.html
 * @since	Version 1.0, 16th July 2013
 * @filesource
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Video_gallery extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('video_model');
    }

    /**
     * Show all Videos with pagination
     * @param int $page_id page number
     * @param string $search_dump_id search encript ID
     * @param string $sort  sorting method
     * @param string $fieldname field for sort
     * 
     */
    function index($page_id = 1, $search_dump_id = '', $sort = 'asc', $fieldname = '') {

        /**
         * Search Functionality
         */
        $data['srch'] = array(); // Initialise search params array

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            //Initialise search fields
            $postvalues = array('title' => '');

            //Call sdearch function to save search params to Table & reload the page with search_dump_id
            search_function($postvalues, '/admin/video_gallery/index/');
        }

        // Check for search_dump_id is empty or not
        if ($search_dump_id != '' && !empty($search_dump_id)) {

            // Get the search params from saved table 
            $srch_val = getSearchItem($search_dump_id);

            //Search params result string unserialize and store in to search params array
            $data['srch'] = unserialize($srch_val->search_value);
        }

        /**
         * Sort Functionality
         */
        // Initialise fields for sort
        $fields = array('title');
        $status = 0;

        // Initialise temp sort array for keep sort status ( for VIEW page )
        $tempSort = array();

        foreach ($fields as $field)
            if ($field == $fieldname) {
                $status = 1;
                if ($sort == 'asc') {
                    $tempSort[$field]['sort'] = 'desc';
                    $tempSort[$field]['arrow'] = 'down_arrow.png';
                } else {
                    $tempSort[$field]['sort'] = 'asc';
                    $tempSort[$field]['arrow'] = 'up_arrow.png';
                }
            } else {
                $tempSort[$field]['sort'] = 'desc';
                $tempSort[$field]['arrow'] = 'down_arrow.png';
            }
        // Set the sort field   
        if ($status == 0)
            $fieldname = 'title';

        $data['tempSort'] = $tempSort;

        //Get all news from DB
        $data['video_gallery'] = $this->video_model->getAllVideos($sort, $fieldname, $page_id, $data['srch']);
        print_r($data['video_gallery']);
        /**
         * Pagination Function
         */
        // Get result count
        $data['count'] = $this->video_model->num_rows;

        //Set current page id 
        $data['current_page'] = $page_id;

        //Set sort methord 
        $data['sort'] = $sort;

        //Set sort fieldname  
        $data['fieldname'] = $fieldname;

        $search_dump_id = (isset($search_dump_id) && $search_dump_id !== '') ? $search_dump_id : "0";

        //Set extra params
        $data['param'] = $search_dump_id . '/' . $sort;

        $data['search_dump_id'] = $search_dump_id;

        //Set selected menu 
         $data['menu'] = 'video_gallery';

        //Set meta title this used for page title, page <h1> heading, breadcrumbs
        $data['meta_title'] = "Video Gallery";
        $data['meta_title'] = SITE_NAME . " | Video Gallery";
        $data['meta_description'] = 'meta description goes heere';
        $data['meta_keyword'] = 'meta,keyword';
       $this->load->view('admin/video_gallery/list_view', $data);
       
    }
    /**
	 * Logout process
	 */
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('admin', 'refresh');
	}

}

/* End of file login.php */
/* Location: ./application/controllers/login.php */