<?php if ($cek == 0){ ?>
  <div class="form-group">
    <label class="control-label col-md-3">Data Tambahan</label>
    <div class="col-md-9">
      <div class="field_wrapper">
        <div>
          <input type="file" name="dll[]" id="pdf" onchange="return filepdf()" accept=".pdf" class="form-control"/>
          <a href="javascript:void(0);" class="add_button" title="Add field"><img src="asset/img/add-icon.png"/></a>
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
          <input type="file" name="dll[]" id="pdf" onchange="return filepdf()" accept=".pdf" class="form-control" required/>
          <a href="javascript:void(0);" class="add_button" title="Add field"><img src="asset/img/add-icon.png"/></a>
        </div>
      </div>
    </div>
  </div>
<?php } ?>
