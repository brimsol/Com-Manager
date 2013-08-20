<?php

class Add_items extends CI_Controller {
               
	function __construct()
	{
 		parent::__construct();
		$this->load->model('item_model');
		$this->load->model('fellowship_model');
	}	
	function index()
	{			
		$this->form_validation->set_rules('item_name', 'Item Name', 'required|trim|xss_clean|max_length[100]');			
		$this->form_validation->set_rules('fellowship_id', 'Fellowship', 'required|max_length[5]');			
		$this->form_validation->set_rules('item_description', 'Description', 'trim|xss_clean|max_length[200]');
			
		$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
	    
		$data['fellowships']=$this->fellowship_model->get_all();
		
		if ($this->form_validation->run() == FALSE) // validation hasn't been passed
		{
			$this->load->view('admin/insert_item_view',$data);
		}
		else // passed validation proceed to post success logic
		{
		 	// build array for the model
			
			$form_data = array(
					       	'item_name' => set_value('item_name'),
					       	'fellowship_id' => set_value('fellowship_id'),
					       	'item_description' => set_value('item_description')
						);
					
			// run insert model to write data to db
		
			if ($this->add_items_model->insert($form_data) != FALSE) // the information has therefore been successfully saved in the db
			{
				redirect('add_items/success');   // or whatever logic needs to occur
			}
			else
			{
			echo 'An error occurred saving your information. Please try again later';
			// Or whatever error handling is necessary
			}
		}
	}
	function success()
	{
			echo 'this form has been successfully submitted with all validation being passed. All messages or logic here. Please note
			sessions have not been used and would need to be added in to suit your app';
	}
}
