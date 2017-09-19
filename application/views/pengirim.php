<!-- start: Content -->
<div id="content">
  <div class="panel box-shadow-none content-header">
    <div class="panel-body">
      <div class="col-md-12">
        <h3 class="animated fadeInLeft">Pengirim Lamaran Baru
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
      <button class="btn btn-primary fa fa-plus" onclick="add()"></button>
    </div>
  </div>
  <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
    <div class="col-md-12 top-20 padding-0">
      <div class="col-md-12">
        <?php
        $i = 0;
        foreach ($jabatan as $key) {
        $i++;
          ?>
        <div class="panel panel-default">
          <div class="panel-heading" role="tab" id="heading<?php echo $i;?>">
            <h4 class="panel-title">
              <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $i;?>" aria-expanded="true" aria-controls="collapse<?php echo $i;?>">
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
          <div id="collapse<?php echo $i;?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?php echo $i;?>">
            <div class="panel-body">
              <div class="responsive-table">
                <table id="datatables-example" class="table table-striped table-bordered" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>
                        No
                      </th>
                      <th>
                        Nama
                      </th>
                      <th>
                        Tgl Lahir
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
                        Tgl Melamar
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
                        if ($b == "P") {
                        echo $p->level;
                        } elseif ($b == "N") {
                        echo $p->level;
                        } else {
                        echo "Baru";
                        }?>
                      </td>
                      <td>
                        <button class="btn btn-info fa fa-eye" onclick="view(<?php echo $p->id_lamaran;?>)">
                        </button>
                      </td>
                    </tr>
                    <?php $no++; }
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
          <h3 class="modal-title">Form
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
          <h3 class="modal-title">Form</h3>
        </div>
        <div class="modal-body form">
          <form action="#" id="form1" class="form-horizontal">
            <div class="form-body" id="modalbody1">

            </div>

        </div>
        <div class="modal-footer">
          <input type="submit" value="submit" class="btn btn-primary" />
          <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
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
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" onclick="showModal('modal_form')" aria-label="Close">
            <span aria-hidden="true">&times;
            </span>
          </button>
          <h3 class="modal-title">Form
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
          <button type="button" class="btn btn-danger" data-dismiss="modal">Batal
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
    			});
    });
    $("#form1").on('submit',(function(e) {
      e.preventDefault();
      $.ajax({
        url: "addlamaran1",
        type: "POST",
        data:  new FormData(this),
        contentType: false,
        cache: false,
        processData:false,
        success: function(data)
          {
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
  <script>
  function getJ(val) {
  	$.ajax({
  	type: "POST",
  	url: "<?php echo base_url('selectj')?>",
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
  var save_method3;
  //for save method string
  var table;
  function view(id)
  {
    save_method3 = 'add';
    $('#modal_form').modal('show');
    $("#modalbody").load("<?php echo base_url();?>rate/"+id,function(data){
      $("#modalbody").html(data);
    });
    $("#modal-footer").load("<?php echo base_url();?>modalfoot/"+id,function(data){
      $("#modal-footer").html(data);
    });
  }
  function showModal(id) {
    $('#stack').modal('hide');
    $("#" + id).modal('show');
  }
  function save3()
  {
    if ($("#rate:checked,#rate1:checked,#rate2:checked").length == 1)
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
          location.reload()// for reload a page
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
    else
    {
     alert("Tidak Memilih Nilai.");
    }

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
