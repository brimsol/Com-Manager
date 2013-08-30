<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Cmv extends CI_Controller {

	function __construct() {
		parent::__construct();

		$this -> load -> library('grocery_CRUD');
		if ($this -> session -> userdata('username') == '') {
			redirect(site_url('login'));
		}

	}

	public function index() {
		//echo '<h1>Oops! You landed on "Moon"!! Don\'t worry just hit "Back" button.</h1>';
		//Just an example to ensure that we get into the function
		//die();
		$this->load->view('admin/dashboard_view');
	}
	
	
	

}

/* End of file main.php */
/* Location: ./application/controllers/main.php */
