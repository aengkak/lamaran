            <!-- start: Content -->
            <div id="content">
               <div class="panel box-shadow-none content-header">
                  <div class="panel-body">
                    <div class="col-md-12">
                        <h3 class="animated fadeInLeft">User</h3>
                        <p class="animated fadeInDown">
                          Data <span class="fa-angle-right fa"></span> user
                        </p>
                    </div>
                  </div>
              </div>
              <div class="col-md-12 top-20 padding-0">
                <div class="col-md-12">
                  <div class="panel">
                    <div class="panel-heading"><button class="btn btn-primary fa fa-plus" onclick="adduser()"></button></div>
                    <div class="panel-body">
                      <div class="responsive-table" >
                      
					  <table id="datauser" class="table table-striped table-bordered" width="100%" cellspacing="0">
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
                  <div class="modal-body form">
                    <form action="#" id="form" class="form-horizontal">
                      <div class="form-body">
                            <input name="id" placeholder="id" class="form-control" type="hidden">
            			<div class="form-group">
                          <label class="control-label col-md-3">Username</label>
                          <div class="col-md-9">
                            <input name="username" placeholder="Username" class="form-control" type="text">
                          </div>
                        </div>
            			<div class="form-group">
                          <label class="control-label col-md-3">Password</label>
                          <div class="col-md-9">
                            <input name="password" placeholder="Password" class="form-control" type="password">
                          </div>
                        </div>
                      </div>
                    </form>
                      </div>
                      <div class="modal-footer">
                        <button type="button" id="btnSave" onclick="save3()" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                      </div>
                    </div><!-- /.modal-content -->
                  </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
  <!-- End Bootstrap modal -->
            </div>
          <!-- end: content -->

<script type="text/javascript">
    var save_method3; //for save method string
    var table;

    function adduser()
    {
      save_method3 = 'add';
      $('#form')[0].reset(); // reset form on modals
      $('#modal_form').modal('show'); // show bootstrap modal
    //$('.modal-title').text('Add Person'); // Set Title to Bootstrap modal title
    }

    function edituser(id)
    {
      save_method3 = 'update';
      $('#form')[0].reset(); // reset form on modals

      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('useredit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

            $('[name="id"]').val(data.id);
      $('[name="username"]').val(data.username);

            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit User'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
    }

    function save3()
    {
      var url;
      if(save_method3 == 'add')
      {
          url = "<?php echo base_url('useradd')?>";
      }
      else
      {
        url = "<?php echo site_url('userupdate')?>";
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

    function deleteuser(id)
    {
      if(confirm('Are you sure delete this data?'))
      {
        // ajax delete data from database
          $.ajax({
            url : "<?php echo site_url('userdelete')?>/"+id,
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