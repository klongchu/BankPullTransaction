<?php

class Main_model extends CI_Model {

 
  public function __construct() {
    parent::__construct();
  }

 
  /*
  *
  *  Function  
  *
  * @return
  */
  /* ====================================
  ***************** *********************
  ***************** Load all Data *********************
  ***************** *********************
  =======================================*/
  ///////////////////
  public function fetch_data($table,$s_seclect,$s_conditions,$s_order_by) {
  	
	////// Loop Select
	if(isset($s_seclect)){
		foreach($s_seclect as $key=>$value){
			$this->db->select($key,$value);
		}
	}
	////// Loop Conditions
	if(isset($s_conditions)){
		foreach($s_conditions as $key=>$value){
			foreach($value as $keys=>$values){
				if($key == 'like'){
					$this->db->like($keys,$values);
				}else{
					$this->db->where($keys,$values);
				}
			}
		}
	}	
 
	////// Loop Order By
	if(isset($s_order_by)){
		foreach($s_order_by as $key=>$value){
			$this->db->order_by($key,$value);
		}
	}
    
    ////// Query DATA
    $query = $this->db->get($table);
    if($query->num_rows() > 0) {
      foreach($query->result() as $row) {
        $data[] = $row;
      }
      return $data;
    }
    return FALSE;
  }
   
	

	public function row_data($table,$s_seclect,$s_conditions,$s_order_by) {
  	
	////// Loop Select
	if(isset($s_seclect)){
		foreach($s_seclect as $key=>$value){
			$this->db->select($key,$value);
		}
	}
	////// Loop Conditions
	if(isset($s_conditions)){
		foreach($s_conditions as $key=>$value){
			foreach($value as $keys=>$values){
				if($key == 'like'){
					$this->db->like($keys,$values);
				}else{
					$this->db->where($keys,$values);
				}
			}
		}
	}	
 
	////// Loop Order By
	if(isset($s_order_by)){
		foreach($s_order_by as $key=>$value){
			$this->db->order_by($key,$value);
		}
	}
    
    ////// Query DATA
    $query = $this->db->get($table);
    if($query->num_rows() > 0) {
      return $data = $query->row();
    }
    return FALSE;
  }
  
	public function fetch_list_bank(){
		$s_seclect = array('*'); 
		$s_conditions['where'] = array('i_status'=>'1'); 
	  $s_order_by = array('i_index'=>'asc'); 
	  return $this->fetch_data("tbl_bank",$s_seclect,$s_conditions,$s_order_by);
	}
	
	public function online(){
		
$i_member = $this->session->userdata('member_id');
if($i_member < 1){
	return FALSE;
}		
		
$Session_name = "default";
$table = "tbl_useronline"; // ชื่อ Table

if ($Session_name == "default") {
session_start();
}
else {
session_name("$Session_name");
session_start("$Session_name");
}

$SID = session_id();
$time = time();
$dag = date("z");
$nu = time()-10; // Keep for 5 mins


 
 
$this->db->select("*");
$this->db->where("SID",$SID);
$this->db->where("i_member",$i_member);
$query = $this->db->get($table);
$sid_check = $query->num_rows();

$data['time'] = $time;
if ($sid_check == "0") {
$data['i_member'] = $i_member;
$data['SID'] = $SID;
$data['day'] = $dag;
$this->db->insert($table, $data);
} else {
$this->db->update($table, $data, array('i_member'=> $i_member ,'SID'=> $SID));
}


 
$this->db->select("*");
$this->db->where("time > ",$nu);
$this->db->where("day  ",$dag);
$this->db->group_by("i_member  ");
$query = $this->db->get($table);
$users_online = $query->num_rows();

$this->db->where('time < ',$nu);   
$this->db->delete($table);

$this->db->where('day != '.$dag);   
$this->db->delete($table);


return $users_online ; // echo จำนวนผู้ online ออกมาก


 



 
	}

public function count_online($id){

$table = "tbl_useronline"; // ชื่อ Table
$this->db->where("i_member",$id);
$query = $this->db->get($table);
return $sid_check = $query->num_rows();
 
	}
	
  /*
  *
  *  Function  
  *
  * @return
  */



}
