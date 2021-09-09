<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Grade extends CI_Model {
  private $table = "jenjang";
  public $secret_key = "Grade" ;
  public $secret_iv = "GradeEncrypt";

  public function __construct(){
    parent::__construct();
    $this->load->model('M_Encrypt');
  }

  public function rules(){
    return array(
      array(  'field' => '_name_',
              'label' => 'Name',
              'rules' => 'required|trim|alpha_numeric_spaces|min_length[3]|max_length[50]'),

      array(  'field' => '_abbreviation_',
              'label' => 'Abbreviation',
              'rules' => 'required|trim|alpha_numeric_spaces|min_length[2]|max_length[10]'),
    );
  }

  public function getById($id){
    return $this->db->get_where($this->table, array("jenjang_id" => $id) )->row_array();
  }

  public function save(){
    $post = $this->input->post();
    if (!empty($post)) {
      if (!empty($post["_name_"]) && !empty($post["_abbreviation_"])) {
        $data = array(
          "jenjang_id" => NULL,
          "jenjang_nama" => $post["_name_"],
          "jenjang_singkatan" => $post["_abbreviation_"]
        );
        $data = $this->security->xss_clean($data);
        if($this->db->insert($this->table, $data)){
          $response = array(
            "type" => "success",
            "message" => "Success insert data",
          );
        } else {
          $response = array(
            "type" => "error",
            "message" => "Failed insert data",
          );
        }
      } else {
        $response = array(
          "type" => "error",
          "message" => "Data not found!",
        );
      }
    } else {
      $response = array(
        "type" => "error",
        "message" => "Data not found!",
      );
    }

    return $response;
  }

  public function update($id){
    $post = $this->input->post();
    if (!empty($post)){
      if (!empty($post["_name_"]) && !empty($post["_abbreviation_"])) {
        $data = array(
          "jenjang_nama" => $post["_name_"],
          "jenjang_singkatan" => $post["_abbreviation_"]
        );
        $data = $this->security->xss_clean($data);
        $this->db->where("jenjang_id", $id);
        if($this->db->update($this->table, $data)){
          $response = array(
            "type" => "success",
            "message" => "Success update data",
          );
        } else {
          $response = array(
            "type" => "error",
            "message" => "Failed update data",
          );
        }
      } else {
        $response = array(
          "type" => "error",
          "message" => "Data not found!",
        );
      }
    } else {
      $response = array(
        "type" => "error",
        "message" => "Data not found!",
      );
    }
    return $response;
  }
}
?>