          <!-- start: content -->
            <div id="content">
                <div class="panel">
                  <div class="panel-body">
                      <div class="col-md-6 col-sm-12">
                        <h3 class="animated fadeInLeft">Selamat Datang</h3>
                        <p class="animated fadeInDown"><span class="fa  fa-map-marker"></span> Indonesia</p>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="col-md-6 col-sm-6 text-right" style="padding-left:10px;">
                          <h3 style="color:#DDDDDE;"><span class="fa  fa-map-marker"></span> Surabaya</h3>
                          <h1 style="margin-top: -10px;color: #ddd;">30<sup>o</sup></h1>
                        </div>
                        <div class="col-md-6 col-sm-6">
                           <div class="wheather">
                             <div class="mostly-suny suny">
                                <div class="sun animated pulse infinite">
                                </div>
                                <div class="cloudy animated pulse infinite">
                                  <div class="shadow">

                                  </div>
                                </div>
                            </div>
                          </div>
                        </div>
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
                      </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($jabatan as $key1) { ?>
                          <tr>
                            <?php
                            $counting = 0;
                            $counting1 = 0;
                            foreach ($pengirim as $peng) {
                              if ($key1->id_jabatan == $peng->jabatan_id) {
                                $cc = $peng->level;
                                $cc1 = substr($cc,1);
                                $cc2 = substr($cc,0,1);
                                if ($cc1 == 0) {
                      						if ($cc2 == "P") {
                      							# code...
                      						} elseif ($cc2 == "N") {
                      							# code...
                      						} else {
                      							$counting = $counting +1;
                      						}
                      					} $counting1 = $counting1 +1;
                              }
                            }?>
                          <td><?php echo $key1->nama_jabatan; ;?></td>
                          <td><?php echo $counting1;?></td>
                          <td><a href="<?php echo base_url();?>lamaran"><?php echo $counting;?></a></td>
                          <?php foreach ($tingkatan as $key2) {
                            $counting2 = 0;
                            foreach ($pengirim as $p) {
                              if ($key1->id_jabatan == $p->jabatan_id) {
                              $cc = $p->level; $cc1 = substr($cc,1); $cc2 = substr($cc,0,1);
                              if ($cc1 == $key2->ke) {
                                $counting2 = $counting2 +1;
                            }
                          }
                        } ?>
                          <td><a href="<?php $tt=$key2->ke; echo base_url("tingkat/".$tt);?>"><?php echo $counting2;?></a></td>
                        <?php } ?>
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
