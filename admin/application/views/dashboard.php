

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
							<h3><?= $count_mg != 0 ? $count_mg : 0 ?><sup style="font-size: 20px"></sup></h3>

              <p>Data Kerja Praktek</p>
            </div>
            <div class="icon">
              <i class="fa fa-files-o"></i>
            </div>
            <a href="<?= site_url('data_magang') ?>" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?= $count_mhs != 0 ? $count_mhs : 0 ?><sup style="font-size: 20px"></sup></h3>

              <p>Mahasiswa</p>
            </div>
            <div class="icon">
              <i class="fa fa-user"></i>
            </div>
            <a href="<?= site_url('mahasiswa') ?>" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
							<h3><?= $count_dsn != 0 ? $count_dsn : 0 ?><sup style="font-size: 20px"></sup></h3>

              <p>Dosen</p>
            </div>
            <div class="icon">
              <i class="fa fa-mortar-board"></i>
            </div>
            <a href="<?= site_url('dosen') ?>" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
				<h3><?= $count_dpa != 0 ? $count_dpa : 0 ?><sup style="font-size: 20px"></sup></h3>

              <p>Dosen P.A</p>
            </div>
            <div class="icon">
              <i class="fa fa-mortar-board"></i>
            </div>
            <a href="<?= site_url('dosen_pa') ?>" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->

			<div class="row">
				<div class="col-lg-6">
					<div class="box">
						<div class="box-header with-border">
							<i class="fa fa-heart"></i>
							<h3 class="box-title text-bold">Tips !</h3>
						</div>
						<div class="box-body">
							<h3><i>Hai</i>, Sebelum memulai ada baiknya anda melihat pedoman terlebih dahulu di sini <a class="fa fa-external-link" href="<?= site_url('pedoman') ?>"></a>
							</h3> 
						</div> <!-- /.box-body -->
					</div>
				</div>

				<div class="col-lg-6">
					<div class="box">
						<div class="box-header with-border">
							<i class="fa fa-pie-chart"></i>
							<h3 class="box-title text-bold">Data Kerja Praktek</h3>
						</div>
						<div class="box-body">
							<div id="graph"></div>
						</div>
					</div>
				</div>
			</div>

    </section>
    <!-- /.content -->
	<script>

	Morris.Donut({
		element: 'graph',
		data: [
			{label:"Sudah diverifikasi", value: <?= $verify != 0 ? $verify : 0 ?>},
			{label:"Belum diverifikasi", value: <?= $notverify != 0 ? $notverify : 0 ?>}
		],
		backgroundColor: '#ccc',
		labelColor: '#060',
		colors: ['#4486F7','#DD4B39']
	});

	</script>
