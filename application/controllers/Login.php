<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('Login_model');
    $this->load->library('pagination');
  }
 
  
  
  public function index() {
    $s_seclect = array('*'); 
    $s_conditions['where'] = array('i_type'=>'1'); 
    $s_order_by = array('id'=>'desc'); 
   /* $data['list_product'] = $this->Main_model->fetch_data("tbl_product",$s_seclect,$s_conditions,$s_order_by);*/
   $data['title'] = "DashBoard";

    $this->load->view('template/header',$data);
    $this->load->view('login/index');
    $this->load->view('template/footer');
  }
  
  public function validlogin()
	{
		if($this->input->server('REQUEST_METHOD') == TRUE){
			if($this->Login_model->record_count($this->input->post('s_username'), $this->input->post('s_password')) == 1)
			{
				$result = $this->Login_model->fetch_user_login($this->input->post('s_username'), $this->input->post('s_password'));
				$this->session->set_userdata(array('member_id'    => $result->id,'s_username'    => $result->s_username,'s_display_name'=> $result->s_display_name));
				
				
				//////////////// Update Total
				
				redirect('');
				
			}
			else
			{
				$this->session->set_flashdata(array('msgerr'=> '<p class="login-box-msg" style="color:red;">ชื่อผู้ใช้หรือรหัสผ่านผิดพลาด!</p>'));
				redirect('login', 'refresh');
			}
		}

	}

	public function logout()
	{
		$this->session->unset_userdata(array('member_id','s_username','s_display_name'));
		redirect('login', 'refresh');
	}
  



}