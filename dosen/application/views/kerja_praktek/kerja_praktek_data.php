<section class="content">

	<div class="container">

	<!-- Small boxes (Stat box) -->
	<div class="row">
		<div class="col-xs-12">
			<div class="box" style="border-radius: none; border-top: none;">
			
			<div class='box-header with-border'>
				<h4 class="text-center text-bold"><center> <?= $title ?></center></h4>
			</div><!-- /.box-header -->

			<div class="box-body">
				<div class="table-responsive">
					<table class="table table-striped table-bordered table-hover" id="mytable">
						<thead>
							<tr>
								<th class="text-center">No</th>
								<th class="text-center">Tanggal Pengajuan</th>
								<th class="text-center">NPM</th>
								<th class="text-center">Nama Lengkap</th>
								<th class="text-center">Pengajuan Ke</th>
								<th class="text-center">Bidang / Judul</th>
								<th class="text-center">Dosen P.A</th>
								<th class="text-center">Verifikasi</th>
								<th class="text-center">Detail</th>
							</tr>
						</thead>
						<tbody>
						<?php 
							if(!empty($data_mg))
							{
								$no=1;
								foreach ($data_mg as $data) :
									$mg_id        = $data['magang_id'];
									$nama_dsn     = $data['dsn_nama'];
									$npm          = $data['npm'];
									$nama_lkp     = ucfirst($data['nama_lkp']);
									$pengajuan_ke = $data['pengajuan_ke'];
									$bidang_jupel = $data['bidang_judul'];
									$verified     = $data['verified'];
									$created      = date('d-m-Y', strtotime($data['created']));
						?>
							<tr>
								<td class="text-center"><?= $no++ ?>.</td>
								<td class="text-center"><?= $created ?></td>
								<td><?= $npm ?></td>
								<td><?= $nama_lkp ?></td>
								<td class="text-center"><?= $pengajuan_ke ?></td>
								<td><?= $bidang_jupel ?></td>
								<td><?= $nama_dsn ?></td>
								<td class="text-center"><?= $verified == 2 ? '<span class="label label-success">SUDAH</span>' : '<span class="label label-danger">BELUM</span>' ?></td>
								<td class="text-center">
									<form action="<?= site_url('data_kerja_praktek/detail') ?>" method="post">
										<input type="hidden" name="mg_id" value="<?= $mg_id ?>">

										<button class="btn btn-sm btn-flat btn-default"><i class="fa fa-eye"></i></button>
									</form>
								</td>
							</tr>
						<!-- /. Isi Tabel -->
						<?php 
								endforeach;
							}
							else
							{
								NULL;
						}?>
		
						</tbody>
					</table>
				</div>
			</div> <!-- /. box-body -->

			</div> <!-- /.box -->
		</div> <!-- /.col-xs-12 -->

	</div> <!-- /.row -->

	</div> <!-- /.container -->

</section> <!-- /.section -->

<script>
	$(function () {
		$('#mytable').DataTable({
			"paging": true,
			"lengthChange": true,
			"searching": true,
			"ordering": true,
			"info": true,
			"autoWidth": true
		});
	});
</script>
