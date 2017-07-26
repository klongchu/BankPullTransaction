<div class="content-w">
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?=base_url();?>">Home</a></li>
            <li class="breadcrumb-item"><span><?=$title;?></span></li>
          </ul>
          <!--<div class="content-panel-toggler"><i class="os-icon os-icon-grid-squares-22"></i><span>Sidebar</span></div>-->
          <div class="content-i">
            <div class="content-box">
            	<?php
            	foreach($each_bank as $data){
							?>				
              <div class="row">
                <div class="col-sm-12">
                  <div class="element-wrapper">
                    <div class="users-list-w element-header">
									   <a href="<?=base_url('bank/name/'.$data->id);?>" style="text-decoration: none;">
									   <div class="user-w with-status status-green">
									      <div class="user-avatar-w">
									         <div class="user-avatar"><?=img('uploads/bank/'.$data->s_icon.'','50');?></div>
									      </div>
									      <div class="user-name">
									         <h6 class="user-title"><?=$data->s_name;?> Dashboard</h6>
									         <div class="user-role"><?=$data->s_fname_en;?></div>
									      </div>
									      <div class="user-action">
									         <div class="os-icon os-icon-coins4"></div>
									      </div>
									   	</div>
									   	</a>
										</div>
 
                    <div class="element-content">
                      <div class="row">
                      <?php
                      $i_bank = $data->id;
  	$s_seclect = array('id'); 
    $s_conditions['where'] = array("i_bank"=>$i_bank); 
    $s_order_by = array('id'=>'desc'); 
  	$bank_list_q = $this->Main_model->fetch_data("tbl_bank_list",$s_seclect,$s_conditions,$s_order_by);
 $level_member = $this->session->userdata('i_level');
 if($bank_list_q){
 	foreach($bank_list_q as $data){

                      ?>
                        <div class="col-sm-4">
                        <div align="right" style="    
    position: absolute;
    right: 22px;
    top: 3px;">
                            	<?php
                      if($level_member == 1){
                      ?>
                      <?php
                            $i_status_btn = ($data->i_status == 1 ? "btn-primary":"btn-warning");
                            $i_status_txt = ($data->i_status == 1 ? "Auto":"Manual");
                            ?>
                            <?php
                            if($data->i_bank != 3){
                            ?>
                            <button type="button" class="btn btn-sm <?=$i_status_btn;?>  btnStatusBank"   data-id="<?=$data->id;?>"  style="cursor: pointer;     "   ><?=$i_status_txt?></button>
                            <?php } ?>
                      <?php } ?>
                            </div>
                          <div class="element-box el-tablo">
                          
                            
                            <div class="label">
                            <table width="100%">
                            	<tr>
                            		<td>อัพเดตล่าสุด <?=$data->d_lastpull;?></td>
                            		<td align="right">
                            			
                            		</td>
                            	</tr>
                            </table>
                            
                            
                            	
                            </div>
                            <div class="value"><?=$data->s_account_name;?> <br /> 
                            <!--<?=$data->s_account_no;?> --> 
                            <?php
                            $bank_no = explode("-",$data->s_account_no);
                            $bank_no2 = substr($bank_no[2],-4);
                            ?>
                            xxx-x-x<?=$bank_no2;?>-<?=$bank_no[3];?> 
                            </div>
                            <br />
                            <?php
                            $i_status_url = ($data->i_status == 1 ? "detailauto":"detail");
                            ?>
                            <button type="button" class="btn btn-sm btn-primary  btnDetailBank" data-url="<?=base_url('bank/'.$i_status_url.'/'.$data->id);?>" style="cursor: pointer;" id="btn_tul_<?=$data->id;?>">Views</button>
                            <?php
                      if($level_member == 1){
                      ?>
                            <button type="button" class="btn btn-sm btn-success  btnEditBank"    data-i_bank="<?=$i_bank;?>" data-s_name="<?=$title;?>" data-id="<?=$data->id;?>" data-s_key="<?=$data->s_key;?>"  data-s_account_name="<?=$data->s_account_name;?>"  data-s_account_no="<?=$data->s_account_no;?>"  data-s_account_username="<?=$data->s_account_username;?>"  data-s_account_password="<?=$data->s_account_password;?>"  style="cursor: pointer;" >Edit</button>
                            
                             
                            
                            <button type="button" class="btn btn-sm btn-danger  btnDeleteBank"   data-id="<?=$data->id;?>"  style="cursor: pointer;" >Delete</button>
                            <?php } ?>
                          </div>
                        </div>
                       <?php 		
	}
 }
 ?> 
                      </div>
                    </div>
                  </div>
                </div>
              </div>             
            	<?php
							}
            	?>
            </div>
          </div>
        </div>