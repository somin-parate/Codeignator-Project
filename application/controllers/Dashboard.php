<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * User class.
 * 
 * @extends CI_Controller
 */
class Dashboard extends CI_Controller {

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
		$this->load->model('user_model');
		if (!$this->session->userdata('logged_in')) {
		         redirect('/login');
		 } 
		
	}
	
	
	public function index() {
		
		if ($this->session->userdata('logged_in')) {
		        $this->load->view('dashboard');
		    } else {
		        redirect('/login');
		    }
		
	}
	
	public function dashboard() {
		if (!$this->session->userdata('logged_in')) {
		        redirect('/login');
		    } 

		 $this->load->view('header');
	     $this->load->view('dashboard/dashboard/dashboard');
		 $this->load->view('footer');
		
	}
	
	
}
