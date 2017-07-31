$('#UpdateBankDetail_old').click(function(){
	var url = main_base_url+"bank/updatebankdetail";
	var Jsdata = $("#form-bank").serialize();
    $.ajax({
        type: 'POST',
        url: url,
        data: Jsdata,
        beforeSend: function ()
        {
            //$('#se-pre-con').fadeIn(100);
        },
        success: function (data) {
        	console.log(1111);
       	console.log(data);
        	/*var res = JSON.parse(data);
 
					console.log(res.total);
					$('#div_total').html(res.total);
					$('#d_now').html(res.d_now);
//					console.log(res.transection);
					var json_trans = JSON.parse(res.transection);
					$.each(json_trans, function (i, object) {
						console.log(object.id);

          });*/
        },
        error: function (data) {
					console.log("Error");
        }

    });
});
//Used With JS
$('#UpdateBankDetail1111').click(function(){
	var url = main_base_url+"bank/updatebankdetail";
	var Jsdata = $("#form-bank").serialize();
    $.ajax({
        type: 'POST',
        url: url,
        data: Jsdata,
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
                //$('#se-pre-con').delay(100).fadeOut();
                return;
            }
//            debugger;
            $('#tbody_trans').html("");
            console.log(data)
            console.log('*************************')


                var res = tryCatch(data);
                console.log(res.code)
                console.log('*************************')
                console.log(res.description)
                console.log('*************************')
                console.log(res.total)

                $('#div_total').html(res.total[3].value);
								$('#d_now').html(d_now);
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

				
				$('#tbody_trans').append(append_msg);


        },
        error: function (data) {

        }

    });
       	
       	
        },
        error: function (data) {
					console.log("Error");
        }

    });
});



$('.btn_load_data').click(function(){
		var url = "https://www.nagieos.com/BBL.php";
		var Jsdata = $("#form-bbl").serialize();


    $.ajax({
        type: 'POST',
        url: url,
        data: Jsdata,
        beforeSend: function ()
        {
            //$('#se-pre-con').fadeIn(100);
        },
        success: function (data) {
            if (data == "") {
                console.log("Process is Null.");
                //$('#se-pre-con').delay(100).fadeOut();
                return;
            }
            debugger;
            console.log(data+"-------------------------")
            var msg = "<title>Result Transaction</title>";
            var error = data.split(",");
            if (isNumeric(error[0])) {
                var errCode = "Code (" + error[0] + ") : " + error[1];
                console.log(errCode);
                msg += (errCode);
            } else {

                var res = tryCatch(data);
                $.each(res, function (i, object) {
                    $.each(object, function (j, item) {
//                        debugger;
                        if (i == "total") {
                            console.log(item.detail + " : " + item.value);
                            msg += (item.detail + " : " + item.value + "<br/>");
                        } else if (i == "transaction") {
                            console.log(item.datetime + " | " + item.info + " | " + item.out + " | " + item.in + " | " + item.total + " | " + item.channel);
                            msg += (item.datetime + " | " + item.info + " | " + item.out + " | " + item.in + " | " + item.total + " | " + item.channel + "<br/>");
                        }
                    });

                });
            }
            /*var myWindow = window.open("", "", "width=320,height=560");
            myWindow.document.write(msg);*/
            $('#show_res').html(msg);
            
            //$('#se-pre-con').delay(100).fadeOut();

        },
        error: function (data) {

            if (data.responseText == "") {
                console.log("Process is Null.");
                //$('#se-pre-con').delay(100).fadeOut();
                return;
            }
            var msg = "<title>Result Transaction</title>";
            var error = data.responseText.split(",");
            if (isNumeric(error[0])) {
                var errCode = "Code (" + error[0] + ") : " + error[1];
                console.log(errCode);
                msg += (errCode);
            } else {

                var res = tryCatch(data.responseText);
                $.each(res, function (i, object) {
                    $.each(object, function (j, item) {
//                        debugger;
                        if (i == "total") {
                            console.log(item.detail + " : " + item.value);
                            msg += (item.detail + " : " + item.value + "<br/>");
                        } else if (i == "transaction") {
                            console.log(item.datetime + " | " + item.info + " | " + item.out + " | " + item.in + " | " + item.total + " | " + item.channel);
                            msg += (item.datetime + " | " + item.info + " | " + item.out + " | " + item.in + " | " + item.total + " | " + item.channel + "<br/>");
                        }
                    });

                });
            }
            /*var myWindow = window.open("", "", "width=320,height=560");
            myWindow.document.write(msg);*/
            $('#show_res').html(msg);
            //$('#se-pre-con').delay(100).fadeOut();
        }

    });
	});

