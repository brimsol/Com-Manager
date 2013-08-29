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
		$crud -> set_table('items') -> set_subject('Item') -> columns('item_name', 'item_code', 'fellowship_id', 'sub_fellowship_id', 'item_description') -> display_as('item_name', 'Item') -> display_as('item_description', 'Item Description') -> display_as('fellowship_id', 'Association') -> display_as('sub_fellowship_id', 'Sub Association');
		$crud -> fields('item_name', 'item_code', 'item_description', 'fellowship_id', 'sub_fellowship_id');
		$crud -> required_fields('item_name', 'item_code', 'fellowship_id');
		$crud -> set_rules('item_code', 'Item Code', 'is_unique[items.item_code]|required');
		$crud -> set_relation('fellowship_id', 'fellowships', 'fellowship_name');
		$crud -> set_relation('sub_fellowship_id', 'sub_fellowships', 'sub_fellowship_name');

		$crud -> callback_add_field('sub_fellowship_id', array($this, 'empty_subaso_dropdown_select'));
		$crud -> callback_edit_field('sub_fellowship_id', array($this, 'empty_subaso_dropdown_select'));

		$output = $crud -> render();

		$dd_data = array(
		//GET THE STATE OF THE CURRENT PAGE - E.G LIST | ADD
		'dd_state' => $crud -> getState(),
		//SETUP YOUR DROPDOWNS
		//Parent field item always listed first in array, in this case countryID
		//Child field items need to follow in order, e.g stateID then cityID
		'dd_dropdowns' => array('fellowship_id', 'sub_fellowship_id'),
		//SETUP URL POST FOR EACH CHILD
		//List in order as per above
		'dd_url' => array('', site_url() . 'cm/sub_asso/'),
		//LOADER THAT GETS DISPLAYED NEXT TO THE PARENT DROPDOWN WHILE THE CHILD LOADS
		'dd_ajax_loader' => base_url('assets/admin/img') . '/' . 'ajax-loader.gif');
		$output -> dropdown_setup = $dd_data;
		$output -> menu = 'Competitions';
		$this -> _layout_output($output);
	}

	function empty_subaso_dropdown_select() {
		//CREATE THE EMPTY SELECT STRING
		$empty_select = '<select name="sub_fellowship_id" class="chosen-select" data-placeholder="Sub Association" style="width: 300px; display: none;">';
		$empty_select_closed = '</select>';
		//GET THE ID OF THE LISTING USING URI
		$listingID = $this -> uri -> segment(4);

		//LOAD GCRUD AND GET THE STATE
		$crud = new grocery_CRUD();
		$state = $crud -> getState();

		//CHECK FOR A URI VALUE AND MAKE SURE ITS ON THE EDIT STATE
		if (isset($listingID) && $state == "edit") {
			//GET THE STORED STATE ID
			$this -> db -> select('fellowship_id,sub_fellowship_id') -> from('items') -> where('item_id', $listingID);
			$db = $this -> db -> get();
			$row = $db -> row(0);
			//var_dump($row);
			$fellowsip_ID = $row -> fellowship_id;
			$sub_fellowship_ID = $row -> sub_fellowship_id;

			//GET THE STATES PER COUNTRY ID
			$this -> db -> select('*') -> from('sub_fellowships') -> where('fellowship_id', $sub_fellowship_ID);
			$db = $this -> db -> get();
			/*
			 if($db->result() > 0){

			 $crud -> required_fields('sub_fellowship_id');
			 }
			 */
			//APPEND THE OPTION FIELDS WITH VALUES FROM THE STATES PER THE COUNTRY ID
			foreach ($db->result() as $row) :
				if ($row -> fellowship_id == $sub_fellowship_ID) {
					$empty_select .= '<option value="' . $row -> sub_fellowship_id . '" selected="selected">' . $row -> sub_fellowship_name . '</option>';
				} else {
					$empty_select .= '<option value="' . $row -> sub_fellowship_id . '">' . $row -> sub_fellowship_name . '</option>';
				}
			endforeach;

			//RETURN SELECTION COMBO
			return $empty_select . $empty_select_closed;
		} else {
			//RETURN SELECTION COMBO
			return $empty_select . $empty_select_closed;
		}
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
		$output -> menu = 'Associations';
		$this -> _layout_output($output);
	}

	public function sub_associations() {
		//$this -> grocery_crud -> set_table('items');
		//$output = $this -> grocery_crud -> render();
		$crud = new grocery_CRUD();
		$crud -> set_table('sub_fellowships') -> set_subject('Sub Association') -> columns('fellowship_id', 'sub_fellowship_name', 'sub_fellowship_description') -> display_as('fellowship_id', 'Association Name') -> display_as('sub_fellowship_name', 'Sub Association Name') -> display_as('sub_fellowship_description', 'Sub Association Description');
		$crud -> fields('fellowship_id', 'sub_fellowship_name', 'sub_fellowship_description');
		$crud -> required_fields('fellowship_id', 'sub_fellowship_name');
		$crud -> set_relation('fellowship_id', 'fellowships', 'fellowship_name');
		$output = $crud -> render();
		$output -> menu = 'Associations';
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
		$output -> menu = 'Districts';
		$this -> _layout_output($output);
	}
	
	public function church() {
		//$this -> grocery_crud -> set_table('items');
		//$output = $this -> grocery_crud -> render();
		$crud = new grocery_CRUD();
		$crud -> set_table('church') -> set_subject('Church') 
		-> columns('church_name', 'church_address') -> display_as('church_name', 'Church Name')
		-> display_as('church_address', 'Church Place');
		$crud -> fields('church_name', 'church_address');
		$crud -> required_fields('church_name');
		//$crud -> set_relation('fellowship_id', 'fellowships', 'fellowship_name');
		$output = $crud -> render();
		$output -> menu = 'Church';
		$this -> _layout_output($output);
	}

	public function participants() {
		//$this -> grocery_crud -> set_table('items');
		//$output = $this -> grocery_crud -> render();
		$crud = new grocery_CRUD();
		$crud -> set_table('participants') -> set_subject('Participant') -> columns('participant_chess', 'participant_name', 'participant_association', 'participant_church', 'participant_district', 'participant_dob', 'participant_age', 'participant_youth') -> display_as('participant_chess', 'Chess No.') -> display_as('participant_association', 'Asso.') -> display_as('participant_name', 'Name') -> display_as('participant_church', 'Church') -> display_as('participant_dob', 'DoB') -> display_as('participant_age', 'Age') -> display_as('participant_youth', 'Youth') -> display_as('participant_district', 'District');
		$crud -> fields('participant_chess', 'participant_name', 'participant_association', 'participant_church', 'participant_district', 'participant_dob', 'participant_age', 'participant_youth');
		$crud -> set_relation('participant_district', 'districts', 'district_name') 
		-> set_relation('participant_church', 'church', '{church_name}-{church_address}');
		$crud -> required_fields('participant_name', 'participant_chess', 'participant_church', 'participant_association', 'participant_district');
		$output = $crud -> render();
		$output -> menu = 'Participants';
		$this -> _layout_output($output);
	}
