<!-- start: Content -->
<div id="content">
   <div class="panel box-shadow-none content-header">
      <div class="panel-body">
         <div class="col-md-12">
            <h3 class="animated fadeInLeft">Lamaran Baru
            </h3>
            <p class="animated fadeInDown">
               Data
               <span class="fa-angle-right fa">
               </span> lamaran
            </p>
         </div>
      </div>
   </div>
   <div class="col-md-12">
      <div class="panel-heading">
         <div class="btn-group" role="group">
            <button type="button" class="btn  dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="fa fa-pencil-square-o"></span> Tambah
            <span class="fa fa-angle-down"></span>
            </button>
            <ul class="dropdown-menu">
               <li><a href="#" onclick="add()">Tambah</a></li>
               <li><a href="#" onclick="csv()">Import</a></li>
            </ul>
         </div>
      </div>
   </div>
   <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
      <div class="col-md-12">
         <?php
            $jabatan_id = $this->session->userdata('jabatan_id');
            $res = explode(',',$jabatan_id);
            $i = 0;
            foreach ($jabatan as $key) {
            $i++;
              ?>
         <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="heading<?php echo $i;?>">
               <h4 class="panel-title">
                  <a role="button" data-parent="#accordion" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $i;?>" aria-expanded="true" aria-controls="collapse<?php echo $i;?>">
                     <h4 class="down">
                        <?php
                           echo $key->nama_jabatan." ";
                           $counting = 0;
                           foreach ($pengirim as $peng) {
                             if ($key->id_jabatan == $peng->jabatan_id) {
                               $cc = $peng->level;
                               $cc1 = substr($cc,1);
                               $cc2 = substr($cc,0,1);
                               if ($cc1 == 0) {
                             if ($cc2 == "P") {
                             	# code...
                             } elseif ($cc2 == "N") {
                             	# code...
                            } elseif ($cc2 == "L") {
                              $counting = $counting +0;
                            } elseif ($cc2 == "K") {
                              $counting = $counting +0;
                            } else {
                             	$counting = $counting +1;
                             }
                             }
                             }
                           } echo "(".$counting.")";?>
                     </h4>
                  </a>
               </h4>
            </div>
            <div id="collapse<?php echo $i;?>" class="panel-collapse collapse <?php if($ur == $key->id_jabatan){ echo 'in'; }?>" role="tabpanel" aria-labelledby="heading<?php echo $i;?>">
               <div class="panel-body">
                  <div class="responsive-table">
                     <table id="datatables-example<?php echo $key->id_jabatan;?>" class="table table-striped table-bordered" width="100%" cellspacing="0">
                        <thead>
                           <tr>
                              <th>
                                 No
                              </th>
                              <th>
                                 Nama
                              </th>
                              <th>
                                 Tanggal Lahir
                              </th>
                              <th>
                                 Jenis Kelamin
                              </th>
                              <th>
                                 Agama
                              </th>
                              <th>
                                 Kota
                              </th>
                              <th>
                                 Tanggal Melamar
                              </th>
                              <th>
                                 Status
                              </th>
                              <th>
                                 Aksi
                              </th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php $no = 1; foreach ($pengirim as $p) :
                              if ($p->jabatan_id == $key->id_jabatan) {
                                $cek = $p->level; $cek1 = substr($cek,1); $cek2 = substr($cek,0,1);
                                if($cek != "Keluar"){
                                if($cek != "Lulus"){
                                if ($cek1 == 0) {
                                  if ($cek2 == "Y") {
                                  } else { ?>
                           <tr>
                              <td>
                                 <?php echo $no;?>
                              </td>
                              <td>
                                 <?php echo $p->nama;?>
                              </td>
                              <td>
                                 <?php echo $p->tgl_lahir." ";
                                    // Tanggal Lahir
                                    	$birthday = $p->tgl_lahir;

                                    	// Convert Ke Date Time
                                    	$biday = new DateTime($birthday);
                                    	$today = new DateTime();

                                    	$diff = $today->diff($biday);

                                    	// Display
                                    	echo "(". $diff->y .")";

                                    ?>
                              </td>
                              <td>
                                 <?php echo $p->gender?>
                              </td>
                              <td>
                                 <?php echo $p->agama?>
                              </td>
                              <td>
                                 <?php echo $p->kota?>
                              </td>
                              <td>
                                 <?php echo $p->tgl?>
                              </td>
                              <td>
                                 <?php $a = $p->level; $b = substr($a,0,1);
                                    if ($b == "P") { ?>
                                 <div style="color:#795548">Pending</div>
                                 <?php } elseif ($b == "N") {?>
                                 <div style="color:#F44336">Ditolak</div>
                                 <?php } else { ?>
                                 <div style="color:#4CAF50">Baru</div>
                                 <?php } ?>
                              </td>
                              <td>
                                <div class="btn-group" role="group">
                                  <a href="#" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Aksi
                                    <span class="fa fa-angle-down"></span>
                                  </a>
                                  <ul class="dropdown-menu">
                                    <li><a onclick="view(<?php echo $p->id_lamaran;?>)" href="#">Lihat</span></a></li>
                                    <?php foreach ($res as $keyres => $value):
                                      if ($value == $key->id_jabatan) {?>
                                    <li><a onclick="reject(<?php echo $p->id_lamaran;?>)" href="#">Hapus</a></li>
                                    <?php } endforeach; ?>
                                  </ul>
                                </div>
                              <!-- <button class="btn btn-info fa fa-eye" onclick="view(<?php echo $p->id_lamaran;?>)">
                                 </button>
                                 <?php foreach ($res as $keyres => $value):
                                   if ($value == $key->id_jabatan) {?>
                                     <a href="#" class="btn btn-danger fa fa-close" onclick="reject(<?php echo $p->id_lamaran;?>)">
                                     </a>
                                 <?php } endforeach; ?> -->
                              </td>
                           </tr>
                           <?php $no++; } } }
                              }
                              } ?>
                           <?php endforeach;?>
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
         <?php } ?>
      </div>
   </div>
   <!-- Bootstrap modal -->
   <div class="modal fade" id="modal_form" role="dialog">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;
               </span>
               </button>
               <h3 class="modal-title">
               </h3>
            </div>
            <div class="modal-body form">
               <form action="#" id="form" class="form-horizontal">
                  <div class="form-body" id="modalbody">
                  </div>
               </form>
            </div>
            <div class="modal-footer" id="modal-footer">
            </div>
         </div>
         <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
   </div>
   <!-- /.modal -->
   <!-- End Bootstrap modal -->
   <!-- Bootstrap modal -->
   <div class="modal fade" id="modal_form1" role="dialog">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
               <h3 class="modal-title"></h3>
            </div>
            <div class="modal-body form">
               <form action="#" id="form1" class="form-horizontal">
                  <div class="form-body" id="modalbody1">
                  </div>
            </div>
            <div class="modal-footer">
              <div id="loading">
                <input type="submit" value="Simpan" class="btn btn-primary" />
                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
              </div>

            </div>
            </form>
         </div>
         <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
   </div>
   <!-- /.modal -->
   <!-- Bootstrap modal -->
   <div class="modal fade" id="stack" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-lg">
         <div class="modal-content">
            <div class="modal-header">
               <button type="button" class="close" onclick="showModal('modal_form')" aria-label="Close">
               <span aria-hidden="true">&times;
               </span>
               </button>
               <h3 class="modal-title">
               </h3>
            </div>
            <div class="modal-body form">
               <form action="#" id="form" class="form-horizontal">
                  <div class="form-body">
                     <div align="center">
                        <iframe id="myFrame" class="img-responsive" src="" frameborder="0" scrolling="auto">
                        </iframe>
                     </div>
                  </div>
               </form>
            </div>
            <div class="modal-footer">
               <button type="button" id="btnSave" onclick="showModal('modal_form')" class="btn btn-primary">Kembali
               </button>
            </div>
         </div>
         <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
   </div>
   <!-- /.modal -->
   <!-- End Bootstrap modal -->
   <!-- Bootstrap modal -->
   <div class="modal fade" id="csv" role="dialog">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
               <h3 class="modal-title"></h3>
            </div>
            <div class="modal-body form">
               <form action="#" id="form2" class="form-horizontal">
                  <div class="form-body" id="modalbody2">
                  </div>
            </div>
            <div class="modal-footer">
              <div id="loading1">
                <input type="submit" value="Simpan" class="btn btn-primary" />
                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
              </div>
            </div>
            </form>
         </div>
         <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
   </div>
   <!-- End Bootstrap modal -->

   <!-- Bootstrap modal -->
   <div class="modal fade modal-v1" id="kepribadian" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-lg">
         <div class="modal-content">
            <div class="modal-header">
               <button type="button" class="close" onclick="showModal('modal_form')" aria-label="Close">
               <span aria-hidden="true">&times;
               </span>
               </button>
               <h3 class="modal-title">
               </h3>
            </div>
            <div class="modal-body form">
               <form action="#" id="form" class="form-horizontal">
                  <div class="form-body">
                     <div align="center">
                       <img src="" class="box-v2-cover img-responsive" id="filehasil">
                     </div>
                  </div>
               </form>
            </div>
            <div class="modal-footer">
               <button type="button" id="btnSave" onclick="showModal('modal_form')" class="btn btn-primary">Kembali
               </button>
            </div>
         </div>
         <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
   </div>
   <!-- /.modal -->

