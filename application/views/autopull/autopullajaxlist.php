<?php
$s_seclect = array('*'); 
$s_conditions['where'] = array('i_status'=>1 , 'i_bank <> 3'); 
$s_order_by = array('id'=>'desc'); 
$bank = $this->Main_model->fetch_data("tbl_bank_list",$s_seclect,$s_conditions,$s_order_by);
?>

            	<?php
            	foreach($bank as $bank_list){
$s_seclect = array('*'); 
$s_conditions['where'] = array('id'=>$bank_list->i_bank ); 
$s_order_by = array('id'=>'desc'); 
$bank_main = $this->Main_model->row_data("tbl_bank",$s_seclect,$s_conditions,$s_order_by);
							?>				
              
 
                        <div class="col-sm-4">
                          <div class="element-box el-tablo">
                          
                          
                          <div class="users-list-w  ">
									   <a href="<?=base_url('bank/detailauto/'.$bank_list->id);?>" style="text-decoration: none;" target="_blank">
									   <div class="user-w with-status status-green">
									      <div class="user-avatar-w">
									         <div class="user-avatar"><?=img('uploads/bank/'.$bank_main->s_icon.'','50');?></div>
									      </div>
									      <div class="user-name">
									         <h6 class="user-title"><?=$bank_list->s_account_name;?></h6>
									         <div class="user-role"><?=$bank_list->s_account_no;?></div>
									      </div>
									      <div class="user-action">
									         <div class="os-icon os-icon-coins4"></div>
									      </div>
									   	</div>
									   	</a>
									   	<div class="label">อัพเดตล่าสุด <span id="d_lastpull<?=$bank_list->id;?>"><?=$bank_list->d_lastpull;?></span></div>
                            <div class="value" id="total_balance<?=$bank_list->id;?>" style=" font-weight: bold;">0 THB</div>
										</div>
                            
 
                            
                          </div>
                        </div>
  
                      
<?php
$bank_name = strtolower($bank_main->s_name);
?> 
	<script>
 		ajax_run('<?=$bank_list->id;?>','<?=$bank_name;?>');
	</script>
          
            	<?php
							}
            	?>
            	
            