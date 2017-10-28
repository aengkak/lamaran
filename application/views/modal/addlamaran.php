
  <input name="level" class="form-control" value="Y1" type="hidden">
    <div class="panel panel-default">
      <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
        <div class="panel-body">
          <div class="form-group">
            <label class="control-label col-md-3">Posisi</label>
            <div class="col-md-9">
              <select name="jabatan_id" class="form-control" required onChange="getJ(this.value);">
                <?php foreach ($jabatan as $j):
                  if ($j->id_jabatan == $id) { ?>
                    <option value="<?php echo $j->id_jabatan;?>"><?php echo $j->nama_jabatan;?></option>
                  <?php } ?>
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
            <label class="control-label col-md-3">Umur</label>
            <div class="col-md-9">
              <input name="tgl_lahir" placeholder="Umur" class="col-md-12" type="text" required>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">Jenis kelamin</label>
            <div class="col-md-9">
              <select name="gender" class="form-control" required>
                <option value="" style="display:none">Pilih</option>
                <option value="Laki-Laki">Laki-Laki</option>
                <option value="Perempuan">Perempuan</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">Agama</label>
            <div class="col-md-9">
              <select name="agama" id="agama" class="form-control" required>
                <option value="" style="display:none">Pilih</option>
                <option value="Islam">Islam</option>
                <option value="Kristen(Katolik & Protestan)">Kristen(Katolik & Protestan)</option>
                <option value="Hindu">Hindu</option>
                <option value="Buddha">Buddha</option>
                <option value="Kong Hu Cu">Kong Hu Cu</option>
              </select>
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
                <option value="" style="display:none">Pilih</option>
                <option value="Sma Sederajat">SMA Sederajat</option>
                <option value="Diploma">Diploma</option>
                <option value="S1">S1</option>
                <option value="S2">S2</option>
                <option value="S3">S3</option>
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
              <input name="no_telp" maxlength="20" id="no_telp" placeholder="Nomor Telepon" class="col-md-12" type="text" required>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">Nomor WhatsApp</label>
            <div class="col-md-9">
              <input name="no_wa" maxlength="20" id="no" placeholder="Nomor WhatsApp" class="col-md-12" type="text">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">Email</label>
            <div class="col-md-9">
              <input name="email" id="email" placeholder="Email" class="col-md-12" type="text">
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-body">
          <div class="form-group">
            <label class="control-label col-md-3">Tanggal Melamar</label>
            <div class="col-md-9">
              <input name="tgl" id="tgl" placeholder="Tanggal Melamar" class="col-md-12" type="text" required>
            </div>
          </div>
          <div class="form-group">
             <label class="control-label col-md-3">Lowongan Dari </label>
             <div class="col-md-9">
                <select id="informasi" name="informasi" class="form-control" required onChange="getInf(this.value);" required>
                   <option value="" style="display:none">Pilih</option>
                   <?php foreach ($informasi as $keyi): ?>
                   <option value="<?php echo $keyi->informasi;?>"><?php echo $keyi->informasi;?></option>

                   <?php endforeach?>
                   <option value="kosong"> Pilihan Tidak Ada</option>
                </select>
             </div>
          </div>
          <div id="inf"></div>
          <div class="form-group">
            <label class="control-label col-md-3">Keterangan Tambahan</label>
            <div class="col-md-9">
              <textarea name="ket" class="form-control"></textarea>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">Foto</label>
            <div class="col-md-9">
              <input name="foto" id="foto" onchange="return fileValidation()" class="col-md-12" accept="image/*" type="file">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">CV</label>
            <div class="col-md-9">
              <input name="cv" id="pdf" onchange="return filepdf()" class="col-md-12" accept=".pdf, .docx" type="file">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">KTP</label>
            <div class="col-md-9">
              <input name="ktp" id="ktp" onchange="return filektp()" class="col-md-12" accept="image/*" type="file">
            </div>
          </div>
          <div id="dll"></div>
        </div>
      </div>
    </div>
  </div>
