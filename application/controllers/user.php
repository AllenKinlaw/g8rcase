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
class User extends CI_Controller {

    //put your code here
    public function validate_login() {
        //echo 'Login Validated';
        $this->load->library('form_validation');
        $this->form_validation->set_rules('Email', 'Email', 'callback_test|required|trim'); //
        $this->form_validation->set_rules('Password', 'Password', 'required|md5|trim');

//        if ($this->form_validation->run()&& $this->test()) {
        if ($this->form_validation->run()) {
            $this->setSession();
            $this->session->set_userdata($data);
            redirect('contacts');
        } else {
            $this->load->view('templates/header');
            $this->load->view('templates/topnav');
            $this->load->view('templates/leftnav');
            $this->load->view('pages/login');
            $this->load->view('templates/footer');
        }
    }

    function setSession() {
        $data = array(
            'is_logged_in' => true,
            'guser' => $this->input->post('Email')
        );
        $this->session->set_userdata($data);
        $data = $this->session->all_userdata();
    }

    public function test() {

        if ($this->user_can_login()) {
            return true;
        } else {
            $this->form_validation->set_message('test', 'Bad UserName or Pword');
            return false;
        }
    }

    function user_can_login() {

        $this->load->model('theModel');
        $fields = array('id', 'user_name');
        $username = $this->input->post('Email');
        $pwd = $this->input->post('Password');
        //$options = array('where' => "users.user_name='" . $username . "' and users.user_hash = '" . $pwd . "'"); //and users.user_hash = "' . $pwd . '"');
        $data = $this->theModel->validateUser($username, $pwd);
        if ($data) {
            return true;
        }
        return false;
    }

    function logout() {
        $this->session->sess_destroy();
        redirect(login);
    }

    function loadregistration() {
        $this->load->view('templates/header');
        $this->load->view('templates/topnav');
        $this->load->view('templates/leftnav');
        $this->load->view('pages/register');
        $this->load->view('templates/footer');
    }

    function registeruser() {

        $this->loadregistration();
    }

    function sendValidationEmail($key) {
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
                . base_url() . "user/welcome/" . $key . "'>Click here to confirm your account! </a>";

        $this->email->message($message);
        $data = $this->email->print_debugger();
        if ($this->email->send()) {
            return true;
        }

        return false;
    }

    function register() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('Email', 'Email', 'callback_userexists|required|trim|valid_email'); //callback_userexists|
        $this->form_validation->set_rules('Cemail', 'Confirmation email', 'required|trim|valid_email|matches[Email]'); //


        if ($this->form_validation->run()) {
            $this->setSession();
            $key = md5(uniqid());
            if ($this->addUser($key)) {
                if ($this->sendValidationEmail($key)) {
                    redirect('welcome_1');
                } else {
                    redirect('user/registeruser');
                }
            } else {
                echo 'database Error!';
            }
        }
    }

    function welcome($key) {

        if ($this->isKeyValid($key)) {
            $data['key'] = $key;
            $this->load->view('templates/header');
            $this->load->view('templates/topnav');
            $this->load->view('templates/leftnav');
            $this->load->view('pages/welcome', $data);
            $this->load->view('templates/footer');
        } else {
            echo 'Invalid key!';
        }
    }

    function isKeyValid($key) {
        $this->load->model('theModel');
        $fields = array('id',);
        $options['where'] = "users_cstm.temp_hash_c = '" . $key . "'";
        $data = $this->theModel->finduser($fields, $options);
        if ($data['_cnt'] == 1) {
            return true;
        }
        return false;
    }

    function completeRegistration($key) {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('Password', 'Password', 'required|trim');
        $this->form_validation->set_rules('CPassword', 'Confirmation Password', 'required|trim|matches[Password]');
        if ($this->form_validation->run()) {

            if ($this->updateUser($key)) {
                $this->setSession();
                echo 'now do user profile';
            } else {
                echo 'database Error!';
            }
        }
    }

    function updateUser($key) {
        $this->load->model('theModel');
        $fields = array('id',);
        $options['where'] = "users_cstm.temp_hash_c = '" . $key . "'";
        $data = $this->theModel->finduser($fields, $options);
        $id = $data['id'];
        $pwd = md5($this->input->post('Password'));

        if ($data['_cnt'] > 0) {
            //Load the sugar DB bc cannt do this with REST
            $this->load->database();
            $data = $this->theModel->updateHash($pwd, $id);

            if ($data) {
                $fields = array('id' => $id,
                    'temp_hash_c' => '',
                    'title' => 'HMICON');
                $data = $this->theModel->addRecord('Users', $fields);
                if($data){
                return true;
                }
                else
                {
                 echo 'Error removing temp password';
                    return false;
                }
            }
            return false;
        }
    }

    function addUser($key) {
        $this->load->model('theModel');
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

    function userexists() {
        if ($this->userFound()) {
            $this->form_validation->set_message('userexists', 'There is already and account with for this email address. <a href="#">Click here to reset password.</a>');
            return false;
        } else {
            return true;
        }
    }

    function userFound() {
        $this->load->model('theModel');
        $fields = array('id', 'user_name');
        $options['where'] = "users.user_name = '" . strtolower($this->input->post('Email')) . "'";
        $data = $this->theModel->finduser($fields, $options);
        if ($data['_cnt'] > 0) {
            return true;
        }
        return false;
    }

}