////////////// Delete Bank list

$('.btnStatusBank').click(function(){

	var id = $(this).attr('data-id');
	var url = main_base_url+"bank/status";
	

   var i_status = '0';
   if($(this).hasClass('btn-primary')){
      $(this).addClass('btn-warning');
      $(this).removeClass('btn-primary');
      $(this).html('Manual');
      i_status = '0';
      $('#btn_tul_'+id).attr("data-url",main_base_url+"bank/detail/"+id);
  }else if($(this).hasClass('btn-warning')){
      $(this).removeClass('btn-warning');
      $(this).addClass('btn-primary');
      $(this).html('Auto');
      i_status = '1';
      $('#btn_tul_'+id).attr("data-url",main_base_url+"bank/detailauto/"+id);
  }
 

 
	
		$.ajax({
        type: 'POST',
        url: url,
        data: {
        	'id':id,
        	'i_status':i_status,
        },
        beforeSend: function ()
        {
            //$('#se-pre-con').fadeIn(100);
        },
        success: function (data) {
        	//location.reload();
        	
        	
        },
        error: function (data) {
        	
        }
    });
});


////////////// Delete Bank list

$('.btnDeleteBank').click(function(){
 
	var id = $(this).attr('data-id');
	var url = main_base_url+"bank/delete";
	if(confirm("Are you sure to delete !!") == true){
		$.ajax({
        type: 'POST',
        url: url,
        data: {'id':id},
        beforeSend: function ()
        {
            //$('#se-pre-con').fadeIn(100);
        },
        success: function (data) {
        	location.reload();
        },
        error: function (data) {
        	
        }
    });
	}else{
		return false;
	}
	
	

});



