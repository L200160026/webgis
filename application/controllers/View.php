<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class View extends CI_Controller {
  public function __construct(){
    parent::__construct();
    $this->load->model("M_Jenjang");
    $this->load->model("M_School");
    $this->load->model("M_Encrypt");
    $this->load->model("M_Gallery");
  }
    
	public function index(){
    $data["menu"] = "home";
    $data["jenjang_data"] = $this->M_Jenjang->getAll();
		$this->load->view("user/index", $data);
  }
  
  public function profil($encrypt_id){
    $data["menu"] = "profil";
    $sekolah_id = $this->M_Encrypt->encrypt_decrypt("decrypt", $encrypt_id, $this->M_School->secret_key, $this->M_School->secret_iv);
    $data["school"] = $this->M_School->getById($sekolah_id);
    $data["images"] = $this->M_Gallery->getWhere(array("foto_sekolah"=>$sekolah_id));

    if ($sekolah_id == false || $data["school"] == null) {
      show_404();
    } else {
      $this->load->view("user/profil", $data);
    }
  }

  public function school(){
    $data["menu"] = "school";
		$this->load->view("user/school", $data);
  }

  public function about(){
    // $data["file"] = file_get_contents(base_url()."uploads/file/about.pdf");
    // force_download("DOKUMENTASI", $data);
    $path = base_url()."uploads/file/about.pdf";
    echo "<embed src='".$path."' type='application/pdf' width='100%' height='640px' >";
  }


}
