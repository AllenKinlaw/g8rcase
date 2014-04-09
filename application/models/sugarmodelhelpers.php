<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function getfieldlist($module)
{
     require_once 'listviewdefs.php';

    foreach ($listViewDefs [$module] as $key => $feild)
{
   // echo 'Adding '. strtolower($key). ' to Field Array <br>';
    $fieldlist[] = strtolower($key);
//    echo $key;

}
    return $fieldlist;
}