<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * User_model class.
 * 
 * @extends CI_Model
 */
class Category_model extends CI_Model {

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

	 public function record_count() {
        return $this->db->count_all("categories");
    }

     public function view($limit, $start) {
        $this->db->limit($limit, $start);
        $query = $this->db->get("categories");

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
     }

      public function add_category($name, $image) {
        $data = array(
			'category_name'   => $name,
			'category_image'      => $image
		);
		
		return $this->db->insert('categories', $data);
     }

     public function edit_category($id,$name, $image) {
        $data = array(
			'category_name'   => $name,
			'category_image'      => $image
		);
		$this->db->where('category_id',$id);
        return $this->db->update('categories', $data);

     }
     public function delete_category($id){
		  $this->db-> where('category_id', $id);
		  $this->db->delete('categories');
    }

      public function get_category($id){
        $query = $this->db->get_where('categories', array('category_id' => $id));
        return $query->row_array();


   }
   

   



	
	
}
