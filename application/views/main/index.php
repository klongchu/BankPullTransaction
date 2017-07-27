<div class="content-w">
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
        <li class="breadcrumb-item"><span><?= $title; ?></span></li>
    </ul>
    <!--<div class="content-panel-toggler"><i class="os-icon os-icon-grid-squares-22"></i><span>Sidebar</span></div>-->
    <div class="content-i">
        <div class="content-box">
            <div >
                <table width="100%" cellpadding="5">
                    <thead style="background-color: rgba(0, 0, 0, 0.05);line-height: 40px;">
                        <tr>
                            <th width="30" style="text-align: center;">#</th>
                            <th width="60" style="text-align: center;">Bank</th>

                            <th width="160">Acc No.</th>
                            <th>Info</th>
                            <th width="160">วันที่</th>
                            <th width="100" style="text-align: right;">ฝาก</th>
                            <th width="100" style="text-align: right;">ถอน</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i_rows = 1;
                        $i_bank = $data->id;
                        $s_seclect = array('*');
                        //$s_conditions['where'] = array("i_bank" => $i_bank);
                        $s_order_by = array('id' => 'desc');
                        $bank_list_q = $this->Main_model->fetch_data("tbl_bank_list", $s_seclect, $s_conditions, $s_order_by);
                        $level_member = $this->session->userdata('i_level');

                        $sql = ("
select 
t.* 
from 
(
select 'BAY' s_bank , i_bank_list, d_datetime,s_info,i_out , i_in ,i_posted, i_read from tbl_autopull_transaction_bay
union
select 'BBL' s_bank , i_bank_list, d_datetime,s_info,i_out , i_in ,i_posted, i_read  from tbl_autopull_transaction_bbl
union
select 'KBANK' s_bank , i_bank_list, d_datetime,s_info,i_out , i_in ,i_posted, i_read  from tbl_autopull_transaction_kbank
union
select 'KTB' s_bank , i_bank_list, d_datetime,s_info,i_out , i_in,i_posted, i_read  from tbl_autopull_transaction_ktb
union
select 'SCB' s_bank , i_bank_list, d_datetime,s_info,i_out , i_in,i_posted, i_read  from tbl_autopull_transaction_scb
) t
order by t.d_datetime desc
 ");
                        $query = $this->db->query($sql);
                        //if ($bank_list_q) {
                        if (1 == 1) {
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
                                    ?>
                                    <tr>
                                        <td class="text-center" ><?= $i_rows ?></td>
                                        <td  align="center">
                                            <div class="users-list-w ">
                                                <div class="col-sm-12">

                                                    <div class="user-w ">
                                                        <div class="user-avatar-w">
                                                            <div class="user-avatar" style="width:30px;"><?= img('uploads/bank/' . $bank->s_icon . '', '30'); ?></div>
                                                        </div>
                                                        <!--                                                    <div class="user-name">
                                                                                                                <div class="user-role"><?= $bank->s_name; ?></div>
                                                                                                            </div>-->

                                                    </div>

                                                </div>
                                            </div>

                                        </td>

                                        <td>
                                            <!--<?= $data->s_account_no; ?> --> 
                                            <?php
                                            $bank_no = explode("-", $bank_list->s_account_no);
                                            $bank_no2 = substr($bank_no[2], -4);
                                            ?>
                                            xxx-x-x<?= $bank_no2; ?>-<?= $bank_no[3]; ?> 
                                        </td>
                                        <td><?= $data->s_info; ?> </td>
                                        <td><?= $data->d_datetime; ?></td>
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
                            ?>

                        </tbody>
                    </table>    
                    <?php
                }
                ?> 

            </div>

        </div>
    </div>
</div>