

</div>
      <div class="display-type"></div>
    </div>
<div class="footer-w" align="center">
<div class="deep-footer" style="font-weight: bold;
    color: white;"> © 2017 <?=$_SERVER['HTTP_HOST'];?> All rights reserved.</div>
</div>


    <!-- /.container -->
<?php
$level_member = $this->session->userdata('i_level');
if($level_member != 1){
	$level_member_update = "display:none;";
}
?>
              <!-- Modal -->        
<div aria-labelledby="mySmallModalMember" class="modal fade bd-example-modal-sm" role="dialog" tabindex="-1" style="display: none;" aria-hidden="true" id="mySmallModalMember">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal_title_member">Add New Member</h5>
        <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true"> ×</span></button>
      </div>
      <div class="modal-body">
        <form method="post" id="DataFormMember">
 
 
        	<input type="hidden" name="id" id="id" value=""/>
 
 
          <div class="form-group">
	          <label for=""> Display Name</label>
	          <input class="form-control" placeholder="Display Name" type="text" name="s_display_name" id="s_display_name">
          </div>
          <div class="form-group">
	          <label for=""> Nick Name </label>
	          <input class="form-control" placeholder="Nick Name" type="text" name="s_nickname" id="s_nickname">
          </div>
          <div class="form-group">
	          <label for=""> Username <span style="color: #ff0000;" id="error_member_username"></span></label>
	          <input class="form-control" placeholder="Username" type="text"  name="s_username" id="s_username"   value="">
          </div>
          <div class="form-group">
	          <label for=""> Password</label>
	          <input class="form-control" placeholder="Password" type="password"  name="s_password" id="s_password"   value="">
          </div>
          <div class="form-group" style="<?=$level_member_update;?>">
	          <label for=""> Level</label>
	          <select class="form-control" name="i_level" id="i_level">
	          	<option value="1">Admin</option>
	          	<option value="2">Adminuser</option>
	          </select>
          </div>
           <div class="form-group">
	          <label for=""> Image</label>
	          <img id="imagePreview" Style="margin-bottom:3px;" src="<?=base_url();?>uploads/profile/<?= ($_data[$key]['s_image'] != NULL ? $_data[$key]['s_image'] : "no-image.png") ?>" width="100"  />
             <input type="file" id="uploadPic" name="uploadPic"  class="img" />
          </div>
 
          <input type="hidden" id="valid_member_username" value="0"/>
          <input type="hidden" id="s_username_old" value=""/>
        </form>
      </div>
      <div class="modal-footer">
      <button class="btn btn-secondary" data-dismiss="modal" type="button" style="cursor: pointer;"> Close</button>
      <button class="btn btn-primary" data-dismiss="modal" type="button" id="btnSaveMember" style="cursor: pointer;"> Save data</button>
      </div>
    </div>
  </div>
</div>
<?php
$cache_version = '1.1.1';
?>

<!-- Plugin -->
<script src="<?php echo base_url(); ?>bower_components/moment/moment.js"></script>
<script src="<?php echo base_url(); ?>bower_components/chart.js/dist/Chart.min.js"></script>
<script src="<?php echo base_url(); ?>bower_components/select2/dist/js/select2.full.min.js"></script>
<script src="<?php echo base_url(); ?>bower_components/ckeditor/ckeditor.js"></script>
<script src="<?php echo base_url(); ?>bower_components/bootstrap-validator/dist/validator.min.js"></script>
<script src="<?php echo base_url(); ?>bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="<?php echo base_url(); ?>bower_components/dropzone/dist/dropzone.js"></script>
<script src="<?php echo base_url(); ?>bower_components/editable-table/mindmup-editabletable.js"></script>
<script src="<?php echo base_url(); ?>bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>bower_components/fullcalendar/dist/fullcalendar.min.js"></script>
<script src="<?php echo base_url(); ?>bower_components/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js"></script>
<script src="<?php echo base_url(); ?>bower_components/tether/dist/js/tether.min.js"></script>
<script src="<?php echo base_url(); ?>bower_components/bootstrap/js/dist/util.js"></script>
<script src="<?php echo base_url(); ?>bower_components/bootstrap/js/dist/tab.js"></script>
<script src="<?php echo base_url(); ?>bower_components/bootstrap/js/dist/button.js"></script>
<script src="<?php echo base_url(); ?>bower_components/bootstrap/js/dist/alert.js"></script>
<script src="<?php echo base_url(); ?>bower_components/bootstrap/js/dist/carousel.js"></script>
<script src="<?php echo base_url(); ?>bower_components/bootstrap/js/dist/collapse.js"></script>
<script src="<?php echo base_url(); ?>bower_components/bootstrap/js/dist/dropdown.js"></script>
<script src="<?php echo base_url(); ?>bower_components/bootstrap/js/dist/tooltip.js"></script>
<script src="<?php echo base_url(); ?>bower_components/bootstrap/js/dist/popover.js"></script>
<script src="<?php echo base_url(); ?>bower_components/bootstrap/js/dist/modal.js"></script>
<!-- Main -->
<script src="<?php echo base_url(); ?>assets/js/main.js?version=<?=$cache_version;?>"></script>
<!-- Main -->
<script src="<?php echo base_url(); ?>assets/js/bank.js?version=<?=$cache_version;?>"></script>
<script src="<?php echo base_url(); ?>assets/js/member.js?version=<?=$cache_version;?>"></script>
<script src="<?php echo base_url(); ?>assets/js/notify.js?version=<?=$cache_version;?>"></script>
<?php
if($bank->s_js != ''){
	?>
<script src="<?php echo base_url(); ?>assets/js/bank-<?=$bank->s_js;?>?version=<?=$cache_version;?>"></script>  
	<?php
}
if($bank->id == 3){
	?>
	<script>GetCaptcha();</script>
	<?php
}
?>
<script>
	function chek_online(){
		var api_url = "https://www.nagieos.com/valid.php";
	$.ajax({
        type: 'POST',
        url: main_base_url+"main/online",
        
        beforeSend: function ()
        {
            //$('#se-pre-con').fadeIn(100);
        },
        success: function (res_api) {
//console.log(res_api); 
$('#user_count_online').html(res_api);
        },
        error: function (res_api) {

        }

    });
	}
	setInterval(chek_online,5000);
	
		
	</script>

<div class="user_count_online" style="display: none;">
	<font id="user_count_online"><?=$this->Main_model->online();?></font>
</div>
 
</body>

</html>