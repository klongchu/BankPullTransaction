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
                $('#se-pre-con').delay(100).fadeOut();
                $.notify(" Load data failed , Please try again !!! ");
                return;
            }
//            debugger;
            $('#thead_trans').html("");
            $('#tbody_trans').html("");
            console.log(data)
            console.log('*************************')


                var res = tryCatch(data);
                console.log(res.code)
                console.log('*************************')
                console.log(res.description)
                console.log('*************************')
                console.log(res.total)

                var balance_new = res.total[3].value.split('THB');
                $('#div_total').html(balance_new[0]+" THB");
								$('#d_now').html(d_now);
								func_add_detailbank($('#i_bank').val(),d_now,balance_new[0]);
                console.log('*************************')
                console.log(res.transaction)
                var append_msg = "";
                var i_rows = 1;
                $.each(res.transaction, function (j, item) {

                        console.log(item.datetime + " | " + item.info + " | " + item.out + " | " + item.in + " | " + item.total + " | " + item.channel);
console.log('*************************')

                    append_msg +="<tr><td>"+i_rows+"</td><td>"+item.datetime+"</td><td>"+item.info+"</td><td>"+item.out+"</td><td>"+item.in+"</td><td>"+item.total+"</td><td>"+item.channel+"</td></tr>";
                    i_rows++;
                    });

				var append_thead_trans = "<tr> <th class='text-center'>#</th> <th>วันที่</th> <th>รายการ</th> <th>ถอน</th> <th>ฝาก</th> <th>คงเหลือ</th> <th>ช่องทาง</th> </tr>";
				
				$('#thead_trans').append(append_thead_trans);
				if(i_rows > 1){
					$('#tbody_trans').append(append_msg);
				}else{
					append_msg = "<tr><td colspan='7' align='center'> no data available in table </td></tr>";
					$('#tbody_trans').append(append_msg);
				}
				
				console.log(append_thead_trans);


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
 