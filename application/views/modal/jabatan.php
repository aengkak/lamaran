<?php if ($cek == 1) { ?>
  <input name="id" placeholder="id" class="form-control" type="hidden">
  <div class="form-group">
    <label class="control-label col-md-3">Nama</label>
    <div class="col-md-9">
      <input name="nama_jabatan" id="nama" placeholder="Nama" class="col-md-12" type="text">
    </div>
  </div>
<?php } else { ?>
  <input name="id_jabatan" value="<?php echo $jabatan->id_jabatan;?>" class="form-control" type="hidden">
  <div class="form-group">
    <label class="control-label col-md-3">Nama</label>
    <div class="col-md-9">
      <input value="<?php echo $jabatan->nama_jabatan;?>" id="nama" name="nama_jabatan" placeholder="Nama" class="col-md-12" type="text">
    </div>
  </div>
<?php } ?>
