<div class="content-w">
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?=base_url();?>">Home</a></li>
            <li class="breadcrumb-item"><span><?=$title;?></span></li>
          </ul>
          <!--<div class="content-panel-toggler"><i class="os-icon os-icon-grid-squares-22"></i><span>Sidebar</span></div>-->
          <div class="content-i">
            <div class="content-box">
              <div class="row">
                <div class="col-sm-12">
                  <div class="element-wrapper">

                    <div class="users-list-w element-header">
									   <a href="<?=base_url('bank/name/'.$result->id);?>" style="text-decoration: none;">
									   <div class="user-w with-status status-green">
									      <div class="user-avatar-w">
									         <div class="user-avatar"><?=img('uploads/bank/'.$result->s_icon.'','50');?></div>
									      </div>
									      <div class="user-name">
									         <h6 class="user-title"><?=$result->s_name;?> Dashboard</h6>
									         <div class="user-role"><?=$result->s_fname_en;?></div>
									      </div>
									      <div class="user-action">
									         <div class="os-icon os-icon-coins4"></div>
									      </div>
									   	</div>
									   	</a>
										</div>
                    
                    <div class="element-content">
                      <div class="row">
                        <div class="col-sm-12">
                          <button type="button" class="btn btn-md btn-success btn-rounded" id="OpenFormAddBank" data-i_bank="<?=$i_bank;?>" data-s_name="<?=$title;?>" >Add New Bank</button>
                          
                        </div>
                      </div>
                      <br />
                      <div class="row">
                      	<?php
                      	foreach($bank_list as $data){
                      	?>
                        <div class="col-sm-4">
                          <div class="element-box el-tablo">
                            <div class="label"><?=$data->s_account_name;?> [ <?=$data->s_account_no;?> ]</div>
                            <div class="value"><?=number_format($data->i_balance);?></div>
                            <br />
                            <div class="btn btn-sm btn-primary btn-rounded btnDetailBank" data-url="<?=base_url('bank/detail/'.$data->id);?>"><span>Views</span></div>
                            <button type="button" class="btn btn-sm btn-success btn-rounded btnEditBank"    data-i_bank="<?=$i_bank;?>" data-s_name="<?=$title;?>" data-id="<?=$data->id;?>"  data-s_account_name="<?=$data->s_account_name;?>"  data-s_account_no="<?=$data->s_account_no;?>"  data-s_account_username="<?=$data->s_account_username;?>"  data-s_account_password="<?=$data->s_account_password;?>" >Edit</button>
                          </div>
                        </div>
                      	<?php } ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
 
              <!-- Modal -->        
<div aria-labelledby="mySmallModalLabel" class="modal fade bd-example-modal-sm" role="dialog" tabindex="-1" style="display: none;" aria-hidden="true" id="mySmallModalLabel">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Bank</h5>
        <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true"> ×</span></button>
      </div>
      <div class="modal-body">
        <form method="post" id="DataFormBank">
        	<h3 id="s_name_bank"><?=$title;?></h3>
        	<input type="hidden" name="i_bank" id="i_bank" value="<?=$i_bank;?>"/>
        	<input type="hidden" name="id" id="id" value=""/>
 
          <div class="form-group">
	          <label for=""> Account Name</label>
	          <input class="form-control" placeholder="Account Name" type="text" name="s_account_name" id="s_account_name">
          </div>
          <div class="form-group">
	          <label for=""> Account No. Ex : 123-4-56789-0 <span style="color: #ff0000;" id="error_account_no"></span></label>
	          <input class="form-control" placeholder="Account No." type="text" name="s_account_no" id="s_account_no">
          </div>
          <div class="form-group">
	          <label for=""> Username <span style="color: #ff0000;" id="error_account_username"></span></label>
	          <input class="form-control" placeholder="Username" type="text"  name="s_account_username" id="s_account_username">
          </div>
          <div class="form-group">
	          <label for=""> Password</label>
	          <input class="form-control" placeholder="Password" type="password"  name="s_account_password" id="s_account_password">
          </div>
          <input type="hidden" id="valid_account_no" value="0"/>
          <input type="hidden" id="valid_account_username" value="0"/>
        </form>
      </div>
      <div class="modal-footer">
      <button class="btn btn-secondary" data-dismiss="modal" type="button"> Close</button>
      <button class="btn btn-primary" data-dismiss="modal" type="button" id="btnSaveBank"> Save data</button>
      </div>
    </div>
  </div>
</div>
            </div>
          </div>
        </div>    
        
