<?php

/**
 * User Management
 * @package     247 LAW
 * @subpackage  User Management controller
 * @author	247 Dev team <aravind.m@yukoglobal.com,prasanth.mathew@yukoglobal.com>
 * @copyright   Copyright (c) 2013, Yuko Global Technologies, Inc.
 * @license	www.yukoglobal.com/user_guide/license.html
 * @since	Version 1.0, 16th July 2013
 * @filesource
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class index extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('login_model');
    }

    /**
     * Show all news with pagination
     * @param int $page_id page number
     * @param string $search_dump_id search encript ID
     * @param string $sort  sorting method
     * @param string $fieldname field for sort
     * 
     */
    function index() {

        if ($this->session->userdata('username') != '') {
		
            redirect(site_url('admin/dashboard'));
			
        }else{
		
		    redirect(site_url('admin/login'));
		
		}

        
    }

}

/* End of file login.php */
/* Location: ./application/controllers/login.php */