<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Account extends CI_Model {
  private $table = "akun";
  public $secret_key = "Account" ;
  public $secret_iv = "AccountEncrypt";
  
  public function __construct(){
    parent::__construct();
    $this->load->model("M_Main");
  }

  public function rules() {
    return array(
      array(  'field' => '_name_',
              'label' => 'Name',
              'rules' => 'required|trim|alpha_numeric_spaces|max_length[20]'),

      array(  'field' => '_username_',
              'label' => 'Username',
              'rules' => 'required|trim|alpha_numeric|min_length[5]|max_length[12]|is_unique[akun.akun_username]',
              'errors' => array('is_unique' => 'This %s already exists.')),

      array(  'field' => '_password_',
              'label' => 'Password',
              'rules' => 'required|trim|alpha_numeric|min_length[5]|max_length[20]'),

      array(  'field' => '_passconf_',
              'label' => 'Confirm Password',
              'rules' => 'required|trim|matches[_password_]'),

      array(  'field' => '_level_',
              'label' => 'Level',
              'rules' => 'required|trim|numeric|in_list[1,2,3,4,5,6,7]'),

      array(  'field' => '_checkfile_',
              'label' => 'Image',
              'rules' => 'callback_checkFileImg'),
    );
  }

  public function rulesEdit($field= array()) {
    $rules = array();
    if (isset($field["_name_"])) {
      $rules[] = array( 'field' => '_name_',
                        'label' => 'Name',
                        'rules' => 'required|trim|alpha_numeric_spaces|max_length[20]');
    }
    
    if (isset($field["_username_"])) {
      $rules[] = array( 'field' => '_username_',
                        'label' => 'Username',
                        'rules' => 'required|trim|alpha_numeric|min_length[5]|max_length[12]|is_unique[akun.akun_username]',
                        'errors' => array('is_unique' => 'This %s already exists.'));
    }

    if (isset($field["_password_"])) {
      $rules[] = array( 'field' => '_password_',
                        'label' => 'Password',
                        'rules' => 'required|trim|alpha_numeric|min_length[5]|max_length[20]');
    }

    if (isset($field["_passconf_"])) {
      $rules[] = array( 'field' => '_passconf_',
                        'label' => 'Confirm Password',
                        'rules' => 'required|trim|matches[_password_]');
    }

    if (isset($field["_level_"])) {
      $rules[] =  array( 'field' => '_level_',
                        'label' => 'Level',
                        'rules' => 'required|trim|numeric|in_list[1,2,3,4,5,6,7]');
    }

    if (isset($field["_checkfile_"])) {
      $rules[] = array( 'field' => '_checkfile_',
                        'label' => 'Image',
                        'rules' => 'callback_checkFileImg');
    }

    return $rules;
  
  }

  
  public function getById($id){
    return $this->db->get_where($this->table, array("akun_id" => $id) )->row_array();
  }

  public function getAll() {
    $this->db->select("akun_id, akun_name, akun_username, akun_isactive, akun_createat, akun_modifyat, akun_status, akun_image, akun_jenjang");
    $query = $this->db->get($this->table);
    if ($query->num_rows() > 0) {
      return $query->result_array();
    } else {
      return null;
    }
  }

  public function save(){
    $post = $this->input->post();
    if (!empty($post)){
      $check = $this->db->get_where($this->table, array("akun_username"=>htmlspecialchars($post["_username_"])))->num_rows();
      if ($check > 0) {
        $response = array(
          "type" => "error",
          "message" => "This username already exists",
        );
      } else {
        if ($post["_password_"] === $post["_passconf_"]) {
          $uploadimg = $this->M_Main->uploadFile("./uploads/account/","jpg|png|jpeg");

          if ($uploadimg["type"] == "error") {
            $response = array(
              "type" => "error",
              "message" => $uploadimg["message"],
            );
          } else {
            date_default_timezone_set('Asia/Jakarta');
            $data = array(
              "akun_id"           => NULL,
              "akun_name"         => htmlspecialchars($post["_name_"]),
              "akun_username"     => strtolower(htmlspecialchars($post["_username_"])),
              "akun_password"     => password_hash(strtolower($post["_password_"]), PASSWORD_BCRYPT, array('cost'=>8)),
              "akun_lastpassword" => password_hash(strtolower($post["_password_"]), PASSWORD_BCRYPT, array('cost'=>8)),
              "akun_isactive"     => "false",
              "akun_createat"     => date("Y-m-d H:i:s"),
              "akun_modifyat"     => date("Y-m-d H:i:s"),
              "akun_status"       => "admin",
              "akun_image"        => "default.png",
              "akun_jenjang"      => $post["_level_"],
            );
            if ($uploadimg["type"] == "success") {
              $data["akun_image"] = $uploadimg["data"]["file_name"];
            }

            $data = $this->security->xss_clean($data);
            if($this->db->insert($this->table, $data)){
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
          } 
        } else {
          $response = array(
            "type" => "error",
            "message" => "Confirm password must be correct!",
          );
        }
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
    if (!empty($post)){

      if (!empty($post["_username_"])) {
        $check = $this->db->get_where($this->table, array("akun_username"=>htmlspecialchars($post["_username_"])))->num_rows();
        if ($check > 0) {
          $username = array(
            "type" => "error",
            "message" => "This username already exists",
          );
        } else {
          $username = TRUE;
        }
      } else {
        $username = TRUE;
      }

      if (!empty($post["_password_"]) && !empty($post["_passconf_"])) {
        if ($post["_password_"] === $post["_passconf_"]) {
          $password = TRUE;
        } else {
          $password = array(
            "type" => "error",
            "message" => "Confirm password must be correct!",
          );
        }
      } else {
        $password = TRUE;
      }

      if ($username == TRUE && $password == TRUE) {
        $account = $this->getById($id);
        if ($account["akun_image"] != "default.png") {
          $oldpath = "./uploads/account/".$account["akun_image"];
        } else {
          $oldpath = NULL;
        } 
        $uploadimg = $this->M_Main->uploadFile("./uploads/account/","jpg|png|jpeg", $oldpath);

        if ($uploadimg["type"] == "error") {
          $response = array(
            "type" => "error",
            "message" => $uploadimg["message"],
          );
        } else {
          date_default_timezone_set('Asia/Jakarta');
          $data = array(
            "akun_name"         => htmlspecialchars($post["_name_"]),
            "akun_lastpassword" => $account["akun_password"],
            "akun_modifyat"     => date("Y-m-d H:i:s"),
          );

          if ($uploadimg["type"] == "success") {
            $data["akun_image"] = $uploadimg["data"]["file_name"];
          }
          if (!empty($post["_username_"])) {
            $data["akun_username"] = strtolower(htmlspecialchars($post["_username_"]));
          }
          if (!empty($post["_password_"]) && !empty($post["_passconf_"])) {
            $data["akun_password"] = password_hash(strtolower($post["_password_"]), PASSWORD_BCRYPT, array('cost'=>8));
          }
          if (!empty($post["_level_"])) {
            $data["akun_jenjang"] = $post["_level_"];
          }

          $data = $this->security->xss_clean($data);
          $this->db->where("akun_id", $id);
          if($this->db->update($this->table, $data)){
            $response = array(
              "type" => "success",
              "message" => "Success update data",
            );
          } else {
            $response = array(
              "type" => "error",
              "message" => "Failed update data",
            );
          }
        }
      } else {
        if ($username != TRUE) {
          $response = $username;
        } else {
          $response = $password;
        }
      }
    } else {
      $response = array(
        "type" => "error",
        "message" => "Data not found!",
      );
    }
    return $response;
  }

  public function delete($id){
    return $this->db->delete($this->table, array("akun_id" => $id) );
  }
}
?>