public function results() {
		//$this -> grocery_crud -> set_table('items');
		//$output = $this -> grocery_crud -> render();
		$crud = new grocery_CRUD();
		$crud -> set_table('results') -> set_subject('Participant') 
		-> columns('item_id', 'first_place', 'second_place', 'third_place') 
		-> display_as('item_id', 'Com. Item') 
		-> display_as('first_place', 'First Place') 
		-> display_as('second_place', 'Second Place') 
		-> display_as('third_place', 'Third Place'); 
		$crud -> fields('item_id', 'first_place', 'second_place', 'third_place');
		$crud -> set_relation('item_id', 'items', '{item_code}-{item_name}') 
		-> set_relation('first_place', 'participants', '{participant_chess}-{participant_name}')
		-> set_relation('second_place', 'participants', '{participant_chess}-{participant_name}')
		-> set_relation('third_place', 'participants', '{participant_chess}-{participant_name}');
		$crud -> required_fields('item_id');
		$output = $crud -> render();
		$output -> menu = 'Results';
		$this -> _layout_output($output);
	}

	public function participants_items() {
		//$this -> grocery_crud -> set_table('items');
		//$output = $this -> grocery_crud -> render();
		$crud = new grocery_CRUD();
		$crud -> set_table('participants_items') -> set_subject('participants for Each Item') 
		-> columns('participant_id', 'item_id', 'district_id') 
		-> display_as('district_id', 'District') 
		-> display_as('participant_id', 'Name & Chess') 
		//-> display_as('fellowship_id', 'Association')
		//-> display_as('sub_fellowship_id', 'Sub Association') 
		-> display_as('item_id', 'Item Name');
		$crud -> fields('district_id', 'participant_id',  'item_id');
		$crud -> required_fields('district_name');
		$crud -> set_relation('participant_id', 'participants', '{participant_chess} - {participant_name}')
		-> set_relation('district_id', 'districts', 'district_name')
		//-> set_relation('fellowship_id', 'fellowships', 'fellowship_name')
		-> set_relation('item_id', 'items', '{item_code}-{item_name}');
		//-> set_relation('sub_fellowship_id', 'sub_fellowships', 'sub_fellowship_name');
		///$output = $crud -> render();
		//$this -> _layout_output($output);
		$crud -> callback_add_field('participant_id', array($this, 'empty_subpar_dropdown_select'));
		$crud -> callback_edit_field('participant_id', array($this, 'empty_subpar_dropdown_select'));
		
		//$crud -> callback_add_field('sub_fellowship_id', array($this, 'empty_subaso_dropdown_select'));
		//$crud -> callback_edit_field('sub_fellowship_id', array($this, 'empty_subaso_dropdown_select'));
        
        //$crud -> callback_add_field('item_id', array($this, 'empty_item_dropdown_select'));
		//$crud -> callback_edit_field('item_id', array($this, 'empty_item_dropdown_select'));
		
		$output = $crud -> render();

		$dd_data = array(
		//GET THE STATE OF THE CURRENT PAGE - E.G LIST | ADD
		'dd_state' => $crud -> getState(),
		//SETUP YOUR DROPDOWNS
		//Parent field item always listed first in array, in this case countryID
		//Child field items need to follow in order, e.g stateID then cityID
		'dd_dropdowns' => array('district_id','participant_id'),
		//SETUP URL POST FOR EACH CHILD
		//List in order as per above
		'dd_url' => array('',site_url() . 'cm/sub_part/'),
		//LOADER THAT GETS DISPLAYED NEXT TO THE PARENT DROPDOWN WHILE THE CHILD LOADS
		'dd_ajax_loader' => base_url('assets/admin/img') . '/' . 'ajax-loader.gif');
		$output -> dropdown_setup = $dd_data;
		$output -> menu = 'Participants';
		$this -> _layout_output($output);
	}

	function empty_item_dropdown_select() {
		//CREATE THE EMPTY SELECT STRING
		$empty_select = '<select name="item_id" class="chosen-select" data-placeholder="Competition Item" style="width: 300px; display: none;">';
		$empty_select_closed = '</select>';
		//GET THE ID OF THE LISTING USING URI
		$listingID = $this -> uri -> segment(4);

		//LOAD GCRUD AND GET THE STATE
		$crud = new grocery_CRUD();
		$state = $crud -> getState();

		//CHECK FOR A URI VALUE AND MAKE SURE ITS ON THE EDIT STATE
		if (isset($listingID) && $state == "edit") {
			//GET THE STORED STATE ID
			$this -> db -> select('sub_fellowship_id,item_id') -> from('participants_items') -> where('participants_items_id', $listingID);
			$db = $this -> db -> get();
			$row = $db -> row(0);
			//var_dump($row);
			//$item_ID = $row -> item_id;
			$sub_fellowship_ID = $row -> sub_fellowship_id;

			//GET THE STATES PER COUNTRY ID
			$this -> db -> select('*') -> from('items') -> where('sub_fellowship_id', $sub_fellowship_ID);
			$db = $this -> db -> get();
			/*
			 if($db->result() > 0){

			 $crud -> required_fields('sub_fellowship_id');
			 }
			 */
			//APPEND THE OPTION FIELDS WITH VALUES FROM THE STATES PER THE COUNTRY ID
			foreach ($db->result() as $row) :
				if ($row -> sub_fellowship_id == $sub_fellowship_ID) {
					$empty_select .= '<option value="' . $row -> item_id . '" selected="selected">' . $row -> item_name . '</option>';
				} else {
					$empty_select .= '<option value="' . $row -> item_id . '">' . $row -> item_name . '</option>';
				}
			endforeach;

			//RETURN SELECTION COMBO
			return $empty_select . $empty_select_closed;
		} else {
			//RETURN SELECTION COMBO
			return $empty_select . $empty_select_closed;
		}
	}
