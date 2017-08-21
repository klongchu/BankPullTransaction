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

    $class = $this->router->fetch_class();
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
				$session_arr['member_id'] = $result->id;
				$session_arr['s_username'] = $result->s_username;
				$session_arr['s_display_name'] = $result->s_display_name;
				$session_arr['i_level'] = $result->i_level;
				$this->session->set_userdata($session_arr);
				
				
				//////////////// Update Total
				
				//redirect('?ls=1');
				//@header('Location: '.$_SERVER['HTTP_REFERER'].'?ls=1');
				?>
				<script>
					//location.replace("<?=$_SERVER['SERVER_NAME'].'/?ls=1';?>")
					//location.replace("?ls=1")
				</script>
				<meta http-equiv="refresh" content="0;url=<?=base_url('?ls=1');?>" />
				<?php
				
			}
			else
			{
				$this->session->set_flashdata(array('msgerr'=> '<p class="login-box-msg" style="color:red;">ชื่อผู้ใช้หรือรหัสผ่านผิดพลาด!</p>'));
				//redirect('login', 'refresh');
				?>
				<script>
					//location.replace("<?=$_SERVER['SERVER_NAME'].'/login';?>")
					//location.replace("");
				</script>
				<meta http-equiv="refresh" content="0;url=<?=base_url('login');?>" />
				<?php
			}
		}

	}
	
	
	public function check_username()
	{
		if($this->input->server('REQUEST_METHOD') == TRUE){
			if($this->Login_model->record_count($this->input->post('s_username')) == 1)
			{
				echo 1;	
			}
			else
			{
				echo 0;
			}
		}

	}
	
	public function check_password()
	{
		if($this->input->server('REQUEST_METHOD') == TRUE){
			if($this->Login_model->record_count($this->input->post('s_username'), $this->input->post('s_password')) == 1)
			{
				echo 1;	
			}
			else
			{
				echo 0;
			}
		}

	}

	public function logout()
	{
		$this->session->unset_userdata(array('member_id','s_username','s_display_name','i_level'));
		//echo "aaaa";
		//redirect('login', 'refresh');
		?>
				<script>
					//location.replace("");
				</script>
				<meta http-equiv="refresh" content="0;url=<?=base_url('login');?>" />
				<?php
	}
  
  
 


}