<script>
	function ajax_run_list(){
	var url = main_base_url+"cronjob/ajax_run_list";
 
    $.ajax({
        type: 'POST',
        url: url,
        beforeSend: function ()
        {
            //$('#se-pre-con').fadeIn(100);
        },
        success: function (data) {
       	console.log(data);  
       	$('#div_bank_list').html(data);  	

        },
        error: function (data) {
					console.log("Error");
 
        }

    });
	}
	 
	


	function ajax_run(id,bank){
	var url = main_base_url+"cronjob/updatebankdetailauto";
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
      	var api_url = json_res.s_url;
       	var api_data = data;
/**
* ******
*/
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

                $('#d_lastpull'+id).html(d_now);
                
 
//								func_add_detailbank_ajax(id,d_now,res.total[1].value);
								func_add_detailbank_ajax(id,data,bank);
                console.log('*************************')

				$.notify(" Load data Success !!! ","success");
$('#se-pre-con').delay(100).fadeOut();

        },
        error: function (data) {
        	console.log(data);
        	console.log("Error 1");
        	$.notify(" Load data failed , Please try again !!! ");
        	
      var url_error = main_base_url+"cronjob/posterror";
     //var json_error = JSON.parse(data);
      $.ajax({
        type: 'POST',
        url: url_error,
        data: {
        	'i_bank_list':id,
        	's_request':api_data,
        	's_response':data.statusText,
        	's_status':data.status,
        	's_account_name':json_res.s_account_name,
        	's_type':'Auto'
        	},
        success: function (data) {

        },
        error: function (data) {
 
        }

    });
 
        }

    });
       	
       	
       	
        },
        error: function (data) {
					console.log("Error 2");
					$.notify(" Load data failed 2 , Please try again !!! ");
 
        }

    });
	}
	 
	
	
	
//	function func_add_detailbank_ajax(i_bank,d_now,i_balance){
	function func_add_detailbank_ajax(i_bank,data,bank){
	var url = main_base_url+"cronjob/add_detailbankauto";
	console.log(i_bank)
	console.log('*************************')
	console.log(data)
	console.log('*************************')
	console.log(bank)
	console.log('*************************')
	/*console.log(d_now)
	console.log(i_balance)*/
	/*$.post(url,{'i_bank':i_bank,'d_now':d_now,'i_balance':i_balance},function(data){
		console.log(data)
	});*/
	$.post(url,{'i_bank':i_bank,'data':data,'bank':bank},function(data){
		console.log(data)
		$('#total_balance'+i_bank).html(data+" THB");
	});
}	
	
 
	</script>
<?php
$s_seclect = array('*'); 
$s_conditions['where'] = array('i_status'=>1 , 'i_bank <> 3'); 
$s_order_by = array('id'=>'desc'); 
$bank = $this->Main_model->fetch_data("tbl_bank_list",$s_seclect,$s_conditions,$s_order_by);
?>
<div class="content-w">
          <ul class="breadcrumb">
 
            <li class="breadcrumb-item"><h2 style="font-size: 18px;color: #ff0000">เพื่อให้ข้อมูลบัญชีอัพเดตตลอด โปรดอดอย่าปิดหน้านี้ !!!</h2></li>
          </ul>
          <!--<div class="content-panel-toggler"><i class="os-icon os-icon-grid-squares-22"></i><span>Sidebar</span></div>-->
          <div class="content-i">
            <div class="content-box">
            <div class="row">
                <div class="col-sm-12">
                  <div class="element-wrapper">
 
 
                    <div class="element-content">
                      <div class="row" id="div_bank_list">
 
            	
            	</div>
                    </div>
                  </div>
                </div>
              </div>
            	
            </div>
          </div>
        </div>

<script>
		ajax_run_list();
		setInterval(function() { ajax_run_list(); },60000);
	</script>
<script>
	window.onbeforeunload = function (e) {
    e = e || window.event;

    // For IE and Firefox prior to version 4
    if (e) {
        e.returnValue = 'Any string';
    }

    // For Safari
    return 'Any string';
};
</script>

 
  
 
