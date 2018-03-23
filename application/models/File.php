<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class File extends CI_Model{

    // public function getRows($id = ''){
    //     $this->db->select('id,file_name,created,category_id,count');
    //     $this->db->from('files');
    //     if($id){
    //         $this->db->where('category_id',$id);
    //         $query = $this->db->get();
    //         $result = $query->result_array();
    //     }else{
    //         $this->db->order_by('created','desc');
    //         $query = $this->db->get();
    //         $result = $query->result_array();
    //     }
    //     return !empty($result)?$result:false;
    // }




  public function getRows($id='', $limit, $start) {
     $this->db->where('category_id',$id);
     $this->db->limit($limit, $start);
     $query = $this->db->get("files");
     if ($query->num_rows() > 0) {
         foreach ($query->result() as $row) {
             $data[] = $row;
         }
         return $data;
     }
     return false;
  }

   public function record_count($id = '') {
         $this->db->where('category_id',$id);
         $this->db->from("files");
       return $this->db->count_all_results();
    
    }

    public function insert($data = array()){
        $insert = $this->db->insert_batch('files',$data);
        return $insert?true:false;
    }
    
}