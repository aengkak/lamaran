<?php if ($cek == 0){ ?>
  <div class="form-group">
    <label class="control-label col-md-3">Data Tambahan(Jika Ada)</label>
    <div class="col-md-9">
      <div class="field_wrapper">
        <div>
          <input type="file" name="dll[]" id="pdf" onchange="return filepdf()" accept=".pdf, .docx" class="col-md-12"/>
          <a href="javascript:void(0);" class="add_button" title="Add field"><img src="<?php echo base_url();?>asset/img/add-icon.png"/></a>
        </div>
      </div>
    </div>
  </div>
<?php } else { ?>
  <div class="form-group">
    <label class="control-label col-md-3">Portfolio</label>
    <div class="col-md-9">
      <div class="field_wrapper">
        <div>
          <input type="file" name="dll[]" id="pdf" onchange="return filepdf()" accept=".pdf, .docx" class="col-md-12"/>
          <a href="javascript:void(0);" class="add_button" title="Add field"><img src="<?php echo base_url();?>asset/img/add-icon.png"/></a>
        </div>
      </div>
    </div>
  </div>
<?php } ?>
