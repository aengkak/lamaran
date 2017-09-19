<?php if ($cek == 1) { ?>
  <input name="id" placeholder="id" class="form-control" type="hidden">
  <div class="form-group">
    <label class="control-label col-md-3">Nama Akses</label>
    <div class="col-md-9">
      <input name="akses" placeholder="Nama" id="akses" class="col-md-12" type="text">
    </div>
  </div>
<?php } else { ?>
  <input name="id_akses" value="<?php echo $akses->id_akses;?>" class="form-control" type="hidden" required>
  <div class="form-group">
    <label class="control-label col-md-3">Nama Akses</label>
    <div class="col-md-9">
      <input value="<?php echo $akses->akses;?>" id="akses" name="akses" placeholder="Nama" class="col-md-12" type="text" required>
    </div>
  </div>
<?php } ?>
