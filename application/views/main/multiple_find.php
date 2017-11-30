<div class="content-w">
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
        <li class="breadcrumb-item"><span><?= $title; ?></span></li>
    </ul>
    <!--<div class="content-panel-toggler"><i class="os-icon os-icon-grid-squares-22"></i><span>Sidebar</span></div>-->
    
 
    <div class="content-i">
        <div class="content-box">
            <div >
                <div class="row">
                    <?php

$i_dayback = "-1";  	
$timestamp = strtotime($i_dayback.' days');
$dayback = date('Y-m-d 00:00:01', $timestamp);
$daynow = date('Y-m-d H:i:s');
 	
  	$strSql = "";
$strSql .= "SELECT ";
$strSql .= "    t.*, ";
$strSql .= "    b.s_account_no as bl_s_account_no, ";
$strSql .= "    b.id as b_id, ";
$strSql .= "    b.s_icon as b_s_icon, ";
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
$strSql .= $andsqlbank;
$strSql .= "ORDER BY ";
$strSql .= "    t.d_datetime DESC ";
 
                    

                        ?>

                        <div class="col-sm-12">
                            <div class="element-box el-tablo" style="padding-right: 1px; ">
                                <div class="label">Balance : Lasted <span id="d_now"><?= $bank_balance->d_create; ?></span></div>
                                <div class="users-list-w element-header">

                                    <div class="user-w with-status status-green">
                                        <div class="user-avatar-w">
                                            <div class="user-avatar"><?= img('uploads/bank/' . $bank->s_icon . '', '50'); ?></div>
                                        </div>
                                        <div class="user-name">
                                            <h6 class="user-title">จำนวนวันย้อนหลัง</h6>
                                            <select name="day_back" id="day_back">
                                            	<?php
                                            	//for($i=1;$i<=300;$i++){
																								?>
																									<option value="1">1</option>
																									<option value="2">2</option>
																									<option value="5">5</option>
																									<option value="15">15</option>
																									<option value="30">30</option>
																									<option value="45">45</option>
																								<?php
																							//}
                                            	?>
                                            </select>
                                        </div>
                                        <div class="user-action">
                                            <div class="os-icon os-icon-coins4"></div>
                                        </div>
                                    </div>

                                </div>
                                <div class="panel-group" style="padding-right: 30px;">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a class="btn-show-views hide" data-id="<?= $bank_list->id; ?>" style="cursor:pointer;">View all Transaction</a>
                                            </h4>
                                        </div>
                                        <div id="collapse<?= $bank_list->id; ?>" class="panel-collapse collapse">



                                            <table width="100%" cellpadding="10" >
                                                <thead style="background-color: rgba(0, 0, 0, 0.05);line-height: 40px;">
                                                    <tr>
                                                        <th width="30" style="text-align: center;">#</th>
                                                        <th width="130" align="left">วันที่</th>
                                                        <th width="160" class="text-center">ธนาคาร</th>
                                                        <th width="100" class="text-center">ฝาก</th>
                                                        <th width="100" class="text-center">ถอน</th>
                                                        <th width="100" class="text-center">จำนวนเงิน</th>
                                                        <th>รายละเอียด</th>
                                                        <th width="80" class="text-center">สถานะ</th>

                                                         
                                                    </tr>
                                                </thead>
                                                <tbody id="tbody_trans">
                                                    <?php
                                                    $i_rows = 1;

                                                    $level_member = $this->session->userdata('i_level');

                                                     
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
                                                                        <?= $data->bl_s_account_no; ?> <br /><img src='<?=base_url();?>uploads/bank/<?= $data->b_s_icon; ?>' width='25'> 
                                                                        <?= $data->bank_name; ?>
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <?= $data->s_channel; ?>
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <?= $amount; ?>
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
                                    </div>
                                </div>

                            </div>
                        </div>


                </div>



            </div>

        </div>
    </div>
<form method="post" id="form_find">
<input type="hidden" id="andsqlbank" name="andsqlbank" value="<?=$andsqlbank;?>"/>
<input type="hidden" id="sql_day_back" name="sql_day_back" value="1"/>
</form>
</div>
<style>
	.class_tr_new td{
		background-color: #ffcaca;
	}
