<!-- Main content -->
<section class="content">
	
	<div class="container">
		
		<div class="row">
			<div class="col-sm-12">
				<div class="box" style="border-radius: none; border-top: none;">
					<div class="box-header">
						<h4 class="text-center text-bold"><center> <?= $title ?></center></h4>
					</div>
					<div class="box-body">
						
						<div class="table-responsive">
							<table class="table table-striped table-bordered table-hover" id="magang">
								<thead>
									<tr>
										<th class="text-center">No</th>
										<th class="text-center">NPM</th>
										<th class="text-center">Nama</th>
										<th class="text-center">Pengajuan Ke</th>
										<th class="text-center">Bidang / Judul</th>
										<th class="text-center">Verifikasi Dosen PA</th>
										<th class="text-center">Status Cetak</th>
										<th class="text-center">Detail</th>
									</tr>
								</thead>
								<tbody>
								<?php 
									if(isset($mg_id))
									{
										$no = 1;
										foreach($mg_id as $data) :
											$mg_id         = $data['magang_id'];
											$npm           = $data['npm'];
											$nama_lkp      = $data['nama_lkp'];
											$pengajuan_ke  = $data['pengajuan_ke'];
											$bidang_jupel  = $data['bidang_judul'];
											$verifikasi_pa = $data['verified'];
								?>
									<tr>
										<td class="text-center"><?= $no++ ?>.</td>
										<td><?= $npm ?></td>
										<td><?= $nama_lkp ?></td>
										<td class="text-center"><?= $pengajuan_ke ?></td>
										<td><?= $bidang_jupel ?></td>
										<td class="text-center"><?= $verifikasi_pa == 2 ? '<span class="label label-success"><b>SUDAH</b></span>' : '<span class="label label-danger"><b>BELUM</b></span>' ?></td>
										<td class="text-center"><?= $verifikasi_pa == 2 ? '<span class="label label-success"><b>BISA</b></span>' : '<span class="label label-danger"><b>BELUM</b></span>' ?></td>
										<td class="text-center">
											<form action="<?= site_url('kerja_praktek/detail') ?>" method="post">
												<input type="hidden" name="mg_id" value="<?= $mg_id ?>">

												<button class="btn btn-sm btn-flat btn-default"><i class="fa fa-eye"></i></button>
											</form>
										</td>
									</tr>
								<?php
										endforeach;
									}
									else
									{
										echo "404 not found";
									}
								?>
								</tbody>
							</table>
						</div> <!-- /.table-responsive -->

					</div> <!-- /.box-body -->
				</div> <!-- /.box -->
			</div> <!-- /.col-sm-12 -->
		</div> <!-- /.row -->

	</div> <!-- /.container -->

</section>

<script>
	$(function () {
		$('#magang').DataTable({
			"paging": true,
			"lengthChange": true,
			"searching": true,
			"ordering": true,
			"info": true,
			"autoWidth": true
		});
	});
</script>
