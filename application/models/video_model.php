<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Model File: video_model.php
 * Scope: data processing for video table
 */
class Video_model extends MY_Model {
    /* asign the table name */

    public $_table = TBL_VIDEO;

    /**
     * Constructor of this model
     */
    function __construct() {
        parent::__construct('default');
    }

    /**
     * get videos 
     *
     * @param string $sort
     * @param string $fieldname
     * @param string $page_id
     * @param string $search_arr
     * @return array|boolean Query data on success, FALSE otherwise
     */
    function getAllVideos($sort, $fieldname, $page_id = 1, $search_arr = array()) {
        /*
         * creating the where clause for the search query
         */
        if (count($search_arr) > 0) {
            if (isset($search_arr['title']) && $search_arr['title'] != '')
                $this->like('title', $search_arr['title']);
        }
       
        $result = array();
        $this->order_by($fieldname, $sort);        
        $this->num_rows = $this->count_by();
        $count = 0;
        if ($this->num_rows > 0) {
            $start = ($page_id - 1) * ITEM_PER_PAGE;
            $this->limit(ITEM_PER_PAGE, $start);
            $count = $this->count_by();
            $result = $this->get_all();
        }
        return $count > 0 ? $result : false;
    }

}

/* End of file video_model.php */
/* Location: ./application/model/welcome_model.php */

