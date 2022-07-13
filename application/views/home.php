<!-- Main content -->
<section class="content">
	
	<div class="container">
		
		<div class="row">
			<div class="col-sm-8">

				<div class="info-box" style="padding: 4px;">
					<!-- <span class="info-box-icon bg-red"><i class="fa fa-star-o"></i></span> -->
					<?php $image = base_url('assets/logo.png') ?>
					<span class="info-box-icon img-responsive" style="background-color: #ffff;"><img src="<?= $image ?>" alt="logo"></span>

					<div class="info-box-content"> 
						<h3>Selamat Datang di Sistem Informasi Kerja Praktek Fakultas Teknik Informatika Universitas Bhayangkara Jakarta Raya.</h3> 
					</div> <!-- /.info-box-content -->
				</div> <!-- /.info-box -->
				
				<br>

				<div class="box" style="border-radius: none; border-top: none;">
					<div class="box-body">
						<h3><i>Hai</i>, <b><?= ucwords($mhs_id['nama_lkp']) ?></b>, Sebelum memulai ada baiknya anda melihat pedoman terlebih dahulu di sini <a class="fa fa-external-link" href="<?= site_url('pedoman') ?>"></a>
					</h3> 
					</div> <!-- /.box-body -->
				</div> <!-- /.box -->
			</div> <!-- /.col-sm-8 -->

			<!-- load rightbar -->
			<?php $this->load->view('template/rightbar'); ?>
		</div> <!-- /.row -->

	</div> <!-- /.container -->

</section>
