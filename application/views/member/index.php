<?php
$level_member = $this->session->userdata('i_level');
?>
<style>
	.with-status11.status11-red {
    background-color: #e65252;
}
.with-status11.status11-green {
    background-color: #90be2e;
}

.with-status11  {
    content: "";
    width: 10px;
    height: 10px;
 
    border-radius: 10px;
    box-shadow: 0px 0px 0px 3px #fff;
}

</style>
<div class="content-w">
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?=base_url();?>">Home</a></li>
            <li class="breadcrumb-item"><span><?=$title;?></span></li>
          </ul>
          <!--<div class="content-panel-toggler"><i class="os-icon os-icon-grid-squares-22"></i><span>Sidebar</span></div>-->
          <div class="content-i">
            <div class="content-box">
            <?php
            if($level_member == 1){
							?>
							<div class="row">
                <div class="col-sm-12">
                  <div class="element-wrapper">

                    <div class="users-list-w element-header">
									   <div class="user-w with-status status-green">
									      <div class="user-avatar-w">
									          
									      </div>
									      <div class="user-name">
									         <h6 class="user-title">Member Dashboard</h6>
 
									      </div>
									      <div class="user-action">
									         <div class="os-icon os-icon-coins4"></div>
									      </div>
									   	</div>
										</div>
                    
                    <div class="element-content">
                      <?php
                      if($level_member == 1){
                      ?>
                      <div class="row">
                        <div class="col-sm-12">
                          <button type="button" class="btn btn-md btn-success " id="OpenFormAddMember" data-i_bank="<?=$i_bank;?>" data-s_name="<?=$title;?>"  style="cursor: pointer;" >Add New Member</button>
                          
                        </div>
                      </div>
                      <?php } ?>
                      <br />
                      <div class="row">
                      	<div class="table-responsive">
                        <table class="table table-bordered table-lg table-v2 table-striped">
                          <thead  id="thead_trans">
                            <tr>
                              <th class="text-center">#</th>
                              <th>ชื่อเล่น</th>
                              <th>ชื่อจริง</th>
                              <th>username</th>
                              <th>password</th>
                              <th>ระดับ</th>
                              <th>Online</th>
                              <th>จัดการ</th>
                            </tr>
                          </thead>
                          <tbody id="tbody_trans">
                          <?php
                          $i_rows = 1;
                          foreach($member_list as $data){
                          $admin_title = ($data->i_level == 1 ? "Admin":"Adminuser");
                          $count_online = $this->Main_model->count_online($data->id);
                          $count_online_css = ($count_online > 0 ? 'green':'red');
                          ?>
                            <tr >
                              <td class="text-center"><?=$i_rows?></td>
                              <td ><?=$data->s_nickname;?></td>
                              <td><?=$data->s_display_name;?></td>
                              <td class="text-center"><?=$data->s_username;?></td>
                              <td class="text-center"><?=$data->s_password;?></td>
                              <td class="text-center"><?=$admin_title;?></td>
                              <td class="text-center">

									   <table align="center" cellpadding="0" cellspacing="0" border="0">
									   	<tr>
									   		<td>
									   			<div  align="center" style="width: 20px;" class="with-status11 status11-<?=$count_online_css;?>"></div>
									   		</td>
									   	</tr>
									   </table>
									   

                              	
                              </td>
                              <td>
                              	
                              	<button type="button" class="btn btn-sm btn-success  btnEditMember"  data-id="<?=$data->id;?>"  data-i_level="<?=$data->i_level;?>"  data-s_display_name="<?=$data->s_display_name;?>"  data-s_nickname="<?=$data->s_nickname;?>"  data-s_username="<?=$data->s_username;?>"  data-s_password="<?=$data->s_password;?>"  data-s_img="<?=($data->s_img != NULL ? $data->s_img : 'no-image.png');?>" style="cursor: pointer;" >Edit</button>
                            
                            <?php
                              	if($data->id != 1){
                              	?>
                            <button type="button" class="btn btn-sm btn-danger  btnDeleteMember"   data-id="<?=$data->id;?>"  style="cursor: pointer;" >Delete</button>
                            <?php } ?>
                              </td>
                            </tr>
                            <?php $i_rows++;} ?>

                          </tbody>
                        </table>
                      </div>
 
                      </div>
                    </div>
                  </div>
                </div>
              </div>
							<?php
						}else{
							?>
							<h1 style="color: #ff0000;">You not have permission !!!</h1>
							<?php
						}
            ?>
            
              
 

            </div>
          </div>
        </div>    
        
