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
                          <span style="display: nones;">
                          	<input type="text" name="d_start" id="d_start" value="<?= date("d/m/Y"); ?>" pattern="[0-9]{2}/[0-9]{2}/[0-9]{4}"/> To 
                                            <input type="text" name="d_end" id="d_end" value="<?= date("d/m/Y"); ?>" pattern="[0-9]{2}/[0-9]{2}/[0-9]{4}"/>
                          	</span>
                          	 <input type="hidden" name="id" id="i_bank" value="<?= $bank_list->id; ?>"/>
                          	<input type="hidden" name="bank" id="bank" value="<?=strtolower($bank->s_name);?>"/>
                          
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
                        <table width="100%" cellpadding="10" >
                                                <thead style="background-color: rgba(0, 0, 0, 0.05);line-height: 40px;">
                                                    <tr>
                                                        <th width="30" style="text-align: center;">#</th>
                                                        <th width="130" align="left">วันที่</th>
                                                        <th width="160" class="text-center">ธนาคาร</th>
                                                        <th width="100" class="text-center">ช่องทาง</th>
                                                        <th width="100" class="text-center">ฝาก</th>
                                                        <th width="100" class="text-center">ถอน</th>
                                                        <th>รายละเอียด</th>
                                                        <th  width="80" class="text-center">สถานะ</th>

                                                         
                                                    </tr>
                                                </thead>
                                                <tbody id="tbody_trans">
                                                    <?php
                                                    $i_rows = 1;

                                                    $level_member = $this->session->userdata('i_level');

                                                     
$i_dayback = "-1000";  	
$timestamp = strtotime($i_dayback.' days');
$dayback = date('Y-m-d 00:00:01', $timestamp);
$daynow = date('Y-m-d H:i:s');
 	
  	$strSql = "";
