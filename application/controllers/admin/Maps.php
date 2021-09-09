<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Maps extends CI_Controller {
	public function __construct(){
    parent::__construct();
    $this->load->model("M_Auth");
    $this->load->model("M_Layer");
  }
  
  public function index(){
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
        "sidebar" => "maps",
      );
      $data["layer"] = $this->M_Layer->getAll();
      $this->load->view("admin/maps/maps", $data);
    }
  }
}
?>