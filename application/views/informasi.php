<!-- start: Content -->
<div id="content">
	<div class="panel box-shadow-none content-header">
		<div class="panel-body">
			<div class="col-md-12">
				<h3 class="animated fadeInLeft">Informasi</h3>
				<p class="animated fadeInDown">
					 Data <span class="fa-angle-right fa"></span> informasi
				</p>
			</div>
		</div>
	</div>
	<div class="col-md-12 top-20 padding-0">
		<div class="col-md-12">
			<div class="panel">
				<div class="panel-heading">
					<button class="btn btn-primary fa fa-plus" onclick="add()"></button>
				</div>
				<div class="panel-body">
					<div class="responsive-table">
						<table id="datatables-example" class="table table-striped table-bordered" width="100%" cellspacing="0">
						<thead>
						<tr>
							<th>
								No
							</th>
							<th>
								Informasi
							</th>
							<th>
								Aksi
							</th>
						</tr>
						</thead>
						<tbody>
						<?php $no = 1; foreach ($informasi as $key) :?>
						<tr>
							<td>
                  <?php echo $no;?>
							</td>
							<td>
                  <?php echo $key->informasi;?>
							</td>
								<td>
									<button class="btn btn-warning fa fa-edit" onclick="edit(<?php echo $key->id_informasi;?>)"></button>
                  <button class="btn btn-danger fa fa-close" onclick="change(<?php echo $key->id_informasi;?>)"></button>
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
						<h3 class="modal-title"></h3>
					</div>
					<div class="modal-body form">
						<form action="#" id="form" class="form-horizontal">
              <div class="form-body" id="modalbody">

              </div>
						</form>
					</div>
					<div class="modal-footer">
						<button type="button" id="btnSave" onclick="save3()" class="btn btn-primary">Save</button>
						<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
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
	<script type="text/javascript">
    var save_method3; //for save method string
    var table;
    function add()
    {
      save_method3 = 'add';
      $('#form')[0].reset(); // reset form on modals
      $('#modal_form').modal('show'); // show bootstrap modal
      $("#modalbody").load("<?php echo base_url();?>modalinf/",function(data){
		      $("#modalbody").html(data);
	    });
    }
    function edit(id)
    {
      save_method3 = 'update';
      $('#form')[0].reset(); // reset form on modals
      $('#modal_form').modal('show'); // show bootstrap modal
      $("#modalbody").load("<?php echo base_url();?>infedit/"+id,function(data){
		      $("#modalbody").html(data);
	    });
    }
    function save3()
    {
			if($('#informasi').val() == ''){
        alert('isi form.');
        return false;
    } else {
      var url;
      if(save_method3 == 'add')
      {
          url = "<?php echo base_url('infadd')?>";
      }
      else
      {
        url = "<?php echo site_url('infupdate')?>";
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
              location.reload()// for reload a page
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
			}
    }
    function change(id)
    {
      if(confirm('Are you sure delete this data?'))
      {
        // ajax delete data from database
          $.ajax({
            url : "<?php echo site_url('infdelete')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
               location.reload()// for reload a page
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error changing data');
            }
        });
      }
    }
	</script>
