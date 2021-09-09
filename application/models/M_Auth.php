<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Auth extends CI_Model {
  private $table = "akun";
  
  public function __construct(){
      parent::__construct();
      $this->load->library('encryption');
  }

  public function rules(){
    return array(
      array(  'field' => '_username_',
              'label' => 'Username',
              'rules' => 'required|trim|alpha_numeric|min_length[5]|max_length[12]'),

      array(  'field' => '_password_',
              'label' => 'Password',
              'rules' => 'required|trim|alpha_numeric|min_length[5]|max_length[20]'),
    );
  }

  public function login() {
    $post = $this->input->post();
    if (!empty($post["_username_"]) && !empty($post["_password_"])) {
      $username = strtolower($post["_username_"]);
      $password = strtolower($post["_password_"]);

      $getUser = $this->db->get_where($this->table, array("akun_username" => $username));
      if ($getUser->num_rows() > 0) {
        $user = $getUser->row_array();
        if ($user["akun_isactive"] == "true") {
          if (password_verify($password, $user["akun_password"])) {
            $data = [
                "id" => $this->encryption->encrypt($user["akun_id"]),
                "name" => $this->encryption->encrypt($user["akun_name"]),
                "username" => $this->encryption->encrypt($user["akun_username"]),
                "status" => $this->encryption->encrypt($user["akun_status"]),
                "jenjang" => $this->encryption->encrypt($user["akun_jenjang"]),
                "image" => $this->encryption->encrypt($user["akun_image"]),
            ];
            $this->session->set_userdata($data);
            $response = array(
              "type" => "success",
              "message" => "Login successful!",
            );
          } else {
            $response = array(
              "type" => "error",
              "message" => "Wrong password!",
            );
          }

        } else {
          $response = array(
            "type" => "error",
            "message" => "This username has not been activated!",
          );
        }
      } else {
        $response = array(
          "type" => "error",
          "message" => "Username not found!",
        );
      }
    } else {
      $response = array(
        "type" => "error",
        "message" => "Enter data correctly!",
      );
    }
    return $response;
  }

  public function session($level=array()){
    $session = $this->session->userdata();
    if (!empty($session)) {
      if (!empty($session["id"]) && !empty($session["name"]) && !empty($session["username"]) && !empty($session["status"]) && !empty($session["jenjang"])) {
        $id = $this->encryption->decrypt($session["id"]);
        $name = $this->encryption->decrypt($session["name"]);
        $username = $this->encryption->decrypt($session["username"]);
        $status = $this->encryption->decrypt($session["status"]);
        $jenjang = $this->encryption->decrypt($session["jenjang"]);
        $image = $this->encryption->decrypt($session["image"]);
        if (in_array($status, $level, TRUE)) {
          return array($id, $name, $username, $status, $jenjang, $image);
        } else {
          return FALSE;
        }
      } else {
        return FALSE;
      }
    } else {
      return FALSE;
    }
  }

  public function refreshSession($id){
    $user = $this->db->get_where($this->table, array("akun_id"=>$id))->row_array();
    $data = [
      "id" => $this->encryption->encrypt($user["akun_id"]),
      "name" => $this->encryption->encrypt($user["akun_name"]),
      "username" => $this->encryption->encrypt($user["akun_username"]),
      "status" => $this->encryption->encrypt($user["akun_status"]),
      "jenjang" => $this->encryption->encrypt($user["akun_jenjang"]),
      "image" => $this->encryption->encrypt($user["akun_image"]),
    ];
    $this->session->set_userdata($data);
    // header("Refresh:0");
  }

  public function logout() {
      $arr = ["id","name","username","status","jenjang","image"];
      $this->session->unset_userdata($arr);
      $this->session->sess_destroy();
      redirect(site_url("admin/home"),"refresh");
  }

}
?>