$strSql .= "SELECT ";
$strSql .= "    t.*, ";
$strSql .= "    b.id as b_id, ";
$strSql .= "    b.s_icon as b_s_icon, ";
$strSql .= "    b.s_account_no as bl_s_account_no, ";
$strSql .= "    b.s_name as bank_name ";
$strSql .= "FROM ";
$strSql .= "    ( ";
$strSql .= "    SELECT ";
$strSql .= "        'BAY' s_bank, ";
$strSql .= "        id, ";
$strSql .= "        i_bank_list, ";
$strSql .= "        d_datetime, ";
$strSql .= "        s_info, ";
$strSql .= "        i_out, ";
$strSql .= "        i_in, ";
$strSql .= "        i_posted, ";
$strSql .= "        i_read, ";
$strSql .= "        s_channel, ";
$strSql .= "        i_status, ";
$strSql .= "        s_remark ";
$strSql .= "    FROM ";
$strSql .= "        tbl_autopull_transaction_bay ";
$strSql .= "    UNION ";
$strSql .= "SELECT ";
$strSql .= "    'BBL' s_bank, ";
$strSql .= "    id, ";
$strSql .= "    i_bank_list, ";
$strSql .= "    d_datetime, ";
$strSql .= "    s_info, ";
$strSql .= "    i_out, ";
$strSql .= "    i_in, ";
$strSql .= "    i_posted, ";
$strSql .= "    i_read, ";
$strSql .= "    s_channel, ";
$strSql .= "    i_status, ";
$strSql .= "    s_remark ";
$strSql .= "FROM ";
$strSql .= "    tbl_autopull_transaction_bbl ";
$strSql .= "UNION ";
$strSql .= "SELECT ";
$strSql .= "    'KBANK' s_bank, ";
$strSql .= "    id, ";
$strSql .= "    i_bank_list, ";
$strSql .= "    d_datetime, ";
$strSql .= "    s_info, ";
$strSql .= "    i_out, ";
$strSql .= "    i_in, ";
$strSql .= "    i_posted, ";
$strSql .= "    i_read, ";
$strSql .= "    s_channel, ";
$strSql .= "    i_status, ";
$strSql .= "    s_remark ";
$strSql .= "FROM ";
$strSql .= "    tbl_autopull_transaction_kbank ";
$strSql .= "UNION ";
$strSql .= "SELECT ";
$strSql .= "    'KTB' s_bank, ";
$strSql .= "    id, ";
$strSql .= "    i_bank_list, ";
$strSql .= "    d_datetime, ";
$strSql .= "    s_info, ";
$strSql .= "    i_out, ";
$strSql .= "    i_in, ";
$strSql .= "    i_posted, ";
$strSql .= "    i_read, ";
$strSql .= "    s_channel, ";
$strSql .= "    i_status, ";
$strSql .= "    s_remark ";
$strSql .= "FROM ";
$strSql .= "    tbl_autopull_transaction_ktb ";
$strSql .= "UNION ";
$strSql .= "SELECT ";
$strSql .= "    'SCB' s_bank, ";
$strSql .= "    id, ";
$strSql .= "    i_bank_list, ";
$strSql .= "    d_datetime, ";
$strSql .= "    s_info, ";
$strSql .= "    i_out, ";
$strSql .= "    i_in, ";
$strSql .= "    i_posted, ";
$strSql .= "    i_read, ";
$strSql .= "    s_channel, ";
$strSql .= "    i_status, ";
$strSql .= "    s_remark ";
$strSql .= "FROM ";
$strSql .= "    tbl_autopull_transaction_scb ";
$strSql .= "UNION ";
$strSql .= "SELECT ";
$strSql .= "    'TMB' s_bank, ";
$strSql .= "    id, ";
$strSql .= "    i_bank_list, ";
$strSql .= "    d_datetime, ";
$strSql .= "    s_info, ";
$strSql .= "    i_out, ";
$strSql .= "    i_in, ";
$strSql .= "    i_posted, ";
$strSql .= "    i_read, ";
$strSql .= "    s_channel, ";
$strSql .= "    i_status, ";
$strSql .= "    s_remark ";
$strSql .= "FROM ";
$strSql .= "    tbl_autopull_transaction_tmb ";
$strSql .= "UNION ";
$strSql .= "SELECT ";
$strSql .= "    'TrueWallet' s_bank, ";
$strSql .= "    id, ";
$strSql .= "    i_bank_list, ";
$strSql .= "    d_datetime, ";
$strSql .= "    s_info, ";
$strSql .= "    i_out, ";
$strSql .= "    i_in, ";
$strSql .= "    i_posted, ";
$strSql .= "    i_read, ";
$strSql .= "    s_channel, ";
$strSql .= "    i_status, ";
$strSql .= "    s_remark ";
$strSql .= "FROM ";
$strSql .= "    tbl_autopull_transaction_truewallet ";
$strSql .= ") t, ";
$strSql .= "( ";
$strSql .= "SELECT ";
$strSql .= "    bl.id, ";
$strSql .= "    bl.s_account_no, ";
$strSql .= "    bl.s_account_name, ";
$strSql .= "    b.s_name, ";
$strSql .= "    b.s_fname_th, ";
$strSql .= "    b.s_fname_en, ";
$strSql .= "    b.s_icon, ";
$strSql .= "    b.s_url, ";
$strSql .= "    b.s_js ";
$strSql .= "FROM ";
$strSql .= "    tbl_bank_list bl, ";
$strSql .= "    tbl_bank b ";
$strSql .= "WHERE ";
$strSql .= "    bl.i_bank = b.id ";
$strSql .= ") b ";
$strSql .= "WHERE ";
$strSql .= "    t.i_bank_list = b.id ";
$strSql .= "   and t.d_datetime >=  '".$dayback."' ";
//$strSql .= "   and (t.d_datetime BETWEEN  '".$dayback."' AND '".$daynow."') ";
$strSql .= " and t.i_bank_list = '".$bank_list->id."'";
$strSql .= "ORDER BY ";
$strSql .= "    t.d_datetime DESC ";
                                                    
                                                    $query = $this->db->query($strSql)->result();
