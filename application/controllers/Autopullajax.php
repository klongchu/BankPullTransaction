<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');
class Autopullajax extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('Autopull_model');
    $this->load->library('pagination');
  }
 
  
  
  public function index() {

   	$this->load->view('template/header');
    $this->load->view('autopull/autopullajax');
    $this->load->view('template/footer');

  }
  
  public function ajax_run() {

   

  }
  
  
  /////////////////// add_detailbank
  public function add_detailbank() {
  	$data['result'] = $this->Autopull_model->add_detailbank();
//  	$data['result'] = 1111;
    $this->load->view('bank/result',$data);
  }
  
   /////////////////// updatebankdetail
  public function updatebankdetail() {
  	$data['result'] = $this->Autopull_model->updatebankdetail();
    $this->load->view('bank/result',$data);
  }
  
 
  
 


}