<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class TheModel extends CI_Model {

    var $fieldlist = array();

    function connectSugar($user = 'admin', $pass = 'l12007', $save = true) {
        // require_once 'sugar_rest.php';
        //his->load->library('sugar_rest');
        $url = 'http://sugarcrm/service/v4_1/rest.php';
        //$sugar = new $this->sugar_rest->Sugar_REST();
//        $sugar = new $this->Sugar_rest->Sugar_REST($url, $user, $pass);
//        return $sugar;
        $this->sugar_rest->Sugar_REST($url, $user, $pass);
    }

    function connectMongo() {
        $m = new MongoClient();


// select a database
        $mongodb = $m->g8rcase;
        return $mongodb;
    }

    function getMongoData($doccol, $filter) {

// select a collection (analogous to a relational database's table)
        $mongodb = $this->connectMongo();
        $collection = $mongodb->$doccol;
        $cursor = $collection->find($filter);
        return $cursor;
    }

    function getMongoDatabyId($doccol, $filter) {

// select a collection (analogous to a relational database's table)
        $mongodb = $this->connectMongo();
        $collection = $mongodb->$doccol;
        $cursor = $collection->findOne($filter);
        return $cursor;
    }

    function setMongoData($doccol, $filter, $values) {

// select a collection (analogous to a relational database's table)
        $mongodb = $this->connectMongo();
        $collection = $mongodb->$doccol;
        $collection->update($filter, array('$set' => $values));
        //$cursor = $collection->find($filter);
        return;
    }

    function validateUser($user, $pass) {
        // require_once 'sugar_rest.php';
        $sugar = $this->connectSugar($user, $pass);
        if ($sugar->is_logged_in())
            return true;
        return false;
    }

    function finduser($fields, $options) {
        // require_once 'sugar_rest.php';
        // $sugar = new Sugar_REST();
        // $sugar = $this->connectSugar();
        $data = $this->getRecordWhere('Users', $fields, $options);
        return $data;
    }

    function addRecord($module, $theRecord) {
        // require_once 'sugar_rest.php';
        $values = $theRecord;
        // $sugar = $this->connectSugar();
        return $this->sugar_rest->set($module, $values);
    }

    function deleteRecord($module, $id) {
        $fields['deleted'] = 1;
        $fields['id'] = $id;
        return $this->addRecord($module, $fields);
    }

    function updateRecord($module, $theRecord, $sessionvars) {
        $id = (string) $sessionvars['id'];
        $theRecord['id'] = (string) $id;
        return $this->addRecord($module, $theRecord);
    }

    function getRecordWhere($module, $fields, $options) {
        //$sugar = $this->connectSugar();
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
//        $this->getfieldlist($fields);
//        $fieldlst = $this->fieldlist;
        $options['where'] = $module . ".id = '" . $id . "'";
        $results = $this->sugar_rest->get(ucfirst($module), $fields, $options);
        foreach ($results as $key => $value) {
            foreach ($fieldlst as $dfield) { //looping through and pulling only the requested fields
                if (isset($value[$dfield])) {
                    $data[$dfield] = $value[$dfield];
                }
            }
        }
        return $data;
    }

    function getaRecord($module, $id, $fields, $options = '') {
        $fieldlst = $fields;
        if (!$options) {
            $options['where'] = $module . ".id = '" . $id . "'";
        }
        foreach ($fields as $key) {
            $data[$key] = '';
        }
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

    function getRelatedRecords($module, $id, $fields, $options = '') {
        $fieldlst = $fields;
        if (!$options) {
            $options['where'] = $module . ".id = '" . $id . "'";
        }
//        foreach ($fields as $key) {
//            $data[$key] = '';
//        }
        $results = $this->sugar_rest->get_with_related(ucfirst($module), $fieldlst, $options);
        return $results;
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

    function getRecords($module, $fields) {
        //$sugar = $this->connectSugar();
        $options['limit'] = 500;
        $options['order_by'] = 'last_name ASC';

        $results = $this->sugar_rest->get(ucfirst($module), $fields, $options);
        $data = $results;
        return $data;
    }

    function searchRecords($search_string, $modules, $offset, $max_results, $assigned_user_id = '', $select_fields = '') {
        $rtn = $this->sugar_rest->search_by_module($search_string, $modules, $offset, $max_results);
        return $rtn;
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

    function isKeyValid($key) {

        $fields = array('id',);
        $options['where'] = "users_cstm.temp_hash_c = '" . $key . "'";
        $this->connectSugar();
        $data = $this->finduser($fields, $options);
        if ($data['_cnt'] == 1) {
            return true;
        }
        return false;
    }

    function updateUser($key, $passwd) {

        $fields = array('id',);
        $options['where'] = "users_cstm.temp_hash_c = '" . $key . "'";
        $data = $this->finduser($fields, $options);
        $id = $data['id'];
        $pwd = md5($passwd);

        if ($data['_cnt'] > 0) {
            //Load the sugar DB bc cannt do this with REST
            $this->load->database();
            $data = $this->updateHash($pwd, $id);

            if ($data) {
                $fields = array('id' => $id,
                    'temp_hash_c' => '',
                    'title' => 'HMICON');
                $data = $this->addRecord('Users', $fields);
                if ($data) {
                    return true;
                } else {
                    //echo 'Error removing temp password';
                    return false;
                }
            }
            return false;
        }
    }

}
