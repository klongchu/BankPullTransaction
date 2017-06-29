<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Loadpost {
    public function __construct() {
        $this->CI = & get_instance();
    }

    public function check_login() {
        if ($this->CI->session->userdata('login_id') == NULL) {
        	$class2 = $this->CI->router->fetch_class();
	        if ($class2 == 'admin' && $this->CI->router->method !='login') {
	            redirect('admin/login', 'refresh');
	            exit();
	        }
            
        }else{

        } 
    }
    ///////////////////////// check_mobile
    public function check_member() {
        if ($this->CI->session->userdata('member_id') == NULL) {
        	$class2 = $this->CI->router->fetch_class();
	        if ($class2 == 'member' && $this->CI->router->method !='login_check') {
	            redirect('front/login', 'refresh');
	            exit();
	        }
            
        }
    }
    ///////////////////////// check_mobile
    public function check_mobile() {
        	$class2 = $this->CI->router->fetch_class();
        	$class3 = $this->CI->router->method;
	        if ($class2 == 'member' && $this->CI->router->method !='profile' )  {
	            $id = $this->CI->session->userdata('member_id');
	            $mobile = $this->CI->db->where('id',$id)->get('tbl_member')->row();
	            if($mobile->id){
		            if ($class2 == 'member' && $class3 !='postdata_member' )  {
			            if ($class2 == 'member' && $class3 !='logout' )  {
				            if($mobile->mobile == '' ){
								redirect('member/profile', 'refresh');
				            	//exit();
							}
						}
					}
				}
	        }
    }
    
 

}
