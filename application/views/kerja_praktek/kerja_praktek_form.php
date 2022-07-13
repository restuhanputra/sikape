<!-- Main content -->
<section class="content">
	
	<div class="container">

		<div class="row">
			<div class="col-sm-8">
				<div class="box" style="border-radius: none; border-top: none;">
				
					<div class='box-header with-border'>
						<h3 class='box-title text-bold'><?= $title ?></h3>
					</div><!-- /.box-header -->
					
					<?php
					if($cek_pngjuan['verified'] == 2 || $cek_pngjuan['verified'] == 0 ) {?>
					<form class="form" action="<?= site_url('kerja_praktek') ?>" method="post">
					<!-- Mahasiswa -->
						<div class="box-body">
							<p class="text-bold"><u>IDENTITAS MAHASISWA</u></p>

							<div class="form-group row">
								<label for="npm" class="col-sm-4 control-label">NPM *</label>

								<div class="col-sm-8">
									<input type="number" class="form-control" name="npm" placeholder="NPM" value="<?= $mhs_id['npm'] ?>" readonly>
								</div>
							</div>
							<input type="hidden" name="dosen_pa" value="<?= $mhs_id['dpa_id'] ?>">
							<div class="form-group row">
								<label for="nama_lkp" class="col-sm-4 control-label">Nama Lengkap *</label>

								<div class="col-sm-8">
									<input type="text" class="form-control" name="nama_lkp" placeholder="Nama Lengkap" value="<?= $mhs_id['nama_lkp'] ?>" readonly>
								</div>
							</div>
							<div class="form-group row <?= form_error('no_telp') ? 'has-error' : null ?>">
								<label for="no_telp" class="col-sm-4 control-label">No. Telp *</label>

								<div class="col-sm-8">
									<input type="number" class="form-control" name="no_telp" placeholder="No. Telp" value="<?= $mhs_id['no_telp'] != "" ? $mhs_id['no_telp'] : "" ?>">
									<?= form_error('no_telp') ?>
								</div>
							</div>
							<div class="form-group row <?= form_error('email') ? 'has-error' : null ?>">
								<label for="email" class="col-sm-4 control-label">Email</label>

								<div class="col-sm-8">
									<input type="email" class="form-control" name="email" placeholder="Email" value="<?= $mhs_id['email'] != "" ? $mhs_id['email'] : "" ?>">
									<?= form_error('email') ?>
								</div>
							</div>
							<div class="form-group row <?= form_error('jum_sks_lulus') ? 'has-error' : null ?>">
								<label for="jum_sks_lulus" class="col-sm-4 control-label">Jumlah SKS Telah Lulus</label>

								<div class="col-sm-8">
									<input type="number" class="form-control" name="jum_sks_lulus" placeholder="Jumlah SKS Telah Lulus">
									<?= form_error('jum_sks_lulus') ?>
								</div>
							</div>
							<div class="form-group row <?= form_error('jum_sks_diambil') ? 'has-error' : null ?>">
								<label for="jum_sks_diambil" class="col-sm-4 control-label">Jumlah SKS Diambil</label>

								<div class="col-sm-8">
									<input type="number" class="form-control" name="jum_sks_diambil" placeholder="Jumlah SKS Diambil">
									<?= form_error('jum_sks_diambil') ?>
								</div>
							</div>
							<div class="form-group row <?= form_error('pengajuan_ke') ? 'has-error' : null ?>">
								<label for="pengajuan_ke" class="col-sm-4 control-label">Pengajuan Ke *</label>

								<div class="col-sm-8">
									<input type="number" class="form-control" name="pengajuan_ke" placeholder="Pengajuan Ke" value="<?= $no_pngjuan != 0 ? $no_pngjuan+1 : 1 ?>" readonly>
									<?= form_error('pengajuan_ke') ?>
								</div>
							</div>
							<div class="form-group row <?= form_error('bidang_jupel') ? 'has-error' : null ?>">
								<label for="bidang_jupel" class="col-sm-4 control-label">Bidang / Judul Penelitian *</label>

								<div class="col-sm-8">
									<input type="text" class="form-control" name="bidang_jupel" placeholder="Bidang / Judul Penelitian">
									<?= form_error('bidang_jupel') ?>
								</div>
							</div>

							<br>
							<p class="text-bold"><u>IDENTITAS PERUSAHAAN</u></p>
							
							<div class="form-group row <?= form_error('nama_prs') ? 'has-error' : null ?>">
								<label for="nama_prs" class="col-sm-4 control-label">Nama Perusahaan *</label>

								<div class="col-sm-8">
									<input type="text" class="form-control" name="nama_prs" placeholder="Nama Perusahaan">
									<?= form_error('nama_prs') ?>
								</div>
							</div>

							<div class="form-group row <?= form_error('alamat_prs') ? 'has-error' : null ?>">
								<label for="alamat_prs" class="col-sm-4 control-label">Alamat Perusahaan *</label>

								<div class="col-sm-8">
									<textarea type="text" class="form-control" name="alamat_prs" placeholder="Alamat Perusahaan" rows="5"></textarea>
									<?= form_error('alamat_prs') ?>
								</div>
							</div>

							<div class="form-group row <?= form_error('kota_kab_prs') ? 'has-error' : null ?>">
								<label for="kota_kab_prs" class="col-sm-4 control-label">Kota / Kabupaten *</label>

								<div class="col-sm-8">
									<select name="kota_kab_prs" class="form-control col-sm-4">
										<option value="">-- Pilih --</option>
										<option value="Kota">KOTA</option>
										<option value="Kabupaten">KABUPATEN</option>
									</select>
									<?= form_error('kota_kab_prs') ?>
								</div>
							</div>
							<div class="form-group row <?= form_error('kota_kab_nm_prs') ? 'has-error' : null ?>">
								<label for="kota_kab_nm_prs" class="col-sm-4 control-label">Nama Kota / Kabupaten *</label>

								<div class="col-sm-8">
									<input type="text" class="form-control" name="kota_kab_nm_prs" placeholder="Nama Kota / Kabupaten">
									<?= form_error('kota_kab_nm_prs') ?>
								</div>
							</div>
							<div class="form-group row <?= form_error('kode_pos_prs') ? 'has-error' : null ?>">
								<label for="kode_pos_prs" class="col-sm-4 control-label">Kode Pos *</label>

								<div class="col-sm-8">
									<input type="text" class="form-control" name="kode_pos_prs" placeholder="Kode Pos">
									<?= form_error('kode_pos_prs') ?>
								</div>
							</div>
							<div class="form-group row <?= form_error('provinsi_prs') ? 'has-error' : null ?>">
								<label for="provinsi_prs" class="col-sm-4 control-label">Provinsi *</label>

								<div class="col-sm-8">
									<input type="text" class="form-control" name="provinsi_prs" placeholder="Provinsi">
									<?= form_error('provinsi_prs') ?>
								</div>
							</div>
							<div class="form-group row <?= form_error('ditunjukkan_kpd_prs') ? 'has-error' : null ?>">
								<label for="ditunjukkan_kpd_prs" class="col-sm-4 control-label">Ditunjukkan Kepada (Nama Lengkap) *</label>

								<div class="col-sm-8">
									<input type="text" class="form-control" name="ditunjukkan_kpd_prs" placeholder="Ditunjukkan Kepada (Nama Lengkap)">
									<?= form_error('ditunjukkan_kpd_prs') ?>
								</div>
							</div>
							<div class="form-group row <?= form_error('pos_kerja_prs') ? 'has-error' : null ?>">
								<label for="pos_kerja_prs" class="col-sm-4 control-label">Posisi Kerja *</label>

								<div class="col-sm-8">
									<input type="text" class="form-control" name="pos_kerja_prs" placeholder="Posisi Kerja">
									<?= form_error('pos_kerja_prs') ?>
								</div>
							</div>
							<div class="form-group row <?= form_error('no_telp_prs') ? 'has-error' : null ?>">
								<label for="no_telp_prs" class="col-sm-4 control-label">No. Telp Perusahaan *</label>

								<div class="col-sm-8">
									<input type="number" class="form-control" name="no_telp_prs" placeholder="No. Telp Perusahaan">
									<?= form_error('no_telp_prs') ?>
								</div>
							</div>
							<div class="form-group row <?= form_error('email_prs') ? 'has-error' : null ?>">
								<label for="email_prs" class="col-sm-4 control-label">Email Perusahaan *</label>

								<div class="col-sm-8">
									<input type="email" class="form-control" name="email_prs" placeholder="Email Perusahaan">
									<?= form_error('email_prs') ?>
								</div>
							</div>
							<div class="form-group row <?= form_error('cp_prs') ? 'has-error' : null ?>">
								<label for="cp_prs" class="col-sm-4 control-label">Contact Person *</label>

								<div class="col-sm-8">
									<input type="text" class="form-control" name="cp_prs" placeholder="Contact Person">
									<?= form_error('cp_prs') ?>
								</div>
							</div>

						</div> <!-- /.box-body -->

						<div class="box-footer text-center">
							<button type="reset" class="btn btn-flat btn-default">Reset</button>
							&nbsp;
							<button type="submit" name="ajukan" class="btn btn-flat btn-success"><i class='fa fa-paper-plane'></i> Ajukan</button>
						</div> <!-- /.box-footer -->
					</form> <!-- /.form -->
					<?php }
							elseif($cek_pngjuan['verified'] == 1)
						{
					?>
						<div class="overlay">
							<i class="fa fa-refresh fa-spin"></i>
						</div>
						<br>
						<h3 class="text-center text-bold">Menunggu Verifikasi Pengajuan Surat Magang !</h3>
						<br>
					<?php
						}
					?>
				</div> <!-- /.box -->
				
			</div> <!-- /.col-sm-8 -->

			<div class="col-sm-4">

				<div class="box" style="border-radius: none; border-top: none;">
					<div class="box-header with-border">
						<i class="fa fa-bullhorn"></i>
						<h3 class="box-title text-bold">CATATAN</h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<ol>
							<li>Setiap field yang bertanda * wajib diisi.</li>
							<li>Jika bingung, silahkan membaca pedoman disini <a class="fa fa-external-link" href="<?= site_url('pedoman') ?>"></a> </li>
						</ol>
					</div> <!-- /.box-body -->
				</div> <!-- /.box -->

			</div> <!-- /.col-sm-4 -->
			
		</div> <!-- /.row -->

	</div> <!-- /.container -->

</section>
