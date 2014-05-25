<?php

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
}
