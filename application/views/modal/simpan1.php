<?php if ($rate == NULL) { ?>
  <input type="submit" value="Simpan" class="btn btn-primary" />
<?php } else {
  $rr = $lamaran->level;
  $substr = substr($rr,1);
  $substr1 = substr($rr,0,1);
          if ($substr1 != "N") { ?>
    <input type="submit" value="Simpan" class="btn btn-primary" />
<?php  }
  }
?>
