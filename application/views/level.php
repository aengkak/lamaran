<!-- start: Content -->
<div id="content">
   <div class="panel box-shadow-none content-header">
      <div class="panel-body">
         <div class="col-md-12">
            <h3 class="animated fadeInLeft"><?php echo $tingkatan->nama_tingkatan;?>
            </h3>
            <p class="animated fadeInDown">
               Data
               <span class="fa-angle-right fa">
               </span> lamaran
            </p>
         </div>
      </div>
   </div>
   <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
      <div class="col-md-12">
        <form method="post" action="<?php echo base_url();?>excel">
          <input type="submit" class="btn" value="Export">
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
                             if ($cc2 != "N") {
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

                             </th>
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
                                 Nomor WhatsApp
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
                              if ($cek2 != "N") { ?>
                           <tr>
                             <td>
                               <?php $a = $p->level; $b = substr($a,0,1);
                                  if ($b == "P") { ?>
                               <?php } elseif ($b == "N") {?>
                               <?php } else { ?>
                               <input type="checkbox" name="id_lamaran[]" value="<?php echo $p->id_lamaran;?>">
                               <?php } ?>
                             </td>
                              <td>
                                 <?php echo $no;?>
                              </td>
                              <td>
                                 <?php $user_id = $this->session->userdata('user_id');
                                 $hitung = 0;
                                 foreach ($komentar as $keykom) {
                                   if ($keykom->lamaran_id == $p->id_lamaran) {
                                     if ($keykom->user_id == $user_id) {
                                       $hitung = $hitung +1;
                                     }
                                   }
                                 } if ($hitung > 0) { ?>
                                   <font color ="#2196f3"> <?php echo $p->nama; ?> </font>
                                <?php } else {
                                  echo $p->nama;
                                 }
                                  ?>
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
                                 <?php if ($p->no_wa == 0) { ?>
                                   <div style="color:#F44336">0</div>
                                 <?php } else {
                                   echo $p->no_wa;
                                 } ?>
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
                                 <div style="color:#4CAF50"><?php echo $tingkatan->nama_tingkatan;?></div>
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
                              </td>
                           </tr>
                           <?php $no++;
                              }
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
            </form>
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
            <div>
              <form action="#" id="form" class="form-horizontal">
            <div class="modal-body form">

                  <div class="form-body" id="modalbody">
                  </div>

            </div>
            <div class="modal-footer" id="modal-footer">

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
   <!-- End Bootstrap modal -->
</div>
<!-- end: content -->
<script>
   function foto(id){
     var loc = "<?php echo base_url();?>files/"+id;
     $('.modal').modal('hide');
     $("#" + "stack").modal('show');
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
   function kepribadian(id){
     var loc = "<?php echo base_url();?>files/"+id;
     $('.modal').modal('hide');
     $("#" + "kepribadian").modal('show');
     document.getElementById('filehasil').setAttribute('src', loc);
   }
</script>
<script type="text/javascript">
   //for save method string
   var table;
   function view(id)
   {
     $('#modal_form').modal('show');
     $("#modalbody").load("<?php echo base_url();?>rate1/"+id,function(data){
       $("#modalbody").html(data);
     }
     );
     $("#modal-footer").load("<?php echo base_url();?>modalfoot1/"+id,function(data){
       $("#modal-footer").html(data);
     });

     $("#form").on('submit',(function(e) {
       e.preventDefault();
       if ($('#file').val() == '') {
         if ($('#isi').val() == '') {
           alert('Data Kosong');
         } else {
           if(confirm('Lanjutkan?'))
           {
             $.ajax({
               url: "<?php echo base_url('addrate')?>",
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
                   $('#modal_form').modal('hide');
                   location.reload();
                 },
                 error: function (jqXHR, textStatus, errorThrown)
                 {
                     alert('');
                 }
              });
           }
         }
       } else {
         if(confirm('Lanjutkan?'))
         {
           $.ajax({
             url: "<?php echo base_url('addrate')?>",
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
                 $('#modal_form').modal('hide');
                 location.reload();
               },
               error: function (jqXHR, textStatus, errorThrown)
               {
                   alert('');
               }
            });
         }
       }
     }));

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
           location.reload();// for reload a page
           //window.location.href = window.location.href;
         }
         ,
         error: function (jqXHR, textStatus, errorThrown)
         {
           alert('Error adding / update data');
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
<?php $uri = $this->uri->segment('4'); if ($uri != NULL) { ?>
  <script type="text/javascript">
  $(window).on('load',function(){
    $('#modal_form').modal('show');
    $("#modalbody").load("<?php echo base_url();?>rate1/"+<?php echo $uri;?>,function(data){
      $("#modalbody").html(data);
    });
    $("#modal-footer").load("<?php echo base_url();?>modalfoot/"+<?php echo $uri;?>,function(data){
      $("#modal-footer").html(data);
    });
      });
  </script>
<?php } ?>
