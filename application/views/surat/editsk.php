		<section class="contact" id="contact">
			<div class="container">
				<h1 class="h3 mb-4 text-gray-800"><?= $title; ?> > Form Edit</h1>
				<!-- <h5>Form Edit Menu</h5> -->
				

				<div class="row">
					<div class="col-lg-8">

						<?= $this->session->set_flashdata('message'); ?>

						<form action="<?= site_url('surat/proses_editsk') ?>" method="post">
							<input type="hidden" name="id_suratkeluar" value="<?= $nomor_surat['id_suratkeluar']; ?>">
							<div class="row mb-3">
								<label for="no_urut" class="col-sm-3 col-form-label">No </label>
								<div class="col-sm-8">
									<input type="text" class="form-control" id="no_urut" name="no_urut" placeholder="Masukkan nomor surat"  value="<?= $nomor_surat['no_urut']; ?>" readonly> 
									<?= form_error('no_urut','<small class="text-danger pl-3">', '</small>');  ?>
								</div>
							</div>
							
							<div class="row mb-3">
								<label for="nomor_surat" class="col-sm-3 col-form-label">Nomor Surat </label>
								<div class="col-sm-8">
									<input type="text" class="form-control" id="nomor_surat" name="nomor_surat" placeholder="Masukkan Nomor Surat"  value="<?= $nomor_surat['nomor_surat']; ?>"> 
									<?= form_error('nomor_surat','<small class="text-danger pl-3">', '</small>');  ?>
								</div>
							</div>
							<div class="row mb-3">
								<label for="perihal" class="col-sm-3 col-form-label">Perihal </label>
								<div class="col-sm-8">
									<input type="text" class="form-control" id="perihal" name="perihal" placeholder="Masukkan perihal"  value="<?= $nomor_surat['perihal']; ?>">
									<?= form_error('perihal','<small class="text-danger pl-3">', '</small>');  ?>
								</div>
							</div>

							<div class="row mb-3">
								<label for="klasifikasi" class="col-sm-3 col-form-label">Klasifikasi </label>
								<div class="col-sm-8">
									<!-- 									<input type="text" class="form-control" id="klasifikasi" name="klasifikasi" placeholder="Masukkan klasifikasi"  value="<?= $nomor_surat['klasifikasi']; ?>"> -->
									<select name="klasifikasi" id="klasifikasi" class="form-control" >
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
									<input type="text" class="form-control" id="lampiran" name="lampiran" placeholder="Masukkan lampiran"  value="<?= $nomor_surat['lampiran']; ?>">
									<?= form_error('lampiran','<small class="text-danger pl-3">', '</small>');  ?>
								</div>
							</div>

							<div class="row mb-3">
								<label for="kepada" class="col-sm-3 col-form-label">Kepada </label>
								<div class="col-sm-8">
									<input type="text" class="form-control" id="kepada" name="kepada" placeholder="Masukkan kepada"  value="<?= $nomor_surat['kepada']; ?>">
									<?= form_error('kepada','<small class="text-danger pl-3">', '</small>');  ?>
								</div>
							</div>
							<div class="row mb-3">
								<label for="tgl_surat" class="col-sm-3 col-form-label">Tanggal Surat </label>
								<div class="col-sm-8">
									<input type="date" class="form-control" id="tgl_surat" name="tgl_surat" placeholder="Masukkan tanggal surat"  value="<?= $nomor_surat['tgl_surat']; ?>">
									<?= form_error('tgl_surat','<small class="text-danger pl-3">', '</small>');  ?>
								</div>
							</div>

							<div class="row mb-3">
								<label for="file" class="col-sm-3 col-form-label">File </label>
								<div class="col-sm-8">
									<input type="text" class="form-control" id="file" name="file" placeholder="Masukkan File"  value="<?= $nomor_surat['file']; ?>">
									<?= form_error('file','<small class="text-danger pl-3">', '</small>');  ?>
								</div>
							</div>

							<!-- <div class="form-group">
								<label for="exampleFormControlFile1">Input File</label>
								<input type="file" class="form-control-file" name="file_sk" value="<?=$isi->file; ?>">
								<input type="hidden" class="form-control-file" name="file" value="<?=$isi->file; ?>">
							</div> -->
							<div class="form-group row justify-content-end">
								<div class="col-sm-9">
									<button type="submit" name="editklasifikasi" class="btn btn-primary">Edit</button>
								</div>
							</div>

						</form>
					</div>
				</div>
			</div>
		</section>
	</div>

