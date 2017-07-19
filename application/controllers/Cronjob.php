<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');
class Cronjob extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('Cronjob_model');
    $this->load->library('pagination');
  }
 
  
  
  public function index() {

   echo $data['list_product'] = $this->Cronjob_model->update();

  }
  
 
  
 


}