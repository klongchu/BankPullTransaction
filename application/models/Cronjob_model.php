<?php
class Cronjob_model extends CI_Model
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
 


public function posterror($bank_list) {


	$total_data = array();
		$total_data['s_bank'] = $bank_list[s_bank];
		$total_data['i_bank'] = $bank_list[i_bank];
		$total_data['s_account_no'] = $bank_list[s_account_no];
		$total_data['s_account_name'] = $bank_list[s_account_name];
		$total_data['i_bank_list'] = $this->input->post('i_bank_list');
		$total_data['s_request'] = $this->input->post('s_request');
		$total_data['s_response'] = $this->input->post('s_response');
		$total_data['s_type'] = $this->input->post('s_type');
		$total_data['s_status'] = $this->input->post('s_status');
		$total_data['i_posted'] = $this->session->userdata('member_id');
		$total_data['s_ip'] = $_SERVER['REMOTE_ADDR'];
		$total_data['d_create'] = date('Y-m-d H:i:s');
		$this->db->insert("tbl_logs", $total_data);
	return "ok";
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

	
	
}