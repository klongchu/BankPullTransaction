<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Bank extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->library('pagination');
  }
 
  
  
  public function name($id) {
  	$s_seclect = array('*'); 
    $s_conditions['where'] = array('id'=>$id); 
    $s_order_by = array('id'=>'desc'); 
  	$data['result'] = $this->Main_model->row_data("tbl_bank",$s_seclect,$s_conditions,$s_order_by);
   $data['title'] = $data['result']->s_name;
    $this->load->view('template/header',$data);
    $this->load->view('bank/index');
    $this->load->view('template/footer');
  }

  



}