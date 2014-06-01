<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Contacts_defaultData extends CI_Model {

    function getData() {
        return array('TaskHeader' => 'Contacts');
    }
function getFields(){
    $rtn = array('id',
        'date_entered',
        'date_modified',
        'modified_user_id',
        'created_by',
        'description',
        'deleted',
        'assigned_user_id',
        'salutation',
        'first_name',
        'last_name',
        'title',
        'department',
        'do_not_call',
        'phone_home',
        'phone_mobile',
        'phone_work',
        'phone_other',
        'phone_fax',
        'primary_address_street',
        'primary_address_city',
        'primary_address_state',
        'primary_address_postalcode',
        'primary_address_country',
        'alt_address_street',
        'alt_address_city',
        'alt_address_state',
        'alt_address_postalcode',
        'alt_address_country',
        'assistant',
        'assistant_phone',
        'lead_source',
        'reports_to_id',
        'birthdate',
        'campaign_id',
        'email1');
    return $rtn;
}
function getSearchFields(){
    $rtn = array('id',
        'salutation',
        'first_name',
        'last_name',
//        'title',
//        'department',
//        'phone_home',
         'phone_mobile'//,
//        'phone_work',
//        'phone_other',
//        'phone_fax',
//        'primary_address_street',
//        'primary_address_city',
//        'primary_address_state',
//        'primary_address_postalcode',
//        'primary_address_country',
//        'alt_address_street',
//        'alt_address_city',
//        'alt_address_state',
//        'alt_address_postalcode',
//        'alt_address_country',
//        'email1');
        );
    return $rtn;
}
}

?>