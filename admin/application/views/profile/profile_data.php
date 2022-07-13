<section class="content">
	<!-- Small boxes (Stat box) -->
	<div class="row">

		<div class="col-lg-6">

			<div class="box">
				<div class="box-body box-profile">
					<?php 
						if(isset($user_id['foto']))
						{
							$foto = base_url('upload/'.$user_id['foto'] );
						}
						else 
						{
							$foto = base_url('upload/profile.jpg' );
						}								
					?>
					<img class="profile-user-img img-responsive img-circle" src="<?= $foto ?>" alt="User profile picture" style="height:100px; width:100px;">

					<h3 class="profile-username text-center"><?= $user_id['nama_lkp'] ?></h3>

					<p class="text-muted text-center"><?= $user_id['role'] == 2 ? "SUPER ADMIN" : "ADMIN" ?></p>

					<hr style="margin-bottom: 0;">
								
					<strong>Agama</strong>
					<p class="text-muted">
						<?= $user_id['agama_nama'] ?>
					</p>

					<hr style="margin-top: 0; margin-bottom: 0;">

					<strong>Jenis Kelamin</strong>
					<p class="text-muted">
						<?= $user_id['jk'] == "L" ? "Laki-Laki" : "Perempuan" ?>
					</p>

					<hr style="margin-top: 0; margin-bottom: 0;">

					<strong>No. Telp</strong>
					<p class="text-muted">
						<?= $user_id['no_telp'] != "" ? $user_id['no_telp'] : "" ?>
					</p>

					<hr style="margin-top: 0; margin-bottom: 0;">

					<strong>Alamat</strong>

					<p class="text-muted">
						<?= $user_id['alamat_lkp'] != "" ? $user_id['alamat_lkp'] : "<br>" ?>
					</p>

					<hr style="margin-top: 0; margin-bottom: 0;">

					<br>

					<a href="<?= site_url('profile/edit') ?>" class="btn btn-primary btn-flat btn-block"><b>Edit</b></a>
				</div> <!-- /.box-body -->
			</div> <!-- /.box -->

		</div> <!-- /.col-xs-12 -->
		
		<div class="col-lg-6">
			<div class="box">
				<div class="box-header with-border">
					<i class="fa fa-heart"></i>
					<h3 class="box-title text-bold">Tips !</h3>
				</div>
				<div class="box-body">
					<h3>Ada baiknya anda melihat pedoman terlebih dahulu di sini <a class="fa fa-external-link" href="<?= site_url('pedoman') ?>"></a>
					</h3> 
				</div> <!-- /.box-body -->
			</div>
		</div>

	</div> <!-- /.row -->

</section> <!-- /.section -->
