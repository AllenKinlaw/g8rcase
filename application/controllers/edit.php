<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class edit extends CI_Controller {

    function form($page) {
//this is the create a new record version on f the form
        $this->load->helper(array('form', 'url'));
        $id = $this->session->userdata('id');
        $this->load->library('form_validation');
        $data['title'] = ucfirst($page);
        $data['page'] = $page;

        $this->load->model('theModel');
        $data['formfielddefs'] = $this->theModel->loaddisplayfields($page);
        $data['formstrings'] = $this->theModel->loadStrings($page);
        $mod_strings = $data['formstrings'];
        //if this is an attempt to POST then set up the Validation Rules

        $data['values'] = $this->input->post();
        $this->process_rules($data['formfielddefs'], $mod_strings);

        if ($this->form_validation->run() == FALSE) {
            $data['postto'] = 'create';
            $this->load->view('templates/header', $data);
            $this->load->view('editors/defaultForm', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $result = $this->theModel->addRecord(ucfirst($page), $_POST);
            if (isset($result['id'])) {
                $data['postto'] = 'update';
                $data['postback'] = 'Save Successful!';

                echo strlen($result['id']);
                $id = (string) $result['id'];
                $newdata = array(ucfirst($page) => array('id' => $id),
                    'values' => $this->input->post());
                $data['debugpost'] = $this->session->userdata(ucfirst($page));

                $this->session->set_userdata($newdata);
                $this->load->view('templates/header', $data);
                $this->load->view('editors/defaultForm', $data);
                $this->load->view('templates/footer', $data);
            } else {
                $data['postback'] = $mod_strings['LBL_CREATE_FAILED'];
                $data['debugpost'] = $result;
                $data['postto'] = 'create';
                $this->load->view('templates/header', $data);
                $this->load->view('editors/defaultForm', $data);
                $this->load->view('templates/footer', $data);
            }
        }
    }

    /* Creation is taken care of inthe FORM Procedure
     * function create($module) {
      // Check if form is submitted
      if ($this->input->post('submit')) {
      $title = $this->input->xss_clean($this->input->post('title'));
      $content = $this->input->xss_clean($this->input->post('content'));

      // Add the post
      $this->posts_model->addPost($title, $content);
      }

      $this->load->view('crud_view');
      } */

    function update($page) {
        //setup the page Model and defaults
        $this->load->helper(array('form', 'url'));
        $id = $this->session->userdata('id');
        $this->load->library('form_validation');
        $data['title'] = ucfirst($page);
        $data['page'] = $page;

        $this->load->model('theModel');
        $data['formfielddefs'] = $this->theModel->loaddisplayfields($page);
        $data['formstrings'] = $this->theModel->loadStrings($page);
        $mod_strings = $data['formstrings'];
        //if this is an attempt to POST then set up the Validation Rules

        $data['values'] = $this->input->post();
        // Check if form is submitted
        if (count($_POST) > 0) {
            $data['values'] = $this->input->post();
            $this->process_rules($data['formfielddefs'], $mod_strings);

            if ($this->form_validation->run() != FALSE) {
                // Add the post
                $result = $this->theModel->updateRecord(ucfirst($page), $_POST, $this->session->userdata(ucfirst($page)));
                if (isset($result['id'])) {
                    $data['postback'] = 'Save Successful!';
                    echo strlen($result['id']);
                    $id = (string) $result['id'];
                    $newdata = array(ucfirst($page) => array('id' => $id));
                    // $data['debugpost'] = $this->session->userdata(ucfirst($page));
                    $this->session->set_userdata($newdata);
                } else {
                    $data['postback'] = $mod_strings['LBL_UPDATE_FAILED'];
                    $data['debugpost'] = $result;
                }
            }
        } else {
            $sessionmodule = $this->session->userdata(ucfirst($page));
            $data['values'] = $sessionmodule['values'];
        }
        $data['postto'] = 'update';
        $this->load->view('templates/header', $data);
        $this->load->view('editors/defaultForm', $data);
        $this->load->view('templates/footer', $data);
    }

    function delete_item() {
               $id = trim($this->input->post('id'));
        $rtn = array('result' => $id);
        echo json_encode($rtn);

    }

    function delete($module) {
        $this->load->view('editors/delete');

        return;
        //setup the page Model and defaults
        $this->load->helper(array('form', 'url'));
        $id = $this->session->userdata('id');
        $this->load->library('form_validation');
        $data['title'] = ucfirst($page);
        $data['page'] = $page;

        $this->load->model('theModel');
        $data['formfielddefs'] = $this->theModel->loaddisplayfields($page);
        $data['formstrings'] = $this->theModel->loadStrings($page);
        $mod_strings = $data['formstrings'];
        //if this is an attempt to POST then set up the Validation Rules

        $data['values'] = $this->input->post();
        // Check if form is submitted
        if (count($_POST) > 0) {
            $data['values'] = $this->input->post();
            //$this->process_rules($data['formfielddefs'], $mod_strings);
            //if ($this->form_validation->run() != FALSE) {
            // Add the post
            $result = $this->theModel->deleteRecord(ucfirst($page), $_POST, $this->session->userdata(ucfirst($page)));
            if (isset($result['id'])) {
                $data['postback'] = 'Delete Successful!';
                echo strlen($result['id']);
                $id = (string) $result['id'];
                $newdata = array(ucfirst($page) => array('id' => $id));
                // $data['debugpost'] = $this->session->userdata(ucfirst($page));
                $this->session->set_userdata($newdata);
            } else {
                $data['postback'] = $mod_strings['LBL_DELETE_FAILED'];
                $data['debugpost'] = $result;
                // }
            }
        } else {
            $sessionmodule = $this->session->userdata(ucfirst($page));
            $data['values'] = $sessionmodule['values'];
        }



        $this->load->view('templates/header', $data);
        $this->load->view('editors/defaultForm', $data);
        $this->load->view('templates/footer', $data);
    }

    function process_rules($fields, $mod_strings) {
        foreach ($fields as $field => $attributes) {
            $fname = strtolower($field);

            $label = $mod_strings[$attributes['label']];
            if ($attributes['ftype'] != 'group') {

                $rules = $attributes['rules'];

                if ($attributes['rules'] != '') {
                    //if ($this->input->post('submit')) {
                    if (count($_POST) > 0) {
                        //echo 'Setting '. $fname .' = '. $rules . '<br>';
                        // $title = $this->input->xss_clean($this->input->post('title'));
                        //$content = $this->input->xss_clean($this->input->post('content'));
                        $this->form_validation->set_rules($fname, $label, $rules);
                    }
                }
            } else {
                $this->process_rules($attributes['related_fields'], $mod_strings);
            }
        }
    }

}
