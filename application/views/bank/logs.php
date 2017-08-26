<?php
  $date_3days = date('Y-m-d H:i:s', strtotime("-1 day", strtotime(date("Y-m-d H:i:s"))));
  $this->db->where('d_create <= ',$date_3days);
  $this->db->delete('tbl_logs');
  ?>
<div class="content-w">
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
        <li class="breadcrumb-item"><span>Logs</span></li>
         
    </ul>
    <!--<div class="content-panel-toggler"><i class="os-icon os-icon-grid-squares-22"></i><span>Sidebar</span></div>-->
    <div class="content-i">
        <div class="content-box">
            <div class="row">
                      	<div class="table-responsive">
                        <table class="table table-bordered table-lg table-v2 table-striped">
                          <thead  id="thead_trans">
                            <tr>
                              <th class="text-center">#</th>
                              <th>Bank</th>
                              <th>Bank Name</th>
                              <th>Response</th>
                              <th>Date</th>
                              <th>Type</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php
                          $i_rows = 1;
                          foreach($bank_logs as $data){
                          ?>
                            <tr >
                              <td class="text-center"><?=$i_rows?></td>
                              <td>
                              	<?=$data->s_bank;?>
                              </td>
                              <td>
                              <?=$data->s_account_name;?> <br />
                              <?=$data->s_account_no;?> 
                              
                              	
                              </td>
                              <td><?=$data->s_status;?> :: <?=$data->s_response;?></td>
                              <td class="text-center"><?=$data->d_create;?></td>
                              <td class="text-center"><?=$data->s_type;?></td>

                            </tr>
                            <?php $i_rows++;} ?>

                          </tbody>
                        </table>
                      </div>
 
            </div>
        </div>
    </div>
</div>

<?php
$cache_version = "1.0.1";
?>
