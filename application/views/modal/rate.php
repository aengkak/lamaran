<div class="panel-body">
	<ul id="tabs-demo4" class="nav nav-tabs nav-tabs-v3" role="tablist" style="padding-top: 0px;">
		<li role="presentation" class="active">
		<a href="#tabs-demo4-area1" id="tabs-demo4-1" role="tab" data-toggle="tab" aria-expanded="true">Data</a>
		</li>
			<li role="presentation" class="">
			<a href="#tabs-demo4-area2" role="tab" id="tabs-demo4-2" data-toggle="tab" aria-expanded="false">Baru</a>
			</li>
	</ul>
	<div id="tabsDemo4Content" class="tab-content tab-content-v3">
		<div role="tabpanel" class="tab-pane fade active in" id="tabs-demo4-area1" aria-labelledby="tabs-demo4-area1"><br>
			<div class="col-sm-8" style="left: 0px;">
				<div class="form-group">
					<label><b>Posisi :</b> <?php echo $lamaran->nama_jabatan;?></label>
				</div>
				<div class="form-group">
					<label><b>Nama :</b> <?php echo $lamaran->nama;?></label>
				</div>
				<?php if ($lamaran->alamat != NULL): ?>
					<div class="form-group">
						<label><b>Alamat :</b> <?php echo $lamaran->alamat;?></label>
					</div>
				<?php endif; ?>
				<div class="form-group">
					<label><b>Nomor Telepon :</b> <?php echo $lamaran->no_telp;?></label>
				</div>
				<div class="form-group">
					<label><b>Nomor WhatsApp :</b> <?php echo $lamaran->no_wa;?></label>
				</div>
				<div class="form-group">
					<label><b>Email :</b> <?php echo $lamaran->email;?></label>
				</div>
				<div class="form-group">
					<label><b>Agama :</b> <?php echo $lamaran->agama;?></label>
				</div>
				<?php if ($lamaran->dll != NULL): ?> <?php $no=1; $res = $lamaran->dll; $res1 = explode(',',$res); foreach ($res1 as $key1 => $value1): ?>
				<div class="form-group">
					<label><b>Tambahan Data <?php echo $no;?>:</b> <a href="#" onclick="foto('<?php echo $value1 ;?>')" class="btn btn-danger">View</a></label>
				</div>
				<?php $no++; endforeach; ?>
				<?php endif; ?>
				<?php if ($lamaran->ket != NULL){ ?>
				<div class="form-group">
					<label><b>Keterangan Tambahan :</b> <?php echo $lamaran->ket;?></label>
				</div>
				<?php } ?>
			</div>
			<div class="col-sm-4" style="left: 0px;">
				<?php if ($lamaran->foto != NULL) { ?>
				<div class="form-group">
					<a href="<?php echo base_url();?>files/<?php echo $lamaran->foto;?>" target="_blank">
						<img class="box-v2-cover img-responsive" src="<?php echo base_url();?>files/<?php echo $lamaran->foto;?>">
					</a>
				</div>
				<?php }
					 // Tanggal Lahir
						 $birthday = $lamaran->tgl_lahir;

						 // Convert Ke Date Time
						 $biday = new DateTime($birthday);
						 $today = new DateTime();

						 $diff = $today->diff($biday);
					 ?>
				<div class="form-group">
					<label><b><?php echo $lamaran->kota.", ".$lamaran->gender.", ".$diff->y." "."Tahun, ".$lamaran->pendidikan;?> </b></label>
				</div>

				<div class="form-group">
					<?php if ($lamaran->cv != NULL) { ?>
					<a href="#" onclick="foto('<?php echo $lamaran->cv ;?>')" class="btn btn-danger">CV</a>
					<?php } ?>
					<?php if ($lamaran->ktp != NULL) { ?>
					<a href="#" onclick="kepribadian('<?php echo $lamaran->ktp ;?>')" class="btn btn-danger">KTP</a>
				<?php } ?>
				</div>

			</div>
		</div>
			<div role="tabpanel" class="tab-pane fade" id="tabs-demo4-area2" aria-labelledby="tabs-demo4-area2"><br>
				<?php $no = 1; foreach ($rate as $key) {
					$s = substr($key->rate,1);
					if ($s == 0) { ?>
				<div class="form-group">
					<label class="control-label col-md-3"><b><?php echo $key->username;?></b><br>
					<?php echo $key->tgl_komen;?></label>
					<div class="col-md-9">
						<label class="control-label"><div style='text-align:left;'><?php echo $key->isi;?></div></label>
					</div>
				</div>
				<?php $aa = substr($key->rate,0,1);
				if ($aa == "C") { ?>
				<?php } else { ?>
					<div class="form-group">
				    <label class="control-label col-md-3">Nilai</label>
				    <div class="col-md-9">
							<input type="radio" <?php $a = substr($key->rate,0,1); if ($a == "Y") echo 'checked = "checked"';?> name="rate<?php echo $no;?>" value="Y" disabled> Yes
							<input type="radio" <?php $a = substr($key->rate,0,1); if ($a == "P") echo 'checked = "checked"';?> name="rate<?php echo $no;?>" value="P" disabled> Pending
							<input type="radio" <?php $a = substr($key->rate,0,1); if ($a == "N") echo 'checked = "checked"';?> name="rate<?php echo $no;?>" value="N" disabled> No
						</div>
				  </div>
				<?php }
			 	$no++; } } ?>
			<input type="hidden" value="<?php echo $lamaran->id_lamaran;?>" name="lamaran_id">
				<?php $jabatan_id = $this->session->userdata('jabatan_id');
			$res = explode(',',$jabatan_id);
			if ($rate == NULL) { ?>
				<div class="form-group">
					<label class="control-label col-md-3">Komentar</label>
					<div class="col-md-9">
						<textarea class="form-control" name="isi" required></textarea>
					</div>
				</div>
				<div class="form-group">
					<?php foreach ($jabatan as $key0) {
						foreach ($res as $key => $value0) {
							if ($value0 == $key0->id_jabatan) {
								if ($lamaran->jabatan_id == $value0) { ?>
					<label class="control-label col-md-3">Nilai</label>
				<?php } } } } ?>
					<div class="col-md-9">
						<?php foreach ($jabatan as $key0) {
						  foreach ($res as $key => $value0) {
						    if ($value0 == $key0->id_jabatan) {
									if ($lamaran->jabatan_id == $value0) { ?>
										<input type="radio" id="rate" name="rate" value="Y" required> Yes
										<input type="radio" id="rate1" name="rate" value="P" required> Pending
										<input type="radio" id="rate2" name="rate" value="N" required> No
						 		<?php }
								}
							}
						} ?>
					</div>
				</div>
		<?php	} else {
			$rr = $lamaran->level;
			$substr = substr($rr,1);
			$substr1 = substr($rr,0,1);
							if ($substr1 != "N") {
							?>
							<div class="form-group">
								<label class="control-label col-md-3">Komentar</label>
								<div class="col-md-9">
									<textarea class="form-control" id="isi" name="isi" required></textarea>
								</div>
							</div>
							<div class="form-group">
								<?php foreach ($jabatan as $key0) {
									foreach ($res as $key => $value0) {
										if ($value0 == $key0->id_jabatan) {
											if ($lamaran->jabatan_id == $value0) { ?>
								<label class="control-label col-md-3">Nilai</label>
							<?php } } } } ?>
								<div class="col-md-9">
									<?php foreach ($jabatan as $key0) {
									  foreach ($res as $key => $value0) {
									    if ($value0 == $key0->id_jabatan) {
												if ($lamaran->jabatan_id == $value0) { ?>
													<input type="radio" id="rate" name="rate" value="Y" required> Yes
													<input type="radio" id="rate1" name="rate" value="P" required> Pending
													<input type="radio" id="rate2" name="rate" value="N" required> No
									 		<?php	break; }
											}
										}
									} ?>
								</div>
						  </div>
			<?php
			}
		}

			?>
			</div>
	</div>
</div>
