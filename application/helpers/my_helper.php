<?php
/*
 * Scope for common functions
 * 
 * search function for manupualting the search query in each section
 * the serch query insert to table
 * @param $postvalues
 * @param $redirecturl
 */
function search_function($postvalues = array(), $redirecturl = '') {
    $CI = &get_instance();
    $CI->load->library('input');
    $CI->load->model('searchdump_model');
    if (sizeof($postvalues) > 0) {
        $status = 0;
        foreach ($postvalues as $key => $values) {
            if ($CI->input->post($key) != '') {
                $status = 1;
                $srch[$key] = trim($CI->input->post($key));
            }
        }
        if ($status == 1) {
            $search_id = md5(time() . rand(1, 10000));
            $CI->searchdump_model->insertSearchItem(array('search_id'=>$search_id, 'search_value'=>serialize($srch)));

            redirect($redirecturl . '1/' . $search_id);
        }
        else
            redirect($redirecturl);
    }
    else
        redirect($redirecturl);
}
/*
 * get Search dump 
 * @param string $search_dump_id

 */
function getSearchItem($search_dump_id = null )
{
    $CI = &get_instance();
    $CI->load->model('searchdump_model');
    return $CI->searchdump_model->getSearchItem($search_dump_id);
}

function getAllState() {
    $arrState = array();
    $CI = &get_instance();
    $CI->load->model('Basic_model');
    $arrState = $CI->Basic_model->statelist();
    return $arrState;
}

function getLang() {
    $arrLang = array();
    $CI = &get_instance();
    $CI->load->model('Basic_model');
    $arrLang = $CI->Basic_model->getAllLang();
    return $arrLang;
}

function getlangDtl($langId) {
    $arrLangDlt = array();
    $CI = &get_instance();
    $CI->load->model('Basic_model');
    $arrLangDlt = $CI->Basic_model->getLangDetails();
    return $arrLangDlt;
}

?>
