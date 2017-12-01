<div class="content-w">
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?= base_url('bank/name/' . $bank->id); ?>"><?= $bank->s_name; ?></a></li>
        <li class="breadcrumb-item"><span><?= $bank_list->s_account_name; ?></span></li>
    </ul>
    <!--<div class="content-panel-toggler"><i class="os-icon os-icon-grid-squares-22"></i><span>Sidebar</span></div>-->
    <div class="content-i">
        <div class="content-box">
            <div class="row">
                <div class="col-sm-8">
                    <div class="element-wrapper">

                        <div class="users-list-w element-header">
                            <div class="col-sm-12">
                                <a href="<?= base_url('bank/name/' . $bank->id); ?>" style="text-decoration: none;">
                                    <div class="user-w with-status status-green">
                                        <div class="user-avatar-w">
                                            <div class="user-avatar"><?= img('uploads/bank/' . $bank->s_icon . '', '50'); ?></div>
                                        </div>
                                        <div class="user-name">
                                            <h6 class="user-title"><?= $bank_list->s_account_name; ?> 
                                            <?php if($bank->id != 7){ ?>
                                            [
                                                <!--<?= $bank_list->s_account_no; ?>-->
                                                <?php
                                                $bank_no = explode("-", $bank_list->s_account_no);
                                                $bank_no2 = substr($bank_no[2], -4);
                                                ?>
                                                xxx-x-x<?= $bank_no2; ?>-<?= $bank_no[3]; ?>

                                                ]
                                              <?php } ?>
                                              </h6>
                                            <div class="user-role"><?= $bank->s_name; ?> : <?= $bank->s_fname_en; ?></div>
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
                                            
                                            <?php
                                            if($bank_list->i_bank == 0){
																							?>
																							<input type="text" name="d_start" id="d_start" value="01/11/2017" pattern="[0-9]{2}-[0-9]{2}-[0-9]{4}"/> To 
                                            <input type="text" name="d_end" id="d_end" value="30/11/2017" pattern="[0-9]{2}-[0-9]{2}-[0-9]{4}"/>
																							<?php
																						}else{
																							?>
																							<input type="text" name="d_start" id="d_start" value="<?= date("d/m/Y"); ?>" pattern="[0-9]{2}/[0-9]{2}/[0-9]{4}"/> To 
                                            <input type="text" name="d_end" id="d_end" value="<?= date("d/m/Y"); ?>" pattern="[0-9]{2}/[0-9]{2}/[0-9]{4}"/>
																							<?php
																						}
                                            ?>
                                            
                                        </span>
                                        <input type="hidden" name="id" id="i_bank" value="<?= $bank_list->id; ?>"/>
                                        <input type="hidden" name="bank" id="bank" value="<?=strtolower($bank->s_name);?>"/>

                                        <?php
                                        if ($bank_list->i_bank == 3) {
                                            ?>

                                            <p> Captcha : <img id="captcha" src="<?php echo base_url(); ?>assets/img/preloader.gif" width="150" height="50"/>
                                                <button class="btn btn-sm btn-primary btn-rounded" id="btn-getCaptcha" onclick="GetCaptcha()" type="button" style="cursor: pointer;">GetCaptcha</button>
                                            </p>
                                            <p><input type="text" id="imageCode" name="imageCode" value="" class="form-control" autocomplete="off" placeholder="Captcha"/>
                                            </p>
                                            <input type="hidden" name="folder_domain" id="folder_domain" value="<?= $this->session->userdata('wc_folder_domain'); ?>">
                                            <button type="button" class="btn btn-md btn-primary btn-rounded" id="UpdateBankDetail" data-id="<?= $bank_list->id; ?>" style="cursor: pointer;" >ดูรายการเคลื่อนไหวล่าสุด</button> 


                                            <?php
                                        } else {
                                            ?>
                                            <button type="button" class="btn btn-md btn-primary btn-rounded" id="UpdateBankDetail" data-id="<?= $bank_list->id; ?>" style="cursor: pointer;" >ดูรายการเคลื่อนไหวล่าสุด</button>  
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
                        <div class="label">Balance : Lasted <span id="d_now"><?= $bank_list->d_lastpull; ?></span></div>
                        <div class="value" id="div_total"><?=$bank_list->i_balance; ?><!--<?= $bank_list->i_balance; ?>--> THB</div>
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
        </div>
    </div>
</div>

<?php
$cache_version = "1.0.1";
?>


