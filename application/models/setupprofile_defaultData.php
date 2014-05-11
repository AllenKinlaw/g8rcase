<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Setupprofile_defaultData extends CI_Model {

    function getData() {
        return array('TaskHeader' => 'Complete User Profile...',
                     'steps'=> 3);
    }
    function getFirmData() {
        return array('TaskHeader' => 'Complete Firm Profile...',
                     'steps'=> 3);
    }
}

?>