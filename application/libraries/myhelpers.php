<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Myhelpers {

    function displayErrorAlert($msg) {

        echo '<div class="alert-danger">'
        . '<h2>' . $msg . '</h2>'
        . '</div>';
    }

    function displaySpinner() {
        echo '<div class = "modal-dialog" id = "myDetailModal" >'
        . '<div class = "modal-content">'
        . '<div class = "modal-body">'
        . '<i class = "fa fa-spinner fa-spin fa-5x text-primary"></i>'
        . '</div>'
        . '</div>'
        . '</div>';
    }

    function getUserData() {
        $CI = & get_instance();
        $CI->load->library('session');
        if ($CI->session->userdata('is_logged_in')) {
            return array('username' => $CI->session->userdata('guser'),
                'id' => $CI->session->userdata('userid'));
        } else {
            return array('username' => '',
                'id' => '');
        }
    }

    function setUserData($data = array('guser' => 'AK@test.com',
        'userid' => 'c89663b2-81ea-b8e4-2395-5366e8670880')) {

        $CI = & get_instance();
        $CI->load->library('session');
        $CI->session->set_userdata('is_logged_in', true);
        $CI->session->set_userdata($data);
    }

    function setFirmData($data = array('firmKey' => '')) {

        $CI = & get_instance();
        $CI->load->library('session');
        $CI->session->set_userdata($data);
    }
        function setModuleData($data = array('currentModule' => '')) {

        $CI = & get_instance();
        $CI->load->library('session');
        $CI->session->set_userdata($data);
    }
            function getModuleData() {

        $CI = & get_instance();
        $CI->load->library('session');
       return $CI->session->userdata('currentModule');
    }

    function getLetterBackground($letter) {
        switch ($letter) {
            case 'A':
                return '727B84';
            case 'B':
                return 'DF9496';
            case 'C':
                return 'F6F4DA';
            case 'D':
                return 'F4F3EE';
            case 'E':
                return 'D9E2E1';
            case 'F':
                return 'A2ADBC';
            case 'G':
                return '000000';
            case 'H':
                return 'A2ADBC';
            case 'I':
                return '800080';
            case 'J':
                return '727B84';
            case 'K':
                return 'DF9496';
            case 'L':
                return 'F6F4DA';
            case 'M':
                return 'F4F3EE';
            case 'N':
                return 'D9E2E1';
            case 'O':
                return 'A2ADBC';
            case 'P':
                return '000000';
            case 'Q':
                return 'A2ADBC';
            case 'R':
                return '800080';
            case 'S':
                return '727B84';
            case 'T':
                return 'DF9496';
            case 'U':
                return 'F6F4DA';
            case 'V':
                return 'F4F3EE';
            case 'W':
                return 'D9E2E1';
            case 'X':
                return 'A2ADBC';
            case 'Y':
                return '000000';
            case 'Z':
                return 'A2ADBC';
        }
    }
function valid_phone_number_or_empty($value) {
    $value = trim($value);
    if ($value == '') {
        return true;
    } else {
        if (preg_match('/^\(?[0-9]{3}\)?[-. ]?[0-9]{3}[-. ]?[0-9]{4}$/', $value)) {
            return true;
            return preg_replace('/^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/', '($1) $2-$3', $value);
        } else {
            return false;
        }
    }
}
}
