<!DOCTYPE html>
<html>
<head>
	<title>Print Laporan Surat Masuk</title>
	<style>
		body {
			font-family: calibri;
			font-size: 13px;
		}
		table{
			border-collapse:collapse;
			background:none;
		}
		h3{text-align: center;}
		th, td{border:1px solid #999;}
		th{padding:8px 0;background: none;}
		td{padding:4px 8px;}
	</style>
	<link rel="stylesheet" href="<?= base_url('assets/')?>dist/css/bootstrap.min.css">
</head>
<body onload="window.print()">

	<h5 style="text-align: center;">PEMERINTAH PROVINSI NUSA TENGGARA BARAT</h5>
	<h3 style="text-align: center">DINAS KESEHATAN</h3>

	<p style="text-align: center">Jl. Amir Hamzah No. 103 Mataram Telp. 0370-621786 Fax : 0370-31179
		<br>Website : dinkes.ntbprov.go.id Email : dikes@ntbprov.go.id Kode Pos : 83121
		<hr size="10px">
		<br>
		<h5 style="text-align: center;" ><?php echo $judul ?> </h5>
		<h5 style="text-align: center;" ><?php echo $subjudul ?> </h5>

<!-- 
		<h1><?php echo $judul ?></h1>
		<h3><?php echo $subjudul ?></h3> -->

		<br>
		<table class="table table-striped mt-3 text-center" style="font-size: 12px;" border="1">
			<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">Nomor Surat</th>
					<th scope="col">Perihal</th>
					<th scope="col">Kode Klasifikasi</th>
					<th scope="col">Pengirim</th>
					<th scope="col">Tanggal Surat</th>
				</tr>
			</thead>
			<tbody>
				<?php $i = 1; ?>
				<?php foreach ($nomor_surat as $sms) : ?>
					<tr>
						<th scope="row"><?= $i; ?></th>
						<td><?= $sms->nomor_surat; ?></td>
						<td><?= $sms->perihal; ?></td>
						<td><?= $sms->klasifikasi; ?></td>
						<td><?= $sms->pengirim; ?></td>
						<td><?= $sms->tgl_surat; ?></td>

					</tr>
					<?php $i++; ?>
				<?php endforeach; ?>
			</tbody>
		</table>

	</body>
	</html>