<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
				<li><a href="<?= base_url('dashboard') ?>"><i class="fa fa-dashboard"></i> <span>DASHBOARD</span></a></li>
				<li><a href="<?= site_url('data_kerja_praktek') ?>"><i class="fa fa-files-o"></i> <span>DATA KERJA PRAKTEK</span></a></li>
				<li><a href="<?= site_url('info') ?>"><i class="fa fa-bullhorn"></i> <span>INFO</span></a></li>
				<li class="header">MANAGEMENT DOSEN P.A</li>
				<li><a href="<?= site_url('dosen_pa') ?>"><i class="fa fa-group"></i> <span>DOSEN P.A</span></a></li>
				<li class="header">MANAGEMENT USER</li>
				<li><a href="<?= site_url('mahasiswa') ?>"><i class="fa fa-user"></i> <span>MAHASISWA</span></a></li>
				<li><a href="<?= site_url('dosen') ?>"><i class="fa fa-mortar-board"></i> <span>DOSEN</span></a></li>
				<?php if($this->session->userdata('role') == 2) { ?>
					<li><a href="<?= site_url('admin') ?>"><i class="fa fa-user-secret"></i> <span>ADMIN</span></a></li>
				<?php } ?>
				<li class="header">PETUNJUK</li>
				<li><a href="<?= site_url('pedoman') ?>"><i class="fa fa-book"></i> <span>PEDOMAN</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
