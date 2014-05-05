<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class TheModel extends CI_Model {

    var $fieldlist = array();

//    public function __construct() {
//        parent::__construct();
//
//        $this->load->library('sugar_rest');
//
//         $url = 'http://sugarcrm/service/v4_1/rest.php';
//         $user = 'admin';
//         $pass = 'l12007';
//        $this->sugar_rest->Sugar_REST($url, $user, $pass);
//    }

    function connectSugar($user = 'admin', $pass = 'l12007', $save = true) {
//        require_once 'sugar_rest.php';
        $url = 'http://sugarcrm/service/v4_1/rest.php';
        //$sugar = new Sugar_REST();
        $this->sugar_rest->Sugar_REST($url, $user, $pass);
        return $sugar;
    }

    function validateUser($user, $pass) {
 //       require_once 'sugar_rest.php';
//        $sugar = new Sugar_REST();
       $sugar = $this->connectSugar($user, $pass, false);
       if ($this->sugar_rest->is_logged_in())
            return true;
        return false;
    }

    function finduser($fields, $options) {
//        require_once 'sugar_rest.php';
//        $sugar = new Sugar_REST();
//        $sugar = $this->connectSugar();
        $data = $this->getRecordWhere('Users', $fields, $options);
        return $data;
    }

    function addRecord($module, $theRecord) {
//        require_once 'sugar_rest.php';
        $values = $theRecord;
//        $sugar = $this->connectSugar();
        return $this->sugar_rest->set($module, $values);
    }

    function deleteRecord($id) {
//        $sugar = $this->connectSugar();
    }

    function updateRecord($module, $theRecord, $sessionvars) {
        $id = (string) $sessionvars['id'];
        $theRecord['id'] = (string) $id;
        return $this->addRecord($module, $theRecord);
    }

    function getRecordWhere($module, $fields, $options) {
//        $sugar = $this->connectSugar();
        $data['_cnt'] = 0;
        $i = 0;
        $results = $this->sugar_rest->get(ucfirst($module), $fields, $options);
        foreach ($results as $key => $value) {
            $fieldlst = array_keys($value); // return all of the fields
            $i++;
            foreach ($fieldlst as $dfield) {
                $data[$dfield] = $value[$dfield];
            }
        }
        $data['_cnt'] = $i;
        return $data;
    }

    function updateHash($user_hash, $id) {
        $query = "UPDATE Users SET user_hash='$user_hash', pwd_last_changed='" . now() . "' where id='$id'";
        $this->db->query($query);
        return $this->db->affected_rows();
        ;
    }

    function getRecord($module, $id, $fields) {
//        $sugar = $this->connectSugar();

        $this->getfieldlist($fields);
        $fieldlst = $this->fieldlist;
        $options['where'] = $module . ".id = '" . $id . "'";
        $results = $this->sugar_rest->get(ucfirst($module), $fieldlst, $options);
        foreach ($results as $key => $value) {
            foreach ($fieldlst as $dfield) { //looping through and pulling only the requested fields
                if (isset($value[$dfield])) {
                    $data[$dfield] = $value[$dfield];
                }
            }
        }
        return $data;
    }

    function getfieldlist($fields) {
        //require_once 'layoutdefs/' . $module . '.php';
        //$fields = $this->loaddisplayfields($module);
        foreach ($fields as $field => $attributes) {
            $fname = strtolower($field);

            if ($attributes['ftype'] != 'group') {

                $this->fieldlist[] = $fname;
            } else {
                $this->getfieldlist($attributes['fields']);
            }
        }
    }

    function getListFields($module) {
        //returns only the fields required for displayplying the long list 
        //require_once 'layoutdefs/' . $module . '.php';
        $library = $module.'_layouts';
        $this->load->library($library);
        $data['displayModel'] = $this->$library->listViewDefs($module . 'list');
        foreach ($data['displayModel'] as $row => $fields) {
            // echo 'Adding '. strtolower($key). ' to Field Array <br>';
            foreach ($fields as $field) {
                $data['fieldlist'][] = strtolower($field);
            }
//    echo $key;
        }
        return $data;
    }

    function getRecords($module) {
//        $sugar = $this->connectSugar();

        $listModel = $this->getListFields($module);
        $fieldlist = $listModel['fieldlist'];
        $data['listmodel'] = $listModel['displayModel'];
        $results = $this->sugar_rest->get(ucfirst($module), $fieldlist);
        $data['rows'] = $results;
        return $data;
    }

    function loaddisplayfields($module) {
       // require_once "layoutdefs/" . $module . '.php';
                $library = $module.'_layouts';
        $this->load->library($library);
        return  $this->$library->listViewDefs($module);
        //return $listViewDefs [$module];
    }

    function loadStrings($module) {
        //require_once "strings/" . $module . '.php';
       // return $mod_strings;
        $library = $module.'_strings';
        $this->load->library($library);
        return  $this->$library->mod_strings();
        
    }

    function loaddefaultdisplay($module) {
        //require_once "layoutdefs/" . $module . '.php';
        //return $listViewDefs [$module . 'display'];
                        $library = $module.'_layouts';
        $this->load->library($library);
        return  $this->$library->listViewDefs($module . 'display');
    }

    function getFirmByKey($key) {


        $fields = array('id', 'name', 'account_type', 'phone_office', 'ticker_symbol', 'billing_address_street', 'billing_address_city', 'billing_address_state', 'billing_address_postalcode');
        $options['where'] = "accounts.ticker_symbol = '" . $key . "'";
        $data = $this->getRecordWhere('Accounts', $fields, $options);
        if ($data['_cnt'] == 1) {
            return $data;
        }
        return false;
    }

}
