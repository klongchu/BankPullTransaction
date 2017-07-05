<?php

class Bank_model extends CI_Model {

 
  public function __construct() {
    parent::__construct();
  }

 
  /*
  *
  *  Function  
  *
  * @return
  */
  /* ====================================
  ***************** *********************
  ***************** Load all Data *********************
  ***************** *********************
  =======================================*/
  ///////////////////
public function postdata($table) {
    $id = $this->input->post('id');
    $this->i_bank = $this->input->post('i_bank');
    $this->s_key = $this->input->post('s_key');
    $this->s_account_name = $this->input->post('s_account_name');
    $this->s_account_no = $this->input->post('s_account_no');
    $this->s_account_username = $this->input->post('s_account_username');
    $this->s_account_password = $this->input->post('s_account_password');
    $this->i_posted = $this->session->userdata('member_id');
    
    $this->d_update = date('Y-m-d H:i:s');
    
$string = $this->input->post('s_account_username');
$encryptedUser = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $string, MCRYPT_MODE_CBC, md5(md5($key))));

$string = $this->input->post('s_account_password');
$encryptedPass = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $string, MCRYPT_MODE_CBC, md5(md5($key))));

$this->s_encrypteduser = $encryptedUser;
$this->s_encryptedpass = $encryptedPass;
    
    $table = "tbl_bank_list";
    if($id == NULL) {
      $this->d_create = date('Y-m-d H:i:s');
      $this->db->insert($table, $this);
      $id = $this->db->insert_id();
    }
    else {
      $this->db->update($table, $this, array('id'=> $id));
    }
    return $id;
	  
  }
	
  /*
  *
  *  Function  
  *
  * @return
  */



}
