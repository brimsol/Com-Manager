<?php

class Item_model extends MY_Model {

	function __construct() {
		parent::__construct();

	}

	protected $_table = 'items';
	protected $primary_key = 'item_id';

}
