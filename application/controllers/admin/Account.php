<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {
	public function __construct(){
    parent::__construct();
    $this->load->model("M_Account");
    $this->load->model("M_Auth");
    $this->load->model("M_Jenjang");
    $this->load->model('M_Encrypt');
	}

	public function table(){
    $sess = $this->M_Auth->session(array("root"));
    if ($sess === FALSE) {
      redirect(site_url("admin/home"),"refresh");
    } else {
      $data = array(
        "name" => $sess[1],
        "username" => $sess[2],
        "status" => $sess[3],
        "jenjang" => $sess[4],
        "image" => $sess[5],
        "sidebar" => "account",
      );
      $data["accounts"] = $this->M_Account->getAll();
      $this->load->view("admin/account/table", $data);
    }
  }

  public function checkFileImg($name){
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

      if ($_FILES[$name]['error'] == 4) {
        return TRUE;
      } elseif ($_FILES[$name]['error'] == 0) {
        if (in_array($_FILES[$name]['type'], $typeFileImg) == FALSE) {
          $this->form_validation->set_message('checkFileImg', 'The filetype you are attempting to upload is not allowed.');
          return FALSE;
        } elseif($_FILES[$name]['size'] > $sizeAllowed){
          $this->form_validation->set_message('checkFileImg', 'The file you are attempting to upload is larger than the permitted size.');
          return FALSE;
        } else {
          return TRUE;
        }
      } else {
        $this->form_validation->set_message('checkFileImg', $phpFileUploadErrors[$_FILES[$name]['error']]);
        return FALSE;
      }  
		} else {
      return TRUE;
    }
  }
    
  public function add(){
    $sess = $this->M_Auth->session(array("root"));
    if ($sess === FALSE) {
      redirect(site_url("admin/home"),"refresh");
    } else {
      if ($sess[3] != "root") {
        redirect(site_url("admin/home/dashboard"),"refresh");
      } else{
        $data = array(
          "name" => $sess[1],
          "username" => $sess[2],
          "status" => $sess[3],
          "jenjang" => $sess[4],
          "image" => $sess[5],
          "sidebar" => "account",
        );
        $data["jenjang_data"] = $this->M_Jenjang->getAll();
        $this->form_validation->set_rules($this->M_Account->rules());
        if ($this->form_validation->run() === TRUE) {
          $save =  $this->M_Account->save();
          $this->session->set_flashdata("notif", $save);
          redirect(site_url("admin/account/add"),"refresh");
        } else {
          if ($this->session->flashdata("notif")) {
            $data["notif"] = $this->session->flashdata("notif");
          } else {
            $data["notif"] = array("type" => "error", "message" => str_replace("\n", "", validation_errors('<li>','</li>')));
          }
          $this->load->view("admin/account/add", $data);
        }
      }
    }
  }

  public function profile(){
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
        "sidebar" => NULL,
      );
      $secret_key = $this->M_Account->secret_key ;
      $secret_iv = $this->M_Account->secret_iv ;
      $data["profile"] = $this->M_Account->getById($sess[0]);
      $data["encrypt_id"] = $this->M_Encrypt->encrypt_decrypt("encrypt", $data["profile"]["akun_id"], $secret_key, $secret_iv);
      $this->load->view("admin/account/profile", $data);
    }
  }

  public function edit($encrypt_id){
    $sess = $this->M_Auth->session(array("root", "admin"));
    if ($sess === FALSE) {
      redirect(site_url("admin/home"),"refresh");
    } else {
      $secret_key = $this->M_Account->secret_key ;
      $secret_iv = $this->M_Account->secret_iv ;
      $akun_id = $this->M_Encrypt->encrypt_decrypt("decrypt", $encrypt_id, $secret_key, $secret_iv);
      if ($sess[3] == "admin" && $akun_id != $sess[0]) {
        redirect(site_url("admin/home"),"refresh");
      } else {
        $data = array(
          "name" => $sess[1],
          "username" => $sess[2],
          "status" => $sess[3],
          "jenjang" => $sess[4],
          "image" => $sess[5],
          "sidebar" => NULL,
        );
        $data["account"] = $this->M_Account->getById($akun_id);
        $data["encrypt_id"] = $encrypt_id;
        $data["jenjang_data"] = $this->M_Jenjang->getAll();
  
        if ($akun_id == false || $data["account"] == null) {
          $notif = array(
            "type" => "empty",
            "message" => "Data not found!",
          );
          $this->session->set_flashdata("notif", $notif);
        }
  
        $this->form_validation->set_rules($this->M_Account->rulesEdit($this->input->post()));
        if ($this->form_validation->run() === TRUE) {
          $update = $this->M_Account->update($akun_id);
          $this->session->set_flashdata("notif", $update);
          if ($sess[0] == $akun_id) {
            $this->M_Auth->refreshSession($akun_id);
          }
          redirect(site_url("admin/account/edit/$encrypt_id"),"refresh");
        } else {
          if ($this->session->flashdata("notif")) {
            $data["notif"] = $this->session->flashdata("notif");
          } else {
            $data["notif"] = array("type" => "error", "message" => str_replace("\n", "", validation_errors('<li>','</li>')));
          }
          $this->load->view("admin/account/edit", $data);
        }
      }
    }
  }

}
?>