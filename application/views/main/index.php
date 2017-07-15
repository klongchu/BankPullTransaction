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
 
 if($bank_list_q){
 	foreach($bank_list_q as $bank_list){

                      ?>
                        <div class="col-sm-4">
                          <div class="element-box el-tablo">
                            <div class="label">อัพเดตล่าสุด <?=$bank_list->d_lastpull;?></div>
                            <div class="value"><?=$bank_list->s_account_name;?> <br /> <?=$bank_list->s_account_no;?>  </div>
                            <br />
                            <button type="button" class="btn btn-sm btn-primary  btnDetailBank" data-url="<?=base_url('bank/detail/'.$bank_list->id);?>" style="cursor: pointer;">Views</button>
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