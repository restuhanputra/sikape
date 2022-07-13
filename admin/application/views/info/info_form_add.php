<section class="content">
	<!-- Small boxes (Stat box) -->
	<div class="row">
		<div class="col-xs-8">
			<div class="box">
			
				<div class='box-header with-border'>
					<h3 class='box-title pull-right'>
					<a href="<?= site_url('info') ?>" class="btn btn-sm btn-flat btn-warning"><i class='fa fa-undo'></i> Kembali</a>
				</div><!-- /.box-header -->

				<form class="form" enctype="multipart/form-data" action="" method="post">
					<div class="box-body">

						<div class="form-group row <?= form_error('judul') ? 'has-error' : null ?>">
							<label for="judul" class="col-sm-4 control-label">Judul *</label>

							<div class="col-sm-8">
								<input type="text" class="form-control" name="judul" placeholder="Judul">
								<?= form_error('judul') ?>
							</div>
						</div>
						
						<div class="form-group row <?= form_error('content') ? 'has-error' : null ?>">
							<label for="content" class="col-sm-4 control-label">Content *</label>

							<div class="col-sm-8">
								<textarea class="form-control" name="content" placeholder="Content" rows="5"></textarea>
								<?= form_error('content') ?>
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
					</ol>
				</div> <!-- /.box-body -->
			</div> <!-- /.box -->

		</div> <!-- /.col-xs-4 -->

	</div> <!-- /.row -->

</section> <!-- /.section -->
