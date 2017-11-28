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
									         <h6 class="user-title"><?=$bank_list->s_account_name;?> 
									         <?php if($bank->id != 7){ ?>
									         [
									         <!--<?=$bank_list->s_account_no;?>-->
									         <?php
                            $bank_no = explode("-",$bank_list->s_account_no);
                            $bank_no2 = substr($bank_no[2],-4);
                            ?>
                            xxx-x-x<?=$bank_no2;?>-<?=$bank_no[3];?>
									         
									         ]
									         <?php } ?>
									         </h6>
									         <div class="user-role"><?=$bank->s_name;?> : <?=$bank->s_fname_en;?></div>
									      </div>
									      <div class="user-action">
									         <div class="os-icon os-icon-coins4"></div>
									      </div>
									   	</div>
									   	</a>
											</div>
										</div>
                    <div class="element-content" style="display: none;">
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
														<input type="hidden" name="folder_domain" id="folder_domain" value="<?=$this->session->userdata('wc_folder_domain');?>">
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
                          /*$i_rows = 1;
                          foreach($transaction as $data){*/
                          ?>
                            <?php
                          if($transaction){
														?>
                            <tr id="loading_tr"><td colspan='8' align='center'> Loading... </td></tr>
                            <?php 
                            /*$i_rows++;} */
}
                            ?>

                          </tbody>
                          <?php
                          if(empty($transaction)){
														?>
														<tr id="tr_notfound"><td colspan='8' align='center'> no data available in table </td></tr>
														<?php
													}
                          ?>
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
        <div style="display: none;" id="div_sound">aa</div>
        
<style>
	.class_tr_new td{
		background-color: #ffcaca;
	}
</style>	

<style>
	.class_tr_newall td{
		 
	}
</style>
   
