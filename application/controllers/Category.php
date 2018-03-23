<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * User class.
 * 
 * @extends CI_Controller
 */
class Category extends CI_Controller {

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
		$this->load->model('category_model');
		$this->load->library("pagination");
		if (!$this->session->userdata('logged_in')) {
		         redirect('/login');
		 } 
	}
	
	public function index() {
        $config = array();
        $config["base_url"] = base_url() . "categories";
        $config["total_rows"] = $this->category_model->record_count();
        $config["per_page"] = 10;
        $config["uri_segment"] = 10;
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = round($choice);
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '«';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '»';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(10)) ? $this->uri->segment(10) : 0;
        $data["categories"] = $this->category_model->view($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
		$this->load->view('header');
		$this->load->view('category/index',$data);
		$this->load->view('footer');
		
	}

   public function uploadify()
	{
		$config['upload_path'] = "./assets/categories";
		$config['allowed_types'] = '*';
		$config['max_size'] = 0;
		$config['name'] = 'sam.png';

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload("userfile"))
		{
			$response = $this->upload->display_errors();
		}
		else
		{
			$response = $this->upload->data();
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}



	public function add() {
		// create the data object
		$data = new stdClass();
		// load form helper and validation library
		$this->load->helper('form');
		$this->load->library('form_validation');
		// set validation rules
		$this->form_validation->set_rules('category_name', 'Name', 'trim|required');
		$this->form_validation->set_rules('category_image', 'Image', 'trim|required');
		
		if ($this->form_validation->run() === false) {
			$this->load->view('header');
			$this->load->view('category/add', $data);
			$this->load->view('footer');
		} else {
			// set variables from the form
			$name = $this->input->post('category_name');
			$image = $this->input->post('category_image');
			if ($this->category_model->add_category($name,$image)) {
                $this->session->set_flashdata('flashSuccess', 'Category Sucessfully Added.');
				redirect('/categories');
			} else {
				$data->error = 'There was a problem creating your new account. Please try again.';
				$this->load->view('header');
				$this->load->view('category/add', $data);
				$this->load->view('footer');
				
			}

		}
		
	}

	/**
	 * login function.
	 * 
	 * @access public
	 * @return void
	 */
	public function edit($id) {
		// create the data object
		$this->load->helper('form');
		$this->load->library('form_validation');
		// load form helper and validation library
		$categories = $this->category_model->get_category($id);
        $data['categories'] = $categories;

       $this->form_validation->set_rules('category_name', 'Name', 'trim|required');
		$this->form_validation->set_rules('category_image', 'Image', 'trim|required');
		
		if ($this->form_validation->run() === false) {
			$this->load->view('header');
			$this->load->view('category/edit', $data);
			$this->load->view('footer');
		} else {
			// set variables from the form
			$name = $this->input->post('category_name');
			$image = $this->input->post('category_image');
			$id = $this->input->post('category_id');
			if ($this->category_model->edit_category($id,$name,$image)) {
                $this->session->set_flashdata('flashSuccess', 'Category Sucessfully Updated.');
				redirect('/categories');
			} else {
				$data->error = 'There was a problem creating your new account. Please try again.';
				$this->load->view('header');
				$this->load->view('category/edit', $data);
				$this->load->view('footer');
			}
		}


	}

	 public function delete($id) {
	  
        $this->category_model->delete_category($id);
        $this->session->set_flashdata('flashSuccess', 'Category Sucessfully Deleted.');
		redirect('/categories');
		
	}
	
	
	
}
