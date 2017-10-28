<?php if ($rate == NULL) { ?>
  <button type="button" id="btnSave" onclick="save3()" class="btn btn-primary">Simpan
  </button>
<?php } else {
  $rr = $lamaran->level;
  $substr = substr($rr,1);
  $substr1 = substr($rr,0,1);
          if ($substr1 != "N") { ?>
    <button type="button" id="btnSave" onclick="save3()" class="btn btn-primary">Simpan
    </button>
<?php  }
  }
?>
