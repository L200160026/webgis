<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Layer extends CI_Model {
  private $table = "layer";
  public $secret_key = "Layer" ;
  public $secret_iv = "LayerEncrypt";

  public function __construct(){
    parent::__construct();
    $this->load->model("M_Main");
    $this->load->model("M_Encrypt");
  }

  public function rules(){
    return array(
      array(  'field' => '_name_',
              'label' => 'Name',
              'rules' => 'required|trim|alpha_numeric_spaces|min_length[3]|max_length[20]'),
      
      array(  'field' => '_color_',
              'label' => 'Color',
              'rules' => 'required|trim|min_length[6]|max_length[8]'),

      array(  'field' => '_checkfile_',
              'label' => 'Geojson',
              'rules' => 'callback_checkFileGeojson[add]'),
    );
  }

  public function rulesEdit($field= array()){
    $rules = array();

    if (isset($field["_name_"])) {
      $rules[] = array( 'field' => '_name_',
                        'label' => 'Name',
                        'rules' => 'required|trim|alpha_numeric_spaces|min_length[3]|max_length[20]');
    }

    if (isset($field["_color_"])) {
      $rules[] = array( 'field' => '_color_',
                        'label' => 'Color',
                        'rules' => 'required|trim|min_length[6]|max_length[8]');
    }

    if (isset($field["_checkfile_"])) {
      $rules[] = array( 'field' => '_checkfile_',
                        'label' => 'Geojson',
                        'rules' => 'callback_checkFileGeojson[edit]');
    }
    return $rules;

  }

  public function getAll() {
    $query = $this->db->get($this->table);
    if ($query->num_rows() > 0) {
      return $query->result_array();
    } else {
      return null;
    }
  }

  public function getById($id){
    return $this->db->get_where($this->table, array("layer_id" => $id) )->row_array();
  }

  public function save(){
    $post = $this->input->post();
    if (!empty($post)) {
      if (!empty($post["_name_"]) && !empty($post["_color_"]) && !empty($post["_checkfile_"])) {
        $uploadFile = $this->M_Main->uploadFile("./uploads/layer/", "*");
        if ($uploadFile["type"] == "success") {
          $data = array(
            "layer_id" => NULL,
            "layer_nama" => $post["_name_"],
            "layer_warna" => $post["_color_"],
            "layer_file" => $uploadFile["data"]["file_name"]
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
          $response = $uploadFile;
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
      if (!empty($post["_name_"]) && !empty($post["_color_"]) && !empty($post["_checkfile_"])) {
        $layer = $this->getById($id);
        $oldpath = "./uploads/layer/".$layer["layer_file"];
        $uploadFile = $this->M_Main->uploadFile("./uploads/layer/", "*", $oldpath);

        $data = array(
          "layer_nama" => $post["_name_"],
          "layer_warna" => $post["_color_"]
        );

        if ($uploadFile["type"] == "success") {
          $data["layer_file"] = $uploadFile["data"]["file_name"];
        }

        $data = $this->security->xss_clean($data);
        $this->db->where("layer_id", $id);
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