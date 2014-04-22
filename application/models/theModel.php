<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class TheModel extends CI_Model {

    var $fieldlist = array();

    function connectSugar($user = 'admin', $pass = 'l12007', $save = true) {
        require_once 'sugar_rest.php';
        $url = 'http://sugarcrm/service/v4_1/rest.php';
        $sugar = new Sugar_REST();
        $sugar->Sugar_REST($url, $user, $pass);
        return $sugar;
    }

    function validateUser($user, $pass) {
        require_once 'sugar_rest.php';
        $sugar = new Sugar_REST();
        $sugar = $this->connectSugar($user, $pass, false);
        if ($sugar->is_logged_in())
            return true;
        return false;
    }

    function finduser($fields, $options) {
        require_once 'sugar_rest.php';
        $sugar = new Sugar_REST();
        $sugar = $this->connectSugar();
        $data = $this->getRecordWhere('Users', $fields, $options);
        return $data;
    }

    function addRecord($module, $theRecord) {
        require_once 'sugar_rest.php';
          $values = $theRecord;
        $sugar = $this->connectSugar();
        return $sugar->set($module, $values);
    }

    function deleteRecord($id) {
        $sugar = $this->connectSugar();
    }

    function updateRecord($module, $theRecord, $sessionvars) {
        $id = (string) $sessionvars['id'];
        $theRecord['id'] = (string) $id;
        return $this->addRecord($module, $theRecord);
    }

    function getRecordWhere($module, $fields, $options) {
        $sugar = $this->connectSugar();
        $data['_cnt'] = 0;
        $i = 0;
        $results = $sugar->get(ucfirst($module), $fields, $options);
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
        $sugar = $this->connectSugar();

        $this->getfieldlist($fields);
        $fieldlst = $this->fieldlist;
        $options['where'] = $module . ".id = '" . $id . "'";
        $results = $sugar->get(ucfirst($module), $fieldlst, $options);
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
        require_once 'layoutdefs/' . $module . '.php';
        $data['displayModel'] = $listViewDefs[$module . 'list'];
        foreach ($listViewDefs[$module . 'list'] as $row => $fields) {
            // echo 'Adding '. strtolower($key). ' to Field Array <br>';
            foreach ($fields as $field) {
                $data['fieldlist'][] = strtolower($field);
            }
//    echo $key;
        }
        return $data;
    }

    function getRecords($module) {
        $sugar = $this->connectSugar();

        $listModel = $this->getListFields($module);
        $fieldlist = $listModel['fieldlist'];
        $data['listmodel'] = $listModel['displayModel'];
        $results = $sugar->get(ucfirst($module), $fieldlist);
        $data['rows'] = $results;
        return $data;
    }

    function loaddisplayfields($module) {
        require_once "layoutdefs/" . $module . '.php';
        return $listViewDefs [$module];
    }

    function loadStrings($module) {
        require_once "strings/" . $module . '.php';
        return $mod_strings;
    }

    function loaddefaultdisplay($module) {
        require_once "layoutdefs/" . $module . '.php';
        return $listViewDefs [$module . 'display'];
    }

}
