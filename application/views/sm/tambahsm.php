<div class="container-fluid">

	<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

	<div class="row">
		<div class="col-lg-6">
		</div>
	</div>
	<div class="card" style="width: 80%">
		<div class="card-body">
			<form method="post" action="<?php echo base_url('sm/tambahDataAksi') ?>" enctype="multipart/form-data">

				<div class="form-group">
					<label>Nomor Surat</label>
					<input type="text" class="form-control" id="nomor_surat" name="nomor_surat" >
					<?= form_error('nomor_surat','<small class="text-danger pl-3">', '</small>');  ?>
				</div>
				<div class="form-group">
					<label>Perihal</label>
					<input type="text" class="form-control" id="perihal" name="perihal" >
					<?= form_error('perihal','<small class="text-danger pl-3">', '</small>');  ?>
				</div>

				<div class="form-group">
					<label>Klasifikasi</label>
					<select name="klasifikasi" id="klasifikasi" class="form-control">
						<option value="">--Pilih Kode Klasifikasi--</option>
						<?php foreach ($klasifikasi as $klas) : ?>
							<option value="<?php echo $klas->klasifikasi ?>"><?php echo $klas->klasifikasi ?></option>
						<?php endforeach; ?>
					</select>
					<?= form_error('klasifikasi','<small class="text-danger pl-3">', '</small>');  ?>
				</div>
				<div class="form-group">
					<label>Lampiran</label>
					<input type="text" class="form-control" id="lampiran" name="lampiran" >
					<?= form_error('lampiran','<small class="text-danger pl-3">', '</small>');  ?>
				</div>
				<div class="form-group">
					<label>Pengirim</label>
					<input type="text" class="form-control" id="pengirim" name="pengirim" >
					<?= form_error('pengirim','<small class="text-danger pl-3">', '</small>');  ?>
				</div>
				<div class="form-group">
					<label>Tanggal Surat</label>
					<input type="date" class="form-control" id="tgl_surat" name="tgl_surat">
					<?= form_error('tgl_surat','<small class="text-danger pl-3">', '</small>');  ?>
				</div>
				<div class="form-group">
					<label>Status</label>
					<select name="status" id="status" class="form-control">
						<option value="">--Pilih Status--</option>
						<option value="Menunggu Disposisi">Menunggu Disposisi</option>
						<option value="Disposisi Berhasil">Disposisi Berhasil</option>
					</select>
					<?= form_error('status','<small class="text-danger pl-3">', '</small>');  ?>
				</div>
				<div class="custom-file">
					<label>Status</label>
					<input type="file" class="custom-file-input" id="file" name="file">
					<label class="custom-file-label" for="file">Choose file</label>
				</div>

				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">Add</button>
				</div>
			</form>

		</div>
	</div>

</div>