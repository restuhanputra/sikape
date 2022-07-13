<section class="content">
	<!-- Small boxes (Stat box) -->
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
			
			<div class='box-header with-border'>
				<h3 class='box-title'>
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
								<th class="text-center">Edit</th>
								<th class="text-center">Print</th>
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
								<td class="text-center">
									<form action="<?= site_url('data_kerja_praktek/edit') ?>" method="post">
										<input type="hidden" name="mg_id" value="<?= $mg_id ?>">

										<button class="btn btn-sm btn-flat btn-primary"><i class="fa fa-edit"></i></button>
									</form>
								</td>
								<td class="text-center">
								<?php
									if($verified == 2)
									{ 
								?>
									<form action="<?= site_url('data_kerja_praktek/print') ?>" method="post" target="_blank">
										<input type="hidden" name="mg_id" value="<?= $mg_id ?>">
										<input type="hidden" name="npm" value="<?= $npm ?>">

										<button onclick="return confirm('Apakah anda yakin ?')" class="btn btn-sm btn-flat btn-success"> <i class="fa fa-print"></i></button>
									</form>
								<?php
									}
								else 
									{
								?>
										<button onclick="return confirm('Maaf Data Belum Diverifikasi Oleh Dosen PA !')" class="btn btn-sm btn-flat btn-danger"> <i class="fa fa-print"></i></button>
								<?php
									}
								?>
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
