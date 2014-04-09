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
class Pages extends CI_Controller{
    //put your code here
    function view($page ='home'){
        if( $page=== 'home')
        {
          //  echo 'getting accounts... ';
            $this->load->model('g8r_gcasefile_model');
            $data= $this->g8r_gcasefile_model->get_cases();
           // print_r($data);
        }
        
        $this->load->view('templates/header');
        $this->load->view('templates/topnav');
        $this->load->view('templates/leftnav');
        $this->load->view('pages/'.$page,$data);
        $this->load->view('templates/footer');

    }
}
