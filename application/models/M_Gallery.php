<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Gallery extends CI_Model {
  private $table = "foto";
  public $secret_key = "Gallery" ;
  public $secret_iv = "GalleryEncrypt";

  public function __construct(){
    parent::__construct();
    $this->load->model('M_Encrypt');
  }

  public function rules(){
    return array(
      array(  'field' => '_files_[]',
              'label' => 'Foto',
              'rules' => 'callback_checkFileImg'),
    ); 
  }

  public function getById($id){
    return $this->db->get_where($this->table, array("foto_id" => $id) )->row_array();
  }

  public function getWhere($where){
    return $this->db->get_where($this->table, $where)->result_array();
  }

  public function uploadImages($path, $types, $name="_files_"){
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


          $config['upload_path']      = $path; // './upload/'
          $config['allowed_types']    = $types; // 'jpg|png|jpeg|pdf|docx'
          $config['max_size']         = 100000;
          $config['max_width']        = 0;
          $config['max_height']       = 0;
          $config['overwrite']        = TRUE;
          $config['encrypt_name']     = TRUE;
          $config['remove_spaces']		= TRUE;
          
          if(!is_dir($config['upload_path'])){
            mkdir($config['upload_path'], 0777, TRUE);
          }

          $this->load->library("upload", $config);
          if ( ! $this->upload->do_upload("file")){
            $response[] = array(
              "type" => "error",
              "message" => $this->upload->display_errors(),
              "file" => $_FILES['file']['name']
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
            "type" => "empty",
            "message" => "Choose image file to upload."
          );
        }

      }
    } else {
      $response[] = array(
        "type" => "empty",
        "message" => "Choose image file to upload."
      );
    }

    return $response;
  }

  public function save($sekolah_id , $npsn){
    $post = $this->input->post();
    if (!empty($post)) {
      $uploadImg = $this->uploadImages("./uploads/school/".$npsn."/" , "jpg|png|jpeg");

      $imagesName = array();
      $results = "" ;
      // Cek apakah semua foto terunggah dengan benar, catat nama file foto yang terunggah dengan benar
      // Jika ada salah satu file foto yang erro/ tidak terunggah dengan benar maka hentikan
      foreach ($uploadImg as $key => $value) {
        if ($value["type"] == "success") {
          $imagesName[] = $value["data"]["file_name"];
        } elseif ($value["type"] == "error") {
          $results = $value;
          break;
        }
      }

      if ($results != "" && $results["type"]=="error") {
        foreach ($imagesName as $key => $value) {
          $target = "./uploads/school/".$npsn."/".$value;
          if (file_exists($target)) {
              unlink($target);
          }
        }
        $response = array(
          "type" => "error",
          "message" => $result["message"],
        );
      } else {
        $insertImg = NULL;
        if (!empty($imagesName)) {
          foreach ($imagesName as $key => $value) {
            $dataImg = array(
              "foto_id" => NULL,
              "foto_sekolah" => $sekolah_id,
              "foto_folder" => $npsn,
              "foto_nama" => $value,
              "foto_tanggal" => date("Y-m-d"),
            );
            if($this->db->insert("foto", $dataImg)){
              $insertImg =  true;
            } else {
              $insertImg =  false;
            }
          }
        } else {
          $insertImg =  false;
        }

        if ($insertImg != NULL && $insertImg == true) {
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