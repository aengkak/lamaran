
  <input name="id" placeholder="id" class="form-control" type="hidden">
    <div class="panel panel-default">
      <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
        <div class="panel-body">
          <div class="form-group">
            <label class="control-label col-md-3">Posisi</label>
            <div class="col-md-9">
              <select name="jabatan_id" class="form-control" required onChange="getJ(this.value);">
                <option>Select</option>
                <?php foreach ($jabatan as $j): ?>
                <option value="<?php echo $j->id_jabatan;?>"><?php echo $j->nama_jabatan;?></option>
                <?php endforeach?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">Nama</label>
            <div class="col-md-9">
              <input name="nama" placeholder="Nama" id="nama" class="col-md-12" type="text" required>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">Tgl Lahir</label>
            <div class="col-md-9">
              <input name="tgl_lahir" id="datepicker" placeholder="Tgl Lahir" class="col-md-12" type="text" required>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">Jenis kelamin</label>
            <div class="col-md-9">
              <select name="gender" class="form-control">
                <option value="Laki-Laki">Laki-Laki</option>
                <option value="Perempuan">Perempuan</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">Agama</label>
            <div class="col-md-9">
              <select name="agama" class="form-control">
                <option>Select</option>
                <option value="Islam">Islam</option>
                <option value="Kristen">Kristen</option>
                <option value="Hindu">Hindu</option>
                <option value="Budha">Budha</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">Alamat</label>
            <div class="col-md-9">
              <input name="alamat" placeholder="Alamat" class="col-md-12" type="text" required>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">Kota</label>
            <div class="col-md-9">
              <input name="kota" placeholder="Kota" class="col-md-12" type="text" required>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">Pendidikan Terakhir</label>
            <div class="col-md-9">
              <select name="pendidikan" class="form-control" required>
                <option>Select</option>
                <option value="S3">S3</option>
                <option value="S2">S2</option>
                <option value="S1">S1</option>
                <option value="Sma/Smk">Sma/Smk</option>
              </select>
            </div>
          </div>

        </div>
      </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-body">
          <div class="form-group">
            <label class="control-label col-md-3">NO TELP</label>
            <div class="col-md-9">
              <input name="no_telp" maxlength="12" id="no_telp" placeholder="No Telp" onkeypress="return hanyaAngka(event)" class="col-md-12" type="text" required>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">NO WA</label>
            <div class="col-md-9">
              <input name="no_wa" maxlength="12" id="no" placeholder="No WA" onkeypress="return hanyaAngka(event)" class="col-md-12" type="text" required>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">Email</label>
            <div class="col-md-9">
              <input name="email" id="email" placeholder="Email" class="col-md-12" type="text" required>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-body">
          <div class="form-group">
            <label class="control-label col-md-3">Keterangan Tambahan</label>
            <div class="col-md-9">
              <textarea name="ket" class="form-control"></textarea>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">Foto</label>
            <div class="col-md-9">
              <input name="foto" id="foto" onchange="return fileValidation()" class="form-control" accept="image/*" type="file">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">CV</label>
            <div class="col-md-9">
              <input name="cv" id="pdf" onchange="return filepdf()" class="form-control" accept=".pdf" type="file">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">KTP</label>
            <div class="col-md-9">
              <input name="ktp" id="ktp" onchange="return filektp()" class="form-control" accept="image/*" type="file">
            </div>
          </div>
          <div id="dll"></div>
        </div>
      </div>
    </div>
  </div>
