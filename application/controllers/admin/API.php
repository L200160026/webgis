<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class API extends CI_Controller {
	public function __construct(){
    parent::__construct();
    $this->load->model("M_Auth");
    $this->load->model("M_Account");
    $this->load->model("M_Grade");
    $this->load->model('M_Encrypt');
    $this->load->model('M_Layer');
    $this->load->model('M_School');
    $this->load->model('M_Gallery');

  }

  public function account($mode=null){
    $sess = $this->M_Auth->session(array("root"));
    if ($sess === FALSE) {
      redirect(site_url("admin/home"),"refresh");
    } else {
      $secret_key = $this->M_Account->secret_key ;
      $secret_iv = $this->M_Account->secret_iv ;
      if (strtolower($mode) == "data") {
        $this->db->select("akun_id, akun_name, akun_username, akun_isactive, akun_createat, akun_modifyat, akun_status, akun_image, akun_jenjang");
        $query = $this->db->get("akun");
        if ($query->num_rows() > 0) {
          $data = $query->result_array();
          foreach ($data as $key => $value) {
            $data[$key]["akun_id"] = $this->M_Encrypt->encrypt_decrypt("encrypt", $value["akun_id"], $secret_key, $secret_iv);
          }
          echo json_encode($data);
          // var_dump($data);
        } else {
          echo json_encode(false);
        }
      } 
      
      elseif (strtolower($mode) == "update") {
        $post = $this->input->post();
        if ( !empty($post["id"]) && !empty($post["isactive"]) ) {
          $isactive = "true";
          if ($post["isactive"] == "true") {
            $isactive = "false";
          }
          $id = $this->M_Encrypt->encrypt_decrypt("decrypt", $post["id"], $secret_key, $secret_iv);
          $akun = $this->db->get_where("akun", array("akun_id" => $id) )->row_array();
          if ($akun["akun_status"] != "root") {
            $this->db->where("akun_id", $id);
            echo json_encode($this->db->update("akun", array("akun_isactive"=>$isactive)) );
          } else {
            echo json_encode(false);
          }
        } else {
          echo json_encode(false);
        }
      }

      elseif(strtolower($mode) == "delete"){
        $post = $this->input->post();
        if (!empty($post["id"])) {
          $id = $this->M_Encrypt->encrypt_decrypt("decrypt", $post["id"], $secret_key, $secret_iv);
          $account = $this->M_Account->getById($id);
          $oldpath = "./uploads/account/".$account["akun_image"];
          if (file_exists($oldpath)) {
            unlink($oldpath);
          }
          $this->db->where("akun_id", $id);
          echo json_encode($this->db->delete("akun"));
        } else {
          echo json_encode(false);
        }
      }
    }
  }

  public function grade($mode=null){
    $sess = $this->M_Auth->session(array("root"));
    if ($sess === FALSE) {
      redirect(site_url("admin/home"),"refresh");
    } else {
      $secret_key = $this->M_Grade->secret_key ;
      $secret_iv = $this->M_Grade->secret_iv ;
      if (strtolower($mode) == "data") {
        $query = $this->db->get("jenjang");
        if ($query->num_rows() > 0) {
          $data = $query->result_array();
          foreach ($data as $key => $value) {
            $data[$key]["jenjang_id"] = $this->M_Encrypt->encrypt_decrypt("encrypt", $value["jenjang_id"], $secret_key, $secret_iv);
          }
          echo json_encode($data);
        } else {
          echo json_encode(false);
        }
      }
      elseif(strtolower($mode) == "delete"){
        $post = $this->input->post();
        if (!empty($post["id"])) {
          $id = $this->M_Encrypt->encrypt_decrypt("decrypt", $post["id"], $secret_key, $secret_iv);
          $this->db->where("jenjang_id", $id);
          if ($this->db->delete("jenjang")) {
            $this->db->where("akun_jenjang", $id);
            $this->db->where("akun_status !=", "root");
            echo json_encode($this->db->delete("akun"));
          } else {
            echo json_encode(false);
          }
        } else {
          echo json_encode(false);
        }
      }
    }

  }


  public function layer($mode=null){
    $sess = $this->M_Auth->session(array("root", "admin"));
    if ($sess === FALSE) {
      redirect(site_url("admin/home"),"refresh");
    } else {
      $secret_key = $this->M_Layer->secret_key ;
      $secret_iv = $this->M_Layer->secret_iv ;
      if (strtolower($mode) == "data") {
        $query = $this->db->get("layer");
        if ($query->num_rows() > 0) {
          $data = $query->result_array();
          foreach ($data as $key => $value) {
            $data[$key]["layer_id"] = $this->M_Encrypt->encrypt_decrypt("encrypt", $value["layer_id"], $secret_key, $secret_iv);
          }
          echo json_encode($data);
        } else {
          echo json_encode(false);
        }
      }
      elseif(strtolower($mode) == "delete"){
        $post = $this->input->post();
        if (!empty($post["id"])) {
          $id = $this->M_Encrypt->encrypt_decrypt("decrypt", $post["id"], $secret_key, $secret_iv);
          $layer = $this->M_Layer->getById($id);
          $oldpath = "./uploads/layer/".$layer["layer_file"];
          if (file_exists($oldpath)) {
            unlink($oldpath);
          }
          $this->db->where("layer_id", $id);
          echo json_encode($this->db->delete("layer"));
        } else {
          echo json_encode(false);
        }
      }
    }
  }

  public function school($mode=null){
    $sess = $this->M_Auth->session(array("root", "admin"));
    if ($sess === FALSE) {
      redirect(site_url("admin/home"),"refresh");
    } else {
      $secret_key = $this->M_School->secret_key ;
      $secret_iv = $this->M_School->secret_iv ;
      if (strtolower($mode) == "data") {
        $this->db->select(" sekolah_id, sekolah_jenjang, sekolah_npsn, sekolah_nama, sekolah_akreditasi, sekolah_kepala, sekolah_operator, sekolah_kurikulum, sekolah_penyelenggaraan, sekolah_ruangkelas, sekolah_laboratorium, sekolah_perpustakaan, sekolah_sanitasisiswa, sekolah_internet, sekolah_listrik, sekolah_dayalistrik, sekolah_luastanah, sekolah_guru, sekolah_siswalk, sekolah_siswapr, sekolah_rombonganbelajar, sekolah_status, sekolah_alamat, sekolah_rtrw, sekolah_dusun, sekolah_kelurahan, sekolah_kecamatan, sekolah_kabupaten, sekolah_provinsi, sekolah_kodepos, sekolah_email, sekolah_website, ST_asGeoJson(sekolah_lokasi) as sekolah_lokasi");
        if ($sess[3] != "root") {
          $this->db->where("sekolah_jenjang", $sess[4]);
        }
        $query = $this->db->get("sekolah");
        if ($query->num_rows() > 0) {
          $data = $query->result_array();
          foreach ($data as $key => $value) {
            // unset($value["sekolah_lokasi"]);
            $data[$key]["sekolah_lokasi"] = json_decode($value["sekolah_lokasi"], true);
            $data[$key]["sekolah_id"] = $this->M_Encrypt->encrypt_decrypt("encrypt", $value["sekolah_id"], $secret_key, $secret_iv);
          }
          echo json_encode($data);
        } else {
          echo json_encode(false);
        }
      }

      elseif(strtolower($mode) == "delete"){
        $post = $this->input->post();
        if (!empty($post["id"])) {
          $id = $this->M_Encrypt->encrypt_decrypt("decrypt", $post["id"], $secret_key, $secret_iv);
          $this->db->where("sekolah_id", $id);
          echo json_encode($this->db->delete("sekolah"));
        } else {
          echo json_encode(false);
        }
      }

      elseif(strtolower($mode) == "geojson"){
        echo $this->M_School->getGeoJson();
      }
    }
  }

  public function gallery($mode=null, $encrypt_id=NULL){
    $sess = $this->M_Auth->session(array("root", "admin"));
    if ($sess === FALSE) {
      redirect(site_url("admin/home"),"refresh");
    } else {
      $secret_key = $this->M_Gallery->secret_key ;
      $secret_iv = $this->M_Gallery->secret_iv ;
      if (strtolower($mode) == "data") {
        $school_id = $this->M_Encrypt->encrypt_decrypt("decrypt", $encrypt_id, $this->M_School->secret_key, $this->M_School->secret_iv);
        if ($encrypt_id != NULL) {
          $this->db->where("foto_sekolah", $school_id);
        }
        $query = $this->db->get("foto");
        if ($query->num_rows() > 0) {
          $data = $query->result_array();
          foreach ($data as $key => $value) {
            $data[$key]["foto_id"] = $this->M_Encrypt->encrypt_decrypt("encrypt", $value["foto_id"], $secret_key, $secret_iv);
          }
          echo json_encode($data);
        } else {
          echo json_encode(false);
        }
      }

      elseif(strtolower($mode) == "delete"){
        $post = $this->input->post();
        if (!empty($post["id"])) {
          $id = $this->M_Encrypt->encrypt_decrypt("decrypt", $post["id"], $secret_key, $secret_iv);
          $gallery = $this->M_Gallery->getById($id);
          $oldpath = "./uploads/school/".$gallery["foto_folder"]."/".$gallery["foto_nama"];
          if (file_exists($oldpath)) {
            unlink($oldpath);
          }
          $this->db->where("foto_id", $id);
          echo json_encode($this->db->delete("foto"));
        } else {
          echo json_encode(false);
        }
      }
    }

  }
  
}
?>