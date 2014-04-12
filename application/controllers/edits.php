<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Edit extends CI_Controller {

    function form(){
        $data['page']='deForm';
        $data['title'] ='TEST';
        $data['postto'] ='edit';
         $this->load->view('editors/deForm', $data);
    }
    
    function form1($page) {
//this is the create a new record version on f the form
        $this->load->helper(array('form', 'url'));
        $id = $this->session->userdata('id');
        $this->load->library('form_validation');
        $data['title'] = ucfirst($page);
        $data['page'] = $page;
   echo 'made it back to the Controler!<br>';


        $this->load->model('theModel');
        $data['formfielddefs'] = $this->theModel->loaddisplayfields($page);
        $data['formstrings'] = $this->theModel->loadStrings($page);
        $mod_strings = $data['formstrings'];
        //if this is an attempt to POST then set up the Validation Rules

        $data['values'] = $this->input->post();
        foreach ($data['formfielddefs'] as $field => $attributes) {
            $fname = strtolower($field);
            $label = $mod_strings[$attributes['label']];
            if ($attributes['ftype'] != 'group') {
                $rules = $attributes['rules'];

                /*if ($attributes['rules'] != '') {
                    if ($this->input->post('submit')) {
                        $this->form_validation->set_rules($fname, $label, $rules);
                    }
                }*/
            }
        }
        if ($this->form_validation->run() == FALSE) {
            $data['postto'] = 'create';
            $this->load->view('templates/header', $data);
            $this->load->view('editors/defaultForm', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $data['postto'] = 'update';
            $data['postback'] = 'Save Successful!';
            $this->load->view('templates/header', $data);
            $this->load->view('editors/defaultForm', $data);
            $this->load->view('templates/footer', $data);
        }
    }

    function create($module) {
        // Check if form is submitted
        if ($this->input->post('submit')) {
            $title = $this->input->xss_clean($this->input->post('title'));
            $content = $this->input->xss_clean($this->input->post('content'));

            // Add the post
            $this->posts_model->addPost($title, $content);
        }

        $this->load->view('crud_view');
    }

    function update($module) {
        // Check if form is submitted
        if ($this->input->post('submit')) {
            $title = $this->input->xss_clean($this->input->post('title'));
            $content = $this->input->xss_clean($this->input->post('content'));

            // Add the post
            $this->posts_model->addPost($title, $content);
        }

        $this->load->view('crud_view');
    }

    function delete($module, $record) {
        // Check if form is submitted
        if ($this->input->post('submit')) {
            $title = $this->input->xss_clean($this->input->post('title'));
            $content = $this->input->xss_clean($this->input->post('content'));

            // Add the post
            $this->posts_model->addPost($title, $content);
        }

        $this->load->view('crud_view');
    }

    function testmodel() {
        $this->load->model('g8r_gcasefile_model');
        $data = $this->g8r_gcasefile_model->getCases();
    }

}
