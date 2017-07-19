<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Loadpost {
    public function __construct() {
        $this->CI = & get_instance();
 
    }

 
    ///////////////////////// check_member
    public function check_member() {
        if ($this->CI->session->userdata('member_id') == NULL) {
        	$class = $this->CI->router->fetch_class();
	        if ($class !='login') {
	            if($class !='cronjob'){
								redirect('login', 'refresh');
	            	exit();
							} 
	        }else{
						
					}
            
        }
    }
    
    public function check_online() {
        
    }
 
    
 

}
