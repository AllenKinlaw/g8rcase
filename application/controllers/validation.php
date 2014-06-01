<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function valid_workphone() {
    $data = $this->input->post('work_phone');
    if ($this->valid_phone_number_or_empty($data)) {
        return true;
    } else {
        $this->form_validation->set_message('valid_workphone', 'Invalid work phone: Format xxx-xxx-xxxx');
        return false;
    }
}

function valid_homephone() {
    $data = $this->input->post('home_phone');
    if ($this->valid_phone_number_or_empty($data)) {
        return true;
    } else {
        $this->form_validation->set_message('valid_homephone', 'Invalid home phone: Format xxx-xxx-xxxx');
        return false;
    }
}

function valid_mobilephone() {
    $data = $this->input->post('mobile_phone');
    if ($this->valid_phone_number_or_empty($data)) {
        return true;
    } else {
        $this->form_validation->set_message('valid_mobilephone', 'Invalid mobile phone: Format xxx-xxx-xxxx');
        return false;
    }
}
