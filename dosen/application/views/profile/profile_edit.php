<!-- Main content -->
<section class="content">

	<div class="container">
		<div class="row">
			<div class="col-md-8">

				<div class="box" style="border-radius: none; border-top: none;">
					
					<div class='box-header with-border'>
						<h3 class='box-title text-bold'><?= $title ?></h3>
						<div class="pull-right">
							<a href="<?= site_url('profile') ?>" class="btn btn-sm btn-flat btn-warning"><i class='fa fa-undo'></i> Kembali</a>
						</div>
					</div><!-- /.box-header -->

					<div class="box-body">
						<form class="form" action="<?= site_url('profile/edit') ?>" method="post" enctype="multipart/form-data">
							<div class="form-group row">
								<label for="nidn" class="col-sm-4 control-label">NIDN</label>

								<div class="col-sm-8">
									<input type="number" class="form-control" name="nidn" placeholder="NIDN" value="<?= $dsn_id['nidn'] ?>" readonly>
								</div>
							</div>
							<div class="form-group row">
								<label for="nama_lkp" class="col-sm-4 control-label">Nama lengkap</label>

								<div class="col-sm-8">
									<input type="text" class="form-control" name="nama_lkp" placeholder="Nama Legkap" value="<?= $dsn_id['nama_lkp'] ?>" readonly>
									<p class="text-muted">Perubahan Nama Dapat Diajukan Melalui Fakultas Teknik.</p>
								</div>
							</div>
							<div class="form-group row">
								<label for="agama" class="col-sm-4 control-label">Agama</label>

								<div class="col-sm-8">
									<input type="text" class="form-control" name="agama" placeholder="Agama" value="<?= $dsn_id['agama_nama'] ?>" readonly>
									<p class="text-muted">Perubahan Agama Dapat Diajukan Melalui Fakultas Teknik.</p>
								</div>
							</div>
							<div class="form-group row <?= form_error('no_telp') ? 'has-error' : null ?>">
								<label for="no_telp" class="col-sm-4 control-label">No. Telp *</label>

								<div class="col-sm-8">
									<input type="number" class="form-control" name="no_telp" placeholder="No. Telp" value="<?= $dsn_id['no_telp'] != ""? $dsn_id['no_telp'] : "" ?>">
									<?= form_error('no_telp') ?>
								</div>
							</div>
							<div class="form-group row <?= form_error('email') ? 'has-error' : null ?>">
								<label for="email" class="col-sm-4 control-label">Email *</label>

								<div class="col-sm-8">
									<input type="email" class="form-control" name="email" placeholder="Email" value="<?= $dsn_id['email'] != ""? $dsn_id['email'] : "" ?>">
									
									<?= form_error('email') != "" ? form_error('email') : '<p class="text-muted">Wajib diisi untuk pemulihan akun SIMAKTIF.</p>' ?>
								</div>
							</div>
							<div class="form-group row <?= form_error('alamat_lkp') ? 'has-error' : null ?>">
								<label for="alamat_lkp" class="col-sm-4 control-label">Alamat Lengkap *</label>

								<div class="col-sm-8">
									<textarea class="form-control" rows="5"  name="alamat_lkp" placeholder="Alamat Lengkap"><?= $dsn_id['alamat_lkp'] != "" ? $dsn_id['alamat_lkp'] : "" ?></textarea>
									<?= form_error('alamat_lkp') ?>
								</div>
							</div>
							<div class="form-group row">
								<label for="foto" class="col-sm-4 control-label">Foto</label>

								<div class="col-sm-8">
									<input type="file" name="foto">
									<p class="help-block">
									<small>Catatan :</small> <br>
									<small>- Setiap field yang bertanda * wajib diisi.</small> <br>
									<small>- Pastikan file yang diupload bertipe *.JPG, *JPEG, atau *.PNG</small> <br>
									<small>- Ukuran file foto max 2 Mb</small>
									</p>
								</div>
							</div>
							
							<hr>
							
							<div class="form-group row <?= form_error('password') ? 'has-error' : null ?>">
								<label for="password" class="col-sm-4 control-label">Ubah Password</label>

								<div class="col-sm-8">
									<input type="password" class="form-control" name="password" autocomplete="off" placeholder="Ubah Password">
									<?= form_error('password') ?>
								</div>
							</div>
							<div class="form-group row <?= form_error('password_konf') ? 'has-error' : null ?>">
								<label for="password_konf" class="col-sm-4 control-label">Ubah Password Konfirmasi</label>

								<div class="col-sm-8">
									<input type="password" class="form-control" name="password_konf" autocomplete="off" placeholder="Ubah Password konfirmasi">
									<?= form_error('password_konf') ?>
								</div>
							</div>

							<div class="box-footer text-center">
								<button type="reset" class="btn btn-flat btn-default">Reset</button>
								&nbsp;
								<button type="submit" name="edit" class="btn btn-flat btn-success"><i class='fa fa-paper-plane'></i> Edit</button>
							</div> <!-- /.box-footer -->
						</form>
					</div> <!-- /.box-body -->
				</div> <!-- /.box -->

			</div> <!-- /.col-md-3 -->

			<!-- load rightbar -->
			<?php $this->load->view('template/rightbar'); ?>
		</div><!-- /.row -->
		
	</div> <!-- /.container -->

</section>
