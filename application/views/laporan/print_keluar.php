<!DOCTYPE html>
<html>
<head>
	<title>Print Laporan Surat Keluar</title>
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

	<!-- <h1><?php echo $judul ?></h1>
		<h3><?php echo $subjudul ?></h3> -->

		<br>
		<table class="table table-striped mt-3 text-center" style="font-size: 12px;" border="1">
			<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">Nomor Surat</th>
					<th scope="col">Perihal</th>
					<th scope="col">Kode Klasifikasi</th>
					<th scope="col">Kepada</th>
					<th scope="col">Tanggal Surat</th>
				</tr>
			</thead>
			<tbody>
				<?php $i = 1; ?>
				<?php foreach ($nomor_surat as $sk) : ?>
					<tr>
						<th scope="row"><?= $i; ?></th>
						<td><?= $sk->nomor_surat; ?></td>
						<td><?= $sk->perihal; ?></td>
						<td><?= $sk->klasifikasi; ?></td>
						<td><?= $sk->kepada; ?></td>
						<td><?= $sk->tgl_surat; ?></td>

					</tr>
					<?php $i++; ?>
				<?php endforeach; ?>
			</tbody>
		</table>

	</body>
	</html>