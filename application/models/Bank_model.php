<?php

class Bank_model extends CI_Model {

 
  public function __construct() {
    parent::__construct();
  }

 private $headers = array('Content-Type: application/json');
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
    //$this->s_account_username = $this->input->post('s_account_username');
    //$this->s_account_password = $this->input->post('s_account_password');
    $this->i_posted = $this->session->userdata('member_id');
    
    $this->d_update = date('Y-m-d H:i:s');
    

    
    $table = "tbl_bank_list";
    if($id == NULL) {
    	
      $key = $this->input->post('s_key');
      $string = $this->input->post('s_account_username');
$encryptedUser = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $string, MCRYPT_MODE_CBC, md5(md5($key))));

$string = $this->input->post('s_account_password');
$encryptedPass = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $string, MCRYPT_MODE_CBC, md5(md5($key))));

$this->s_encrypteduser = $encryptedUser;
$this->s_encryptedpass = $encryptedPass;
      $this->d_create = date('Y-m-d H:i:s');
      $this->db->insert($table, $this);
      $id = $this->db->insert_id();
    }
    else {
      $this->db->update($table, $this, array('id'=> $id));
    }
    return $id;
	  
  }


public function delete() {
	$id = $this->input->post('id');
		$this->db->where('id', $id);
   $this->db->delete('tbl_bank_list'); 
   return 1;
	}
	
public function add_detailbank() {
	$id = $this->input->post('i_bank');
//	$i_balance = str_repeat('',',',$this->input->post('i_balance'));
	$i_balance = $this->input->post('i_balance');
	
	$this->d_lastpull = $this->input->post('d_now');
	$this->i_balance = $i_balance;
	$this->db->update('tbl_bank_list', $this, array('id'=> $id));
	return "ok";
	}	
	
public function updatebankdetail() {
$id = $this->input->post('id');
$d_start = $this->input->post('d_start');
$d_end = $this->input->post('d_end');
$bank_detail = $this->db->where('id',$id)->get('tbl_bank_list')->row(); 
$bank_url = $this->db->where('id',$bank_detail->i_bank)->get('tbl_bank')->row(); 
$service_url = $bank_url->s_url;

$curl_post_data['s_url'] = $service_url;
$curl_post_data['func'] = "InquiryTransaction";
$curl_post_data['key'] = $bank_detail->s_key;
$curl_post_data['username'] = $bank_detail->s_encrypteduser;
$curl_post_data['password'] = $bank_detail->s_encryptedpass;
$curl_post_data['account'] = $bank_detail->s_account_no;
$curl_post_data['d_start'] = $d_start;
$curl_post_data['d_end'] = $d_end;
//$curl_post_data['domain'] = $_SERVER['HTTP_HOST'];
$curl_post_data['domain'] = "www.nagieos.com";
$curl_post_data['license'] = "nagieos";
$curl_post_data['d_now'] = date('Y-m-d H:i:s');

//return $curl_post_data;
return json_encode($curl_post_data);
//return $this->curl_connect($service_url,'POST',$curl_post_data);
$bank_trans = $this->db->where('i_bank_list',$id)->get('tbl_bank_transaction')->num_rows(); 
if($bank_trans < 1){
	for($i=1;$i<=10;$i++){
		$make_data = array();
		$make_data['i_bank_list'] = $id;
		$make_data['d_datetime'] = date('Y-m-d H:i:s');;
		$make_data['s_info'] = "aaa";
		$make_data['i_out'] = 300*$i;
		$make_data['i_in'] = 400*$i;
		$make_data['i_total'] = 500*$i;
		$make_data['s_channel'] = "ATM";
		$make_data['i_posted'] = $this->session->userdata('member_id');
		$make_data['d_create'] = date('Y-m-d H:i:s');
		$make_data['d_update'] = date('Y-m-d H:i:s');
		$this->db->insert('tbl_bank_transaction', $make_data);
	}
}

$query = $this->db->where('i_bank_list',$id)->get('tbl_bank_transaction'); 
if($query->num_rows() > 0) {
      foreach($query->result() as $row) {
        $data[] = $row;
      }
    }

$res['d_now'] = date('Y-m-d H:i:s');
$res['total'] = 123;
$res['transection'] = json_encode($data);

//return json_encode($res);


  }	
/* ====================================
  ***************** *********************
  ***************** API *********************
  ***************** *********************
  =======================================*/
////////////////////// CURL CONNECTION
  public function curl_connect($service_url,$method="POST",$curl_post_data) {

$PATH = dirname(__FILE__).'/'; 
$COOKIEFILE = $PATH.'protect/cookies';
$curl = curl_init();
curl_setopt($curl, CURLOPT_HTTPHEADER, $this->headers);
curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 5.1) AppleWebKit/535.6 (KHTML, like Gecko) Chrome/16.0.897.0 Safari/535.6");
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_SSLVERSION, CURL_SSLVERSION_DEFAULT);
curl_setopt($curl, CURLOPT_CAINFO, $PATH."cacert.pem");
curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($curl, CURLOPT_COOKIEJAR, $COOKIEFILE);
curl_setopt($curl, CURLOPT_COOKIEFILE, $COOKIEFILE);
curl_setopt($curl, CURLOPT_REFERER, $service_url);
curl_setopt($curl, CURLOPT_URL, $service_url);
if($method == 'POST'){
	curl_setopt($curl, CURLOPT_POST, 1);
	curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_post_data);
}else{
	curl_setopt($curl, CURLOPT_GET, 1);
}
$curl_response = curl_exec($curl);
curl_close($curl);

//$curl_response = json_encode($curl_post_data);
return $curl_response;
  }
  
  
  /*
  *
  *  Function  
  *
  * @return
  */



}
