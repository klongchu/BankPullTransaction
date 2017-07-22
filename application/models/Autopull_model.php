<?php
class Autopull_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}
 
	public function update()
	{
header('Content-type: text/html; charset=utf-8'); 
		
$this->db->where("i_status",1);
$query = $this->db->get("tbl_bank_list");
    if($query->num_rows() > 0) {
      foreach($query->result() as $row) {

		$bank = $this->db->where('id',$row->i_bank)->get('tbl_bank')->row();

		$user = base64_encode($row->s_encrypteduser);
		$pass = base64_encode($row->s_encryptedpass);
		$curl_post_data['func'] = "InquiryTransaction";
		$curl_post_data['key'] = $row->s_key;
		$curl_post_data['username'] = $user;
		$curl_post_data['password'] = $pass;
		$curl_post_data['account'] = $row->s_account_no;
		$curl_post_data['d_start'] = "01/05/2017";
		$curl_post_data['d_end'] = date('d/m/Y');
		$curl_post_data['domain'] = "www.nagieos.com";
		$curl_post_data['license'] = "nagieos";
		$curl_post_data['folder_domain'] = "nagieos";
 
		$get_params = "";
		foreach($curl_post_data as $key=>$value){
			$get_params .= $key."=".$value."&";
		}
		$get_params .="aa=aa";

	  $service_url = $bank->s_url.'?'.$get_params;
	  $api_get_data = $this->curl_connects($service_url,$method="POST",$curl_post_data);
	  $api_array = json_decode($api_get_data);
	  $i = 0;
		foreach($api_array->total as $data){
			if($i == 1){
				$value = $data->value;
			}
			$i++;
		}
		//$value = 500;
		/**
		* 
		* Totoal Job
		* 
		*/
		$total_data = array();
		$total_data['i_bank_list'] = $row->id;
		$total_data['i_balance'] = $value;
		$total_data['s_ip'] = $_SERVER['REMOTE_ADDR'];
		$total_data['d_create'] = date('Y-m-d H:i:s');
		$this->db->insert("tbl_cronjob", $total_data);
		/**
		* 
		* Transaction
		* 
		*/
		foreach($api_array->transaction as $transaction){
		$this->db->where("i_bank_list",$row->id);
		$this->db->where("d_datetime",$transaction->datetime);
		$query = $this->db->get("tbl_cronjob_transaction");
		    if($query->num_rows() < 1) {
					$trans_data = array();
					$trans_data['i_bank_list'] = $row->id;
					$trans_data['d_datetime'] = $transaction->datetime;
					$trans_data['s_info'] = $transaction->info;
					$trans_data['i_out'] = $transaction->out;
					$trans_data['i_in'] = $transaction->in;
					$trans_data['i_total'] = $transaction->total;
					$trans_data['s_channel'] = $transaction->channel;
					$trans_data['d_create'] = date('Y-m-d H:i:s');
					$trans_data['d_update'] = date('Y-m-d H:i:s');
					$this->db->insert('tbl_cronjob_transaction', $trans_data);
				}
		}
				$list_va .= $row->s_account_name." Total : ".$value." <br />";
      }
    }
		return $list_va;
	}
	
	


	public function curl_connects($service_url,$method="POST",$curl_post_data) {
		$ch = curl_init();
	    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
	    curl_setopt($ch, CURLOPT_HEADER, false);
	    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	    curl_setopt($ch, CURLOPT_URL, $service_url);
	    curl_setopt($ch, CURLOPT_REFERER, $service_url);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
	    $result = curl_exec($ch);
	    curl_close($ch);
	    return $result;	
	}
 


public function add_detailbank() {
	$id = $this->input->post('i_bank');
	$i_balance = $this->input->post('i_balance');

	$total_data = array();
		$total_data['i_bank_list'] = $id;
		$total_data['i_balance'] = $i_balance;
		$total_data['s_ip'] = $_SERVER['REMOTE_ADDR'];
		$total_data['d_create'] = date('Y-m-d H:i:s');
		$this->db->insert("tbl_cronjob", $total_data);
	return "ok";
	}	



public function updatebankdetail() {
$id = $this->input->post('id');
$d_start = date('01/05/2017');
$d_end = date('d/m/Y');
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
$curl_post_data['domain'] = $this->session->userdata('wc_domain');
$curl_post_data['license'] = $this->session->userdata('wc_license');
$curl_post_data['d_now'] = date('Y-m-d H:i:s');

//return $curl_post_data;
return json_encode($curl_post_data);
 


  }	

	
	
}