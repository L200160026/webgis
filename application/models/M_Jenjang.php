<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Jenjang extends CI_Model {
  private $table = "jenjang";

  public function __construct(){
    parent::__construct();
  }

  public function getAll(){
    $get = $this->db->get($this->table);
    if ($get->num_rows() > 0) {
      return $get->result_array();
    } else {
      return null;
    }
  }

  public function getById($id){
    return $this->db->get_where($this->table, array("jenjang_id" => $id) )->row_array();
  }
}
?>