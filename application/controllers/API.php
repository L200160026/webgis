<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class API extends CI_Controller {
	public function __construct(){
    parent::__construct();
    $this->load->model("M_Auth");
    $this->load->model('M_Encrypt');
    $this->load->model('M_Layer');
    $this->load->model('M_School');

  }

  public function layer($mode=null){
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
    } else {
      echo json_encode(false);
    }
  }

  public function school($mode=null, $jenjang=null, $status=null, $nama=null){
    $secret_key = $this->M_School->secret_key ;
    $secret_iv = $this->M_School->secret_iv ;

    if(strtolower($mode) == "geojson"){
      if ($jenjang == "all" || $jenjang == "") {
        $jenjang = null;
      }
      if ($status == "all" || $status == "") {
        $status = null;
      }
      if($nama == "all" || $nama == ""){
        $nama=null;
      }
      echo $this->M_School->getGeoJson($jenjang, $status, $nama);
    }
    
    elseif (strtolower($mode) == "data") {
      $this->db->select(" sekolah_id, jenjang_singkatan as sekolah_jenjang, sekolah_npsn, sekolah_nama, sekolah_akreditasi, sekolah_kepala, sekolah_operator, sekolah_kurikulum, sekolah_penyelenggaraan, sekolah_ruangkelas, sekolah_laboratorium, sekolah_perpustakaan, sekolah_sanitasisiswa, sekolah_internet, sekolah_listrik, sekolah_dayalistrik, sekolah_luastanah, sekolah_guru, sekolah_siswalk, sekolah_siswapr, sekolah_rombonganbelajar, sekolah_status, sekolah_alamat, sekolah_rtrw, sekolah_dusun, sekolah_kelurahan, sekolah_kecamatan, sekolah_kabupaten, sekolah_provinsi, sekolah_kodepos, sekolah_email, sekolah_website, ST_asGeoJson(sekolah_lokasi) as sekolah_lokasi");
      $this->db->from("sekolah, jenjang");
      $this->db->where("sekolah.sekolah_jenjang = jenjang.jenjang_id");
      $query = $this->db->get();
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
    
    else {
      echo json_encode(false);
    }
  }
  
}
?>