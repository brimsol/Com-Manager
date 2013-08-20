<?php

class Fellowship_model extends MY_Model {

	function __construct() {
		parent::__construct();

	}

	protected $_table = 'fellowships';
	protected $primary_key = 'fellowship_id';

}
