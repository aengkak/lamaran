 <body id="mimin" class="dashboard">
      <!-- start: Header -->
        <nav class="navbar navbar-default header navbar-fixed-top">
          <div class="col-md-12 nav-wrapper">
            <div class="navbar-header" style="width:100%;">
              <div class="opener-left-menu is-open">
                <span class="top"></span>
                <span class="middle"></span>
                <span class="bottom"></span>
              </div>
                <a href="<?php echo base_url('home');?>" class="navbar-brand">
                 <b>Karunia</b>
                </a>

              <ul class="nav navbar-nav search-nav">
                <li>
                   <div class="search">
                    <span class="fa fa-search icon-search" style="font-size:23px;"></span>
                    <div class="form-group form-animate-text">
                      <input type="text" class="form-text" required>
                      <span class="bar"></span>
                      <label class="label-search"> </label>
                    </div>
                  </div>
                </li>
              </ul>

              <ul class="nav navbar-nav navbar-right user-nav">
                <li class="user-name"><span><?php echo $this->session->userdata('username');?></span></li>
                  <li class="dropdown avatar-dropdown">
                   <img src="<?php echo base_url('asset/img/user.png');?>" class="img-circle avatar" alt="user name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"/>
                   <ul class="dropdown-menu user-dropdown">
                    <li><a href="#" onclick="pass()"><span class="fa fa-lock"></span> Ganti Sandi</a></li>
                     <li role="separator" class="divider"></li>
                     <li class="more">
                      <ul>
                        <li><a href="<?php echo base_url('logout');?>"><span class="fa fa-power-off "></span> Keluar</a></li>
                      </ul>
                    </li>
                  </ul>
                </li>
                <?php $o = 0;
                $user_id = $this->session->userdata('user_id');
                foreach ($notif as $keynotif) {
                  if ($keynotif->user_parent == $user_id) {
                  if ($keynotif->cek == 0) {
                    $o = $o + 1;
                  }
                }
                }?>
                <li ><a href="#" class="opener-right-menu"><span class="fa fa-comments"><span style="color:#F44336"><?php echo $o;?></span></span></a></li>
              </ul>
            </div>
          </div>
        </nav>
      <!-- end: Header -->

      <div class="container-fluid mimin-wrapper">

          <!-- start:Left Menu -->
            <div id="left-menu">
              <div class="sub-left-menu scroll">
                <ul class="nav nav-list">
                  <li><div class="left-bg" style="height: 190px;"></div></li>
                    <li class="ripple"><a href="<?php echo base_url('home');?>"><span class="fa fa-home fa"></span>Beranda</a></li>
                    <li class="ripple"><a href="<?php echo base_url('lamaran');?>"><span class="fa fa-file-code-o"></span>Baru</a></li>
                    <li class="ripple"><a href="<?php echo base_url('hapus');?>"><span class="fa fa-trash"></span>Dihapus</a></li>
                    <li class="ripple">
                      <a class="tree-toggle nav-header">
                        <span class="fa fa-pencil-square"></span> Pengaturan
                        <span class="fa-angle-right fa right-arrow text-right"></span>
                      </a>
                      <ul class="nav nav-list tree">
                        <?php $akses_id = $this->session->userdata('akses_id');
                    		$res1 = explode(',',$akses_id);
                        foreach ($akses as $key) {
                          foreach ($res1 as $key1 => $value) {
                            if ($key->id_akses == $value) { ?>
                              <li><a href="<?php echo base_url($key->akses);?>"><?php echo $key->akses;?></a></li>
                        <?php }
                            }
                         } ?>
					             </ul>
                    </li>
				       </ul>
             </div>
            </div>
          <!-- end: Left Menu -->
