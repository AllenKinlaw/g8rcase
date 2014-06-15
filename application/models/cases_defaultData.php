<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of cases_defaultData
 *
 * @author allen
 */
class cases_defaultData extends CI_Model {

    function getData() {
        return array('TaskHeader' => 'Cases');
    }

    function getFields() {
        $rtn = array('id',
            'name',
            'date_entered',
            'date_modified',
            'modified_user_id',
            'created_by',
            'description',
            'deleted',
            'assigned_user_id',
            'case_number',
            'type',
            'status',
            'priority',
            'resolution',
            'work_log',
            'account_id');
        return $rtn;
    }

    function getSearchFields() {
        $rtn = array('id',
            'name',
//            'date_entered',
//            'date_modified',
//            'modified_user_id',
//            'created_by',
            'description',
            'deleted',
            'assigned_user_id',
            'case_number',
            'type',
            'status',
//            'priority',
            'resolution',
            'work_log'//,
//            'account_id'
            );

        return $rtn;
    }

}
