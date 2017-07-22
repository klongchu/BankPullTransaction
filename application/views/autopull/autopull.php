<body class="auth-wrapper">
   <div class="all-wrapper menu-side with-pattern">
      <div class="auth-box-w">
         <div class="logo-w"><a href="<?php echo base_url('login'); ?>">
         <img src="<?=base_url();?>assets/img/logo-login.png?v=1" width="170"/>
          </a></div>
         <div id="show_data"></div>
          
      </div>
   </div>

<script>
	function ajax_run(id){
	var url = main_base_url+"cronjob/updatebankdetail";
   console.log("<?=date('Y-m-d H:i:s');?>")
    $.ajax({
        type: 'POST',
        url: url,
        data: {'id':id},
        beforeSend: function ()
        {
            //$('#se-pre-con').fadeIn(100);
        },
        success: function (data) {
       	console.log(data);
       	console.log('*************************')
       	var json_res = JSON.parse(data);
       	var d_now = json_res.d_now;
//       	var api_url = json_res.s_url;
       	var api_url = "";
       	var api_data = data;
//       	console.log(api_url);
       	
       	
       	
       	
        },
        error: function (data) {
					console.log("Error");
 
        }

    });
	}
	 
	
	
	
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

<?php
$s_seclect = array('*'); 
    $s_conditions['where'] = array('i_status'=>1 , 'i_bank <> 3'); 
    $s_order_by = array('id'=>'desc'); 
  	$bank_list = $this->Main_model->fetch_data("tbl_bank_list",$s_seclect,$s_conditions,$s_order_by);
?>
<?php
foreach($bank_list as $data){
	echo $data->id."<br />";
	?>
	<script>
 ajax_run('<?=$data->id;?>');
		setInterval(function() { ajax_run('<?=$data->id;?>'); },60000);
	</script>
	<?php
}
?> 
  
</body>
