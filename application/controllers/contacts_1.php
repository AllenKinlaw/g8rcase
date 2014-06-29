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
        $this->myhelpers->setModuleData(array('currentModule' => 'contacts'));
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
        $this->load->model('mongoModel');

//        $filter = array(
//            'Client' => $id
//        );
        $cursor = $this->mongoModel->getMongoData('contacts', '');

        foreach ($cursor as $col) {
            $firstletter = $col['lastName'][0];
            $background = $this->myhelpers->getLetterBackground($firstletter);
            $rowtext1 = $col['salutation'] . ' ' . $col['firstName'] . ' ' . $col['lastName'];
            $rowtext2 = 'P. ' . $col['phone'];
            $rowtext3 = $col['email'];
            $smlabel = '';
            $smtext = $col['type'];
            $rtn[] = array('id' => $col['_id'],
                'targeturl' => base_url() . 'contacts/details/View/' . $col['_id'],
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

        $data = array();
        $this->load->view('templates/header');
        $this->load->view('templates/topnav');
        $this->load->view('templates/doleftnav');
        $data = array_merge($data, $this->myhelpers->getUserData());
        $this->load->model('mongoModel');
        $filter = array(
            '_id' => new MongoId($id)
        );

        $dfields = $this->mongoModel->getMongoDatabyId('contacts', $filter);
        $data['fields'] = $dfields;
        $data['fields']['id'] = $id;
        $data['TaskHeader'] = 'Contacts';
        $rtn = $this->load->view('contacts/forms/detailView', $data, true);
        echo $rtn;
    }

    public function delete($id) {
        $this->load->model('mongoModel');
        $filter = array(
            '_id' => new MongoId($fields['id'])
        );
        $fields['deleted'] = 1;
        //$fields['datefiled'] = new MongoDate(strtotime($fields['datefiled']));
        $this->mongoModel->setMongoData('contacts', $filter, $fields);
        echo base_url() . 'contacts/view/main';
    }

    public function create($callingid) {
//        $displaymodel = 'contacts_defaultData';
//        $this->load->model($displaymodel);
//        $data = array();
//        $data = array_merge($data, $this->$displaymodel->getData());
//        $fields = array();
//        foreach ($this->$displaymodel->getFields() as $value) {
//            $fields[$value] = '';
//        }
//        $fdata = array('fields' => $fields);
//        $fdata['callingid'] = $callingid;
        $fdata = array('fields' => array('id' => 0));
        $form = $this->load->view('contacts/forms/updateView', $fdata, true);
        echo $form;
        return;
    }

    public function update($action = 'View', $id = '') {

        $data = array();
        if ($action == 'Update') {
            $this->load->library('form_validation');
            // we are saving prefered email and Title
            $testd = $this->input->post('email');
            $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
            $this->form_validation->set_rules('phone', 'Phone', 'trim|callback_valid_workphone');
            $this->form_validation->set_rules('street', 'Street Address', 'trim');
            $this->form_validation->set_rules('city', 'City', 'trim');
            $this->form_validation->set_rules('state', 'State', 'trim');
            $this->form_validation->set_rules('postalcode', 'Zip Code', 'trim');
        }
        if ($this->form_validation->run()and $action == 'Update') {

            $rtnid = $this->updateContact($this->input->post());
            if ($rtnid) {

                $js = "<script> alert('Contact Updated!')  </script>";
                echo $js;
                $this->details('View', $rtnid);
                return;
            } else {
                $js = "<script> alert('Database Error. Please check your network connection and try again.')  </script>";
                echo $js;
            }
        } else {
            $fdata = array('fields' => $this->input->post());
//            if (count($fdata) < 2) {
//                $this->load->model('mongoModel');
//                $filter = array(
//                    '_id' => new MongoId($id)
//                );
//
//                $dfields = $this->mongoModel->getMongoDatabyId('contacts', $filter);
//                $fdata['fields'] = $dfields;
//                $fdata['fields']['id'] = $id;
//            }
            $form = $this->load->view('contacts/forms/updateView', $fdata, true);
            echo $form;
        }
    }

    private function updateContact($fields) {
        $this->load->model('mongoModel');
        if ($fields['id'] != 0) {
            $filter = array(
                '_id' => new MongoId($fields['id'])
            );
        } else {
            $filter = array();
        }

        //$fields['datefiled'] = new MongoDate(strtotime($fields['datefiled']));
        $this->mongoModel->setMongoData('contacts', $filter, $fields);
        return true;
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
