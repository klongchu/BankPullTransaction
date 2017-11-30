//Used With JS
$('#UpdateBankDetail').click(function(){
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
            $('#se-pre-con').fadeIn(100);
        },
        success: function (data) {
            if (data == "") {
                console.log("Process is Null.");
                //$('#se-pre-con').delay(100).fadeOut();
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

                $('#div_total').html(res.total[6].value+" THB");
								$('#d_now').html(d_now);
								func_add_detailbank($('#i_bank').val(),d_now,res.total[6].value);
								/*
                console.log('*************************')
                console.log(res.transaction)
                var append_msg = "";
                var i_rows = 1;
                $.each(res.transaction, function (j, item) {

                        console.log(item.datetime + " | " + item.info + " | " + item.out + " | " + item.in + " | " + item.type + " | " + item.bankno + " | " + item.channel);
console.log('*************************')

                    append_msg +="<tr><td>"+i_rows+"</td><td>"+item.datetime+"</td><td>"+item.info+"</td><td>"+item.out+"</td><td>"+item.in+"</td><td>"+item.type+"</td><td>"+item.bankno+"</td><td>"+item.channel+"</td></tr>";
                    i_rows++;
                    });

				var append_thead_trans = "<tr> <th class='text-center'>#</th> <th>วันที่</th> <th>รายการ</th> <th>ถอน</th> <th>ฝาก</th> <th>Type</th><th>Bank No</th> <th>ช่องทาง</th> </tr>";
				$('#thead_trans').append(append_thead_trans);
				if(i_rows > 1){
					$('#tbody_trans').append(append_msg);
				}else{
					append_msg = "<tr><td colspan='8' align='center'> no data available in table </td></tr>";
					$('#tbody_trans').append(append_msg);
				}
				console.log(append_thead_trans);
				//*/
				
				
				console.log(data)
				console.log('***************************')
				var i_bank = $('#i_bank').val();
				var bank = $('#bank').val();
				var url_cron = main_base_url+"cronjob/add_detailbankauto";
				$.post(url_cron,{'i_bank':i_bank,'data':data,'bank':bank},function(data){	
				var urls = main_base_url+"main/detailautoalls_new_find";
//	var andsqlbank = $('#form_find').serialize();
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

                console.log(andsqlbank)
                console.log(data)
                console.log('***************************')
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
});
 