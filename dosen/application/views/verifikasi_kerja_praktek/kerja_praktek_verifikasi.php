<!-- Main content -->
<section class="content">
	
	<div class="container">
		
		<div class="row">
			<div class="col-sm-9">
				<div class="box" style="border-radius: none; border-top: none;">
					<div class="box-header">
						<h4 class="text-center text-bold"><center> <?= $title ?></center></h4>
					</div>
					<div class="box-body">
						
						<div class="table-responsive">
							<table class="table table-striped table-bordered table-hover" id="mytable">
								<thead>
									<tr>
										<th class="text-center">No</th>
										<th class="text-center">Tanggal</th>
										<th class="text-center">NPM</th>
										<th class="text-center">Nama</th>
										<th class="text-center">Pengajuan Ke</th>
										<th class="text-center">Bidang / Judul</th>
										<th class="text-center">Detail</th>
										<th class="text-center">Verifikasi</th>
									</tr>
								</thead>
								<tbody>
								<?php 
									if(isset($vrf_mg))
									{
										$no = 1;
										foreach($vrf_mg as $data) :
											$mg_id        = $data['magang_id'];
											$npm          = $data['npm'];
											$nama_lkp     = $data['nama_lkp'];
											$pengajuan_ke = $data['pengajuan_ke'];
											$bidang_jupel = $data['bidang_judul'];
											$created      = date('d-m-Y', strtotime($data['created']));
								?>
									<tr>
										<td class="text-center"><?= $no++ ?>.</td>
										<td><?= $created ?></td>
										<td><?= $npm ?></td>
										<td><?= $nama_lkp ?></td>
										<td class="text-center"><?= $pengajuan_ke ?></td>
										<td><?= $bidang_jupel ?></td>
										<td class="text-center">
											<form action="<?= site_url('verifikasi_magang/detail') ?>" method="post">
												<input type="hidden" name="mg_id" value="<?= $mg_id ?>">

												<button name="verifiy" class="btn btn-sm btn-flat btn-default"><i class="fa fa-eye"></i></button>
											</form>
										</td>
										<td class="text-center">
											<form action="<?= site_url('verifikasi_magang') ?>" method="post">
												<input type="hidden" name="mg_id" value="<?= $mg_id ?>">

												<button onclick="return confirm('Apakah anda yakin ?')" name="verifikasi" href="<?= site_url('verifikasi_magang/delete') ?>" class="btn btn-sm btn-sm btn-flat btn-primary"> <i class="fa fa-check-square-o"></i></button>
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
			</div> <!-- /.col-sm-8 -->

			<div class="col-xs-3">

				<div class="box" style="border-radius: none; border-top: none;">
					<div class="box-header with-border">
						<i class="fa fa-bullhorn"></i>
						<h3 class="box-title text-bold">CATATAN</h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<ol>
							<li>Jika sudah diverifikasi tidak bisa diubah kembali. Jika ada kesalahan, silahkan hubungi Fakultas Teknik.</li>
							<li>Jika bingung, silahkan membaca pedoman disini <a class="fa fa-external-link" href="<?= site_url('pedoman') ?>"></a> </li>
						</ol>
					</div> <!-- /.box-body -->
				</div> <!-- /.box -->

			</div> <!-- /.col-xs-4 -->

		</div> <!-- /.row -->

	</div> <!-- /.container -->

</section>

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
