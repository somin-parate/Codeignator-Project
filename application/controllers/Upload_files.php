<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Upload_Files extends CI_Controller
{
    function  __construct() {
        parent::__construct();
        $this->load->model('file');
        $this->load->library(array('session'));
		$this->load->helper(array('url'));
		$this->load->library("pagination");
		if (!$this->session->userdata('logged_in')) {
		         redirect('/login');
		 } 

    }
    
    function index($cat_id = ''){
        $data = array();
        if($this->input->post('fileSubmit') && !empty($_FILES['userFiles']['name'])){
            $filesCount = count($_FILES['userFiles']['name']);
            for($i = 0; $i < $filesCount; $i++){
                $_FILES['userFile']['name'] = $_FILES['userFiles']['name'][$i];
                $_FILES['userFile']['type'] = $_FILES['userFiles']['type'][$i];
                $_FILES['userFile']['tmp_name'] = $_FILES['userFiles']['tmp_name'][$i];
                $_FILES['userFile']['error'] = $_FILES['userFiles']['error'][$i];
                $_FILES['userFile']['size'] = $_FILES['userFiles']['size'][$i];

                $uploadPath = 'assets/message/';
                $config['upload_path'] = $uploadPath;
                $config['allowed_types'] = 'gif|jpg|png';
                
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if($this->upload->do_upload('userFile')){
                    $fileData = $this->upload->data();
                    $uploadData[$i]['file_name'] = $fileData['file_name'];
                    $uploadData[$i]['category_id'] =  $this->input->post('category_id');
                    $uploadData[$i]['created'] = date("Y-m-d H:i:s");
                    $uploadData[$i]['modified'] = date("Y-m-d H:i:s");
                }
            }
            
            if(!empty($uploadData)){
                //Insert file information into the database
                $insert = $this->file->insert($uploadData);
                $statusMsg = $insert?'Files uploaded successfully.':'Some problem occurred, please try again.';
                $this->session->set_flashdata('statusMsg',$statusMsg);
            }
        }
        //Get files data from database
      //  $data['files'] = $this->file->getRows($cat_id);
        $data['cat_id']=$cat_id;
   
        $config = array();
        $config["base_url"] = base_url() . "upload_files/".$cat_id;
        $config["total_rows"] = $this->file->record_count($cat_id);
        $config["per_page"] = 3;
        $config["uri_segment"] = 3;
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
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        
        $data["files"] = $this->file->getRows($cat_id,$config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();

       


        //Pass the files data to view
         $this->load->view('header');
	     $this->load->view('upload_files/index', $data);
		 $this->load->view('footer');

        
    }

}