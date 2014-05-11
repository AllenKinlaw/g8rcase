<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Main extends CI_Controller {
	public function index($module='login') {
		$this->load->view ( 'templates/header' );
		$this->load->view ( 'templates/topnav' );
		$this->load->view ( 'templates/blankleftnav' );
		$this->load->view (  $module );
		$this->load->view ( 'templates/footer' );
	}
        public function view($module='login') {
		$this->load->view ( 'templates/header' );
		$this->load->view ( 'templates/topnav' );
		$this->load->view ( 'templates/blankleftnav' );
		$this->load->view (  $module );
		$this->load->view ( 'templates/footer' );
	}
}
