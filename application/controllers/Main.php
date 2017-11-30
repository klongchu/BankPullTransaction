<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Main extends CI_Controller {

  public function __construct() {
    parent::__construct();
//    $this->load->model('Main_model');
    $this->load->library('pagination');
  }
 
  
  
  public function index() {
    $s_seclect = array('*'); 
    $s_conditions['where'] = array('i_type'=>'1'); 
    $s_order_by = array('id'=>'desc'); 
   /* $data['list_product'] = $this->Main_model->fetch_data("tbl_product",$s_seclect,$s_conditions,$s_order_by);*/
   $data['title'] = "DashBoard"; 
	  $data['each_bank'] = $this->Main_model->fetch_list_bank();
    $this->load->view('template/header',$data);
    $this->load->view('main/index');
    $this->load->view('template/footer');
  }
  
  public function multiple() {
    $s_seclect = array('*'); 
    $s_conditions['where'] = array('i_type'=>'1'); 
    $s_order_by = array('id'=>'desc'); 
   /* $data['list_product'] = $this->Main_model->fetch_data("tbl_product",$s_seclect,$s_conditions,$s_order_by);*/
   $data['title'] = "Multiple Bank"; 
	  $data['each_bank'] = $this->Main_model->fetch_list_bank();
    $this->load->view('template/header',$data);
    $this->load->view('main/multiple');
    $this->load->view('template/footer');
  }
  
  public function pickbank() {
    $s_seclect = array('*'); 
    $s_conditions['where'] = array('i_type'=>'1'); 
    $s_order_by = array('id'=>'desc'); 
   /* $data['list_product'] = $this->Main_model->fetch_data("tbl_product",$s_seclect,$s_conditions,$s_order_by);*/
   $data['title'] = "Pick Bank"; 
	  $data['each_bank'] = $this->Main_model->fetch_list_bank_find();

$count_bank = count($_POST['i_bank_list']);
if($count_bank > 0){
$andsqlbank = " and ( ";
for($i=0;$i<$count_bank;$i++){
	
	$i_bank_list = $_POST['i_bank_list'][$i];
	$andsqlbank .= "t.i_bank_list = '".$i_bank_list."' or ";	
$last_ibank = $i_bank_list;
}
 $andsqlbank .= "t.i_bank_list = '".$last_ibank."' )";			
}

 


$data['andsqlbank'] = $andsqlbank;
	  
    $this->load->view('template/header',$data);
    $this->load->view('main/multiple_find');
    $this->load->view('template/footer');
  }
  
  
  /////////////////// Detail auto
  public function detailautoall_new_find($id) {
  	
  	
 $timestamp = strtotime('-1 minutes');
$before_1hr = date('Y-m-d H:i:s', $timestamp);

if($_POST[data]){
	$andsqlbank = $_POST[data];
} 
  	

 	
  	$strSql = "";
$strSql .= "SELECT ";
$strSql .= "    t.*, ";
$strSql .= "    b.id as b_id, ";
$strSql .= "    b.s_account_no as bl_s_account_no, ";
$strSql .= "    b.s_icon as b_s_icon, ";
$strSql .= "    b.s_name as bank_name ";
$strSql .= "FROM ";
$strSql .= "    ( ";
$strSql .= "    SELECT ";
$strSql .= "        'BAY' s_bank, ";
$strSql .= "        id, ";
$strSql .= "        i_bank_list, ";
$strSql .= "        d_datetime, ";
$strSql .= "        s_info, ";
$strSql .= "        i_out, ";
$strSql .= "        i_in, ";
$strSql .= "        i_posted, ";
$strSql .= "        i_read, ";
$strSql .= "        s_channel, ";
$strSql .= "        i_status, ";
$strSql .= "        s_remark ";
$strSql .= "    FROM ";
$strSql .= "        tbl_autopull_transaction_bay ";
$strSql .= "    UNION ";
$strSql .= "SELECT ";
$strSql .= "    'BBL' s_bank, ";
$strSql .= "    id, ";
$strSql .= "    i_bank_list, ";
$strSql .= "    d_datetime, ";
$strSql .= "    s_info, ";
$strSql .= "    i_out, ";
$strSql .= "    i_in, ";
$strSql .= "    i_posted, ";
$strSql .= "    i_read, ";
$strSql .= "    s_channel, ";
$strSql .= "    i_status, ";
$strSql .= "    s_remark ";
$strSql .= "FROM ";
$strSql .= "    tbl_autopull_transaction_bbl ";
$strSql .= "UNION ";
$strSql .= "SELECT ";
$strSql .= "    'KBANK' s_bank, ";
$strSql .= "    id, ";
$strSql .= "    i_bank_list, ";
$strSql .= "    d_datetime, ";
$strSql .= "    s_info, ";
$strSql .= "    i_out, ";
$strSql .= "    i_in, ";
$strSql .= "    i_posted, ";
$strSql .= "    i_read, ";
$strSql .= "    s_channel, ";
$strSql .= "    i_status, ";
$strSql .= "    s_remark ";
$strSql .= "FROM ";
$strSql .= "    tbl_autopull_transaction_kbank ";
$strSql .= "UNION ";
$strSql .= "SELECT ";
$strSql .= "    'KTB' s_bank, ";
$strSql .= "    id, ";
$strSql .= "    i_bank_list, ";
$strSql .= "    d_datetime, ";
$strSql .= "    s_info, ";
$strSql .= "    i_out, ";
$strSql .= "    i_in, ";
$strSql .= "    i_posted, ";
$strSql .= "    i_read, ";
$strSql .= "    s_channel, ";
$strSql .= "    i_status, ";
$strSql .= "    s_remark ";
$strSql .= "FROM ";
$strSql .= "    tbl_autopull_transaction_ktb ";
$strSql .= "UNION ";
$strSql .= "SELECT ";
$strSql .= "    'SCB' s_bank, ";
$strSql .= "    id, ";
$strSql .= "    i_bank_list, ";
$strSql .= "    d_datetime, ";
$strSql .= "    s_info, ";
$strSql .= "    i_out, ";
$strSql .= "    i_in, ";
$strSql .= "    i_posted, ";
$strSql .= "    i_read, ";
$strSql .= "    s_channel, ";
$strSql .= "    i_status, ";
$strSql .= "    s_remark ";
$strSql .= "FROM ";
$strSql .= "    tbl_autopull_transaction_scb ";
$strSql .= "UNION ";
$strSql .= "SELECT ";
$strSql .= "    'TMB' s_bank, ";
$strSql .= "    id, ";
$strSql .= "    i_bank_list, ";
$strSql .= "    d_datetime, ";
$strSql .= "    s_info, ";
$strSql .= "    i_out, ";
$strSql .= "    i_in, ";
$strSql .= "    i_posted, ";
$strSql .= "    i_read, ";
$strSql .= "    s_channel, ";
$strSql .= "    i_status, ";
$strSql .= "    s_remark ";
$strSql .= "FROM ";
$strSql .= "    tbl_autopull_transaction_tmb ";
$strSql .= "UNION ";
$strSql .= "SELECT ";
$strSql .= "    'TrueWallet' s_bank, ";
$strSql .= "    id, ";
$strSql .= "    i_bank_list, ";
$strSql .= "    d_datetime, ";
$strSql .= "    s_info, ";
$strSql .= "    i_out, ";
$strSql .= "    i_in, ";
$strSql .= "    i_posted, ";
$strSql .= "    i_read, ";
$strSql .= "    s_channel, ";
$strSql .= "    i_status, ";
$strSql .= "    s_remark ";
$strSql .= "FROM ";
$strSql .= "    tbl_autopull_transaction_truewallet ";
$strSql .= ") t, ";
$strSql .= "( ";
$strSql .= "SELECT ";
$strSql .= "    bl.id, ";
$strSql .= "    bl.s_account_no, ";
$strSql .= "    bl.s_account_name, ";
$strSql .= "    b.s_name, ";
$strSql .= "    b.s_fname_th, ";
$strSql .= "    b.s_fname_en, ";
$strSql .= "    b.s_icon, ";
$strSql .= "    b.s_url, ";
$strSql .= "    b.s_js ";
$strSql .= "FROM ";
$strSql .= "    tbl_bank_list bl, ";
$strSql .= "    tbl_bank b ";
$strSql .= "WHERE ";
$strSql .= "    bl.i_bank = b.id ";
$strSql .= ") b ";
$strSql .= "WHERE ";
$strSql .= "    d_create >='$before_1hr' ";
$strSql .= "    and t.i_bank_list = b.id ";
$strSql .= $andsqlbank;
$strSql .= "ORDER BY ";
$strSql .= "    t.d_datetime DESC ";

 	
 
  	
   	$data['transaction'] = $this->db->query($strSql)->result();
 
   	$data['bank_name'] = $before_1hr;
    
    //$this->load->view('template/header',$data);
    $this->load->view('bank/detailauto1',$data);
    //$this->load->view('template/footer');
  }
  
  /////////////////// Detail auto
  public function detailautoalls_new_find($id) {
  	
if($_POST[sql_i_bank_list] > 0){
	$andsqlbank = " and t.i_bank_list = '".$_POST[sql_i_bank_list]."' ";
}
if($_POST[andsqlbank] != ''){
	$andsqlbank = $_POST[andsqlbank];
} 
$i_dayback = "-".$_POST[sql_day_back];  	
$timestamp = strtotime($i_dayback.' days');
$dayback = date('Y-m-d H:i:s', $timestamp);
$daynow = date('Y-m-d H:i:s');
 	
  	$strSql = "";
$strSql .= "SELECT ";
$strSql .= "    t.*, ";
$strSql .= "    b.s_account_no as bl_s_account_no, ";
$strSql .= "    b.s_icon as b_s_icon, ";
$strSql .= "    b.id as b_id, ";
$strSql .= "    b.s_name as bank_name ";
$strSql .= "FROM ";
$strSql .= "    ( ";
$strSql .= "    SELECT ";
$strSql .= "        'BAY' s_bank, ";
$strSql .= "        id, ";
$strSql .= "        i_bank_list, ";
$strSql .= "        d_datetime, ";
$strSql .= "        s_info, ";
$strSql .= "        i_out, ";
$strSql .= "        i_in, ";
$strSql .= "        i_posted, ";
$strSql .= "        i_read, ";
$strSql .= "        s_channel, ";
$strSql .= "        i_status, ";
$strSql .= "        s_remark ";
$strSql .= "    FROM ";
$strSql .= "        tbl_autopull_transaction_bay ";
$strSql .= "    UNION ";
$strSql .= "SELECT ";
$strSql .= "    'BBL' s_bank, ";
$strSql .= "    id, ";
$strSql .= "    i_bank_list, ";
$strSql .= "    d_datetime, ";
$strSql .= "    s_info, ";
$strSql .= "    i_out, ";
$strSql .= "    i_in, ";
$strSql .= "    i_posted, ";
$strSql .= "    i_read, ";
$strSql .= "    s_channel, ";
$strSql .= "    i_status, ";
$strSql .= "    s_remark ";
$strSql .= "FROM ";
$strSql .= "    tbl_autopull_transaction_bbl ";
$strSql .= "UNION ";
$strSql .= "SELECT ";
$strSql .= "    'KBANK' s_bank, ";
$strSql .= "    id, ";
$strSql .= "    i_bank_list, ";
$strSql .= "    d_datetime, ";
$strSql .= "    s_info, ";
$strSql .= "    i_out, ";
$strSql .= "    i_in, ";
$strSql .= "    i_posted, ";
$strSql .= "    i_read, ";
$strSql .= "    s_channel, ";
$strSql .= "    i_status, ";
$strSql .= "    s_remark ";
$strSql .= "FROM ";
$strSql .= "    tbl_autopull_transaction_kbank ";
$strSql .= "UNION ";
$strSql .= "SELECT ";
$strSql .= "    'KTB' s_bank, ";
$strSql .= "    id, ";
$strSql .= "    i_bank_list, ";
$strSql .= "    d_datetime, ";
$strSql .= "    s_info, ";
$strSql .= "    i_out, ";
$strSql .= "    i_in, ";
$strSql .= "    i_posted, ";
$strSql .= "    i_read, ";
$strSql .= "    s_channel, ";
$strSql .= "    i_status, ";
$strSql .= "    s_remark ";
$strSql .= "FROM ";
$strSql .= "    tbl_autopull_transaction_ktb ";
$strSql .= "UNION ";
$strSql .= "SELECT ";
$strSql .= "    'SCB' s_bank, ";
$strSql .= "    id, ";
$strSql .= "    i_bank_list, ";
$strSql .= "    d_datetime, ";
$strSql .= "    s_info, ";
$strSql .= "    i_out, ";
$strSql .= "    i_in, ";
$strSql .= "    i_posted, ";
$strSql .= "    i_read, ";
$strSql .= "    s_channel, ";
$strSql .= "    i_status, ";
$strSql .= "    s_remark ";
$strSql .= "FROM ";
$strSql .= "    tbl_autopull_transaction_scb ";
$strSql .= "UNION ";
$strSql .= "SELECT ";
$strSql .= "    'TMB' s_bank, ";
$strSql .= "    id, ";
$strSql .= "    i_bank_list, ";
$strSql .= "    d_datetime, ";
$strSql .= "    s_info, ";
$strSql .= "    i_out, ";
$strSql .= "    i_in, ";
$strSql .= "    i_posted, ";
$strSql .= "    i_read, ";
$strSql .= "    s_channel, ";
$strSql .= "    i_status, ";
$strSql .= "    s_remark ";
$strSql .= "FROM ";
$strSql .= "    tbl_autopull_transaction_tmb ";
$strSql .= "UNION ";
$strSql .= "SELECT ";
$strSql .= "    'TrueWallet' s_bank, ";
$strSql .= "    id, ";
$strSql .= "    i_bank_list, ";
$strSql .= "    d_datetime, ";
$strSql .= "    s_info, ";
$strSql .= "    i_out, ";
$strSql .= "    i_in, ";
$strSql .= "    i_posted, ";
$strSql .= "    i_read, ";
$strSql .= "    s_channel, ";
$strSql .= "    i_status, ";
$strSql .= "    s_remark ";
$strSql .= "FROM ";
$strSql .= "    tbl_autopull_transaction_truewallet ";
$strSql .= ") t, ";
$strSql .= "( ";
$strSql .= "SELECT ";
$strSql .= "    bl.id, ";
$strSql .= "    bl.s_account_no, ";
$strSql .= "    bl.s_account_name, ";
$strSql .= "    b.s_name, ";
$strSql .= "    b.s_fname_th, ";
$strSql .= "    b.s_fname_en, ";
$strSql .= "    b.s_icon, ";
$strSql .= "    b.s_url, ";
$strSql .= "    b.s_js ";
$strSql .= "FROM ";
$strSql .= "    tbl_bank_list bl, ";
$strSql .= "    tbl_bank b ";
$strSql .= "WHERE ";
$strSql .= "    bl.i_bank = b.id ";
$strSql .= ") b ";
$strSql .= "WHERE ";
$strSql .= "    t.i_bank_list = b.id ";
$strSql .= "   and t.d_datetime >=  '".$dayback."' ";
//$strSql .= "   and (t.d_datetime BETWEEN  '".$dayback."' AND '".$daynow."') ";
$strSql .= $andsqlbank;
$strSql .= "ORDER BY ";
$strSql .= "    t.d_datetime DESC ";
  
//inner join tb_bank_list as tbl on tbl.id = t.i_bank_list
//inner join tb_bank as tb on tb.id = tbl.i_bank
  	
   	$data['transaction'] = $this->db->query($strSql)->result();
 
   	$data['bank_name'] = $before_1hr;
   	$data['andsqlbank'] = $andsqlbank;
    
    //$this->load->view('template/header',$data);
    $this->load->view('bank/detailauto1',$data);
    //$this->load->view('template/footer');
  }
  
  
  
  public function online() {
 
	  $data['result'] = $this->Main_model->online();

    $this->load->view('bank/result',$data);
  }
  



}