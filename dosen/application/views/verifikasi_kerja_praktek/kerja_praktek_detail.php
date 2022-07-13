<section class="content">

	<div class="container">

	<!-- Small boxes (Stat box) -->
	<div class="row">
		<div class="col-xs-12">
			<div class="box" style="border-radius: none; border-top: none;">
			
			<div class='box-header with-border'>
				<h3 class='box-title text-bold'><?= $title ?></h3>
				<div class="pull-right">
					<a href="<?= site_url('verifikasi_kerja_praktek') ?>" class="btn btn-sm btn-flat btn-warning"><i class='fa fa-undo'></i> Kembali</a>
				</div>
			</div><!-- /.box-header -->

			<form>
				<div class="box-body">
					<div class="form-group row">
						<label for="npm" class="col-sm-4 control-label">NPM</label>

						<div class="col-sm-8">
							<input type="number" class="form-control" name="npm" placeholder="NPM" value="<?= $mg_id['npm'] ?>" readonly>
						</div>
					</div>
					<div class="form-group row">
						<label for="nama_lkp" class="col-sm-4 control-label">Nama Lengkap</label>

						<div class="col-sm-8">
							<input type="text" class="form-control" name="nama_lkp" placeholder="Nama Lengkap" value="<?= $mg_id['nama_lkp'] ?>" readonly>
						</div>
					</div>
					<div class="form-group row">
						<label for="no_telp" class="col-sm-4 control-label">No. Telp</label>

						<div class="col-sm-8">
							<input type="number" class="form-control" name="no_telp" placeholder="No. Telp" value="<?= $mg_id['no_telp'] ?>" readonly>
						</div>
					</div>
					<div class="form-group row">
						<label for="email" class="col-sm-4 control-label">Email</label>

						<div class="col-sm-8">
							<input type="email" class="form-control" name="email" placeholder="Email" value="<?= $mg_id['email'] ?>" readonly>
						</div>
					</div>
					<div class="form-group row">
						<label for="kelas" class="col-sm-4 control-label">Jumlah SKS Telah Lulus</label>

						<div class="col-sm-8">
							<input type="kelas" class="form-control" name="jum_sks_lulus" placeholder="Jumlah SKS Telah Lulus" value="<?= $mg_id['sks_lulus'] ?>" readonly>
						</div>
					</div>
					<div class="form-group row">
						<label for="status" class="col-sm-4 control-label">Jumlah SKS Diambil</label>

						<div class="col-sm-8">
							<input type="text" class="form-control" name="jum_sks_diambil" placeholder="Jumlah SKS Diambil" value="<?= $mg_id['sks_diambil'] ?>" readonly>
						</div>
					</div>
					<div class="form-group row">
						<label for="status" class="col-sm-4 control-label">Pengajuan Ke</label>

						<div class="col-sm-8">
							<input type="number" class="form-control" name="jum_sks_diambil" placeholder="Pengajuan Ke" value="<?= $mg_id['pengajuan_ke'] ?>" readonly>
						</div>
					</div>
					<div class="form-group row">
						<label for="status" class="col-sm-4 control-label">Bidang / Judul Penelitian</label>

						<div class="col-sm-8">
							<input type="text" class="form-control" name="jum_sks_diambil" placeholder="Bidang / Judul Penelitian" value="<?= $mg_id['bidang_judul'] ?>" readonly>
						</div>
					</div>

					<br>
					<div class="form-group row">
						<label for="status" class="col-sm-4 control-label">Nama Perusahaan</label>

						<div class="col-sm-8">
							<input type="text" class="form-control" name="nama_prs" placeholder="Nama Perusahaan" value="<?= $mg_id['nama_prs'] ?>" readonly>
						</div>
					</div>
					<div class="form-group row">
						<label for="status" class="col-sm-4 control-label">Alamat Perusahaan</label>

						<div class="col-sm-8">
							<textarea type="text" class="form-control" name="alamat_prs" placeholder="Alamat Perusahaan" rows="5" readonly><?= $mg_id['alamat_prs'] ?></textarea>
						</div>
					</div>
					<div class="form-group row">
						<label for="status" class="col-sm-4 control-label">Kota / Kabupaten</label>

						<div class="col-sm-8">
							<input type="text" class="form-control" name="kota_kab_prs" placeholder="Kota / Kabupaten" value="<?= $mg_id['kota_kab_prs'] ?>" readonly>
						</div>
					</div>
					<div class="form-group row">
						<label for="status" class="col-sm-4 control-label">Nama Kota / Kabupaten</label>

						<div class="col-sm-8">
							<input type="text" class="form-control" name="kota_kab_nm_prs" placeholder="Nama Kota / Kabupaten" value="<?= $mg_id['kota_kab_nm_prs'] ?>" readonly>
						</div>
					</div>
					<div class="form-group row">
						<label for="status" class="col-sm-4 control-label">Kode Pos</label>

						<div class="col-sm-8">
							<input type="number" class="form-control" name="kode_pos_prs" placeholder="Kode Pos" value="<?= $mg_id['kode_pos_prs'] ?>" readonly>
						</div>
					</div>
					<div class="form-group row">
						<label for="status" class="col-sm-4 control-label">Provinsi</label>

						<div class="col-sm-8">
							<input type="text" class="form-control" name="provinsi_prs" placeholder="Provinsi" value="<?= $mg_id['provinsi_prs'] ?>" readonly>
						</div>
					</div>
					<div class="form-group row">
						<label for="status" class="col-sm-4 control-label">Ditunjukkan Kepada (Nama Lengkap)</label>

						<div class="col-sm-8">
							<input type="text" class="form-control" name="ditunjukkan_kpd_prs" placeholder="Ditunjukkan Kepada (Nama Lengkap)" value="<?= $mg_id['ditunjukkan_kpd_prs'] ?>" readonly>
						</div>
					</div>
					<div class="form-group row">
						<label for="status" class="col-sm-4 control-label">Posisi Kerja</label>

						<div class="col-sm-8">
							<input type="text" class="form-control" name="pos_kerja_prs" placeholder="Posisi Kerja" value="<?= $mg_id['pos_kerja_prs'] ?>" readonly>
						</div>
					</div>
					<div class="form-group row">
						<label for="no_telp" class="col-sm-4 control-label">No. Telp Perusahaan</label>

						<div class="col-sm-8">
							<input type="number" class="form-control" name="no_telp_prs" placeholder="No. Telp Perusahaan" value="<?= $mg_id['no_telp_prs'] ?>" readonly>
						</div>
					</div>
					<div class="form-group row">
						<label for="email" class="col-sm-4 control-label">Email Perusahaan </label>

						<div class="col-sm-8">
							<input type="email" class="form-control" name="email_prs" placeholder="Email Perusahaan " value="<?= $mg_id['email_prs'] ?>" readonly>
						</div>
					</div>
					<div class="form-group row">
						<label for="no_telp" class="col-sm-4 control-label">Contact Person</label>

						<div class="col-sm-8">
							<input type="number" class="form-control" name="cp_prs" placeholder="Contact Person" value="<?= $mg_id['cp_prs'] ?>" readonly>
						</div>
					</div>

				</div> <!-- /.box-body -->
			</form> <!-- /.form -->

			</div> <!-- /.box -->
		</div> <!-- /.col-xs-12 -->

	</div> <!-- /.row -->

	</div> <!-- /.container -->

</section> <!-- /.section -->
