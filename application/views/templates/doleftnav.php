<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if($this->session->userdata('is_logged_in')){
    $this->load->view('templates/leftnav');
    }
    else {
        $this->load->view('templates/blankleftnav');
    }