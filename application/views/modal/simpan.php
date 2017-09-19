<?php $jabatan_id = $this->session->userdata('jabatan_id');
$res = explode(',',$jabatan_id);
$tingkatan_id = $this->session->userdata('tingkatan_id');
$res1 = explode(',',$tingkatan_id);
foreach ($jabatan as $key0) {
  foreach ($res as $key => $value0) {
    if ($value0 == $key0->id_jabatan) {
      if ($lamaran->jabatan_id == $value0) { ?>
        <button type="button" id="btnSave" onclick="save3()" class="btn btn-primary">Simpan
        </button>
<?php }
    }
  }
}
?>
