<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * User class.
 * 
 * @extends CI_Controller
 */
class Settings extends CI_Controller {

	/**
	 * __construct function.
	 * 
	 * @access public
	 * @return void
	 */
	public function __construct() {
		
		parent::__construct();
		$this->load->library(array('session'));
		$this->load->helper(array('url'));
		$this->load->model('setting_model');
		if (!$this->session->userdata('logged_in')) {
		         redirect('/login');
		 } 
		
	}
	
	
	public function index() {
		
	}
	
		public function settings() {
			$data = new stdClass();
			// load form helper and validation library
			$this->load->helper('form');
			$this->load->library('form_validation');
			if (!$this->session->userdata('logged_in')) {
			        redirect('/login');
			 } 
		 	 $data = $this->setting_model->get_setting();
		 	 $data1['setting_id'] = $data[0]['setting_id'];
		 	 $data1['facebook'] = $data[0]['facebook'];
		 	 $this->load->view('header');
	         $this->load->view('settings/settings/settings',$data1);
		     $this->load->view('footer');

		}
	
		public function edit_setting() {
			$data = new stdClass();
			// load form helper and validation library
			$this->load->helper('form');
			$this->load->library('form_validation');
			if (!$this->session->userdata('logged_in')) {
			        redirect('/login');
			 } 
			 $this->form_validation->set_rules('facebook', 'Facebook', 'trim|required');
			 if ($this->form_validation->run() === false) {
			 	    $facebook = $this->input->post('facebook');
					$setting_id = $this->input->post('setting_id');
					$data1['setting_id'] = $setting_id;
	 	            $data1['facebook'] = $facebook;
					$this->load->view('header');
			        $this->load->view('settings/settings/settings',$data1);
				    $this->load->view('footer');
			} else {
					// set variables from the form
					$facebook = $this->input->post('facebook');
					$setting_id = $this->input->post('setting_id');
					if ($this->setting_model->create_setting($facebook,$setting_id)) {
					 	 redirect('/settings');
				    }
		   }
		}
	
}
