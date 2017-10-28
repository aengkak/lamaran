<div class="panel-body">
	<ul id="tabs-demo4" class="nav nav-tabs nav-tabs-v3" role="tablist" style="padding-top: 0px;">
		<li role="presentation" class="active">
		<a href="#tabs-demo4-area1" id="tabs-demo4-1" role="tab" data-toggle="tab" aria-expanded="true">Komentar</a>
		</li>
	</ul>
	<div id="tabsDemo4Content" class="tab-content tab-content-v3">
		<div role="tabpanel" class="tab-pane fade active in" id="tabs-demo4-area1" aria-labelledby="tabs-demo4-area1"><br>
			<?php foreach ($rate as $key) {
				$s = substr($key->rate,1);
				if ($key->rate == "CLulus") { ?>
					<div class="form-group">
						<label class="control-label col-md-3"><b><?php echo $key->username;?></b><br>
						<?php echo $key->tgl_komen;?></label>
						<div class="col-md-9">
							<label class="control-label"><div style='text-align:left;'><?php echo $key->isi;?></div></label>
						</div>
					</div>
				<?php }
				if ($key->rate == "Keluar") { ?>
					<div class="form-group">
						<label class="control-label col-md-3"><b><?php echo $key->username;?></b><br>
						<?php echo $key->tgl_komen;?></label>
						<div class="col-md-9">
							<label class="control-label"><div style='text-align:left;'><?php echo $key->isi;?></div></label>
						</div>
					</div>
					<div class="form-group">
				    <label class="control-label col-md-3">Nilai</label>
				    <div class="col-md-9"><input type="radio" <?php if ($key->rate == "Keluar") echo 'checked = "checked"';?> disabled> Keluar
						</div>
				  </div>
			<?php } } ?>
		</div>
	</div>
</div>
