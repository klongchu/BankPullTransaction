<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://ogp.me/ns/fb#">
<head>
  <?php
  $query = $this->db->get('tbl_webconfig');
  $data = $query->row();
  $cache_version = "1.0";
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

  $uploads_dir = base_url('uploads/webconfig')."/";
  $link_img_top = base_url('uploads/webconfig')."/".$this->session->userdata('wc_logo');
  $this->session->set_userdata($newdata);

  $des_view = $data->s_description;
  $title_view = $data->s_title;
  ?>
  <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="<?php echo $des_view; ?>">
  <meta name="keyword" content="<?php echo $des_view; ?>">
  <meta name="author" content="<?php echo $data->s_dev_by; ?>">
  <link href="<?=$uploads_dir;?><?php echo $this->session->userdata('wc_fav'); ?>" rel="shortcut icon" type="image/x-icon" />
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


</head>

 
<!-- Loading Start -->

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
<body>
<div class="all-wrapper menu-side with-side-panel">
	<div class="layout-w">
        <?php $this->load->view('template/menu_left'); ?>	
		<?php
	}
	?>
      
        
      