function empty_subpar_dropdown_select() {
		//CREATE THE EMPTY SELECT STRING
		$empty_select = '<select name="participant_id" class="chosen-select" data-placeholder="Paticipants" style="width: 300px; display: none;">';
		$empty_select_closed = '</select>';
		//GET THE ID OF THE LISTING USING URI
		$listingID = $this -> uri -> segment(4);

		//LOAD GCRUD AND GET THE STATE
		$crud = new grocery_CRUD();
		$state = $crud -> getState();

		//CHECK FOR A URI VALUE AND MAKE SURE ITS ON THE EDIT STATE
		if (isset($listingID) && $state == "edit") {
			//GET THE STORED STATE ID
			$this -> db -> select('district_id') -> from('participants_items') -> where('participant_id', $listingID);
			$db = $this -> db -> get();
			$row = $db -> row(0);
			//var_dump($row);
			//$item_ID = $row -> item_id;
			$district_ID = $row -> district_id;
			//GET THE STATES PER COUNTRY ID
			$this -> db -> select('participant_id,participant_name,participant_chess') -> from('participants') -> where('participant_district', $district_ID);
			$db = $this -> db -> get();
			/*
			 if($db->result() > 0){

			 $crud -> required_fields('sub_fellowship_id');
			 }
			 */
			//APPEND THE OPTION FIELDS WITH VALUES FROM THE STATES PER THE COUNTRY ID
			foreach ($db->result() as $row) :
				if ($row -> district_id == $district_ID) {
					$empty_select .= '<option value="' . $row -> participant_id . '" selected="selected">' .$row -> participant_chess.'-'. $row -> participant_name . '</option>';
				} else {
					$empty_select .= '<option value="' . $row -> participant_id . '">' .$row -> participant_chess.'-'. $row -> participant_name . '</option>';
				}
			endforeach;

			//RETURN SELECTION COMBO
			return $empty_select . $empty_select_closed;
		} else {
			//RETURN SELECTION COMBO
			return $empty_select . $empty_select_closed;
		}
	}

	//GET JSON OF STATES
	function sub_asso() {
		$fellowsip_id = $this -> uri -> segment(3);

		$this -> db -> select("*") -> from('sub_fellowships') -> where('fellowship_id', $fellowsip_id);
		$db = $this -> db -> get();
		
        $array = array();
        if(count($db->result())>0){
		foreach ($db->result() as $row) :
			$array[] = array("value" => $row -> sub_fellowship_id, "property" => $row -> sub_fellowship_name);
		endforeach;
		}else{
			
			$array[] = array("value" => "no".$fellowsip_id, "property" => "No record");
		}
		echo json_encode($array);
		exit ;
	}
	
	function sub_part() {
		$participant_id = $this -> uri -> segment(3);

		$this -> db -> select("*") -> from('participants') -> where('participant_district', $participant_id);
		$db = $this -> db -> get();
		
        $array = array();
		foreach ($db->result() as $row) :
			$array[] = array("value" => $row -> participant_id, "property" => $row -> participant_chess.'-'.$row -> participant_name);
		endforeach;
		echo json_encode($array);
		exit ;
	}
	/*
	function all_asso() {
			$participant_id = $this -> uri -> segment(3);
	
			$this -> db -> select("*") -> from('fellowships');
			$db = $this -> db -> get();
						  $array = array();
			foreach ($db->result() as $row) :
				$array[] = array("value" => $row -> fellowship_id, "property" => $row -> fellowship_name);
			endforeach;
			echo json_encode($array);
			exit ;
		}*/
	
	
	/*
	function sub_items() {
			$item_id = $this -> uri -> segment(3);
										$val_check= substr($item_id, 0,2);
			if($val_check != "no"){
				$this -> db -> select("*") -> from('items') -> where('sub_fellowship_id', $item_id);
				$db = $this -> db -> get();
							  $array = array();
				foreach ($db->result() as $row) :
					$array[] = array("value" => $row -> item_id, "property" => $row -> item_name);
				endforeach;
				
			}else{
				
				$val= substr($item_id, 2);
				
				$this -> db -> select("*") -> from('items') -> where('fellowship_id', $val);
				$db = $this -> db -> get();
							  $array = array();
				foreach ($db->result() as $row) :
					$array[] = array("value" => $row -> item_id, "property" => $row -> item_name);
				endforeach;
				
			}
			echo json_encode($array);
			exit ;
		}*/
	

	function _layout_output($output = null) {
		$this -> load -> view('admin/insert_item_view', $output);
	}

}

/* End of file main.php */
/* Location: ./application/controllers/main.php */
