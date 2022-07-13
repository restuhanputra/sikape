<!-- Main content -->
<section class="content">

	<div class="container">
		<div class="row">
			<div class="col-md-8">

				<!-- Profile Image -->
				<div class="box" style="border-radius: none; border-top: none;">
					<div class="box-body box-profile">
						<div class="row">
							<div class="col-md-4">
								<?php 
								if(isset($mhs_id['foto']))
								{
									$foto = base_url('upload/'.$mhs_id['foto'] );
								}
								else 
								{
									$foto = base_url('upload/profile.jpg' );
								}								
								?>
								 <img class="profile-user-img img-responsive img-circle" src="<?= $foto ?>" alt="User profile picture" style="height:120px; weight:180px; margin-top:30%">
							</div> <!-- /.col-md-3 -->
							
							<div class="col-md-8">
								<h3 class="profile-username text-center"><?= ucwords($mhs_id['nama_lkp']) ?></h3>

								<p class="text-muted text-center"><?= $mhs_id['prodi_nama'] ?></p>
								
								<hr style="margin-bottom: 0;">
								
								<strong>Agama</strong>
								<p class="text-muted">
									<?= $mhs_id['agama_nama'] ?>
								</p>

								<hr style="margin-top: 0; margin-bottom: 0;">

								<strong>Jenis Kelamin</strong>
								<p class="text-muted">
									<?= $mhs_id['jk'] == "L" ? "Laki-Laki" : "Perempuan" ?>
								</p>

								<hr style="margin-top: 0; margin-bottom: 0;">

								<strong>No. Telp</strong>
								<p class="text-muted">
									<?= $mhs_id['no_telp'] != "" ? $mhs_id['no_telp'] : "" ?>
								</p>

								<hr style="margin-top: 0; margin-bottom: 0;">

								<strong>Alamat</strong>

								<p class="text-muted">
									<?= $mhs_id['alamat_lkp'] != "" ? $mhs_id['alamat_lkp'] : "<br>" ?>
								</p>

								<hr style="margin-top: 0; margin-bottom: 0;">

							</div> <!-- /.col-md-5 -->
						</div> <!-- /.row -->

					</div> <!-- /.box-body -->

					<div class="box-footer">
						<a href="<?= site_url('profile/edit') ?>" class="btn btn-primary btn-flat btn-block"><b>Edit Profile</b></a>
					</div> <!-- /.box-footer -->
				</div> <!-- /.box -->
			
			</div> <!-- /.col-md-3 -->

			<!-- load rightbar -->
			<?php $this->load->view('template/rightbar'); ?>
		</div><!-- /.row -->
		
	</div> <!-- /.container -->

</section>
