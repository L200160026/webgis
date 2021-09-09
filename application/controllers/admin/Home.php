<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct(){
    parent::__construct();
    $this->load->model("M_Auth");
    $this->load->model("M_School");
	}
 
	public function index(){
    $sess = $this->M_Auth->session(array("root", "admin"));
    if ($sess === FALSE) {
      $data = array();
      $this->form_validation->set_rules($this->M_Auth->rules());
      if ($this->form_validation->run() === TRUE) {
        $login = $this->M_Auth->login();
        if ($login["type"] == "success") {
          redirect(site_url("admin/home/dashboard"),"refresh");
        } else {
          $this->session->set_flashdata("notif", $login);
          redirect(site_url("admin/home/index"),"refresh");
        }
      } else {
        if ($this->session->flashdata('notif')) {
          $data['notif'] = $this->session->flashdata('notif');
        } else {
          $data["notif"] = array("type" => "error", "message" => str_replace("\n", "", validation_errors('<li>','</li>')));
        }
        $this->load->view("admin/home/login", $data); 
      }	
    } else {
      redirect(site_url("admin/home/dashboard"),"refresh");
    }
  }
  
  public function dashboard(){
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
      $data["totalSekolah"] = $this->M_School->getTotal();
      $data["totalNegeri"] = $this->M_School->getTotalNegeri();
      $data["totalSwasta"] = $this->M_School->getTotalSwasta();
      $this->load->view("admin/home/dashboard", $data);
    }
	}

	public function logout(){
    $this->M_Auth->logout();
  }

}
?>