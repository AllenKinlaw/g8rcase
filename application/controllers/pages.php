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
    function view($module = 'home') {
        switch ($module) {
            case 'about':

                $this->load->view('templates/header');
                $this->load->view('templates/topnav');
                $this->load->view('templates/leftnav');
                $this->load->view('pages/about');
                $this->load->view('templates/footer');
                break;
            default:
                $this->load->model('theModel');
                $data = $this->theModel->getRecords($module);
                $data['module'] = ucfirst($module);
                $this->load->view('templates/header');
                $this->load->view('templates/topnav');
                $this->load->view('templates/leftnav');
                $this->load->view('pages/home', $data);
                $this->load->view('templates/footer');
                break;
        }
    }

    function test() {
        $this->load->view('templates/header');
        $this->load->view('pages/test.html');
        $this->load->view('templates/footer');
    }

}
