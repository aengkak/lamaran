<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
					  <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingOne">
                          <h4 class="panel-title">
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                              <h4>Data Diri</h4>
                            </a>
                          </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                          <div class="panel-body">
						  <div class="form-group">
                                  <label class="control-label col-md-3">No Identitas</label>
                                  <div class="col-md-9">
                                    <input placeholder="No Identitas" value="<?php echo $lamaran->no_identitas;?>" name="no_identitas" class="form-control" type="text">
                                  </div>
                                </div>
                    			<div class="form-group">
                                  <label class="control-label col-md-3">Nama</label>
                                  <div class="col-md-9">
                                    <input name="nama" placeholder="Nama" value="<?php echo $lamaran->nama;?>" class="form-control" type="text">
                                  </div>
                                </div>
                    			<div class="form-group">
                                  <label class="control-label col-md-3">Alamat</label>
                                  <div class="col-md-9">
                                    <input name="alamat" placeholder="Alamat" value="<?php echo $lamaran->alamat;?>" class="form-control" type="text">
                                  </div>
                                </div>
								<div class="form-group">
                                  <label class="control-label col-md-3">Tgl Lahir</label>
                                  <div class="col-md-9">
                                    <input name="tgl_lahir" value="<?php echo $lamaran->tgl_lahir;?>" placeholder="Tgl Lahir" class="form-control" type="text">
                                  </div>
                                </div>
						  
                          </div>
                        </div>
                      </div>
                      <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingTwo">
                          <h4 class="panel-title">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                              <h4>Kontak</h4>
                            </a>
                          </h4>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                          <div class="panel-body">
						  <div class="form-group">
                                  <label class="control-label col-md-3">No Telp</label>
                                  <div class="col-md-9">
                                    <input name="no_telp" placeholder="No Telp" value="<?php echo $lamaran->no_telp;?>" onkeypress="return hanyaAngka(event)" class="form-control" type="text" >
                                  </div>
                                </div>
                    			<div class="form-group">
                                  <label class="control-label col-md-3">No Wa</label>
                                  <div class="col-md-9">
                                    <input name="no_wa" placeholder="No Wa" value="<?php echo $lamaran->no_wa;?>" onkeypress="return hanyaAngka(event)" class="form-control" type="text">
                                  </div>
                                </div>
                    			<div class="form-group">
                                  <label class="control-label col-md-3">Email</label>
                                  <div class="col-md-9">
                                    <input name="email" placeholder="Email" value="<?php echo $lamaran->email;?>" class="form-control" type="text">
                                  </div>
                                </div>
						  
                          </div>
                        </div>
                      </div>
                      <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingThree">
                          <h4 class="panel-title">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                              <h4>Kelengkapan</h4>
                            </a>
                          </h4>
                        </div>
                        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                          <div class="panel-body">
								<div class="form-group">
                                  <label class="control-label col-md-3">Posisi</label>
                                  <div class="col-md-9">
                                    <input name="jabatan" placeholder="Jabatan" value="<?php echo $lamaran->jabatan;?>" class="form-control" type="text">
                                  </div>
                                </div>                    			<div class="form-group">
                                  <label class="control-label col-md-3">Foto</label>
                                  <div class="col-md-9">
                                    <a href="downfoto/<?php echo $lamaran->id ;?>" class="form-control">Download</a>
                                  </div>
                                </div>
								<div class="form-group">
                                  <label class="control-label col-md-3">Cv</label>
                                  <div class="col-md-9">
                                    <a href="downcv/<?php echo $lamaran->id ;?>" class="form-control">Download</a>
                                  </div>
                                </div>
                    			<div class="form-group">
                                  <label class="control-label col-md-3">Ktp</label>
                                  <div class="col-md-9">
                                    <a href="downktp/<?php echo $lamaran->id ;?>" class="form-control">Download</a>
                                  </div>
                                </div>
                          </div>
                        </div>
                      </div>
                    </div>