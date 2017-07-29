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
                    $i_bank = $data->id;
                    $s_seclect = array('*');
//$s_conditions['where'] = array("i_bank" => $i_bank);
                    $s_order_by = array('id' => 'desc');
                    $bank_list_q = $this->Main_model->fetch_data("tbl_bank_list", $s_seclect, $s_conditions, $s_order_by);
                    foreach ($bank_list_q as $bank_list) {
                        $s_seclect = array('*');
                        $s_conditions['where'] = array("id" => $bank_list->i_bank);
                        $s_order_by = array('id' => 'desc');
                        $bank = $this->Main_model->row_data("tbl_bank", $s_seclect, $s_conditions, $s_order_by);

                        $sql = " select i_balance,d_create from tbl_autopull where i_bank_list = '" . $bank_list->id . "' order by id desc  ";
                        $bank_balance = $this->db->query($sql)->row();
                        $i_balance_ss = ($bank_balance->i_balance < 1 ? 0 : $bank_balance->i_balance);
                        $bank_no = explode("-", $bank_list->s_account_no);
                        $bank_no2 = substr($bank_no[2], -4);
                        ?>

                        <div class="col-sm-6">
                            <div class="element-box el-tablo" style="padding-right: 1px; ">
                                <div class="label">Balance : Lasted <span id="d_now"><?= $bank_balance->d_create; ?></span></div>
                                <div class="users-list-w element-header">

                                    <div class="user-w with-status status-green">
                                        <div class="user-avatar-w">
                                            <div class="user-avatar"><?= img('uploads/bank/' . $bank->s_icon . '', '50'); ?></div>
                                        </div>
                                        <div class="user-name">
    <!--                                            <h6 class="user-title"><?= $data->s_name; ?> <?= $bank->s_name; ?></h6>-->
                                            <div class="user-role">xxx-x-x<?= $bank_no2; ?>-<?= $bank_no[3]; ?></div>
                                            <h6 class="user-title"><?= $i_balance_ss; ?> THB</h6>
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
                                                        <th>Info</th>

                                                        <th width="70" style="text-align: right;">ฝาก</th>
                                                        <th width="70" style="text-align: right;">ถอน</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tbody_trans<?=$bank_list->id;?>">
                                                    <?php
                                                    $i_rows = 1;

                                                    $level_member = $this->session->userdata('i_level');

                                                    $table_transaction = "tbl_autopull_transaction_" . strtolower($bank->s_name);
                                                    $sql = "select * from " . $table_transaction . " where i_bank_list = '" . $bank_list->id . "' order by d_datetime desc limit 10 ";
                                                    $query = $this->db->query($sql);
//if ($bank_list_q) {
                                                    if ($query->num_rows() > 0) {
                                                        ?>
                                                        <?php
                                                        foreach ($query->result() as $data) {
                                                            //foreach ($bank_list_q as $data) {

                                                            $s_seclect = array('*');
                                                            $s_conditions['where'] = array("id" => $data->i_bank_list);
                                                            //$s_order_by = array('id' => 'desc');
                                                            $bank_list = $this->Main_model->row_data("tbl_bank_list", $s_seclect, $s_conditions, $s_order_by);

                                                            $s_seclect = array('*');
                                                            $s_conditions['where'] = array("id" => $bank_list->i_bank);
                                                            //$s_order_by = array('id' => 'desc');
                                                            $bank = $this->Main_model->row_data("tbl_bank", $s_seclect, $s_conditions, $s_order_by);
                                                            if ($bank_list->id > 0) {
                                                                $bgcolor = ($i++ & 1) ? "#e4e6ec" : "#d1d8e6";
                                                                ?>
                                                                <tr bgcolor="<?= $bgcolor; ?>" id="tr_transaction<?=$bank_list->id;?><?=$data->id;?>">
                                                                    <td class="text-center" ><?= $i_rows ?></td>



                                                                    <td>
                                                                        <?= $data->s_info; ?><br />
                                                                        <?= $data->d_datetime; ?>
                                                                    </td>

                                                                    <td class="text-right">
                                                                        <?= $data->i_in; ?>
                                                                    </td>
                                                                    <td class="text-right">
                                                                        <?= $data->i_out; ?>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                                $i_rows++;
                                                            }
                                                        }
                                                    } else {
                                                        ?>
                                                        <tr id="tr_notfound<?=$bank_list->id;?>">
                                                            <td colspan="4" class="text-center">No Transaction</td>
                                                        </tr>                                       
                                                    <?php } ?>

                                                </tbody>



                                            </table>  

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    <?php } ?>
                </div>



            </div>

        </div>
    </div>
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
	var url = main_base_url+"bank/detailautoall";
	var urls = main_base_url+"bank/detailautoalls";
	
	$.ajax({
        type: 'POST',
        url: urls,
       
        beforeSend: function ()
        {
            //$('#se-pre-con').fadeIn(100);
        },
        success: function (data) {

                res = JSON.parse(data);
                var append_msg = "";
                var i_rows = 1;
                
                $.each(res, function (j, item) {
                    
                    
											 var append_msg ="<tr id='tr_transaction"+item.i_bank_list+item.id+"' class='class_tr'><td class=\"text-center class_border_bottom\"  >#</td><td class='class_border_bottom'>"+item.s_info+" <br />"+item.d_datetime+"</td><td class=\"text-right class_border_bottom\">"+item.i_in+"</td><td class=\"text-right class_border_bottom\">"+item.i_out+"</td></tr>";
										


                    i_rows++;
                    $('#tr_transaction'+item.i_bank_list+item.id).remove();
                    $('#tbody_trans'+item.i_bank_list).prepend(append_msg);
										$('#tr_notfound'+item.i_bank_list).remove();
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
                    
                    
											 var append_msg ="<tr id='tr_transaction"+item.i_bank_list+item.id+"' class='class_tr_new'><td class=\"text-center class_border_bottom\">N</td><td class='class_border_bottom'>"+item.s_info+" <br />"+item.d_datetime+"</td><td class=\"text-right class_border_bottom\">"+item.i_in+"</td><td class=\"text-right class_border_bottom\">"+item.i_out+"</td></tr>";
										


                    i_rows++;
                    $('#tr_transaction'+item.i_bank_list+item.id).remove();
                    $('#tbody_trans'+item.i_bank_list).prepend(append_msg);
										$('#tr_notfound'+item.i_bank_list).remove();
                    });


				 
        },
        error: function (data) {

        }

    });
    
    
}
load_transaction_new();
setInterval(function() { load_transaction_new(); },30000);
</script>