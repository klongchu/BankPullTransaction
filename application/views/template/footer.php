

</div>
      <div class="display-type"></div>
    </div>
<div class="footer-w" align="center">
<div class="deep-footer"> © 2017 xxxx.com All rights reserved.</div>
</div>
    <!-- /.container -->

<!-- jQuery -->
<script src="<?php echo base_url(); ?>bower_components/jquery/dist/jquery.min.js"></script>
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
<script src="<?php echo base_url(); ?>bower_components/bootstrap/js/dist/util.js"></script>
<script src="<?php echo base_url(); ?>bower_components/bootstrap/js/dist/tab.js"></script>
<!-- Main -->
<script src="<?php echo base_url(); ?>assets/js/main.js?version=<?=$cache_version;?>"></script>

<script>
		$("#key").val("nxZvx0pbc3tb");
$("#username").val("2i1NMrqwOwo+dIvqF9hdsssnAwdBr7f2RLEPrO93R1Q=");
$("#password").val("P7EAl0g+LEk9gXZFjQQfb7VkYlCL0Xzs4Uaa3nqrT60=");
$("#account").val("068-7-18915-9");	
 
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
</script>
</body>

</html>