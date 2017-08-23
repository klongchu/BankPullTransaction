<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');
class Cronjob extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('Cronjob_model');
    $this->load->model('Bank_model');
    $this->load->model('Autopull_model');
    $this->load->library('pagination');
  }
 
  
  
  public function index() {

   echo $data['list_product'] = $this->Cronjob_model->update();

  }
  
  public function ajax_run() {

   $this->load->view('template/header');
    $this->load->view('cronjob/ajax_run');
    $this->load->view('template/footer');

  }
  
  public function ajax_run_list() {


    $this->load->view('autopull/autopullajaxlist');


  }
  
  
  public function loadtransaction() {
//$timestamp = strtotime('H') - 1;
$timestamp = strtotime('-1 minutes');
$before_1hr = date('Y-m-d H:i:s', $timestamp);

$id = $this->input->post('id');
$bank_name = $this->input->post('bank_name');
$s_seclect = array('*'); 
    $s_conditions['where'] = array('i_bank_list'=>$id,'d_create >='=>$before_1hr); 
    $s_order_by = array('d_datetime'=>'desc'); 
  	$data['transaction'] = $this->Main_model->fetch_data("tbl_autopull_transaction_".$bank_name,$s_seclect,$s_conditions,$s_order_by);
    $this->load->view('cronjob/loadtransaction',$data);
    $update_read['i_read'] = 1;
    $this->db->update("tbl_autopull_transaction_".$bank_name, $update_read, array('i_bank_list'=> $id));


  }
  
  
    public function loadtransactionall() {
//$timestamp = strtotime('H') - 1;
$timestamp = strtotime('-1 minutes');
$before_1hr = date('Y-m-d H:i:s', $timestamp);

$id = $this->input->post('id');
$bank_name = $this->input->post('bank_name');
$s_seclect = array('*'); 
    $s_conditions['where'] = array('i_bank_list'=>$id); 
    $s_order_by = array('d_datetime'=>'desc'); 
  	$data['transaction'] = $this->Main_model->fetch_data("tbl_autopull_transaction_".$bank_name,$s_seclect,$s_conditions,$s_order_by);
    $this->load->view('cronjob/loadtransaction',$data);
    $update_read['i_read'] = 1;
    $this->db->update("tbl_autopull_transaction_".$bank_name, $update_read, array('i_bank_list'=> $id));


  }
  
  
  public function loadbalance() {
$id = $this->input->post('id');
$bank_name = $this->input->post('bank_name');
 
$table = "tbl_autopull";
$this->db->where('i_bank_list',$id);
$this->db->order_by('id','desc');
$query = $this->db->get($table);
    if($query->num_rows() > 0) {
      $transaction = $query->row();
    }

$data['d_now'] =  $transaction->d_create;
$data['i_balance'] =  $transaction->i_balance." THB";;
  
echo json_encode($data);

  }
  
  
  /////////////////// posterror
  public function posterror() {
  	$id = $this->input->post('i_bank_list');
  	$s_seclect = array('*'); 
    $s_conditions['where'] = array('id'=>$id); 
    //$s_order_by = array('id'=>'desc'); 
  	$bank_list = $this->Main_model->row_data("tbl_bank_list",$s_seclect,$s_conditions,$s_order_by);
  	
  	$s_seclect = array('*'); 
    $s_conditions['where'] = array('id'=>$bank_list->i_bank); 
    //$s_order_by = array('id'=>'desc'); 
  	$bank = $this->Main_model->row_data("tbl_bank",$s_seclect,$s_conditions,$s_order_by);
  	
  	$post_bl[s_account_no] = $bank_list->s_account_no;
  	$post_bl[s_account_name] = $bank_list->s_account_name;
  	$post_bl[i_bank] = $bank_list->i_bank;
  	$post_bl[s_bank] = $bank->s_name;
  	
  	$data['result'] = $this->Cronjob_model->posterror($post_bl);
//  	$data['result'] = 1111;
    $this->load->view('bank/result',$data);
  }
  
    /////////////////// Postdata
  public function add_detailbank() {
  	$data['result'] = $this->Cronjob_model->add_detailbank();
//  	$data['result'] = 1111;
    $this->load->view('bank/result',$data);
  }
  
  /**
	* ********** Update Bank Follow Ban
	*/
  /////////////////// add_detailbankauto
  public function add_detailbankauto() {
  	$id = $this->input->post('i_bank');
  	if($id > 0){
	  	$data['result'] = $this->Autopull_model->add_detailbankauto();
	    $this->load->view('bank/result',$data);
		}else{
			$data['result'] = "Failed";
	    $this->load->view('bank/result',$data);
		}
  }
  
  
  
   /////////////////// updatebankdetail
  public function updatebankdetail() {
  	$data['result'] = $this->Bank_model->updatebankdetail();
    $this->load->view('bank/result',$data);
  }
  
  /////////////////// updatebankdetail
  public function updatebankdetailauto() {
  	$data['result'] = $this->Autopull_model->updatebankdetailauto();
    $this->load->view('bank/result',$data);
  }
  
 
  
 


}