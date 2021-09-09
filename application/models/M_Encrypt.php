<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Encrypt extends CI_Model {
  
  public function __construct(){
      parent::__construct();
  }

  function encrypt_decrypt($action, $string, $secret_key, $secret_iv) 
  {
    $output = false;
    $encrypt_method = "AES-256-CBC";
    $secret_key = $secret_key;
    $secret_iv = $secret_iv;
    // hash
    $key = hash('sha256', $secret_key);    
    // iv - encrypt method AES-256-CBC expects 16 bytes
    $iv = substr(hash('sha256', $secret_iv), 0, 16);
    if ( $action == 'encrypt' ) {
        $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
        $output = base64_encode($output);
    } else if( $action == 'decrypt' ) {
        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
    }
    return $output;
  }


}
?>