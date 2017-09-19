<?php if ($cek == 1){ ?>
  <input name="id" placeholder="id" class="form-control" type="hidden">
  <div class="form-group">
    <label class="control-label col-md-3">Username</label>
    <div class="col-md-9">
      <input name="username" placeholder="Username" class="col-md-12" type="text">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-md-3">Password</label>
    <div class="col-md-9">
      <input name="password" placeholder="Password" class="form-control" type="password">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-md-3">Akses</label>
    <div class="col-md-9">
    <?php foreach ($akses as $key) {?>
      <label>
          <input type="checkbox" name="akses_id[]" class="minimal" value="<?php echo $key->id_akses;?>">
            <?php echo $key->akses;?>
      </label><br />
    <?php } ?>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-md-3">Jabatan</label>
    <div class="col-md-9">
    <?php foreach ($jabatan as $key1) {?>
      <label>
          <input type="checkbox" name="jabatan_id[]" class="minimal" value="<?php echo $key1->id_jabatan;?>">
            <?php echo $key1->nama_jabatan;?>
      </label><br />
    <?php } ?>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-md-3">Tingkatan</label>
    <div class="col-md-9">
    <?php foreach ($tingkatan as $key2) {?>
      <label>
          <input type="checkbox" name="tingkatan_id[]" class="minimal" value="<?php echo $key2->id_tingkatan;?>">
            <?php echo $key2->nama_tingkatan;?>
      </label><br />
    <?php } ?>
    </div>
  </div>
<?php } else { ?>
  <input name="id_user" value="<?php echo $user->id_user;?>" class="form-control" type="hidden">
  <div class="form-group">
    <label class="control-label col-md-3">Username</label>
    <div class="col-md-9">
      <input name="username" value="<?php echo $user->username;?>" placeholder="Username" class="col-md-12" type="text">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-md-3">Password</label>
    <div class="col-md-9">
      <input name="password" placeholder="Password" class="form-control" type="password">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-md-3">Akses</label>
    <div class="col-md-9">
      <?php $res = $user->akses_id;
      $res1 = explode(',',$res);
      foreach ($akses as $key) {?>
      <label>
            <?php foreach ($res1 as $key1 => $value1) { ?>
          <input type="checkbox" <?php if ($value1 == $key->id_akses) echo 'checked = "checked"'; }?> name="akses_id[]" class="minimal" value="<?php echo $key->id_akses;?>">
            <?php echo $key->akses;?>
      </label><br />
      <?php } ?>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-md-3">Jabatan</label>
    <div class="col-md-9">
    <?php $res2 = $user->jabatan_id;
    $res3 = explode(',',$res2);
    foreach ($jabatan as $key2) {?>
      <label>
        <?php foreach ($res3 as $key3 => $value3) { ?>
          <input type="checkbox" <?php if ($value3 == $key2->id_jabatan) echo 'checked = "checked"'; }?> name="jabatan_id[]" class="minimal" value="<?php echo $key2->id_jabatan;?>">
            <?php echo $key2->nama_jabatan;?>
      </label><br />
    <?php } ?>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-md-3">Tingkatan</label>
    <div class="col-md-9">
    <?php $res4 = $user->tingkatan_id;
    $res5 = explode(',',$res4);
    foreach ($tingkatan as $key4) {?>
      <label>
        <?php foreach ($res5 as $key5 => $value5) { ?>
          <input type="checkbox" <?php if ($value5 == $key4->id_tingkatan) echo 'checked = "checked"'; }?> name="tingkatan_id[]" class="minimal" value="<?php echo $key4->id_tingkatan;?>">
            <?php echo $key4->nama_tingkatan;?>
      </label><br />
    <?php } ?>
    </div>
  </div>
<?php } ?>
