<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * User_model class.
 * 
 * @extends CI_Model
 */
class Setting_model extends CI_Model {

	/**
	 * __construct function.
	 * 
	 * @access public
	 * @return void
	 */
	public function __construct() {
		
		parent::__construct();
		$this->load->database();
		
	}
	
	/**
	 * create_user function.
	 * 
	 * @access public
	 * @param mixed $username
	 * @param mixed $email
	 * @param mixed $password
	 * @return bool true on success, false on failure
	 */
	public function create_setting($facebook,$setting_id) {
		$data = array(
			'facebook'   => $facebook,
		);
		$this->db->where('setting_id',$setting_id);
        return $this->db->update('settings',$data);

	}
	
	public function get_setting() {

		
		$query = $this->db->get('settings');

		 foreach ($query->result() as $row){
		        $results[] = array(
		                'setting_id' => $row->setting_id,
		                'facebook' => $row->facebook
		        );

		    }


         return $results;

	}

	
}
