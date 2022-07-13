<header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <a href="<?= site_url('home') ?>" class="navbar-brand"><b>SIKAPE</b></a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
          <ul class="nav navbar-nav">
            <li class=""><a href="<?= site_url('home') ?>">HOME</a></li>
						<li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">VERIFIKASI<span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="<?= site_url('verifikasi_kerja_praktek') ?>">VERIFIKASI PENGAJUAN FORM KERJA PRAKTEK</a></li>
                <li><a href="<?= site_url('verifikasi_kerja_praktek/riwayat_verifikasi') ?>">RIWAYAT VERIFIKASI PENGAJUAN FORM KERJA PRAKTEK</a></li>
              </ul>
            </li>
            <li class=""><a href="<?= site_url('pedoman') ?>">PEDOMAN</a></li>
						<?php
							if($this->fu->userLogin()['role'] == 2){?>
                <li><a href="<?= site_url('data_kerja_praktek') ?>">DATA KERJA PRAKTEK</a></li>
							<?php }	?>
          </ul>
        </div>
        <!-- /.navbar-collapse -->
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">

            <!-- Notifications Menu -->
            <li class="dropdown notifications-menu">
								<?php
								if($this->fu->notif() > 0)
								{
									$notif   = $this->fu->notif();
									$text    = "Anda mendapatkan notifikasi";
									$content = $this->fu->notif()." Pengajuan verifikasi";
								}
								else 
								{
									$notif   = "";
									$text    = "Tidak ada notifikasi";
									$content = "";
								} 
								?>
              <!-- Menu toggle button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-bell-o"></i>
                <span class="label label-warning"><?= $notif ?></span>
              </a>
              <ul class="dropdown-menu">
                <li class="header"><?= $text ?></li>
                <li>
                  <!-- Inner Menu: contains the notifications -->
                  <ul class="menu">
                    <li><!-- start notification -->
						 	<?php if(empty($content)) 
										{ 
											Null;
										}
										else
										{
							?>
											<a href="<?= site_url('verifikasi_magang') ?>"> <?= $content ?></a>
							<?php
										} ?>
                    </li>
                    <!-- end notification -->
                  </ul>
                </li>
                <li class="footer"><a href="<?= site_url('verifikasi_magang') ?>">Lihat</a></li>
              </ul>
            </li>
            
            <!-- User Account Menu -->
            <li class="dropdown user user-menu">
              <!-- Menu Toggle Button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <!-- The user image in the navbar-->
								<?php
								if(isset($this->fu->userLogin()['foto']))
								{
									$foto = base_url('upload/'.$this->fu->userLogin()['foto']);
								}
								else 
								{
									$foto = base_url('upload/profile.jpg' );
								} 
								?>
                <img src="<?= $foto ?>" class="user-image" alt="User Image">
                <!-- hidden-xs hides the username on small devices so only the image appears. -->
							<?php $nama = $this->fu->userLogin()['nama_lkp']; ?>
                <span class="hidden-xs text-bold"><?= ucwords($nama) ?></span>
              </a>
              <ul class="dropdown-menu">
                <!-- Menu Body -->
                <li class="user-body">
                  <div class="row">
                    <div class="text-center">
											<p class="text-bold">
												<?= ucwords($nama) ?>
                  		</p>
                    </div>
                    <div class=" text-center">
											<p>
												<?php $prodi = $this->fu->userLogin()['prodi_nama']; ?>
												<?= ucwords($prodi) ?>
                  		</p>
										</div>
                  </div>
                  <!-- /.row -->
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="<?= site_url('profile') ?>" class="btn btn-default btn-flat">Profile</a>
                  </div>
                  <div class="pull-right">
                    <a href="<?= site_url('auth/logout') ?>" class="btn btn-default btn-flat">Sign out</a>
                  </div>
                </li>
              </ul>
            </li>
          </ul>
        </div>
        <!-- /.navbar-custom-menu -->
      </div>
      <!-- /.container-fluid -->
    </nav>
  </header>
