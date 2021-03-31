		<section class="contact" id="contact">
			<div class="container">
				<h1 class="h3 mb-4 text-gray-800"><?= $title; ?> > Form Edit</h1>
				<!-- <h5>Form Edit Menu</h5> -->
				

				<div class="row">
					<div class="col-lg-8">

						<?= $this->session->set_flashdata('message'); ?>

						<form action="<?= site_url('surat/proses_editsk') ?>" method="post" enctype="multipart/form-data" >
							<input type="hidden" name="id_suratkeluar" value="<?= $nomor_surat['id_suratkeluar']; ?>">
							<div class="row mb-3">
								<label for="no_urut" class="col-sm-3 col-form-label">No. Surat </label>
								<div class="col-sm-8">
									<input type="text" class="form-control" id="no_urut" name="no_urut" value="<?= $nomor_surat['no_urut']; ?>" readonly> 
									<?= form_error('no_urut','<small class="text-danger pl-3">', '</small>');  ?>
								</div>
							</div>
							
							<div class="row mb-3">
								<label for="nomor_surat" class="col-sm-3 col-form-label">Nomor Surat </label>
								<div class="col-sm-8">
									<input type="text" class="form-control" required id="nomor_surat" name="nomor_surat" placeholder="Masukkan Nomor Surat"  value="<?= $nomor_surat['nomor_surat']; ?>"> 
									<?= form_error('nomor_surat','<small class="text-danger pl-3">', '</small>');  ?>
								</div>
							</div>
							<div class="row mb-3">
								<label for="perihal" class="col-sm-3 col-form-label">Perihal </label>
								<div class="col-sm-8">
									<input type="text" class="form-control" required id="perihal" name="perihal" placeholder="Masukkan Perihal"  value="<?= $nomor_surat['perihal']; ?>">
									<?= form_error('perihal','<small class="text-danger pl-3">', '</small>');  ?>
								</div>
							</div>

							<div class="row mb-3">
								<label for="klasifikasi" class="col-sm-3 col-form-label">Klasifikasi </label>
								<div class="col-sm-8">
									<select name="klasifikasi" required id="klasifikasi" class="form-control" >
										<?php foreach ($klasifikasi as $klas) : ?>
											<option value="<?= $klas['klasifikasi']; ?>"><?= $klas['klasifikasi']; ?></option>
										<?php endforeach; ?>
									</select>
									<?= form_error('klasifikasi','<small class="text-danger pl-3">', '</small>');  ?>
								</div>
							</div>

							<div class="row mb-3">
								<label for="lampiran" class="col-sm-3 col-form-label">Lampiran </label>
								<div class="col-sm-8">
									<input type="text" class="form-control" required id="lampiran" name="lampiran" placeholder="Masukkan Lampiran"  value="<?= $nomor_surat['lampiran']; ?>">
									<?= form_error('lampiran','<small class="text-danger pl-3">', '</small>');  ?>
								</div>
							</div>

							<div class="row mb-3">
								<label for="kepada" class="col-sm-3 col-form-label">Kepada </label>
								<div class="col-sm-8">
									<input type="text" class="form-control" required id="kepada" name="kepada" placeholder="Masukkan Kepada"  value="<?= $nomor_surat['kepada']; ?>">
									<?= form_error('kepada','<small class="text-danger pl-3">', '</small>');  ?>
								</div>
							</div>
							<div class="row mb-3">
								<label for="tgl_surat" class="col-sm-3 col-form-label">Tanggal Surat </label>
								<div class="col-sm-8">
									<input type="date" class="form-control" required id="tgl_surat" name="tgl_surat" placeholder="Masukkan Tanggal Surat"  value="<?= $nomor_surat['tgl_surat']; ?>">
									<?= form_error('tgl_surat','<small class="text-danger pl-3">', '</small>');  ?>
								</div>
							</div>

							<div class="row mb-3">
								<label for="file" class="col-sm-3 col-form-label">File </label>
								<div class="col-sm-8">
									<div class="custom-file">
										<input type="file" class="custom-file-input" id="file" name="file">
										<label class="custom-file-label" for="file">Choose file</label>
									</div>
									<small><?= $nomor_surat['file']; ?></small>
								</div>
							</div>
							<div class="form-group row justify-content-end">
								<div class="col-sm-9">
									<button type="submit" name="editklasifikasi" class="btn btn-primary">Simpan</button>
									<a class="btn btn-danger" href="<?=site_url('Surat/suratkeluar')?>" role="button">Batal</a>
								</div>
							</div>

						</form>
					</div>
				</div>
			</div>
		</section>
	</div>

