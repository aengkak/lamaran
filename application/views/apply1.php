<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="description" content="Miminium Admin Template v.1">
<meta name="author" content="Isna Nur Azis">
<meta name="keyword" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Karunia Travel</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/css/bootstrap.min.css');?>
">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/css/bootstrap.css');?>
">
<!-- plugins -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/css/plugins/font-awesome.min.css');?>
"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/css/plugins/simple-line-icons.css');?>
"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/css/plugins/datatables.bootstrap.min.css');?>
"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/css/plugins/animate.min.css');?>
"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/css/plugins/mediaelementplayer.css');?>
"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/css/plugins/fullcalendar.min.css');?>
"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/css/plugins/bootstrap-material-datetimepicker.css');?>
"/>
<link href="<?php echo base_url('asset/css/style.css');?>
" rel="stylesheet">
<!-- end: Css -->
<script>
		function hanyaAngka(evt) {
		  var charCode = (evt.which) ? evt.which : event.keyCode
		   if (charCode > 31 && (charCode < 48 || charCode > 57))
		    return false;
		  return true;
		}
	</script>
	<?php echo $data['script_captcha']; // javascript recaptcha ?>
		 <script type="text/javascript" language="javascript">
function validateform(){
var captcha_response = grecaptcha.getResponse();
if(captcha_response.length == 0)
{
    // Captcha is not Passed
	alert("Silahkan Centang I am Not Robot");
    return false;
}
else
{
    // Captcha is Passed
    return true;
}
}
// ]]></script>
<link rel="shortcut icon" href="asset/img/logomi.png">
<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
</head>
<body id="mimin" class="dashboard greybg">
<div class="container">

	<!-- Bootstrap modal -->
	<div>

		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<div class="row">
						<div class="col-md-3 col-md-push-6">
							<img src="asset/img/logo.png">
						</div>
						<div class="col-md-9 col-md-pull-3">
							<h4>Form Lamaran Pekerjaan</h4>
						</div>
					</div>
				</div>
				<div class="modal-body form">
					<div class="span4 pull-right">
						<div id="alert" class="alert alert-danger fade">
							<strong>Peringatan!</strong> <p id="muncul">Hello World!</p>
						</div>
					</div>
					<form action="" method="post" id="form" class="form-horizontal" enctype="multipart/form-data" onsubmit="return validateform();">
						<input name="id" placeholder="id" class="form-control" type="hidden">
						<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
							<div class="panel panel-default">
								<div class="panel-heading" role="tab" id="headingOne">
									<h4 class="panel-title">
									<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
									<h4 class="down"><b>Data Diri</b></h4>
									</a>
									</h4>
								</div>
								<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
									<div class="panel-body">
                    <div class="form-group">
											<label class="control-label col-md-3">Posisi</label>
											<div class="col-md-9">
												<select id="jabatan_id" name="jabatan_id" class="form-control" required onChange="getJ(this.value);" required>
                          <option value="" style="display:none">Pilih</option>
													<?php foreach ($jabatan as $j): ?>
													<option value="<?php echo $j->id_jabatan;?>"><?php echo $j->
													nama_jabatan;?></option>
													<?php endforeach?>
												</select>
											</div>
										</div>
										<div class="form-group">
											<label class="control-label col-md-3">Nama</label>
											<div class="col-md-9">
												<input name="nama" placeholder="Nama" id="nama" class="col-md-12" type="text" required>
											</div>
										</div>
                    <div class="form-group">
											<label class="control-label col-md-3">Tanggal Lahir</label>
											<div class="col-md-9">
												<input name="tgl_lahir" id="datepicker" placeholder="Tanggal Lahir" class="col-md-12" type="text" required>
											</div>
										</div>
                    <div class="form-group">
											<label class="control-label col-md-3">Jenis kelamin</label>
											<div class="col-md-9">
												<select id="gender" name="gender" class="form-control" required>
													<option value="" style="display:none">Pilih</option>
													<option value="Laki-Laki">Laki-Laki</option>
                          <option value="Perempuan">Perempuan</option>
												</select>
											</div>
										</div>
										<div class="form-group">
											<label class="control-label col-md-3">Agama</label>
											<div class="col-md-9">
												<select name="agama" id="agama" class="form-control" required>
													<option value="" style="display:none">Pilih</option>
                          <option value="Islam">Islam</option>
                          <option value="Kristen">Kristen(Katolik & Protestan)</option>
													<option value="Hindu">Hindu</option>
													<option value="Budha">Buddha</option>
													<option value="Budha">Kong Hu Cu</option>
												</select>
											</div>
										</div>
										<div class="form-group">
											<label class="control-label col-md-3">Alamat</label>
											<div class="col-md-9">
												<textarea name="alamat" id="alamat" class="form-control" required></textarea>
											</div>
										</div>
										<div class="form-group">
											<label class="control-label col-md-3">Kota</label>
											<div class="col-md-9">
												<input name="kota" id="kota" placeholder="Kota" class="col-md-12" type="text" required>
											</div>
										</div>
										<div class="form-group">
											<label class="control-label col-md-3">Pendidikan Terakhir</label>
											<div class="col-md-9">
												<select id="pendidikan" name="pendidikan" class="form-control" required>
													<option value="" style="display:none">Pilih</option>
													<option value="Sma Sederajat">SMA Sederajat</option>
													<option value="Diploma">Diploma</option>
													<option value="S1">S1</option>
													<option value="S2">S2</option>
                          <option value="S3">S3</option>
												</select>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading" role="tab" id="headingTwo">
									<h4 class="panel-title">
									<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
									<h4 class="down"><b>Kontak</b></h4>
									</a>
									</h4>
								</div>
								<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
									<div class="panel-body">
										<div class="form-group">
											<label class="control-label col-md-3">Nomor Telepon</label>
											<div class="col-md-9">
												<input name="no_telp" id="telp" maxlength="12" id="no_telp" placeholder="Nomor Telepon" onkeypress="return hanyaAngka(event)" class="col-md-12" type="text" required>
											</div>
										</div>
										<div class="form-group">
											<label class="control-label col-md-3">Nomor WhatsApp Sama?</label>
											<div class="col-md-9" style="padding-top: 7px;">
												<input type="radio" id="wa1" name="wa" value="Y" required> Ya
												<input type="radio" id="wa2" name="wa" value="N" required> Tidak
											</div>
										</div>
										<div id="nomerwa"></div>

										<div class="form-group">
											<label class="control-label col-md-3">Email</label>
											<div class="col-md-9">
												<input name="email" id="email" placeholder="Email" class="col-md-12" type="text" required>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading" role="tab" id="headingThree">
									<h4 class="panel-title">
									<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
									<h4 class="down"><b>Data Pendukung</b></h4>
									</a>
									</h4>
								</div>
								<div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
									<div class="panel-body">
										<div class="form-group">
											<label class="control-label col-md-3">Promosikan Diri Anda</label>
											<div class="col-md-9">
												<textarea name="ket" class="form-control"></textarea>
											</div>
										</div>
										<div class="form-group">
											<label class="control-label col-md-3">Foto</label>
											<div class="col-md-9">
												<input name="foto" id="foto" onchange="return fileValidation()" class="col-md-12" accept="image/*" type="file" required>
											</div>
										</div>
										<div class="form-group">
											<label class="control-label col-md-3">CV</label>
											<div class="col-md-9">
												<input name="cv" id="pdf" onchange="return filepdf()" class="col-md-12" accept=".pdf, .docx" type="file" required>
											</div>
										</div>
										<div class="form-group">
											<label class="control-label col-md-3">KTP</label>
											<div class="col-md-9">
												<input name="ktp" id="ktp" onchange="return filektp()" class="col-md-12" accept="image/*" type="file" required>
											</div>
										</div>

										<div id="dll"></div>
									</div>
								</div>
							</div><br>
								<div style="transform:scale(0.77);-webkit-transform:scale(0.77);transform-origin:0 0;-webkit-transform-origin:0 0;">
                <?php echo $data['captcha'] // tampilkan recaptcha ?>
							</div>
						</div>
						<div class="modal-footer">
							<button type="submit" id="btnSave" name="submit" onclick="save3()" class="btn btn-primary">Kirim</button>
						</div>
					</form>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<!-- /.modal -->
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
		$('#datepicker').bootstrapMaterialDatePicker
			({
				time: false,
				maxDate: '<?php echo $date;?>'
			});
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $(".nav-tabs a").click(function (e) {
      e.preventDefault();
      $(this).tab('show');
    });
  });
