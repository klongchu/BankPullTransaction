<div class="content-w">
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?=base_url();?>">Home</a></li>
            <li class="breadcrumb-item"><span><?=$title;?></span></li>
          </ul>
          <div class="content-panel-toggler"><i class="os-icon os-icon-grid-squares-22"></i><span>Sidebar</span></div>
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
                        <div class="col-sm-4">
                          <div class="element-box el-tablo">
                            <div class="label">Balance</div>
                            <div class="value">400</div>
                            <!--<div class="trending trending-up"><span>12%</span><i class="os-icon os-icon-arrow-up2"></i></div>-->
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="element-box el-tablo">
                            <div class="label">Deposit</div>
                            <div class="value">457</div>
                            <!--<div class="trending trending-down-basic"><span>12%</span><i class="os-icon os-icon-arrow-2-down"></i></div>-->
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="element-box el-tablo">
                            <div class="label">Withdraw</div>
                            <div class="value">57</div>
                            <!--<div class="trending trending-down-basic"><span>9%</span><i class="os-icon os-icon-graph-down"></i></div>-->
                          </div>
                        </div>
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