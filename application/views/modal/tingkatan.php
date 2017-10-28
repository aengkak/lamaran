<?php if ($cek == 1) { ?>
  <input name="id" placeholder="id" class="form-control" type="hidden">
  <div class="form-group">
    <label class="control-label col-md-3">Nama Tingkatan</label>
    <div class="col-md-9">
      <input name="nama_tingkatan" placeholder="Nama" id="nama" class="col-md-12" type="text">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-md-3">Tingkatan Ke</label>
    <div class="col-md-9">
      <select name="ke" class="form-control">
        <?php
        $max = $max->ke + 1;
        for ($i=$max; $i <= 10 ; $i++) { ?>
          <option value="<?php echo $i;?>"><?php echo $i;?></option>
        <?php } ?>
      </select>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-md-3">Warna Penanda</label>
    <div class="col-md-9">
      <input name="warna" placeholder="Warna" value="#286090" id="warna" class="col-md-12" type="text">
    </div>
  </div>
<?php } else { ?>
  <input name="id_tingkatan" value="<?php echo $tingkatan->id_tingkatan;?>" class="form-control" type="hidden" required>
  <div class="form-group">
    <label class="control-label col-md-3">Nama Tingkatan</label>
    <div class="col-md-9">
      <input value="<?php echo $tingkatan->nama_tingkatan;?>" id="nama" name="nama_tingkatan" placeholder="Nama" class="col-md-12" type="text" required>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-md-3">Tingkatan Ke</label>
    <div class="col-md-9">
      <select name="ke" class="form-control">
        <?php
        for ($i=1; $i <= 10 ; $i++) { ?>
          <option <?php if ($i == $tingkatan->ke) echo 'selected = "selected"'; ?> value="<?php echo $i;?>"><?php echo $i;?></option>
        <?php } ?>
      </select>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-md-3">Warna Penanda</label>
    <div class="col-md-9">
      <input name="warna" value="<?php echo $tingkatan->warna;?>" placeholder="Warna" id="warna" class="col-md-12" type="text">
    </div>
  </div>
<?php } ?>
