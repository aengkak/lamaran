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
  <div class="col-md-12">
    <div class="panel-heading">
      <div class="btn-group" role="group">
          <button type="button" class="btn  dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="fa fa-pencil-square-o"></span> Export
            <span class="fa fa-angle-down"></span>
          </button>
        <ul class="dropdown-menu">

          <?php $k = $this->input->post('ke'); foreach ($jabatan as $j) { ?>
          <li><a href="<?php echo base_url('excel/'.$j->id_jabatan."/".$ke);?>"><?php echo $j->nama_jabatan;?></a></li>
        <?php } ?>

        </ul>
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
                        <?php $a = $p->level; $b = substr($a,0,1);
                        if ($b == "P") { ?>
                        <div style="color:#795548"><?php echo $p->level;?></div>
                      <?php } elseif ($b == "N") {?>
                        <div style="color:#F44336"><?php echo $p->level;?></div>
                      <?php } else { ?>
                        <div style="color:#4CAF50"><?php echo $p->level;?></div>
                      <?php } ?>
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
    $("#modal-footer").load("<?php echo base_url();?>modalfoot/"+id,function(data){
      $("#modal-footer").html(data);
    });
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
