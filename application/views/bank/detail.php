<div class="content-w">
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?=base_url();?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?=base_url('bank/name/'.$bank->id);?>"><?=$bank->s_name;?></a></li>
            <li class="breadcrumb-item"><span><?=$bank_list->s_account_name;?></span></li>
          </ul>
          <div class="content-panel-toggler"><i class="os-icon os-icon-grid-squares-22"></i><span>Sidebar</span></div>
          <div class="content-i">
            <div class="content-box">
              <div class="row">
                <div class="col-sm-12">
                  <div class="element-wrapper">

                    <div class="users-list-w element-header">
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
                    <div class="element-content">
                      <div class="row">
                        <div class="col-sm-12">
                          <button type="button" class="btn btn-md btn-primary btn-rounded" id="UpdateBankDetail" data-id="<?=$bank_list->id;?>" >Update Bank Detail</button>
                          
                        </div>
                      </div>
                      <br />
                      <div class="row">
                        <div class="col-sm-4">
                          <div class="element-box el-tablo">
                            <div class="label">Balance : Lasted <?=$bank_list->d_lastpull?></div>
                            <div class="value"><?=number_format($bank_list->i_balance);?></div>
                            <!--<div class="trending trending-up"><span>12%</span><i class="os-icon os-icon-arrow-up2"></i></div>-->
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <div class="element-wrapper">
                    <h6 class="element-header">Recent Transections</h6>
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
                          <thead>
                            <tr>
                              <th class="text-center">#</th>
                              <th>วันที่</th>
                              <th>รายการ</th>
                              <th>ถอน</th>
                              <th>ฝาก</th>
                              <th>คงเหลือ</th>
                              <th>ช่องทาง</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php
                          foreach($transections as $data){
                          ?>
                            <tr>
                              <td class="text-center"><?=$i_rows?></td>
                              <td><?=$data->d_datetime;?></td>
                              <td><?=$data->d_info;?></td>
                              <td class="text-right"><?=$data->i_out;?></td>
                              <td class="text-right"><?=$data->i_in;?></td>
                              <td class="text-right"><?=$data->i_total;?></td>
                              <td><?=$data->s_channel;?></td>
                            </tr>
                            <?php $i_rows++;} ?>

                          </tbody>
                        </table>
                      </div>
                      <div class="controls-below-table">
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
<div style="display: none;">        
<form  id="form-bbl" class="login-form" name="form-bbl"  method="post">

                            <div class="row">

                                <input type="hidden" name="func" id="func" value="InquiryTransaction"> <br/>
                                Key : <input type="text" name="key" id="key" value=""><br/>
                                Username : <input type="text" name="username" id="username" value=""><br/>
                                Password : <input type="text" name="password" id="password" value=""><br/>
                                Account No : <input type="text" name="account" id="account" value=""><br/>
                                     <input type="hidden" name="d_start" id="d_start" value="<?=date("d/m/Y")?>"> 
                                <input type="hidden" name="d_end" id="d_end" value="<?=date("d/m/Y")?>">
                                <input type="hidden" name="domain" id="domain" value="<?= $_SERVER['HTTP_HOST'] ?>">
                                <input type="hidden" name="license" id="license" value="nagieos"><br/>
                            </div>
                            <div class="row">

                                <div class="col-sm-8 text-right">

                                    <button class="btn green" id="btn-login" onclick="bbl()" type="button" >Load Transaction BBL</button>
                                </div>
                            </div>
                        </form>        
<a class="btn_load_data">aaaaaa</a>

<div id="show_res"></div>   
</div>    