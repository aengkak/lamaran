
  <input name="id_lamaran" class="form-control" value="<?php echo $pengirim->id_lamaran;?>" type="hidden">
    <div class="panel panel-default">
      <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
        <div class="panel-body">
          <div class="form-group">
            <label class="control-label col-md-3">Nama</label>
            <div class="col-md-9">
              <input name="nama" placeholder="Nama" value="<?php echo $pengirim->nama;?>" id="nama" class="col-md-12" type="text" required>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">Tanggal Lahir</label>
            <div class="col-md-9">
              <input name="tgl_lahir" id="datepicker" value="<?php echo $pengirim->tgl_lahir;?>" placeholder="Tanggal Lahir" class="col-md-12" type="text" required>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">Jenis kelamin</label>
            <div class="col-md-9">
              <select name="gender" class="form-control" required>
                <option value="" style="display:none">Pilih</option>
                <option <?php if($pengirim->gender == "Laki-Laki"){ echo 'selected = "selected"'; }?> value="Laki-Laki">Laki-Laki</option>
                <option <?php if($pengirim->gender == "Perempuan"){ echo 'selected = "selected"'; }?> value="Perempuan">Perempuan</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">Agama</label>
            <div class="col-md-9">
              <select name="agama" id="agama" class="form-control" required>
                <option value="" style="display:none">Pilih</option>
                <option <?php if($pengirim->agama == "Islam"){ echo 'selected = "selected"'; }?> value="Islam">Islam</option>
                <option <?php if($pengirim->agama == "Kristen(Katolik & Protestan)"){ echo 'selected = "selected"'; }?> value="Kristen(Katolik & Protestan)">Kristen(Katolik & Protestan)</option>
                <option <?php if($pengirim->agama == "Hindu"){ echo 'selected = "selected"'; }?> value="Hindu">Hindu</option>
                <option <?php if($pengirim->agama == "Buddha"){ echo 'selected = "selected"'; }?> value="Buddha">Buddha</option>
                <option <?php if($pengirim->agama == "Kong Hu Cu"){ echo 'selected = "selected"'; }?> value="Kong Hu Cu">Kong Hu Cu</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">Alamat</label>
            <div class="col-md-9">
              <textarea name="alamat" class="col-md-12"><?php echo $pengirim->alamat;?></textarea>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">Kota</label>
            <div class="col-md-9">
              <input name="kota" value="<?php echo $pengirim->kota;?>" placeholder="Kota" class="col-md-12" type="text" required>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">Pendidikan Terakhir</label>
            <div class="col-md-9">
              <select name="pendidikan" class="form-control" required>
                <option <?php if($pengirim->pendidikan == "Sma Sederajat"){ echo 'selected = "selected"'; }?> value="Sma Sederajat">SMA Sederajat</option>
                <option <?php if($pengirim->pendidikan == "Diploma"){ echo 'selected = "selected"'; }?> value="Diploma">Diploma</option>
                <option <?php if($pengirim->pendidikan == "S1"){ echo 'selected = "selected"'; }?> value="S1">S1</option>
                <option <?php if($pengirim->pendidikan == "S2"){ echo 'selected = "selected"'; }?> value="S2">S2</option>
                <option <?php if($pengirim->pendidikan == "S3"){ echo 'selected = "selected"'; }?> value="S3">S3</option>
              </select>
            </div>
          </div>

        </div>
      </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-body">
          <div class="form-group">
            <label class="control-label col-md-3">Nomor Telepon</label>
            <div class="col-md-9">
              <input name="no_telp" maxlength="12" value="<?php echo $pengirim->no_telp;?>" id="no_telp" placeholder="Nomor Telepon" onkeypress="return hanyaAngka(event)" class="col-md-12" type="text" required>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">Nomor WhatsApp</label>
            <div class="col-md-9">
              <input name="no_wa" maxlength="12" id="no" value="<?php echo $pengirim->no_wa;?>" placeholder="Nomor WhatsApp" onkeypress="return hanyaAngka(event)" class="col-md-12" type="text" required>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">Email</label>
            <div class="col-md-9">
              <input name="email" value="<?php echo $pengirim->email;?>" id="email" placeholder="Email" class="col-md-12" type="text" required>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-body">
          <div class="col-sm-8" style="left: 0px;">
          <div class="form-group">
            <label class="control-label col-md-3">Foto</label>
            <div class="col-md-9">
              <input name="foto" id="foto" onchange="return fileValidation()" class="col-md-12" accept="image/*" type="file">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">Tanggal Masuk</label>
            <div class="col-md-9">
              <input name="mulai" id="datepicker1" value="<?php $tglm = $pengirim->mulai; if($tglm != 0000-00-00){echo $tglm;}?>" placeholder="Tanggal Masuk" class="col-md-12" type="text" required>
            </div>
          </div>
        </div>
          <div class="col-sm-4" style="left: 0px;">
            <img class="box-v2-cover img-responsive" src="<?php echo base_url();?>files/<?php echo $pengirim->foto;?>">
          </div>
        </div>
      </div>
