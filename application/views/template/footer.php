          <!-- start: right menu -->
            <div id="right-menu">
              <ul class="nav nav-tabs">
                <li class="active">
                 <a data-toggle="tab" href="#right-menu-notif">
                  <span class="fa fa-comment-o fa-2x"></span>
                 </a>
                </li>
                <li>
                  <?php $user_id = $this->session->userdata('user_id');?>
                  <a data-toggle="tab" onclick="tandai(<?php echo $user_id;?>)" href="#">
                    <span class="fa fa-check fa-2x"></span>
                  </a>
                </li>
              </ul>

              <div class="tab-content">
                <div id="right-menu-notif" class="tab-pane fade in active">
                  <ul class="mini-timeline" id="postList">
            <?php if(!empty($posts)): foreach($posts as $post):
              $level = $post['level'];
              $sublevel = substr($level,1);
              if ($sublevel == NULL) {
                $l = "lamaran/".$post['jabatan_id'];
              } else {
                if ($level == "Lulus") {
                  $l = "karyawan/".$post['jabatan_id'];
                } elseif ($level == "Keluar") {
                  $l = "kkeluar/".$post['jabatan_id'];
                } else {
                  $l = "tingkat/".$post['jabatan_id']."/".$sublevel;
                }
              }?>
              <li class="mini-timeline-highlight <?php if($post['cek'] == 0){?> mini-timeline-danger <?php } ?>">
                 <div class="mini-timeline-panel">
                  <h5 class="time"><?php echo $post['date'];?></h5>
                  <a <?php if($post['cek'] == 0){?> onclick="notif(<?php echo $post['id_notif'];?>)" <?php } ?>
                    href="<?php echo base_url().$l."/".$post['lamaran_id'];?>">
                    <?php echo $post['username']." Mengomentari ".$post['nama']?>
                  </a>
                </div>
              </li><br>
            <?php endforeach; else: ?>
            <p>Tidak Ada.</p>
          <?php endif; ?><br>
            <?php echo $this->ajax_pagination->create_links(); ?>
                  </ul>

                </div>
              </div>
            </div>
          <!-- end: right menu -->

      </div>

      <!-- start: Mobile -->
      <div id="mimin-mobile" class="reverse">
        <div class="mimin-mobile-menu-list">
            <div class="col-md-12 sub-mimin-mobile-menu-list animated fadeInLeft">
                <ul class="nav nav-list">
                  <li><div class="left-bg" style="height: 190px;"></div></li>
                    <li class="ripple"><a href="<?php echo base_url('home');?>"><span class="fa fa-home fa"></span>Beranda</a></li>
                    <li class="ripple"><a href="<?php echo base_url('lamaran');?>"><span class="fa fa-file-code-o"></span>Baru</a></li>
                    <li class="ripple"><a href="<?php echo base_url('hapus');?>"><span class="fa fa-trash"></span>Dihapus</a></li>
                    <li class="ripple">
                      <a class="tree-toggle nav-header">
                        <span class="fa fa-pencil-square"></span> Pengaturan
                        <span class="fa-angle-right fa right-arrow text-right"></span>
                      </a>
                      <ul class="nav nav-list tree">
                        <?php $akses_id = $this->session->userdata('akses_id');
                    		$res1 = explode(',',$akses_id);
                        foreach ($akses as $key) {
                          foreach ($res1 as $key1 => $value) {
                            if ($key->id_akses == $value) { ?>
                              <li><a href="<?php echo base_url($key->akses);?>"><?php echo $key->akses;?></a></li>
                        <?php }
                            }
                         } ?>
					             </ul>
                    </li>
                </ul>
            </div>
        </div>
      </div>
      <button id="mimin-mobile-menu-opener" class="animated rubberBand btn btn-circle btn-danger">
        <span class="fa fa-bars"></span>
      </button>
       <!-- end: Mobile -->

       <!-- Bootstrap modal -->
       <div class="modal fade" id="pass" role="dialog">
          <div class="modal-dialog">
             <div class="modal-content">
                <div class="modal-header">
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                   <h3 class="modal-title"></h3>
                </div>
                <div>
                  <form action="#" id="formpass" class="form-horizontal">
                <div class="modal-body">
                        <div class="form-group">
                          <label class="control-label col-md-3">Sandi Lama</label>
                          <div class="col-md-9">
                            <input name="lama" id="lama" class="form-control" type="password" required>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3">Sandi Baru</label>
                          <div class="col-md-9">
                            <input name="baru" id="baru" class="form-control" type="password" required>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3">Verify Sandi Baru</label>
                          <div class="col-md-9">
                            <input name="baru1" id="baru1" class="form-control" type="password" required>
                          </div>
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
             </div>
             <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
       </div>
       <!-- End Bootstrap modal -->

       <script>
          function pass(){
            $('#formpass')[0].reset();
            $('#pass').modal('show');
            $("#formpass").on('submit',(function(e) {
              e.preventDefault();
              $.ajax({
                url: "<?php echo base_url()?>cekpass",
                data:$('#formpass').serialize(),
                type: "POST",
                success:function(data){
                if (data > 0) {
                  if ($('#baru').val() == $('#baru1').val()) {
                    $.ajax({
                      url : "<?php echo base_url('updatepass')?>",
                      type: "POST",
                      data: $('#formpass').serialize(),
                      beforeSend: function(){
             				       $('#loading').html("<img src='<?php echo base_url();?>assets/front/images/bx_loader.gif' /> Processing!");
             			    },
                      success: function(data)
                      {
                          $('#pass').modal('hide');
                          location.reload()
                      },
                      error: function (jqXHR, textStatus, errorThrown)
                      {
                      }
                    });
                  } else {
                    alert('Sandi Baru Tidak Sama');
                  }

                  return false;
                } else {
                  alert('Sandi Lama Salah')
                }
                },
                error:function (){}
               });
            }));
          }
       </script>
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
    <script src="<?php echo base_url('asset/js/plugins/icheck.min.js');?>"></script>

    <!-- custom -->
     <script src="<?php echo base_url('asset/js/main.js');?>"></script>


<script type="text/javascript">
  $(document).ready(function(){

    $(".nav-tabs a").click(function (e) {
      e.preventDefault();
      $(this).tab('show');
    });

  });
</script>
<script type="text/javascript">
$( "#datepicker" ).bootstrapMaterialDatePicker({ weekStart : 0, time: false,animation:true});
</script>

<script>
		function hanyaAngka(evt) {
		  var charCode = (evt.which) ? evt.which : event.keyCode
		   if (charCode > 31 && (charCode < 48 || charCode > 57))

		    return false;
		  return true;
		}
	</script>

  <script type="text/javascript">
     $(document).ready(function(){
       $('input').iCheck({
        checkboxClass: 'icheckbox_flat-blue',
        radioClass: 'iradio_flat-blue'
      });
     });
  </script>
  <script>
  function notif (id){
    $.ajax({
      url : "<?php echo base_url('updatenotif')?>",
      type: "POST",
      data: { id_notif : id },
      success: function(data)
      {
      }
      ,
      error: function (jqXHR, textStatus, errorThrown)
      {
      }
    }
    );
  }
  </script>
  <script>
  function tandai(id){
    if(confirm('Tandai Semua Telah Dibaca?'))
    {
      $.ajax({
        url : "<?php echo base_url('updatenotif1')?>",
        type: "POST",
        data: { user_id : id },
        success: function(data)
        {
          location.reload();
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
  </body>
</html>
