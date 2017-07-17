<div class="content-w">
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?=base_url();?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?=base_url('bank/name/'.$bank->id);?>"><?=$bank->s_name;?></a></li>
            <li class="breadcrumb-item"><span><?=$bank_list->s_account_name;?></span></li>
          </ul>
          <!--<div class="content-panel-toggler"><i class="os-icon os-icon-grid-squares-22"></i><span>Sidebar</span></div>-->
          <div class="content-i">
            <div class="content-box">
              <div class="row">
                <div class="col-sm-8">
                  <div class="element-wrapper">

                    <div class="users-list-w element-header">
									   	<div class="col-sm-12">
									   	<a href="<?=base_url('bank/name/'.$bank->id);?>" style="text-decoration: none;">
									   <div class="user-w with-status status-green">
									      <div class="user-avatar-w">
									         <div class="user-avatar"><?=img('uploads/bank/'.$bank->s_icon.'','50');?></div>
									      </div>
									      <div class="user-name">
									         <h6 class="user-title"><?=$bank_list->s_account_name;?> [<?=$bank_list->s_account_no;?>]</h6>
									         <div class="user-role"><?=$bank->s_name;?> : <?=$bank->s_fname_en;?></div>
									      </div>
									      <div class="user-action">
									         <div class="os-icon os-icon-coins4"></div>
									      </div>
									   	</div>
									   	</a>
											</div>
										</div>
                    <div class="element-content">
                      <div class="row">
                        <div class="col-sm-6">
                          <form method="post" id="form-bank">
                          <span style="display: none;">
                          	<input type="date" name="d_start" id="d_start" value="<?=date("Y-m-d");?>" pattern="[0-9]{2}-[0-9]{2}-[0-9]{4}"/> To 
                          	<input type="date" name="d_end" id="d_end" value="<?=date("Y-m-d");?>" pattern="[0-9]{2}-[0-9]{2}-[0-9]{4}"/>
                          	</span>
                          	<input type="hidden" name="id" id="i_bank" value="<?=$bank_list->id;?>"/>
                          
                          <?php
                          if($bank_list->i_bank == 3){
														?>
														
														<p> Captcha : <img id="captcha" src="<?php echo base_url(); ?>assets/img/preloader.gif" width="150" height="50"/>
                                    <button class="btn btn-sm btn-primary btn-rounded" id="btn-getCaptcha" onclick="GetCaptcha()" type="button" style="cursor: pointer;">GetCaptcha</button>
                                </p>
														<p><input type="text" id="imageCode" name="imageCode" value="" class="form-control" autocomplete="off" placeholder="Captcha"/>
														</p>
														<input type="hidden" name="folder_domain" id="folder_domain" value="expweb">
														<button type="button" class="btn btn-md btn-primary btn-rounded" id="UpdateBankDetail" data-id="<?=$bank_list->id;?>" style="cursor: pointer;" >ดูรายการเคลื่อนไหวล่าสุด</button> 
														
														
														<?php
													}else{
														?>
														<button type="button" class="btn btn-md btn-primary btn-rounded" id="UpdateBankDetail" data-id="<?=$bank_list->id;?>" style="cursor: pointer;" >ดูรายการเคลื่อนไหวล่าสุด</button>  
														<?php
													}
                          ?>
                           
                          </form>                       
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-sm-4">
                          <div class="element-box el-tablo">
                            <div class="label">Balance : Lasted <span id="d_now"><?=$bank_list->d_lastpull;?></span></div>
                            <div class="value" id="div_total">0<!--<?=$bank_list->i_balance;?>--> THB</div>
                            <!--<div class="trending trending-up"><span>12%</span><i class="os-icon os-icon-arrow-up2"></i></div>-->
                          </div>
                        </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <div class="element-wrapper">
                    <h6 class="element-header">Recent transaction</h6>
                    <div class="element-box-tp">
                      <div class="controls-above-table">
                        <div class="row" style="display: none;">
                          <div class="col-sm-6"><!--<a class="btn btn-sm btn-secondary" href="#">Download CSV</a><a class="btn btn-sm btn-secondary" href="#">Archive</a><a class="btn btn-sm btn-danger" href="#">Delete</a>--></div>
                          <div class="col-sm-6">
                            <form class="form-inline justify-content-sm-end">
                              <!--<input class="form-control form-control-sm rounded bright" placeholder="Search" type="text">-->
                              <select class="form-control form-control-sm rounded bright">
                                <option selected="selected" value="">Date</option>
                                <option value="Pending">Pending</option>
                                <option value="Active">Active</option>
                                <option value="Cancelled">Cancelled</option>
                              </select>
                            </form>
                          </div>
                        </div>
                      </div>
                      <div class="table-responsive">
                        <table class="table table-bordered table-lg table-v2 table-striped">
                          <thead  id="thead_trans">
                            
                          </thead>
                          <tbody id="tbody_trans">
                          <?php
                          $i_rows = 1;
                          foreach($transaction as $data){
                          ?>
                            <tr style="display: none">
                              <td class="text-center"><?=$i_rows?></td>
                              <td><?=$data->d_datetime;?></td>
                              <td><?=$data->s_info;?></td>
                              <td class="text-right"><?=$data->i_out;?></td>
                              <td class="text-right"><?=$data->i_in;?></td>
                              <td class="text-right"><?=$data->i_total;?></td>
                              <td><?=$data->s_channel;?></td>
                            </tr>
                            <?php $i_rows++;} ?>

                          </tbody>
                        </table>
                      </div>
                      <div class="controls-below-table" style="display: none">
                        <div class="table-records-info">Showing records 1 - 10</div>
                        <div class="table-records-pages">
                          <ul>
                            <li><a href="#">Previous</a></li>
                            <li><a class="current" href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">Next</a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              
            </div>
          </div>
        </div>
   
<?php
$cache_version = "1.0.1";
?>
