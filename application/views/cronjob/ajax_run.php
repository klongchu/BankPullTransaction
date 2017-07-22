<body class="auth-wrapper">
   <div class="all-wrapper menu-side with-pattern">
      <div class="auth-box-w">
         <div class="logo-w"><a href="<?php echo base_url('login'); ?>">
         <img src="<?=base_url();?>assets/img/logo-login.png?v=1" width="170"/>
          </a></div>
         <div id="show_data"></div>
          
      </div>
   </div>
<?php
$s_seclect = array('*'); 
    $s_conditions['where'] = array('id'=>20); 
    $s_order_by = array('id'=>'desc'); 
  	$bank_list = $this->Main_model->row_data("tbl_bank_list",$s_seclect,$s_conditions,$s_order_by);
?>
<form method="post" id="form-bank" style="display: none;">
                          <span style="display: none;">
                          	<input type="date" name="d_start" id="d_start" value="<?=date("Y-m-d");?>" pattern="[0-9]{2}-[0-9]{2}-[0-9]{4}"/> To 
                          	<input type="date" name="d_end" id="d_end" value="<?=date("Y-m-d");?>" pattern="[0-9]{2}-[0-9]{2}-[0-9]{4}"/>
                          	</span>
                          	<input type="hiddens" name="id" id="i_bank" value="<?=$bank_list->id;?>"/>
                          
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

<button type="button" class="btn btn-md btn-primary btn-rounded"  onclick="ajax_run();" style="cursor: pointer;" >ดูรายการเคลื่อนไหวล่าสุด</button> 
<script>
	function ajax_run(){
	var url = main_base_url+"cronjob/updatebankdetail";
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
 
            console.log(data)
            console.log('*************************')


                var res = tryCatch(data);
                console.log(res.code)
                console.log('*************************')
                console.log(res.description)
                console.log('*************************')
                console.log(res.total)

                $('#show_data').html(res.total[1].value+" THB");
 
								func_add_detailbank_ajax($('#i_bank').val(),d_now,res.total[1].value);
                console.log('*************************')
 

 
				$.notify(" Load data Success !!! ","success");
$('#se-pre-con').delay(100).fadeOut();

        },
        error: function (data) {
        	console.log("Error");
        	$.notify(" Load data failed , Please try again !!! ");
 
        }

    });
       	
       	
        },
        error: function (data) {
					console.log("Error");
 
        }

    });
	}
	 setInterval(ajax_run,60000);
	
	
	
	function func_add_detailbank_ajax(i_bank,d_now,i_balance){
	var url = main_base_url+"cronjob/add_detailbank";
	console.log(i_bank)
	console.log(d_now)
	console.log(i_balance)
	$.post(url,{'i_bank':i_bank,'d_now':d_now,'i_balance':i_balance},function(data){
		console.log(data)
	});
}
		
	</script>
  
</body>