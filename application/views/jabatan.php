<!-- start: Content -->
<div id="content">
	<div class="panel box-shadow-none content-header">
		<div class="panel-body">
			<div class="col-md-12">
				<h3 class="animated fadeInLeft">Jabatan</h3>
				<p class="animated fadeInDown">
					 Data <span class="fa-angle-right fa"></span> jabatan
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
								ID Jabatan
							</th>
							<th>
								Jabatan
							</th>
              <th>
                Tambahan Data
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
						<?php $no = 1; foreach ($jabatan as $j) :?>
						<tr>
							<td>
                  <?php echo $no;?>
							</td>
							<td>
								<?php echo $j->id_jabatan;?>
							</td>
							<td>
                  <?php echo $j->nama_jabatan;?>
							</td>
              <td>
                  <?php if($j->extra == 0) { ?>
										<a href="#" onclick="change1(<?php echo $j->id_jabatan;?>)">Tambahan Data</a>
									<?php } else { ?>
										<a href="#" onclick="change1(<?php echo $j->id_jabatan;?>)">Portfolio</a>
									<?php } ?>
							</td>
							<td>
                  <?php if($j->status == 0){ ?>
										<a href="#" onclick="change(<?php echo $j->id_jabatan;?>)"><div style="background-color:#f44336">Disable</div></a>
									<?php } else {?>
										<a href="#" onclick="change(<?php echo $j->id_jabatan;?>)">Enable</a>
									<?php } ?>
							</td>
								<td>
									<button class="btn btn-warning fa fa-edit" onclick="edit(<?php echo $j->id_jabatan;?>)"></button>
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
						<button type="button" id="btnSave" onclick="save3()" class="btn btn-primary">Simpan</button>
						<button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
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
      $("#modalbody").load("<?php echo base_url();?>modalj/",function(data){
		      $("#modalbody").html(data);
	    });
    }
    function edit(id)
    {
      save_method3 = 'update';
      $('#form')[0].reset(); // reset form on modals
      $('#modal_form').modal('show'); // show bootstrap modal
      $("#modalbody").load("<?php echo base_url();?>jedit/"+id,function(data){
		      $("#modalbody").html(data);
	    });
    }
    function save3()
    {
			if($('#nama').val() == ''){
        alert('isi form.');
        return false;
    } else {
			var url;
      if(save_method3 == 'add')
      {
          url = "<?php echo base_url('jadd')?>";
      }
      else
      {
        url = "<?php echo site_url('jupdate')?>";
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
        elert(errorThrown);
            }
        });
    }

    }
    function change(id)
    {
      if(confirm('Are you sure change this data?'))
      {
        // ajax delete data from database
          $.ajax({
            url : "<?php echo site_url('jchange')?>/"+id,
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
		function change1(id)
    {
      if(confirm('Are you sure change this data?'))
      {
        // ajax delete data from database
          $.ajax({
            url : "<?php echo site_url('jchange1')?>/"+id,
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
