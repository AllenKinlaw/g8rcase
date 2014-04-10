<?php

//

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of edits
 *
 * @author allen
 */
class Editors extends CI_Controller {

    function form($page, $id = '0') {

        $this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');
        $data['title'] = ucfirst($page);
        $data['id'] = $id;
        $data['values'] =  $this->input->post();
        if (isset($_POST[0])) {
            echo '$_POST = <br> <pre>';
            print_r($_POST);
        } else {
            $this->session->unset_userdata('hidden');
        }

        print_r($this->session->userdata('hidden'));
        echo'</pre>';

        //$this->form_validation->set_rules('docket', 'Docket', 'required');
        $this->load->model('g8r_gcasefile_model');
        $data['formfielddefs'] = $this->g8r_gcasefile_model->loaddisplayfields();
        $data['formstrings'] = $this->g8r_gcasefile_model->loadStrings();
        $mod_strings = $data['formstrings'];
        foreach ($data['formfielddefs'] as $field => $attributes) {
            $fname = strtolower($field);
            $label =$mod_strings[$attributes['label']];
            $rules = $attributes['rules'];
            if($attributes['rules'] !='') {
                $this->form_validation->set_rules($fname,$label , $rules);
            }
        }
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('editors/' . $page, $data);
            $this->load->view('templates/footer', $data);
        } else {

            $this->load->view('templates/header', $data);
            $this->load->view('editors/' . $page . 'Success', $data);
            $this->load->view('templates/footer', $data);
        }
    }

}
