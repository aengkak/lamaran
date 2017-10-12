          <!-- start: content -->
            <div id="content">
              <div class="panel box-shadow-none content-header">
            		<div class="panel-body">
            			<div class="col-md-12">
            				<h3 class="animated fadeInLeft">Beranda</h3>
            				<p class="animated fadeInDown">
            					 Data
            				</p>
            			</div>
            		</div>
            	</div>
                <div class="col-md-12 top-20 padding-0">
              <div class="col-md-12">
                <div class="panel">
                  <div class="panel-body">
                  <div class="responsive-table">

                    <table class="table table-striped table-bordered" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>Jabatan</th>
                        <th>Total</th>
                        <th>Baru</th>
                        <?php foreach ($tingkatan as $key) { ?>
                        <th><?php echo $key->nama_tingkatan;?></th>
                      <?php } ?>
                        <th>Ditolak</th>
                        <th>Diterima</th>
                        <th>Keluar</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($jabatan as $key1) { ?>
                          <tr>
                            <?php
                            $counting = 0;
                            $counting1 = 0;
                            $pending = 0;
                            foreach ($pengirim as $peng) {
                              if ($key1->id_jabatan == $peng->jabatan_id) {
                                $cc = $peng->level;
                                $cc1 = substr($cc,1);
                                $cc2 = substr($cc,0,1);
                                if ($cc1 == 0) {
                      						if ($cc2 == "P") {
                      							$pending = $pending +1;
                      						} elseif ($cc2 == "N") {
                      						} elseif ($cc2 == "L") {
                                    $counting = $counting +0;
                                  } elseif ($cc2 == "K") {
                                    $counting = $counting +0;
                                  } else {
                      							$counting = $counting +1;
                      						}
                      					} $counting1 = $counting1 +1;
                              }
                            }
                            $kk = 0;
                            foreach ($keluar as $keykel) {
                              if ($keykel->jabatan_id == $key1->id_jabatan) {
                                $kk = $kk +1;
                              }
                            }
                            $ll = 0;
                            foreach ($lulus as $keylul) {
                              if ($keylul->jabatan_id == $key1->id_jabatan) {
                                $ll = $ll +1;
                              }
                            }
                            $nn = 0;
                            foreach ($likeno as $like) {
                              if ($like->jabatan_id == $key1->id_jabatan) {
                                $nn = $nn +1;
                              }
                            }?>
                          <td><a class="btn btn-round btn-default" href="<?php echo base_url('lamaran/'.$key1->id_jabatan);?>"><?php echo $key1->nama_jabatan;?></a></td>
                          <td><div align="center"><?php echo $counting1;?></div></td>
                          <td><div align="center"><a class="btn btn-round btn-default" href="<?php echo base_url('lamaran/'.$key1->id_jabatan);?>"><?php echo $counting."/".$pending;?></a></div></td>

                          <?php foreach ($tingkatan as $key2) {
                            $counting2 = 0;
                            $pending1 = 0;
                            $yes1 = 0;
                            foreach ($pengirim as $p) {
                              if ($key1->id_jabatan == $p->jabatan_id) {
                              $cc = $p->level; $cc1 = substr($cc,1); $cc2 = substr($cc,0,1);
                              if ($cc1 == $key2->ke) {
                                if ($cc2 == "P") {
                                  $pending1 = $pending1 +1;
                                } if ($cc2 == "Y") {
                                  $yes1 = $yes1 +1;
                                }
                            }
                          }
                        } ?>
                        <td><div align="center"><a class="btn btn-round btn-default" href="<?php echo base_url('tingkat/'.$key1->id_jabatan."/".$key2->ke);?>"><?php echo $yes1."/".$pending1;?></a></div></td>

                        <?php } ?>
                        <td><div align="center" style="color:#F44336"><?php echo $nn;?></div></td>
                        <td><div align="center"><a class="btn btn-round btn-default" href="<?php echo base_url('karyawan/'.$key1->id_jabatan);?>"><?php echo $ll;?></a></div></td>
                        <td><div align="center"><a class="btn btn-round btn-default" href="<?php echo base_url('kkeluar/'.$key1->id_jabatan);?>"><div style="color:#F44336"><?php echo $kk;?></div></a></div></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                  </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
      	</div>
          <!-- end: content -->
