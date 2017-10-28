<!-- start: Content -->
<div id="content">
   <div class="panel box-shadow-none content-header">
      <div class="panel-body">
         <div class="col-md-12">
            <h3 class="animated fadeInLeft">Data yang telah di tolak
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
                               $counting = $counting +1;
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
                              if ($p->jabatan_id == $key->id_jabatan) { ?>
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
                                 <?php $level=$p->level; $sublevel = substr($level,1);
                                 if($level != "Keluar"){
                                   if($level != "Lulus"){
                                     if ($sublevel == 0) {
                                       echo "Baru";
                                     } else {
                                       foreach ($tingkatan as $keyt) {
                                         if ($sublevel == $keyt->ke) {
                                           echo $keyt->nama_tingkatan;
                                         }
                                       }
                                     }
                                   }
                                 }?>
                              </td>
                              <td>
                                <div class="btn-group" role="group">
                                  <a href="#" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Aksi
                                    <span class="fa fa-angle-down"></span>
                                  </a>
                                  <ul class="dropdown-menu">
                                    <li><a onclick="view(<?php echo $p->id_lamaran;?>)" href="#">Lihat</span></a></li>
                                    <li><a onclick="reject(<?php echo $p->id_lamaran;?>)" href="">Batal Tolak</span></a></li>
                                  </ul>
                                </div>
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



<script>
   function foto(id){
     var loc = "<?php echo base_url();?>files/"+id;
     $('#modal_form').modal('hide');
     $('#stack').modal('show');
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
   //for save method string
   var table;
   function view(id)
   {
     $('#modal_form').modal('show');
     $("#modalbody").load("<?php echo base_url();?>rate4/"+id,function(data){
       $("#modalbody").html(data);
     });
   }
   function showModal(id) {
     $('.modal').modal('hide');
     $("#" + id).modal('show');
   }

   function reject(id)
   {
     if(confirm('Yakin batalkan penolakan?'))
     {
       // ajax delete data from database
       $.ajax({
         url : "<?php echo site_url('bataltolak')?>/"+id,
         type: "POST",
         dataType: "JSON",
         success: function(data)
         {
           location.reload()// for reload a page
         }
         ,
         error: function (jqXHR, textStatus, errorThrown)
         {

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
