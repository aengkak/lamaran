<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
	<div class="panel panel-default">
		<div class="panel-heading" role="tab" id="headingOne">
			<h4 class="panel-title">
			<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
			<h4 class="down"><b>Data Diri</b></h4>
			</a>
			</h4>
		</div>
		<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
			<div class="panel-body">
				<div class="form-group">
					<label class="control-label col-md-3">Posisi :</label>
					<div class="col-md-9">
						<label class="control-label"> <?php echo $lamaran->nama_jabatan;?> <label>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3">Nama :</label>
					<div class="col-md-9">
						<label class="control-label"><?php echo $lamaran->nama;?></label>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3">TGL Lahir :</label>
					<div class="col-md-9">
						<label class="control-label"><?php echo $lamaran->tgl_lahir;?></label>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3">Jenis Kelamin :</label>
					<div class="col-md-9">
						<label class="control-label"><?php echo $lamaran->gender;?></label>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3">Agama :</label>
					<div class="col-md-9">
						<label class="control-label"><?php echo $lamaran->alamat;?></label>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3">Pendidikan :</label>
					<div class="col-md-9">
						<label class="control-label"><?php echo $lamaran->pendidikan;?></label>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3">Alamat :</label>
					<div class="col-md-9">
						<label class="control-label"><?php echo $lamaran->alamat;?></label>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3">NO TELP :</label>
					<div class="col-md-9">
						<label class="control-label"><?php echo $lamaran->no_telp;?>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3">NO WA :</label>
					<div class="col-md-9">
						<label class="control-label"><?php echo $lamaran->no_wa;?>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3">Email :</label>
					<div class="col-md-9">
						<label class="control-label"><?php echo $lamaran->email;?>
					<br></div>
				</div>
				<?php if ($lamaran->foto != NULL) { ?>
					<div class="form-group">
						<label class="control-label col-md-3">Foto :</label>
						<div class="col-md-9">
							<a href="#" onclick="foto('<?php echo $lamaran->foto ;?>')" class="btn btn-danger">View</a>
						</div>
					</div>
				<?php } ?>
				<?php if ($lamaran->cv != NULL) { ?>
				<div class="form-group">
					<label class="control-label col-md-3">CV :</label>
					<div class="col-md-9">
						<a href="#" onclick="foto('<?php echo $lamaran->cv ;?>')" class="btn btn-danger">View</a>
					</div>
				</div>
			<?php } ?>
			<?php if ($lamaran->ktp != NULL) { ?>
				<div class="form-group">
					<label class="control-label col-md-3">KTP :</label>
					<div class="col-md-9">
						<a href="#" onclick="foto('<?php echo $lamaran->ktp ;?>')" class="btn btn-danger">View</a>
					</div>
				</div>
			<?php } ?>
				<?php if ($lamaran->dll != NULL): ?>
					<?php $no=1; $res = $lamaran->dll;  $res1 = explode(',',$res); foreach ($res1 as $key1 => $value1): ?>
						<div class="form-group">
							<label class="control-label col-md-3">Tambahan Data :<?php echo $no;?></label>
						<div class="col-md-9">
							<a href="#" onclick="foto('<?php echo $value1 ;?>')" class="btn btn-danger">View</a>
						</div>
						</div>
					<?php $no++; endforeach; ?>
				<?php endif; ?>
				<?php if ($lamaran->ket != NULL){ ?>
					<div class="form-group">
						<label class="control-label col-md-3">Keterangan Tambahan:</label>
						<div class="col-md-9">
							<label class="control-label"><div style='text-align:left;'><?php echo $lamaran->ket;?></div></label>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
	<div class="panel panel-default">
		<div class="panel-heading" role="tab" id="headingFour">
			<h4 class="panel-title">
			<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
			<h4 class="down"><b>Komentar</b></h4>
			</a>
			</h4>
		</div>
		<div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
			<div class="panel-body">
				<input type="hidden" value="<?php echo $lamaran->id_lamaran;?>" name="lamaran_id">

				<?php $no = 1; foreach ($rate as $key) {?>
				<div class="form-group">
					<label class="control-label col-md-3"><b><?php echo $key->username;?></b><br>
						<?php
						$tgl1 = $key->tgl_komen;
						$tgl2 = date("Y-m-d");
						$selisih = strtotime($tgl2) -  strtotime($tgl1);
						$hari = $selisih/(60*60*24);
						 if ($hari == 0){
							echo "Hari ini"."<br>";
						}else {
							echo $hari." Hari yg lalu"."<br>";
						} ?>

					<?php echo $key->tgl_komen;?></label>
					<div class="col-md-9">
						<label class="control-label"><div style='text-align:left;'><?php echo $key->isi;?></div></label>
					</div>
				</div>
				<div class="form-group">
			    <label class="control-label col-md-3">Nilai</label>
			    <div class="col-md-9">
          	<input type="radio" <?php $a = substr($key->rate,0,1); if ($a == "Y") echo 'checked = "checked"';?> name="rate<?php echo $no;?>" value="Y" disabled> Yes
						<input type="radio" <?php $a = substr($key->rate,0,1); if ($a == "P") echo 'checked = "checked"';?> name="rate<?php echo $no;?>" value="P" disabled> Pending
						<input type="radio" <?php $a = substr($key->rate,0,1); if ($a == "N") echo 'checked = "checked"';?> name="rate<?php echo $no;?>" value="N" disabled> No
			    </div>
			  </div>
			<?php $no++; } ?>
			<?php $jabatan_id = $this->session->userdata('jabatan_id');
			$res = explode(',',$jabatan_id);
			foreach ($jabatan as $key0) {
			  foreach ($res as $key => $value0) {
			    if ($value0 == $key0->id_jabatan) {
						if ($lamaran->jabatan_id == $value0) {?>
							<div class="form-group">
								<label class="control-label col-md-3">Komentar</label>
								<div class="col-md-9">
									<textarea class="form-control" name="isi" required></textarea>
								</div>
							</div>
							<div class="form-group">
						    <label class="control-label col-md-3">Nilai</label>
						    <div class="col-md-9">
			          	<input type="radio" id="rate" name="rate" value="Y" required> Yes
									<input type="radio" id="rate1" name="rate" value="P" required> Pending
									<input type="radio" id="rate2" name="rate" value="N" required> No
						    </div>
						  </div>
			<?php }
					}
				}
			}
			?>
			</div>
		</div>
	</div>
</div>
