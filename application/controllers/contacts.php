<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Contacts extends CI_Controller {

    public function view($module = 'main') {

        $this->myhelpers->setUserData();
        $displaymodel = 'contacts_defaultData';
        $this->load->model($displaymodel);
        $data = array();
        $data = array_merge($data, $this->$displaymodel->getData());
        $this->load->view('templates/header');
        $this->load->view('templates/topnav');
        $this->load->view('templates/doleftnav');

        $data = array_merge($data, $this->myhelpers->getUserData());
        $data['listname'] = 'widgets\list';
        $data['listitems'] = $this->getContacts($this->$displaymodel->getFields());
        $data['module'] = 'contacts';
        $this->load->view($module, $data);
        $this->load->view('templates/footer');
    }

    private function getContacts($fields) {
        $this->load->model('theModel');
        $this->theModel->connectSugar();
        $data = $this->theModel->getRecords('contacts', $fields);
        foreach ($data as $row => $col) {
            $firstletter = $col['last_name'][0];
            $background = $this->myhelpers->getLetterBackground($firstletter);
            $rowtext1 = $col['salutation'] . ' ' . $col['first_name'] . ' ' . $col['last_name'];
            $rowtext2 = 'M. ' . $col['phone_mobile'];
            $rowtext3 = $col['email1'];
            $smlabel = '';
            $smtext = $col['department'];
            $rtn[] = array('id' => $col['id'],
                'targeturl' => base_url() . 'contacts/details/View/' . $col['id'],
                'background' => $background,
                'letter' => $firstletter,
                'rowtext1' => $rowtext1,
                'rowtext2' => $rowtext2,
                'rowtext3' => $rowtext3,
                'smlabel' => $smlabel,
                'smtext' => $smtext);
        }

        return $rtn;
    }

    public function search() {
        if ($this->input->post('search_str')) {
            $search_on = $this->input->post('search_str');
        } else {
            $search_on = 'Alex';
        }
        $rtn = array();
        $displaymodel = 'contacts_defaultData';
        $this->load->model($displaymodel);
        $this->load->model('theModel');
        $this->theModel->connectSugar();
        // $data = $this->theModel->searchRecords ($this->input->post('search_str'),array('Contacts'),0,100);
        //$searchfields = $this->$displaymodel->getSearchFields();
        $searchfields = '';
        $data = $this->theModel->searchRecords($search_on, array('Contacts'), 0, 100, '', $searchfields);
        //getRecords('contacts',$this->$displaymodel->getSearchFields());
        foreach ($data['entry_list'] as $row => $mod) {
            foreach ($mod['records'] as $row2 => $column) {
                $id = $column['id']['value'];
                $col = $this->theModel->getaRecord('contacts', $id, $this->$displaymodel->getFields());

                $firstletter = $col['last_name'][0];
                $background = $this->myhelpers->getLetterBackground($firstletter);
                $rowtext1 = $col['salutation'] . ' ' . $col['first_name'] . ' ' . $col['last_name'];
                $rowtext2 = 'M. ' . $col['phone_mobile'];
                $rowtext3 = $col['email1'];
                $smlabel = '';
                $smtext = $col['department'];
                $rtn[] = array('id' => $col['id'],
                    'targeturl' => base_url() . 'contacts/details/View/' . $col['id'],
                    'background' => $background,
                    'letter' => $firstletter,
                    'rowtext1' => $rowtext1,
                    'rowtext2' => $rowtext2,
                    'rowtext3' => $rowtext3,
                    'smlabel' => $smlabel,
                    'smtext' => $smtext);
            }
        }
        if ($rtn) {
            $data['listname'] = 'widgets\list';
            $data['listitems'] = $rtn;
            $data['module'] = 'contacts';
            $listitems = $this->load->view($data['listname'], $data, true);
        } else {
            $listitems = $this->myhelpers->displayErrorAlert('No Match found');
        }
        echo $listitems;
    }

    public function details($action = 'View', $id) {


        $displaymodel = 'contacts_defaultData';
        $this->load->model($displaymodel);
        $data = array();
        $data = array_merge($data, $this->$displaymodel->getData());
        $this->load->view('templates/header');
        $this->load->view('templates/topnav');
        $this->load->view('templates/doleftnav');
        $data = array_merge($data, $this->myhelpers->getUserData());
//        $data['listname'] = 'widgets\list';
//        $data['listitems'] = $this->getContacts($this->$displaymodel->getFields());
        $module = 'contacts/forms/detail' . $action;
        $this->load->model('theModel');
        $this->theModel->connectSugar();
        $data['fields'] = $this->theModel->getaRecord('contacts', $id, $this->$displaymodel->getFields());
        $rtn = $this->load->view($module, $data, true);
        echo $rtn;
    }

    public function delete($id) {
        $this->load->model('theModel');
        $this->theModel->connectSugar();
        $data = $this->theModel->deleteRecord('Contacts', $id);
        if ($data) {
            echo base_url().'contacts/view/main';
        } else {
            $js = '';
            echo $js;
        }
    }

    public function update($action = 'View', $id) {


        $displaymodel = 'contacts_defaultData';
        $this->load->model($displaymodel);
        $data = array();
        $data = array_merge($data, $this->$displaymodel->getData());
//        $this->load->view('templates/header');
//        $this->load->view('templates/topnav');
//        $this->load->view('templates/doleftnav');
//        $data = array_merge($data, $this->myhelpers->getUserData());
//        $module = 'contacts/forms/update' . $action;
        $this->load->model('theModel');
//        $this->theModel->connectSugar();
//        $data['fields'] = $this->theModel->getaRecord('contacts', $id, $this->$displaymodel->getFields());
//        $rtn = $this->load->view($module, $data, true);
//        echo $rtn;
        ///////////////////////////////////////////////////////////////////////
        if ($action == 'Update') {
            $this->load->library('form_validation');
            // we are saving prefered email and Title
            $this->form_validation->set_rules('email1', 'Email', 'required|trim|valid_email');
            $this->form_validation->set_rules('phone_work', 'Work Phone', 'trim|callback_valid_workphone');
            $this->form_validation->set_rules('phone_home', 'Home Phone', 'trim|callback_valid_homephone');
            $this->form_validation->set_rules('phone_mobile', 'Mobile Phone', 'trim|callback_valid_mobilephone');
            $this->form_validation->set_rules('phone_other', 'Mobile Phone', 'trim|callback_valid_otherphone');
            $this->form_validation->set_rules('phone_fax', 'Mobile Phone', 'trim|callback_valid_faxphone');
            $this->form_validation->set_rules('primary_address_street', 'Street Address', 'trim');
            $this->form_validation->set_rules('primary_address_city', 'City', 'trim');
            $this->form_validation->set_rules('primary_address_state', 'State', 'trim');
            $this->form_validation->set_rules('primary_address_postalcode', 'Zip Code', 'trim');
        }


        if ($this->form_validation->run()and $action == 'Update') {

            if ($this->updateContact($this->input->post())) {

                $js = "<script> alert('Contact Updated!')  </script>";
                echo $js;
                $this->details('View', $this->input->post('id'));
                return;
            } else {
                $js = "<script> alert('Database Error. Please check your network connection and try again.')  </script>";
                echo $js;
            }
        } else {
            $fdata = array('fields' => $this->input->post());
            $form = $this->load->view('contacts/forms/updateView', $fdata, true);
            echo $form;
        }
    }

    private function updateContact($fields) {
        $this->load->model('theModel');
        $this->theModel->connectSugar();
        $data = $this->theModel->addRecord('Contacts', $fields);
        if ($data) {
            return true;
        }
        return false;
    }

    function valid_workphone() {
        $data = $this->input->post('phone_work');
        if ($this->myhelpers->valid_phone_number_or_empty($data)) {
            return true;
        } else {
            $this->form_validation->set_message('valid_workphone', 'Invalid work phone: Format xxx-xxx-xxxx');
            return false;
        }
    }

    function valid_homephone() {
        $data = $this->input->post('phone_home');
        if ($this->myhelpers->valid_phone_number_or_empty($data)) {
            return true;
        } else {
            $this->form_validation->set_message('valid_homephone', 'Invalid home phone: Format xxx-xxx-xxxx');
            return false;
        }
    }

    function valid_mobilephone() {
        $data = $this->input->post('phone_mobile');
        if ($this->myhelpers->valid_phone_number_or_empty($data)) {
            return true;
        } else {
            $this->form_validation->set_message('valid_mobilephone', 'Invalid mobile phone: Format xxx-xxx-xxxx');
            return false;
        }
    }

    function valid_otherphone() {
        $data = $this->input->post('phone_other');
        if ($this->myhelpers->valid_phone_number_or_empty($data)) {
            return true;
        } else {
            $this->form_validation->set_message('valid_otherphone', 'Invalid other phone: Format xxx-xxx-xxxx');
            return false;
        }
    }

    function valid_faxphone() {
        $data = $this->input->post('phone_fax');
        if ($this->myhelpers->valid_phone_number_or_empty($data)) {
            return true;
        } else {
            $this->form_validation->set_message('valid_faxphone', 'Invalid fax number: Format xxx-xxx-xxxx');
            return false;
        }
    }

}
