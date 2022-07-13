<section class="content">
	<!-- Small boxes (Stat box) -->
	<div class="row">
		<div class="col-xs-8">
			<div class="box">
			
				<div class='box-header with-border'>
					<h3 class='box-title pull-right'>
					<a href="<?= site_url('dosen_pa') ?>" class="btn btn-sm btn-flat btn-warning"><i class='fa fa-undo'></i> Kembali</a>
				</div><!-- /.box-header -->

				<form class="form" enctype="multipart/form-data" action="" method="post">
					<div class="box-body">

						<div class="form-group row <?= form_error('dpa_id') ? 'has-error' : null ?>">
							<label for="dpa_id" class="col-sm-4 control-label">ID Dosen P.A *</label>

							<div class="col-sm-8">
								<input type="text" class="form-control" name="dpa_id" placeholder="ID Dosen P.A">
								<?= form_error('dpa_id') ?>
							</div>
						</div>

						<div class="form-group row <?= form_error('nidn') ? 'has-error' : null ?>">
							<label for="nidn" class="col-sm-4 control-label">Dosen *</label>

							<div class="col-sm-8">
								<select class="form-control" name="nidn">
									<option value=""> -- PILIH --</option>
									<?php
										if(!empty($list_dsn))
										{
											foreach ($list_dsn as $data) :
												$nidn     = $data['nidn'];
												$nama_lkp = $data['nama_lkp'];
									?>
										<option value="<?= $nidn ?>"><?= $nama_lkp ?></option>
									<?php 
											endforeach;
										}
										else 
										{
											echo '<option value="">404 Not found</option>';
										} 
									?>
								</select>
								<?= form_error('nidn') ?>
							</div>
						</div>

						<div class="box-footer text-center">
							<button type="reset" class="btn btn-flat btn-default">Reset</button>
							&nbsp;
							<button type="submit" name="tambah" class="btn btn-flat btn-success"><i class='fa fa-paper-plane'></i> Tambah</button>
						</div> <!-- /.box-footer -->
					
					</div> <!-- /.box-body -->

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
						<li>Untuk menambah Dosen P.A, terlebih dahulu menambahkan Dosen <a class="fa fa-external-link" href="<?= site_url('dosen') ?>"></a>. Agar data Dosen yang sudah ditambahkan akan tampil di list Dosen P.A </li> 
					</ol>
				</div> <!-- /.box-body -->
			</div> <!-- /.box -->

		</div> <!-- /.col-xs-4 -->

	</div> <!-- /.row -->

</section> <!-- /.section -->
