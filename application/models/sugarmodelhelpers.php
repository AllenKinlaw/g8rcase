<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function getfieldlist($module) {
    require_once 'listviewdefs.php';

    foreach ($listViewDefs [$module] as $key => $feild) {
        // echo 'Adding '. strtolower($key). ' to Field Array <br>';
        $fieldlist[] = strtolower($key);
//    echo $key;
    }
    return $fieldlist;
}

function get_record($id) {
    $sugar = new Sugar_REST();
    $sugar->Sugar_REST('http://ubuntuawk.cloudapp.net/g8rcase/service/v4_1/rest.php', 'Admin', 'l12007');
    $fieldlist = getfieldlist('g8r_gcasefile');
    $results = $sugar->get('g8r_gcasefile', $fieldlist, array(
        //	'id',
        //	'name',
        //),
        //	array(
        //		'limit' => '10',
        'where' => "id = ' " . $id . "'",
            //'order_by' => 'cases.date_entered desc',
            )
    );

    foreach ($results as $key => $value) {
        foreach ($fieldlist as $dfield) {
            $data['fieldkey'][] = $dfield;
            $data['fieldvalue'][] = $value[$dfield];
            //$data['name'][] = $Account['name'];
        }
    }
    return $data;
}
