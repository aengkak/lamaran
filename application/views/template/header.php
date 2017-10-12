<?php
if($this->session->userdata('status') != "login"){
			redirect(base_url('login'));
		}else {
		}
?>
<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="utf-8">
	<meta name="description" content="Karunia Travel">
	<meta name="author" content="Endeavor">
	<meta name="keyword" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>

    <!-- start: Css -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/css/bootstrap.min.css');?>">

      <!-- plugins -->
      <link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/css/plugins/font-awesome.min.css');?>"/>
      <link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/css/plugins/simple-line-icons.css');?>"/>
	   <link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/css/plugins/datatables.bootstrap.min.css');?>"/>
      <link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/css/plugins/animate.min.css');?>"/>
      <link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/css/plugins/mediaelementplayer.css');?>"/>
      <link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/css/plugins/fullcalendar.min.css');?>"/>
      <link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/css/plugins/bootstrap-material-datetimepicker.css');?>"/>
			<link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/css/plugins/icheck/skins/flat/_all.css');?>"/>
			<link href="<?php echo base_url('asset/css/style.css');?>" rel="stylesheet">
			<link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/css/bootstrap.css');?>">
	<!-- end: Css -->
	<script>
			function hanyaAngka(evt) {
			  var charCode = (evt.which) ? evt.which : event.keyCode
			   if (charCode > 31 && (charCode < 48 || charCode > 57))
			    return false;
			  return true;
			}
		</script>
		<!-- start: Javascript -->
		<script src="<?php echo base_url('asset/js/jquery.min.js');?>"></script>
		<script src="<?php echo base_url('asset/js/jquery.ui.min.js');?>"></script>
		<script src="<?php echo base_url('asset/js/bootstrap.min.js');?>"></script>

	<link rel="shortcut icon" href="<?php echo base_url('asset/img/logomi.png');?>">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
