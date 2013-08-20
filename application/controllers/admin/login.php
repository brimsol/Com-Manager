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

class Login extends CI_Controller {

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
        }

        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {

            $this->load->view('admin/login_view');
            
        } else {

            $query = $this->login_model->login(set_value('username'), set_value('password'));

            if ($query == FALSE) {

                $this->ci_alerts->set('error', 'Invalid username or password');
                redirect('admin/login');
            } else {

                $login_info = array('username' => $query['username'], 'role' => $query['role']);
                $this->session->set_userdata($login_info);
                $this->login_model->update_login($query['user_id'], date('Y-m-d H:i:s', time()), $this->input->ip_address());
                redirect('admin/dashboard');
            }
        }
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