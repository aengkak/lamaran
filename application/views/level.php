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
    <div class="col-md-12 top-20 padding-0">
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
                        NO WA
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
                    if ($cek1 == $cek1) { ?>
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
                        <?php echo $p->no_wa?>
                      </td>
                      <td>
                        <?php echo $p->tgl?>
                      </td>
                      <td>
                        <?php echo $p->level;?>
                      </td>
                      <td>
                        <button class="btn btn-info fa fa-eye" onclick="view(<?php echo $p->id_lamaran;?>)">
                        </button>
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
    $("#modalbody").load("<?php echo base_url();?>rate1/"+id,function(data){
      $("#modalbody").html(data);
    }
    );
    $("#modal-footer").load("<?php echo base_url();?>modalfoot1/"+id,function(data){
      $("#modal-footer").html(data);
    });
  }
  function showModal(id) {
    $('#stack').modal('hide');
    $("#" + id).modal('show');
  }
  function save3()
  {
    if ($("#rate:checked,#rate1:checked,#rate2:checked").length == 1) {
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
    } else {
      alert("Tidak Memilih Nilai.");
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
