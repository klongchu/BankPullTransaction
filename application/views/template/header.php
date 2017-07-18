<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://ogp.me/ns/fb#">
<head>
  <?php
  $query = $this->db->get(TB_webconfig);
  $data = $query->row();
  $cache_version = "1.0.2";
  $newdata = array();
  $newdata[wc_webconfig] = 'webconfig';
  $newdata[wc_site_name] = $data->s_site_name;
  $newdata[wc_title] = $data->s_title;
  $newdata[wc_keyword] = $data->s_keyword;
  $newdata[wc_description] = $data->s_keyword;
  $newdata[wc_logo] = $data->s_logo;
  $newdata[wc_webstats] = $data->s_webstats;
  $newdata[wc_fav] = $data->s_fav;
  $newdata[wc_skins] = $data->s_kins;
  $newdata[wc_domain] = "www.nagieos.com";
  $newdata[wc_folder_domain] = "nagieos";
  $newdata[wc_license] = "nagieos";
$this->session->set_userdata($newdata);
  $uploads_dir = base_url('uploads/webconfig')."/";
  $link_img_top = base_url('uploads/webconfig')."/".$this->session->userdata('wc_logo');
  

  $des_view = $data->s_description;
  $title_view = $data->s_title;
  ?>
  <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="<?php echo $des_view; ?>">
  <meta name="keyword" content="<?php echo $des_view; ?>">
  <meta name="author" content="<?php echo $data->s_dev_by; ?>">
  <link href="<?php echo base_url(); ?>fav.ico" rel="shortcut icon" type="image/x-icon" />
  <title><?php echo $title_view; ?></title>
  <meta itemprop="name" content="<?php echo $title_view; ?>">
  <meta itemprop="description" content="<?php echo $des_view; ?>">
  <meta itemprop="image" content="<?=$link_img_top;?>">
  <meta property="og:title" content="<?php echo $title_view; ?>">
  <meta property="og:description" content="<?php echo $des_view; ?>">
  <meta property="og:image" content="<?=$link_img_top;?>">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

<!-- Bower -->
<?php echo link_tag('bower_components/select2/dist/css/select2.min.css?v='.$cache_no); ?>
<?php echo link_tag('bower_components/bootstrap-daterangepicker/daterangepicker.css?v='.$cache_no); ?>
<?php echo link_tag('bower_components/dropzone/dist/dropzone.css?v='.$cache_no); ?>
<?php echo link_tag('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css?v='.$cache_no); ?>
<?php echo link_tag('bower_components/fullcalendar/dist/fullcalendar.min.css?v='.$cache_no); ?>
<?php echo link_tag('bower_components/perfect-scrollbar/css/perfect-scrollbar.min.css?v='.$cache_no); ?>


<!-- Custom CSS -->
<?php echo link_tag('assets/css/main.css?version='.$cache_version); ?>

<style>
	@font-face{
		font-family:thaisanslite_r1;src:url("<?php echo base_url(); ?>assets/fonts/thaisanslite_r1.eot?v=1.0")
		}
@font-face{
	font-family:thaisanslite_r1;src:url("<?php echo base_url(); ?>assets/fonts/thaisanslite_r1.ttf?v=1.0")
	}
</style>
<style>
	body{
		font-family:thaisanslite_r1; 
		}
	
	.class_bg_color_red{
		background-color: #ff6262;
	}
	.class_bg_color_green{
		background-color: #69ff62;
	}
	*{
    font-size:16px;
    font-family:thaisanslite_r1;
}
 
	
</style> 
<!-- jQuery -->
<script src="<?php echo base_url(); ?>bower_components/jquery/dist/jquery.min.js"></script>
<script> var main_base_url = "<?=base_url();?>";</script>

<?php

function setCSSPageLoading() {
        $preload_img = base_url()."assets/img/loading.gif";
        $CSS = "";
        $CSS .= "<style> ";
        $CSS .= " ";
        $CSS .= "            .no-js #loader { display: none;  } ";
        $CSS .= "            .js #loader { display: block; position: absolute; left: 100px; top: 0; } ";
        $CSS .= "            .se-pre-con { ";
        $CSS .= "                width:100%; ";
        $CSS .= "                height:100%; ";
        $CSS .= "                position:fixed; ";
        $CSS .= "                top:0; ";
        $CSS .= "                left:0; ";
        $CSS .= "                z-index:999; ";
        $CSS .= "                background: rgba(255,255,255,.5) url(" . $preload_img . ")    no-repeat; ";
//        $CSS .= "                background-size: 250px 150px; ";
        $CSS .= "                background-position: center center; ";
        $CSS .= "            } ";
        $CSS .= "        </style> ";

        return $CSS;
    }
    echo setCSSPageLoading();
?>
<script>
	$(document).ready(function () {
    //  GetCaptcha();
    $('#se-pre-con').delay(350).fadeOut();
});
</script>

<?php
$ls = $this->input->get('ls');
if($ls > 0){
	?>
	 
	<script>
	var api_url = "https://www.nagieos.com/valid.php";
	$.ajax({
        type: 'POST',
        url: api_url,
        data: {
        	'func':'menu',
        	'domain':'<?=$this->session->userdata("wc_domain");?>',
        	'license':'<?=$this->session->userdata("wc_license");?>'
        	},
        beforeSend: function ()
        {
            //$('#se-pre-con').fadeIn(100);
        },
        success: function (res_api) {
console.log('**************');
console.log(res_api);
var url = main_base_url+"bank/updateBanklistAPI";
    $.ajax({
        type: 'POST',
        url: url,
        data: res_api,
        beforeSend: function ()
        {
            //$('#se-pre-con').fadeIn(100);
        },
        success: function (data) {
console.log('===============');
console.log(data);
location.replace(main_base_url);
console.log('===============');
        },
        error: function () {
					console.log("Error");
        }

    });
console.log('**************');

        },
        error: function (res_api) {

        }

    });
		
	</script>
	<?php
}

?>

<script>
    $(document).ready(function () {
        function currentTime() {
            var today = new Date();
            var dd = today.getDate();
            var mm = today.getMonth();
            var yy = today.getFullYear();
            var h = today.getHours();
            var m = today.getMinutes();
            var s = today.getSeconds();
            m = checkTime(m);
            s = checkTime(s);
            document.getElementById('txt').innerHTML =
                 "วันที่ "+   dd + "/" + (mm + 1) + "/" + yy + " " + h + ":" + m + ":" + s + " น.";
            var t = setTimeout(currentTime, 500);
        }
        function checkTime(i) {
            if (i < 10) {
                i = "0" + i
            }
            ;  // add zero in front of numbers < 10
            return i;
        }
        currentTime();


        var sec = 3;
        notification();
        setInterval(notification, 1000 * sec);
    });
    function reloadTime() {
        location.reload();
        $('#se-pre-con').delay(100).fadeOut();

    }
</script>

</head>

 
<!-- Loading Start -->


		
<body>
<!-- ./Loading Start -->
<?php
$check_class = $this->router->fetch_class();
?>

	<?php
	if($check_class == 'login'){
		?>
 
		<?php
	}else{
		?>
 <div class='se-pre-con' id="se-pre-con" > </div>

<div class="all-wrapper menu-side with-side-panel">
	<div class="layout-w">
        <?php $this->load->view('template/menu_left'); ?>	
		<?php
	}
	?>
      
        
      

