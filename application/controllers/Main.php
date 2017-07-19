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
  
  
  public function online() {
 
	  $data['result'] = $this->Main_model->online();

    $this->load->view('bank/result',$data);
  }
  



}