</script>
<script>
function getJ(val) {
	$.ajax({
	type: "POST",
	url: "<?php echo base_url('selectj')?>",
	data:$('#form').serialize(),
	success: function(data){
    $("#dll").html(data);
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    var fieldHTML = '<div><input type="file" name="dll[]" id="pdf" onchange="return filepdf()" accept=".pdf, .docx" value="" class="col-md-12" required/><a href="javascript:void(0);" class="remove_button" title="Remove field"><img src="asset/img/remove-icon.png"/></a></div>'; //New input field html
    var x = 1; //Initial field counter is 1
    $(addButton).click(function(){ //Once add button is clicked
        if(x < maxField){ //Check maximum number of input fields
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); // Add field html
        }
    });
    $(wrapper).on('click', '.remove_button', function(e){ //Once remove button is clicked
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
	}
	});
}

</script>
<script>
$("#alert").removeClass("in").hide();
</script>
<script>
function save3()
{ if ($("#wa1:checked,#wa2:checked").length == 1)
{
	if($('#nama').val() == ''){
		$("#alert").removeClass("in").show();
		$("#alert").delay(200).addClass("in").fadeOut(4000);
		document.getElementById("muncul").innerHTML = "Isi Data Diri";
		return false;
	} else if ($('#jabatan_id').val() == '') {
		$("#alert").removeClass("in").show();
		$("#alert").delay(200).addClass("in").fadeOut(4000);
		document.getElementById("muncul").innerHTML = "Isi Data Diri";
		return false;
	} else if ($('#gender').val() == '') {
		$("#alert").removeClass("in").show();
		$("#alert").delay(200).addClass("in").fadeOut(4000);
		document.getElementById("muncul").innerHTML = "Isi Data Diri";
		return false;
	} else if ($('#pendidikan').val() == '') {
		$("#alert").removeClass("in").show();
		$("#alert").delay(200).addClass("in").fadeOut(4000);
		document.getElementById("muncul").innerHTML = "Isi Data Diri";
		return false;
	} else if ($('#agama').val() == '') {
		$("#alert").removeClass("in").show();
		$("#alert").delay(200).addClass("in").fadeOut(4000);
		document.getElementById("muncul").innerHTML = "Isi Data Diri";
		return false;
	}
	else if ($('#alamat').val() == '') {
		$("#alert").removeClass("in").show();
		$("#alert").delay(200).addClass("in").fadeOut(4000);
		document.getElementById("muncul").innerHTML = "Isi Data Diri";
		return false;
	} else if ($('#kota').val() == '') {
		$("#alert").removeClass("in").show();
		$("#alert").delay(200).addClass("in").fadeOut(4000);
		document.getElementById("muncul").innerHTML = "Isi Data Diri";
		return false;
	}  else if ($('#email').val() == '') {
		$("#alert").removeClass("in").show();
		$("#alert").delay(200).addClass("in").fadeOut(4000);
		document.getElementById("muncul").innerHTML = "Isi Data Diri";
		return false;
	}
	else if ($('#no').val() == '') {
		$("#alert").removeClass("in").show();
		$("#alert").delay(200).addClass("in").fadeOut(4000);
		document.getElementById("muncul").innerHTML = "Isi Kontak";
		return false;
	}
	else if ($('#foto').val() == '') {
		$("#alert").removeClass("in").show();
		$("#alert").delay(200).addClass("in").fadeOut(4000);
		document.getElementById("muncul").innerHTML = "Isi Data Pendukung";
		return false;
	}else if ($('#ktp').val() == '') {
		$("#alert").removeClass("in").show();
		$("#alert").delay(200).addClass("in").fadeOut(4000);
		document.getElementById("muncul").innerHTML = "Isi Data Pendukung";
		return false;
	}
} else
{
	$("#alert").removeClass("in").show();
	$("#alert").delay(200).addClass("in").fadeOut(4000);
	document.getElementById("muncul").innerHTML = "Isi Kontak";
	return false;
}
}
</script>
<script>
function fileValidation(){
    var fileInput = document.getElementById('foto');
    var filePath = fileInput.value;
    var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
    if(!allowedExtensions.exec(filePath)){
        alert('Hanya Menerima Format .jpeg/.jpg/.png/.gif.');
        fileInput.value = '';
        return false;
    }
}
</script>
<script>
function filektp(){
    var fileInput = document.getElementById('ktp');
    var filePath = fileInput.value;
    var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
    if(!allowedExtensions.exec(filePath)){
        alert('Hanya Menerima Format .jpeg/.jpg/.png/.gif.');
        fileInput.value = '';
        return false;
    }
}
function filepdf(){
    var fileInput = document.getElementById('pdf');
    var filePath = fileInput.value;
    var allowedExtensions = /(\.pdf|\.docx)$/i;
    if(!allowedExtensions.exec(filePath)){
        alert('Hanya Menerima Format .pdf/.docx');
        fileInput.value = '';
        return false;
    }
}
</script>
<script>
$('#form input[type=radio]').change(function() {
	$.ajax({
	type: "POST",
	url: "<?php echo base_url('wa')?>",
	data:$('#form').serialize(),
	success: function(data){
		$("#nomerwa").html(data);
	}
	});
});
</script>
<!-- end: Javascript -->
</body>
</html>
