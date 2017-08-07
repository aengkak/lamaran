            <!-- start: Content -->
            <div id="content">
               <div class="panel box-shadow-none content-header">
                  <div class="panel-body">
                    <div class="col-md-12">
                        <h3 class="animated fadeInLeft">Pengirim Lamaran</h3>
                        <p class="animated fadeInDown">
                          Data <span class="fa-angle-right fa"></span> pengirim
                        </p>
                    </div>
                  </div>
              </div>
              <div class="col-md-12 top-20 padding-0">
                <div class="col-md-12">
                  <div class="panel">
                    <div class="panel-heading"></div>
                    <div class="panel-body">
                      <div class="responsive-table" >
					  <table id="datatables-example" class="table table-striped table-bordered" width="100%" cellspacing="0">
                      <thead>
                        <tr>
						  <th>No</th>
                          <th>Nama</th>
						  <th>Alamat</th>
						  <th>No Wa</th>
						  <th>Email</th>
						  <th>Posisi</th>
						  <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
					  <?php $no = 1; foreach ($pengirim as $p) :?>
                        <tr>
                          <td><?php echo $no;?></td>
                          <td><?php echo $p->nama;?></td>
						  <td><?php echo $p->alamat?>
						  <td><?php echo $p->no_wa?>
						  <td><?php echo $p->email?>
						  <td><?php echo $p->jabatan?>
                          <td><button class="btn btn-info fa fa-eye" onclick="view(<?php echo $p->id;?>)"></button>
							  <button class="btn btn-danger fa fa-close" onclick="reject(<?php echo $p->id;?>)"> </button>
						  </td>
                        </tr>
                        <?php $no++; endforeach;?>
                      </tbody>
					  </table>
                      </div>
                  </div>
                </div>
              </div>  
              </div>
			  
			  <!-- Bootstrap modal -->
  <div class="modal fade" id="modal_form" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">Form</h3>
      </div>
      <div class="modal-body form" id="modalbody">
        
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
  <!-- End Bootstrap modal -->
            </div>
          <!-- end: content -->

<script type="text/javascript">
 function view(id)
 {
	 $('#modal_form').modal('show');
	 $("#modalbody").load("view/"+id,function(data){
		 $("#modalbody").html(data);
	 });
 }
 
 function reject(id)
    {
      if(confirm('Are you sure reject member?'))
      {
        // ajax delete data from database
          $.ajax({
            url : "<?php echo site_url('ldelete')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
               
               location.reload()// for reload a page
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error deleting data');
            }
        });

      }
    }

</script>