<section class="content">
	<!-- Small boxes (Stat box) -->
	<div class="row">
		<div class="col-xs-8">
			<div class="box">
			
			<div class='box-header with-border'>
				<h3 class='box-title pull-right'>
				<a href="<?= site_url('data_kerja_praktek') ?>" class="btn btn-sm btn-flat btn-warning"><i class='fa fa-undo'></i> Kembali</a>
			</div><!-- /.box-header -->

			<form class="form" enctype="multipart/form-data" action="" method="post">
				<div class="box-body">

					<div class="form-group row">
						<label for="dpa" class="col-sm-4 control-label">Dosen P.A</label>

						<div class="col-sm-8">
							<input type="text" class="form-control" name="dpa" placeholder="Dosen P.A" value="<?= $mgg_id['dsn_nama'] ?>" readonly>
						</div>
					</div>
					<div class="form-group row">
						<label for="verified" class="col-sm-4 control-label">Tanggal Verifikasi</label>

						<div class="col-sm-8">
							<input type="text" class="form-control" name="verified" placeholder="Tanggal Verifikasi" value="<?= date('d-m-Y', strtotime($mgg_id['verified_dt'])) ?>" readonly>
						</div>
					</div>

					<br>
					<p class="text-bold"><u>IDENTITAS MAHASISWA</u></p>

					<div class="form-group row">
						<label for="pengajauan" class="col-sm-4 control-label">Tanggal Pengajuan</label>

						<div class="col-sm-8">
							<input type="text" class="form-control" name="pengajauan" placeholder="Tanggal Pengajuan" value="<?= date('d-m-Y', strtotime($mgg_id['created'])) ?>" readonly>
						</div>
					</div>

					<input type="hidden" name="mg_id" value="<?= $mgg_id['magang_id'] ?>">

					<div class="form-group row">
						<label for="npm" class="col-sm-4 control-label">NPM</label>

						<div class="col-sm-8">
							<input type="number" class="form-control" name="npm" placeholder="NPM" value="<?= $mgg_id['npm'] ?>" readonly>
						</div>
					</div>
					<div class="form-group row">
						<label for="nama_lkp" class="col-sm-4 control-label">Nama Lengkap</label>

						<div class="col-sm-8">
							<input type="text" class="form-control" name="nama_lkp" placeholder="Nama Lengkap" value="<?= $mgg_id['nama_lkp'] ?>" readonly>
						</div>
					</div>
					<div class="form-group row <?= form_error('no_telp') ? 'has-error' : null ?>">
						<label for="no_telp" class="col-sm-4 control-label">No. Telp *</label>

						<div class="col-sm-8">
							<input type="number" class="form-control" name="no_telp" placeholder="No. Telp" value="<?= $mgg_id['no_telp'] ?>">
							<?= form_error('no_telp') ?>
						</div>
					</div>
					<div class="form-group row <?= form_error('email') ? 'has-error' : null ?>">
						<label for="email" class="col-sm-4 control-label">Email *</label>

						<div class="col-sm-8">
							<input type="email" class="form-control" name="email" placeholder="Email" value="<?= $mgg_id['email'] ?>">
							<?= form_error('email') ?>
						</div>
					</div>
					<div class="form-group row <?= form_error('jum_sks_lulus') ? 'has-error' : null ?>">
						<label for="jum_sks_lulus" class="col-sm-4 control-label">Jumlah SKS Telah Lulus *</label>

						<div class="col-sm-8">
							<input type="number" class="form-control" name="jum_sks_lulus" placeholder="Jumlah SKS Telah Lulus" value="<?= $mgg_id['sks_lulus'] ?>">
							<?= form_error('jum_sks_lulus') ?>
						</div>
					</div>
					<div class="form-group row <?= form_error('jum_sks_diambil') ? 'has-error' : null ?>">
						<label for="jum_sks_diambil" class="col-sm-4 control-label">Jumlah SKS Diambil *</label>

						<div class="col-sm-8">
							<input type="number" class="form-control" name="jum_sks_diambil" placeholder="Jumlah SKS Diambil" value="<?= $mgg_id['sks_diambil'] ?>">
							<?= form_error('jum_sks_diambil') ?>
						</div>
					</div>
					<div class="form-group row <?= form_error('pengajuan_ke') ? 'has-error' : null ?>">
						<label for="pengajuan_ke" class="col-sm-4 control-label">Pengajuan Ke </label>

						<div class="col-sm-8">
							<input type="number" class="form-control" name="pengajuan_ke" placeholder="Pengajuan Ke" value="<?= $mgg_id['pengajuan_ke'] ?>" readonly>
							<?= form_error('pengajuan_ke') ?>
						</div>
					</div>
					<div class="form-group row <?= form_error('bidang_jupel') ? 'has-error' : null ?>">
						<label for="bidang_jupel" class="col-sm-4 control-label">Bidang / Judul Penelitian *</label>

						<div class="col-sm-8">
							<input type="text" class="form-control" name="bidang_jupel" placeholder="Bidang / Judul Penelitian" value="<?= $mgg_id['bidang_judul'] ?>">
							<?= form_error('bidang_jupel') ?>
						</div>
					</div>

					<br>
					<p class="text-bold"><u>IDENTITAS PERUSAHAAN</u></p>
					
					<div class="form-group row <?= form_error('nama_prs') ? 'has-error' : null ?>">
						<label for="nama_prs" class="col-sm-4 control-label">Nama Perusahaan *</label>

						<div class="col-sm-8">
							<input type="text" class="form-control" name="nama_prs" placeholder="Nama Perusahaan" value="<?= $mgg_id['nama_prs'] ?>">
							<?= form_error('nama_prs') ?>
						</div>
					</div>

					<div class="form-group row <?= form_error('alamat_prs') ? 'has-error' : null ?>">
						<label for="alamat_prs" class="col-sm-4 control-label">Alamat Perusahaan *</label>

						<div class="col-sm-8">
							<textarea type="text" class="form-control" name="alamat_prs" placeholder="Alamat Perusahaan" rows="5"><?= $mgg_id['alamat_prs'] ?></textarea>
							<?= form_error('alamat_prs') ?>
						</div>
					</div>

					<div class="form-group row <?= form_error('kota_kab_prs') ? 'has-error' : null ?>">
						<label for="kota_kab_prs" class="col-sm-4 control-label">Kota / Kabupaten *</label>

						<div class="col-sm-8">
							<select name="kota_kab_prs" class="form-control col-sm-4">
							<?php if($mgg_id['kota_kab_prs'] == "Kota") 
								{
									echo '<option value="Kota" selected>KOTA</option>';
									echo '<option value="Kabupaten">KABUPATEN</option>';
								}
								else 
								{
									echo '<option value="Kota">KOTA</option>';
									echo '<option value="Kabupaten" selected>KABUPATEN</option>';
								} 
							?>
							</select>
							<?= form_error('kota_kab_prs') ?>
						</div>
					</div>
					<div class="form-group row <?= form_error('kota_kab_nm_prs') ? 'has-error' : null ?>">
						<label for="kota_kab_nm_prs" class="col-sm-4 control-label">Nama Kota / Kabupaten *</label>

						<div class="col-sm-8">
							<input type="text" class="form-control" name="kota_kab_nm_prs" placeholder="Nama Kota / Kabupaten" value="<?= $mgg_id['kota_kab_nm_prs'] ?>">
							<?= form_error('kota_kab_nm_prs') ?>
						</div>
					</div>
					<div class="form-group row <?= form_error('kode_pos_prs') ? 'has-error' : null ?>">
						<label for="kode_pos_prs" class="col-sm-4 control-label">Kode Pos *</label>

						<div class="col-sm-8">
							<input type="text" class="form-control" name="kode_pos_prs" placeholder="Kode Pos" value="<?= $mgg_id['kode_pos_prs'] ?>">
							<?= form_error('kode_pos_prs') ?>
						</div>
					</div>
					<div class="form-group row <?= form_error('provinsi_prs') ? 'has-error' : null ?>">
						<label for="provinsi_prs" class="col-sm-4 control-label">Provinsi *</label>

						<div class="col-sm-8">
							<input type="text" class="form-control" name="provinsi_prs" placeholder="Provinsi" value="<?= $mgg_id['provinsi_prs'] ?>">
							<?= form_error('provinsi_prs') ?>
						</div>
					</div>
					<div class="form-group row <?= form_error('ditunjukkan_kpd_prs') ? 'has-error' : null ?>">
						<label for="ditunjukkan_kpd_prs" class="col-sm-4 control-label">Ditunjukkan Kepada (Nama Lengkap) *</label>

						<div class="col-sm-8">
							<input type="text" class="form-control" name="ditunjukkan_kpd_prs" placeholder="Ditunjukkan Kepada (Nama Lengkap)" value="<?= $mgg_id['ditunjukkan_kpd_prs'] ?>">
							<?= form_error('ditunjukkan_kpd_prs') ?>
						</div>
					</div>
					<div class="form-group row <?= form_error('pos_kerja_prs') ? 'has-error' : null ?>">
						<label for="pos_kerja_prs" class="col-sm-4 control-label">Posisi Kerja *</label>

						<div class="col-sm-8">
							<input type="text" class="form-control" name="pos_kerja_prs" placeholder="Posisi Kerja" value="<?= $mgg_id['pos_kerja_prs'] ?>">
							<?= form_error('pos_kerja_prs') ?>
						</div>
					</div>
					<div class="form-group row <?= form_error('no_telp_prs') ? 'has-error' : null ?>">
						<label for="no_telp_prs" class="col-sm-4 control-label">No. Telp Perusahaan *</label>

						<div class="col-sm-8">
							<input type="number" class="form-control" name="no_telp_prs" placeholder="No. Telp Perusahaan" value="<?= $mgg_id['no_telp_prs'] ?>">
							<?= form_error('no_telp_prs') ?>
						</div>
					</div>
					<div class="form-group row <?= form_error('email_prs') ? 'has-error' : null ?>">
						<label for="email_prs" class="col-sm-4 control-label">Email Perusahaan *</label>

						<div class="col-sm-8">
							<input type="email" class="form-control" name="email_prs" placeholder="Email Perusahaan" value="<?= $mgg_id['email_prs'] ?>">
							<?= form_error('email_prs') ?>
						</div>
					</div>
					<div class="form-group row <?= form_error('cp_prs') ? 'has-error' : null ?>">
						<label for="cp_prs" class="col-sm-4 control-label">Contact Person *</label>

						<div class="col-sm-8">
							<input type="text" class="form-control" name="cp_prs" placeholder="Contact Person" value="<?= $mgg_id['cp_prs'] ?>">
							<?= form_error('cp_prs') ?>
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
					</ol>
				</div> <!-- /.box-body -->
			</div> <!-- /.box -->

		</div> <!-- /.col-xs-4 -->

	</div> <!-- /.row -->

</section> <!-- /.section -->
