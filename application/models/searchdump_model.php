<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Model File: video_model.php
 * Scope: data processing for search table
 */
class Searchdump_model extends MY_Model {
    /* asign the table name */

    public $_table = TBL_SEARCH_DUMP;

    /**
     * Constructor of this model
     */
    function __construct() {
        parent::__construct('default');
    }

    /**
     * get Search dump 
     *
     * @param string $search_dump_id
     * 
     * @return array|boolean Query data on success, FALSE otherwise
     */
    function getSearchItem($search_dump_id) {
        /*
         * creating the where clause for the search query
         */
        $result = $this->get_by('search_id',$search_dump_id);
        $count = $this->count_by('search_id',$search_dump_id);
        return $count > 0 ? $result : false;
    }
    /*
     * insert search item
     * @param array $search
     * return insert id
     */
    function insertSearchItem($search = array())
    {
        $insert_id = $this->insert($search);
        return $insert_id;
    }

}

/* End of file video_model.php */
/* Location: ./application/model/welcome_model.php */


