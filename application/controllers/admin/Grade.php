<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Grade extends CI_Controller {
	public function __construct(){
    parent::__construct();
    $this->load->model("M_Auth");
    $this->load->model("M_Grade");
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
        "sidebar" => "grade",
      );
      $this->load->view("admin/grade/table", $data);
    }
  }

  public function add(){
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
        "sidebar" => "grade",
      );
      $this->form_validation->set_rules($this->M_Grade->rules());
      if ($this->form_validation->run() === TRUE) {
        $save =  $this->M_Grade->save();
        $this->session->set_flashdata("notif", $save);
        redirect(site_url("admin/grade/add"),"refresh");
      } else {
        if ($this->session->flashdata("notif")) {
          $data["notif"] = $this->session->flashdata("notif");
        } else {
          $data["notif"] = array("type" => "error", "message" => str_replace("\n", "", validation_errors('<li>','</li>')));
        }
        $this->load->view("admin/grade/add", $data);
      }
    }
  }

  public function edit($encrypt_id){
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
        "sidebar" => "grade",
      );
      $secret_key = $this->M_Grade->secret_key ;
      $secret_iv = $this->M_Grade->secret_iv ;
      $jenjang_id = $this->M_Encrypt->encrypt_decrypt("decrypt", $encrypt_id, $secret_key, $secret_iv);
      $data["grade"] = $this->M_Grade->getById($jenjang_id);
      $data["encrypt_id"] = $encrypt_id;

      if ($jenjang_id == false || $data["grade"] == null) {
        $notif = array(
          "type" => "empty",
          "message" => "Data not found!",
        );
        $this->session->set_flashdata("notif", $notif);
      }

      $this->form_validation->set_rules($this->M_Grade->rules());
      if ($this->form_validation->run() === TRUE) {
        $update =  $this->M_Grade->update($jenjang_id);
        $this->session->set_flashdata("notif", $update);
        redirect(site_url("admin/grade/edit/$encrypt_id"),"refresh");
      } else {
        if ($this->session->flashdata("notif")) {
          $data["notif"] = $this->session->flashdata("notif");
        } else {
          $data["notif"] = array("type" => "error", "message" => str_replace("\n", "", validation_errors('<li>','</li>')));
        }
        $this->load->view("admin/grade/edit", $data);
      }
    }
  }
}
?>