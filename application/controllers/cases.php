<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Cases extends CI_Controller {

    public function view($module = 'main') {

        $this->myhelpers->getModuleData(array('currentModule' => 'cases'));
        $this->myhelpers->setUserData();
        $displaymodel = 'cases_defaultData';
        $this->load->model($displaymodel);
        $data = array();
        $data = array_merge($data, $this->$displaymodel->getData());
        $this->load->view('templates/header');
        $this->load->view('templates/topnav');
        $this->load->view('templates/doleftnav');

        $data = array_merge($data, $this->myhelpers->getUserData());
        $data['listname'] = 'widgets\list';
        $data['listitems'] = $this->getCases($this->$displaymodel->getFields());
        $data['module'] = 'cases';
        $this->load->view($module, $data);
        $this->load->view('templates/footer');
    }

    private function getCases($fields) {
        $this->load->model('theModel');
        $this->theModel->connectSugar();
        $data = $this->theModel->getRecords('cases', $fields);
        foreach ($data as $row => $col) {
            $firstletter = $col['last_name'][0];
            $background = $this->myhelpers->getLetterBackground($firstletter);
            $rowtext1 = $col['salutation'] . ' ' . $col['first_name'] . ' ' . $col['last_name'];
            $rowtext2 = 'M. ' . $col['phone_mobile'];
            $rowtext3 = $col['email1'];
            $smlabel = '';
            $smtext = $col['department'];
            $rtn[] = array('id' => $col['id'],
                'targeturl' => base_url() . 'cases/details/View/' . $col['id'],
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
        $displaymodel = 'cases_defaultData';
        $this->load->model($displaymodel);
        $this->load->model('theModel');
        $this->theModel->connectSugar();
        // $data = $this->theModel->searchRecords ($this->input->post('search_str'),array('Cases'),0,100);
        //$searchfields = $this->$displaymodel->getSearchFields();
        $searchfields = '';
        $data = $this->theModel->searchRecords($search_on, array('Cases'), 0, 100, '', $searchfields);
        //getRecords('cases',$this->$displaymodel->getSearchFields());
        foreach ($data['entry_list'] as $row => $mod) {
            foreach ($mod['records'] as $row2 => $column) {
                $id = $column['id']['value'];
                $col = $this->theModel->getaRecord('cases', $id, $this->$displaymodel->getFields());

                $firstletter = $col['last_name'][0];
                $background = $this->myhelpers->getLetterBackground($firstletter);
                $rowtext1 = $col['salutation'] . ' ' . $col['first_name'] . ' ' . $col['last_name'];
                $rowtext2 = 'M. ' . $col['phone_mobile'];
                $rowtext3 = $col['email1'];
                $smlabel = '';
                $smtext = $col['department'];
                $rtn[] = array('id' => $col['id'],
                    'targeturl' => base_url() . 'cases/details/View/' . $col['id'],
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
            $data['module'] = 'cases';
            $listitems = $this->load->view($data['listname'], $data, true);
        } else {
            $listitems = $this->myhelpers->displayErrorAlert('No Match found');
        }
        echo $listitems;
    }

    public function childView($id) {
        $this->load->model('theModel');

        $filter = array(
            '_id' => new MongoId($id)
        );
        $module = 'cases/forms/childView';
        $cursor = $this->theModel->getMongoDatabyId('cases', $filter);
        $data['fields'] = $cursor;
        $data['fields']['id'] = $id;
        $rtn = $this->load->view($module, $data, true);
//        $rtn .= 'ID = '.$id. '<br> <pre>'
//            . var_dump($data['fields'])
//            . '</pre>';
        echo $rtn;
    }

    public function details($action = 'View', $id) {

        $currentModule = $this->myhelpers->getModuleData();

        $displaymodel = 'cases_defaultData';
        $this->load->model($displaymodel);
        $data = array();
        $data = array_merge($data, $this->$displaymodel->getData());
        $this->load->view('templates/header');
        $this->load->view('templates/topnav');
        $this->load->view('templates/doleftnav');
        $data = array_merge($data, $this->myhelpers->getUserData());
//        $data['listname'] = 'widgets\list';
//        $data['listitems'] = $this->getCases($this->$displaymodel->getFields());
        $module = 'cases/forms/detail' . $action;
//        $this->load->model('theModel');
//        $this->theModel->connectSugar();
//        if ($currentModule == 'cases') {
//            $data['fields'] = $this->theModel->getaRecord('cases', $id, $this->$displaymodel->getFields(), $options);
//        } else {
//            //$options['where'] = $currentModule . ".id = '" . $id . "'";
//            $fields = array(
//                ucfirst($currentModule) => array(
//                    'id'),
//                'Cases' => $this->$displaymodel->getFields(),
//                'Tasks' => array(
//                    'id',
//                    'name',
//                    'date_due')
//            );
//
//            $data['fields'] = $this->theModel->getRelatedRecords($currentModule, $id, $fields);
        //echo '<pre>'. print_r($data['fields']) . '</pre>';
//            echo $this->sugar_rest->print_results($data['fields']);
//            return;
//        }
//          $data['fields'] = array('cases'=>$cases);
//          $data['fields'] = array('work_log'=>'');
//          $data['fields'] = array('resolution'=>'');
//          $data['fields'] = array('description'=>'');
        $this->load->model('theModel');

        $filter = array(
            'Client' => $id
        );

        $cursor = $this->theModel->getMongoData('cases', $filter);

// iterate through the results
        foreach ($cursor as $document) {
            //echo '' . $document["title"] . '<br>';
            $data['fields']['cases'][] = array('case_number' => $document['docket'],
                'name' => $document['title'],
                'type' => $document['type'],
                'status' => $document['status'],
                'id' => $document['_id']);
        }
        $data['fields']['id'] = $id;
        $rtn = $this->load->view($module, $data, true);
        echo $rtn;
    }

    public function delete($id) {
        $this->load->model('theModel');
        $this->theModel->connectSugar();
        $data = $this->theModel->deleteRecord('Cases', $id);
        if ($data) {
            echo base_url() . 'cases/view/main';
        } else {
            $js = '';
            echo $js;
        }
    }

    public function create($callingid) {
        $displaymodel = 'cases_defaultData';
        $this->load->model($displaymodel);
        $data = array();
        $data = array_merge($data, $this->$displaymodel->getData());
        $fields = array();
        foreach ($this->$displaymodel->getFields() as $value) {
            $fields[$value] = '';
        }
        $fdata = array('fields' => $fields);
        $fdata['callingid'] = $callingid;

        $form = $this->load->view('cases/forms/updateView', $fdata, true);
        echo $form;
        return;
    }

    public function update($action = 'View', $id = '') {


        $displaymodel = 'cases_defaultData';
        $this->load->model($displaymodel);
        $data = array();
        $data = array_merge($data, $this->$displaymodel->getData());
//        $this->load->view('templates/header');
//        $this->load->view('templates/topnav');
//        $this->load->view('templates/doleftnav');
//        $data = array_merge($data, $this->myhelpers->getUserData());
//        $module = 'cases/forms/update' . $action;
        $this->load->model('theModel');
//        $this->theModel->connectSugar();
//        $data['fields'] = $this->theModel->getaRecord('cases', $id, $this->$displaymodel->getFields());
//        $rtn = $this->load->view($module, $data, true);
//        echo $rtn;
        ///////////////////////////////////////////////////////////////////////
        if ($action == 'Update') {
            $this->load->library('form_validation');
            // we are saving prefered email and Title
            $this->form_validation->set_rules('title', 'Case Name', 'required|trim');
        }
        if ($this->form_validation->run()and $action == 'Update') {

            $rtnid = $this->updateCase($this->input->post());
            if ($rtnid) {

                $js = "<script> alert('Case Updated!')  </script>";
                echo $js;
                $this->details('View', $rtnid);
                return;
            } else {
                $js = "<script> alert('Database Error. Please check your network connection and try again.')  </script>";
                echo $js;
            }
        } else {
            $fdata = array('fields' => $this->input->post());
            $datefiled = new MongoDate(strtotime($this->input->post('datefiled')));
            $fdata['fields']['datefiled'] = $datefiled;
            $form = $this->load->view('cases/forms/updateView', $fdata, true);
            echo $form;
        }
    }

    private function updateCase($fields) {
        $this->load->model('theModel');
        $filter = array(
            '_id' => new MongoId($fields['id'])
        );
        $fields['datefiled'] = new MongoDate(strtotime($fields['datefiled']));
        $this->theModel->setMongoData('cases', $filter, $fields);
//        if ($data) {
//            return $data['id'];
//        }
        return $fields['id'];
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
