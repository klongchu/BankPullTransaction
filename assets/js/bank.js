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

$('#OpenFormAddBank').click(function(){
	var i_bank = $(this).attr('data-i_bank');
	var s_name = $(this).attr('data-s_name');
//	console.log(main_base_url)
	$('#mySmallModalLabel').modal('show');
});
/////////////////////btnEditBank
$('.btnEditBank').click(function(){
	var id = $(this).attr('data-id');
	var i_bank = $(this).attr('data-i_bank');
	var s_name = $(this).attr('data-s_name');
	var s_key = $(this).attr('data-s_key');
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
	$('#mySmallModalLabel').modal('show');
});
////////////////// btnDetailBank
$('.btnDetailBank').click(function(){
	var url = $(this).attr('data-url');
	location.replace(url);
	
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
        alert(0000000)
    }
}