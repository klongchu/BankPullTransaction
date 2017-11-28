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
	
	public function fetch_list_bank_find(){
$count_bank = count($_POST['i_bank_list']);
if($count_bank > 0){
$andsqlbank = " and ( ";
for($i=0;$i<$count_bank;$i++){
	
	$i_bank_list = $_POST['i_bank_list'][$i];
	$andsqlbank .= "t.i_bank_list = '".$i_bank_list."' or ";	
$last_ibank = $i_bank_list;
}
 $andsqlbank .= "t.i_bank_list = '".$last_ibank."' )";			
}

//$andsqlbank = "";
		  	$strSql = "";
$strSql .= "SELECT ";
$strSql .= "    t.*, ";
$strSql .= "    b.id as b_id, ";
$strSql .= "    b.s_name as bank_name ";
$strSql .= "FROM ";
$strSql .= "    ( ";
$strSql .= "    SELECT ";
$strSql .= "        'BAY' s_bank, ";
$strSql .= "        id, ";
$strSql .= "        i_bank_list, ";
$strSql .= "        d_datetime, ";
$strSql .= "        s_info, ";
$strSql .= "        i_out, ";
$strSql .= "        i_in, ";
$strSql .= "        i_posted, ";
$strSql .= "        i_read, ";
$strSql .= "        s_channel, ";
$strSql .= "        i_status, ";
$strSql .= "        s_remark ";
$strSql .= "    FROM ";
$strSql .= "        tbl_autopull_transaction_bay ";
$strSql .= "    UNION ";
$strSql .= "SELECT ";
$strSql .= "    'BBL' s_bank, ";
$strSql .= "    id, ";
$strSql .= "    i_bank_list, ";
$strSql .= "    d_datetime, ";
$strSql .= "    s_info, ";
$strSql .= "    i_out, ";
$strSql .= "    i_in, ";
$strSql .= "    i_posted, ";
$strSql .= "    i_read, ";
$strSql .= "    s_channel, ";
$strSql .= "    i_status, ";
$strSql .= "    s_remark ";
$strSql .= "FROM ";
$strSql .= "    tbl_autopull_transaction_bbl ";
$strSql .= "UNION ";
$strSql .= "SELECT ";
$strSql .= "    'KBANK' s_bank, ";
$strSql .= "    id, ";
$strSql .= "    i_bank_list, ";
$strSql .= "    d_datetime, ";
$strSql .= "    s_info, ";
$strSql .= "    i_out, ";
$strSql .= "    i_in, ";
$strSql .= "    i_posted, ";
$strSql .= "    i_read, ";
$strSql .= "    s_channel, ";
$strSql .= "    i_status, ";
$strSql .= "    s_remark ";
$strSql .= "FROM ";
$strSql .= "    tbl_autopull_transaction_kbank ";
$strSql .= "UNION ";
$strSql .= "SELECT ";
$strSql .= "    'KTB' s_bank, ";
$strSql .= "    id, ";
$strSql .= "    i_bank_list, ";
$strSql .= "    d_datetime, ";
$strSql .= "    s_info, ";
$strSql .= "    i_out, ";
$strSql .= "    i_in, ";
$strSql .= "    i_posted, ";
$strSql .= "    i_read, ";
$strSql .= "    s_channel, ";
$strSql .= "    i_status, ";
$strSql .= "    s_remark ";
$strSql .= "FROM ";
$strSql .= "    tbl_autopull_transaction_ktb ";
$strSql .= "UNION ";
$strSql .= "SELECT ";
$strSql .= "    'SCB' s_bank, ";
$strSql .= "    id, ";
$strSql .= "    i_bank_list, ";
$strSql .= "    d_datetime, ";
$strSql .= "    s_info, ";
$strSql .= "    i_out, ";
$strSql .= "    i_in, ";
$strSql .= "    i_posted, ";
$strSql .= "    i_read, ";
$strSql .= "    s_channel, ";
$strSql .= "    i_status, ";
$strSql .= "    s_remark ";
$strSql .= "FROM ";
$strSql .= "    tbl_autopull_transaction_scb ";
$strSql .= "UNION ";
$strSql .= "SELECT ";
$strSql .= "    'TMB' s_bank, ";
$strSql .= "    id, ";
$strSql .= "    i_bank_list, ";
$strSql .= "    d_datetime, ";
$strSql .= "    s_info, ";
$strSql .= "    i_out, ";
$strSql .= "    i_in, ";
$strSql .= "    i_posted, ";
$strSql .= "    i_read, ";
$strSql .= "    s_channel, ";
$strSql .= "    i_status, ";
$strSql .= "    s_remark ";
$strSql .= "FROM ";
$strSql .= "    tbl_autopull_transaction_tmb ";
$strSql .= "UNION ";
$strSql .= "SELECT ";
$strSql .= "    'TrueWallet' s_bank, ";
$strSql .= "    id, ";
$strSql .= "    i_bank_list, ";
$strSql .= "    d_datetime, ";
$strSql .= "    s_info, ";
$strSql .= "    i_out, ";
$strSql .= "    i_in, ";
$strSql .= "    i_posted, ";
$strSql .= "    i_read, ";
$strSql .= "    s_channel, ";
$strSql .= "    i_status, ";
$strSql .= "    s_remark ";
$strSql .= "FROM ";
$strSql .= "    tbl_autopull_transaction_truewallet ";
$strSql .= ") t, ";
$strSql .= "( ";
$strSql .= "SELECT ";
$strSql .= "    bl.id, ";
$strSql .= "    bl.s_account_no, ";
$strSql .= "    bl.s_account_name, ";
$strSql .= "    b.s_name, ";
$strSql .= "    b.s_fname_th, ";
$strSql .= "    b.s_fname_en, ";
$strSql .= "    b.s_icon, ";
$strSql .= "    b.s_url, ";
$strSql .= "    b.s_js ";
$strSql .= "FROM ";
$strSql .= "    tbl_bank_list bl, ";
$strSql .= "    tbl_bank b ";
$strSql .= "WHERE ";
$strSql .= "    bl.i_bank = b.id ";
$strSql .= ") b ";
$strSql .= "WHERE ";
$strSql .= "    t.i_bank_list = b.id ";
$strSql .= $andsqlbank;
$strSql .= "ORDER BY ";
$strSql .= "    t.d_datetime DESC ";

return $this->db->query($strSql)->result();



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
