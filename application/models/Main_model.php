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
	
  /*
  *
  *  Function  
  *
  * @return
  */



}