</div>
<!-- end: content -->
<script>
   function kepribadian(id){
     var loc = "<?php echo base_url();?>files/"+id;
     $('.modal').modal('hide');
     $("#" + "kepribadian").modal('show');
     document.getElementById('filehasil').setAttribute('src', loc);
   }
</script>
<script type="text/javascript">
   function add()
   {
     $('#form1')[0].reset(); // reset form on modals
     $('#modal_form1').modal('show'); // show bootstrap modal
     $("#modalbody1").load("<?php echo base_url();?>addlamaran/",function(data){
         $("#modalbody1").html(data);
         $('#datepicker').bootstrapMaterialDatePicker
     			({
     				time: false,
             maxDate: '<?php echo $date;?>'
     			});
     });
     $("#form1").on('submit',(function(e) {
       e.preventDefault();
       $.ajax({
         url: "<?php echo base_url();?>addlamaran1",
         type: "POST",
         data:  new FormData(this),
         contentType: false,
         cache: false,
         processData:false,
         beforeSend: function(){
				 $('#loading').html("<img src='<?php echo base_url();?>asset/img/bx_loader.gif' /> Proses!");
			   },
         success: function(data)
           {
             $('#modal_form1').modal('hide');
             location.reload();
           },
           error: function (jqXHR, textStatus, errorThrown)
           {
               alert('Error load image');
           }
        });
     }));
   }
