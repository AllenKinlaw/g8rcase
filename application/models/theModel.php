<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class TheModel extends CI_Model {
    var $fieldlist =array();
    function connectSugar($url = 'http://sugarcrm/service/v4_1/rest.php', $user = 'admin', $pass = 'l12007') {
        require_once 'sugar_rest.php';
        $sugar = new Sugar_REST();
        $sugar->Sugar_REST($url, $user, $pass);

        return $sugar;
    }

    function addRecord($module, $theRecord) {
        require_once 'sugar_rest.php';
        /*
          The Call toset($module, $values) requies
         * Parameters: 	$module	= (string) the SugarCRM module name. Usually first
         * 			letter capitalized.
         * 		$values	= (array) the data of the record to be set in
         * 		the form:
         * 			array(
         * 				'id' => 'some value',
         * 				'field_name' => 'some other value'
         * 			)        
         * The  */
        $values = $theRecord;
        // $values['id'] = '';
        //return $values;  // return what we are posting for debug 
        $sugar = new Sugar_REST();
        $sugar->Sugar_REST('http://sugarcrm/service/v4_1/rest.php', 'admin', 'l12007');
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

    function getRecord($module,$id,$fields) {
          $sugar = $this->connectSugar();


//$results = $sugar->get_with_related("Accounts", array("Accounts" => array('id','name'), "Cases" => array('id','status')));
        $this->getfieldlist($fields);
        $fieldlst = $this->fieldlist;
        $options['where'] = $module.".id = '". $id ."'";
        $results = $sugar->get(ucfirst($module), $fieldlst,$options
                //array(
                //	'id',
                //	'name',
                //),
                //	array(
                //		'limit' => '10',
                //'where' => "cases.type = 'Announcement' and (cases.status = 'New' or cases.status = 'Assigned')",
                //'order_by' => 'cases.date_entered desc',
                //	)
        );
//echo "<pre>";
//print_r($results);
//echo "</pre>";
//$data = explode($results);
        foreach ($results as $key => $value) {
            foreach ($fieldlst as $dfield) {
                if(isset($value[$dfield])){
                $data[$dfield] = $value[$dfield];
                //$data['fieldvalue'][] = $value[$dfield];
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
        $results = $sugar->get(ucfirst($module), $fieldlist
                //array(
                //	'id',
                //	'name',
                //),
                //	array(
                //		'limit' => '10',
                //'where' => "cases.type = 'Announcement' and (cases.status = 'New' or cases.status = 'Assigned')",
                //'order_by' => 'cases.date_entered desc',
                //	)
        );
        //echo "<pre>";
        //print_r($results);
        //echo "</pre>";
        //$data = explode($results);
        /* foreach ($results as $key => $value) {
          foreach ($fieldlist as $dfield) {
          $data['fieldkey'][] = $dfield;
          $data['fieldvalue'][] = $value[$dfield];
          }
          } */
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
        return $listViewDefs [$module.'display'];
    }

}