//if ($bank_list_q) {
                                                    if ($query) {
                                                        /*echo $query->num_rows();*/
                                                        ?>
                                                        <?php
                                                        foreach ($query as $data) {
                                                            //foreach ($bank_list_q as $data) {

                                                            $s_seclect = array('*');
                                                            $s_conditions['where'] = array("id" => $data->i_bank_list);
                                                            //$s_order_by = array('id' => 'desc');
                                                            $bank_list = $this->Main_model->row_data("tbl_bank_list", $s_seclect, $s_conditions, $s_order_by);
                                                            

                                                            
                                                             
                                                            if ($bank_list->id > 0) {
                                                                $bgcolor = ($i++ & 1) ? "#e4e6ec" : "#d1d8e6";
                                                                
                                                                if($data->i_in > 0){
																																	$amount = "+".$data->i_in;
																																}
																																
																																if($data->i_out > 0){
																																	$amount = "-".$data->i_out;
																																}
                                                                
                                                                ?>
                                                                <tr bgcolor="<?= $bgcolor; ?>" id="tr_transaction<?=$data->id;?>">
                                                                    <td class="text-center" ><?= $i_rows ?></td>



                                                                    <td>
                                                                  
                                                                        <?= $data->d_datetime; ?>
                                                                    </td>

                                                                    <td class="text-center">
                                                                        <img src='<?=base_url();?>uploads/bank/<?= $data->b_s_icon; ?>' width='25'> <?= $data->bl_s_account_no; ?> 
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <?= $data->s_channel; ?>
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <?= $data->i_in; ?>
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <?= $data->i_out; ?>
                                                                    </td>
                                                                    <td class="text-left">
                                                                        <?= $data->s_info; ?>
                                                                        <br />
                                                                        <input type="text" name="s_remark<?= $data->id; ?>" id="s_remark<?= $data->id; ?>" value="<?= $data->s_remark; ?>" /><input type="button" value="save" class="btn_save_remark" data-id="<?= $data->id; ?>" data-bank="<?= $data->bank_name; ?>" />
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <? 
if($data->i_status == 1){ $text_status = "บันทึกโน๊ตแล้ว";$btn_status = "success  btn-block btn-sm approve";}
else{$text_status = "ยังไม่บันทึกโน๊ต";$btn_status = "warning  btn-block btn-sm reject";} 
?>
<button type="button" class="btn btn-<?=$btn_status;?> btn_save_status" data-id="<?=$data->id;?>" data-bank="<?=$data->bank_name;?>"><?=$text_status;?></button>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                                $i_rows++;
                                                            }
                                                        }
                                                    } else {
                                                        ?>
                                                        <tr id="tr_notfound">
                                                            <td colspan="7" class="text-center">No Transaction</td>
                                                        </tr>                                       
                                                    <?php } ?>

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
<form method="post" id="form_find">
<input type="hidden" id="andsqlbank" name="andsqlbank" value=""/>
<input type="hidden" id="sql_i_bank_list" name="sql_i_bank_list" value="<?=$bank_list->id;?>"/>
<input type="hidden" id="sql_day_back" name="sql_day_back" value="1"/>
</form>
<?php
$timestamp = strtotime('-1 minutes');
$before_1hr = date('Y-m-d H:i:s', $timestamp);
?>
<input type="hidden" id="get_date_time" value="<?=$before_1hr;?>"/>
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
var url = main_base_url+"bank/updatebankdetail";
	var Jsdata = $("#form-bank").serialize();
    $.ajax({
        type: 'POST',
        url: url,
        data: Jsdata,
        beforeSend: function ()
        {
            $('#se-pre-con').fadeIn(100);
        },
        success: function (data) {
       	console.log(data);
       	console.log('*************************')
       	var json_res = JSON.parse(data);
       	var d_now = json_res.d_now;
       	var api_url = json_res.s_url;
       	var api_data = data;
//       	console.log(api_url);
       	
       	$.ajax({
        type: 'POST',
        url: api_url,
        data: {
        	'func':json_res.func,
        	'key':json_res.key,
        	'username':json_res.username,
        	'password':json_res.password,
        	'account':json_res.account,
        	'domain':json_res.domain,
        	'license':json_res.license,
        	'd_start':json_res.d_start,
        	'd_end':json_res.d_end,
        	},
        beforeSend: function ()
        {
            //$('#se-pre-con').fadeIn(100);
        },
        success: function (data) {
            if (data == "") {
                console.log("Process is Null.");
                $('#se-pre-con').delay(100).fadeOut();
                $.notify(" Load data failed , Please try again !!! ");
                return;
            }
//            debugger;
            //$('#thead_trans').html("");
            //$('#tbody_trans').html("");
            console.log(data)
            console.log('*************************')


                var res = tryCatch(data);
                console.log(res.code)
                console.log('*************************')
                console.log(res.description)
                console.log('*************************')
                console.log(res.total)

                //$('#div_total').html(res.total[1].value+" THB");
								//$('#d_now').html(d_now);
								//func_add_detailbank($('#i_bank').val(),d_now,res.total[1].value);
								/*
                console.log('*************************')
                console.log(res.transaction)
                var append_msg = "";
                var i_rows = 1;
                $.each(res.transaction, function (j, item) {

                        console.log(item.datetime + " | " + item.info + " | " + item.out + " | " + item.in + " | " + item.total + " | " + item.channel);
console.log('*************************')

                    append_msg +="<tr><td>"+i_rows+"</td><td>"+item.datetime+"</td><td>"+item.info+"</td><td>"+item.out+"</td><td>"+item.in+"</td><td>"+item.total+"</td><td>"+item.channel+"</td></tr>";
                    i_rows++;
                    });

				var append_thead_trans = "<tr> <th class='text-center'>#</th> <th>วันที่</th> <th>รายการ</th> <th>ถอน</th> <th>ฝาก</th> <th>คงเหลือ</th> <th>ช่องทาง</th> </tr>";
				$('#thead_trans').append(append_thead_trans);
				if(i_rows > 1){
					$('#tbody_trans').append(append_msg);
				}else{
					append_msg = "<tr><td colspan='7' align='center'> no data available in table </td></tr>";
					$('#tbody_trans').append(append_msg);
				}
				//console.log(append_thead_trans);
				//*/
				
				console.log(data)
				console.log('***************************')
				var i_bank = $('#i_bank').val();
				var bank = $('#bank').val();
				console.log(i_bank+bank+data)
				var url_cron = main_base_url+"cronjob/add_detailbankauto";
				$.post(url_cron,{'i_bank':i_bank,'data':data,'bank':bank},function(data){	
				var urls = main_base_url+"main/detailautoalls_new_find";
//	var andsqlbank = $('#form_find').serialize();
	var andsqlbank = $('#form_find').serialize();
	//alert(andsqlbank)
	get_date_time();
	$.ajax({
        type: 'POST',
        url: urls,
        data : andsqlbank,
       
        beforeSend: function ()
        {
            //$('#se-pre-con').fadeIn(100);
        },
        success: function (data) {

                console.log(andsqlbank)
                console.log(data)
                console.log('***************************')
                res = JSON.parse(data);
                var append_msg = "";
                var i_rows = 1;
                var total_status = 0;
                
                $.each(res, function (j, item) {
                    
                    
                    var date_cc = $.trim($('#get_date_time').val());
                    console.log("********"+date_cc+"********")
                    if(item.d_datetime > date_cc){
                    
                    var amount = "";
                    if(item.i_in > 0){
											amount = "+"+item.i_in;
										}
										if(item.i_out > 0){
											amount = "-"+item.i_out;
										}
										
										var class_status = "";
										var class_status_txt = "";
										var class_status_c = 0;
										if(item.i_status == 1){
											class_status = "btn-success  approve";
											class_status_txt = "บันทึกโน๊ตแล้ว";
											class_status_c = 0;
										}else{
											class_status = "btn-warning  reject";
											class_status_txt = "ยังไม่บันทึกโน๊ต";
											class_status_c = 1;
										}
                    
											 var append_msg ="<tr id='tr_transaction"+item.id+"' class='class_tr'>";
											 append_msg +="<td class=\"text-center class_border_bottom\"  >NEW</td>";
											 append_msg +="<td class='class_border_bottom'>"+item.d_datetime+"</td>";
											 append_msg +="<td class=\"text-center class_border_bottom\"><img src='"+main_base_url+"uploads/bank/"+item.b_s_icon+"' width='25'> "+item.bl_s_account_no+"</td>";
											 append_msg +="<td class=\"text-center class_border_bottom\">"+item.s_channel+"</td>";
											 append_msg +="<td class=\"text-center class_border_bottom\">"+item.i_in+"</td>";
											 append_msg +="<td class=\"text-center class_border_bottom\">"+item.i_out+"</td>";
											 append_msg +="<td class=\"text-left class_border_bottom\">"+item.s_info+"<br /><input type='text' name='s_remark"+item.id+"' id='s_remark"+item.id+"' value='"+item.s_remark+"' /><input type='button' value='save' class='btn_save_remark' data-id='"+item.id+"' data-bank='"+item.bank_name+"' onclick=\"fnc_save_remark('"+item.id+"','"+item.bank_name+"')\" /></td>";
											 append_msg +="<td class=\"text-center class_border_bottom\"><button type=\"button\" class=\"btn  "+class_status+" btn-block btn-sm btn_save_status\" data-id=\""+item.id+"\" data-bank=\""+item.bank_name+"\" onclick=\"fnc_save_status('"+item.id+"','"+item.bank_name+"')\" id='btn_save_status"+item.id+"'  >"+class_status_txt+"</button><input type='hidden' id='class_status_c"+item.id+"' value='"+class_status_c+"' /></td>";
											 append_msg +="</tr>";
										


                    i_rows++;
                    $('#tr_transaction'+item.id).remove();
                    $('#tbody_trans').prepend(append_msg);
										$('#tr_notfound').remove();
                    //if(item.i_status == 0){
											total_status++;
										//}
                    
                    
											console.log(item.d_datetime)
										
										
										}
                    
                    
                    
                    
                    });

if(total_status > 0){

					$.notify(" You have new transaction ","warning");
					$('#div_sound').html('<audio controls autoplay><source src="<?=base_url();?>assets/sound/IphoneSms.mp3" type="audio/mpeg" /></audio>');
				}
				
		
		var url_balance = main_base_url+"cronjob/loadbalance";
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
				
				 
        },
        error: function (data) {

        }

    });
});				
				
				$.notify(" Load data Success !!! ","success");
$('#se-pre-con').delay(100).fadeOut();

        },
        error: function (data) {
        	console.log("Error");
        	$.notify(" Load data failed , Please try again !!! ");
        	$('#se-pre-con').delay(100).fadeOut();
        	//////////////// Start insert Error
      var url_error = main_base_url+"cronjob/posterror";
      //var json_error = JSON.parse(data);
      $.ajax({
        type: 'POST',
        url: url_error,
        data: {
        	'i_bank_list':json_res.i_id,
        	's_request':api_data,
        	's_response':data.statusText,
        	's_status':data.status,
        	's_account_name':json_res.s_account_name,
        	's_type':'Manual'
        	},
        success: function (data) {

        },
        error: function (data) {
 
        }

    });
			//////////////// End insert Error
        }

    });
       	
       	
        },
        error: function (data) {
					console.log("Error");
					$('#se-pre-con').delay(100).fadeOut();
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
	
	//load_transaction_first();
	//load_transaction_newall('<?=$bank_list->id;?>','<?=$bank_name;?>');
	//load_transaction_new('<?=$bank_list->id;?>','<?=$bank_name;?>');
	setInterval(function() { load_transaction_new('<?=$bank_list->id;?>','<?=$bank_name;?>'); },10000);

function get_date_time(){
	var url_cron = main_base_url+"cronjob/get_date_time";
				$.post(url_cron,function(data){
					//alert(data)
					$('#get_date_time').val(data);
					
		});
}


	
</script>



