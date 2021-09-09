<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_School extends CI_Model {
  private $table = "sekolah";
  public $secret_key = "School" ;
  public $secret_iv = "SchoolEncrypt";

  public function __construct(){
    parent::__construct();
    $this->load->model('M_Encrypt');
  }

  public function rules($field= array()){
    $rules = array();
    
    if (isset($field["_jenjang_"])) {
      $rules[] = array( 'field' => '_jenjang_',
                        'label' => 'Jenjang',
                        'rules' => 'required|trim|numeric');
    }

    if (isset($field["_oldnpsn_"])) {
      $rules[] = array( 'field' => '_oldnpsn_',
                        'label' => 'OLD NPSN',
                        'rules' => 'required|trim|numeric|callback_npsnavailable');
    }

    if (isset($field["_npsn_"])) {
      $rules[] = array( 'field' => '_npsn_',
                        'label' => 'NPSN',
                        'rules' => 'required|trim|numeric|is_unique[sekolah.sekolah_npsn]');
    }

    if (isset($field["_nama_"])) {
      $rules[] = array( 'field' => '_nama_',
                        'label' => 'Nama',
                        'rules' => 'required|trim');
    }

    if (isset($field["_akreditasi_"])) {
      $rules[] = array( 'field' => '_akreditasi_',
                        'label' => 'Akreditasi',
                        'rules' => 'required|trim|alpha_numeric_spaces');
    }

    if (isset($field["_kepala_"])) {
      $rules[] = array( 'field' => '_kepala_',
                        'label' => 'Kepala Sekolah',
                        'rules' => 'required|trim');
    }

    if (isset($field["_operator_"])) {
      $rules[] = array( 'field' => '_operator_',
                        'label' => 'Operator',
                        'rules' => 'required|trim');
    }

    if (isset($field["_kurikulum_"])) {
      $rules[] = array( 'field' => '_kurikulum_',
                        'label' => 'Kurikulum',
                        'rules' => 'required|trim');
    }

    if (isset($field["_penyelenggaraan_"])) {
      $rules[] = array( 'field' => '_penyelenggaraan_',
                        'label' => 'Penyelenggaraan',
                        'rules' => 'required|trim');
    }

    if (isset($field["_ruangkelas_"])) {
      $rules[] = array( 'field' => '_ruangkelas_',
                        'label' => 'Ruang Kelas',
                        'rules' => 'required|trim|numeric');
    }

    if (isset($field["_laboratorium_"])) {
      $rules[] = array( 'field' => '_laboratorium_',
                        'label' => 'Laboratorium',
                        'rules' => 'required|trim|numeric');
    }

    if (isset($field["_perpustakaan_"])) {
      $rules[] = array( 'field' => '_perpustakaan_',
                        'label' => 'Perpustakaan',
                        'rules' => 'required|trim|numeric');
    }

    if (isset($field["_sanitasisiswa_"])) {
      $rules[] = array( 'field' => '_sanitasisiswa_',
                        'label' => 'Sanitai Siswa',
                        'rules' => 'required|trim|numeric');
    }

    if (isset($field["_internet_"])) {
      $rules[] = array( 'field' => '_internet_',
                        'label' => 'Internet',
                        'rules' => 'required|trim|in_list[true,false]');
    }

    if (isset($field["_listrik_"])) {
      $rules[] = array( 'field' => '_listrik_',
                        'label' => 'Listrik',
                        'rules' => 'required|trim|in_list[true,false]');
    }

    if (isset($field["_dayalistrik_"])) {
      $rules[] = array( 'field' => '_dayalistrik_',
                        'label' => 'Daya Listrik',
                        'rules' => 'required|trim|numeric');
    }

    if (isset($field["_luastanah_"])) {
      $rules[] = array( 'field' => '_luastanah_',
                        'label' => 'Luas Tanah',
                        'rules' => 'required|trim|numeric');
    }

    if (isset($field["_guru_"])) {                   
      $rules[] = array( 'field' => '_guru_',
                        'label' => 'Guru',
                        'rules' => 'required|trim|numeric');
    }

    if (isset($field["_siswalk_"])) {
      $rules[] = array( 'field' => '_siswalk_',
                        'label' => 'Siswa Laki-Laki',
                        'rules' => 'required|trim|numeric');
    }

    if (isset($field["_siswapr_"])) {
      $rules[] = array( 'field' => '_siswapr_',
                        'label' => 'Siswa Perempuan',
                        'rules' => 'required|trim|numeric');
    }

    if (isset($field["_rombonganbelajar_"])) {
      $rules[] = array( 'field' => '_rombonganbelajar_',
                        'label' => 'Rombongan Belajar',
                        'rules' => 'required|trim|numeric');
    }

    if (isset($field["_status_"])) {
      $rules[] = array( 'field' => '_status_',
                        'label' => 'Status',
                        'rules' => 'required|trim|in_list[negeri,swasta]');
    }

    if (isset($field["_alamat_"])) {
      $rules[] = array( 'field' => '_alamat_',
                        'label' => 'Alamat',
                        'rules' => 'required|trim');
    }

    if (isset($field["_rtrw_"])) {
      $rules[] = array( 'field' => '_rtrw_',
                        'label' => 'RT/RW',
                        'rules' => 'required|trim');
    }

    if (isset($field["_dusun_"])) {
      $rules[] = array( 'field' => '_dusun_',
                        'label' => 'Dusun',
                        'rules' => 'required|trim');
    }

    if (isset($field["_kelurahan_"])) {
      $rules[] = array( 'field' => '_kelurahan_',
                        'label' => 'Kelurahan',
                        'rules' => 'required|trim');
    }

    if (isset($field["_kecamatan_"])) {
      $rules[] = array( 'field' => '_kecamatan_',
                        'label' => 'Kecamatan',
                        'rules' => 'required|trim');
    }

    if (isset($field["_kabupaten_"])) {
      $rules[] = array( 'field' => '_kabupaten_',
                        'label' => 'Kabupaten',
                        'rules' => 'required|trim');
    }

    if (isset($field["_provinsi_"])) {
      $rules[] = array( 'field' => '_provinsi_',
                        'label' => 'Provinsi',
                        'rules' => 'required|trim');
    }

    if (isset($field["_kodepos_"])) {
      $rules[] = array( 'field' => '_kodepos_',
                        'label' => 'Kodepos',
                        'rules' => 'required|trim|numeric');
    }

    if (isset($field["_email_"])) {
      $rules[] = array( 'field' => '_email_',
                        'label' => 'Email',
                        'rules' => 'required|trim|valid_email');
    }

    if (isset($field["_website_"])) {
      $rules[] = array( 'field' => '_website_',
                        'label' => 'Website',
                        'rules' => 'required|trim');
    }

    if (isset($field["_lng_"])) {
      $rules[] = array( 'field' => '_lng_',
                        'label' => 'Longtitude',
                        'rules' => 'required|trim');
    }

    if (isset($field["_lat_"])) {
      $rules[] = array( 'field' => '_lat_',
                        'label' => 'Latitude',
                        'rules' => 'required|trim');
    }

    // if (isset($field["_files_"])) {
    //   $rules[] = array( 'field' => '_files_',
    //                     'label' => 'Foto',
    //                     'rules' => 'callback_checkFileImg'),
    // }

    return $rules;
  }

  public function getById($id){
    $this->db->select(" sekolah_id, sekolah_jenjang, sekolah_npsn, sekolah_nama, sekolah_akreditasi, sekolah_kepala, sekolah_operator, sekolah_kurikulum, sekolah_penyelenggaraan, sekolah_ruangkelas, sekolah_laboratorium, sekolah_perpustakaan, sekolah_sanitasisiswa, sekolah_internet, sekolah_listrik, sekolah_dayalistrik, sekolah_luastanah, sekolah_guru, sekolah_siswalk, sekolah_siswapr, sekolah_rombonganbelajar, sekolah_status, sekolah_alamat, sekolah_rtrw, sekolah_dusun, sekolah_kelurahan, sekolah_kecamatan, sekolah_kabupaten, sekolah_provinsi, sekolah_kodepos, sekolah_email, sekolah_website, ST_asGeoJson(sekolah_lokasi) as sekolah_lokasi");
    $data = $this->db->get_where($this->table, array("sekolah_id" => $id) )->row_array();
    $data["sekolah_lokasi"] = json_decode($data["sekolah_lokasi"], true);
    return $data;
  }

  public function getTotal(){
    return $this->db->count_all_results($this->table);
  }

  public function getTotalNegeri(){
    $this->db->where("sekolah_status", "negeri");
    return $this->db->count_all_results($this->table);
  }

  public function getTotalSwasta(){
    $this->db->where("sekolah_status", "swasta");
    return $this->db->count_all_results($this->table);
  }

  public function uploadImages($path, $types, $name="_files_[]"){
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
          $config['max_width']        = 1920;
          $config['max_height']       = 1080;
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
              "message" => $this->upload->display_errors()
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

  public function save(){
    $post = $this->input->post();
    if (!empty($post)) {
      $data = array(
        "sekolah_id"              => NULL,
        "sekolah_jenjang"         => $post["_jenjang_"],
        "sekolah_npsn"            => $post["_npsn_"],
        "sekolah_nama"            => $post["_nama_"],
        "sekolah_akreditasi"      => $post["_akreditasi_"],
        "sekolah_kepala"          => $post["_kepala_"],
        "sekolah_operator"        => $post["_operator_"],
        "sekolah_kurikulum"       => $post["_kurikulum_"],
        "sekolah_penyelenggaraan" => $post["_penyelenggaraan_"],
        "sekolah_ruangkelas"      => $post["_ruangkelas_"],
        "sekolah_laboratorium"    => $post["_laboratorium_"],
        "sekolah_perpustakaan"    => $post["_perpustakaan_"],
        "sekolah_sanitasisiswa"   => $post["_sanitasisiswa_"],
        "sekolah_internet"        => $post["_internet_"],
        "sekolah_listrik"         => $post["_listrik_"],
        "sekolah_dayalistrik"     => $post["_dayalistrik_"],
        "sekolah_luastanah"       => $post["_luastanah_"],
        "sekolah_guru"            => $post["_guru_"],
        "sekolah_siswalk"         => $post["_siswalk_"],
        "sekolah_siswapr"         => $post["_siswapr_"],
        "sekolah_rombonganbelajar" => $post["_rombonganbelajar_"],
        "sekolah_status"          => $post["_status_"],
        "sekolah_alamat"          => $post["_alamat_"],
        "sekolah_rtrw"            => $post["_rtrw_"],
        "sekolah_dusun"           => $post["_dusun_"],
        "sekolah_kelurahan"       => $post["_kelurahan_"],
        "sekolah_kecamatan"       => $post["_kecamatan_"],
        "sekolah_kabupaten"       => $post["_kabupaten_"],
        "sekolah_provinsi"        => $post["_provinsi_"],
        "sekolah_kodepos"         => $post["_kodepos_"],
        "sekolah_email"           => $post["_email_"],
        "sekolah_website"         => $post["_website_"],
      );
      $lng = $post["_lng_"];
      $lat = $post["_lat_"];
      $this->db->set('sekolah_lokasi', "ST_GeomFromText('POINT($lng $lat)')", FALSE);
      $data = $this->security->xss_clean($data);
      if($this->db->insert($this->table, $data)){
        $response = array(
          "type" => "success",
          "message" => "Success insert data",
          "encrypt_id" => $this->M_Encrypt->encrypt_decrypt("encrypt", $this->db->insert_id(), $this->secret_key, $this->secret_iv)
        );
      } else {
        $response = array(
          "type" => "error",
          "message" => "Failed insert data",
        );
      }
    } else {
      $response = array(
        "type" => "error",
        "message" => "Data not found!",
      );
    }

    return $response;
  }

  public function update($id){
    $post = $this->input->post();
    if (!empty($post)) {
      $data = array(
        "sekolah_jenjang"         => $post["_jenjang_"],
        "sekolah_nama"            => $post["_nama_"],
        "sekolah_akreditasi"      => $post["_akreditasi_"],
        "sekolah_kepala"          => $post["_kepala_"],
        "sekolah_operator"        => $post["_operator_"],
        "sekolah_kurikulum"       => $post["_kurikulum_"],
        "sekolah_penyelenggaraan" => $post["_penyelenggaraan_"],
        "sekolah_ruangkelas"      => $post["_ruangkelas_"],
        "sekolah_laboratorium"    => $post["_laboratorium_"],
        "sekolah_perpustakaan"    => $post["_perpustakaan_"],
        "sekolah_sanitasisiswa"   => $post["_sanitasisiswa_"],
        "sekolah_internet"        => $post["_internet_"],
        "sekolah_listrik"         => $post["_listrik_"],
        "sekolah_dayalistrik"     => $post["_dayalistrik_"],
        "sekolah_luastanah"       => $post["_luastanah_"],
        "sekolah_guru"            => $post["_guru_"],
        "sekolah_siswalk"         => $post["_siswalk_"],
        "sekolah_siswapr"         => $post["_siswapr_"],
        "sekolah_rombonganbelajar" => $post["_rombonganbelajar_"],
        "sekolah_status"          => $post["_status_"],
        "sekolah_alamat"          => $post["_alamat_"],
        "sekolah_rtrw"            => $post["_rtrw_"],
        "sekolah_dusun"           => $post["_dusun_"],
        "sekolah_kelurahan"       => $post["_kelurahan_"],
        "sekolah_kecamatan"       => $post["_kecamatan_"],
        "sekolah_kabupaten"       => $post["_kabupaten_"],
        "sekolah_provinsi"        => $post["_provinsi_"],
        "sekolah_kodepos"         => $post["_kodepos_"],
        "sekolah_email"           => $post["_email_"],
        "sekolah_website"         => $post["_website_"],
      );

      if (!empty($post["_npsn_"])) {
        $data["sekolah_npsn"] = $post["_npsn_"];
      }

      $lng = $post["_lng_"];
      $lat = $post["_lat_"];
      $this->db->set('sekolah_lokasi', "ST_GeomFromText('POINT($lng $lat)')", FALSE);
      $data = $this->security->xss_clean($data);
      $this->db->where("sekolah_id", $id);
      if($this->db->update($this->table, $data)){

        // Nama folder berdasarkan npsn sekolah, maka jika npsn ganti, nama folder juga akan diganti
        if (!empty($post["_npsn_"])) {
          $path = "./uploads/school/";
          if (file_exists($path.$post["_oldnpsn_"])) {
            $foto = $this->db->get_where("foto", array("foto_folder"=>$post["_oldnpsn_"]));
            if ($foto->num_rows() > 0) {
              $this->db->where("foto_sekolah", $id);
              if($this->db->update("foto", array("foto_folder"=>$post["_npsn_"]))){
                rename($path.$post["_oldnpsn_"], $path.$post["_npsn_"]);
              }
            } else {
              if (is_dir($path.$post["_oldnpsn_"])) {
                rmdir($path.$post["_oldnpsn_"]);
              }
            }
          }
        }

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
    } else {
      $response = array(
        "type" => "error",
        "message" => "Data not found!",
      );
    }

    return $response;
  }

  public function getGeoJson($jenjang=null, $status=null, $nama=null){
    $this->db->select(" sekolah_id, sekolah_jenjang, sekolah_npsn, sekolah_nama, sekolah_akreditasi, sekolah_kepala, sekolah_operator, sekolah_kurikulum, sekolah_penyelenggaraan, sekolah_ruangkelas, sekolah_laboratorium, sekolah_perpustakaan, sekolah_sanitasisiswa, sekolah_internet, sekolah_listrik, sekolah_dayalistrik, sekolah_luastanah, sekolah_guru, sekolah_siswalk, sekolah_siswapr, sekolah_rombonganbelajar, sekolah_status, sekolah_alamat, sekolah_rtrw, sekolah_dusun, sekolah_kelurahan, sekolah_kecamatan, sekolah_kodepos, sekolah_email, sekolah_website, ST_asGeoJson(sekolah_lokasi) as sekolah_lokasi");
    if ($jenjang != null) {
      $this->db->where("sekolah_jenjang", $jenjang);
    }
    if ($status != null) {
      $this->db->where("sekolah_status", $status);
    }
    if ($nama != null) {
      $this->db->like("sekolah_nama", $nama, "both");
    }
    $data = $this->db->get($this->table)->result_array();
    $json = array();
    foreach ($data as $key => $value) {
        $properties = array(
          "ID"              => $this->M_Encrypt->encrypt_decrypt("encrypt", $value["sekolah_id"], $this->secret_key, $this->secret_iv),
          "JENJANG"         => $value["sekolah_jenjang"],
          "NPSN"            => $value["sekolah_npsn"],
          "NAMA"            => $value["sekolah_nama"],
          "AKREDITASI"      => $value["sekolah_akreditasi"],
          "KEPALA"          => $value["sekolah_kepala"],
          "OPERATOR"        => $value["sekolah_operator"],
          "KURIKULUM"       => $value["sekolah_kurikulum"],
          "PENYELENGGARAAN" => $value["sekolah_penyelenggaraan"],
          "RUANGKELAS"      => $value["sekolah_ruangkelas"],
          "LABORATORIUM"    => $value["sekolah_laboratorium"],
          "PERPUSTAKAAN"    => $value["sekolah_perpustakaan"],
          "SANITASISISWA"   => $value["sekolah_sanitasisiswa"],
          "INTERNET"        => $value["sekolah_internet"],
          "LISTRIK"         => $value["sekolah_listrik"],
          "DAYALISTRIK"     => $value["sekolah_dayalistrik"],
          "LUASTANAH"       => $value["sekolah_luastanah"],
          "GURU"            => $value["sekolah_guru"],
          "SISWALK"         => $value["sekolah_siswalk"],
          "SISWAPR"         => $value["sekolah_siswapr"],
          "ROMBEL"          => $value["sekolah_rombonganbelajar"],
          "STATUS"          => $value["sekolah_status"],
          "ALAMAT"          => $value["sekolah_alamat"],
          "RTRW"            => $value["sekolah_rtrw"],
          "DUSUN"           => $value["sekolah_dusun"],
          "KELURAHAN"       => $value["sekolah_kelurahan"],
          "KECAMATAN"       => $value["sekolah_kecamatan"],
          "KODEPOS"         => $value["sekolah_kodepos"],
          "EMAIL"           => $value["sekolah_email"],
          "WEBSITE"         => $value["sekolah_website"],
        );
        $geometry = json_decode($value["sekolah_lokasi"], true);
        $features = array(
            "type" => "Feature",
            "properties" => $properties,
            "geometry" => $geometry
        );

        $json[] = $features;
    }
    $geoJSON = array(
        "type" => "FeatureCollection",
        "features" => $json
    );

    return json_encode($geoJSON);
  }



}
?>