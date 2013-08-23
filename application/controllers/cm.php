<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Cm extends CI_Controller {

	function __construct() {
		parent::__construct();

		/* Standard Libraries of codeigniter are required */
		$this -> load -> database();
		$this -> load -> helper('url');
		/* ------------------ */

		$this -> load -> library('grocery_CRUD');
		if ($this -> session -> userdata('username') == '') {
			redirect(site_url('login'));
		}

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
		$crud -> set_table('items') -> set_subject('Item') 
		-> columns('item_name', 'fellowship_id', 'sub_fellowship_id','item_description') 
		-> display_as('item_name', 'Item') 
		-> display_as('item_description', 'Item Description') 
		-> display_as('fellowship_id', 'Association')
		-> display_as('sub_fellowship_id', 'Sub Association');
		$crud -> fields('item_name', 'item_description', 'fellowship_id', 'sub_fellowship_id');
		$crud -> required_fields('item_name', 'fellowship_id');
		$crud -> set_relation('fellowship_id', 'fellowships', 'fellowship_name');
		$crud -> set_relation('sub_fellowship_id', 'sub_fellowships', 'sub_fellowship_name');
		
		$crud->callback_add_field('sub_fellowship_id', array($this, 'empty_subaso_dropdown_select'));
		$crud->callback_edit_field('sub_fellowship_id', array($this, 'empty_subaso_dropdown_select'));
		
		$output = $crud -> render();
		$output->menu = 'Competitions';
		$this -> _layout_output($output);
	}

	public function associations() {
		//$this -> grocery_crud -> set_table('items');
		//$output = $this -> grocery_crud -> render();
		$crud = new grocery_CRUD();
		$crud -> set_table('fellowships') -> set_subject('Association') -> columns('fellowship_name', 'fellowship_description') -> display_as('fellowship_name', 'Association Name') -> display_as('fellowship_description', 'Association Description');
		$crud -> fields('fellowship_name', 'fellowship_description');
		$crud -> required_fields('fellowship_name');
		//$crud -> set_relation('fellowship_id', 'fellowships', 'fellowship_name');
		$output = $crud -> render();
		$output->menu = 'Associations';
		$this -> _layout_output($output);
	}

	public function sub_associations() {
		//$this -> grocery_crud -> set_table('items');
		//$output = $this -> grocery_crud -> render();
		$crud = new grocery_CRUD();
		$crud -> set_table('sub_fellowships') -> set_subject('Sub Association') 
		-> columns('fellowship_id','sub_fellowship_name', 'sub_fellowship_description') 
		-> display_as('fellowship_id', 'Association Name') 
		-> display_as('sub_fellowship_name', 'Sub Association Name') 
		-> display_as('sub_fellowship_description', 'Sub Association Description');
		$crud -> fields('fellowship_id','sub_fellowship_name', 'sub_fellowship_description');
		$crud -> required_fields('fellowship_id','sub_fellowship_name');
		$crud -> set_relation('fellowship_id', 'fellowships', 'fellowship_name');
		$output = $crud -> render();
		$output->menu = 'Associations';
		$this -> _layout_output($output);
	}

	public function districts() {
		//$this -> grocery_crud -> set_table('items');
		//$output = $this -> grocery_crud -> render();
		$crud = new grocery_CRUD();
		$crud -> set_table('districts') -> set_subject('District') -> columns('district_name', 'district_code') -> display_as('district_name', 'District Name') -> display_as('district_code', 'District Code');
		$crud -> fields('district_name', 'district_code');
		$crud -> required_fields('district_name');
		//$crud -> set_relation('fellowship_id', 'fellowships', 'fellowship_name');
		$output = $crud -> render();
		$output->menu = 'Districts';
		$this -> _layout_output($output);
	}

	public function participants() {
		//$this -> grocery_crud -> set_table('items');
		//$output = $this -> grocery_crud -> render();
		$crud = new grocery_CRUD();
		$crud -> set_table('participants') -> set_subject('Participant') -> columns('participant_chess', 'participant_name', 'participant_association', 'participant_church', 'participant_district', 'participant_dob', 'participant_age', 'participant_youth') -> display_as('participant_chess', 'Chess No.') -> display_as('participant_association', 'Asso.') -> display_as('participant_name', 'Name') -> display_as('participant_church', 'Church') -> display_as('participant_dob', 'DoB') -> display_as('participant_age', 'Age') -> display_as('participant_youth', 'Youth') -> display_as('participant_district', 'District');
		$crud -> fields('participant_chess', 'participant_name', 'participant_association', 'participant_church', 'participant_district', 'participant_dob', 'participant_age', 'participant_youth');
		$crud -> set_relation('participant_district', 'districts', 'district_name') -> set_relation('participant_association', 'fellowships', 'fellowship_name');
		$crud -> required_fields('participant_name', 'participant_chess', 'participant_church', 'participant_association', 'participant_district');
		$output = $crud -> render();
		$this -> _layout_output($output);
	}


function empty_state_dropdown_select()
	{
		//CREATE THE EMPTY SELECT STRING
		$empty_select = '<select name="stateID" class="chosen-select" data-placeholder="Select State/Province" style="width: 300px; display: none;">';
		$empty_select_closed = '</select>';
		//GET THE ID OF THE LISTING USING URI
		$listingID = $this->uri->segment(4);
		
		//LOAD GCRUD AND GET THE STATE
		$crud = new grocery_CRUD();
		$state = $crud->getState();
		
		//CHECK FOR A URI VALUE AND MAKE SURE ITS ON THE EDIT STATE
		if(isset($listingID) && $state == "edit") {
			//GET THE STORED STATE ID
			$this->db->select('countryID, stateID')
					 ->from('customers')
					 ->where('customerNumber', $listingID);
			$db = $this->db->get();
			$row = $db->row(0);
			$countryID = $row->countryID;
			$stateID = $row->stateID;
			
			//GET THE STATES PER COUNTRY ID
			$this->db->select('*')
					 ->from('state')
					 ->where('countryID', $countryID);
			$db = $this->db->get();
			
			//APPEND THE OPTION FIELDS WITH VALUES FROM THE STATES PER THE COUNTRY ID
			foreach($db->result() as $row):
				if($row->state_id == $stateID) {
					$empty_select .= '<option value="'.$row->state_id.'" selected="selected">'.$row->state_title.'</option>';
				} else {
					$empty_select .= '<option value="'.$row->state_id.'">'.$row->state_title.'</option>';
				}
			endforeach;
			
			//RETURN SELECTION COMBO
			return $empty_select.$empty_select_closed;
		} else {
			//RETURN SELECTION COMBO
			return $empty_select.$empty_select_closed;	
		}
	}

//GET JSON OF STATES
	function get_states()
	{
		$countryID = $this->uri->segment(3);
		
		$this->db->select("*")
				 ->from('state')
				 ->where('countryID', $countryID);
		$db = $this->db->get();
		
		$array = array();
		foreach($db->result() as $row):
			$array[] = array("value" => $row->state_id, "property" => $row->state_title);
		endforeach;
		
		echo json_encode($array);
		exit;
	}

	function _layout_output($output = null) {
		$this -> load -> view('admin/insert_item_view', $output);
	}

}

/* End of file main.php */
/* Location: ./application/controllers/main.php */
