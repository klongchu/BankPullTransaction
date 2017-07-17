<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Bank extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('Bank_model');
    $this->load->library('pagination');
  }
 
  
  
  public function name($id) {
  	///////// Bank Main
  	$s_seclect = array('*'); 
    $s_conditions['where'] = array('id'=>$id); 
    $s_order_by = array('id'=>'desc'); 
  	$data['result'] = $this->Main_model->row_data("tbl_bank",$s_seclect,$s_conditions,$s_order_by);
   	$data['title'] = $data['result']->s_name;
   	$data['i_bank'] = $data['result']->id;
   	/////////// Bank List
   	$s_seclect = array('*'); 
    $s_conditions['where'] = array('i_bank'=>$id); 
    $s_order_by = array('s_account_name'=>'desc'); 
  	$data['bank_list'] = $this->Main_model->fetch_data("tbl_bank_list",$s_seclect,$s_conditions,$s_order_by);
    $this->load->view('template/header',$data);
    $this->load->view('bank/index');
    $this->load->view('template/footer');
  }
  /////////////////// Detail
  public function detail($id) {
  	$s_seclect = array('*'); 
    $s_conditions['where'] = array('id'=>$id); 
    $s_order_by = array('id'=>'desc'); 
  	$data['bank_list'] = $this->Main_model->row_data("tbl_bank_list",$s_seclect,$s_conditions,$s_order_by);
   	////////////// transaction
   	$s_seclect = array('*'); 
    $s_conditions['where'] = array('i_bank_list'=>$id); 
    $s_order_by = array('d_datetime'=>'asc'); 
  	$data['transaction'] = $this->Main_model->fetch_data("tbl_bank_transaction",$s_seclect,$s_conditions,$s_order_by);
  	
   	////////////// Bank
   	$s_seclect = array('*'); 
    $s_conditions['where'] = array('id'=>$data['bank_list']->i_bank); 
    $s_order_by = array('id'=>'desc'); 
  	$data['bank'] = $this->Main_model->row_data("tbl_bank",$s_seclect,$s_conditions,$s_order_by);

   	
    $this->load->view('template/header',$data);
    $this->load->view('bank/detail');
    $this->load->view('template/footer');
  }
  
  /////////////////// Postdata
  public function postdata() {
  	$data['result'] = $this->Bank_model->postdata();
    $this->load->view('bank/result',$data);
  }
  /////////////////// Delete
  public function delete() {
  	$data['result'] = $this->Bank_model->delete();
    $this->load->view('bank/result',$data);
  }
/////////////////// check  already_username
  public function already_username() {
  	$i_bank = $this->input->post('i_bank');
  	$s_account_username = $this->input->post('s_account_username');
  	$s_seclect = array('id'); 
    $s_conditions['where'] = array('i_bank'=>$i_bank,"s_account_username"=>$s_account_username); 
    $s_order_by = array('id'=>'desc'); 
  	$data['data'] = $this->Main_model->row_data("tbl_bank_list",$s_seclect,$s_conditions,$s_order_by);
   	$data['result'] = $data['data']->id;
   	
   	if($this->input->post('id') == $data['data']->id){
			$data['result'] = 0;
		}else{
			$data['result'] = $data['data']->id;
		}
   	
    $this->load->view('bank/result',$data);
  }
  /////////////////// check  already_no
  public function already_no() {
  	$i_bank = $this->input->post('i_bank');
  	$s_account_no = $this->input->post('s_account_no');
  	$s_seclect = array('id'); 
    $s_conditions['where'] = array('i_bank'=>$i_bank,"s_account_no"=>$s_account_no); 
    $s_order_by = array('id'=>'desc'); 
  	$data['data'] = $this->Main_model->row_data("tbl_bank_list",$s_seclect,$s_conditions,$s_order_by);
   	if($this->input->post('id') == $data['data']->id){
			$data['result'] = 0;
		}else{
			$data['result'] = $data['data']->id;
		}
    $this->load->view('bank/result',$data);
  }
  /////////////////// Postdata
  public function add_detailbank() {
  	$data['result'] = $this->Bank_model->add_detailbank();
//  	$data['result'] = 1111;
    $this->load->view('bank/result',$data);
  }
  
  /////////////////// updatebankdetail
  public function updatebankdetail() {
  	$data['result'] = $this->Bank_model->updatebankdetail();
    $this->load->view('bank/result',$data);
  }
  
  /////////////////// updateBanklistAPI
  public function updateBanklistAPI() {
//  	

  	$params = json_decode(file_get_contents('php://input'), TRUE);
//  	$data['result'] = $params['menu'];
  	$data['result'] = $this->Bank_model->updateBanklistAPI($params['menu']);
    $this->load->view('bank/result',$data);
  }



}