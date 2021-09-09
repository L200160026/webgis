<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Main extends CI_Model {
  public function __construct(){
    parent::__construct();
  }

  public function query($query) {
    $query = $this->db->query($query);
    if ($query->num_rows() > 0) {
      return $query->result_array();
    } else {
      return null;
    }
  }

  public function getRows($table, $where=null, $fields=null, $orderby=null) {
    if($fields != null){
      $this->db->select($fields);
    }
    if($where != null){
      $this->db->where($where);
    }
    if ($orderby != null) {
      $this->db->order_by($orderby);
    }

    $query = $this->db->get($table);
    if ($query->num_rows() > 0) {
      return $query->result_array();
    } else {
      return null;
    }
  }

  public function uploadFile($path, $types, $oldpath=null, $name="_file_"){
    if( file_exists($_FILES[$name]['tmp_name']) ){
      $config['upload_path']          = $path; // './upload/'
      $config['allowed_types']        = $types; // 'jpg|png|jpeg|pdf|docx'
      $config['max_size']             = 204800; // 200MB
      $config['max_width']            = 0;
      $config['max_height']           = 0;
      $config['overwrite']            = TRUE;
      $config['encrypt_name']         = TRUE;
      $config['remove_spaces']		    = TRUE;
  
      $this->load->library("upload", $config);
      if ( ! $this->upload->do_upload($name)){
        $response = array(
          "type" => "error",
          "message" => $this->upload->display_errors()
      );
      }else{
        if ($oldpath != null) {
          if (file_exists($oldpath)) {
            unlink($oldpath);
          }
        }

        $response = array(
          "type" => "success",
          "message" => "Image uploaded successfully.",
          "data" => $this->upload->data()
        );
      }

    } else {
      $response = array(
        "type" => "empty",
        "message" => "Choose file to upload."
      );
    }

    return $response;
  }

  public function uploadFiles($path, $types, $name="_files_"){
    if (!empty($_FILES[$name]['name'])) {
      $response = array();
      $countfiles = count($_FILES[$name]['name']);

      for($i=0; $i<$countfiles; $i++){
        if( file_exists($_FILES[$name]['tmp_name'][$i]) ){
          $_FILES['file']['name'] = $_FILES[$name]['name'][$i];
          $_FILES['file']['type'] = $_FILES[$name]['type'][$i];
          $_FILES['file']['tmp_name'] = $_FILES[$name]['tmp_name'][$i];
          $_FILES['file']['error'] = $_FILES[$name]['error'][$i];
          $_FILES['file']['size'] = $_FILES[$name]['size'][$i];

          $config['upload_path']          = $path; // './upload/'
          $config['allowed_types']        = $types; // 'jpg|png|jpeg|pdf|docx'
          $config['max_size']             = 100000;
          $config['max_width']            = 1920;
          $config['max_height']           = 1080;
          $config['overwrite']            = TRUE;
          $config['encrypt_name']         = TRUE;
          $config['remove_spaces']		= TRUE;
          
          $this->load->library("upload", $config);
          if ( ! $this->upload->do_upload("file")){
            $response[] = array(
              "type" => "error",
              "message" => $this->upload->display_errors()
            );
          } else {
            $response[] = array(
              "type" => "success",
              "message" => "Image uploaded successfully.",
              "data" => $this->upload->data()
            );
          }
        } else {
          $response[] = array(
            "type" => "error",
            "message" => "Choose image file to upload."
          );
        }

      }
    } else {
      $response[] = array(
        "type" => "error",
        "message" => "Choose image file to upload."
      );
    }

    return $response;
  }
}

?>