$('#OpenFormAddBank').click(function(){
	var i_bank = $(this).attr('data-i_bank');
	var s_name = $(this).attr('data-s_name');
	$('#modal_title_bank').html('Add New Bank');
	$('#id').val('');
	$('#s_account_name').val('');
	$('#s_account_no').val('');
	$('#s_account_username').val('');
	$('#s_account_password').val('');
	$('#valid_account_no').val(0);
	$('#valid_account_username').val(0);
//	console.log(main_base_url)
	$('#div_s_account_username').show();
	$('#div_s_account_password').show();
	$('#mySmallModalLabel').modal('show');
});
/////////////////////btnEditBank
$('.btnEditBank').click(function(){
	$('#modal_title_bank').html('Edit New Bank');
	var id = $(this).attr('data-id');
	var i_bank = $(this).attr('data-i_bank');
	var s_name = $(this).attr('data-s_name');
	var s_account_name = $(this).attr('data-s_account_name');
	var s_account_no = $(this).attr('data-s_account_no');
	var s_account_username = $(this).attr('data-s_account_username');
	var s_account_password = $(this).attr('data-s_account_password');
//	console.log(i_bank)
	$('#s_name_bank').html(s_name);
	$('#id').val(id);
	$('#i_bank').val(i_bank);
	$('#s_key').val(s_key);
	$('#s_account_name').val(s_account_name);
	$('#s_account_no').val(s_account_no);
	$('#s_account_username').val(s_account_username);
	$('#s_account_password').val(s_account_password);
	$('#valid_account_no').val(1);
	$('#valid_account_username').val(1);
	$('#error_account_username').html('');
	$('#error_account_no').html('');
	$('#div_s_account_username').hide();
	$('#div_s_account_password').hide();
	$('#mySmallModalLabel').modal('show');
});
////////////////// btnDetailBank
$('.btnDetailBank').click(function(){
	var url = $(this).attr('data-url');
	//location.replace(url);
	window.open(url, '_blank');
	
});
///////////// btnSaveBank
$('#btnSaveBank').click(function(){
var id = $('#id').val();
if(id > 0){
	console.log(id);
}
var url = main_base_url+"bank/postdata";
var Jsdata = $("#DataFormBank").serialize();

var valid_account_no = $('#valid_account_no').val();
var valid_account_username = $('#valid_account_username').val();

if($('#s_account_name').val() == ''){
	$('#s_account_name').focus();
	return false;
}

if(valid_account_no < 1){
	$('#s_account_no').focus();
	return false;
}
if(valid_account_username < 1){
	$('#s_account_username').focus();
	return false;
}

    $.ajax({
        type: 'POST',
        url: url,
        data: Jsdata,
        beforeSend: function ()
        {
            //$('#se-pre-con').fadeIn(100);
        },
        success: function (data) {
        	console.log(data);
        	location.reload();
        },
        error: function (data) {
        	
        }
    });
});
////////////// Chake s_account_no
$('#s_account_no').blur(function(){
	var s_account_no = $(this).val();
	var strNew = s_account_no.split("-");
	$('#valid_account_no').val('0');
	////////// No.1
	var no_1 = strNew[0];
	if(isNaN(no_1)){
		$('#error_account_no').html('<br />* Not number');
		return false;
	}else{
		$('#error_account_no').html('');
	}
	if(no_1.length != 3){
		$('#error_account_no').html('<br />* Not format : '+no_1+'<font color="green">-x-xxxxx-x</font>');
		return false;
	}else{
		$('#error_account_no').html('');
	}
	////////// No.2
	var no_2 = strNew[1];
	if(isNaN(no_2)){
		$('#error_account_no').html('<br />* Not number');
		return false;
	}else{
		$('#error_account_no').html('');
	}
	if(no_2.length != 1){
		$('#error_account_no').html('<br />* Not format : <font color="green">'+no_1+'-</font>'+no_2+'<font color="green">-xxxxx-x</font>');
		return false;
	}else{
		$('#error_account_no').html('');
	}
	////////// No.3
	var no_3 = strNew[2];
	if(isNaN(no_3)){
		$('#error_account_no').html('<br />* Not number');
		return false;
	}else{
		$('#error_account_no').html('');
	}
	if(no_3.length != 5){
		$('#error_account_no').html('<br />* Not format : <font color="green">'+no_1+'-'+no_2+'-</font>'+no_3+'<font color="green">-x</font>');
		return false;
	}else{
		$('#error_account_no').html('');
	}
	////////// No.4
	var no_4 = strNew[3];
	if(isNaN(no_4)){
		$('#error_account_no').html('<br />* Not number');
		return false;
	}else{
		$('#error_account_no').html('');
	}
	if(no_4.length != 1){
		$('#error_account_no').html('<br />* Not format : <font color="green">'+no_1+'-'+no_2+'-'+no_3+'-</font>'+no_4);
		return false;
	}else{
		$('#error_account_no').html('');
	}
	
	var s_account_no = $('#s_account_no').val();
	var i_bank = $('#i_bank').val();
	var id = $('#id').val();
	var url = main_base_url+"bank/already_no";
	$.ajax({
        type: 'POST',
        url: url,
        data: {'s_account_no' : s_account_no , 'i_bank' : i_bank, 'id' : id},
        beforeSend: function ()
        {
            //$('#se-pre-con').fadeIn(100);
        },
        success: function (data) {
        	if(data > 0){
						$('#valid_account_no').val(0);
						$('#error_account_no').html('<br />* Already used : '+no_1+'-'+no_2+'-'+no_3+'-'+no_4);
					}else{
						$('#valid_account_no').val(1);
						$('#error_account_no').html('');
					}        	
        },
        error: function (data) {
        	
        }
    });
	
});
////////////// Chake s_account_username
$('#s_account_username').blur(function(){
	$('#valid_account_username').val('0');

	var s_account_username = $('#s_account_username').val();
	
	var id = $('#id').val();
	var i_bank = $('#i_bank').val();
	var url = main_base_url+"bank/already_username";
	$.ajax({
        type: 'POST',
        url: url,
        data: {'s_account_username' : s_account_username , 'i_bank' : i_bank, 'id' : id},
        beforeSend: function ()
        {
            //$('#se-pre-con').fadeIn(100);
        },
        success: function (data) {
        	if(data > 0){
						$('#valid_account_username').val(0);
						$('#error_account_username').html('<br />* Already used : '+s_account_username);
					}else{
						$('#valid_account_username').val(1);
						$('#error_account_username').html('');
					}    
					console.log(data)    	
        },
        error: function (data) {
        	
        }
    });
	
});

function func_add_detailbank(i_bank,d_now,i_balance){
	var url = main_base_url+"bank/add_detailbank";
	console.log(i_bank)
	console.log(d_now)
	console.log(i_balance)
	$.post(url,{'i_bank':i_bank,'d_now':d_now,'i_balance':i_balance},function(data){
		console.log(data)
	});
}
function func_add_bank(i_bank){
	/*console.log(i_bank)*/
}
function isNumeric(n) {
    return !isNaN(parseFloat(n)) && isFinite(n);
}
function tryCatch(data) {
    try {
        return JSON.parse(data);
    } catch (err) {
        //$('#se-pre-con').delay(100).fadeOut();
        //alert(0000000)
    }
}