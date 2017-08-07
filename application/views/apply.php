<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="description" content="Miminium Admin Template v.1">
  <meta name="author" content="Isna Nur Azis">
  <meta name="keyword" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Karunia Travel</title>

<link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/css/bootstrap.min.css');?>">

      <!-- plugins -->
      <link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/css/plugins/font-awesome.min.css');?>"/>
      <link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/css/plugins/simple-line-icons.css');?>"/>
	   <link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/css/plugins/datatables.bootstrap.min.css');?>"/>
      <link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/css/plugins/animate.min.css');?>"/>
      <link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/css/plugins/mediaelementplayer.css');?>"/>
      <link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/css/plugins/fullcalendar.min.css');?>"/>
      <link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/css/plugins/bootstrap-material-datetimepicker.css');?>"/>
	<link href="<?php echo base_url('asset/css/style.css');?>" rel="stylesheet">
	<!-- end: Css -->
  <script>
		function hanyaAngka(evt) {
		  var charCode = (evt.which) ? evt.which : event.keyCode
		   if (charCode > 31 && (charCode < 48 || charCode > 57))
 
		    return false;
		  return true;
		}
	</script>

  <link rel="shortcut icon" href="asset/img/logomi.png">
  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
    </head>

    <body id="mimin" class="dashboard form-signin-wrapper">

      <div class="container">

       
						        <!-- Bootstrap modal -->
              <div>
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    
                    <h3 class="modal-title">Form Lamaran Pekerjaan</h3>
                  </div>
                  <div class="modal-body form">
                    
					<form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
                            <input name="id" placeholder="id" class="form-control" type="hidden">
            			<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
					  <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingOne">
                          <h4 class="panel-title">
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                              <h4>Data Diri</h4>
                            </a>
                          </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                          <div class="panel-body">
						  <div class="form-group">
                                  <label class="control-label col-md-3">No Identitas</label>
                                  <div class="col-md-9">
                                    <input placeholder="No Identitas" name="no_identitas" class="form-control" type="text">
                                  </div>
                                </div>
                    			<div class="form-group">
                                  <label class="control-label col-md-3">Nama</label>
                                  <div class="col-md-9">
                                    <input name="nama" placeholder="Nama" class="form-control" type="text">
                                  </div>
                                </div>
                    			<div class="form-group">
                                  <label class="control-label col-md-3">Alamat</label>
                                  <div class="col-md-9">
                                    <input name="alamat" placeholder="Alamat" class="form-control" type="text">
                                  </div>
                                </div>
								<div class="form-group">
                                  <label class="control-label col-md-3">Tgl Lahir</label>
                                  <div class="col-md-9">
                                    <input name="tgl_lahir" id="datepicker" placeholder="Tgl Lahir" class="form-control" type="text">
                                  </div>
                                </div>
						  
                          </div>
                        </div>
                      </div>
                      <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingTwo">
                          <h4 class="panel-title">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                              <h4>Kontak</h4>
                            </a>
                          </h4>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                          <div class="panel-body">
						  <div class="form-group">
                                  <label class="control-label col-md-3">No Telp</label>
                                  <div class="col-md-9">
                                    <input name="no_telp" placeholder="No Telp" onkeypress="return hanyaAngka(event)" class="form-control" type="text" >
                                  </div>
                                </div>
                    			<div class="form-group">
                                  <label class="control-label col-md-3">No Wa</label>
                                  <div class="col-md-9">
                                    <input name="no_wa" placeholder="No Wa" onkeypress="return hanyaAngka(event)" class="form-control" type="text">
                                  </div>
                                </div>
                    			<div class="form-group">
                                  <label class="control-label col-md-3">Email</label>
                                  <div class="col-md-9">
                                    <input name="email" placeholder="Email" class="form-control" type="text">
                                  </div>
                                </div>
						  
                          </div>
                        </div>
                      </div>
                      <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingThree">
                          <h4 class="panel-title">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                              <h4>Kelengkapan</h4>
                            </a>
                          </h4>
                        </div>
                        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                          <div class="panel-body">
						  <div class="form-group">
                                  <label class="control-label col-md-3">Posisi</label>
                                  <div class="col-md-9">
                                    <select name="jabatan" class="form-control">
									<?php foreach ($jabatan as $j): ?>
									<option value="<?php echo $j->nama;?>"><?php echo $j->nama;?></option>
									<?php endforeach?>
									</select>
                                  </div>
                                </div>
                    			<div class="form-group">
                                  <label class="control-label col-md-3">Foto</label>
                                  <div class="col-md-9">
                                    <input name="foto" class="form-control" type="file">
                                  </div>
                                </div>
								<div class="form-group">
                                  <label class="control-label col-md-3">Cv</label>
                                  <div class="col-md-9">
                                    <input name="cv" class="form-control" type="file">
                                  </div>
                                </div>
                    			<div class="form-group">
                                  <label class="control-label col-md-3">Ktp</label>
                                  <div class="col-md-9">
                                    <input name="ktp" class="form-control" type="file">
                                  </div>
                                </div>
                          </div>
                        </div>
                      </div>
                    </div>
					<div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Send</button>
                      </div>
                      </form>
					
                      </div>
                      
                    </div><!-- /.modal-content -->
                  </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
  <!-- End Bootstrap modal -->
      </div>
	  </div>

      <!-- end: Content -->
    <!-- start: Javascript -->
    <script src="<?php echo base_url('asset/js/jquery.min.js');?>"></script>
    <script src="<?php echo base_url('asset/js/jquery.ui.min.js');?>"></script>
    <script src="<?php echo base_url('asset/js/bootstrap.min.js');?>"></script>
   
    
    <!-- plugins -->
    <script src="<?php echo base_url('asset/js/plugins/moment.min.js');?>"></script>
    <script src="<?php echo base_url('asset/js/plugins/fullcalendar.min.js');?>"></script>
    <script src="<?php echo base_url('asset/js/plugins/jquery.nicescroll.js');?>"></script>
    <script src="<?php echo base_url('asset/js/plugins/jquery.vmap.min.js');?>"></script>
    <script src="<?php echo base_url('asset/js/plugins/maps/jquery.vmap.world.js');?>"></script>
    <script src="<?php echo base_url('asset/js/plugins/jquery.vmap.sampledata.js');?>"></script>
    <script src="<?php echo base_url('asset/js/plugins/chart.min.js');?>"></script>
  	<script src="<?php echo base_url('asset/js/plugins/jquery.datatables.min.js');?>"></script>
  	<script src="<?php echo base_url('asset/js/plugins/datatables.bootstrap.min.js');?>"></script>
    <script src="<?php echo base_url('asset/js/plugins/bootstrap-material-datetimepicker.js');?>"></script>

      <!-- custom -->
      <script src="<?php echo base_url('asset/js/main.js');?>"></script>
      <script type="text/javascript">
       $(document).ready(function(){
         $('input').iCheck({
          checkboxClass: 'icheckbox_flat-aero',
          radioClass: 'iradio_flat-aero'
        });
       });
     </script>
	<script type="text/javascript">
$( "#datepicker" ).bootstrapMaterialDatePicker({ weekStart : 0, time: false,animation:true});
</script>
<script type="text/javascript">
  $(document).ready(function(){

    $(".nav-tabs a").click(function (e) {
      e.preventDefault();  
      $(this).tab('show');
    });

  });
</script>
     <!-- end: Javascript -->
   </body>
   </html>