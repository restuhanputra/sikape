<section class="content">
	<!-- Small boxes (Stat box) -->
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
			
			<div class='box-header with-border'>
				<h3 class='box-title'>
				<a href="<?= site_url('dosen/add') ?>" class="btn btn-sm btn-flat btn-primary"><i class='fa fa-plus'></i> Tambah Data</a>
				</h3>
			</div><!-- /.box-header -->

			<div class="box-body">
				<div class="table-responsive">
					<table class="table table-striped table-bordered table-hover" id="mytable">
						<thead>
							<tr>
								<th class="text-center" style="width:1%;">No</th>
								<th class="text-center" style="width:6%;">Foto</th>
								<th class="text-center">NIDN</th>
								<th class="text-center">Nama Lengkap</th>
								<th class="text-center">JK</th>
								<th class="text-center">ID Dosen P.A</th>
								<th class="text-center">Role</th>
								<th class="text-center">Status</th>
								<th class="text-center">Detail</th>
								<th class="text-center">Edit</th>
								<th class="text-center">Delete</th>
							</tr>
						</thead>
						<tbody>
						<?php 
							if(!empty($data_dsn))
							{
								$no=1;
								foreach ($data_dsn as $data) {
									$nidn     = $data['nidn'];
									$nama_lkp = ucfirst($data['nama_lkp']);
									$jk       = $data['jk'];
									$dpa      = $data['dpa_id'];
									$agama    = ucfirst($data['agama_nama']);
									$foto     = $data['foto'];
									$role     = $data['role'];
									$status   = $data['status'];
									$created  = date('d-m-Y', strtotime($data['created']));

						?>
						<!-- Isi Tabel -->
							<tr>
								<td><?= $no++ ?>.</td>
								<td>
								<?php
								if ($foto != "") {
									$foto = './../dosen/upload/'.$foto;
								} else
								{
									$foto = './../dosen/upload/profile.jpg';
								} ?>
								<img src="<?= $foto ?>" class="img-circle" alt="User Image" style="height:53px; width:53px;">
								</td>
								<td><?= $nidn ?></td>
								<td><?= $nama_lkp ?></td>
								<td class="text-center"><?= $jk ?></td>
								<td class="text-center"><?= $dpa != "" ? $dpa : "TDK TERDAFTAR" ?></td>
								<td class="text-center"><?= $role == 2 ? "KAPRODI" : "DOSEN" ?></td>
								<td class="text-center"><?= $status == 2 ? '<span class="label label-success">AKTIF</span>' : '<span class="label label-danger">TIDAK AKTIF</span>' ?></td>
								<td class="text-center">
									<form action="<?= site_url('dosen/detail') ?>" method="post">
										<input type="hidden" name="nidn" value="<?= $nidn ?>">

										<button class="btn btn-sm btn-flat btn-default"><i class="fa fa-eye"></i></button>
									</form>
								</td>
								<td class="text-center">
									<form action="<?= site_url('dosen/edit') ?>" method="post">
										<input type="hidden" name="nidn" value="<?= $nidn ?>">

										<button class="btn btn-sm btn-flat btn-primary"><i class="fa fa-edit"></i></button>
									</form>
								</td>
								<td class="text-center">
									<form action="<?= site_url('dosen/delete') ?>" method="post">
										<input type="hidden" name="nidn" value="<?= $nidn ?>">

										<button onclick="return confirm('Apakah anda yakin ?')" class="btn btn-sm btn-flat btn-danger"> <i class="fa fa-trash"></i></button>
									</form>
								</td>
							</tr>
						<!-- /. Isi Tabel -->
						<?php 
								}
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

