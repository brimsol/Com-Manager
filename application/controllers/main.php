<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Main extends CI_Controller {

	function __construct() {
		parent::__construct();

		/* Standard Libraries of codeigniter are required */
		$this -> load -> database();
		$this -> load -> helper('url');
		/* ------------------ */

		$this -> load -> library('grocery_CRUD');

	}

	public function index() {
		echo "<h1>Welcome to the world of Codeigniter</h1>";
		//Just an example to ensure that we get into the function
		die();
	}

	public function items() {
		//$this -> grocery_crud -> set_table('items');
		//$output = $this -> grocery_crud -> render();
		$crud = new grocery_CRUD();
		$crud -> set_table('items') -> set_subject('Item') -> columns('item_name', 'fellowship_id', 'item_description') -> display_as('item_name', 'Item') -> display_as('item_description', 'Item Description') -> display_as('fellowship_id', 'Association');
		$crud -> fields('item_name', 'item_description', 'fellowship_id');
		$crud -> required_fields('item_name', 'fellowship_id');
		$crud -> set_relation('fellowship_id', 'fellowships', 'fellowship_name');
		$output = $crud -> render();
		$this -> _example_output($output);
	}

	function _example_output($output = null) {
		$this -> load -> view('admin/insert_item_view', $output);
	}

}

/* End of file main.php */
/* Location: ./application/controllers/main.php */