<?php
$cache_version = "1.0.1";
?>
<script>
function load_transaction_first(){
	var bank_name = "<?=$bank_name;?>";
	if(bank_name == 'bbl'){
		var append_thead_trans = "<tr> <th class='text-center'>#</th> <th>วันที่</th> <th>รายการ</th> <th>ถอน</th> <th>ฝาก</th> <th>คงเหลือ</th> <th>ช่องทาง</th> </tr>";
	}
	if(bank_name == 'scb'){
		var append_thead_trans = "<tr> <th class='text-center'>#</th> <th>วันที่</th> <th>รายการ</th> <th>ถอน</th> <th>ฝาก</th> <th>Code</th> <th>ช่องทาง</th> </tr>";
	}
	if(bank_name == 'bay'){
		var append_thead_trans = "<tr> <th class='text-center'>#</th> <th>วันที่</th> <th>รายการ</th> <th>ถอน</th> <th>ฝาก</th> <th>คงเหลือ</th> <th>ช่องทาง</th> </tr>";
	}
	if(bank_name == 'kbank'){
		var append_thead_trans = "<tr> <th class='text-center'>#</th> <th>วันที่</th> <th>รายการ</th> <th>ถอน</th> <th>ฝาก</th> <th>Type</th><th>Bank No</th> <th>ช่องทาง</th> </tr>";
	}
	if(bank_name == 'ktb'){
		var append_thead_trans = "<tr> <th class='text-center'>#</th> <th>วันที่</th> <th>รายการ</th> <th>ถอน</th> <th>ฝาก</th> <th>Check</th> <th>Branch</th> </tr>";
	}
	
	$('#thead_trans').append(append_thead_trans);
}
function load_transaction_new(id,bank_name){
	var url = main_base_url+"cronjob/loadtransaction";
	var url_balance = main_base_url+"cronjob/loadbalance";
	$.ajax({
        type: 'POST',
        url: url,
        data: {
        	'id':id,
        	'bank_name':bank_name,
        	},
        beforeSend: function ()
        {
            //$('#se-pre-con').fadeIn(100);
        },
        success: function (data) {

                res = JSON.parse(data);
                var append_msg = "";
                var i_rows = 1;
                $.each(res, function (j, item) {
                    
                    if(bank_name == 'bbl'){
											append_msg +="<tr id='tr_transaction"+item.id+"' class='class_tr_new'><td class=\"text-center\">NEW</td><td>"+item.d_datetime+"</td><td >"+item.s_info+"</td><td class=\"text-right\">"+item.i_out+"</td><td class=\"text-right\">"+item.i_in+"</td><td class=\"text-right\">"+item.i_total+"</td><td>"+item.s_channel+"</td></tr>";
										}
										if(bank_name == 'scb'){
											append_msg +="<tr id='tr_transaction"+item.id+"' class='class_tr_new'><td class=\"text-center\">NEW</td><td>"+item.d_datetime+"</td><td >"+item.s_info+"</td><td class=\"text-right\">"+item.i_out+"</td><td class=\"text-right\">"+item.i_in+"</td><td class=\"text-right\">"+item.s_transactioncode+"</td><td>"+item.s_channel+"</td></tr>";
										}
										if(bank_name == 'bay'){
											append_msg +="<tr id='tr_transaction"+item.id+"' class='class_tr_new'><td class=\"text-center\">NEW</td><td>"+item.d_datetime+"</td><td >"+item.s_info+"</td><td class=\"text-right\">"+item.i_out+"</td><td class=\"text-right\">"+item.i_in+"</td><td class=\"text-right\">"+item.i_total+"</td><td>"+item.s_channel+"</td></tr>";
										}
										if(bank_name == 'kbank'){
											append_msg +="<tr id='tr_transaction"+item.id+"' class='class_tr_new'><td class=\"text-center\">NEW</td><td>"+item.d_datetime+"</td><td >"+item.s_info+"</td><td class=\"text-right\">"+item.i_out+"</td><td class=\"text-right\">"+item.i_in+"</td><td class=\"text-right\">"+item.s_type+"</td><td class=\"text-right\">"+item.s_bankno+"</td><td>"+item.s_channel+"</td></tr>";
										}
										if(bank_name == 'ktb'){
											append_msg +="<tr id='tr_transaction"+item.id+"' class='class_tr_new'><td class=\"text-center\">NEW</td><td>"+item.d_datetime+"</td><td >"+item.s_info+"</td><td class=\"text-right\">"+item.i_out+"</td><td class=\"text-right\">"+item.i_in+"</td><td class=\"text-right\">"+item.i_total+"</td><td>"+item.s_channel+"</td></tr>";
										}
                    
                   
                    i_rows++;
                    $('#tr_transaction'+item.id).remove();
                    });


				if(i_rows > 1){
					
					$('#tbody_trans').prepend(append_msg);
					$('#tr_notfound').remove();
					
					$.notify(" You have new transaction ","warning");
					$('#div_sound').html('<audio controls autoplay><source src="<?=base_url();?>assets/sound/IphoneSms.mp3" type="audio/mpeg" /></audio>');
				}else{
					load_transaction_newall(id,bank_name,1);
				}
        },
        error: function (data) {

        }

    });
    
  $.ajax({
        type: 'POST',
        url: url_balance,
        data: {
        	'id':id,
        	'bank_name':bank_name,
        	},
        beforeSend: function ()
        {
            //$('#se-pre-con').fadeIn(100);
        },
        success: function (data) {
					res = JSON.parse(data);
					
					$('#d_now').html(res.d_now);
					$('#div_total').html(res.i_balance);
					console.log(data)
					console.log('************')
        },
        error: function (data) {

        }

    });
    
}
	
	
function load_transaction_newall(id,bank_name,chk){
	var url = main_base_url+"cronjob/loadtransactionall";
 
	$.ajax({
        type: 'POST',
        url: url,
        data: {
        	'id':id,
        	'bank_name':bank_name,
        	},
        beforeSend: function ()
        {
            //$('#se-pre-con').fadeIn(100);
        },
        success: function (data) {

                res = JSON.parse(data);
                var append_msg = "";
                var i_rows = 1;
                
                
                
                
                $.each(res, function (j, item) {
                    
                    if(bank_name == 'bbl'){
											append_msg +="<tr id='tr_transaction"+item.id+"' class='class_tr_newall'><td class=\"text-center\">#</td><td>"+item.d_datetime+"</td><td >"+item.s_info+"</td><td class=\"text-right\">"+item.i_out+"</td><td class=\"text-right\">"+item.i_in+"</td><td class=\"text-right\">"+item.i_total+"</td><td>"+item.s_channel+"</td></tr>";
										}
										if(bank_name == 'scb'){
											append_msg +="<tr id='tr_transaction"+item.id+"' class='class_tr_newall'><td class=\"text-center\">#</td><td>"+item.d_datetime+"</td><td >"+item.s_info+"</td><td class=\"text-right\">"+item.i_out+"</td><td class=\"text-right\">"+item.i_in+"</td><td class=\"text-right\">"+item.s_transactioncode+"</td><td>"+item.s_channel+"</td></tr>";
										}
										if(bank_name == 'bay'){
											append_msg +="<tr id='tr_transaction"+item.id+"' class='class_tr_newall'><td class=\"text-center\">#</td><td>"+item.d_datetime+"</td><td >"+item.s_info+"</td><td class=\"text-right\">"+item.i_out+"</td><td class=\"text-right\">"+item.i_in+"</td><td class=\"text-right\">"+item.i_total+"</td><td>"+item.s_channel+"</td></tr>";
										}
										if(bank_name == 'kbank'){
											append_msg +="<tr id='tr_transaction"+item.id+"' class='class_tr_newall'><td class=\"text-center\">#</td><td>"+item.d_datetime+"</td><td >"+item.s_info+"</td><td class=\"text-right\">"+item.i_out+"</td><td class=\"text-right\">"+item.i_in+"</td><td class=\"text-right\">"+item.s_type+"</td><td class=\"text-right\">"+item.s_bankno+"</td><td>"+item.s_channel+"</td></tr>";
										}
										if(bank_name == 'ktb'){
											append_msg +="<tr id='tr_transaction"+item.id+"' class='class_tr_newall'><td class=\"text-center\">#</td><td>"+item.d_datetime+"</td><td >"+item.s_info+"</td><td class=\"text-right\">"+item.i_out+"</td><td class=\"text-right\">"+item.i_in+"</td><td class=\"text-right\">"+item.i_total+"</td><td>"+item.s_channel+"</td></tr>";
										}
                    
                   
                    i_rows++;
                    $('#tr_transaction'+item.id).remove();
                    //$('#tr_transaction'+item.id).removeClass('class_tr_new');
                    });


				if(i_rows > 1){
					
					$('#tbody_trans').prepend(append_msg);
					$('#loading_tr').remove();
					
 
					
					$.notify(" Load data complete ","success");
 
				}else{
					
				}
				
				
				
        },
        error: function (data) {

        }

    });
    
 
    
}	
	
	load_transaction_first();
	load_transaction_newall('<?=$bank_list->id;?>','<?=$bank_name;?>');
	load_transaction_new('<?=$bank_list->id;?>','<?=$bank_name;?>');
	setInterval(function() { load_transaction_new('<?=$bank_list->id;?>','<?=$bank_name;?>'); },30000);
	
</script>