</style>	

<style>
	.class_tr_newall td{
		 
	}
	.class_border_bottom{
		border-bottom : 1px dotted #cccccc;
	}
</style>
<style>
 
    .panel {
        margin-bottom: 20px;
        background-color: #fff;
        border: 1px solid transparent;
        border-radius: 4px;
        -webkit-box-shadow: 0 1px 1px rgba(0,0,0,.05);
        box-shadow: 0 1px 1px rgba(0,0,0,.05)}
    .panel-body {
        padding: 15px}
    .panel-heading {
        padding: 10px 15px;
        border-bottom: 1px solid transparent;
        border-top-left-radius: 3px;
        border-top-right-radius: 3px}
    .panel-heading>.dropdown .dropdown-toggle {
        color: inherit}
    .panel-title {
        margin-top: 0;
        margin-bottom: 0;
        font-size: 16px;
        color: inherit}
    .panel-title>.small,.panel-title>.small>a,.panel-title>a,.panel-title>small,.panel-title>small>a {
        color: inherit}
    .panel-footer {
        padding: 10px 15px;
        background-color: #f5f5f5;
        border-top: 1px solid #ddd;
        border-bottom-right-radius: 3px;
        border-bottom-left-radius: 3px}
    .panel>.list-group,.panel>.panel-collapse>.list-group {
        margin-bottom: 0}
    .panel>.list-group .list-group-item,.panel>.panel-collapse>.list-group .list-group-item {
        border-width: 1px 0;
        border-radius: 0}
    .panel>.list-group:first-child .list-group-item:first-child,.panel>.panel-collapse>.list-group:first-child .list-group-item:first-child {
        border-top: 0;
        border-top-left-radius: 3px;
        border-top-right-radius: 3px}
    .panel>.list-group: last-child .list-group-item: last-child,.panel>.panel-collapse>.list-group: last-child .list-group-item: last-child {
        border-bottom: 0;
        border-bottom-right-radius: 3px;
        border-bottom-left-radius: 3px}
    .panel>.panel-heading+.panel-collapse>.list-group .list-group-item:first-child {
        border-top-left-radius: 0;
        border-top-right-radius: 0}
    .panel-heading+.list-group .list-group-item:first-child {
        border-top-width: 0}
    .list-group+.panel-footer {
        border-top-width: 0}
    .panel>.panel-collapse>.table,.panel>.table,.panel>.table-responsive>.table {
        margin-bottom: 0}
    .panel>.panel-collapse>.table caption,.panel>.table caption,.panel>.table-responsive>.table caption {
        padding-right: 15px;
        padding-left: 15px}
    .panel>.table-responsive:first-child>.table:first-child,.panel>.table:first-child {
        border-top-left-radius: 3px;
        border-top-right-radius: 3px}
    .panel>.table-responsive:first-child>.table:first-child>tbody:first-child>tr:first-child,.panel>.table-responsive:first-child>.table:first-child>thead:first-child>tr:first-child,.panel>.table:first-child>tbody:first-child>tr:first-child,.panel>.table:first-child>thead:first-child>tr:first-child {
        border-top-left-radius: 3px;
        border-top-right-radius: 3px}
    .panel>.table-responsive:first-child>.table:first-child>tbody:first-child>tr:first-child td:first-child,.panel>.table-responsive:first-child>.table:first-child>tbody:first-child>tr:first-child th:first-child,.panel>.table-responsive:first-child>.table:first-child>thead:first-child>tr:first-child td:first-child,.panel>.table-responsive:first-child>.table:first-child>thead:first-child>tr:first-child th:first-child,.panel>.table:first-child>tbody:first-child>tr:first-child td:first-child,.panel>.table:first-child>tbody:first-child>tr:first-child th:first-child,.panel>.table:first-child>thead:first-child>tr:first-child td:first-child,.panel>.table:first-child>thead:first-child>tr:first-child th:first-child {
        border-top-left-radius: 3px}
    .panel>.table-responsive:first-child>.table:first-child>tbody:first-child>tr:first-child td: last-child,.panel>.table-responsive:first-child>.table:first-child>tbody:first-child>tr:first-child th: last-child,.panel>.table-responsive:first-child>.table:first-child>thead:first-child>tr:first-child td: last-child,.panel>.table-responsive:first-child>.table:first-child>thead:first-child>tr:first-child th: last-child,.panel>.table:first-child>tbody:first-child>tr:first-child td: last-child,.panel>.table:first-child>tbody:first-child>tr:first-child th: last-child,.panel>.table:first-child>thead:first-child>tr:first-child td: last-child,.panel>.table:first-child>thead:first-child>tr:first-child th: last-child {
        border-top-right-radius: 3px}
    .panel>.table-responsive: last-child>.table: last-child,.panel>.table: last-child {
        border-bottom-right-radius: 3px;
        border-bottom-left-radius: 3px}
    .panel>.table-responsive: last-child>.table: last-child>tbody: last-child>tr: last-child,.panel>.table-responsive: last-child>.table: last-child>tfoot: last-child>tr: last-child,.panel>.table: last-child>tbody: last-child>tr: last-child,.panel>.table: last-child>tfoot: last-child>tr: last-child {
        border-bottom-right-radius: 3px;
        border-bottom-left-radius: 3px}
    .panel>.table-responsive: last-child>.table: last-child>tbody: last-child>tr: last-child td:first-child,.panel>.table-responsive: last-child>.table: last-child>tbody: last-child>tr: last-child th:first-child,.panel>.table-responsive: last-child>.table: last-child>tfoot: last-child>tr: last-child td:first-child,.panel>.table-responsive: last-child>.table: last-child>tfoot: last-child>tr: last-child th:first-child,.panel>.table: last-child>tbody: last-child>tr: last-child td:first-child,.panel>.table: last-child>tbody: last-child>tr: last-child th:first-child,.panel>.table: last-child>tfoot: last-child>tr: last-child td:first-child,.panel>.table: last-child>tfoot: last-child>tr: last-child th:first-child {
        border-bottom-left-radius: 3px}
    .panel>.table-responsive: last-child>.table: last-child>tbody: last-child>tr: last-child td: last-child,.panel>.table-responsive: last-child>.table: last-child>tbody: last-child>tr: last-child th: last-child,.panel>.table-responsive: last-child>.table: last-child>tfoot: last-child>tr: last-child td: last-child,.panel>.table-responsive: last-child>.table: last-child>tfoot: last-child>tr: last-child th: last-child,.panel>.table: last-child>tbody: last-child>tr: last-child td: last-child,.panel>.table: last-child>tbody: last-child>tr: last-child th: last-child,.panel>.table: last-child>tfoot: last-child>tr: last-child td: last-child,.panel>.table: last-child>tfoot: last-child>tr: last-child th: last-child {
        border-bottom-right-radius: 3px}
    .panel>.panel-body+.table,.panel>.panel-body+.table-responsive,.panel>.table+.panel-body,.panel>.table-responsive+.panel-body {
        border-top: 1px solid #ddd}
    .panel>.table>tbody:first-child>tr:first-child td,.panel>.table>tbody:first-child>tr:first-child th {
        border-top: 0}
    .panel>.table-bordered,.panel>.table-responsive>.table-bordered {
        border: 0}
    .panel>.table-bordered>tbody>tr>td:first-child,.panel>.table-bordered>tbody>tr>th:first-child,.panel>.table-bordered>tfoot>tr>td:first-child,.panel>.table-bordered>tfoot>tr>th:first-child,.panel>.table-bordered>thead>tr>td:first-child,.panel>.table-bordered>thead>tr>th:first-child,.panel>.table-responsive>.table-bordered>tbody>tr>td:first-child,.panel>.table-responsive>.table-bordered>tbody>tr>th:first-child,.panel>.table-responsive>.table-bordered>tfoot>tr>td:first-child,.panel>.table-responsive>.table-bordered>tfoot>tr>th:first-child,.panel>.table-responsive>.table-bordered>thead>tr>td:first-child,.panel>.table-responsive>.table-bordered>thead>tr>th:first-child {
        border-left: 0}
    .panel>.table-bordered>tbody>tr>td: last-child,.panel>.table-bordered>tbody>tr>th: last-child,.panel>.table-bordered>tfoot>tr>td: last-child,.panel>.table-bordered>tfoot>tr>th: last-child,.panel>.table-bordered>thead>tr>td: last-child,.panel>.table-bordered>thead>tr>th: last-child,.panel>.table-responsive>.table-bordered>tbody>tr>td: last-child,.panel>.table-responsive>.table-bordered>tbody>tr>th: last-child,.panel>.table-responsive>.table-bordered>tfoot>tr>td: last-child,.panel>.table-responsive>.table-bordered>tfoot>tr>th: last-child,.panel>.table-responsive>.table-bordered>thead>tr>td: last-child,.panel>.table-responsive>.table-bordered>thead>tr>th: last-child {
        border-right: 0}
    .panel>.table-bordered>tbody>tr:first-child>td,.panel>.table-bordered>tbody>tr:first-child>th,.panel>.table-bordered>thead>tr:first-child>td,.panel>.table-bordered>thead>tr:first-child>th,.panel>.table-responsive>.table-bordered>tbody>tr:first-child>td,.panel>.table-responsive>.table-bordered>tbody>tr:first-child>th,.panel>.table-responsive>.table-bordered>thead>tr:first-child>td,.panel>.table-responsive>.table-bordered>thead>tr:first-child>th {
        border-bottom: 0}
    .panel>.table-bordered>tbody>tr: last-child>td,.panel>.table-bordered>tbody>tr: last-child>th,.panel>.table-bordered>tfoot>tr: last-child>td,.panel>.table-bordered>tfoot>tr: last-child>th,.panel>.table-responsive>.table-bordered>tbody>tr: last-child>td,.panel>.table-responsive>.table-bordered>tbody>tr: last-child>th,.panel>.table-responsive>.table-bordered>tfoot>tr: last-child>td,.panel>.table-responsive>.table-bordered>tfoot>tr: last-child>th {
        border-bottom: 0}
    .panel>.table-responsive {
        margin-bottom: 0;
        border: 0}
    .panel-group {
        margin-bottom: 20px}
    .panel-group .panel {
        margin-bottom: 0;
        border-radius: 4px}
    .panel-group .panel+.panel {
        margin-top: 5px}
    .panel-group .panel-heading {
        border-bottom: 0}
    .panel-group .panel-heading+.panel-collapse>.list-group,.panel-group .panel-heading+.panel-collapse>.panel-body {
        border-top: 1px solid #ddd}
    .panel-group .panel-footer {
        border-top: 0}
    .panel-group .panel-footer+.panel-collapse .panel-body {
        border-bottom: 1px solid #ddd}

    .panel-default {
        border-color: #ddd}
    .panel-default>.panel-heading {
        color: #333;
        background-color: #f5f5f5;
        border-color: #ddd}
    .panel-default>.panel-heading+.panel-collapse>.panel-body {
        border-top-color: #ddd}
    .panel-default>.panel-heading .badge {
        color: #f5f5f5;
        background-color: #333}
    .panel-default>.panel-footer+.panel-collapse>.panel-body {
        border-bottom-color: #ddd}
    .panel-primary {
        border-color: #337ab7}
    .panel-primary>.panel-heading {
        color: #fff;
        background-color: #337ab7;
        border-color: #337ab7}
    .panel-primary>.panel-heading+.panel-collapse>.panel-body {
        border-top-color: #337ab7}
    .panel-primary>.panel-heading .badge {
        color: #337ab7;
        background-color: #fff}
    .panel-primary>.panel-footer+.panel-collapse>.panel-body {
        border-bottom-color: #337ab7}
    .panel-success {
        border-color: #d6e9c6}
    .panel-success>.panel-heading {
        color: #3c763d;
        background-color: #dff0d8;
        border-color: #d6e9c6}
    .panel-success>.panel-heading+.panel-collapse>.panel-body {
        border-top-color: #d6e9c6}
    .panel-success>.panel-heading .badge {
        color: #dff0d8;
        background-color: #3c763d}
    .panel-success>.panel-footer+.panel-collapse>.panel-body {
        border-bottom-color: #d6e9c6}
    .panel-info {
        border-color: #bce8f1}
    .panel-info>.panel-heading {
        color: #31708f;
        background-color: #d9edf7;
        border-color: #bce8f1}
    .panel-info>.panel-heading+.panel-collapse>.panel-body {
        border-top-color: #bce8f1}
    .panel-info>.panel-heading .badge {
        color: #d9edf7;
        background-color: #31708f}
    .panel-info>.panel-footer+.panel-collapse>.panel-body {
        border-bottom-color: #bce8f1}
    .panel-warning {
        border-color: #faebcc}
    .panel-warning>.panel-heading {
        color: #8a6d3b;
        background-color: #fcf8e3;
        border-color: #faebcc}
    .panel-warning>.panel-heading+.panel-collapse>.panel-body {
        border-top-color: #faebcc}
    .panel-warning>.panel-heading .badge {
        color: #fcf8e3;
        background-color: #8a6d3b}
    .panel-warning>.panel-footer+.panel-collapse>.panel-body {
        border-bottom-color: #faebcc}
    .panel-danger {
        border-color: #ebccd1}
    .panel-danger>.panel-heading {
        color: #a94442;
        background-color: #f2dede;
        border-color: #ebccd1}
    .panel-danger>.panel-heading+.panel-collapse>.panel-body {
        border-top-color: #ebccd1}
    .panel-danger>.panel-heading .badge {
        color: #f2dede;
        background-color: #a94442}
    .panel-danger>.panel-footer+.panel-collapse>.panel-body {
        border-bottom-color: #ebccd1}

</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script>
    
    $('.btn-show-views').click(function () {
        var id = $(this).attr('data-id');
        if ($(this).hasClass('hide')) {
            $(this).addClass('show');
            $(this).removeClass('hide');
            $('#collapse'+id).fadeOut(100);
        } else if ($(this).hasClass('show')) {
            $(this).addClass('hide');
            $(this).removeClass('show');
            $('#collapse'+id).fadeIn(100);
        }
    });
    
    
    function load_transaction_new(){
	var url = main_base_url+"main/detailautoall_new_find";
	var urls = main_base_url+"main/detailautoalls_new_find";
	var andsqlbank = $('#form_find').serialize();
	//alert(andsqlbank)
	
	$.ajax({
        type: 'POST',
        url: urls,
        data : andsqlbank,
       
        beforeSend: function ()
        {
            //$('#se-pre-con').fadeIn(100);
        },
        success: function (data) {

                //alert(andsqlbank)
                res = JSON.parse(data);
                var append_msg = "";
                var i_rows = 1;
                
                $.each(res, function (j, item) {
                    
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
											 append_msg +="<td class=\"text-center class_border_bottom\"  >#</td>";
											 append_msg +="<td class='class_border_bottom'>"+item.d_datetime+"</td>";
											 append_msg +="<td class=\"text-center class_border_bottom\"><img src='<?=base_url();?>uploads/bank/"+item.b_s_icon+"' width='25'> "+item.bl_s_account_no+"</td>";
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
                    });


				 
        },
        error: function (data) {

        }

    });
	
	$.ajax({
        type: 'POST',
        url: url,
       
        beforeSend: function ()
        {
            //$('#se-pre-con').fadeIn(100);
        },
        success: function (data) {

                res = JSON.parse(data);
                var append_msg = "";
                var i_rows = 1;
                
                $.each(res, function (j, item) {
                    
                    
											  
											 var append_msg ="<tr id='tr_transaction"+item.id+"' class='class_tr'>";
											 append_msg +="<td class=\"text-center class_border_bottom\"  >N</td>";
											 append_msg +="<td class='class_border_bottom'>"+item.d_datetime+"</td>";
											 append_msg +="<td class=\"text-center class_border_bottom\"><img src='<?=base_url();?>uploads/bank/"+item.b_s_icon+"' width='25'> "+item.bl_s_account_no+"</td>";
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
                    });


				 
        },
        error: function (data) {

        }

    });
    
    
}
load_transaction_new();
setInterval(function() { load_transaction_new(); },30000);
</script>