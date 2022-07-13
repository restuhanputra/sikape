
<table align="center" style="width: 700px;"> 
	<tr>
		<td align="center">
			&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
			<img width="18%" src="<?php echo ('./template/dist/kop/ubj.png'); ?>">
		</td>
		<td style="width: 82%; font-family: Verdana; font-size: x-small; text-align: center;">
			<b style="font-size: 20px">UNIVERSITAS BHAYANGKARA JAKARTA RAYA</b>
			<br><b style="font-size: 16px">Jl. Darmawangsa I No. 1 Kebayoran Baru , Jakarta 12140</b>
			<br><b style="font-size: 16px">Telepon : (021) 7267655, 7267657, 7231948, Fax : (021) 7267657</b>
			<br><b style="font-size: 16px">Jl. Perjuangan, Bekasi Utara</b>
			<br><b style="font-size: 16px">Telepon : (021) 88955882, Fax : (021) 88955871</b>
		</td>
	</tr>
	<tr>
		<td colspan="2" style="border: 0px solid #000; border-width: 1px 0 1px 0; padding: 1px">
		</td>
	</tr>
</table>
<table align="center" style="width: 700px; text-align:justify;">
	<tr>
		<td style="padding-top: 3px; width: 12%;"></td>
		<td style="padding-top: 3px; width: 1%"></td>
		<td style="padding-top: 3px"></td>
		<td style="padding-top: 3px; text-align:right;" width="40%">Bekasi, <?= $d_tanggal; ?></td>
	</tr>
	<tr>
		<td style="padding-top: 3px; width: 12%;">Nomor</td>
		<td style="padding-top: 3px; width: 1%">:</td>
		<td style="padding-top: 3px">B/<?= $no ?>/<?= $romawi ?>/<?= date('Y')?>/FT-UBJ</td>
	</tr>
	<tr>
		<td>Lampiran</td>
		<td>:</td>
		<td>Satu Lembar</td>
		<td></td>
	</tr>
	<tr>
		<td>Perihal</td>
		<td>:</td>
		<td><u>Kerja Praktek</u></td>
		<td></td>
	</tr>
</table>

<table align="center" style="width:700px">
	<tbody>
		<tr>
			<td>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp;  &nbsp; &nbsp;  &nbsp; Kepada :<br />
			&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  Yth. <b><?= $d_print['pos_kerja_prs']; ?> </b> <br />
			&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; <b><?= $d_print['nama_prs']; ?></b><br />
			<?php $alamat =  $d_print['alamat_prs'] .", ". $d_print['kota_kab_prs']; ?>
			<?php $alamat2 = $d_print['kota_kab_nm_prs'] .", ".$d_print['kode_pos_prs']; ?>
			&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; <?php echo $alamat; ?> <br />
			&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; <?php echo $alamat2; ?><br /></td>
		</tr>
	</tbody>
</table>

<table align="center" style="width:700px;">
	<tbody>
		<tr>
			<td>
			<p>Dengan hormat,</p>

				<p style="text-align:justify">
				Dalam rangka melaksanakan proses belajar di Fakultas Teknik Universitas Bhayangkara Jakarta Raya, mahasiswa harus menempuh Kerja Praktek selama ±35 hari kerja. Kerja Praktek dimaksudkan untuk membekali mahasiswa agar memiliki pengalaman teknis lapangan dan wawasan penerapan ilmu pengetahuan di bidang atau jurusan yang ditekuni.</p>

				<p style="text-align:justify">Untuk maksud tersebut, kami mengajukan izin untuk melakukan kerja praktek di tempat Bapak/Ibu bagi mahasiswa kami berikut ini.</p>
				<table>
					<tbody>
						<tr>
							<td>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Nama</td>
							<td>&nbsp; &nbsp; &nbsp; &nbsp; : <b><?php echo $d_print['nama_lkp']; ?></b></td>
						</tr>
						<tr>
							<td>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; NPM</td>
							<td>&nbsp; &nbsp; &nbsp; &nbsp; : <?php echo $d_print['npm']; ?></td>
						</tr>
						<tr>
							<td>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Program Studi</td>
							<td>&nbsp; &nbsp; &nbsp; &nbsp; : <?php echo $d_print['prodi_nama']; ?></td>
						</tr>
					</tbody>
				</table>
				<p style="text-align:justify">Bidang pengetahuan yang ingin didalami oleh mahasiswa yang bersangkutan adalah <b><?php echo $d_print['bidang_judul']; ?></b>. Adapun waktu untuk memulai Kerja Praktek Mahasiswa, keputusannya kami serahkan pada Bapak/Ibu. Atas perhatian dan perkenannya kami ucapkan terima kasih.</p>
			</td>
		</tr>
	</tbody>
</table>

<table align="center" style="width:700px">
	<tbody>
		<tr>
			<td style="width:50%">&nbsp;</td>
			<td style="width:50%">
			<br />
			<br />
			&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;u.b. Dekan Fakultas Teknik<br /><br />
			&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Ketua Program Studi Teknik Informatika<br />
			<br />
			<br />
			<br />
			<br />
			<br />
			<br />
			<strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<u><?=$kaprodi?></u></strong>
			</td>
		</tr>
	</tbody>
</table>

<table align="center" style="width:700px">
	<tbody>
		<tr>
			<td>Tembusan :<br />
			Yth. Dekan Fakultas Teknik
			</td>
		</tr>
	</tbody>
</table>

