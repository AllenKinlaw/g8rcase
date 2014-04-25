<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of pages
 *
 * @author allen
 */
class Pages extends CI_Controller {

    //put your code here
    function view($module = 'login') {
        switch ($module) {
            case 'about':

                $this->loadsetuppage($module);
                break;
                ;
            case 'login':
               $this->loadsetuppage($module);

                break;
            case 'setupprofile':
                $this->loadsetuppage($module);
                break;
            case 'welcome_1':

                if ($this->session->userdata('is_logged_in')) {
                    $this->loadsetuppage($module);
                } else {
                    redirect('login');
                }
                break;
            default:
                if ($this->session->userdata('is_logged_in')) {
                    $this->load->model('theModel');
                    $data = $this->theModel->getRecords($module);
                    $data['module'] = ucfirst($module);
                    $this->load->view('templates/header');
                    $this->load->view('templates/topnav_1');
                    $this->load->view('templates/leftnav');
                    $this->load->view('pages/home', $data);
                    $this->load->view('templates/footer');
                } else {
                    $this->login();
                }
                break;
        }
    }

    function test() {
        $this->load->view('templates/header');
        $this->load->view('pages/test.html');
        $this->load->view('templates/footer');
    }

    function login() {
        $this->load->view('templates/header');
        $this->load->view('templates/topnav');
        $this->load->view('templates/leftnav');
        $this->load->view('pages/login');
        $this->load->view('templates/footer');
    }

    function welcome_1() {
        $this->load->view('templates/header');
        $this->load->view('templates/topnav');
        $this->load->view('templates/leftnav');
        $this->load->view('pages/welcome_1');
        $this->load->view('templates/footer');
    }

    function loadsetuppage($module) {
        $this->load->view('templates/header');
        $this->load->view('templates/topnav');
        $this->load->view('templates/blankleftnav');
        $this->load->view('pages/' . $module);
        $this->load->view('templates/footer');
    }

}
