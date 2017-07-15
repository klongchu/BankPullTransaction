
////////////// Delete Member list

$('.btnDeleteMember').click(function(){
 
	var id = $(this).attr('data-id');
	var url = main_base_url+"member/delete";
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



$('#OpenFormAddMember').click(function(){
	$('#modal_title_member').html('Add New Member');
	$('#id').val('');
 
	$('#s_display_name').val('');
	$('#s_nickname').val('');
	$('#s_username').val('');
	$('#s_username_old').val('');
	$('#s_password').val('');
	$('#error_member_username').html('');
	$('#mySmallModalMember').modal('show');
});
/////////////////////btnEditMember
$('.btnEditMember').click(function(){
	$('#modal_title_member').html('Edit Member');
	$('#error_member_username').html('');
	var id = $(this).attr('data-id');

	var i_level = $(this).attr('data-i_level');
	var s_display_name = $(this).attr('data-s_display_name');
	var s_nickname = $(this).attr('data-s_nickname');
	var s_username = $(this).attr('data-s_username');
	var s_password = $(this).attr('data-s_password');
	var s_img_src = $(this).attr('data-s_img');
	
	console.log(id)
	$('#id').val(id);
	$('#i_level').val(i_level);
	$('#s_display_name').val(s_display_name);
	$('#s_nickname').val(s_nickname);
	$('#s_username').val(s_username);
	$('#s_username_old').val(s_username);
	$('#s_password').val(s_password);
	$('#imagePreview').attr('src',main_base_url+'uploads/profile/'+s_img_src);
	$('#valid_member_username').val(1);
	$('#mySmallModalMember').modal('show');
});
////////////////// btnDetailMember
 
///////////// btnSaveMember
$('#btnSaveMember').click(function(){
var id = $('#id').val();
if(id > 0){
	console.log(id);
}
var url = main_base_url+"member/postdata";
var formData = $("#DataFormMember").serialize();

var Jsdata  = new FormData($("#DataFormMember")[0]);

var valid_member_username = $('#valid_member_username').val();

 
if($('#s_username').val() == ''){
	$('#s_username').focus();
	$('#error_member_username').html('<br />* Empty used  ');
	return false;
}

if(valid_member_username < 1){
	$('#s_username').focus();
	return false;
}

    $.ajax({
        type: 'POST',
        url: url,
        data: Jsdata,
        cache: false,
                    contentType: false,
                    processData: false,
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
////////////// Chake s_username
$('#s_username').blur(function(){
	var id = parseInt($('#id').val());
	var s_username_old = $('#s_username_old').val();
	var s_username = $('#s_username').val();
	if(id > 0 && s_username_old == s_username){
		$('#valid_member_username').val(1);
		$('#error_member_username').html('');
	}else{
		$('#valid_member_username').val('0');
	
	console.log(s_username)
	var url = main_base_url+"member/already_username";
	$.ajax({
        type: 'POST',
        url: url,
        data: {'s_username' : s_username ,  'id' : id},
        beforeSend: function ()
        {
            //$('#se-pre-con').fadeIn(100);
        },
        success: function (data) {
        	if(data > 0){
						$('#valid_member_username').val(0);
						$('#error_member_username').html('<br />* Already used : '+s_username);
					}else{
						$('#valid_member_username').val(1);
						$('#error_member_username').html('');
					}    
					console.log(data)    	
        },
        error: function (data) {
        	
        }
    });
	}
	
	
});


$("#uploadPic").change(function () {
                readURL(this);
            });
            function readURL(input) {

                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#imagePreview').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }
