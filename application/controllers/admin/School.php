<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class School extends CI_Controller {
	public function __construct(){
    parent::__construct();
    $this->load->model("M_Auth");
    $this->load->model("M_School");
    $this->load->model("M_Jenjang");
    $this->load->model("M_Encrypt");
  }

  public function checkFileImg($value){
    if (!empty($_FILES)) {
			$phpFileUploadErrors = array(
				0 => 'There is no error, the file uploaded with success',
				1 => 'The uploaded file exceeds the upload_max_filesize directive in php.ini',
				2 => 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form',
				3 => 'The uploaded file was only partially uploaded',
				4 => 'No file was uploaded',
				6 => 'Missing a temporary folder',
				7 => 'Failed to write file to disk.',
				8 => 'A PHP extension stopped the file upload.',
			);
			$typeFileImg = array("image/jpeg","image/png","image/jpeg","image/x-icon");
      $sizeAllowed = 10240000; // 10MB

      if (!empty($_FILES["_files_[]"]['name'])) {
        $response = array();
        $countfiles = count($_FILES["_files_[]"]['name']);
  
        for($i=0; $i<$countfiles; $i++){
          if( file_exists($_FILES["_files_[]"]['tmp_name'][$i]) ){
            if ($_FILES["_files_[]"]['error'][$i] == 4) {
              $response = array(
                "status" => TRUE,
                "message" => "Success"
              );
            } elseif ($_FILES["_files_[]"]['error'][$i] == 0) {
              if (in_array($_FILES["_files_[]"]['type'][$i], $typeFileImg) == FALSE) {
                $response = array(
                  "status" => FALSE,
                  "message" => "The filetype you are attempting to upload is not allowed."
                );
                break;
              } elseif($_FILES["_files_[]"]['size'][$i] > $sizeAllowed){
                $response = array(
                  "status" => FALSE,
                  "message" => "The file you are attempting to upload is larger than the permitted size."
                );
                break;
              } else {
                $response = array(
                  "status" => TRUE,
                  "message" => "Success"
                );
              }
            } else {
              $response = array(
                "status" => FALSE,
                "message" => $phpFileUploadErrors[$_FILES["_files_[]"]['error'][$i]]
              );
              break;
            } 
          } else {
            $response = array(
              "status" => TRUE,
              "message" => "Success"
            );
          }
        }
      } else {
        $response = array(
          "status" => TRUE,
          "message" => "Success"
        );
      }

		} else {
      $response = array(
        "status" => TRUE,
        "message" => "Success"
      );
    }

    if ($response["status"] == FALSE) {
      $this->form_validation->set_message('checkFileImg', $response["message"]);
    }
    return $response["status"];
  }

  public function npsnavailable($value){
    $school = $this->db->get_where("sekolah", array("sekolah_npsn"=>$value));
    if ($school->num_rows() > 0) {
      return TRUE;
    } else {
      $this->form_validation->set_message('npsnavailable', 'The %s is not exists');
      return FALSE;
    }
  }

  public function table(){
    $sess = $this->M_Auth->session(array("root", "admin"));
    if ($sess === FALSE) {
      redirect(site_url("admin/home"),"refresh");
    } else {
      $data = array(
        "name" => $sess[1],
        "username" => $sess[2],
        "status" => $sess[3],
        "jenjang" => $sess[4],
        "image" => $sess[5],
        "sidebar" => "school",
      );
      $this->load->view("admin/school/table", $data);
    }
  }

  public function add(){
    $sess = $this->M_Auth->session(array("root", "admin"));
    if ($sess === FALSE) {
      redirect(site_url("admin/home"),"refresh");
    } else {
      $data = array(
        "name" => $sess[1],
        "username" => $sess[2],
        "status" => $sess[3],
        "jenjang" => $sess[4],
        "image" => $sess[5],
        "sidebar" => "school",
      );
      $data["jenjang_data"] = $this->M_Jenjang->getAll();
      $this->form_validation->set_rules($this->M_School->rules($this->input->post()));
      if ($this->form_validation->run() === TRUE) {
        $save =  $this->M_School->save();
        $this->session->set_flashdata("notif", $save);
        redirect(site_url("admin/school/add"),"refresh");
      } else {
        if ($this->session->flashdata("notif")) {
          $data["notif"] = $this->session->flashdata("notif");
        } else {
          $data["notif"] = array("type" => "error", "message" => str_replace("\n", "", validation_errors('<li>','</li>')));
        }
        $this->load->view("admin/school/add", $data);
      }
    }
  }

  public function edit($encrypt_id){
    $sess = $this->M_Auth->session(array("root", "admin"));
    if ($sess === FALSE) {
      redirect(site_url("admin/home"),"refresh");
    } else {
      $data = array(
        "name" => $sess[1],
        "username" => $sess[2],
        "status" => $sess[3],
        "jenjang" => $sess[4],
        "image" => $sess[5],
        "sidebar" => "school",
      );

      $secret_key = $this->M_School->secret_key ;
      $secret_iv = $this->M_School->secret_iv ;
      $sekolah_id = $this->M_Encrypt->encrypt_decrypt("decrypt", $encrypt_id, $secret_key, $secret_iv);
      $data["school"] = $this->M_School->getById($sekolah_id);
      $data["encrypt_id"] = $encrypt_id;
      $data["jenjang_data"] = $this->M_Jenjang->getAll();
      
      if ($sekolah_id == false || $data["school"] == null) {
        $notif = array(
          "type" => "empty",
          "message" => "Data not found!",
        );
        $this->session->set_flashdata("notif", $notif);
      } else {
        if ($sess[3] != "root" && $data["school"]["sekolah_jenjang"] != $sess[4]) {
          $notif = array(
            "type" => "empty",
            "message" => "Data not for you!",
          );
          $this->session->set_flashdata("notif", $notif);
        }
      }

      $this->form_validation->set_rules($this->M_School->rules($this->input->post()));
      if ($this->form_validation->run() === TRUE) {
        $update =  $this->M_School->update($sekolah_id);
        $this->session->set_flashdata("notif", $update);
        redirect(site_url("admin/school/edit/$encrypt_id"),"refresh");
      } else {
        if ($this->session->flashdata("notif")) {
          $data["notif"] = $this->session->flashdata("notif");
        } else {
          $data["notif"] = array("type" => "error", "message" => str_replace("\n", "", validation_errors('<li>','</li>')));
        }
        $this->load->view("admin/school/edit", $data);
      }
    }
  }

}
?>