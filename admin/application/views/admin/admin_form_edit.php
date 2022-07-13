<section class="content">
	<!-- Small boxes (Stat box) -->
	<div class="row">
		<div class="col-xs-8">
			<div class="box">
			
			<div class='box-header with-border'>
				<h3 class='box-title pull-right'>
				<a href="<?= site_url('admin') ?>" class="btn btn-sm btn-flat btn-warning"><i class='fa fa-undo'></i> Kembali</a>
			</div><!-- /.box-header -->

			<form class="form" enctype="multipart/form-data" action="" method="post">
				<div class="box-body">
					<div class="form-group row <?= form_error('nip') ? 'has-error' : null ?>">
						<label for="nip" class="col-sm-4 control-label">NIP *</label>

						<div class="col-sm-8">
							<input type="number" class="form-control" name="nip" placeholder="NIP" value="<?= $admin_id['nip'] ?>" readonly>
					<?= form_error('nip') ?>
						</div>
					</div>
					<div class="form-group row <?= form_error('nama_lkp') ? 'has-error' : null ?>">
						<label for="nama_lkp" class="col-sm-4 control-label">Nama Lengkap *</label>

						<div class="col-sm-8">
							<input type="text" class="form-control" name="nama_lkp" placeholder="Nama Lengkap" value="<?= $admin_id['nama_lkp'] ?>">
					<?= form_error('nama_lkp') ?>
						</div>
					</div>
					<div class="form-group row <?= form_error('jk') ? 'has-error' : null ?>">
						<label for="jk" class="col-sm-4 control-label">Jenis Kelamin *</label>

						<div class="col-sm-8">
							<select class="form-control" name="jk">
								<option value=""> -- PILIH --</option>
								<?php if($admin_id['jk'] == "L") 
								{
									echo'<option value="L" selected>LAKI - LAKI</option>';
									echo'<option value="P">PEREMPUAN</option>';
								} 
								else 
								{
									echo'<option value="L">LAKI - LAKI</option>';
									echo'<option value="P" selected>PEREMPUAN</option>';
								}
								?>
							</select>
					<?= form_error('jk') ?>
						</div>
					</div>
					<div class="form-group row <?= form_error('agama') ? 'has-error' : null ?>">
						<label for="agama" class="col-sm-4 control-label">Agama *</label>

						<div class="col-sm-8">
							<select class="form-control" name="agama">
								<option value=""> -- PILIH --</option>
								<?php
									if(!empty($agama))
									{
										foreach ($agama as $data) :
											$id_agama    = $data['agama_id'];
											$nama_agama  = strtoupper($data['nama']);

										if($nama_agama == strtoupper($admin_id['agama_nama']))
										{
								?>
											<option value="<?= $id_agama ?>" selected><?= $nama_agama ?></option>
								<?php 
										}
										else 
										{
								?>
											<option value="<?= $id_agama ?>"><?= $nama_agama ?></option>
								<?php
										}
										endforeach;
									}
									else 
									{
										echo '<option value="">404 Not found</option>';
									} 
								?>
							</select>
							<?= form_error('agama') ?>
						</div>
					</div>
					<div class="form-group row">
						<label for="alamat_lkp" class="col-sm-4 control-label">Alamat Lengkap</label>

						<div class="col-sm-8">
							<textarea class="form-control" rows="5"  name="alamat_lkp" placeholder="Alamat Lengkap"><?= $admin_id['alamat_lkp'] ?></textarea>
						</div>
					</div>
					<div class="form-group row <?= form_error('no_telp') ? 'has-error' : null ?>">
						<label for="no_telp" class="col-sm-4 control-label">No. Telp</label>

						<div class="col-sm-8">
							<input type="number" class="form-control" name="no_telp" placeholder="No. Telp" value="<?= $admin_id['no_telp'] ?>">
							<?= form_error('no_telp') ?>
						</div>
					</div>
					<div class="form-group row <?= form_error('email') ? 'has-error' : null ?>">
						<label for="email" class="col-sm-4 control-label">Email</label>

						<div class="col-sm-8">
							<input type="email" class="form-control" name="email" placeholder="Email" value="<?= $admin_id['email'] ?>">
							<?= form_error('email') ?>
						</div>
					</div>
					<div class="form-group row <?= form_error('password') ? 'has-error' : null ?>">
						<label for="password" class="col-sm-4 control-label">Password</label>

						<div class="col-sm-8">
							<input type="password" class="form-control" name="password" autocomplete="off" placeholder="Password">
							<?= form_error('password') ?>
						</div>
					</div>
					<div class="form-group row <?= form_error('password_konf') ? 'has-error' : null ?>">
						<label for="password_konf" class="col-sm-4 control-label">Password Konfirmasi</label>

						<div class="col-sm-8">
							<input type="password" class="form-control" name="password_konf" autocomplete="off" placeholder="Password konfirmasi">
							<?= form_error('password_konf') ?>
						</div>
					</div>
					<div class="form-group row <?= form_error('role') ? 'has-error' : null ?>">
						<label for="role" class="col-sm-4 control-label">Role *</label>

						<div class="col-sm-8">
							<select class="form-control" name="role">
								<option value=""> -- PILIH --</option>
								<?php if($admin_id['role'] == 2) 
								{
									echo '<option value="1">ADMIN</option>';
									echo '<option value="2" selected>SUPER ADMIN</option>';
								}
								else
								{
									echo '<option value="1"selected>ADMIN</option>';
									echo '<option value="2">SUPER ADMIN</option>';
								}
								?>
							</select>
							<?= form_error('role') ?>
						</div>
					</div>
					<div class="form-group row <?= form_error('status') ? 'has-error' : null ?>">
						<label for="status" class="col-sm-4 control-label">Status *</label>

						<div class="col-sm-8">
							<select class="form-control" name="status">
								<option value=""> -- PILIH --</option>
								<?php if($admin_id['status'] == 2) 
								{
									echo '<option value="2" selected>AKTIF</option>';
									echo '<option value="1">TIDAK AKTIF</option>';
								}
								else 
								{
									echo '<option value="2">AKTIF</option>';
									echo '<option value="1"selected>TIDAK AKTIF</option>';
								} 
								?>
							</select>
							<?= form_error('status') ?>
						</div>
					</div>
					<div class="form-group row">
						<label for="foto" class="col-sm-4 control-label">Foto</label>

						<div class="col-sm-8">
							<input type="file" name="foto">
						</div>
					</div>
				</div> <!-- /.box-body -->

				<div class="box-footer text-center">
					<button type="reset" class="btn btn-flat btn-default">Reset</button>
					&nbsp;
					<button type="submit" name="edit" class="btn btn-flat btn-success"><i class='fa fa-paper-plane'></i> Simpan</button>
				</div> <!-- /.box-footer -->
			</form> <!-- /.form -->

			</div> <!-- /.box -->
		</div> <!-- /.col-xs-8 -->

		<div class="col-xs-4">

			<div class="box">
				<div class="box-header with-border">
					<i class="fa fa-bullhorn"></i>
					<h3 class="box-title text-bold">CATATAN</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<ol>
						<li>Setiap field yang bertanda * wajib diisi.</li>
						<li>Pastikan file yang diupload bertipe *.JPG, *JPEG, atau *.PNG .</li>
						<li>Ukuran file foto max 2 MB.</li>
						<li>Untuk field Password dan Password Konfirmasi biarkan kosong jika tidak ingin diubah.</li>
					</ol>
				</div> <!-- /.box-body -->
          </div> <!-- /.box -->

		</div> <!-- /.col-xs-4 -->

	</div> <!-- /.row -->

</section> <!-- /.section -->
