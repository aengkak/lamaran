<!-- start: Content -->
<div id="content">
   <div class="panel box-shadow-none content-header">
      <div class="panel-body">
         <div class="col-md-12">
            <h3 class="animated fadeInLeft">Karyawan Keluar
            </h3>
            <p class="animated fadeInDown">
               Data
               <span class="fa-angle-right fa">
               </span> keluar
            </p>
         </div>
      </div>
   </div>
   <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
      <div class="col-md-12">
         <?php $jabatan_id = $this->session->userdata('jabatan_id');
            $res = explode(',',$jabatan_id);
            $i = 0;
            foreach ($jabatan as $key) {
            $i++; ?>
         <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="heading<?php echo $i;?>">
               <h4 class="panel-title">
                  <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $i;?>" aria-expanded="true" aria-controls="collapse<?php echo $i;?>">
                     <h4 class="down">
                        <?php echo $key->nama_jabatan;
                           $counting = 0;
                           foreach ($pengirim as $p) {
                             if ($key->id_jabatan == $p->jabatan_id) {
                             $cc = $p->level; $cc1 = substr($cc,1); $cc2 = substr($cc,0,1);
                             if ($cc1 == $cc1) {
                               $counting = $counting +1;
                           }
                           }
                           }echo "(".$counting.")";?>
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
                                 Tanggal Diterima
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
                              $cek = $p->level; $cek1 = substr($cek,1); $cek2 = substr($cek,0,1); ?>
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
                                 <?php echo $p->tgl_diterima?>
                              </td>
                              <td>
                                 <div style="color:#F44336"><?php echo $p->level;?></div>
                              </td>
                              <td>
                                <?php foreach ($res as $keyres => $value):
                                  if ($value == $key->id_jabatan) {?>
                                <?php } endforeach; ?>
                                 <a href="#" class="btn btn-info fa fa-comments" onclick="view(<?php echo $p->id_lamaran;?>)">
                                 </a>
                              </td>
                           </tr>
                           <?php $no++;
                              } ?>
                           <?php endforeach;?>
                        </tbody>
                     </table>
                  </div>

               </div>

            </div>


         </div>
         <?php
            }?>

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
   <div class="modal fade" id="stack" tabindex="-1" role="dialog">
      <div class="modal-dialog">
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
               <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup
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
   <div class="modal fade" id="edit" role="dialog">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header">
               <button type="button" class="close" onclick="batal()" aria-label="Close"><span aria-hidden="true">&times;</span></button>
               <h3 class="modal-title"></h3>
            </div>
            <div class="modal-body form">
               <form action="#" id="formedit" class="form-horizontal">
                  <div class="form-body" id="modaledit">
                  </div>
            </div>
            <div class="modal-footer">
              <div id="loading1">
                <input type="submit" value="Simpan" class="btn btn-primary" />
                <button type="button" class="btn btn-danger" onclick="batal()">Batal</button>
              </div>
            </div>
            </form>
         </div>
         <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
   </div>
   <!-- End Bootstrap modal -->
</div>
<!-- end: content -->
<script type="text/javascript">
   function batal() {
     if(confirm('Batal?'))
     {
       $('#edit').modal('hide');
     }
   }
   function edit(id)
   {
     $('#formedit')[0].reset(); // reset form on modals
     $('#edit').modal({backdrop: 'static', keyboard: false},'show')  ; // show bootstrap modal
     $("#modaledit").load("<?php echo base_url();?>editlamaran/"+id,function(data){
         $("#modaledit").html(data);
         $('#datepicker').bootstrapMaterialDatePicker
     			({
     				time: false
     			});
          $('#datepicker1').bootstrapMaterialDatePicker
      			({
      				time: false
      			});
     });
     $("#formedit").on('submit',(function(e) {
       e.preventDefault();
       $.ajax({
         url: "<?php echo base_url();?>updatelamaran",
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
             $('#edit').modal('hide');
             location.reload();
           },
           error: function (jqXHR, textStatus, errorThrown)
           {
               alert();
           }
        });

     }));
   }
</script>
<script>
   function foto(id){
     var loc = "<?php echo base_url();?>files/"+id;
     $('#modal_form').modal('hide');
     $("#" + "stack").modal('show');
     document.getElementById('myFrame').setAttribute('src', loc);
     $("#myFrame").css({
       "width": 600}
                      );
     $("#myFrame").css({
       "height": 500}
                      );
   }
</script>
<script type="text/javascript">
   var save_method3;
   //for save method string
   var table;
   function view(id)
   {
     save_method3 = 'add';
     $('#modal_form').modal('show');
     $("#modalbody").load("<?php echo base_url();?>rate3/"+id,function(data){
       $("#modalbody").html(data);
     }
     );
   }
   function showModal(id) {
     $('#stack').modal('hide');
     $("#" + id).modal('show');
   }
   function save3()
   { if($('#isi').val() == ''){
     alert('isi komentar.');
     return false;
     } else {
       if(confirm('Yakin akan berkomentar?'))
       {
       var url;
       if(save_method3 == 'add')
       {
         url = "<?php echo base_url('addrate')?>";
       }
       // ajax adding data to database
       $.ajax({
         url : url,
         type: "POST",
         data: $('#form').serialize(),
         success: function(data)
         {
           //if success close modal and reload ajax table
           $('#modal_form').modal('hide');
           location.reload();// for reload a page
           //window.location.href = window.location.href;
         }
         ,
         error: function (jqXHR, textStatus, errorThrown)
         {
           alert('Error adding / update data');
           elert(errorThrown);
         }
       }
             );
     }
   }
   }
   function reject(id)
   {
     if(confirm('Are you sure reject member?'))
     {
       // ajax delete data from database
       $.ajax({
         url : "<?php echo base_url('ldelete')?>/"+id,
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
    $("#modalbody").load("<?php echo base_url();?>rate2/"+<?php echo $uri;?>,function(data){
      $("#modalbody").html(data);
    });
      });
  </script>
<?php } ?>
