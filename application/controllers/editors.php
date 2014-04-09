<?php //

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

    /*public function view($page = 'edithome', $id = '0', $case = '123456') {

        //echo 'inside the pages controler';
        if (!file_exists('application/views/editors/' . $page . '.php')) {
            // Whoops, we don't have a page for that!
            show_404();
        }
        //echo 'Home page exiss!';
        $data['title'] = ucfirst($page); // Capitalize the first letter
        $data['id'] = $id;
        $data['case'] = $case;

        //if( $page=== 'home')
        // {
        //  echo 'getting accounts... ';
        //$this->load->model('g8r_gcasefile_model');
        //$data= $this->g8r_gcasefile_model->get_cases();
        // print_r($data);
        // }
        // $this->load->view('templates/header', $data);
        $this->load->view('editors/' . $page, $data);
        // $this->load->view('templates/footer', $data);
    }*/

    function form($page, $id = '0', $case = '123456',$name ='') {
        $this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');
        $data['title'] = ucfirst($page); 
        $data['id'] = $id;
        $data['case'] = $case;
        $data['name'] = $name;
        $data['values'] = $posteddata = $this->input->post();
        echo '$_POST = <br> <pre>';
        print_r($_POST);
        print_r($this->session->userdata('hidden'));
        echo'</pre>';
        
        $this->form_validation->set_rules('name', 'CaseName', 'required');
        //$this->form_validation->set_rules('docket', 'Docket', 'required');
        $this->load->model('g8r_gcasefile_model');
        $data['formfielddefs'] = $this->g8r_gcasefile_model->loaddisplayfields();
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('editors/' . $page,$data);
            $this->load->view('templates/footer', $data);
        } else {

            $this->load->view('templates/header', $data);
            $this->load->view('editors/' . $page.'Success',$data);
            $this->load->view('templates/footer', $data);
        }
    }

}