</script>
<script type="text/javascript">
   function csv()
   {
     $('#form2')[0].reset(); // reset form on modals
     $('#csv').modal('show'); // show bootstrap modal
     $("#modalbody2").load("<?php echo base_url();?>csv/",function(data){
         $("#modalbody2").html(data);
     });
     $("#form2").on('submit',(function(e) {
       e.preventDefault();
       $.ajax({
         url: "importcsv",
         type: "POST",
         data:  new FormData(this),
         contentType: false,
         cache: false,
         processData:false,
         beforeSend: function(){
				 $('#loading1').html("<img src='<?php echo base_url();?>asset/img/bx_loader.gif' /> Proses!");
			   },
         success: function(data)
           {
             $('#csv').modal('hide');
             location.reload();
           },
           error: function (jqXHR, textStatus, errorThrown)
           {
               alert('Error');
           }
        });

     }));
   }
</script>
<script>
   function getJ(val) {
   	$.ajax({
   	type: "POST",
   	url: "<?php echo base_url('selectj1')?>",
   	data:$('#form1').serialize(),
   	success: function(data){
       $("#dll").html(data);
       var maxField = 10; //Input fields increment limitation
       var addButton = $('.add_button'); //Add button selector
       var wrapper = $('.field_wrapper'); //Input field wrapper
       var fieldHTML = '<div><input type="file" name="dll[]" id="pdf" onchange="return filepdf()" accept=".pdf" value="" class="form-control" required/><a href="javascript:void(0);" class="remove_button" title="Remove field"><img src="asset/img/remove-icon.png"/></a></div>'; //New input field html
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
   function foto(id){
     var loc = "<?php echo base_url();?>files/"+id;
     $('.modal').modal('hide');
     $('#stack').modal('show');
     document.getElementById('myFrame').setAttribute('src', loc);
     $("#myFrame").css({
       "width": 900}
                      );
     $("#myFrame").css({
       "height": 550}
                      );
   }
</script>
<script>
   function fileValidation(){
       var fileInput = document.getElementById('foto');
       var filePath = fileInput.value;
       var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
       if(!allowedExtensions.exec(filePath)){
           alert('Hanya Format .jpeg/.jpg/.png/.gif.');
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
           alert('Hanya Format .jpeg/.jpg/.png/.gif.');
           fileInput.value = '';
           return false;
       }
   }
   function filepdf(){
       var fileInput = document.getElementById('pdf');
       var filePath = fileInput.value;
       var allowedExtensions = /(\.pdf)$/i;
       if(!allowedExtensions.exec(filePath)){
           alert('Hanya Format .pdf.');
           fileInput.value = '';
           return false;
       }
   }
</script>
<script type="text/javascript">
   //for save method string
   var table;
   function view(id)
   {
     $('#modal_form').modal('show');
     $("#modalbody").load("<?php echo base_url();?>rate/"+id,function(data){
       $("#modalbody").html(data);
     });
     $("#modal-footer").load("<?php echo base_url();?>modalfoot/"+id,function(data){
       $("#modal-footer").html(data);
     });
   }
   function showModal(id) {
     $('.modal').modal('hide');
     $("#" + id).modal('show');
   }
   function save3()
   { if($('#isi').val() == ''){
     alert('isi komentar.');
     return false;
     } else {
     if(confirm('Yakin akan berkomentar?'))
     {
       // ajax adding data to database
       $.ajax({
         url : "<?php echo base_url('addrate')?>",
         type: "POST",
         data: $('#form').serialize(),
         success: function(data)
         {
           //if success close modal and reload ajax table
           $('#modal_form').modal('hide');
           location.reload()// for reload a page
         }
         ,
         error: function (jqXHR, textStatus, errorThrown)
         {
           alert('Error');
         }
       }
       );
     }
   }
   }
   function reject(id)
   {
     if(confirm('Yakin Hapus?'))
     {
       // ajax delete data from database
       $.ajax({
         url : "<?php echo site_url('ldelete')?>/"+id,
         type: "POST",
         dataType: "JSON",
         success: function(data)
         {
           location.reload()// for reload a page
         }
         ,
         error: function (jqXHR, textStatus, errorThrown)
         {
           alert('Error deleting data');
         }
       }
             );
     }
   }
</script>
<!-- end: Javascript -->
<?php foreach ($jabatan as $jj) { ?>
<script type="text/javascript">
   $(document).ready(function(){
    $('#datatables-example<?php echo $jj->id_jabatan;?>').DataTable();
   });

</script>
<?php } ?>

<?php $uri = $this->uri->segment('3'); if ($uri != NULL) { ?>
  <script type="text/javascript">
  $(window).on('load',function(){
    $('#modal_form').modal('show');
    $("#modalbody").load("<?php echo base_url();?>rate/"+<?php echo $uri;?>,function(data){
      $("#modalbody").html(data);
    });
    $("#modal-footer").load("<?php echo base_url();?>modalfoot/"+<?php echo $uri;?>,function(data){
      $("#modal-footer").html(data);
    });
      });
  </script>
<?php } ?>
