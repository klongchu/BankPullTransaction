<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');
class Cronjob extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('Cronjob_model');
    $this->load->model('Bank_model');
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
  
  
  /////////////////// Postdata
  public function add_detailbank() {
  	$data['result'] = $this->Cronjob_model->add_detailbank();
//  	$data['result'] = 1111;
    $this->load->view('bank/result',$data);
  }
  
   /////////////////// updatebankdetail
  public function updatebankdetail() {
  	$data['result'] = $this->Bank_model->updatebankdetail();
    $this->load->view('bank/result',$data);
  }
  
 
  
 


}