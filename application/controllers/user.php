<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of user
 *
 * @author allen
 */
class User extends CI_Controller{
//        public function __construct() {
//        parent::__construct();
//
//        $this->load->library('sugar_rest');
//
//// Sugar_REST($rest_url=null,$username=null,$password=null,$md5_password=true)
//         $url = 'http://sugarcrm/service/v4_1/rest.php';
//         $user = 'admin';
//         $pass = 'l12007';
//        $this->sugar_rest->Sugar_REST($url, $user, $pass);
//    }
    //put your code here
    function savefirm($step = 1, $firm = '') {
        $data['current_url'] = 'user/savefirm/'.$step.'/'.$firm;
        $this->loadsetuppage('savefirm', $data);
    }
    private function loadsetuppage($module,$data=array()) {
        $this->load->view('templates/header');
        $this->load->view('templates/topnav');
        $this->load->view('templates/blankleftnav');
        $this->load->view('pages/' . $module,$data);
        $this->load->view('templates/footer');
    }

    
        }
