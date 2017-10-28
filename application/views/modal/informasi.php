<?php if ($cek == 1) { ?>
  <input name="id" placeholder="id" class="form-control" type="hidden">
  <div class="form-group">
    <label class="control-label col-md-3">Nama Informasi</label>
    <div class="col-md-9">
      <input name="informasi" placeholder="Nama Informasi" id="informasi" class="col-md-12" type="text">
    </div>
  </div>
<?php } else { ?>
  <input name="id_informasi" value="<?php echo $informasi->id_informasi;?>" class="form-control" type="hidden" required>
  <div class="form-group">
    <label class="control-label col-md-3">Nama Informasi</label>
    <div class="col-md-9">
      <input value="<?php echo $informasi->informasi;?>" id="informasi" name="informasi" placeholder="Nama" class="col-md-12" type="text" required>
    </div>
  </div>
<?php } ?>
