<?php $jabatan_id = $this->session->userdata('jabatan_id');
$res = explode(',',$jabatan_id);
$tingkatan_id = $this->session->userdata('tingkatan_id');
$res1 = explode(',',$tingkatan_id);
$level = $lamaran->level;
$sub = substr($level,1);
foreach ($jabatan as $key0) {
  foreach ($res as $key => $value0) {
    if ($value0 == $key0->id_jabatan) {
      if ($lamaran->jabatan_id == $value0) {
        foreach ($tingkatan as $key1) {
          foreach ($res1 as $key2 => $value2) {
            if ($key1->id_tingkatan == $value2) {
              if ($key1->ke == $sub) { ?>
                <button type="button" id="btnSave" onclick="save3()" class="btn btn-primary">Simpan
                </button>
        <?php }
            }
          }
        }
      }
    }
  }
}
?>
