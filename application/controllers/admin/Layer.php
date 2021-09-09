<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Layer extends CI_Controller {
	public function __construct(){
    parent::__construct();
    $this->load->model("M_Auth");
    $this->load->model("M_Layer");
  }

  public function checkFileGeojson($name, $mode){
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
			$typeFileGeojson = array("application/octet-stream", "text/plain");
      $sizeAllowed = 1024000000; // 1000MB
      $ext=preg_replace("/.*\.([^.]+)$/","\\1", $_FILES[$name]['name']);

      if ($_FILES[$name]['error'] == 4) {
        if ($mode != "edit") {
          $this->form_validation->set_message('checkFileGeojson', $phpFileUploadErrors[$_FILES[$name]['error']]);
          return FALSE;
        } else {
          return TRUE;
        }
      } elseif ($_FILES[$name]['error'] == 0) {
        if ($_FILES[$name]['type'] != "application/octet-stream" && $ext != "geojson") {
          $this->form_validation->set_message('checkFileGeojson', 'The filetype you are attempting to upload is not allowed.');
          return FALSE;
        } elseif($_FILES[$name]['size'] > $sizeAllowed){
          $this->form_validation->set_message('checkFileGeojson', 'The file you are attempting to upload is larger than the permitted size.');
          return FALSE;
        } else {
          return TRUE;
        }
      } else {
        $this->form_validation->set_message('checkFileGeojson', $phpFileUploadErrors[$_FILES[$name]['error']]);
        return FALSE;
      }  
		} else {
      $this->form_validation->set_message('checkFileGeojson', 'File not found!');
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
        "sidebar" => "layer",
      );
      $this->load->view("admin/layer/table", $data);
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
        "sidebar" => "layer",
      );
      $this->form_validation->set_rules($this->M_Layer->rules());
      if ($this->form_validation->run() === TRUE) {
        $save =  $this->M_Layer->save();
        $this->session->set_flashdata("notif", $save);
        redirect(site_url("admin/layer/add"),"refresh");
      } else {
        if ($this->session->flashdata("notif")) {
          $data["notif"] = $this->session->flashdata("notif");
        } else {
          $data["notif"] = array("type" => "error", "message" => str_replace("\n", "", validation_errors('<li>','</li>')));
        }
        $this->load->view("admin/layer/add", $data);
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
        "sidebar" => "layer",
      );
      $secret_key = $this->M_Layer->secret_key ;
      $secret_iv = $this->M_Layer->secret_iv ;
      $layer_id = $this->M_Encrypt->encrypt_decrypt("decrypt", $encrypt_id, $secret_key, $secret_iv);
      $data["layer"] = $this->M_Layer->getById($layer_id);
      $data["encrypt_id"] = $encrypt_id;

      if ($layer_id == false || $data["layer"] == null) {
        $notif = array(
          "type" => "empty",
          "message" => "Data not found!",
        );
        $this->session->set_flashdata("notif", $notif);
      }

      $this->form_validation->set_rules($this->M_Layer->rulesEdit($this->input->post()));
      if ($this->form_validation->run() === TRUE) {
        $update =  $this->M_Layer->update($layer_id);
        $this->session->set_flashdata("notif", $update);
        redirect(site_url("admin/layer/edit/$encrypt_id"),"refresh");
      } else {
        if ($this->session->flashdata("notif")) {
          $data["notif"] = $this->session->flashdata("notif");
        } else {
          $data["notif"] = array("type" => "error", "message" => str_replace("\n", "", validation_errors('<li>','</li>')));
        }
        $this->load->view("admin/layer/edit", $data);
      }
    }
  }
}
?>