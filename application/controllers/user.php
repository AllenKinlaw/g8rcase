<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class User extends CI_Controller {

    public function test() {
        echo 'user controller works';
    }

    public function view($module = 'login') {
        $displaymodel = $module . '_defaultData';
        $this->load->model($displaymodel);
        $data = array();
        $data = array_merge($data, $this->$displaymodel->getData());
        $this->load->view('templates/header');
        $this->load->view('templates/topnav');
        $this->load->view('templates/doleftnav');
        $this->myhelpers->setUserData();
        $data = array_merge($data, $this->myhelpers->getUserData());
        $this->load->view('users/' . $module, $data);
        $this->load->view('templates/footer');
    }

    public function validate_login() {
        //echo 'Login Validated';
        $data = $this->input->post();
//        $this->load->library('form_validation');
        $this->form_validation->set_rules('Email', 'Email', 'required|trim|callback_testlogin'); //
        $this->form_validation->set_rules('Password', 'Password', 'required|trim');

//        if ($this->form_validation->run()&& $this->test()) {
        if ($this->form_validation->run()) {
            //$this->setSession();
            $this->session->set_userdata($data);
            //redirect('contacts');
            echo 'Load Contacts!';
        } else {
            $rtn = $this->load->view('login', "", true);
            echo $this->load->view('login', "", true);
        }
    }

    public function testlogin() {
        $this->login('', $this->input->post('Email'), $this->input->post('Password'));
        if ($this->sugar_rest->is_logged_in()) {
            return true;
        }
        $this->form_validation->set_message('testlogin', 'Invalid Email or Password!');
        return false;
    }

    public function login($email, $pwd) {
        $this->sugar_rest->Sugar_Rest('', $email, $pwd);
        if ($this->sugar_rest->is_logged_in()) {
            return true;
        }
        $this->form_validation->set_message('login', 'Invalid Email or Password!');
        return false;
    }

    public function signupform() {
//         $this->load->library('form_validation');
        $this->login('Admin', 'l12007');
        $this->load->model('theModel');
        $this->form_validation->set_rules('Cemail', 'Confirmation email', 'required|trim|valid_email|matches[Email]');
        $this->form_validation->set_rules('Email', 'Email', 'callback_userexists|required|trim|valid_email'); //callback_userexists|
        //
        if ($this->form_validation->run()) {
            //$this->setSession();
            $key = md5(uniqid());
            if ($this->addUser($key)) {
                if ($this->sendValidationEmail($key)) {
                    echo '<h2> Please check your in box for a confirmation email.</h2>'
                    . '<img src="images/headshot.png"> </i>';
                }
            } else {
                echo 'database Error!';
            }
        }
    }

    function userexists() {
        // $this->load->model('theModel');
        $fields = array('id', 'user_name');
        $options['where'] = "users.user_name = '" . strtolower($this->input->post('Email')) . "'";
        $data = $this->theModel->finduser($fields, $options);
        if ($data['_cnt'] > 0) {
            $this->form_validation->set_message('userexists', 'There is already and account with for this email address. <a href="#">Click here to reset password.</a>');
            return false;
        }
        return true;
    }

    private function addUser($key) {
        // $this->load->model('theModel');
        $fields = array('user_name' => $this->input->post('Email'),
            'user_hash' => md5($this->input->post('Password')),
            'temp_hash_c' => $key,
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name')
        );
        $data = $this->theModel->addRecord('Users', $fields);
        if ($data)
            return true;
        return false;
    }

    private function sendValidationEmail($key) {
        $this->load->library('email');
        //configure email
        $config['protocol'] = 'smtp';
        $config['mailtype'] = 'html';
        $config['smtp_crypto'] = 'tls';
        $config['smtp_host'] = 'smtp.gmail.com';
        $config['smtp_user'] = 'allen.kinlaw@gmail.com';
        $config['smtp_pass'] = 'lawyer2010';
        $config['smtp_port'] = '587';

        $this->email->set_newline("\r\n");
        $this->email->initialize($config);


        $this->email->from('allen.kinlaw@gmail.com', 'Admin');
        $this->email->to($this->input->post('Email'));
        $this->email->subject('Confirm Registration');
        $message = "<h1> Welcome to Gator Case!</h1> <a href='"
                . base_url() . "user/resetPassword/" . $key . "'>Click here to confirm your account! </a>";

        $this->email->message($message);
        $data = $this->email->print_debugger();
        if ($this->email->send()) {
            return true;
        }

        return false;
    }

    function resetPassword($key) {
        $this->load->model('theModel');
        if ($this->theModel->isKeyValid($key)) {
            $data['key'] = $key;
            $this->load->view('templates/header');
            $this->load->view('templates/topnav');
            $this->load->view('templates/doleftnav');
            $this->load->view('resetPassword', $data);
            $this->load->view('templates/footer');
        } else {
            echo 'Invalid key!';
        }
    }

    function changePassword($key) {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('Password', 'Password', 'required|trim');
        $this->form_validation->set_rules('CPassword', 'Confirmation Password', 'required|trim|matches[Password]');
        if ($this->form_validation->run()) {
            $this->load->model('theModel');
            if ($this->theModel->updateUser($key, $this->input->post('Password'))) {
                $this->setSession();
                echo 'now do user profile or let them continue if minimum profile exists';
            } else {
                echo 'database Error!';
            }
        } else {
            // echo 'Validation Error!';
            $data = array('key' => $key);
            echo $this->load->view('resetPasswordForm', $data, true);
        }
    }

    function saveProfile($step) {
        echo 'Step ' . $step . ' Complete!';
        $data = array();
        $data = array_merge($data, $this->myhelpers->getUserData());
        $this->load->model('setupprofile_defaultData');
        // remove this block above once complete  
        $fdefaults = $this->setupprofile_defaultData->getData();
        $this->load->library('form_validation');
        switch ($step) {
            case 1:
                // we are saving prefered email and Title
                $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
                break;
            case 2:
                $this->form_validation->set_rules('work_phone', 'Work Phone', 'trim|callback_valid_workphone');
                $this->form_validation->set_rules('home_phone', 'Home Phone', 'trim|callback_valid_homephone');
                $this->form_validation->set_rules('mobile_phone', 'Mobile Phone', 'trim|callback_valid_mobilephone');
                break;
            case 3:
                $this->form_validation->set_rules('address_street', 'Street Address', 'trim');
                $this->form_validation->set_rules('address_city', 'City', 'trim');
                $this->form_validation->set_rules('address_state', 'State', 'trim');
                $this->form_validation->set_rules('address_postalcode', 'Zip Code', 'trim');

                break;
            default:
                break;
        }


        if ($this->form_validation->run()) {

            if ($this->updateUserProfile($step)) {
                if ($fdefaults['steps'] != $step) {
                    // $js = "<script> alert('Step " . $step . " complete')  </script>";
                    //echo $js;
                    $fname = 'users/forms/userProfile_' . ($step + 1);

                    $fdata = array('steps' => $fdefaults['steps'],
                        'step' => $step + 1);
                    $form = $this->load->view('widgets/simpleStepper', $fdata, true);



                    $fdata = array('form' => 'users/forms/userProfile_' . ($step + 1),
                        'step' => $step + 1,
                        'heading' => $data['username'],
                        'data' => $data);
                    $form .= $this->load->view('widgets/simpleStepperSteps', $fdata, true);
                } else {
                    $step = 1;
                    $fdefaults = $this->setupprofile_defaultData->getFirmData();
                    echo 'User Profile Complete. Set up Firm.';

                    $fdata = array('steps' => $fdefaults['steps'],
                        'step' => $step);
                    $form = $this->load->view('widgets/simpleStepper', $fdata, true);

                    $fdata = array('form' => 'users/forms/setupFirm_' . ($step),
                        'step' => $step,
                        'heading' => $data['username'],
                        'data' => $data);
                    $form .= $this->load->view('widgets/simpleStepperSteps', $fdata, true);
                }

                //$form .= $this->load->view($fname, $data, true);

                echo $form;
            } else {
                echo 'database Error saving User Profile!';
            }
        } else {

            $fdata = array('steps' => $fdefaults['steps'],
                'step' => $step);
            $form = $this->load->view('widgets/simpleStepper', $fdata, true);

            $fdata = array('form' => 'users/forms/userProfile_' . ($step),
                'step' => $step,
                'heading' => $data['username'],
                'data' => $data);
            $form .= $this->load->view('widgets/simpleStepperSteps', $fdata, true);
            echo $form;
        }
    }

    function savePayment($step,$firm) {
        echo 'Step ' . $step . ' Complete!';
        $data = array();
        $data = array_merge($data, $this->myhelpers->getUserData());
        $this->load->model('setupprofile_defaultData');
        // remove this block above once complete  
        $fdefaults = $this->setupprofile_defaultData->getPaymentData();
        $firmData = $this->getFirmByKey($firm);
        $this->load->library('form_validation');
        switch ($step) {
            case 1:
                // we are saving prefered email and Title
                $this->form_validation->set_rules('frequency', 'Payment Plan', 'required');
                break;

            default:
                break;
        }


        if ($this->form_validation->run()) {

            if ($this->updatePaymentProfile($step,$firmData)) {
                if ($fdefaults['steps'] != $step) {
//                    $js = "<script> alert('Step " . $step . " complete')  </script>";
//                    echo $js;
//                    $fname = 'users/forms/setupPayment_' . ($step + 1);
                    $fdata = array('steps' => $fdefaults['steps'],
                        'step' => $step + 1);
                    $form = $this->load->view('widgets/simpleStepper', $fdata, true);

                    $fdata = array('form' => 'users/forms/setupPayment_' . ($step + 1),
                        'step' => $step + 1,
                        'heading' => $data['username'],
                        'data' => $data,
                        'firmkey' => $this->session->userdata('firmKey'));
                    $form .= $this->load->view('widgets/simpleStepperSteps', $fdata, true);
                } else {
                    $fdefaults = $this->setupprofile_defaultData->getFirmData();
                    echo 'Payment Profile Complete. You are now a Gator';
                }
                echo $form;
            } else {
                echo 'database Error saving User Profile!';
            }
        } else {

            $fdata = array('steps' => $fdefaults['steps'],
                'step' => $step);

            $fname = 'users/forms/userProfile_' . ($step + 1);

            $form = $this->load->view('widgets/simpleStepper', $fdata, true);
            $postvar = $this->input->post();
            $fdata = array('form' => 'users/forms/setupPayment_' . ($step),
                'step' => $step,
                'heading' => $data['username'],
                'data' => $data,
                'firmkey' => $this->session->userdata('firmKey'),
                'numUsers' => $this->input->post('numusers'));
            $form .= $this->load->view('widgets/simpleStepperSteps', $fdata, true);
            echo $form;
        }
    }

    private function updatePaymentProfile($step, $firmdata) {

        //   $this->theModel->connectSugar();

        switch ($step) {
            case 1:
                $fields = array('id' => $firmdata['id'],
                    'account_type' => $this->input->post('accountype'),
                    'name' => $this->input->post('firm_name'),
                    'employees' => $this->input->post('num_users'),
                    'industry' => $this->session->userdata('firmKey'));
                break;
            default:
                break;
        }
        // need to add email as a related field...
        //$data = $this->theModel->addRecord('Accounts', $fields);
        // if ($data) {
        return true;
        // } else {
        //     echo 'Error updating Firm Record';
        //     return false;
        // }
        //}
        return false;
    }

    private function updateFirmProfile($step, $firmdata) {
        //$this->load->model('theModel');
        //$fields = array('id',);
        // $options['where'] = "users.user_name = '" . $this->session->userdata('guser') . "'";
        $this->theModel->connectSugar();
        //$data = $this->theModel->finduser($fields, $options);
        //$id = $data['id'];
        //if ($data['_cnt'] == 1) {
        switch ($step) {
            case 1:
                // we are establishing a new firm
                $firmKey = uniqid();
                if ($this->input->post('newfirm')) {
                    $fields = array('id' => '', 'industry' => $firmKey);
                }
                break;
            case 2:
                $fields = array('id' => $firmdata['id'],
                    'account_type' => $this->input->post('accountype'),
                    'name' => $this->input->post('firm_name'),
                    'employees' => $this->input->post('num_users'),
                    'industry' => $this->session->userdata('firmKey'));
                break;
            case 3:
                $fields = array('id' => $firmdata['id'],
                    'phone_office' => $this->input->post('acct_phone'),
                    'billing_address_city' => $this->input->post('city'),
                    'billing_address_street' => $this->input->post('street'),
                    'billing_address_state' => $this->input->post('state'),
                    'billing_address_postalcode' => $this->input->post('postalcode'),
                    'industry' => $this->session->userdata('firmKey'));
            default:
                break;
        }
        // need to add email as a related field...

        $data = $this->theModel->addRecord('Accounts', $fields);
        if ($data) {
            $firmKey = $data['entry_list']['industry']['value'];
            $this->myhelpers->setFirmData(array('firmKey' => $firmKey));
            return true;
        } else {
            echo 'Error updating Firm Record';
            return false;
        }
        //}
        return false;
    }

    private function updateUserProfile($step) {
        $this->load->model('theModel');
        $fields = array('id',);
        $options['where'] = "users.user_name = '" . $this->session->userdata('guser') . "'";
        $this->theModel->connectSugar();
        $data = $this->theModel->finduser($fields, $options);
        $id = $data['id'];

        if ($data['_cnt'] == 1) {
            switch ($step) {
                case 1:
                    // we are saving prefered email and Title
                    $fields = array('id' => $id,
                        'email1' => $this->input->post('email'),
                        'title' => $this->input->post('title'));
                    break;
                case 2:
                    $fields = array('id' => $id,
                        'phone_work' => $this->input->post('work_phone'),
                        'phone_home' => $this->input->post('home_phone'),
                        'phone_mobile' => $this->input->post('mobile_phone'));
                    break;
                case 3:
                    $fields = array('id' => $id,
                        'address_city' => $this->input->post('address_city'),
                        'address_street' => $this->input->post('address_street'),
                        'address_state' => $this->input->post('address_state'),
                        'address_postalcode' => $this->input->post('address_postalcode'));
                default:
                    break;
            }
            // need to add email as a related field...

            $data = $this->theModel->addRecord('Users', $fields);
            if ($data) {
                return true;
            } else {
                echo 'Error updating profile password';
                return false;
            }
        }
        return false;
    }

    function valid_workphone() {
        $data = $this->input->post('work_phone');
        return $this->valid_phone_number_or_empty($data, 'valid_workphone', 'Invalid work phone: Format xxx-xxx-xxxx');
    }

    function valid_homephone() {
        $data = $this->input->post('home_phone');
        return $this->valid_phone_number_or_empty($data, 'valid_homephone', 'Invalid home phone: Format xxx-xxx-xxxx');
    }

    function valid_mobilephone() {
        $data = $this->input->post('mobile_phone');
        return $this->valid_phone_number_or_empty($data, 'valid_mobilephone', 'Invalid mobile phone: Format xxx-xxx-xxxx');
    }

    private function valid_phone_number_or_empty($value, $calling, $msg) {
        $value = trim($value);
        if ($value == '') {
            return true;
        } else {
            if (preg_match('/^\(?[0-9]{3}\)?[-. ]?[0-9]{3}[-. ]?[0-9]{4}$/', $value)) {
                return true;
                return preg_replace('/^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/', '($1) $2-$3', $value);
            } else {
                $this->form_validation->set_message($calling, $msg);
                return false;
            }
        }
    }

    function savefirm($step = 1, $firm = '') {

        // remove this block above once complete  
        $data = array();
        $data = array_merge($data, $this->myhelpers->getUserData());
        $this->load->library('form_validation');
        $this->load->model('setupprofile_defaultData');
        $fdefaults = $this->setupprofile_defaultData->getFirmData();
        $firmData = $this->getFirmByKey($firm);
        $data['currentstep'] = 'step' . $step;
        switch ($step) {
            case(1):
                $this->form_validation->set_rules('firmkey', 'Firm Key', 'trim|callback_validateFirmKey');
                $this->form_validation->set_rules('newfirm', 'New Firm', 'callback_check_new_or_key');
//                if ($firm && $firmData['_cnt'] == 1) {
//                    $firmData['currentstep'] = 'step' . $step;
//
//                }
//                if ($firm) {
//                    echo 'bad ticker!!!';
//                }
                break;
            case(2):

                $this->form_validation->set_rules('firm_name', 'Firm Name', 'trim');
                break;
            case(3):
                $this->form_validation->set_rules('acct_phone', 'Phone', 'trim');
                $this->form_validation->set_rules('street', 'Street', 'trim');
                $this->form_validation->set_rules('city', 'City', 'trim|alpha');
                $this->form_validation->set_rules('state', 'State', 'trim|alpha');
                $this->form_validation->set_rules('postalcode', 'Zip', 'trim|numeric');
                break;
            default:
                break;
        }
        if ($this->form_validation->run()) {

            if ($this->updateFirmProfile($step, $firmData)) {
                if ($fdefaults['steps'] != $step) {
                    $fdata = array('steps' => $fdefaults['steps'],
                        'step' => $step + 1);
                    $form = $this->load->view('widgets/simpleStepper', $fdata, true);
                    $fdata = array('form' => 'users/forms/setupFirm_' . ($step + 1),
                        'step' => $step + 1,
                        'heading' => $data['username'],
                        'data' => $data,
                        'firmkey' => $this->session->userdata('firmKey'));
                    $form .= $this->load->view('widgets/simpleStepperSteps', $fdata, true);
                } else {
                    $step = 1;
                    $fdefaults = $this->setupprofile_defaultData->getPaymentData();
                    echo 'Firm Profile Complete. Set up Payments.';

                    $fdata = array('steps' => $fdefaults['steps'],
                        'step' => $step);
                    $form = $this->load->view('widgets/simpleStepper', $fdata, true);

                    $fdata = array('form' => 'users/forms/setupPayment_' . ($step),
                        'step' => $step,
                        'heading' => $data['username'],
                        'data' => $data,
                        'firmkey' => $this->session->userdata('firmKey'),
                        'numUsers' => $firmData['employees']);
                    $form .= $this->load->view('widgets/simpleStepperSteps', $fdata, true);
                }
                echo $form;
            } Else {
                echo 'Error Updating DB - Firm Profile. Please try again later.';
            }
        } else {
            $fdata = array('steps' => $fdefaults['steps'],
                'step' => $step);
            $form = $this->load->view('widgets/simpleStepper', $fdata, true);

            $fdata = array('form' => 'users/forms/setupFirm_' . ($step),
                'step' => $step,
                'heading' => $data['username'],
                'data' => $data,
                'firmkey' => $this->session->userdata('firmKey'));
            $form .= $this->load->view('widgets/simpleStepperSteps', $fdata, true);
            echo $form;
        }
    }

    function validateFirmKey() {
        $this->form_validation->set_message('validateFirmKey', 'This firm key is invalid" ');
        return true;
    }

    function check_new_or_key() {
        if ($this->input->post('firmkey') || $this->input->post('newfirm')) {
            return true;
        }
        $this->form_validation->set_message('check_new_or_key', 'You must enter a valid firm key or select "Create a New Account" ');
        return false;
    }

    private function getFirmByKey($key) {

        $this->load->model('theModel');
        $this->theModel->connectSugar();
        $fields = array('id', 'name', 'account_type', 'office_phone', 'employees', 'industry', 'billing_address_street', 'billing_address_city', 'billing_address_state', 'billing_address_postalcode');
        $options['where'] = "accounts.industry = '" . $key . "'";
        $data = $this->theModel->getRecordWhere('Accounts', $fields, $options);
        if ($data['_cnt'] == 1) {
            return $data;
        }
        return false;
    }

}
