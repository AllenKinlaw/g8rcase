<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class TheModel extends CI_Model{
    
     
    function addRecord($theRecord) {
        
        /*
           The Call toset($module, $values) requies 
	* Parameters: 	$module	= (string) the SugarCRM module name. Usually first
	*			letter capitalized.
	*		$values	= (array) the data of the record to be set in
	*		the form:
	*			array(
	*				'id' => 'some value',
	*				'field_name' => 'some other value'
	*			)        
         * The  */
        return 1; /// just rerurn for now casue still nned to build the $values array
        $values = array(
            'id' => $theRecord['id'], //null when inserting a new  record
            'field_name' => $field_name
        );
        $sugar = new Sugar_REST();
        $sugar->Sugar_REST('http://ubuntuawk.cloudapp.net/g8rcase/service/v4_1/rest.php', 'Admin', 'l12007');
        $sugar->set($module,$values);
    }
 function deleteRecord($id) {
          $sugar = new Sugar_REST();
        $sugar->Sugar_REST('http://ubuntuawk.cloudapp.net/g8rcase/service/v4_1/rest.php', 'Admin', 'l12007');
 }
 
 function updateRecord($theRecord){
     addRecord($theRecord);
 }
 
 function getRecord($module){
      $sugar = new Sugar_REST();
        $sugar->Sugar_REST('http://ubuntuawk.cloudapp.net/g8rcase/service/v4_1/rest.php', 'Admin', 'l12007');


//$results = $sugar->get_with_related("Accounts", array("Accounts" => array('id','name'), "Cases" => array('id','status')));
        $fieldlist = getfieldlist($module);
        $results = $sugar->get($module, $fieldlist
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
            //  echo 'Name: ';
            // echo $Account[name];
            // echo "<br />\n";
            //echo $Account['name']. "\n";
            foreach ($fieldlist as $dfield) {
                $data['fieldkey'][] = $dfield;
                $data['fieldvalue'][] = $value[$dfield];
                //$data['name'][] = $Account['name'];
            }
        }
        return $data;
 }
  function getRecords($module){
      $sugar = new Sugar_REST();
        $sugar->Sugar_REST('http://ubuntuawk.cloudapp.net/g8rcase/service/v4_1/rest.php', 'Admin', 'l12007');


//$results = $sugar->get_with_related("Accounts", array("Accounts" => array('id','name'), "Cases" => array('id','status')));
        $fieldlist = getfieldlist($module);
        $results = $sugar->get($module, $fieldlist
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
            //  echo 'Name: ';
            // echo $Account[name];
            // echo "<br />\n";
            //echo $Account['name']. "\n";
            foreach ($fieldlist as $dfield) {
                $data['fieldkey'][] = $dfield;
                $data['fieldvalue'][] = $value[$dfield];
                //$data['name'][] = $Account['name'];
            }
        }
        return $data;
 }
 
 
    function loaddisplayfields($module) {
        require_once "layoutdefs/".$module. '.php';
        return $listViewDefs [$module];
    }

    function loadStrings($module) {
        require_once "strings/".$module. '.php';
        return $mod_strings;
    }
}